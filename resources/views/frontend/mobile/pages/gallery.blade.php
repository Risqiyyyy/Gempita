@extends('frontend.mobile.master.master-app')

@section('content')
    <style>
        /* ====== Mobile Gallery ====== */
        .gal-m-wrap {
            padding: 20px 12px 28px;
        }

        .gal-m-header {
            text-align: center;
            margin: 10px 0 14px;
        }

        .gal-m-title {
            margin: 0;
            font-weight: 800;
            letter-spacing: .3px;
            font-size: 20px;
        }

        .gal-m-sub {
            margin: 6px auto 0;
            max-width: 46ch;
            font-size: 13px;
            color: #6b7280;
        }

        .gal-m-grid {
            display: grid;
            gap: 12px;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            /* HP kecil: 2 kolom */
        }

        @media (min-width:560px) {
            .gal-m-grid {
                gap: 14px;
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }

            /* lebar: 3 kolom */
        }

        .g-m-item {
            position: relative;
            overflow: hidden;
            border-radius: 10px;
            aspect-ratio: 3 / 2;
            /* lebih tinggi agar foto terasa besar */
            cursor: pointer;
            background: #f3f4f6;
        }

        .g-m-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform .18s ease;
        }

        .g-m-item:active img {
            transform: scale(1.01);
        }

        /* ====== Lightbox (mobile-friendly) ====== */
        .lightbox {
            position: fixed;
            inset: 0;
            display: none;
            place-items: center;
            background: rgba(0, 0, 0, .92);
            z-index: 9999;
            padding: 12px;
        }

        .lightbox.open {
            display: grid;
        }

        .lb-inner {
            position: relative;
            width: min(1000px, 96vw);
        }

        .lb-img {
            width: 100%;
            max-height: 85vh;
            object-fit: contain;
            border-radius: 8px;
            display: block;
        }

        .lb-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 38px;
            height: 38px;
            border: none;
            border-radius: 999px;
            background: rgba(255, 255, 255, .18);
            color: #fff;
            font-size: 18px;
            cursor: pointer;
        }

        .lb-prev {
            left: 6px;
        }

        .lb-next {
            right: 6px;
        }

        .lb-close {
            position: absolute;
            top: 8px;
            right: 8px;
            width: 36px;
            height: 36px;
            border: none;
            border-radius: 999px;
            background: rgba(255, 255, 255, .22);
            color: #fff;
            font-size: 18px;
            cursor: pointer;
        }
    </style>

    <div class="gal-m-wrap" id="content">
        <header class="gal-m-header">
            <h2 class="gal-m-title">Gallery Gempita</h2>
            <p class="gal-m-sub"> Gempita Gallery adalah wadah bagi generasi muda untuk ikut ambil bagian dalam INDONESIA
                EMAS 2025.</p>
        </header>

        <section class="gal-m-grid" id="gallery">
            @php
                // Pakai data yang sama seperti desktop (silakan ganti sesuai kebutuhan)
                $photos = [
                    asset('frontend/images/gallery/gallery1.webp'),
                    asset('frontend/images/gallery/gallery2.webp'),
                    asset('frontend/images/gallery/gallery3.jpg'),
                    asset('frontend/images/gallery/gallery4.webp'),
                    asset('frontend/images/gallery/gallery5.webp'),
                    asset('frontend/images/gallery/gallery6.webp'),
                ];
            @endphp

            @foreach ($photos as $i => $src)
                <figure class="g-m-item" data-index="{{ $i }}" data-src="{{ $src }}">
                    <img src="{{ $src }}" alt="Gallery {{ $i + 1 }}" loading="lazy" decoding="async">
                </figure>
            @endforeach
        </section>
    </div>

    <!-- Lightbox -->
    <div class="lightbox" id="lightbox" aria-hidden="true" role="dialog" aria-label="Gambar">
        <div class="lb-inner">
            <button class="lb-close" id="lbClose" aria-label="Tutup">&times;</button>
            <button class="lb-btn lb-prev" id="lbPrev" aria-label="Sebelumnya">&#8249;</button>
            <img class="lb-img" id="lbImg" src="" alt="">
            <button class="lb-btn lb-next" id="lbNext" aria-label="Berikutnya">&#8250;</button>
        </div>
    </div>

    <script>
        (function() {
            const thumbs = Array.from(document.querySelectorAll('.g-m-item'));
            const lb = document.getElementById('lightbox');
            const lbImg = document.getElementById('lbImg');
            const btnPrev = document.getElementById('lbPrev');
            const btnNext = document.getElementById('lbNext');
            const btnClose = document.getElementById('lbClose');
            let idx = 0,
                startX = 0,
                endX = 0;

            function openAt(i) {
                idx = (i + thumbs.length) % thumbs.length;
                lbImg.src = thumbs[idx].dataset.src;
                lb.classList.add('open');
                lb.setAttribute('aria-hidden', 'false');
                document.body.style.overflow = 'hidden';
            }

            function closeLB() {
                lb.classList.remove('open');
                lb.setAttribute('aria-hidden', 'true');
                lbImg.src = '';
                document.body.style.overflow = '';
            }

            function next() {
                openAt(idx + 1);
            }

            function prev() {
                openAt(idx - 1);
            }

            thumbs.forEach((t, i) => t.addEventListener('click', () => openAt(i)));
            btnClose.addEventListener('click', closeLB);
            btnNext.addEventListener('click', next);
            btnPrev.addEventListener('click', prev);
            lb.addEventListener('click', e => {
                if (e.target === lb) closeLB();
            });

            // Keyboard support (untuk perangkat dengan keyboard)
            document.addEventListener('keydown', e => {
                if (!lb.classList.contains('open')) return;
                if (e.key === 'Escape') closeLB();
                if (e.key === 'ArrowRight') next();
                if (e.key === 'ArrowLeft') prev();
            });

            // Swipe support
            lb.addEventListener('touchstart', e => {
                startX = e.changedTouches[0].clientX;
            }, {
                passive: true
            });
            lb.addEventListener('touchend', e => {
                endX = e.changedTouches[0].clientX;
                const dx = endX - startX;
                if (Math.abs(dx) > 40) {
                    dx < 0 ? next() : prev();
                }
            }, {
                passive: true
            });
        })();
    </script>
@endsection
