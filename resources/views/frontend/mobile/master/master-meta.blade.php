<meta charset="utf-8">
<title>
    {{ request()->is('/') ? 'Gempita - Gerakan Milenial Pencinta Tanah Air' : ($post->title ?? 'Gempita - Gerakan Milenial Pencinta Tanah Air') }}
</title>
<meta name="description" content="
    {{ request()->is('/') ? 'Gempita - Gerakan Milenial Pencinta Tanah Air' : ($post->description ?? 'Gempita - Gerakan Milenial Pencinta Tanah Air') }}
">
<meta name="keywords" content="
    {{ request()->is('/') ? 'news, updates, Gempita' : ($post->keyword ?? 'news, updates, Gempita') }}
">
<meta name="viewport" content="width=device-width, initial-scale=1">

<meta name="robots" content="index, follow">
<link rel="canonical" href="{{ request()->is('/') ? config('app.url') : (isset($post->slug) ? url($post->slug) : url()->current()) }}" />

<!-- Open Graph Meta Tags -->
<meta property="og:title" content="
    {{ request()->is('/') ? 'Gempita' : ($post->title ?? 'Gempita') }}
">
<meta property="og:description" content="
    {{ request()->is('/') ? 'Gempita - Gerakan Milenial Pencinta Tanah Air' : ($post->description ?? 'Gempita - Gerakan Milenial Pencinta Tanah Air') }}
">
<meta property="og:image" content="
    {{
        !empty($post->gambar)
            ? (is_array($post->gambar)
                ? (isset($post->gambar[0])
                    ? (filter_var($post->gambar[0], FILTER_VALIDATE_URL)
                        ? $post->gambar[0]
                        : asset('storage/' . $post->gambar[0]))
                    : 'https://staging.gempitamilenial.org/frontend/logo/favicon/apple-touch-icon.png')
                : (filter_var($post->gambar, FILTER_VALIDATE_URL)
                    ? $post->gambar
                    : asset('storage/' . $post->gambar)))
            : 'https://staging.gempitamilenial.org/frontend/logo/favicon/apple-touch-icon.png'
    }}
">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:type" content="website">
<meta property="og:site_name" content="Gempita">

<!-- Twitter Card Meta Tags -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="
    {{ request()->is('/') ? 'Gempita' : ($post->title ?? 'Gempita') }}
">
<meta name="twitter:description" content="
    {{ request()->is('/') ? 'Gempita - Gerakan Milenial Pencinta Tanah Air' : ($post->description ?? 'Gempita - Gerakan Milenial Pencinta Tanah Air') }}
">
<meta name="twitter:image" content="
    {{
        !empty($post->gambar)
            ? (is_array($post->gambar)
                ? (isset($post->gambar[0])
                    ? (filter_var($post->gambar[0], FILTER_VALIDATE_URL)
                        ? $post->gambar[0]
                        : asset('storage/' . $post->gambar[0]))
                    : 'https://staging.gempitamilenial.org/frontend/logo/favicon/apple-touch-icon.png')
                : (filter_var($post->gambar, FILTER_VALIDATE_URL)
                    ? $post->gambar
                    : asset('storage/' . $post->gambar)))
            : 'https://staging.gempitamilenial.org/frontend/logo/favicon/apple-touch-icon.png'
    }}
">

<!-- Favicon -->
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('frontend/logo/favicon/apple-touch-icon.png') }}">
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('frontend/logo/favicon/favicon-32x32.png') }}">
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('frontend/logo/favicon/favicon-16x16.png') }}">
<link rel="manifest" href="{{ asset('frontend/logo/favicon/site.webmanifest') }}">

<meta name="theme-color" content="#030303">
