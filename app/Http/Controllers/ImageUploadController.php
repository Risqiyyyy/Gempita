<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Spatie\MediaLibrary\Models\Media;


class ImageUploadController extends Controller
{

    public function show()
    {
        $mediaItems = Media::all();
        return view('media-modal', compact('mediaItems'));
    }

    public function select($id)
    {
        $media = Media::find($id);
        return response()->json([
            'url' => $media->getUrl()
        ]);
    }

    public function uploadImage(Request $request)
    {
        if ($request->hasFile('upload')) {
            try {
                $file = $request->file('upload');

                $post = new Post();

                $media = $post->addMedia($file)->toMediaCollection('images');

                $url = $media->getUrl();

                return response()->json([
                    'uploaded' => 1,
                    'fileName' => $media->file_name,
                    'url' => $url
                ]);
            } catch (\Exception $e) {
                return response()->json([
                    'uploaded' => 0,
                    'error' => ['message' => 'File upload failed: ' . $e->getMessage()]
                ]);
            }
        }
        return response()->json(['uploaded' => 0, 'error' => ['message' => 'No file uploaded']]);
    }
}
