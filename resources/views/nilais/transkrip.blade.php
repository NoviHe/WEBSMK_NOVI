@extends('layouts.master')
@section('title', 'Transkrip Nilai - ' . $siswa->nama_siswa)
@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel">
                        <div class="panel-heading" style="border-bottom: 2px solid #eee; padding-bottom: 20px;">
                            <div class="row">
                                <div class="col-xs-8">
                                    <h3 class="panel-title" style="font-size: 20px; font-weight: bold;">Laporan Capaian Hasil Belajar Siswa (Raport)</h3>
                                    <p class="text-muted" style="margin: 0;">SMK Negeri 1 Padaherang &bull; Kabupaten Pangandaran</p>
                                </div>
                                <div class="col-xs-4 text-right">
                                    <button onclick="window.print()" class="btn btn-default btn-sm"><i class="fa fa-print"></i> Cetak Dokumen</button>
                                    <a href="{{route('nilais.index')}}" class="btn btn-primary btn-sm">Kembali</a>
                                </div>
                            </div>
                        </div>

                        <div class="panel-body">
                            <!-- BIODATA SISWA -->
                            <div class="row" style="margin-bottom: 20px;">
                                <div class="col-xs-6">
                                    <table class="table table-condensed table-borderless">
                                        <tr>
                                            <th style="width: 140px;">Nama Siswa</th>
                                            <td>: <strong>{{$siswa->nama_siswa}}</strong></td>
                                        </tr>
                                        <tr>
                                            <th>Nomor Induk (NIS)</th>
                                            <td>: {{$siswa->nis}}</td>
                                        </tr>
                                        <tr>
                                            <th>Jenis Kelamin</th>
                                            <td>: {{$siswa->jenis_kelamin == 'L' ? 'Laki-Laki' : 'Perempuan'}}</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-xs-6">
                                    <table class="table table-condensed table-borderless">
                                        <tr>
                                            <th style="width: 140px;">Kelas</th>
                                            <td>: {{$siswa->kelas}}</td>
                                        </tr>
                                        <tr>
                                            <th>Program Keahlian</th>
                                            <td>: {{$siswa->komp_keahlian}}</td>
                                        </tr>
                                        <tr>
                                            <th>Tahun Pelajaran</th>
                                            <td>: 2026/2027</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                            <!-- DAFTAR NILAI -->
                            <h4>A. Capaian Nilai Akademik</h4>
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="active">
                                        <th style="width: 40px;" class="text-center">No</th>
                                        <th>Mata Pelajaran</th>
                                        <th class="text-center">KKM</th>
                                        <th class="text-center">Tugas</th>
                                        <th class="text-center">UTS</th>
                                        <th class="text-center">UAS</th>
                                        <th class="text-center">Nilai Akhir</th>
                                        <th class="text-center">Predikat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($nilais as $index => $nl)
                                    <tr>
                                        <td class="text-center">{{$index + 1}}</td>
                                        <td>
                                            <strong>{{$nl->mapel ? $nl->mapel->nama_mapel : '-'}}</strong>
                                            <br><small class="text-muted">{{$nl->mapel ? $nl->mapel->kelompok : ''}}</small>
                                        </td>
                                        <td class="text-center">{{$nl->mapel ? $nl->mapel->kkm : 75}}</td>
                                        <td class="text-center">{{$nl->nilai_tugas}}</td>
                                        <td class="text-center">{{$nl->nilai_uts}}</td>
                                        <td class="text-center">{{$nl->nilai_uas}}</td>
                                        <td class="text-center"><strong>{{$nl->nilai_akhir}}</strong></td>
                                        <td class="text-center">
                                            <span class="badge">{{$nl->predikat}}</span>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="8" class="text-center text-muted">Belum ada catatan nilai akademik.</td>
                                    </tr>
                                    @endforelse
                                    @if($nilais->count() > 0)
                                    <tr class="info">
                                        <th colspan="6" class="text-right">Rata-Rata Nilai Keseluruhan:</th>
                                        <th colspan="2" class="text-center" style="font-size: 16px;">{{number_format($rata_rata, 2)}}</th>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>

                            <!-- KEHADIRAN / PRESENSI -->
                            <h4 style="margin-top: 25px;">B. Rekapitulasi Ketidakhadiran</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>Hadir</th>
                                            <td style="width: 100px;" class="text-center"><strong>{{$total_hadir}} hari</strong></td>
                                        </tr>
                                        <tr>
                                            <th>Sakit</th>
                                            <td class="text-center">{{$total_sakit}} hari</td>
                                        </tr>
                                        <tr>
                                            <th>Izin</th>
                                            <td class="text-center">{{$total_izin}} hari</td>
                                        </tr>
                                        <tr>
                                            <th>Tanpa Keterangan (Alpa)</th>
                                            <td class="text-center">{{$total_alpa}} hari</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
