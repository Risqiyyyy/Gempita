<header class="wrap-header">
    <div class="main-header">

        <div class="header-menu--wrap noselect" id="open-menu">
            <svg id="menu-open" class="menu-open" xmlns="http://www.w3.org/2000/svg" width="28" height="28"
                fill="currentColor" class="bi bi-list" viewBox="0 0 24 24">
                <path
                    d="M 4 3 C 3.448 3 3 3.448 3 4 L 3 6 C 3 6.552 3.448 7 4 7 L 6 7 C 6.552 7 7 6.552 7 6 L 7 4 C 7 3.448 6.552 3 6 3 L 4 3 z M 11 3 C 10.448 3 10 3.448 10 4 L 10 6 C 10 6.552 10.448 7 11 7 L 13 7 C 13.552 7 14 6.552 14 6 L 14 4 C 14 3.448 13.552 3 13 3 L 11 3 z M 18 3 C 17.448 3 17 3.448 17 4 L 17 6 C 17 6.552 17.448 7 18 7 L 20 7 C 20.552 7 21 6.552 21 6 L 21 4 C 21 3.448 20.552 3 20 3 L 18 3 z M 4 10 C 3.448 10 3 10.448 3 11 L 3 13 C 3 13.552 3.448 14 4 14 L 6 14 C 6.552 14 7 13.552 7 13 L 7 11 C 7 10.448 6.552 10 6 10 L 4 10 z M 11 10 C 10.448 10 10 10.448 10 11 L 10 13 C 10 13.552 10.448 14 11 14 L 13 14 C 13.552 14 14 13.552 14 13 L 14 11 C 14 10.448 13.552 10 13 10 L 11 10 z M 18 10 C 17.448 10 17 10.448 17 11 L 17 13 C 17 13.552 17.448 14 18 14 L 20 14 C 20.552 14 21 13.552 21 13 L 21 11 C 21 10.448 20.552 10 20 10 L 18 10 z M 4 17 C 3.448 17 3 17.448 3 18 L 3 20 C 3 20.552 3.448 21 4 21 L 6 21 C 6.552 21 7 20.552 7 20 L 7 18 C 7 17.448 6.552 17 6 17 L 4 17 z M 11 17 C 10.448 17 10 17.448 10 18 L 10 20 C 10 20.552 10.448 21 11 21 L 13 21 C 13.552 21 14 20.552 14 20 L 14 18 C 14 17.448 13.552 17 13 17 L 11 17 z M 18 17 C 17.448 17 17 17.448 17 18 L 17 20 C 17 20.552 17.448 21 18 21 L 20 21 C 20.552 21 21 20.552 21 20 L 21 18 C 21 17.448 20.552 17 20 17 L 18 17 z">
                </path>
            </svg>
            <svg id="menu-close" class="menu-close" style="display: none;" xmlns="http://www.w3.org/2000/svg"
                width="32" height="32" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                <path
                    d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
            </svg>
        </div>

        <div class="header-logo--wrap">
            <a href="/">
                <img src="{{ asset('frontend/logo/logo.png') }}" width="155" height="24" alt="Gempita Milenial"
                    class="logo">
            </a>
        </div>

        <div class="menu-header">
            <div class="menu-search">
                <button class="button-search" aria-label="button">

                    <svg id="open-search" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                        fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path
                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                    </svg>

                </button>
            </div>
        </div>
    </div>

    <div id="main-menu" style="display: none;">
        <div>
            <ul class="main-menu">
                <li class="menu-item {{ Request::is('/') ? 'active' : '' }}">
                    <a href="/">Home</a>
                </li>
                @foreach ($categories as $item)
                    <li class="menu-item {{ Request::is('category/' . $item->slug) ? 'active' : '' }}">
                        <a href="{{ route('kanal.desktop', ['slug' => $item->slug]) }}">
                            {{ $item->nama_kategori }}
                        </a>
                    </li>
                @endforeach
                <li class="menu-item">
                    <a href="https://www.youtube.com/@indopopid" target="_blank">Video</a>
                </li>
                <li class="menu-item {{ Request::is('indeks') ? 'active' : '' }}">
                    <a href="/indeks">Indeks</a>
                </li>
            </ul>
        </div>

        <footer>
            <div class="footer-social-media">
                <div class="social-media-wrap">
                    <a class="social-media-item" href="https://www.tiktok.com/@dppgempita" target="_blank">
                        <svg fill="currentColor" width="32" height="32" viewBox="0 0 512 512" id="icons"
                            xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0" />
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />
                            <g id="SVGRepo_iconCarrier">
                                <path
                                    d="M412.19,118.66a109.27,109.27,0,0,1-9.45-5.5,132.87,132.87,0,0,1-24.27-20.62c-18.1-20.71-24.86-41.72-27.35-56.43h.1C349.14,23.9,350,16,350.13,16H267.69V334.78c0,4.28,0,8.51-.18,12.69,0,.52-.05,1-.08,1.56,0,.23,0,.47-.05.71,0,.06,0,.12,0,.18a70,70,0,0,1-35.22,55.56,68.8,68.8,0,0,1-34.11,9c-38.41,0-69.54-31.32-69.54-70s31.13-70,69.54-70a68.9,68.9,0,0,1,21.41,3.39l.1-83.94a153.14,153.14,0,0,0-118,34.52,161.79,161.79,0,0,0-35.3,43.53c-3.48,6-16.61,30.11-18.2,69.24-1,22.21,5.67,45.22,8.85,54.73v.2c2,5.6,9.75,24.71,22.38,40.82A167.53,167.53,0,0,0,115,470.66v-.2l.2.2C155.11,497.78,199.36,496,199.36,496c7.66-.31,33.32,0,62.46-13.81,32.32-15.31,50.72-38.12,50.72-38.12a158.46,158.46,0,0,0,27.64-45.93c7.46-19.61,9.95-43.13,9.95-52.53V176.49c1,.6,14.32,9.41,14.32,9.41s19.19,12.3,49.13,20.31c21.48,5.7,50.42,6.9,50.42,6.9V131.27C453.86,132.37,433.27,129.17,412.19,118.66Z" />
                            </g>
                        </svg>
                    </a>
                    <a class="social-media-item" href="https://www.youtube.com/@GempitaMilenial" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                            class="bi bi-youtube" viewBox="0 0 16 16">
                            <path
                                d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z" />
                        </svg>
                    </a>
                    <a class="social-media-item" href="https://www.instagram.com/dppgempita" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                            class="bi bi-instagram" viewBox="0 0 16 16">
                            <path
                                d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                        </svg>
                    </a>
                </div>
                <p class="footer-social-media-desc">Jl. Dukuh Patra II No.75, Menteng Dalam, Jakarta Selatan, Jakarta
                    12870</p>

            </div>
           <div class="footer-info">
        <div class="footer-menu-holder">
            <ul class="footer-menu">
                {{-- <li class="footer-menu--item">
                    <a href="/kebijakan-privasi">Kebijakan Privasi</a>
                </li> --}}
                <li class="footer-menu--item">
                    <a href="/struktur">Struktur</a>
                </li>
                <li class="footer-menu--item">
                    <a href="/makna-logo">Makna Logo Gempita</a>
                </li>
            </ul>
            <ul class="footer-menu">

                <li class="footer-menu--item">
                    <a href="/visi-misi">Visi & Misi Gempita Milenial</a>
                </li>
                <li class="footer-menu--item">
                    <a href="/site-map">Sitemap</a>
                </li>
                <li class="footer-menu--item">
                    <a href="/gallery">Gallery</a>
                </li>
            </ul>
        </div>
    </div>
        </footer>
    </div>

    <nav>
        <ul class="menu scrollable-menu">
            <li class="menu-item-scroll {{ Request::is('/') ? 'active' : '' }}">
                <a href="/">Home</a>
            </li>
            @foreach ($categories as $item)
                <li class="menu-item-scroll {{ Request::is('category/' . $item->slug) ? 'active' : '' }}">
                    <a href="{{ route('kanal.desktop', ['slug' => $item->slug]) }}">
                        {{ $item->nama_kategori }}
                    </a>
                </li>
            @endforeach
            <li class="menu-item-scroll">
                <a href="https://www.youtube.com/@indopopid" target="_blank">Video</a>
            </li>
            <li class="menu-item-scroll {{ Request::is('indeks') ? 'active' : '' }}">
                <a href="/indeks">Indeks</a>
            </li>
        </ul>
    </nav>

    <div class="today-news-container">
        <div class="today-headline">Terpopuler</div>
        <div class="news-marquee-container">
            <div class="news-marquee-text">
                <ul>
                    @foreach ($postTerpopuler as $item)
                        <li><a href="{{ route('detail.desktop', ['slug' => $item->slug]) }}">{{ $item->title }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <div class="wrap-search">
        <form action="{{ route('searchResult.dekstop') }}" method="GET">
            <input type="text" placeholder="Cari berita.." name="q" />
            <button type="submit">Cari</button>
        </form>
    </div>


</header>
