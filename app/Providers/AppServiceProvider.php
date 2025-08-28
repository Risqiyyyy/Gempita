<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Categori;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    public function boot(): void
{
    if (Schema::hasTable('posts') && Schema::hasTable('categories')) {
        View::composer('*', function ($view) {

            $postTerpopuler = Post::with('kategori', 'user')
                ->where('status', 'public')
                ->whereBetween('created_at', [
                    Carbon::now('Asia/Jakarta')->subDays(3)->startOfDay(),
                    Carbon::now('Asia/Jakarta')->endOfDay(),
                ])
                ->orderBy('view', 'desc')
                ->take(5)
                ->get();

            if ($postTerpopuler->isEmpty()) {
                $postTerpopuler = Post::with('kategori', 'user')
                    ->where('status', 'public')
                    ->whereBetween('created_at', [
                        Carbon::now('Asia/Jakarta')->subDays(30)->startOfDay(),
                        Carbon::now('Asia/Jakarta')->endOfDay(),
                    ])
                    ->orderBy('view', 'desc')
                    ->take(5)
                    ->get();
            }

            $categories = Categori::with('subCategories')->get();

            $view->with(compact('postTerpopuler', 'categories'));
        });
    }
}

    
    
}
