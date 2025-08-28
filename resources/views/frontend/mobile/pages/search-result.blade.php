@extends('frontend.mobile.master.master-app')
@section('content')
<div class="kanal-wrap mt-15 mb-10">
    <h3 class="base-title">Pencarian: "{{ is_array(request('q')) ? implode(' ', request('q')) : request('q') }}"</h3>
</div>
    <div>
        @foreach ($posts as $item)
        <article class="main-card">
            <div class="main-card-img-wrap">
                <img alt="{{ $item->title }}" class="main-card-img" src="{{ asset('storage/comp/' . (is_array($item->gambar) ? basename($item->gambar[0]) : basename($item->gambar))) }}" />
            </div>
            <div class="main-card--info">
                <h4 class="main-card--title">
                    <a href="{{ route('detail.desktop', ['slug' => $item->slug]) }}">{{ $item->title }}</a>
                </h4>
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
                    <span>{{ \Carbon\Carbon::parse($item->created_at)->format('H:i') }} WIB</span>
                </div>
            </div>
        </article>
        @endforeach
    </div>
@endsection
