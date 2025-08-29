@extends('frontend.dekstop.master.master-app')

@section('content')
    <style>
        .gallery-wrap {
            padding: 70px 0;
        }

        .tl-header {
            text-align: center;
            margin-bottom: 32px;
            margin-top: 150px;
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

        .gallery-grid {
            display: grid;
            gap: 32px;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            /* 3 gambar per baris */
        }

        .g-item {
            position: relative;
            overflow: hidden;
            border-radius: 8px;
            aspect-ratio: 3 / 2;
            /* proporsi seperti contoh */
            cursor: pointer;
        }

        .g-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform .2s ease;
        }

        .g-item:hover img {
            transform: scale(1.02);
        }

        /* Lightbox */
        .lightbox {
            position: fixed;
            inset: 0;
            display: none;
            place-items: center;
            background: rgba(0, 0, 0, .9);
            z-index: 9999;
            padding: 24px;
        }

        .lightbox.open {
            display: grid;
        }

        .lb-inner {
            position: relative;
            width: min(1100px, 96vw);
        }

        .lb-img {
            width: 100%;
            max-height: 82vh;
            object-fit: contain;
            display: block;
            border-radius: 8px;
        }

        .lb-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 44px;
            height: 44px;
            border: none;
            border-radius: 999px;
            background: rgba(255, 255, 255, .18);
            color: #fff;
            font-size: 20px;
            cursor: pointer;
        }

        .lb-prev {
            left: -56px;
        }

        .lb-next {
            right: -56px;
        }

        .lb-close {
            position: absolute;
            top: -52px;
            right: 0;
            width: 40px;
            height: 40px;
            border: none;
            border-radius: 999px;
            background: rgba(255, 255, 255, .18);
            color: #fff;
            font-size: 20px;
            cursor: pointer;
        }

        @media (max-width:768px) {
            .lb-prev {
                left: 8px
            }

            .lb-next {
                right: 8px
            }

            .lb-close {
                top: 8px;
                right: 8px
            }
        }
    </style>


    <header class="tl-header">
        <h2 class="tl-title">Gallery Gempita</h2>
        <p class="tl-subtitle">
            Gempita Gallery adalah wadah bagi generasi muda untuk ikut ambil bagian dalam INDONESIA EMAS 2025
        </p>
    </header>


    <div class="content-home" id="content">
        <section class="gallery-wrap">
            <div class="gallery-grid" id="gallery">
                @php
                    // Ganti daftar ini dengan fotomu sendiri
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
                    <figure class="g-item" data-index="{{ $i }}" data-src="{{ $src }}">
                        <img src="{{ $src }}" alt="Gallery {{ $i + 1 }}" loading="lazy" decoding="async">
                    </figure>
                @endforeach
            </div>
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
            const thumbs = Array.from(document.querySelectorAll('.g-item'));
            const lb = document.getElementById('lightbox');
            const lbImg = document.getElementById('lbImg');
            const btnPrev = document.getElementById('lbPrev');
            const btnNext = document.getElementById('lbNext');
            const btnClose = document.getElementById('lbClose');
            let idx = 0;

            function openAt(i) {
                idx = (i + thumbs.length) % thumbs.length;
                const el = thumbs[idx];
                lbImg.src = el.dataset.src;
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

            thumbs.forEach(t => t.addEventListener('click', () => openAt(parseInt(t.dataset.index))));
            btnClose.addEventListener('click', closeLB);
            btnNext.addEventListener('click', next);
            btnPrev.addEventListener('click', prev);
            lb.addEventListener('click', e => {
                if (e.target === lb) closeLB();
            });
            document.addEventListener('keydown', e => {
                if (!lb.classList.contains('open')) return;
                if (e.key === 'Escape') closeLB();
                if (e.key === 'ArrowRight') next();
                if (e.key === 'ArrowLeft') prev();
            });
        })();
    </script>
@endsection
