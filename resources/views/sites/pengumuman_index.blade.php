@extends('layouts.frontend')
@section('title', 'Papan Pengumuman Resmi')
@section('content')

<!-- Page Title -->
<section id="page-title" class="page-title-mini">
    <div class="container clearfix">
        <h1>Papan Pengumuman Resmi</h1>
        <span>Informasi dinas, jadwal akademik, dan pemberitahuan SMKN 1 Padaherang</span>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Pengumuman</li>
        </ol>
    </div>
</section>

<!-- Content -->
<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">

            <div class="row">
                <div class="col-md-10 offset-md-1">
                    @forelse($pengumumans as $p)
                    <div class="feature-box fbox-plain {{ $p->is_urgent ? 'fbox-outline' : '' }}" style="margin-bottom: 25px; padding: 20px; background: #fff; border: 1px solid #e5e5e5; border-radius: 6px; {{ $p->is_urgent ? 'border-left: 5px solid #e74c3c;' : 'border-left: 5px solid #3498db;' }}">
                        <div class="fbox-icon">
                            @if($p->is_urgent)
                                <i class="icon-warning-sign text-danger"></i>
                            @else
                                <i class="icon-info-sign text-info"></i>
                            @endif
                        </div>
                        <h3>
                            <a href="{{route('pengumuman.detail', $p->slug)}}">{{$p->judul}}</a>
                            @if($p->is_urgent)
                                <span class="badge badge-danger">PENTING</span>
                            @endif
                        </h3>
                        <p style="color: #666; margin-bottom: 10px;">
                            {{ Str::limit(strip_tags($p->isi_pengumuman), 180) }}
                        </p>
                        <div style="font-size: 13px; color: #888;">
                            <span><i class="icon-calendar3"></i> Tanggal: {{$p->created_at->format('d M Y')}}</span>
                            <span style="margin-left: 15px;"><i class="icon-user"></i> Ditujukan: <strong>{{strtoupper($p->target_audiens)}}</strong></span>
                            @if($p->berkas_lampiran)
                                <span style="margin-left: 15px;"><i class="icon-paperclip"></i> Ada Berkas Terlampir</span>
                            @endif
                            <a href="{{route('pengumuman.detail', $p->slug)}}" class="float-right text-primary">Lihat Selengkapnya &rarr;</a>
                        </div>
                    </div>
                    @empty
                    <div class="text-center" style="padding: 50px 0;">
                        <h4>Tidak ada pengumuman aktif saat ini.</h4>
                    </div>
                    @endforelse

                    <div class="text-center topmargin-sm">
                        {{$pengumumans->links()}}
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection
