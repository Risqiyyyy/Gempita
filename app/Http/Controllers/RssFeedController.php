<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class RssFeedController extends Controller
{
    public function index(Request $request)
    {
        $username = env('RSS_USERNAME', 'admin');
        $password = env('RSS_PASSWORD', 'mysecret123');

        $expectedHash = md5($username . ':' . $password);
        $providedHash = $request->query('key');

        if ($providedHash !== $expectedHash) {
            return response('Unauthorized RSS access.', 403);
        }

        $posts = Post::with('kategori','subCategory')->where('status', 'public')
            ->orderBy('created_at', 'desc')
            ->take(50)
            ->get()
            ->map(function ($post) {
                $post->two_paragraphs_text = $this->getFirstTwoParagraphsTextOnly($post->content);
                return $post;
            });

        // dd($posts);

        return Response::make(
            view('rss.feed', compact('posts')),
            200,
            ['Content-Type' => 'application/xml']
        );
    }

    private function getFirstTwoParagraphsTextOnly($html)
    {
        $doc = new \DOMDocument();
        libxml_use_internal_errors(true);
        $doc->loadHTML('<?xml encoding="utf-8" ?>' . $html);
        libxml_clear_errors();

        $paragraphs = $doc->getElementsByTagName('p');
        $texts = [];

        for ($i = 0; $i < min(1, $paragraphs->length); $i++) {
            $texts[] = trim($paragraphs->item($i)->textContent);
        }

        return implode("\n\n", $texts);
    }
}
