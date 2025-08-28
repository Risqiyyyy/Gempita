<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory()->create([
        //     'name' => 'Konrix',
        //     'email' => 'konrix@coderthemes.com',
        //     'slug' => Str::slug('Konrix'),
        //     'email_verified_at' => now(),
        //     'password' => bcrypt('password'),
        //     'remember_token' => Str::random(10),
        //     'role' => 'admin'
        // ]);
        
        $this->call([
            CategorySeeder::class,
            SubCategorySeeder::class,
            UserSeeder::class
            // PostSeeder::class
        ]);
    }
}
