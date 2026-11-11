@extends('layouts.frontend')
@section('title', $jurusan->nama_jurusan)
@section('content')

<!-- Page Title -->
<section id="page-title" class="page-title-mini">
    <div class="container clearfix">
        <h1>{{$jurusan->nama_jurusan}} ({{$jurusan->kode_jurusan}})</h1>
        <span>Kompetensi Keahlian Unggulan SMKN 1 Padaherang</span>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Keahlian</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$jurusan->kode_jurusan}}</li>
        </ol>
    </div>
</section>

<!-- Content -->
<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">
            <div class="row">

                <div class="col-lg-8">
                    @if($jurusan->gambar)
                    <div class="bottommargin-sm">
                        <img src="{{$jurusan->getGambar()}}" alt="{{$jurusan->nama_jurusan}}" style="width: 100%; max-height: 420px; object-fit: cover; border-radius: 6px;">
                    </div>
                    @endif

                    <div class="heading-block topmargin-xs bottommargin-sm">
                        <h3>Deskripsi Kompetensi Keahlian</h3>
                    </div>
                    <p style="font-size: 16px; line-height: 1.8; color: #444;">
                        {{$jurusan->deskripsi ?? 'Informasi deskripsi kompetensi keahlian sedang dalam proses pembaruan.'}}
                    </p>

                    @if($jurusan->visi_misi)
                    <div class="heading-block topmargin-sm bottommargin-sm">
                        <h4>Visi &amp; Misi Kejuruan</h4>
                    </div>
                    <p style="font-size: 15px; line-height: 1.7; color: #555;">
                        {{$jurusan->visi_misi}}
                    </p>
                    @endif

                    @if($jurusan->prospek_kerja)
                    <div class="heading-block topmargin-sm bottommargin-sm">
                        <h4>Peluang &amp; Prospek Kerja Lulusan</h4>
                    </div>
                    <p style="font-size: 15px; line-height: 1.7; color: #555;">
                        {{$jurusan->prospek_kerja}}
                    </p>
                    @endif
                </div>

                <div class="col-lg-4">
                    <div class="card" style="background: #f9f9f9; border: 1px solid #eee; border-radius: 6px; padding: 25px;">
                        <h4 style="margin-bottom: 15px;">Informasi Kejuruan</h4>
                        <ul class="list-unstyled" style="line-height: 2.2;">
                            <li><strong>Kode Jurusan:</strong> <span class="badge badge-primary">{{$jurusan->kode_jurusan}}</span></li>
                            <li><strong>Status Akreditasi:</strong> Terakreditasi A</li>
                            <li><strong>Jenjang:</strong> SMK 3 Tahun</li>
                            <li><strong>Sertifikasi:</strong> LSP-P1 BNSP</li>
                        </ul>
                        <div class="topmargin-sm">
                            <a href="/login" class="button button-rounded button-blue btn-block text-center m-0">Akses Portal Siswa</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection
