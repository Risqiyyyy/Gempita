@extends('frontend.mobile.master.master-app')

<style>
    .article-detail--body img {
        width: 100% !important;
        height: auto !important;
        border-radius: 8px !important;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1) !important;
    }

    .article-detail--body iframe[src*="youtube.com"] {
        width: 100% !important;
        height: 300px !important;
        margin: 10px 0 !important;
        border-radius: 8px !important;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1) !important;
    }

    .article-detail--body i {
        display: flex;
        justify-content: center;
        padding: 10px;
        font-style: normal;
        font-weight: normal;
        font-size: 12px;
        line-height: 16px;
        color: var(--gray-color);
        background: #f2f2f2;
    }

    .bacajuga {
        margin: 0 0 1rem;
        padding: 1rem;
        background-color: #f9f9f9;
        border-left: 5px solid var(--blue-primary);
        font-style: italic;
        color: #333;
        border-radius: 5px;
        font-size: 14px;
        line-height: 1.5;
    }

    .bacajuga a {
        color: var(--blue-primary) !important;
        text-decoration: underline;
    }

    .byline-box {
        margin-top: 20px;
        margin-bottom: 15px;
        border-top: 1px solid #e5e7eb;
        font-family: inherit;
        padding-top: 15px;
        padding-bottom: 15px;
    }

    .byline-title {
        margin: 0 0 10px 0;
        font-size: 16px;
        font-weight: 700;
        color: #111827;
    }

    .byline-list {
        display: flex;
        justify-content: space-between;
        margin-top: 20px;
        align-items: center;
        gap: 40px;
        flex-wrap: wrap;
    }

    .byline-item {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .byline-avatar {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-weight: 700;
        font-size: 14px;
        user-select: none;
        flex: 0 0 36px;
    }

    .byline-avatar--purple {
        background: #7c4dff;
    }

    .byline-avatar--orange {
        background: #ffa226;
        color: #222;
    }

    .byline-info {
        line-height: 1.2;
    }

    .byline-role {
        display: block;
        font-size: 12px;
        color: #6b7280;
    }

    .byline-name {
        display: block;
        font-size: 14px;
        color: #111827;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 320px;
    }
</style>
@section('content')
    <div class="kanal-wrap">
        <h3 class="base-title-desc">
            @if ($post->subCategory)
                {{ $post->subCategory->nama_sub_kategori }}
            @else
                {{ $post->kategori->nama_kategori }}
            @endif
        </h3>
        <div class="date">{{ \Carbon\Carbon::parse($post->created_at)->translatedFormat('l, d F Y | H:i') }} WIB </div>
    </div>
    <article class="article-detail">
        <div class="t5-b20">
            <h1 class="article-detail--title">{{ $post->title }}</h1>
        </div>
        <div class="share-baru-header">
            <?php $url = urlencode(url()->current()); ?>

            <a href="https://www.facebook.com/sharer/sharer.php?u={{ $url }}" target="_blank">
                <img src="{{ asset('frontend/icons/fb.svg') }}" alt="Facebook">
            </a>

            <!-- Twitter -->
            <a href="https://twitter.com/intent/tweet?url={{ $url }}" target="_blank">
                <img src="{{ asset('frontend/icons/twitter.svg') }}" alt="Twitter">
            </a>

            <!-- Telegram -->
            <a href="https://t.me/share/url?url={{ $url }}" target="_blank">
                <img src="{{ asset('frontend/icons/tele.svg') }}" alt="Telegram">
            </a>

            <!-- WhatsApp -->
            <a href="https://api.whatsapp.com/send?text={{ $url }}" target="_blank">
                <img src="{{ asset('frontend/icons/wa.svg') }}" alt="WhatsApp">
            </a>

            <!-- Copy Link -->
            <a href="{{ url($post->slug) }}" onclick="copyToClipboard()">
                <img src="{{ asset('frontend/icons/link.svg') }}" alt="Copy Link">
            </a>
        </div>
        <figure class="article-detail-figure">
            <img alt="{{ $post->title }}"
                src="{{ asset('storage/comp/' . (is_array($post->gambar) ? basename($post->gambar[0]) : basename($post->gambar))) }}"
                class="card-headline-img" />
            <figcaption>{{ $post->image_caption }}</figcaption>
        </figure>
        <a href="#!" rel="">
            <div class="banner-ads--big">
                @include('frontend.mobile.components.ads-7')
            </div>
        </a>
        <div class="t0-b20">
            <div class="article-detail--body">
                <p>{!! $formatted_content !!}</p>
                <div class="gliaplayer-container mb-3" data-slot="id_ftnews_mobile"></div>
            </div>
                @if($post->multipages === 'yes' && isset($totalPages) && $totalPages > 1)
                    <div class="article-detail-pagination">
                        @for($i = 1; $i <= $totalPages; $i++)
                            <a href="?page={{ $i }}" class="{{ $currentPage == $i ? 'active' : '' }}">{{ $i }}</a>
                        @endfor
                        <a href="?page=all" class="show-all {{ $currentPage == 'all' ? 'active' : '' }}">Tampilkan Semua</a>
                    </div>
                @endif
                @php
                    $editorName = $post->user->name ?? 'Editor';
                    $reporterName = $post->reporter->name ?? 'Reporter';

                    $getInitial = fn($name) => mb_strtoupper(mb_substr(trim($name), 0, 1, 'UTF-8'), 'UTF-8');

                    $svgAvatar = function (string $initial, string $bg = '#7c4dff', string $fg = '#ffffff'): string {
                    $svg = "
                    <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"72\" height=\"72\" viewBox=\"0 0 72 72\">
                    <rect width=\"72\" height=\"72\" rx=\"36\" fill=\"$bg\"/>
                    <text x=\"50%\" y=\"50%\" text-anchor=\"middle\" dominant-baseline=\"middle\"
                            font-family=\"Inter, Arial, sans-serif\" font-size=\"34\" font-weight=\"700\" fill=\"$fg\">$initial</text>
                    </svg>";
                    
                    return 'data:image/svg+xml;utf8,' . rawurlencode($svg);
                    };

                    // Inisial + avatar
                    $editorInitial = $getInitial($editorName);
                    $reporterInitial = $getInitial($reporterName);
                    $editorAvatarSrc = $svgAvatar($editorInitial, '#264283', '#ffffff');
                    $reporterAvatarSrc = $svgAvatar($reporterInitial, '#2492b9', '#ffffff');
                @endphp


            <!-- Bagian Penulis -->
            <div class="byline-box">
                <h4 class="byline-title">Artikel ini ditulis oleh</h4>

                <div class="byline-list">
                    <div class="byline-item">
                        <img class="byline-avatar" src="{{ $editorAvatarSrc }}" alt="{{ $editorInitial }}">
                        <div class="byline-info">
                            <small class="byline-role">Editor</small>
                            <strong class="byline-name">{{ $editorName }}</strong>
                        </div>
                    </div>

                        @if (optional($post->reporter)->name)
                            <div class="byline-item">
                                <img class="byline-avatar" src="{{ $reporterAvatarSrc }}" alt="{{ $reporterInitial }}">
                                <div class="byline-info">
                                    <small class="byline-role">Reporter</small>
                                    <strong class="byline-name">{{ $reporterName }}</strong>
                                </div>
                            </div>
                        @endif
                </div>
            </div>

            <div class="article-detail-tag">
                <span class="label card-headline-no-image-title">Tag</span>
                @foreach ($tagsdetail as $index => $tags)
                    <a href="{{ route('bytag', ['slug' => $tags->slug]) }}" class="tag-item"> {{ $tags->nama_tags }}</a>
                @endforeach
            </div>
            <div class="share-baru-bottom mb-20">
                <?php $url = urlencode(url()->current()); ?>

                <a href="https://www.facebook.com/sharer/sharer.php?u={{ $url }}" target="_blank">
                    <img src="{{ asset('frontend/icons/fb.svg') }}" alt="Facebook">
                </a>

                <!-- Twitter -->
                <a href="https://twitter.com/intent/tweet?url={{ $url }}" target="_blank">
                    <img src="{{ asset('frontend/icons/twitter.svg') }}" alt="Twitter">
                </a>

                <!-- Telegram -->
                <a href="https://t.me/share/url?url={{ $url }}" target="_blank">
                    <img src="{{ asset('frontend/icons/tele.svg') }}" alt="Telegram">
                </a>

                <!-- WhatsApp -->
                <a href="https://api.whatsapp.com/send?text={{ $url }}" target="_blank">
                    <img src="{{ asset('frontend/icons/wa.svg') }}" alt="WhatsApp">
                </a>

                <!-- Copy Link -->
                <a href="{{ url($post->slug) }}" onclick="copyToClipboard()">
                    <img src="{{ asset('frontend/icons/link.svg') }}" alt="Copy Link">
                </a>
            </div>
        </div>
    </article>

    <div data-type="_mgwidget" data-widget-id="1799018">
    </div>
    <script>
        (function(w, q) {
            w[q] = w[q] || [];
            w[q].push(["_mgc.load"])
        })(window, "_mgq");
    </script>
    <!-- terpopuler -->
    <div class="mt-20 bg1">
        <h3 class="base-title pl-20 pt-20">Terpopuler</h3>
        <div class="list">
            @foreach ($postTerpopuler as $item)
                <div class="list-element">
                    <article class="main-card">
                        <div class="main-card--infoml0">
                            <h4 class="main-card--title">
                                <a href="{{ route('detail.desktop', ['slug' => $item->slug]) }}">{{ $item->title }}</a>
                            </h4>
                            <div class="category-and-time">
                                <span>{{ \Carbon\Carbon::parse($item->created_at)->format('H:i') }} WIB</span>
                            </div>
                        </div>
                    </article>
                </div>
            @endforeach
        </div>
    </div>
    <!-- end terpopuler -->

    @include('frontend.mobile.components.ads-mediumRectangle-1')

    <!-- dangdut -->
    <div class="mt-20">
        <h3 class="base-title pl-20 mb-10">{{ $post->kategori->nama_kategori }}</h3>
        @foreach ($relatedPosts->take(1) as $item)
            <article class="card-headline">
                <img alt="{{ $item->title }}" class="card-headline-img"
                    src="{{ asset('storage/comp/' . (is_array($item->gambar) ? basename($item->gambar[0]) : basename($item->gambar))) }}" />
                <div class="card-headline-info">
                    <h4 class="card-headline-title">
                        <a href="{{ route('detail.desktop', ['slug' => $item->slug]) }}">{{ $item->title }}</a>
                    </h4>
                    <p class="card-headline-desc">{!! Str::limit(strip_tags($item->content), 100) !!}</p>
                </div>
            </article>
        @endforeach
        <div>
            @foreach ($relatedPosts->slice(1, 5) as $item)
                <article class="main-card">
                    <div class="main-card-img-wrap">
                        <img alt="{{ $item->title }}" class="main-card-img"
                            src="{{ asset('storage/comp/' . (is_array($item->gambar) ? basename($item->gambar[0]) : basename($item->gambar))) }}" />
                    </div>
                    <div class="main-card--info">
                        <h4 class="main-card--title">
                            <a href="{{ route('detail.desktop', ['slug' => $item->slug]) }}">{{ $item->title }}</a>
                        </h4>
                        <div class="category-and-time">
                            <span>{{ \Carbon\Carbon::parse($item->created_at)->format('H:i') }} WIB</span>
                        </div>
                    </div>
                </article>
            @endforeach
            @if ($post->kategori)
                <div class="t10-b20 mb-20">
                    <a href="{{ route('kanal.desktop', ['slug' => $post->kategori->slug]) }}">
                        <button class="main-card-loadmore">Selengkapnya</button>
                    </a>
                </div>
            @endif
        </div>
    </div>
    <!-- end Dangdut -->

    @include('frontend.mobile.components.ads-mediumRectangle-2')

    <!-- start terkini -->
    <div class="mt-20">
        <h3 class="base-title pl-20">Terkini</h3>
        <div>
            <div class="list">
                @foreach ($postTerkini as $item)
                    <div class="list-element">
                        <article class="main-card">
                            <div class="main-card-img-wrap">
                                <img alt="{{ $item->title }}" class="main-card-img"
                                    src="{{ asset('storage/comp/' . (is_array($item->gambar) ? basename($item->gambar[0]) : basename($item->gambar))) }}" />
                            </div>
                            <div class="main-card--info">
                                <h4 class="main-card--title">
                                    <a
                                        href="{{ route('detail.desktop', ['slug' => $item->slug]) }}">{{ $item->title }}</a>
                                </h4>
                                <div class="category-and-time">
                                    @if ($item->subCategory)
                                        <a
                                            href="{{ route('subcateg.desktop', ['categ' => $item->kategori->slug, 'subcateg' => $item->subCategory->slug]) }}">
                                            {{ $item->subCategory->nama_sub_kategori }}
                                        </a>
                                    @else
                                        <a href="{{ route('kanal.desktop', ['slug' => $item->kategori->slug]) }}">
                                            {{ $item->kategori->nama_kategori }}
                                        </a>
                                    @endif
                                    <span>{{ $item->created_at ? \Carbon\Carbon::parse($item->created_at)->isoFormat('DD MMMM YYYY') : '' }}
                                        |</span>
                                    <span>{{ $item->created_at ? \Carbon\Carbon::parse($item->created_at)->format('H:i:s') : '' }}</span>
                                </div>
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>
            <div class="t10-b20 mb-20">
                <a href="/indeks">
                    <button class="main-card-loadmore">Selengkapnya</button>
                </a>
            </div>
            <script>
                function copyToClipboard() {
                    var tempInput = document.createElement("input");
                    tempInput.value = window.location.href;
                    document.body.appendChild(tempInput);
                    tempInput.select();
                    document.execCommand("copy");
                    document.body.removeChild(tempInput);
                    alert("Link copied to clipboard!");
                }
            </script>
            @if ($post->adult === 'yes')
                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        const adSelectors = [
                            '.adsbygoogle',
                            '.ad-popup',
                            '.popup-ad',
                            '#ad_position_box',
                            'adsbygoogle adsbygoogle-noablate',
                        ];

                        adSelectors.forEach(selector => {
                            document.querySelectorAll(selector).forEach(el => {
                                el.remove();
                            });
                        });
                    });
                </script>
            @endif
        @endsection
