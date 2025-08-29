@extends('frontend.dekstop.master.master-app')

@section('content')
    <div class="content-home" id="content">
        <section class="team-leader">
            <div class="mt-15">
                <header class="tl-header">
                    <h2 class="tl-title">TEAM LEADER</h2>
                    <p class="tl-subtitle">
                        Dalam tim kami, Gempita bekerja untuk mewujudkan visi dan misi yang berani dalam mencapai tujuan
                        bersama.
                    </p>
                </header>

                <div class="tl-grid">
                    {{-- Card 1 --}}
                    <article class="tl-card">
                        <figure class="tl-photo">
                            <img src="{{ asset('frontend/images/struktur/alfonso.webp') }}" alt="Alfonso Ferry Pahotan"
                                loading="lazy">
                        </figure>
                        <div class="tl-body">
                            <h3 class="tl-name">Alfonso Ferry Pahotan, S.H., M.H</h3>
                            <p class="tl-role">Ketua Umum GEMPITA</p>
                        </div>
                    </article>

                    {{-- Card 2 --}}
                    <article class="tl-card">
                        <figure class="tl-photo">
                            <img src="{{ asset('frontend/images/struktur/suratman.webp') }}" alt="H. Suratman, SP"
                                loading="lazy">
                        </figure>
                        <div class="tl-body">
                            <h3 class="tl-name">H. Suratman, SP</h3>
                            <p class="tl-role">Ketua Dewan Pembina</p>
                        </div>
                    </article>

                    {{-- Card 3 --}}
                    <article class="tl-card">
                        <figure class="tl-photo">
                            <img src="{{ asset('frontend/images/struktur/fadly.webp') }}" alt="Fadly Abdurachmansyah, ST"
                                loading="lazy">
                        </figure>
                        <div class="tl-body">
                            <h3 class="tl-name">Fadly Abdurachmansyah, ST</h3>
                            <p class="tl-role">Sekretaris Jenderal</p>
                        </div>
                    </article>
                </div>
            </div>
        </section>
    </div>

    <style>
        .team-leader {
            padding-bottom: 40px;
        }

        .tl-header {
            text-align: center;
            margin-bottom: 32px;
        }

        .tl-title {
            font-size: 40px;
            line-height: 1.1;
            font-weight: 800;
            letter-spacing: .5px;
        }

        .tl-subtitle {
            max-width: 760px;
            margin: 10px auto 0;
            font-size: 16px;
            opacity: .85;
        }

        .tl-grid {
            display: grid;
            grid-template-columns: repeat(12, 1fr);
            gap: 22px;
        }

        /* 3 kolom pada desktop, 2 kolom tablet, 1 kolom mobile */
        @media (min-width: 992px) {
            .tl-card {
                grid-column: span 4;
            }
        }

        @media (min-width: 600px) and (max-width: 991px) {
            .tl-card {
                grid-column: span 6;
            }
        }

        @media (max-width: 599px) {
            .tl-card {
                grid-column: span 12;
            }
        }

        .tl-card {
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 8px 24px rgba(0, 0, 0, .08);
            display: flex;
            flex-direction: column;
        }

        .tl-photo {
            position: relative;
            padding-top: 100%;
            overflow: hidden;
        }

        .tl-photo img {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .tl-body {
            padding: 20px 22px;
        }

        .tl-name {
            margin: 0 0 6px;
            font-size: 20px;
            font-weight: 700;
        }

        .tl-role {
            margin: 0;
            font-size: 14px;
            color: #666;
        }
    </style>
@endsection
