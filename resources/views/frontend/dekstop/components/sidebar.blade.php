<div class="content-sidebar">
    <div>
        @include('frontend.dekstop.components.ads-2')
        <div>
            <h3 class="card-headline-no-image-title">Terkini</h3>
            @foreach ($postTerkini as $item)
                <article class="card-four">
                    <div class="card-four-img-wrap">
                        <a href="{{ route('detail.desktop', ['slug' => $item->slug]) }}">
                            <img alt="{{ $item->title }}" width="660" height="497" src="{{ asset('storage/comp/' . (is_array($item->gambar) ? basename($item->gambar[0]) : basename($item->gambar))) }}" alt="{{ $item->title }}" class="card-four-img" />
                        </a>
                    </div>
                    <div class="card-four--info">
                        <h4 class="card-four--title">
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
                            | {{ \Carbon\Carbon::parse($item->created_at)->format('Y-m-d') }}
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
        {{-- Ads --}}
        @include('frontend.dekstop.components.ads-3')
        <div>
            <h3 class="card-headline-no-image-title">Terpopuler</h3>
            @foreach ($postTerpopuler as $item)
            @php
            $images = is_array($item->gambar)
                ? $item->gambar
                : (is_string($item->gambar) ? explode('|', $item->gambar) : []);

            $firstImage = !empty($images[0])
                ? asset('storage/comp/' . basename($images[0]))
                : asset('default.jpg');

            if (strpos($firstImage, 'storage/gambar') !== false) {
                $firstImage = str_replace('storage/gambar', 'storage/photos/shares', $firstImage);
            }
        @endphp
                <article class="card-four">
                    <div class="card-four-img-wrap">
                        <a href="{{ route('detail.desktop', ['slug' => $item->slug]) }}">
                            <img alt="{{ $item->title }}" class="card-four-img"
                                src="{{ $firstImage }}" />
                        </a>
                    </div>
                    <div class="card-four--info">
                        <h4 class="card-four--title">
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
                            | {{ \Carbon\Carbon::parse($item->created_at)->format('Y-m-d') }}
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</div>
