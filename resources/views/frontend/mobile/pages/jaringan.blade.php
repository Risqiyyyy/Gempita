@extends('frontend.mobile.master.master-app')
@section('content')
    <style>
        .logo-network-row {
            display: flex;
            flex-wrap: wrap;
            gap: 24px 16px;
            justify-content: center;
            align-items: center;
            margin-bottom: 24px;
            margin-top: 24px;
            background: #fafafa;
            border-radius: 8px
        }
        .logo-network-col {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 8px 0;
        }
        .logo-network-img {
            max-height: 70px;
            width: auto;
            max-width: 120px;
            object-fit: contain;
            border-radius: 8px;
            background: #fafafa;
            box-shadow: 0 2px 8px rgba(0,0,0,0.04);
            padding: 8px;
            transition: transform 0.2s;
        }
        .logo-network-img:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 16px rgba(0,0,0,0.08);
        }
    </style>
    <div class="content-home" id="content">
        <div class="content-article">
            <section style="padding: 50px 0 50px 0">
                <div class="container max-w-lg">
                    <div class="error-container" style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
                        <img src="{{ asset('frontend/images/logo/slimonline.png') }}" alt="Slim Online" class="img-fluid mb-5" style="max-height: 70px; width: auto;">

                        <div class="logo-network-row bg-slim rounded-md p-4">
                            <!-- Logo 1 -->
                            <div class="logo-network-col">
                                <a href="https://automoto.id/" target="_blank" rel="noopener noreferrer">
                                    <img src="{{ asset('frontend/images/logo/automoto-blck.png') }}" alt="Automoto" class="logo-network-img" />
                                </a>
                            </div>
                            <!-- Logo 2 -->
                            <div class="logo-network-col">
                                <a href="https://ikngreen.id/" target="_blank" rel="noopener noreferrer">
                                    <img src="{{ asset('frontend/images/logo/ikngreen.png') }}" alt="IKN Green" class="logo-network-img" />
                                </a>
                            </div>
                            <!-- Logo 3 -->
                            <div class="logo-network-col">
                                <a href="https://indopop.id/" target="_blank" rel="noopener noreferrer">
                                    <img src="{{ asset('frontend/images/logo/indopop.png') }}" alt="Indopop" class="logo-network-img" />
                                </a>
                            </div>
                            <!-- Logo 4 -->
                            <div class="logo-network-col">
                                <a href="https://satukata.net/" target="_blank" rel="noopener noreferrer">
                                    <img src="{{ asset('frontend/images/logo/satukata.png') }}" alt="Satukata" class="logo-network-img" />
                                </a>
                            </div>
                            <!-- Logo 5 -->
                            <div class="logo-network-col">
                                <a href="https://terasmalioboronews.com/" target="_blank" rel="noopener noreferrer">
                                    <img src="{{ asset('frontend/images/logo/terasmalioboro.png') }}" alt="Teras Malioboro News" class="logo-network-img" />
                                </a>
                            </div>
                            <!-- Logo 6 -->
                            <div class="logo-network-col">
                                <a href="https://tobanews.com/" target="_blank" rel="noopener noreferrer">
                                    <img src="{{ asset('frontend/images/logo/tobanews.png') }}" alt="Tobanews" class="logo-network-img" />
                                </a>
                            </div>
                            <!-- Logo 7 -->
                            <div class="logo-network-col">
                                <a href="https://milenialasik.com/" target="_blank" rel="noopener noreferrer">
                                    <img src="{{ asset('frontend/images/logo/milenial-blck.png') }}" alt="Milenial Asik" class="logo-network-img" />
                                </a>
                            </div>
                            <!-- Logo 8 -->
                            <div class="logo-network-col">
                                <a href="https://voxindonews.com/" target="_blank" rel="noopener noreferrer">
                                    <img src="{{ asset('frontend/images/logo/voxindo.png') }}" alt="Voxindo News" class="logo-network-img" />
                                </a>
                            </div>
                            <!-- Logo 9 -->
                            <div class="logo-network-col">
                                <a href="https://jayakartanews.com/" target="_blank" rel="noopener noreferrer">
                                    <img src="{{ asset('frontend/images/logo/jayakarta.png') }}" alt="Jayakarta" class="logo-network-img" />
                                </a>
                            </div>
                            <!-- Logo 10 -->
                            <div class="logo-network-col">
                                <a href="https://pilarmerdeka.com/" target="_blank" rel="noopener noreferrer">
                                    <img src="{{ asset('frontend/images/logo/pilar.png') }}" alt="Pilar Merdeka" class="logo-network-img" />
                                </a>
                            </div>
                        </div>
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
                                        src="{{ asset('storage/comp/' . (is_array($item->gambar) ? basename($item->gambar[0]) : basename($item->gambar))) }}" />
                                </div>
                                <div class="main-card--info">
                                    <h4 class="main-card--title">
                                        <a
                                            href="{{ route('detail.desktop', ['slug' => $item->slug]) }}">{{ $item->title }}</a>
                                    </h4>
                                    <div class="category-and-time">
                                        <span>{{ $item->created_at ? \Carbon\Carbon::parse($item->created_at)->isoFormat('DD MMMM YYYY') : '' }}
                                            |</span>
                                        <span>{{ $item->created_at ? \Carbon\Carbon::parse($item->created_at)->format('H:i:s') : '' }}</span>
                                    </div>
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
