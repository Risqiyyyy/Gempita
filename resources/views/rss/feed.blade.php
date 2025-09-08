<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<rss
    version="2.0"
    xmlns:dc="http://purl.org/dc/elements/1.1/"
    xmlns:content="http://purl.org/rss/1.0/modules/content/"
    xmlns:atom="http://www.w3.org/2005/Atom"
    xmlns:sy="http://purl.org/rss/1.0/modules/syndication/"
    xmlns:slash="http://purl.org/rss/1.0/modules/slash/"
    xmlns:media="http://search.yahoo.com/mrss/"
>

<channel>
    <title>Gempita - Gerakan Milenial Pencinta Tanah Air</title>
    <link>{{ url('/') }}</link>
    <atom:link href="{{ request()->fullUrl() }}" rel="self" type="application/rss+xml" />
    <lastBuildDate>{{ now()->toRfc2822String() }}</lastBuildDate>
    <language>id</language>
    <description>Berita terkini hari ini, nasional, hukum, politik, daerah, metropolitan, lifestyle, kesehatan</description>
    <sy:updatePeriod>hourly</sy:updatePeriod>
    <sy:updateFrequency>1</sy:updateFrequency>

    <image>
        <url>{{ url('public/favicon.ico') }}</url>
        <title>Gempita Milenial</title>
        <link>{{ url('/') }}</link>
    </image>

    @foreach($posts as $post)
        <item>
            <title><![CDATA[{{ $post->title }}]]></title>
            <link>{{ url($post->slug) }}</link>
            <author>{{ $post->user->name }}</author>
            @if ($post->subCategory)
                <category>{{ $post->subCategory->nama_sub_kategori }}</category>
            @else
                <category>{{ $post->kategori->nama_kategori }}</category>
            @endif
            <description><![CDATA[
                {{ Str::limit(strip_tags($post->two_paragraphs_text), 160) }}
            ]]></description>
            <content:encoded><![CDATA[
                {!! $post->content !!}
            ]]></content:encoded>
            <pubDate>{{ $post->created_at->toRfc2822String() }}</pubDate>
            <guid isPermaLink="true">{{ url($post->slug) }}</guid>

            @if (!empty($post->gambar))
                <media:thumbnail
                    url="{{ filter_var($post->gambar, FILTER_VALIDATE_URL) ? $post->gambar : url($post->gambar) }}"
                    type="image/jpeg" />
            @endif
        </item>
    @endforeach

</channel>
</rss>
