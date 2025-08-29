@extends('frontend.mobile.master.master-app')

@section('content')
    <div class="lm-m-wrap" aria-labelledby="lm-m-title">
        {{-- Judul --}}
        <div class="lm-m-ribbon">
            <h3 id="lm-m-title" class="lm-m-title">MAKNA LOGO <span>- GEMPITA</span></h3>
        </div>

        {{-- Dua gambar --}}
        <div class="lm-m-panels">
            <figure class="lm-m-card">
                <img src="{{ asset('frontend/images/makna-logo/makna1.png') }}" alt="Makna Logo Gempita - Panel 1"
                    loading="lazy" decoding="async">
            </figure>
            <figure class="lm-m-card">
                <img src="{{ asset('frontend/images/makna-logo/makna2.webp') }}" alt="Makna Logo Gempita - Panel 2"
                    loading="lazy" decoding="async">
            </figure>
        </div>

        {{-- Prolog --}}
        <aside class="lm-m-prolog">
            <div class="lm-m-badge"><span class="lm-m-dot"></span> PROLOG</div>
            <h2 class="lm-m-head">PEMAHAMAN TENTANG<br>“MILENIAL”</h2>
            <p class="lm-m-desc">
                Dengan keberanian yang besar, kelompok milenial mampu melakukan segala hal secara revolusioner.
                Pertama, generasi berusia 24–39 tahun. Kedua, generasi melek teknologi. Dalam terminologi yang
                lebih luas: Generasi Modern.
            </p>
        </aside>
    </div>

    <style>
        /* ====== TOKENS (mobile) */
        :root {
            --lm-m-gap: 16px;
            --lm-m-red: #2494bb;
            --lm-m-muted: #6b7280;
            --lm-m-radius: 12px;
            --lm-m-shadow: 0 8px 22px rgba(0, 0, 0, .08);
        }

        /* ====== LAYOUT */
        .lm-m-wrap {
            padding: 16px 14px 28px;
            display: flex;
            flex-direction: column;
            gap: 18px;
        }

        /* ====== HEADER */
        .lm-m-ribbon {
            display: flex;
            justify-content: center;
            align-items: center;
            color: black;
            border-radius: 8px;
            padding: 12px 14px;
            box-shadow: var(--lm-m-shadow);
        }

        .lm-m-title {
            margin: 0;
            text-align: center;
            text-transform: uppercase;
            letter-spacing: .4px;
            font-weight: 800;
            font-size: clamp(18px, 5vw, 22px);
        }

        .lm-m-title span {
            color: var(--lm-m-red);
        }

        /* ====== PANELS (stack di HP, sejajar di ≥640px) */
        .lm-m-panels {
            display: grid;
            gap: var(--lm-m-gap);
            grid-template-columns: 1fr;
        }

        @media (min-width:640px) {
            .lm-m-panels {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        .lm-m-card {
            margin: 0;
            background: #d20000;
            border-radius: var(--lm-m-radius);
            overflow: hidden;
            box-shadow: var(--lm-m-shadow);
            aspect-ratio: 3/4;
        }

        .lm-m-card img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            display: block;
        }

        /* ====== PROLOG */
        .lm-m-prolog {
            text-align: center;
            background: #fff;
            border-radius: var(--lm-m-radius);
            box-shadow: var(--lm-m-shadow);
            padding: 18px 16px;
        }

        .lm-m-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #f1f5f9;
            border-radius: 999px;
            padding: 6px 10px;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: .3px;
            margin-bottom: 8px;
        }

        .lm-m-dot {
            width: 10px;
            height: 10px;
            border-radius: 999px;
            background: var(--lm-m-red);
            display: inline-block;
        }

        .lm-m-head {
            margin: 6px 0 8px;
            font-weight: 900;
            line-height: 1.15;
            text-transform: uppercase;
            font-size: clamp(20px, 6vw, 26px);
        }

        .lm-m-desc {
            margin: 0 auto;
            color: var(--lm-m-muted);
            font-size: 14px;
            max-width: 36rem;
        }

        /* compact di layar sangat kecil */
        @media (max-width:360px) {
            .lm-m-prolog {
                padding: 14px;
            }
        }
    </style>
@endsection
