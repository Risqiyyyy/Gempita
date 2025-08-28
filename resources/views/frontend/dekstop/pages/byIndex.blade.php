@extends('frontend.dekstop.master.master-app')
@section('content')
<div class="content-home" id="content">
    <div class="content-article">
        <div class="mt-20">
            <div class="list">
                @foreach ($post as $item)
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
                            <p class="main-card--desc">{!! Str::limit(strip_tags($item->content ), 150) !!}</p>
                            <div class="category-and-time">
                                @if ($item->subCategory)
                                <a href="{{ route('subcateg.desktop', ['categ' => $item->kategori->slug, 'subcateg' => $item->subCategory->slug]) }}">
                                    {{ $item->subCategory->nama_sub_kategori }}
                                </a>
                                @else
                                <a href="{{ route('kanal.desktop', ['slug' => $item->kategori->slug]) }}">
                                    {{ $item->kategori->nama_kategori }}
                                </a>
                                @endif
                                | {{ \Carbon\Carbon::parse($item->created_at)->format('Y-m-d') }} WIB
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
