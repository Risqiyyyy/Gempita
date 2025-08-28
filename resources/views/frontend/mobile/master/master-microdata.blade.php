@php
$path = request()->path();
$canonical = request()->is('/')
? config('app.url')
: (isset($post) && isset($post->slug)
? url($post->slug)
: config('app.url'));
@endphp

@if (request()->is('/'))
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@graph": [
        {
            "@type": "WebSite",
            "@id": "https://ftnews.co.id/#website",
            "url": "https://ftnews.co.id/",
            "name": "FTNews",
            "description": "FTNews - Berita terkini hari ini, nasional, hukum, politik, daerah, metropolitan, lifestyle, kesehatan",
            "publisher": {
                "@id": "https://ftnews.co.id/#organization"
            },
            "potentialAction": {
                "@type": "SearchAction",
                "target": "https://ftnews.co.id/search-result?q={search_term_string}",
                "query-input": "required name=search_term_string"
            }
        },
        {
            "@type": "WebPage",
            "@id": "https://ftnews.co.id/#webpage",
            "url": "https://ftnews.co.id/",
            "name": "Beranda",
            "isPartOf": {
                "@id": "https://ftnews.co.id/#website"
            },
            "about": {
                "@id": "https://ftnews.co.id/#organization"
            },
            "primaryImageOfPage": {
                "@type": "ImageObject",
                "url": "https://ftnews.co.id/images/icon-ftnews.png"
            },
            "description": "FTNews - Berita terkini hari ini, nasional, hukum, politik, daerah, metropolitan, lifestyle, kesehatan"
        },
        {
            "@type": "Organization",
            "@id": "https://ftnews.co.id/#organization",
            "name": "FTNews",
            "url": "https://ftnews.co.id/",
            "logo": {
                "@type": "ImageObject",
                "url": "https://ftnews.co.id/images/icon-ftnews.png",
                "width": 250,
                "height": 60
            },
            "sameAs": [
                "https://www.facebook.com/ftnewscoid",
                "https://instagram.com/ftnews.co.id"
            ]
        }
    ]
}
</script>

@elseif (isset($post) && isset($post->slug) && $path === $post->slug)
<script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "NewsArticle",
        "mainEntityOfPage": {
            "@type": "WebPage",
            "@id": "{{ url($post->slug) }}"
        },
        "headline": "{{ Str::limit(strip_tags($post->title), 110, '') }}",
        "description": "{{ Str::limit(strip_tags($post->description ?? $post->content), 160, '') }}",
        "image": {
            "@type": "ImageObject",
            "url": "{{ !empty($post->gambar) ? url('/storage/comp/' . (is_array($post->gambar) ? basename($post->gambar[0]) : basename($post->gambar))) : 'https://ftnews.co.id/images/icon-ftnews.png' }}"
        },
        "author": {
            "@type": "Person",
            "name": "{{ $post->user->name ?? 'FTNews Reporter' }}"
        },
        "publisher": {
            "@type": "Organization",
            "name": "FTNews",
            "logo": {
                "@type": "ImageObject",
                "url": "https://ftnews.co.id/images/icon-ftnews.png"
            }
        },
        "datePublished": "{{ \Carbon\Carbon::parse($post->created_at)->toIso8601String() }}",
        "dateModified": "{{ \Carbon\Carbon::parse($post->updated_at)->toIso8601String() }}"
    }

</script>
@else
<script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@graph": [{
                "@type": "WebSite",
                "@id": "https://ftnews.co.id/#website",
                "url": "https://ftnews.co.id/",
                "name": "FTNews",
                "description": "FTNews - Berita terkini hari ini, nasional, hukum, politik, daerah, metropolitan, lifestyle, kesehatan",
                "publisher": {
                    "@id": "https://ftnews.co.id/#organization"
                },
                "potentialAction": {
                    "@type": "SearchAction",
                    "target": "https://ftnews.co.id/search-result?q={search_term_string}",
                    "query-input": "required name=search_term_string"
                }
            },
            {
                "@type": "WebPage",
                "@id": "{{ url()->current() }}",
                "url": "{{ url()->current() }}",
                "name": "FTNews - {{ ucwords(str_replace('-', ' ', last(request()->segments()))) }}",
                "isPartOf": {
                    "@id": "https://ftnews.co.id/#website"
                },
                "about": {
                    "@id": "https://ftnews.co.id/#organization"
                },
                "primaryImageOfPage": {
                    "@type": "ImageObject",
                    "url": "https://ftnews.co.id/images/icon-ftnews.png"
                },
                "description": "Baca berita terkini dan terpercaya di kategori {{ ucwords(str_replace('-', ' ', last(request()->segments()))) }} hanya di FTNews.",
                "datePublished": "2024-01-01",
                "dateModified": "2025-07-21"
            },
            {
                "@type": "Organization",
                "@id": "https://ftnews.co.id/#organization",
                "name": "FTNews",
                "url": "https://ftnews.co.id/",
                "logo": {
                    "@type": "ImageObject",
                    "url": "https://ftnews.co.id/images/icon-ftnews.png",
                    "width": 250,
                    "height": 60
                },
                "sameAs": [
                    "https://www.facebook.com/ftnewscoid",
                    "https://instagram.com/ftnews.co.id"
                ]
            }
        ]
    }

</script>
@endif
