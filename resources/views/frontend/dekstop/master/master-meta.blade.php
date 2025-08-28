<meta charset="utf-8">
<title>{{ request()->is('/') ? 'FTNews | Akurat Menyajikan Informasi, Berita Terkini, Kabar Terbaru Indonesia dan Internasional' : ($post->title ?? 'FTNews | Akurat Menyajikan Informasi, Berita Terkini, Kabar Terbaru Indonesia dan Internasional') }}</title>
<meta name="description" content="{{ request()->is('/') ? 'FTNews - Berita terkini hari ini, nasional, hukum, politik, daerah, metropolitan, lifestyle, kesehatan' : ($post->description ?? 'FTNews - Berita terkini hari ini, nasional, hukum, politik, daerah, metropolitan, lifestyle, kesehatan') }}">
<meta name="keywords" content="{{ request()->is('/') ? 'news, updates, FTNews' : ($post->keyword ?? 'news, updates, FTNews') }}">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="index, follow">
<link rel="canonical" href="{{ request()->is('/') ? config('app.url') : (isset($post->slug) ? url($post->slug) : url()->current()) }}" />

<!-- Open Graph Meta Tags -->
<meta property="og:title" content="{{ request()->is('/') ? 'FTNews' : ($post->title ?? 'FTNews') }}">
<meta property="og:description" content="{{ request()->is('/') ? 'FTNews - Berita terkini hari ini, nasional, hukum, politik, daerah, metropolitan, lifestyle, kesehatan' : ($post->description ?? 'FTNews - Berita terkini hari ini, nasional, hukum, politik, daerah, metropolitan, lifestyle, kesehatan') }}">
<meta property="og:image" content="{{ !empty($post->gambar) ? asset('storage/comp/' . (is_array($post->gambar) ? basename($post->gambar[0]) : basename($post->gambar))) : 'https://ftnews.co.id/images/icon-ftnews.png' }}">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:type" content="website">
<meta property="og:site_name" content="FTNews">

<!-- Twitter Card Meta Tags -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ request()->is('/') ? 'FTNews' : ($post->title ?? 'FTNews') }}">
<meta name="twitter:description" content="{{ request()->is('/') ? 'FTNews - Berita terkini hari ini, nasional, hukum, politik, daerah, metropolitan, lifestyle, kesehatan' : ($post->description ?? 'FTNews - Berita terkini hari ini, nasional, hukum, politik, daerah, metropolitan, lifestyle, kesehatan') }}">
<meta name="twitter:image" content="{{ !empty($post->gambar) ? asset('storage/comp/' . (is_array($post->gambar) ? basename($post->gambar[0]) : basename($post->gambar))) : 'https://ftnews.co.id/images/icon-ftnews.png' }}">

<!-- Favicon -->
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('frontend/logo/favicon/apple-touch-icon.png') }}">
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('frontend/logo/favicon/favicon-32x32.png') }}">
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('frontend/logo/favicon/favicon-16x16.png') }}">
<link rel="manifest" href="{{ asset('frontend/logo/favicon/site.webmanifest') }}">

<meta name="theme-color" content="#030303">
