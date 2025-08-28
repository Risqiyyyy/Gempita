<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SubCategory;
use App\Models\Categori;
use Illuminate\Support\Str;

class SubCategorySeeder extends Seeder
{
    public function run()
    {
        $subCategories = [
            ['nama_sub_kategori' => 'Hukum', 'category_slug' => 'nasional'],
            ['nama_sub_kategori' => 'Ekonomi Bisnis', 'category_slug' => 'nasional'],
            ['nama_sub_kategori' => 'Metropolitan', 'category_slug' => 'nasional'],
            ['nama_sub_kategori' => 'Politik', 'category_slug' => 'nasional'],
            ['nama_sub_kategori' => 'Sosial Budaya', 'category_slug' => 'nasional'],
            // 
            ['nama_sub_kategori' => 'Banten', 'category_slug' => 'daerah'],
            ['nama_sub_kategori' => 'Bengkulu', 'category_slug' => 'daerah'],
            ['nama_sub_kategori' => 'Jawa Barat', 'category_slug' => 'daerah'],
            ['nama_sub_kategori' => 'Jawa Tengah', 'category_slug' => 'daerah'],
            ['nama_sub_kategori' => 'Riau', 'category_slug' => 'daerah'],
            ['nama_sub_kategori' => 'Sumatra Utara', 'category_slug' => 'daerah'],
            // 
            ['nama_sub_kategori' => 'Beauty', 'category_slug' => 'lifestyle'],
            ['nama_sub_kategori' => 'Kesehatan', 'category_slug' => 'lifestyle'],
            ['nama_sub_kategori' => 'Kuliner', 'category_slug' => 'lifestyle'],
            ['nama_sub_kategori' => 'Traveling', 'category_slug' => 'lifestyle'],
        ];

        foreach ($subCategories as $subCategory) {
            SubCategory::create([
                'nama_sub_kategori' => $subCategory['nama_sub_kategori'],
                'slug' => Str::slug($subCategory['nama_sub_kategori']),
                'category_id' => Categori::where('slug', $subCategory['category_slug'])->first()->id,
            ]);
        }
    }
}
