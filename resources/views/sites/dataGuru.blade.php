@extends('layouts.frontend')
@section('title', 'Direktori Tenaga Pendidik (Guru)')
@section('content')

<!-- Page Title -->
<section id="page-title" class="page-title-mini">
    <div class="container clearfix">
        <h1>Direktori Guru &amp; Tenaga Kependidikan</h1>
        <span>Profil tenaga pendidik profesional di SMKN 1 Padaherang</span>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Guru</li>
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
                    <form action="/dataGuru" method="GET">
                        <div class="input-group">
                            <input type="text" name="cari" class="form-control" placeholder="Cari nama guru atau mata pelajaran..." value="{{request('cari')}}">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit"><i class="icon-search3"></i> Cari</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Team Grid -->
            <div class="row">
                @forelse($data_guru as $guru)
                <div class="col-lg-3 col-md-4 col-sm-6 bottommargin">
                    <div class="team text-center" style="background: #fff; border: 1px solid #eee; border-radius: 8px; padding: 20px; box-shadow: 0 2px 6px rgba(0,0,0,0.03);">
                        <div class="team-image" style="margin-bottom: 15px;">
                            <img src="{{$guru->getFoto()}}" alt="{{$guru->nama_guru}}" class="rounded-circle" style="width: 120px; height: 120px; object-fit: cover; margin: 0 auto;">
                        </div>
                        <div class="team-desc">
                            <div class="team-title">
                                <h4 style="margin-bottom: 5px; font-size: 16px;">{{$guru->nama_guru}}{{$guru->gelar ? ', ' . $guru->gelar : ''}}</h4>
                                <span class="badge badge-info" style="font-size: 12px;">{{$guru->bidang_studi ?? 'Pendidik'}}</span>
                            </div>
                            <div class="team-content topmargin-xs" style="font-size: 13px; color: #777;">
                                <p style="margin: 0;">NIP: {{$guru->nip ?? '-'}}</p>
                                <p style="margin: 0;">Status: {{$guru->status_kepegawaian}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12 text-center" style="padding: 50px 0;">
                    <h4>Belum ada data guru yang ditampilkan.</h4>
                </div>
                @endforelse
            </div>

            <div class="row">
                <div class="col-12 text-center">
                    {{$data_guru->appends(request()->input())->links()}}
                </div>
            </div>

        </div>
    </div>
</section>
@endsection
