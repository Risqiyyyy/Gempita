@extends('frontend.dekstop.master.master-app')

@section('content')
    @include('frontend.dekstop.components.ads-1')
    <div class="content-home" id="content">
        <div class="content-article">

            {{-- ================= HEADLINE SECTION ================= --}}
            <div>
                @if ($topPostheadline)
                    @php
                        $images = $topPostheadline->gambar ?? [];
                        if (is_string($images)) $images = explode('|', $images);
                    @endphp
                    <article class="card-one-headline">
                        <a href="{{ route('detail.desktop', ['slug' => $topPostheadline->slug]) }}">
                            <img alt="{{ $topPostheadline->title }}" class="card-one-headline-img" width="310" height="230"
                                src="{{ isset($images[0]) ? asset('storage/comp/' . basename($images[0])) : '' }}" />
                        </a>
                        <div class="card-one-headline--info">
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
                            <h2 class="card-one-headline--title">
                                <a href="{{ route('detail.desktop', ['slug' => $topPostheadline->slug]) }}">
                                    {{ $topPostheadline->title }}
                                </a>
                            </h2>
                            <div class="category-and-time">
                                <div class="card-one-headline--desc">{!! Str::limit(strip_tags($topPostheadline->content), 150) !!}</div>
                            </div>
                        </div>
                    </article>
                @else
                    <p>No post found.</p>
                @endif

                <div class="card-two-wrap">
                    @foreach ($otherPostsheadline->take(4) as $item)
                        <article class="card-two-headline">
                            <div class="card-two-headline-img-wrap">
                                <img alt="{{ $item->title }}" class="card-two-headline-img" width="100" height="74"
                                    src="{{ asset('storage/comp/' . basename(is_array($item->gambar)? $item->gambar[0] : $item->gambar)) }}" />
                            </div>
                            <div class="card-two-headline--info">
                                <h4 class="card-two-headline--title">
                                    <a href="{{ route('detail.desktop', ['slug' => $item->slug]) }}">{{ $item->title }}</a>
                                </h4>
                                <div class="category-and-time">
                                    <span>{{ $item->created_at? \Carbon\Carbon::parse($item->created_at)->isoFormat('DD MMMM YYYY') : '' }} |</span>
                                    <span>{{ $item->created_at? \Carbon\Carbon::parse($item->created_at)->format('H:i:s') : '' }}</span>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>

            {{-- ================= LIST HEADLINE LAIN ================= --}}
            <div class="list mt-10">
                @foreach ($otherPostsheadline->slice(4, 10) as $item)
                    <div class="list-element">
                        <article class="main-card">
                            <div class="main-card-img-wrap">
                                <img alt="{{ $item->title }}" class="main-card-img" width="213" height="130"
                                    src="{{ asset('storage/comp/' . basename(is_array($item->gambar)? $item->gambar[0] : $item->gambar)) }}" />
                            </div>
                            <div class="main-card--info">
                                <h4 class="main-card--title">
                                    <a href="{{ route('detail.desktop', ['slug' => $item->slug]) }}">{{ $item->title }}</a>
                                </h4>
                                <p class="main-card--desc">{!! Str::limit(strip_tags($item->content), 150) !!} </p>
                                <div class="category-and-time">
                                    <span>
                                        @if ($item->subCategory)
                                            <a href="{{ route('kanal.desktop', ['slug' => $item->slug]) }}">
                                                {{ $item->kategori->nama_kategori }}
                                            </a>|
                                            <a href="{{ route('subcateg.desktop', ['categ' => $item->kategori->slug, 'subcateg' => $item->subCategory->slug]) }}">
                                                {{ $item->subCategory->nama_sub_kategori }}
                                            </a>
                                        @else
                                            <a href="{{ route('kanal.desktop', ['slug' => $item->slug]) }}">
                                                {{ $item->kategori->nama_kategori }}
                                            </a>
                                        @endif
                                        <span>{{ $item->created_at? \Carbon\Carbon::parse($item->created_at)->isoFormat('DD MMMM YYYY') : '' }} |</span>
                                        <span>{{ $item->created_at? \Carbon\Carbon::parse($item->created_at)->format('H:i:s') : '' }}</span>
                                    </span>
                                </div>
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>
            <div>
                <button class="main-card-loadmore" id="loadmore">Tampilkan lebih banyak</button>
            </div>

            {{-- ================= DINAMIS KATEGORI LOOP ================= --}}
            @foreach ($postsByCategory as $categoryName => $posts)
                <div class="mt-20">
                    <h3 class="card-headline-no-image-title fw-bold">{{ $categoryName }}</h3>

                    {{-- TOP POST --}}
                    @if ($posts['top'])
                        @php $images = $posts['top']->gambar ?? []; @endphp
                        <article class="card-one-headline">
                            <img alt="{{ $posts['top']->title }}" class="card-one-headline-img" width="310" height="230"
                                src="{{ isset($images[0]) ? asset('storage/comp/' . basename($images[0])) : '' }}" />
                            <div class="card-one-headline--info">
                                <h2 class="card-one-headline--title">
                                    <a href="{{ route('detail.desktop', ['slug' => $posts['top']->slug]) }}">
                                        {{ $posts['top']->title }}
                                    </a>
                                </h2>
                                <div class="category-and-time">
                                    <div class="card-one-headline--desc">{!! Str::limit(strip_tags($posts['top']->content), 150) !!}</div>
                                    <span>{{ $posts['top']->created_at? \Carbon\Carbon::parse($posts['top']->created_at)->isoFormat('DD MMMM YYYY') : '' }} |</span>
                                    <span>{{ $posts['top']->created_at? \Carbon\Carbon::parse($posts['top']->created_at)->format('H:i:s') : '' }}</span>
                                </div>
                            </div>
                        </article>
                    @endif

                    {{-- OTHER POSTS --}}
                    <div class="card-two-wrap">
                        @foreach ($posts['others'] as $post)
                            <article class="card-two-headline">
                                <div class="card-two-headline-img-wrap">
                                    <img alt="{{ $post->title }}" class="card-two-headline-img" width="100" height="74"
                                        src="{{ $post->title }}" />
                                </div>
                                <div class="card-two-headline--info">
                                    <h4 class="card-two-headline--title">
                                        <a href="{{ route('detail.desktop', ['slug' => $post->slug]) }}">{{ $post->title }}</a>
                                    </h4>
                                    <div class="category-and-time">
                                        <span>{{ $post->created_at? \Carbon\Carbon::parse($post->created_at)->isoFormat('DD MMMM YYYY') : '' }} |</span>
                                        <span>{{ $post->created_at? \Carbon\Carbon::parse($post->created_at)->format('H:i:s') : '' }}</span>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
            @endforeach

            {{-- ================= TERKINI ================= --}}
            <div class="mt-20">
                <h3 class="card-headline-no-image-title fw-bold">Terkini</h3>
                <div class="list">
                    @foreach ($postTerkini as $post)
                        <div class="list-element">
                            <article class="main-card">
                                <div class="main-card-img-wrap">
                                    <img alt="{{ $post->title }}" class="main-card-img" width="350" height="261"
                                        src="{{ asset('storage/comp/' . basename(is_array($post->gambar)? $post->gambar[0] : $post->gambar)) }}" />
                                </div>
                                <div class="main-card--info">
                                    <h4 class="main-card--title">
                                        <a href="{{ route('detail.desktop', ['slug' => $post->slug]) }}">{{ $post->title }}</a>
                                    </h4>
                                    <p class="main-card--desc">{!! Str::limit(strip_tags($post->content), 100) !!}</p>
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
            </div>

        </div>
        @include('frontend.dekstop.components.sidebar')
    </div>
@endsection
