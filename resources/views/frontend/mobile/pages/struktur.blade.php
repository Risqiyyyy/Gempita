@extends('frontend.mobile.master.master-app')

@section('content')
    <div class="tlm-head" aria-labelledby="tlm-title">
        <h3 id="tlm-title" class="tlm-title">TEAM LEADER</h3>
        <div class="tlm-accent" aria-hidden="true"></div>
        <p class="tlm-subtitle">
            Dalam tim kami, Gempita bekerja untuk mewujudkan visi dan misi yang berani
            dalam mencapai tujuan bersama.
        </p>
    </div>

    {{-- List: versi mobile --}}
    <section class="tlm-wrap">
        {{-- Card 1 --}}
        <article class="tlm-card">
            <figure class="tlm-photo">
                <img src="{{ asset('frontend/images/struktur/alfonso.webp') }}" alt="Alfonso Ferry Pahotan" loading="lazy">
            </figure>
            <div class="tlm-body">
                <h4 class="tlm-name">Alfonso Ferry Pahotan, S.H., M.H</h4>
                <p class="tlm-role">Ketua Umum GEMPITA</p>
            </div>
        </article>

        {{-- Card 2 --}}
        <article class="tlm-card">
            <figure class="tlm-photo">
                <img src="{{ asset('frontend/images/struktur/suratman.webp') }}" alt="H. Suratman, SP" loading="lazy">
            </figure>
            <div class="tlm-body">
                <h4 class="tlm-name">H. Suratman, SP</h4>
                <p class="tlm-role">Ketua Dewan Pembina</p>
            </div>
        </article>

        {{-- Card 3 --}}
        <article class="tlm-card">
            <figure class="tlm-photo">
                <img src="{{ asset('frontend/images/struktur/fadly.webp') }}" alt="Fadly Abdurachmansyah, ST"
                    loading="lazy">
            </figure>
            <div class="tlm-body">
                <h4 class="tlm-name">Fadly Abdurachmansyah, ST</h4>
                <p class="tlm-role">Sekretaris Jenderal</p>
            </div>
        </article>
    </section>

    {{-- Opsional: slider horizontal (cukup hapus komentar pada .tlm-wrap--slider untuk aktif) --}}
    {{-- <section class="tlm-wrap tlm-wrap--slider"> ... </section> --}}

    <style>
        /* Spacing & typografi ringkas */
        .tlm-subtitle {
            margin: .25rem 0 1rem;
            font-size: .9rem;
            opacity: .85;
        }

        .tlm-wrap {
            padding: 0 .75rem 1.5rem;
        }

        .tlm-card {
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 8px 20px rgba(0, 0, 0, .08);
            margin-bottom: 12px;
        }

        .tlm-photo {
            position: relative;
            padding-top: 65%;
            overflow: hidden;
        }

        .tlm-photo img {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .tlm-body {
            padding: .85rem .9rem 1rem;
        }

        .tlm-name {
            margin: 0 0 .25rem;
            font-size: 1.05rem;
            font-weight: 700;
            line-height: 1.25;
        }

        .tlm-role {
            margin: 0;
            font-size: .85rem;
            color: #666;
        }

        /* Opsional: jadikan slider horizontal */
        .tlm-wrap--slider {
            display: flex;
            gap: 12px;
            overflow: auto;
            padding-bottom: 1rem;
            scroll-snap-type: x mandatory;
        }

        .tlm-wrap--slider .tlm-card {
            min-width: 78%;
            scroll-snap-align: start;
            margin: 0;
        }

        .tlm-wrap--slider::-webkit-scrollbar {
            display: none;
        }

        /* ===== Team Leader Mobile Header ===== */
        .tlm-head {
            text-align: center;
            padding: 12px 16px 8px;
        }

        .tlm-title {
            margin: 0;
            font-weight: 800;
            letter-spacing: .4px;
            text-transform: uppercase;
            line-height: 1.1;
            font-size: clamp(18px, 5vw, 24px);
        }

        .tlm-accent {
            width: 56px;
            height: 3px;
            margin: 8px auto 10px;
            background: var(--blue-primary);
            border-radius: 999px;
            /* warna aksen, silakan ganti */
        }

        .tlm-subtitle {
            margin: 0 auto;
            max-width: 34rem;
            /* biar tidak terlalu lebar */
            font-size: clamp(13px, 3.5vw, 15px);
            color: #6b7280;
            /* abu-abu lembut */
        }
    </style>
@endsection
