@extends('layouts.frontend')
@section('title', $artikel->judul)
@section('content')

<!-- Page Title -->
<section id="page-title" class="page-title-mini">
    <div class="container clearfix">
        <h1>Warta Sekolah</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/berita">Berita</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$artikel->kategori ? $artikel->kategori->nama_kategori : 'Umum'}}</li>
        </ol>
    </div>
</section>

<!-- Content -->
<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">
            <div class="single-post nobottommargin">

                <div class="entry clearfix">

                    <!-- Title -->
                    <div class="entry-title">
                        <h2>{{$artikel->judul}}</h2>
                    </div>

                    <!-- Meta -->
                    <ul class="entry-meta clearfix">
                        <li><i class="icon-calendar3"></i> {{$artikel->published_at ? $artikel->published_at->format('d F Y') : $artikel->created_at->format('d F Y')}}</li>
                        <li><i class="icon-user"></i> {{$artikel->user ? $artikel->user->name : 'Admin'}}</li>
                        <li><i class="icon-folder-open"></i> <a href="#">{{$artikel->kategori ? $artikel->kategori->nama_kategori : 'Umum'}}</a></li>
                        <li><i class="icon-eye2"></i> {{$artikel->views_count}} kali dibaca</li>
                    </ul>

                    <!-- Featured Image -->
                    @if($artikel->thumbnail)
                    <div class="entry-image bottommargin">
                        <img src="{{$artikel->getThumbnail()}}" alt="{{$artikel->judul}}" style="max-height: 480px; width: 100%; object-fit: cover; border-radius: 6px;">
                    </div>
                    @endif

                    <!-- Content Text -->
                    <div class="entry-content notopmargin" style="font-size: 16px; line-height: 1.8; color: #444;">
                        {!! $artikel->konten !!}
                    </div>

                </div>

                <!-- Related Posts -->
                @if($artikel_terkait->count() > 0)
                <div class="line"></div>
                <h4>Berita &amp; Artikel Terkait Lainnya</h4>
                <div class="related-posts clearfix">
                    <div class="row">
                        @foreach($artikel_terkait as $rel)
                        <div class="col-md-3 col-sm-6 bottommargin-sm">
                            <div class="mpost clearfix">
                                <div class="entry-image">
                                    <a href="{{route('berita.detail', $rel->slug)}}"><img src="{{$rel->getThumbnail()}}" alt="{{$rel->judul}}" style="height: 140px; object-fit: cover;"></a>
                                </div>
                                <div class="entry-c">
                                    <div class="entry-title">
                                        <h4><a href="{{route('berita.detail', $rel->slug)}}">{{$rel->judul}}</a></h4>
                                    </div>
                                    <ul class="entry-meta clearfix">
                                        <li><i class="icon-calendar3"></i> {{$rel->created_at->format('d M Y')}}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                <div class="topmargin-sm">
                    <a href="/berita" class="button button-border button-rounded button-blue"><i class="icon-angle-left"></i> Kembali ke Daftar Berita</a>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection
