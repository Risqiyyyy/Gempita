@extends('frontend.dekstop.master.master-app')

@section('content')
    <div>
        <section class="logo-meaning" aria-labelledby="lm-title">
            <div class="lm-container">

                {{-- Judul Ribbon --}}
                <div class="lm-ribbon">
                    <h3 id="lm-title" class="lm-ribbon__title">MAKNA LOGO <span>- GEMPITA</span></h3>
                </div>

                {{-- Dua Panel Gambar sejajar --}}
                <div class="lm-panels">
                    <figure class="lm-card">
                        <img src="{{ asset('frontend/images/makna-logo/makna1.png') }}" alt="Makna Logo Gempita - Panel 1"
                            loading="lazy" decoding="async">
                    </figure>
                    <figure class="lm-card">
                        <img src="{{ asset('frontend/images/makna-logo/makna2.webp') }}" alt="Makna Logo Gempita - Panel 2"
                            loading="lazy" decoding="async">
                    </figure>
                </div>

                {{-- Prolog di bawah --}}
                <aside class="lm-prolog">
                    <div class="lm-badge"><span class="lm-badge__dot"></span> PROLOG</div>
                    <h2 class="lm-title">PEMAHAMAN TENTANG<br>“MILENIAL”</h2>
                    <p class="lm-desc">
                        Dengan keberanian yang besar, kelompok milenial mampu melakukan segala hal secara revolusioner.
                        Pertama, generasi berusia 24–39 tahun. Kedua, generasi melek teknologi. Dalam terminologi yang
                        lebih luas: Generasi Modern.
                    </p>
                </aside>

            </div>
        </section>
    </div>

    <style>
        :root {
            --lm-max-w: 1100px;
            --lm-gap: 28px;
            --lm-muted: #6b7280;
            --lm-red: #2494bb;
            --lm-dark: #0b0b0b;
            --lm-radius: 12px;
            --lm-shadow: 0 10px 26px rgba(0, 0, 0, .08);
        }

        .logo-meaning {
            padding: 42px 0 56px;
        }

        .lm-container {
            max-width: var(--lm-max-w);
            margin: 0 auto;
            padding: 0 16px;
            display: flex;
            flex-direction: column;
            gap: var(--lm-gap);
        }

        /* Ribbon judul (center) */
        .lm-ribbon {
            color: #fff;
            border-radius: 8px;
            padding: 14px 18px;
            box-shadow: var(--lm-shadow);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .lm-ribbon__title {
            margin: 0;
            color: black;
            font-weight: 800;
            letter-spacing: .4px;
            text-transform: uppercase;
            font-size: clamp(18px, 2.6vw, 26px);
            text-align: center;
        }

        .lm-ribbon__title span {
            color: var(--lm-red);
        }

        /* Panel gambar */
        .lm-panels {
            display: grid;
            gap: 22px;
            grid-template-columns: 1fr;
        }

        @media (min-width:740px) {
            .lm-panels {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        .lm-card {
            margin: 0;
            background: #d20000;
            border-radius: var(--lm-radius);
            overflow: hidden;
            box-shadow: var(--lm-shadow);
            aspect-ratio: 3/4;
        }

        .lm-card img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            display: block;
        }

        /* Prolog (center & rapi) */
        .lm-prolog {
            background: #fff;
            border-radius: var(--lm-radius);
            padding: 26px 28px;
            box-shadow: var(--lm-shadow);
            max-width: 860px;
            margin: 0 auto;
            text-align: center;
        }

        .lm-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #f1f5f9;
            border-radius: 999px;
            padding: 8px 12px;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: .4px;
            margin: 0 auto 10px;
        }

        .lm-badge__dot {
            width: 10px;
            height: 10px;
            border-radius: 999px;
            background: var(--lm-red);
            display: inline-block;
        }

        .lm-title {
            margin: 8px 0 10px;
            font-weight: 900;
            line-height: 1.1;
            text-transform: uppercase;
            font-size: clamp(24px, 4vw, 40px);
        }

        .lm-desc {
            margin: 0 auto;
            color: var(--lm-muted);
            font-size: clamp(14px, 1.4vw, 16px);
            max-width: 60ch;
        }

        /* Sedikit perataan di layar kecil */
        @media (max-width:480px) {
            .lm-prolog {
                padding: 22px;
            }

            .lm-title {
                font-size: clamp(22px, 6vw, 34px);
            }
        }
    </style>
@endsection
