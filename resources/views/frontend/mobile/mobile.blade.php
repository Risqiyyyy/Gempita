@extends('frontend.mobile.master.master-app')

@section('content')
    <div>
        {{-- ================= HEADLINE ================= --}}
        <div>
            @if ($topPostheadline)
                @php
                    $images = $topPostheadline->gambar ?? [];
                    if (is_string($images)) $images = explode('|', $images);
                @endphp
                <article class="card-headline">
                    <a href="{{ route('detail.desktop', ['slug' => $topPostheadline->slug]) }}">
                        <img alt="{{ $topPostheadline->title }}" class="card-headline-img"
                            src="{{ isset($images[0]) ? asset('storage/comp/' . basename($images[0])) : '' }}" />
                    </a>
                    <div class="card-headline-info">
                        <div class="category-and-time">
                            <span>
                                @if ($topPostheadline->subCategory)
                                    <a href="{{ route('kanal.desktop', ['slug' => $topPostheadline->slug]) }}">
                                        {{ $topPostheadline->kategori->nama_kategori }}
                                    </a>|
                                    <a href="{{ route('subcateg.desktop', ['categ' => $topPostheadline->kategori->slug, 'subcateg' => $topPostheadline->subCategory->slug]) }}">
                                        {{ $topPostheadline->subCategory->nama_sub_kategori }}
                                    </a>
                                @else
                                    <a href="{{ route('kanal.desktop', ['slug' => $topPostheadline->slug]) }}">
                                        {{ $topPostheadline->kategori->nama_kategori }}
                                    </a>
                                @endif
                                <span>{{ $topPostheadline->created_at? \Carbon\Carbon::parse($topPostheadline->created_at)->isoFormat('DD MMMM YYYY') : '' }} |</span>
                                <span>{{ $topPostheadline->created_at? \Carbon\Carbon::parse($topPostheadline->created_at)->format('H:i:s') : '' }}</span>
                            </span>
                        </div>
                        <h4 class="card-headline-title">
                            <a href="{{ route('detail.desktop', ['slug' => $topPostheadline->slug]) }}">
                                {{ $topPostheadline->title }}
                            </a>
                        </h4>
                        <p class="card-headline-desc">{!! Str::limit(strip_tags($topPostheadline->content), 60) !!}</p>
                    </div>
                </article>
            @else
                <p>No post found.</p>
            @endif

            <div class="card-headline-small-wrap">
                @foreach ($otherPostsheadline->take(4) as $item)
                    <article class="card-headline-small">
                        <img alt="{{ $item->title }}" class="card-headline-small-img"
                            src="{{ asset('storage/comp/' . basename(is_array($item->gambar)? $item->gambar[0] : $item->gambar)) }}" />
                        <div class="card-headline-small-info">
                            <h4 class="card-headline-small-title">
                                <a href="{{ route('detail.desktop', ['slug' => $item->slug]) }}">{{ $item->title }}</a>
                            </h4>
                            <div class="category-and-time-head">
                                <span>{{ $item->created_at? \Carbon\Carbon::parse($item->created_at)->isoFormat('DD MMMM YYYY') : '' }} |</span>
                                <span>{{ $item->created_at? \Carbon\Carbon::parse($item->created_at)->format('H:i:s') : '' }}</span>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>

        {{-- ================= TERPOPULER ================= --}}
        <div class="mb-20 bg1">
            <h3 class="base-title pl-20 pt-20 fw-bold">Terpopuler</h3>
            <div class="list">
                @foreach ($postTerpopuler as $item)
                    <div class="list-element">
                        <article class="main-card">
                            <div class="main-card--infoml0">
                                <h4 class="main-card--title">
                                    <a href="{{ route('detail.desktop', ['slug' => $item->slug]) }}">
                                        {{ $item->title }}
                                    </a>
                                </h4>
                                <div class="category-and-time">
                                    <span>{{ $item->created_at? \Carbon\Carbon::parse($item->created_at)->isoFormat('DD MMMM YYYY') : '' }} |</span>
                                    <span>{{ $item->created_at? \Carbon\Carbon::parse($item->created_at)->format('H:i:s') : '' }}</span>
                                </div>
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>
        </div>

        @include('frontend.mobile.components.ads-3')

        {{-- ================= LOOP KATEGORI DINAMIS ================= --}}
        @foreach ($postsByCategory as $categoryName => $posts)
            <div class="mt-20">
                <h3 class="base-title pl-20 mb-10 fw-bold">{{ $categoryName }}</h3>

                {{-- TOP POST --}}
                @if ($posts['top'])
                    @php $images = $posts['top']->gambar ?? []; @endphp
                    <article class="card-headline">
                        <img alt="{{ $posts['top']->title }}" class="card-headline-img"
                            src="{{ isset($images[0]) ? asset('storage/comp/' . basename($images[0])) : '' }}" />
                        <div class="card-headline-info">
                            <h4 class="card-headline-title">
                                <a href="{{ route('detail.desktop', ['slug' => $posts['top']->slug]) }}">
                                    {{ $posts['top']->title }}
                                </a>
                            </h4>
                            <div class="category-and-time">
                                <p class="card-headline-desc">{!! Str::limit(strip_tags($posts['top']->content), 60) !!}</p>
                                <span>{{ $posts['top']->created_at? \Carbon\Carbon::parse($posts['top']->created_at)->isoFormat('DD MMMM YYYY') : '' }} |</span>
                                <span>{{ $posts['top']->created_at? \Carbon\Carbon::parse($posts['top']->created_at)->format('H:i:s') : '' }}</span>
                            </div>
                        </div>
                    </article>
                @endif

                {{-- OTHER POSTS --}}
                <div>
                    @foreach ($posts['others'] as $post)
                        <article class="main-card">
                            <div class="main-card-img-wrap">
                                <img alt="{{ $post->title }}" class="main-card-img"
                                    src="{{ $post->gambar }}" />
                            </div>
                            <div class="main-card--info">
                                <h4 class="main-card--title">
                                    <a href="{{ route('detail.desktop', ['slug' => $post->slug]) }}">
                                        {{ $post->title }}
                                    </a>
                                </h4>
                                <div class="category-and-time">
                                    <span>{{ $post->created_at? \Carbon\Carbon::parse($post->created_at)->isoFormat('DD MMMM YYYY') : '' }} |</span>
                                    <span>{{ $post->created_at? \Carbon\Carbon::parse($post->created_at)->format('H:i:s') : '' }}</span>
                                </div>
                            </div>
                        </article>
                    @endforeach
                    <div class="t10-b20 mb-20">
                        <a href="{{ route('kanal.desktop', ['slug' => Str::slug($categoryName)]) }}">
                            <button class="main-card-loadmore">Selengkapnya</button>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach

        @include('frontend.mobile.components.ads-6')

        {{-- ================= TERKINI ================= --}}
        <div class="mt-20">
            <h3 class="base-title pl-20 fw-bold">Terkini</h3>
            <div class="list">
                @foreach ($postTerkini as $post)
                    <div class="list-element">
                        <article class="main-card">
                            <div class="main-card-img-wrap">
                                <img alt="{{ $post->title }}" class="main-card-img"
                                    src="{{ asset('storage/comp/' . basename(is_array($post->gambar)? $post->gambar[0] : $post->gambar)) }}" />
                            </div>
                            <div class="main-card--info">
                                <h4 class="main-card--title">
                                    <a href="{{ route('detail.desktop', ['slug' => $post->slug]) }}">
                                        {{ $post->title }}
                                    </a>
                                </h4>
                                <div class="category-and-time">
                                    <span>
                                        @if ($post->subCategory)
                                            <a href="{{ route('kanal.desktop', ['slug' => $post->slug]) }}">
                                                {{ $post->kategori->nama_kategori }}
                                            </a>|
                                            <a href="{{ route('subcateg.desktop', ['categ' => $post->kategori->slug, 'subcateg' => $post->subCategory->slug]) }}">
                                                {{ $post->subCategory->nama_sub_kategori }}
                                            </a>
                                        @else
                                            <a href="{{ route('kanal.desktop', ['slug' => $post->slug]) }}">
                                                {{ $post->kategori->nama_kategori }}
                                            </a>
                                        @endif
                                        <span>{{ $post->created_at? \Carbon\Carbon::parse($post->created_at)->isoFormat('DD MMMM YYYY') : '' }} |</span>
                                        <span>{{ $post->created_at? \Carbon\Carbon::parse($post->created_at)->format('H:i:s') : '' }}</span>
                                    </span>
                                </div>
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>
            <div class="t10-b20 mb-20">
                <button class="main-card-loadmore" id="loadmore">Tampilkan lebih banyak</button>
            </div>
        </div>
    </div>
@endsection
