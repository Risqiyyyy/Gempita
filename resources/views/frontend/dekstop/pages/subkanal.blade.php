@extends('frontend.dekstop.master.master-app')
@section('content')
    @include('frontend.dekstop.components.ads-1')
    <div class="mt-20">
        <h3 class="card-headline-no-image-title">{{ $category->nama_sub_kategori }}</h3>
    </div>
    <div class="content-home" id="content">
        <div class="content-article">
            <div>
                @foreach ($post->take(1) as $item)
                <article class="card-one-headline">
                    <div class="card-one-headline-img"><a href="{{ route('detail.desktop', ['slug' => $item->slug]) }}"><img class="card-one-headline-img"
                                src="{{ asset('storage/comp/' . (is_array($item->gambar) ? basename($item->gambar[0]) : basename($item->gambar))) }}" /></a></div>
                    <div class="card-one-headline--info">
                        <h4 class="card-one-headline--title">
                            <a href="{{ route('detail.desktop', ['slug' => $item->slug]) }}">{{ $item->title }}</a>
                        </h4>
                        <div class="category-and-time">
                            <div class="card-one-headline--desc">{!! Str::limit(strip_tags($item->content), 150) !!}</div>
                            <span>{{ $item->created_at ? \Carbon\Carbon::parse($item->created_at)->isoFormat('DD MMMM YYYY') : '' }} |</span>
                            <span>{{ $item->created_at ? \Carbon\Carbon::parse($item->created_at)->format('H:i:s') : '' }}</span>
                        </div>
                    </div>
                </article>
                @endforeach
                <div class="card-two-wrap">
                    @foreach ($post->slice(1, 4) as $item)
                    <article class="card-two-headline">
                        <div class="card-two-headline-img-wrap">
                            <img class="card-two-headline-img" src="{{ asset('storage/comp/' . (is_array($item->gambar) ? basename($item->gambar[0]) : basename($item->gambar))) }}" />
                        </div>
                        <div class="card-two-headline--info">
                            <h4 class="card-two-headline--title">
                                <a href="{{ route('detail.desktop', ['slug' => $item->slug]) }}">{{ $item->title }}</a>
                            </h4>
                            <div class="category-and-time">
                            <span>{{ $item->created_at ? \Carbon\Carbon::parse($item->created_at)->isoFormat('DD MMMM YYYY') : '' }} |</span>
                            <span>{{ $item->created_at ? \Carbon\Carbon::parse($item->created_at)->format('H:i:s') : '' }}</span>
                            </div>
                        </div>
                    </article>
                    @endforeach
                </div>
            </div>
            <div class="mt-20">
                <div class="list">
                    @foreach ($post->slice(4, 25) as $item)
                    <div class="list-element">
                        <article class="main-card">
                            <div class="main-card-img-wrap">
                                <img alt="{{ $item->title }}" class="main-card-img" width="213" height="130"
                                    src="{{ asset('storage/comp/' . (is_array($item->gambar) ? basename($item->gambar[0]) : basename($item->gambar))) }}" />
                            </div>
                            <div class="main-card--info">
                                <h4 class="main-card--title">
                                    <a href="{{ route('detail.desktop', ['slug' => $item->slug]) }}">{{ $item->title }}</a>
                                </h4>
                                <p class="main-card--desc">{!! Str::limit(strip_tags($item->content ), 150) !!} </p>
                                <div class="category-and-time">
                                <span>{{ $item->created_at ? \Carbon\Carbon::parse($item->created_at)->isoFormat('DD MMMM YYYY') : '' }} |</span>
                                <span>{{ $item->created_at ? \Carbon\Carbon::parse($item->created_at)->format('H:i:s') : '' }}</span>
                                </div>
                            </div>
                        </article>
                    </div>
                    @endforeach
                </div>
                <div class="mb-20">
                    <button class="main-card-loadmore" id="loadmore">Tampilkan lebih banyak</button>
                </div>
            </div>
        </div>
        @include('frontend.dekstop.components.sidebar')
    </div>
@endsection
