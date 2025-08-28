<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Categori;
use App\Models\SubCategory;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use League\Csv\Reader;
use Illuminate\Support\Facades\Storage;

class PostSeeder extends Seeder
{
    // public function run()
    // {
    //     $csvFile = base_path('/database/seeders/Posts-Export-2024-July-31-0319.csv');
        
    //     $csv = Reader::createFromPath($csvFile, 'r');
    //     $csv->setHeaderOffset(0);
    
    //     $records = $csv->getRecords();
    
    //     foreach ($records as $record) {
    //         $categories = preg_split('/[>|]/', $record['Categories']);

    //         $isHeadline = in_array('headline', array_map('strtolower', array_map('trim', $categories))) ? 'yes' : 'no';

    //         $categoryName = trim($categories[0]);
    //         $subCategoryName = isset($categories[1]) ? trim($categories[1]) : null;
    
    //         echo "Category: $categoryName\n";
    //         echo "Subcategory: $subCategoryName\n";
    
    //         $category = Category::where('nama_kategori', $categoryName)->first();
    //         if (!$category) {
    //             echo "Category not found: $categoryName\n";
    //             continue; 
    //         }
                        
    //         $subCategory = $subCategoryName ? SubCategory::where('nama_sub_kategori', $subCategoryName)->first() : null;
    //         if ($subCategoryName && !$subCategory) {
    //             echo "Subcategory not found: $subCategoryName\n";
    //             continue; 
    //         }

    //         $authorEmail = $record['Author Email'];
    //         $user = User::where('email', $authorEmail)->first();
    //         $userId = $user ? $user->id : null;

    //         if (!$userId) {
    //             echo "User not found for email: $authorEmail\n";
    //             continue; 
    //         }
    
    //         $imageUrl = isset($record['Image URL']) ? str_replace('https://ftnews.co.id/wp-content/uploads/', '', $record['Image URL']) : null;
    //         $post = Post::create([
    //             'title' => $record['Title'],
    //             'content' => $record['Content'],
    //             'gambar' => $imageUrl,
    //             'slug' => Str::slug($record['Title']),
    //             'status' => 'public',
    //             'headline' => $isHeadline,
    //             'kategori_id' => $category->id,
    //             'sub_category_id' => $subCategory ? $subCategory->id : null,
    //             'user_id' => $userId,
    //             'view' => $record['View'] ?? 0,
    //             'created_at' => $record['Date'] ?? null,
    //         ]);
    
    //         if (!empty($record['Tags'])) {
    //             $tags = explode('|', $record['Tags']);
    //             foreach ($tags as $tagName) {
    //                 $tagName = trim($tagName);
    //                 $tag = Tags::firstOrCreate([
    //                     'nama_tags' => $tagName,
    //                     'slug' => Str::slug($tagName),
    //                 ]);
    //                 $post->tags()->attach($tag->id);
    //             }
    //         }
    //     }
    // }


        // V3
    // public function run()
    // {
    //     $csvFile = base_path('/database/seeders/Posts-Export-2024-July-31-0319.csv');
        
    //     $csv = Reader::createFromPath($csvFile, 'r');
    //     $csv->setHeaderOffset(0);
    
    //     $records = $csv->getRecords();
    
    //     foreach ($records as $record) {
    //         $categories = preg_split('/[>|]/', $record['Categories']);

    //         $isHeadline = in_array('headline', array_map('strtolower', array_map('trim', $categories))) ? 'yes' : 'no';

    //         $categoryName = trim($categories[0]);
    //         $subCategoryName = isset($categories[1]) ? trim($categories[1]) : null;
    
    //         echo "Category: $categoryName\n";
    //         echo "Subcategory: $subCategoryName\n";
    
    //         $category = Category::where('nama_kategori', $categoryName)->first();
    //         if (!$category) {
    //             echo "Category not found: $categoryName\n";
    //             continue; 
    //         }
                        
    //         $subCategory = $subCategoryName ? SubCategory::where('nama_sub_kategori', $subCategoryName)->first() : null;
    //         if ($subCategoryName && !$subCategory) {
    //             echo "Subcategory not found: $subCategoryName\n";
    //             continue; 
    //         }

    //         $authorEmail = $record['Author Email'];
    //         $user = User::where('email', $authorEmail)->first();
    //         $userId = $user ? $user->id : null;

    //         if (!$userId) {
    //             echo "User not found for email: $authorEmail\n";
    //             continue; 
    //         }

            

    //         $createdAt = $record['Date'] ?? null;
    //         if (empty($createdAt)) {
    //             $createdAt = now();
    //         }

    //         $content = isset($record['Content']) 
    //             ? str_replace('https://ftnews.co.id/wp-content/uploads/', Storage::url('public/'), $record['Content']) 
    //             : null;
    //         $imageUrl = isset($record['Image URL']) ? str_replace('https://ftnews.co.id/wp-content/uploads/', '', $record['Image URL']) : null;

    //         $post = Post::create([
    //             'title' => $record['Title'],
    //             'content' => $content,
    //             'gambar' => $imageUrl,
    //             'slug' => Str::slug($record['Title']),
    //             'status' => 'public',
    //             'headline' => $isHeadline,
    //             'kategori_id' => $category->id,
    //             'sub_category_id' => $subCategory ? $subCategory->id : null,
    //             'user_id' => $userId,
    //             'view' => $record['View'] ?? 0,
    //             'created_at' => $createdAt, 
    //             'updated_at' => now(),
    //         ]);

    //         if (!empty($record['Tags'])) {
    //             $tags = explode('|', $record['Tags']);
    //             foreach ($tags as $tagName) {
    //                 $tagName = trim($tagName);
    //                 $tag = Tags::firstOrCreate([
    //                     'nama_tags' => $tagName,
    //                     'slug' => Str::slug($tagName),
    //                 ]);
    //                 $post->tags()->attach($tag->id);
    //             }
    //         }
    //     }
    // }

    public function run()
    {
        $csvFile = base_path('/database/seeders/Posts-Export-2024-October-06-1529.csv');
    
        $csv = Reader::createFromPath($csvFile, 'r');
        $csv->setHeaderOffset(0);
    
        $records = $csv->getRecords();
        
        foreach ($records as $record) {
            $categories = preg_split('/[>|]/', $record['Categories']);
            $isHeadline = in_array('headline', array_map('strtolower', array_map('trim', $categories))) ? 'yes' : 'no';
    
            echo "Processing:\n";
    
            $categoryIds = [];
            $subCategoryIds = [];
    
            foreach ($categories as $categoryName) {
                $categoryName = trim($categoryName);
                echo "Checking Category: $categoryName\n";
    
                $category = Categori::where('nama_kategori', $categoryName)->first();
                if ($category) {
                    $categoryIds[] = $category->id; 
                    echo "Found main category: $categoryName\n";
                } else {
                    $subCategory = SubCategory::where('nama_sub_kategori', $categoryName)->first();
                    if ($subCategory) {
                        $subCategoryIds[] = $subCategory->id; 
                        echo "Found subcategory: $categoryName\n";
                        $categoryIds[] = $subCategory->category_id; 
                    } else {
                        echo "Category or Subcategory not found: $categoryName\n";
                    }
                }
            }
    
            if (empty($categoryIds) && empty($subCategoryIds)) {
                echo "No valid categories or subcategories found for record, skipping...\n";
                continue; 
            }
    
            $authorEmail = $record['Author Email'];
            $user = User::where('email', $authorEmail)->first();
            $userId = $user ? $user->id : null;
    
            if (!$userId) {
                echo "User not found for email: $authorEmail\n";
                continue; 
            }
    
            $createdAt = $record['Date'] ?? now();
            
            $content = isset($record['Content']) 
                ? str_replace('https://ftnews.co.id/wp-content/uploads/', Storage::url('public/'), $record['Content']) 
                : null;
            $imageUrl = isset($record['Image URL']) ? str_replace('https://ftnews.co.id/wp-content/uploads/', '', $record['Image URL']) : null;
    
            try {
                foreach ($categoryIds as $categoryId) {
                    $existingPost = Post::where('title', $record['Title'])->first();
    
                    if ($existingPost) {
                        echo "Post already exists for title: " . $record['Title'] . ", skipping...\n";
                        continue;
                    }
    
                    $post = Post::create([
                        'title' => $record['Title'],
                        'content' => $content,
                        'gambar' => $imageUrl,
                        'slug' => Str::slug($record['Title']), 
                        'status' => 'public',
                        'headline' => $isHeadline,
                        'kategori_id' => $categoryId,
                        'sub_category_id' => !empty($subCategoryIds) ? $subCategoryIds[0] : null,
                        'user_id' => $userId,
                        'view' => $record['View'] ?? 0,
                        'created_at' => $createdAt, 
                        'updated_at' => now(),
                    ]);
    
                    echo "Post created successfully for category ID $categoryId: " . $post->title . "\n";
    
                    if (!empty($record['Tags'])) {
                        $tags = explode('|', $record['Tags']);
                        foreach ($tags as $tagName) {
                            $tagName = trim($tagName);
                            $tag = Tag::firstOrCreate([
                                'nama_tags' => $tagName,
                                'slug' => Str::slug($tagName),
                            ]);
                            $post->tags()->attach($tag->id);
                        }
                    }                    
                }
            } catch (\Exception $e) {
                echo "Error creating post for title '{$record['Title']}': " . $e->getMessage() . "\n";
            }
        }
    }
    
}
