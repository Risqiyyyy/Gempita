@extends('frontend.mobile.master.master-app')

@section('content')
    <style>
        :root {
            --vm-blue: #2494bb;
            --vm-muted: #6b7280;
            --vm-radius: 12px;
            --vm-shadow: 0 8px 22px rgba(0, 0, 0, .06);
        }

        .vm-m-wrap {
            padding: 16px 14px 28px;
        }

        .vm-m-header {
            text-align: center;
            margin: 6px 0 16px;
        }

        .vm-m-title {
            margin: 0 0 6px;
            font-weight: 900;
            line-height: 1.1;
            letter-spacing: .3px;
            font-size: clamp(22px, 6vw, 28px);
        }

        .vm-m-lead {
            margin: 0 auto;
            color: var(--vm-muted);
            max-width: 40rem;
            font-size: clamp(13px, 3.6vw, 15px);
        }

        /* Visi */
        .vm-m-card {
            background: #fff;
            border-radius: var(--vm-radius);
            box-shadow: var(--vm-shadow);
            padding: 16px 18px;
            margin-bottom: 12px;
        }

        .vm-m-card h3 {
            margin: 0;
            font-size: clamp(18px, 5.2vw, 22px);
            font-weight: 800;
            text-align: center;
        }

        .vm-m-underline {
            width: 56px;
            height: 3px;
            border-radius: 999px;
            background: var(--vm-blue);
            margin: 8px auto 10px;
        }

        .vm-m-vision-text {
            margin: 0;
            text-align: center;
            font-size: clamp(14px, 4vw, 16px);
        }

        /* Misi */
        .vm-m-mission {
            background: var(--vm-blue);
            color: #fff;
        }

        .vm-m-mission h3 {
            text-align: center;
        }

        .vm-m-list {
            list-style: none;
            margin: 10px 0 0;
            padding: 0;
            display: grid;
            gap: 12px;
            font-weight: 700;
            font-size: clamp(13px, 3.8vw, 15px);
        }

        .vm-m-list li {
            position: relative;
            padding-top: 12px;
            text-align: center;
        }

        .vm-m-list li::before {
            content: "";
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            top: 0;
            width: 26px;
            height: 2px;
            background: #000;
            opacity: .75;
            border-radius: 999px;
        }
    </style>

    <div class="vm-m-wrap">
        <header class="vm-m-header">
            <h1 class="vm-m-title">VISI & MISI</h1>
            <p class="vm-m-lead">
                VISI dan MISI Organisasi GEMPITA selaras dengan hakikat “milenial” dalam dua terminologi di atas:
                <strong>BERANI</strong> dan <strong>MELEK TEKNOLOGI</strong>
            </p>
        </header>

        {{-- Visi --}}
        <section class="vm-m-card">
            <h3>Visi</h3>
            <div class="vm-m-underline" aria-hidden="true"></div>
            <p class="vm-m-vision-text">Dalam Berani Kita Berbakti</p>
        </section>

        {{-- Misi --}}
        <section class="vm-m-card vm-m-mission">
            <h3>Misi</h3>
            <ul class="vm-m-list">
                <li>Memupuk karakter “berani” dalam hal kebaikan dan kebenaran</li>
                <li>Membentuk sikap respek terhadap hukum dan peraturan perundang-undangan</li>
                <li>Melahirkan generasi kritis terhadap kebijakan yang menghambat kemajuan</li>
                <li>Memupuk dan melahirkan jiwa wirausaha (Entrepreneurship)</li>
                <li>Memelihara kerukunan dan toleransi</li>
            </ul>
        </section>
    </div>
@endsection
