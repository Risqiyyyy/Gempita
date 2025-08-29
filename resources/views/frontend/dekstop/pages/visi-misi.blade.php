@extends('frontend.dekstop.master.master-app')

@section('content')
    <div class="content-home" id="content">
        <section class="vm-wrap">
            <header class="vm-header">
                <h1 class="vm-title">VISI & MISI</h1>
                <p class="vm-lead">
                    VISI dan MISI Organisasi GEMPITA selaras dengan hakikat “milenial” dalam dua terminologi di atas:
                    <strong>BERANI</strong> dan <strong>MELEK TEKNOLOGI</strong>
                </p>
            </header>

            <div class="vm-grid">
                {{-- Kolom kiri: Visi --}}
                <div class="vm-left">
                    <div class="vm-vision">
                        <h3 class="vm-vision-title">Visi</h3>
                        <span class="vm-vision-underline" aria-hidden="true"></span>
                        <p class="vm-vision-text">Dalam Berani Kita Berbakti</p>
                    </div>
                </div>

                {{-- Kolom kanan: Misi --}}
                <aside class="vm-right">
                    <h3 class="vm-mission-title">Misi</h3>
                    <ul class="vm-mission-list">
                        <li>Memupuk karakter “berani” dalam hal kebaikan dan kebenaran</li>
                        <li>Membentuk sikap respek terhadap hukum dan peraturan perundang-undangan</li>
                        <li>Melahirkan generasi kritis terhadap kebijakan yang menghambat kemajuan</li>
                        <li>Memupuk dan melahirkan jiwa wirausaha (Entrepreneurship)</li>
                        <li>Memelihara kerukunan dan toleransi</li>
                    </ul>
                </aside>
            </div>
        </section>
    </div>

    <style>
        :root {
            --vm-blue: #2494bb;
            --vm-muted: #6b7280;
            --vm-radius: 12px;
            --vm-shadow: 0 10px 26px rgba(0, 0, 0, .08);
        }

        .vm-wrap {
            padding: 32px 0 48px;
        }

        .vm-header {
            margin-bottom: 50px;
        }

        .vm-title {
            text-align: center;
            margin: 0 0 8px;
            font-weight: 900;
            font-size: 42px;
            line-height: 1.1;
            letter-spacing: .3px;
        }

        .vm-lead {
            margin: 0 0 8px;
            color: var(--vm-muted);
            text-align: center;
        }

        .vm-grid {
            display: grid;
            gap: 28px;
            grid-template-columns: 1.1fr .9fr;
            /* kiri sedikit lebih lebar */
        }

        @media (max-width: 900px) {
            .vm-grid {
                grid-template-columns: 1fr;
            }
        }

        /* Kiri */
        .vm-left {
            display: flex;
            align-items: flex-start;
            gap: 26px;
        }

        @media (max-width: 900px) {
            .vm-left {
                flex-direction: column;
                align-items: flex-start;
            }
        }

        .vm-logo {
            width: 220px;
            height: 220px;
            margin: 0;
            display: block;
            flex: 0 0 auto;
        }

        .vm-logo img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            display: block;
        }

        .vm-vision-title {
            margin: 4px 0 6px;
            font-size: 28px;
            font-weight: 800;
        }

        .vm-vision-underline {
            display: block;
            width: 58px;
            height: 3px;
            background: var(--vm-blue);
            border-radius: 999px;
            margin: 6px 0 10px;
        }

        .vm-vision-text {
            margin: 0;
            font-size: 18px;
        }

        /* Kanan */
        .vm-right {
            background: var(--vm-blue);
            color: #fff;
            border-radius: var(--vm-radius);
            padding: 24px 26px;
            box-shadow: var(--vm-shadow);
        }

        .vm-mission-title {
            margin: 0 0 10px;
            font-size: 32px;
            font-weight: 800;
        }

        .vm-mission-list {
            margin: 0;
            padding: 0;
            list-style: none;
            display: grid;
            gap: 18px;
        }

        .vm-mission-list li {
            position: relative;
            padding-left: 36px;
            font-weight: 700;
        }

        .vm-mission-list li::before {
            content: "";
            position: absolute;
            left: 0;
            top: .7em;
            width: 20px;
            height: 2px;
            background: #000;
            opacity: .7;
            /* garis kecil seperti contoh */
        }
    </style>
@endsection
