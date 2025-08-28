@extends('frontend.mobile.master.master-app')

@section('content')
    <div class="kanal-wrap">
        <h3 class="base-title-desc">SITE MAP</h3>
    </div>
    <article class="article-detail mt-20">
        <div class="t0-b20">
            <div class="article-detail--body">
                <div class="list-article">
                    <ul style="margin: 0; padding:0;">
                        @foreach ($categories as $item)
                        <li><a href="{{ route('kanal.desktop', ['slug' => $item->slug]) }}">{{$item->nama_kategori}}</a></li>
                        @endforeach
                        <li><a href="https://www.youtube.com/@indopopid">Video</a></li>
                        <li><a href="/indeks">Indeks</a></li>
                    </ul>
                </div>
            </div>
        </div>
    @endsection
