<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Post;
use App\Models\Tag;  
use Illuminate\Support\Facades\Auth;


class RobotAutomationController extends Controller
{
    public function uploadImage(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time().'_'.$file->getClientOriginalName();
            $path = $file->storeAs('public/comp', $filename);

            return response()->json([
                'success' => true,
                'path' => asset('storage/comp/'.$filename),
                'title' => $request->input('title')
            ]);
        }

        return response()->json(['success' => false, 'message' => 'No file uploaded'], 400);
    }

    public function createArticle(Request $request)
    {
        // $request->validate([
        //     'title'        => 'required|string|max:255',
        //     'content'      => 'required|string',
        //     'banner_image' => 'required|string',
        // ]);

        try {
            $post = Post::create([
                'title'       => $request->input('title'),
                'slug'        => Str::slug($request->input('title')),
                'content'     => $request->input('content'),
                'gambar'      => $request->input('banner_image'),
                'status'      => $request->input('status', 'draft'),
                'headline'    => $request->input('headline', 'no'),
                'adult'       => $request->input('adult', 'no'),
                'kategori_id' => $request->input('kategori_id') ?? null,
                'user_id'     => Auth::id() ?? 1,
            ]);

            if ($request->filled('tags')) {
                $tagNames = is_array($request->input('tags')) ? $request->input('tags') : [];
                $tagIds = [];
                foreach ($tagNames as $tag) {
                    $tagModel = Tag::firstOrCreate(
                        ['nama_tags' => $tag],
                        ['slug' => Str::slug($tag)]
                    );
                    $tagIds[] = $tagModel->id;
                }
                $post->tags()->sync($tagIds);
            }

            return response()->json([
                'success' => true,
                'message' => 'Article created successfully',
                'data'    => $post
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error: '.$e->getMessage()
            ], 500);
        }
    }

}
