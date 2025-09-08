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
            "@id": "https://gempitamilenial.org/#website",
            "url": "https://gempitamilenial.org/",
            "name": "Gempita",
            "description": "Gempita - Gerakan Milenial Pencinta Tanah Air",
            "publisher": {
                "@id": "https://gempitamilenial.org/#organization"
            },
            "potentialAction": {
                "@type": "SearchAction",
                "target": "https://gempitamilenial.org/search-result?q={search_term_string}",
                "query-input": "required name=search_term_string"
            }
        },
        {
            "@type": "WebPage",
            "@id": "https://gempitamilenial.org/#webpage",
            "url": "https://gempitamilenial.org/",
            "name": "Beranda",
            "isPartOf": {
                "@id": "https://gempitamilenial.org/#website"
            },
            "about": {
                "@id": "https://gempitamilenial.org/#organization"
            },
            "primaryImageOfPage": {
                "@type": "ImageObject",
                "url": "https://gempitamilenial.org/frontend/logo/favicon/apple-touch-icon.png"
            },
            "description": "Gempita - Gerakan Milenial Pencinta Tanah Air"
        },
        {
            "@type": "Organization",
            "@id": "https://gempitamilenial.org/#organization",
            "name": "Gempita",
            "url": "https://gempitamilenial.org/",
            "logo": {
                "@type": "ImageObject",
                "url": "https://gempitamilenial.org/frontend/logo/favicon/apple-touch-icon.png",
                "width": 250,
                "height": 60
            },
            "sameAs": [
                "https://www.tiktok.com/@dppgempita",
                    "https://www.instagram.com/dppgempita"
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
            "url": "{{ !empty($post->gambar) ? url('/storage/comp/' . (is_array($post->gambar) ? basename($post->gambar[0]) : basename($post->gambar))) : 'https://gempitamilenial.org/frontend/logo/favicon/apple-touch-icon.png' }}"
        },
        "author": {
            "@type": "Person",
            "name": "{{ $post->user->name ?? 'Gempita Reporter' }}"
        },
        "publisher": {
            "@type": "Organization",
            "name": "Gempita",
            "logo": {
                "@type": "ImageObject",
                "url": "https://gempitamilenial.org/frontend/logo/favicon/apple-touch-icon.png"
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
                "@id": "https://gempitamilenial.org/#website",
                "url": "https://gempitamilenial.org/",
                "name": "Gempita",
                "description": "Gempita - Gerakan Milenial Pencinta Tanah Air",
                "publisher": {
                    "@id": "https://gempitamilenial.org/#organization"
                },
                "potentialAction": {
                    "@type": "SearchAction",
                    "target": "https://gempitamilenial.org/search-result?q={search_term_string}",
                    "query-input": "required name=search_term_string"
                }
            },
            {
                "@type": "WebPage",
                "@id": "{{ url()->current() }}",
                "url": "{{ url()->current() }}",
                "name": "Gempita - {{ ucwords(str_replace('-', ' ', last(request()->segments()))) }}",
                "isPartOf": {
                    "@id": "https://gempitamilenial.org/#website"
                },
                "about": {
                    "@id": "https://gempitamilenial.org/#organization"
                },
                "primaryImageOfPage": {
                    "@type": "ImageObject",
                    "url": "https://gempitamilenial.org/frontend/logo/favicon/apple-touch-icon.png"
                },
                "description": "Baca berita terkini dan terpercaya di kategori {{ ucwords(str_replace('-', ' ', last(request()->segments()))) }} hanya di Gempita.",
                "datePublished": "2024-01-01",
                "dateModified": "2025-07-21"
            },
            {
                "@type": "Organization",
                "@id": "https://gempitamilenial.org/#organization",
                "name": "Gempita",
                "url": "https://gempitamilenial.org/",
                "logo": {
                    "@type": "ImageObject",
                    "url": "https://gempitamilenial.org/frontend/logo/favicon/apple-touch-icon.png",
                    "width": 250,
                    "height": 60
                },
                "sameAs": [
                    "https://www.tiktok.com/@dppgempita",
                    "https://www.instagram.com/dppgempita"
                ]
            }
        ]
    }

</script>
@endif
