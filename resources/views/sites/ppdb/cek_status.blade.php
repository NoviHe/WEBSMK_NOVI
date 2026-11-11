@extends('layouts.frontend')
@section('title', 'Cek Status Pendaftaran PPDB')
@section('content')

<!-- Page Title -->
<section id="page-title" class="page-title-mini">
    <div class="container clearfix">
        <h1>Cek Status Pendaftaran PPDB</h1>
        <span>Pantau perkembangan verifikasi dan kelulusan calon peserta didik baru</span>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/ppdb">PPDB</a></li>
            <li class="breadcrumb-item active" aria-current="page">Cek Status</li>
        </ol>
    </div>
</section>

<!-- Content -->
<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">
            <div class="row">
                <div class="col-md-8 offset-md-2">

                    <!-- Search Box -->
                    <div class="card" style="padding: 30px; border-radius: 8px; border: 1px solid #e0e0e0; background: #fff; margin-bottom: 30px; box-shadow: 0 2px 10px rgba(0,0,0,0.03);">
                        <form action="/ppdb/cek-status" method="GET">
                            <h4 style="margin-bottom: 15px;">Masukkan Nomor Pendaftaran atau NISN</h4>
                            <div class="input-group">
                                <input type="text" name="keyword" class="form-control" placeholder="Contoh: PPDB-2026-XXXXX atau 0071234567" value="{{request('keyword')}}" required>
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit"><i class="icon-search3"></i> Periksa Status</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Hasil Pencarian -->
                    @if(request()->has('keyword'))
                        @if($hasil)
                        <div class="card" style="padding: 30px; border-radius: 8px; border: 1px solid #e0e0e0; background: #fff; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
                            <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 2px solid #eee; padding-bottom: 15px; margin-bottom: 20px;">
                                <div>
                                    <h3 style="margin: 0;">{{$hasil->nama_lengkap}}</h3>
                                    <span class="text-muted">Nomor Registrasi: <strong>{{$hasil->nomor_pendaftaran}}</strong></span>
                                </div>
                                <div>
                                    @if($hasil->status_pendaftaran === 'Diterima')
                                        <span class="badge badge-success" style="font-size: 16px; padding: 8px 15px;">DITERIMA</span>
                                    @elseif($hasil->status_pendaftaran === 'Diverifikasi')
                                        <span class="badge badge-info" style="font-size: 16px; padding: 8px 15px;">BERKAS DIVERIFIKASI</span>
                                    @elseif($hasil->status_pendaftaran === 'Ditolak')
                                        <span class="badge badge-danger" style="font-size: 16px; padding: 8px 15px;">DITOLAK</span>
                                    @else
                                        <span class="badge badge-warning" style="font-size: 16px; padding: 8px 15px; color: #fff;">MENUNGGU VERIFIKASI</span>
                                    @endif
                                </div>
                            </div>

                            <table class="table table-striped">
                                <tr>
                                    <th style="width: 200px;">NISN</th>
                                    <td>{{$hasil->nisn}}</td>
                                </tr>
                                <tr>
                                    <th>Asal Sekolah</th>
                                    <td>{{$hasil->asal_sekolah}}</td>
                                </tr>
                                <tr>
                                    <th>Pilihan Jurusan 1</th>
                                    <td><strong>{{$hasil->pilihan1 ? $hasil->pilihan1->nama_jurusan : '-'}}</strong></td>
                                </tr>
                                <tr>
                                    <th>Pilihan Jurusan 2</th>
                                    <td>{{$hasil->pilihan2 ? $hasil->pilihan2->nama_jurusan : '-'}}</td>
                                </tr>
                                <tr>
                                    <th>Nama Orang Tua / Wali</th>
                                    <td>{{$hasil->nama_wali}} ({{$hasil->nomor_wa_wali}})</td>
                                </tr>
                                <tr>
                                    <th>Tanggal Pendaftaran</th>
                                    <td>{{$hasil->created_at->format('d F Y, H:i')}} WIB</td>
                                </tr>
                                @if($hasil->catatan_verifikasi)
                                <tr>
                                    <th>Catatan Panitia</th>
                                    <td class="text-info"><em>{{$hasil->catatan_verifikasi}}</em></td>
                                </tr>
                                @endif
                            </table>

                            <div class="topmargin-sm text-center">
                                <a href="{{route('ppdb.bukti', $hasil->nomor_pendaftaran)}}" class="button button-rounded button-blue" target="_blank">
                                    <i class="icon-print"></i> Cetak Lembar Bukti Pendaftaran
                                </a>
                            </div>
                        </div>
                        @else
                        <div class="alert alert-warning text-center" role="alert">
                            <i class="icon-warning-sign"></i> Data pendaftaran dengan kata kunci "<strong>{{request('keyword')}}</strong>" tidak ditemukan. Pastikan nomor pendaftaran atau NISN yang Anda masukkan sudah benar.
                        </div>
                        @endif
                    @endif

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
