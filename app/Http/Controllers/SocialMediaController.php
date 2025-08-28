<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SocialMediaController extends Controller
{
    private function getRedirectLocation($url)
    {
        $ch = curl_init($url);

        curl_setopt_array($ch, [
            CURLOPT_HEADER => true,
            CURLOPT_NOBODY => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => false,
            CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)',
        ]);

        $response = curl_exec($ch);
        curl_close($ch);

        if (preg_match('/^location:\s*(.+)$/im', $response, $matches)) {
            return trim($matches[1]);
        }

        throw new \Exception("Location header tidak ditemukan.");
    }

    public function getFacebookEmbedUrl(Request $request)
    {
        try {
            $url = $request->input('url');

            if (!filter_var($url, FILTER_VALIDATE_URL)) {
                return response()->json(['error' => 'URL tidak valid'], 400);
            }

            $redirectUrl = $this->getRedirectLocation($url);

            $embedUrl = 'https://www.facebook.com/plugins/post.php?href=' . urlencode($redirectUrl);

            return response()->json([
                'embed_url' => $embedUrl
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Gagal mendapatkan redirect URL',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}

