<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categori;
use App\Models\Reporter;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Helpers\ImageResizeHelper;
use \App\Models\ImageMetadata;


class BlogController extends Controller
{
    public function blogPost(Request $request)
    {
        $query = Post::with('kategori', 'user');

        if ($request->has('filter_columns')) {
            foreach ($request->filter_columns as $index => $column) {
                $operator = $request->filter_operators[$index] ?? 'like';
                $value = $request->filter_values[$index] ?? '';

                if (!empty($column) && !empty($value)) {
                    $value = strtolower($value);

                    if ($column === 'categori') {
                        $query->whereHas('kategori', function ($q) use ($operator, $value) {
                            if ($operator === 'like') {
                                $value = "%$value%";
                            }
                            $q->whereRaw('LOWER(nama_kategori) ' . $operator . ' ?', [$value]);
                        });
                    } elseif ($column === 'author') {
                        $query->whereHas('user', function ($q) use ($operator, $value) {
                            if ($operator === 'like') {
                                $value = "%$value%";
                            }
                            $q->whereRaw('LOWER(name) ' . $operator . ' ?', [$value]);
                        });
                    }elseif ($column === 'created_at') {
                        $input = str_replace('/', '-', $value);
                        $parts = explode('-', $input);

                        $searchPattern = '';

                        if (count($parts) === 3) {
                            [$d, $m, $y] = $parts;
                            $searchPattern = "$y-$m-$d";
                        } elseif (count($parts) === 2) {
                            [$d, $m] = $parts;
                            $searchPattern = "-$m-$d";
                        } elseif (strlen($input) === 2 || strlen($input) === 1) {
                            $searchPattern = "-$input";
                        } elseif (strlen($input) === 4) {
                            $searchPattern = "$input-";
                        } else {
                            $searchPattern = $value;
                        }

                        $query->whereRaw("CAST(created_at AS TEXT) ILIKE ?", ["%$searchPattern%"]);
                    }else {
                        if ($operator === 'like') {
                            $value = "%$value%";
                        }
                        $query->whereRaw('LOWER(' . $column . ') ' . $operator . ' ?', [$value]);
                    }
                }
            }
        }

        $filters = $request->all();

        $post = $query->latest()->paginate(20)->appends($filters);

        return view('backend.pages.blog.posting.index', compact('post'));
    }

    public function editPost($id){
        $post = Post::with('kategori','reporter')->findOrFail($id);
        $category = Categori::all();
        $allPosts = collect([$post])->flatten();
        $reporter = Reporter::where(function ($query) use ($post) {
            $query->where('is_deleted', 'no');
            
            if ($post->reporter_id) {
                $query->orWhere('id', $post->reporter_id);
            }
        })->get();


        foreach ($allPosts as $singlePost) {
            if ($singlePost->gambar) {
                $singlePost->gambar = explode('|', $singlePost->gambar);
            }
        }

        return view('backend.pages.blog.posting.edit',compact('post','category','reporter'));
    }

    public function createPost()
    {
        $category = Categori::all();
        $reporter = Reporter::where('is_deleted', 'no')->get();
        return view('backend.pages.blog.posting.create', compact('category','reporter'));
    }



    public function PostAdd(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'banner_image' => 'required',
            ]);

            $bannerImageUrl = $request->input('banner_image');

            $metadata = ImageMetadata::where('comp_url', $bannerImageUrl)->first();

            if ($metadata) {
                if ($request->filled('image_caption')) {
                    $metadata->caption = $request->input('image_caption');
                    $metadata->save();
                }
            }
            
            $post = Post::create([
                'title' => $request->input('title'),
                'slug' => Str::slug($request->input('title')),
                'image_caption' =>  $metadata->caption ?? null,
                'content' => $request->input('content'),
                'keyword' => $request->input('seo_meta.seo_title'),
                'description' => $request->input('seo_meta.seo_description'),
                'start_date' => \Carbon\Carbon::parse($request->input('scheduled_date'))->format('Y-m-d'),
                'start_time' => \Carbon\Carbon::parse($request->input('scheduled_time'))->format('H:i'),
                'status' => $request->input('status'),
                'headline' => $request->input('headline', 'no'),
                'adult' => $request->input('adult', 'no'),
                'kategori_id' => $request->input('categories')[0] ?? null,
                'sub_category_id' => $request->input('subcategories')[0] ?? null,
                'gambar' => $bannerImageUrl,
                'user_id' => Auth::id(),
                'multipages' => $request->input('multipages', 'no'),
                'reporter_id' => $request->input('reporter_id')[0] ?? null,
                'seo' => $request->input('seo', 'no'),
            ]);

            $tags = json_decode($request->input('tag'), true);
            if ($tags && is_array($tags)) {
                $tagIds = [];
                foreach ($tags as $tag) {
                    if (!empty($tag['value'])) {
                        $slug = Str::slug($tag['value']);
                        $tagModel = Tag::firstOrCreate(
                            ['nama_tags' => $tag['value']],
                            ['slug' => $slug]
                        );
                        $tagIds[] = $tagModel->id;
                    }
                }

                $post->tags()->sync($tagIds);
            }

            Alert::success('Success', 'Post added successfully!');
            return redirect()->back();

        } catch (\Illuminate\Validation\ValidationException $e) {
            Alert::warning('Warning', implode(', ', $e->validator->errors()->all()));
            return redirect()->back()->withErrors($e->validator)->withInput();

        } catch (\Exception $e) {
            Alert::error('Error', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function PostUpdate(Request $request, $id) {
        $post = Post::findOrFail($id);

        $bannerImageUrl = $request->input('banner_image');

        $metadata = ImageMetadata::where('comp_url', $bannerImageUrl)->first();

        if ($metadata) {
            if ($request->filled('image_caption')) {
                $metadata->caption = $request->input('image_caption');
                $metadata->save();
            }
        }

        $post->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'image_caption' =>  $metadata->caption ?? null,
            'keyword' => $request->input('seo_meta.seo_title'),
            'description' => $request->input('seo_meta.seo_description'),
            'start_date' => \Carbon\Carbon::parse($request->input('scheduled_date'))->format('Y-m-d'),
            'start_time' => \Carbon\Carbon::parse($request->input('scheduled_time'))->format('H:i'),
            'status' => $request->input('status'),
            'headline' => $request->input('headline', 'no'),
            'adult' => $request->input('adult', 'no'),
            'kategori_id' => $request->input('categories')[0] ?? null,
            'sub_category_id' => $request->input('subcategories')[0] ?? null,
            'reporter_id' => $request->input('reporter_id')[0] ?? null,
            'multipages' => $request->input('multipages', 'no'),
            'gambar' => $request->input('banner_image'),
            'seo' => $request->input('seo', 'no')
        ]);

        $tags = json_decode($request->input('tag'), true);
        if ($tags && is_array($tags)) {
            $tagIds = [];
            foreach ($tags as $tag) {
                if (!empty($tag['value'])) {
                    $slug = Str::slug($tag['value']);

                    $tagModel = Tag::firstOrCreate(
                        ['nama_tags' => $tag['value']],
                        ['slug' => $slug]
                    );
                    $tagIds[] = $tagModel->id;
                }
            }

            $post->tags()->sync($tagIds);
        }

        Alert::success('Success', 'Post updated successfully!!');
        return redirect()->back()->with('success', 'post Added successfully.');
    }


    public function deletePost($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        Alert::error('Delete', 'Post Deleted!!');
        return redirect()->route('blog.post')->with('success', 'Post deleted successfully.');
    }


    // Schedule Post Page
    public function schedulePost(Request $request)
    {

        $query = Post::with('kategori', 'user');

        if ($request->has('filter_columns')) {
            foreach ($request->filter_columns as $index => $column) {
                $operator = $request->filter_operators[$index] ?? 'like';
                $value = $request->filter_values[$index] ?? '';

                if (!empty($column) && !empty($value)) {
                    $value = strtolower($value);

                    if ($column === 'categori') {
                        $query->whereHas('kategori', function ($q) use ($operator, $value) {
                            if ($operator === 'like') {
                                $value = "%$value%";
                            }
                            $q->whereRaw('LOWER(nama_kategori) ' . $operator . ' ?', [$value]);
                        });
                    } elseif ($column === 'author') {
                        $query->whereHas('user', function ($q) use ($operator, $value) {
                            if ($operator === 'like') {
                                $value = "%$value%";
                            }
                            $q->whereRaw('LOWER(name) ' . $operator . ' ?', [$value]);
                        });
                    } else {
                        if ($operator === 'like') {
                            $value = "%$value%";
                        }
                        $query->whereRaw('LOWER(' . $column . ') ' . $operator . ' ?', [$value]);
                    }
                }
            }
        }


        $post = $query->where('status','schedule')->latest()->paginate(20);

        return view('backend.pages.blog.schedule.index',compact('post'));
    }


    public function seoPost(Request $request){
        
    $query = Post::with('kategori', 'user');

        if ($request->has('filter_columns')) {
            foreach ($request->filter_columns as $index => $column) {
                $operator = $request->filter_operators[$index] ?? 'like';
                $value = $request->filter_values[$index] ?? '';

                if (!empty($column) && !empty($value)) {
                    $value = strtolower($value);

                    if ($column === 'categori') {
                        $query->whereHas('kategori', function ($q) use ($operator, $value) {
                            if ($operator === 'like') {
                                $value = "%$value%";
                            }
                            $q->whereRaw('LOWER(nama_kategori) ' . $operator . ' ?', [$value]);
                        });
                    } elseif ($column === 'author') {
                        $query->whereHas('user', function ($q) use ($operator, $value) {
                            if ($operator === 'like') {
                                $value = "%$value%";
                            }
                            $q->whereRaw('LOWER(name) ' . $operator . ' ?', [$value]);
                        });
                    }elseif ($column === 'created_at') {
                        $input = str_replace('/', '-', $value);
                        $parts = explode('-', $input);

                        $searchPattern = '';

                        if (count($parts) === 3) {
                            [$d, $m, $y] = $parts;
                            $searchPattern = "$y-$m-$d";
                        } elseif (count($parts) === 2) {
                            [$d, $m] = $parts;
                            $searchPattern = "-$m-$d";
                        } elseif (strlen($input) === 2 || strlen($input) === 1) {
                            $searchPattern = "-$input";
                        } elseif (strlen($input) === 4) {
                            $searchPattern = "$input-";
                        } else {
                            $searchPattern = $value;
                        }

                        $query->whereRaw("CAST(created_at AS TEXT) ILIKE ?", ["%$searchPattern%"]);
                    }else {
                        if ($operator === 'like') {
                            $value = "%$value%";
                        }
                        $query->whereRaw('LOWER(' . $column . ') ' . $operator . ' ?', [$value]);
                    }
                }
            }
        }

        $filters = $request->all();
        
        $post = $query->where('seo', 'yes')->latest()->paginate(20)->appends($filters);


        return view('backend.pages.blog.seo.index',compact('post'));
    }

    

}
