@extends('frontend.dekstop.master.master-app')
@section('content')
    <div class="content-home" id="content">
        <div class="content-article">
            <section style="padding: 100px 0 100px 0">
                <div class="container max-w-lg">
                    <div class="error-container" style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
                        <div>
                            <img src="{{ asset('frontend/images/Lost_in_Space_1.gif') }}" alt="Gempita Milenial" width="500" height="350">
                        </div>
                        <button style="padding: 12px 24px; border-radius: 8px; background-color: #2493BA; color: white; font-weight: 500; transition: all 0.2s ease-in-out; border: none;" onmouseover="this.style.backgroundColor='#2493BA'" onmouseout="this.style.backgroundColor='#2493BA'">
                            <a href="{{ url('/') }}" style="color: white; text-decoration: none;">Kembali ke Beranda</a>
                        </button>
                    </div>
                </div>
            </section>

            <div class="mt-30">
                <h3 class="card-headline-no-image-title">Terkini</h3>
                <div class="list">
                    @foreach ($postTerkiniBottom as $item)
                        <div class="list-element">
                            <article class="main-card">
                                <div class="main-card-img-wrap">
                                    <img alt="{{ $item->title }}" class="main-card-img" width="213" height="130"
                                        src="{{ is_array($item->gambar) ? $item->gambar[0] : $item->gambar }}" />
                                </div>
                                <div class="main-card--info">
                                    <h4 class="main-card--title">
                                        <a
                                            href="{{ route('detail.desktop', ['slug' => $item->slug]) }}">{{ $item->title }}</a>
                                    </h4>
                                    <p class="main-card--desc">{!! Str::limit(strip_tags($item->content), 100) !!}</p>
                                    <div class="category-and-time">
                                        <span>{{ \Carbon\Carbon::parse($item->created_at)->format('H:i') }} WIB</span>
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
