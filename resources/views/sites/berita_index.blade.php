@extends('layouts.frontend')
@section('title', 'Berita & Artikel Terkini')
@section('content')

<!-- Page Title -->
<section id="page-title" class="page-title-mini">
    <div class="container clearfix">
        <h1>Warta &amp; Berita Sekolah</h1>
        <span>Informasi kegiatan dan prestasi terkini SMKN 1 Padaherang</span>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Berita</li>
        </ol>
    </div>
</section>

<!-- Content -->
<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">

            <!-- Search Form -->
            <div class="row bottommargin-sm">
                <div class="col-md-6 offset-md-3">
                    <form action="/berita" method="GET">
                        <div class="input-group">
                            <input type="text" name="cari" class="form-control" placeholder="Cari berita atau artikel..." value="{{request('cari')}}">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit"><i class="icon-search3"></i> Cari</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Post Grid -->
            <div id="posts" class="post-grid grid-container post-masonry grid-3 clearfix">
                @forelse($artikels as $art)
                <div class="entry clearfix">
                    <div class="entry-image">
                        <a href="{{route('berita.detail', $art->slug)}}">
                            <img class="image_fade" src="{{$art->getThumbnail()}}" alt="{{$art->judul}}" style="height: 220px; object-fit: cover;">
                        </a>
                    </div>
                    <div class="entry-title">
                        <h2><a href="{{route('berita.detail', $art->slug)}}">{{$art->judul}}</a></h2>
                    </div>
                    <ul class="entry-meta clearfix">
                        <li><i class="icon-calendar3"></i> {{$art->published_at ? $art->published_at->format('d M Y') : $art->created_at->format('d M Y')}}</li>
                        <li><i class="icon-folder-open"></i> {{$art->kategori ? $art->kategori->nama_kategori : 'Umum'}}</li>
                        <li><i class="icon-eye2"></i> {{$art->views_count}} pembaca</li>
                    </ul>
                    <div class="entry-content">
                        <p>{!! Str::limit(strip_tags($art->konten), 120) !!}</p>
                        <a href="{{route('berita.detail', $art->slug)}}" class="more-link">Baca Selengkapnya &rarr;</a>
                    </div>
                </div>
                @empty
                <div class="col-12 text-center" style="padding: 50px 0;">
                    <h4>Belum ada berita yang dipublikasikan.</h4>
                </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="row">
                <div class="col-12 text-center">
                    {{$artikels->appends(request()->input())->links()}}
                </div>
            </div>

        </div>
    </div>
</section>
@endsection
