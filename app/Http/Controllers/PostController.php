<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
class PostController extends Controller
{
    public function mediaDashboard()
    {
        return view('backend.pages.media.index');
    }

    public function store(Request $request)
    {
        // Validasi
        $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'category' => 'required|string|in:general,members,news',
            'image' => 'required|file|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        // Simpan data post
        $post = Post::create($request->only(['title', 'content', 'category']));

        // Tambahkan media
        if ($request->hasFile('image')) {
            $post->addMedia($request->file('image'))->toMediaCollection('images');
        }

        return redirect()->route('media.index')->with('success', 'Media berhasil ditambahkan!');
    }
}
