@extends('frontend.mobile.master.master-app')
@section('content')
    <div style="margin-top: 120px">
        <h2 class="card-headline-no-image-title text-center fw-bold">{{ $category->nama_kategori }}</h2>
        <ul class="scrollable-subtitles"
            style="display: flex; overflow-x: auto; white-space: nowrap; padding: 10px 0; margin-bottom: 20px; margin-top: -15px">
            @foreach ($category->subCategories as $item)
                <li class="menu-item-scroll {{ Request::is('category/' . $category->slug . '/' . $item->slug) ? 'active' : '' }}"
                    style="padding: 0 15px; font-size: 14px; color: #333;"><a
                        href="{{ route('subcateg.desktop', ['categ' => $category->slug, 'subcateg' => $item->slug]) }}">{{ $item->nama_sub_kategori }}</a>
                </li>
            @endforeach
        </ul>
    </div>

    @if ($post->isNotEmpty())
        @php $latestPost = $post->first(); @endphp
        <div>
            <article class="card-headline">
                <img alt="{{ $latestPost->title }}" class="card-headline-img"
                    src="{{ asset('storage/comp/' . (is_array($latestPost->gambar) ? basename($latestPost->gambar[0]) : basename($latestPost->gambar))) }}" />
                <div class="card-headline-info">
                    <h4 class="card-headline-title">
                        <a href="{{ route('detail.desktop', ['slug' => $latestPost->slug]) }}">{{ $latestPost->title }}</a>
                    </h4>
                    <div class="category-and-time">
                        <div class="card-one-headline--desc">{!! Str::limit(strip_tags($latestPost->content), 60) !!}</div>
                        <span>
                            @if ($latestPost->subCategory)
                                <a href="{{ route('kanal.desktop', ['slug' => $latestPost->slug]) }}">
                                    {{ $latestPost->kategori->nama_kategori }}
                                </a>|
                                <a
                                    href="{{ route('subcateg.desktop', ['categ' => $latestPost->kategori->slug, 'subcateg' => $latestPost->subCategory->slug]) }}">
                                    {{ $latestPost->subCategory->nama_sub_kategori }}
                                </a>
                            @else
                                <a href="{{ route('kanal.desktop', ['slug' => $latestPost->slug]) }}">
                                    {{ $latestPost->kategori->nama_kategori }}
                                </a>|
                            @endif
                            {{ \Carbon\Carbon::parse($latestPost->created_at)->format('Y-m-d') }}
                        </span>
                    </div>
                </div>
        </div>
        </article>
        </div>

        <div class="card-headline-small-wrap">
            @foreach ($post->skip(1)->take(4) as $item)
                <article class="card-headline-small">
                    <img alt="{{ $item->title }}" class="card-headline-small-img"
                        src="{{ asset('storage/comp/' . (is_array($item->gambar) ? basename($item->gambar[0]) : basename($item->gambar))) }}" />
                    <div class="card-headline-small-info">
                        <h4 class="card-headline-small-title">
                            <a href="{{ route('detail.desktop', ['slug' => $item->slug]) }}">{{ $item->title }}</a>
                        </h4>
                        <div class="category-and-time-head">
                            <span
                                style="font-size: 10px;">{{ $item->created_at ? \Carbon\Carbon::parse($item->created_at)->isoFormat('DD MMMM YYYY') : '' }}
                                |
                                {{ $item->created_at ? \Carbon\Carbon::parse($item->created_at)->format('H:i:s') : '' }}
                            </span>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    @endif

    <div>
        @foreach ($post->skip(5)->sortByDesc('created_at') as $item)
            <article class="main-card" style="display: flex; align-items: flex-start; margin-bottom: 18px; gap: 12px;">
                <div class="main-card-img-wrap"
                    style="flex-shrink:0; width: 90px; height: 70px; overflow: hidden; border-radius: 8px; background: #f3f3f3; display: flex; align-items: center; justify-content: center;">
                    <img alt="{{ $item->title }}" class="main-card-img"
                        src="{{ asset('storage/comp/' . (is_array($item->gambar) ? basename($item->gambar[0]) : basename($item->gambar))) }}" />

                </div>
                <div class="main-card--info" style="flex:1; min-width:0;">
                    <h4 class="main-card--title"
                        style="font-size: 15px; font-weight: 600; margin-bottom: 4px; line-height: 1.2;">
                        <a href="{{ route('detail.desktop', ['slug' => $item->slug]) }}"
                            style="color: #222; text-decoration: none;">{{ $item->title }}</a>
                    </h4>
                    <div class="category-and-time" style="font-size: 11px; color: #888; margin-bottom: 2px;">
                        <a href="{{ route('kanal.desktop', ['slug' => $item->kategori->slug]) }}"
                            style="color: #888; text-decoration: none;">{{ $item->kategori->nama_kategori }}</a>
                        <span
                            style="font-size: 10px; margin-left: 6px;">{{ $item->created_at ? \Carbon\Carbon::parse($item->created_at)->isoFormat('DD MMMM YYYY') : '' }}
                            |
                            {{ $item->created_at ? \Carbon\Carbon::parse($item->created_at)->format('H:i:s') : '' }}</span>
                    </div>
                </div>
            </article>
        @endforeach
    </div>
@endsection
