<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categori;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['nama_kategori' => 'Nasional'],
            ['nama_kategori' => 'Daerah'],
            ['nama_kategori' => 'Lifestyle'],
            ['nama_kategori' => 'Teknologi'],
            ['nama_kategori' => 'Olahraga'],
            ['nama_kategori' => 'Otomotif'],
        ];

        foreach ($categories as $category) {
            Categori::create([
                'nama_kategori' => $category['nama_kategori'],
                'slug' => Str::slug($category['nama_kategori']),
            ]);
        }
    }
}
