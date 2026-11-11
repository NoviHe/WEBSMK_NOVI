@extends('layouts.master')
@section('title', 'Verifikasi Pendaftar PPDB - ' . $pendaftar->nama_lengkap)
@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">

                <!-- BIODATA & BERKAS -->
                <div class="col-md-8">
                    <div class="panel">
                        <div class="panel-heading" style="border-bottom: 1px solid #eee; padding-bottom: 15px;">
                            <h3 class="panel-title">Data Lengkap Calon Siswa</h3>
                            <div class="right">
                                <a href="{{route('ppdb.bukti', $pendaftar->nomor_pendaftaran)}}" target="_blank" class="btn btn-default btn-sm"><i class="fa fa-print"></i> Cetak Bukti</a>
                                <a href="{{route('admin.ppdb.index')}}" class="btn btn-primary btn-sm">Kembali</a>
                            </div>
                        </div>

                        <div class="panel-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th style="width: 220px;" class="active">Nomor Registrasi</th>
                                    <td><strong class="text-primary">{{$pendaftar->nomor_pendaftaran}}</strong></td>
                                </tr>
                                <tr>
                                    <th class="active">Nama Lengkap</th>
                                    <td><strong>{{$pendaftar->nama_lengkap}}</strong></td>
                                </tr>
                                <tr>
                                    <th class="active">NISN</th>
                                    <td>{{$pendaftar->nisn}}</td>
                                </tr>
                                <tr>
                                    <th class="active">NIK Kependudukan</th>
                                    <td>{{$pendaftar->nik ?? '-'}}</td>
                                </tr>
                                <tr>
                                    <th class="active">Jenis Kelamin</th>
                                    <td>{{$pendaftar->jenis_kelamin == 'L' ? 'Laki-Laki' : 'Perempuan'}}</td>
                                </tr>
                                <tr>
                                    <th class="active">Tempat, Tanggal Lahir</th>
                                    <td>{{$pendaftar->tempat_lahir}}, {{$pendaftar->tanggal_lahir ? $pendaftar->tanggal_lahir->format('d F Y') : '-'}}</td>
                                </tr>
                                <tr>
                                    <th class="active">Asal Sekolah</th>
                                    <td>{{$pendaftar->asal_sekolah}}</td>
                                </tr>
                                <tr>
                                    <th class="active">Pilihan Jurusan 1</th>
                                    <td><span class="label label-primary">{{$pendaftar->pilihan1 ? $pendaftar->pilihan1->nama_jurusan : '-'}}</span></td>
                                </tr>
                                <tr>
                                    <th class="active">Pilihan Jurusan 2</th>
                                    <td>{{$pendaftar->pilihan2 ? $pendaftar->pilihan2->nama_jurusan : '-'}}</td>
                                </tr>
                                <tr>
                                    <th class="active">Nama Orang Tua / Wali</th>
                                    <td>{{$pendaftar->nama_wali}}</td>
                                </tr>
                                <tr>
                                    <th class="active">Nomor WhatsApp Wali</th>
                                    <td>
                                        <a href="https://wa.me/{{preg_replace('/[^0-9]/', '', $pendaftar->nomor_wa_wali)}}" target="_blank" class="btn btn-success btn-xs">
                                            <i class="fa fa-whatsapp"></i> {{$pendaftar->nomor_wa_wali}}
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="active">Alamat Lengkap</th>
                                    <td>{{$pendaftar->alamat_lengkap}}</td>
                                </tr>
                            </table>

                            <h4 style="margin-top: 25px; margin-bottom: 15px;">Dokumen Lampiran Berkas</h4>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="well text-center">
                                        <p><strong>Scan Ijazah / SKL</strong></p>
                                        @if($pendaftar->berkas_ijazah)
                                            <a href="{{asset('files/ppdb/' . $pendaftar->berkas_ijazah)}}" target="_blank" class="btn btn-info btn-sm btn-block"><i class="fa fa-download"></i> Unduh / Lihat</a>
                                        @else
                                            <span class="text-muted">Tidak ada berkas</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="well text-center">
                                        <p><strong>Scan Kartu Keluarga</strong></p>
                                        @if($pendaftar->berkas_kk)
                                            <a href="{{asset('files/ppdb/' . $pendaftar->berkas_kk)}}" target="_blank" class="btn btn-info btn-sm btn-block"><i class="fa fa-download"></i> Unduh / Lihat</a>
                                        @else
                                            <span class="text-muted">Tidak ada berkas</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="well text-center">
                                        <p><strong>Scan Akta Kelahiran</strong></p>
                                        @if($pendaftar->berkas_akta)
                                            <a href="{{asset('files/ppdb/' . $pendaftar->berkas_akta)}}" target="_blank" class="btn btn-info btn-sm btn-block"><i class="fa fa-download"></i> Unduh / Lihat</a>
                                        @else
                                            <span class="text-muted">Tidak ada berkas</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- FORM VERIFIKASI PANITIA -->
                <div class="col-md-4">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Tindakan Panitia PPDB</h3>
                        </div>
                        <div class="panel-body">
                            @if(session('sukses'))
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <i class="fa fa-check-circle"></i> {{session('sukses')}}
                            </div>
                            @endif

                            <form action="{{route('admin.ppdb.verifikasi', $pendaftar->id)}}" method="POST">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="status_pendaftaran">Keputusan Status Pendaftaran</label>
                                    <select name="status_pendaftaran" id="status_pendaftaran" class="form-control" required>
                                        <option value="Menunggu Verifikasi" {{$pendaftar->status_pendaftaran === 'Menunggu Verifikasi' ? 'selected' : ''}}>Menunggu Verifikasi</option>
                                        <option value="Diverifikasi" {{$pendaftar->status_pendaftaran === 'Diverifikasi' ? 'selected' : ''}}>Berkas Valid (Diverifikasi)</option>
                                        <option value="Diterima" {{$pendaftar->status_pendaftaran === 'Diterima' ? 'selected' : ''}}>DITERIMA / LOLOS SELEKSI</option>
                                        <option value="Ditolak" {{$pendaftar->status_pendaftaran === 'Ditolak' ? 'selected' : ''}}>DITOLAK / TIDAK LOLOS</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="catatan_verifikasi">Catatan Panitia untuk Calon Siswa</label>
                                    <textarea name="catatan_verifikasi" id="catatan_verifikasi" rows="5" class="form-control" placeholder="Contoh: Berkas telah lengkap. Silakan hadir tes fisik pada tanggal...">{{$pendaftar->catatan_verifikasi}}</textarea>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-save"></i> Perbarui Status</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
