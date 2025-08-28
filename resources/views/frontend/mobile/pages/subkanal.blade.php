@extends('frontend.mobile.master.master-app')
@section('content')
    <div style="margin-top: 120px">
        <h2 class="card-headline-no-image-title text-center fw-bold">{{ $category->nama_sub_kategori }}</h2>
    </ul>

    @if ($post->isNotEmpty())
        @php $latestPost = $post->first(); @endphp
        <div>
            <article class="card-headline">
                <img alt="{{ $latestPost->title }}" class="card-headline-img" src="{{ asset('storage/comp/' . (is_array($latestPost->gambar) ? basename($latestPost->gambar[0]) : basename($latestPost->gambar))) }}" />
                <div class="card-headline-info">
                    <h4 class="card-headline-title">
                        <a href="{{ route('detail.desktop', ['slug' => $latestPost->slug]) }}">{{ $latestPost->title }}</a>
                    </h4>
                    <div class="category-and-time">
                        <div class="card-one-headline--desc">{!! Str::limit(strip_tags($latestPost->content), 60) !!}</div>
                        <span>{{ \Carbon\Carbon::parse($latestPost->created_at)->format('Y-m-d') }}</span>
                    </div>
                </div>
            </article>
        </div>

        <div class="card-headline-small-wrap">
            @foreach ($post->skip(1)->take(4) as $item)
                <article class="card-headline-small">
                    <img alt="{{ $item->title }}" class="card-headline-small-img" src="{{ asset('storage/comp/' . (is_array($item->gambar) ? basename($item->gambar[0]) : basename($item->gambar))) }}" />
                    <div class="card-headline-small-info">
                        <h4 class="card-headline-small-title">
                            <a href="{{ route('detail.desktop', ['slug' => $item->slug]) }}">{{ $item->title }}</a>
                        </h4>
                        <div class="category-and-time-head">
                            <span style="font-size: 10px;">{{ $item->created_at ? \Carbon\Carbon::parse($item->created_at)->isoFormat('DD MMMM YYYY') : '' }} | {{ $item->created_at ? \Carbon\Carbon::parse($item->created_at)->format('H:i:s') : '' }}</span>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    @endif

    <div>
        @foreach ($post->skip(5)->sortByDesc('created_at') as $item)
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
                        @if ($item->subCategory)
                        <a href="{{ route('subcateg.desktop', ['categ' => $item->kategori->slug, 'subcateg' => $item->subCategory->slug]) }}">
                            {{ $item->subCategory->nama_sub_kategori }}
                        </a>
                        @else
                        <a href="{{ route('kanal.desktop', ['slug' => $item->kategori->slug]) }}">
                            {{ $item->kategori->nama_kategori }}
                        </a>
                        @endif
                            <span style="font-size: 10px;">{{ $item->created_at ? \Carbon\Carbon::parse($item->created_at)->isoFormat('DD MMMM YYYY') : '' }} | {{ $item->created_at ? \Carbon\Carbon::parse($item->created_at)->format('H:i:s') : '' }}</span>
                    </div>
                </div>
            </article>
        @endforeach
    </div>
@endsection
