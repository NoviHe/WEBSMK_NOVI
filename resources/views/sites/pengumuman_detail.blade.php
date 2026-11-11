@extends('layouts.frontend')
@section('title', $pengumuman->judul)
@section('content')

<!-- Page Title -->
<section id="page-title" class="page-title-mini">
    <div class="container clearfix">
        <h1>Detail Pengumuman</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/pengumuman">Pengumuman</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$pengumuman->judul}}</li>
        </ol>
    </div>
</section>

<!-- Content -->
<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div style="background: #fff; border: 1px solid #e0e0e0; border-radius: 8px; padding: 30px; box-shadow: 0 2px 10px rgba(0,0,0,0.03);">

                        @if($pengumuman->is_urgent)
                        <div class="alert alert-danger" role="alert">
                            <i class="icon-warning-sign"></i> <strong>Pemberitahuan Penting / Mendesak</strong>
                        </div>
                        @endif

                        <h2 style="margin-bottom: 10px;">{{$pengumuman->judul}}</h2>

                        <div class="entry-meta clearfix" style="border-bottom: 1px solid #eee; padding-bottom: 15px; margin-bottom: 25px;">
                            <span class="mr-3"><i class="icon-calendar3"></i> Tanggal Rilis: {{$pengumuman->created_at->format('d F Y')}}</span>
                            <span class="mr-3"><i class="icon-user"></i> Target: <strong>{{strtoupper($pengumuman->target_audiens)}}</strong></span>
                            @if($pengumuman->tanggal_berakhir)
                                <span class="text-danger"><i class="icon-time"></i> Berlaku hingga: {{$pengumuman->tanggal_berakhir->format('d M Y')}}</span>
                            @endif
                        </div>

                        <div style="font-size: 16px; line-height: 1.8; color: #333; margin-bottom: 30px;">
                            {!! nl2br(e($pengumuman->isi_pengumuman)) !!}
                        </div>

                        @if($pengumuman->berkas_lampiran)
                        <div class="alert alert-info" style="display: flex; align-items: center; justify-content: space-between;">
                            <div>
                                <i class="icon-file-text"></i> <strong>Berkas Lampiran Resmi</strong>
                                <p style="margin: 0; font-size: 13px;">{{$pengumuman->berkas_lampiran}}</p>
                            </div>
                            <a href="{{asset('files/pengumuman/' . $pengumuman->berkas_lampiran)}}" target="_blank" class="button button-small button-rounded button-blue m-0">
                                <i class="icon-download"></i> Unduh Lampiran
                            </a>
                        </div>
                        @endif

                        <div class="topmargin-sm">
                            <a href="/pengumuman" class="button button-border button-rounded button-dark"><i class="icon-angle-left"></i> Kembali ke Pengumuman</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
