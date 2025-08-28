@extends('frontend.dekstop.master.master-app')
@section('content')
    <div class="content-home" id="content">
        <div class="content-article mt-15">
            <article class="article-detail">
                <h3 class="card-headline-no-image-title-detail">SITE MAP</h3>
                <div class="article-detail--body">
                    <div class="list-article">
                        <ul>
                            @foreach ($categories as $item)
                            <li><a href="{{ route('kanal.desktop', ['slug' => $item->slug]) }}">{{$item->nama_kategori}}</a></li>
                            @endforeach
                            <li><a href="https://www.youtube.com/@indopopid">Video</a></li>
                            <li><a href="/indeks">Indeks</a></li>
                        </ul>
                    </div>
                </div>
            </article>
        </div>

        @include('frontend.dekstop.components.sidebar')
    </div>
@endsection
