@extends('layouts.master')
@section('title', 'Profile Siswa - ' . $siswa->nama_siswa)
@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="panel panel-profile">
                <div class="clearfix">
                    <!-- LEFT COLUMN -->
                    <div class="profile-left">
                        <!-- PROFILE HEADER -->
                        <div class="profile-header">
                            <div class="overlay"></div>
                            <div class="profile-main">
                                <img src="{{$siswa->getAvatar()}}" class="img-circle" alt="Avatar" width="90" height="90" style="object-fit: cover;">
                                <h3 class="name">{{$siswa->nama_siswa}}</h3>
                                <span class="online-status status-available">Siswa Aktif</span>
                            </div>
                            <div class="profile-stat">
                                <div class="row">
                                    <div class="col-md-4 stat-item">
                                        {{$siswa->nilais->count()}} <span>Mapel Ternilai</span>
                                    </div>
                                    <div class="col-md-4 stat-item">
                                        {{number_format($siswa->nilais->avg('nilai_akhir') ?? 0, 1)}} <span>Rata-Rata</span>
                                    </div>
                                    <div class="col-md-4 stat-item">
                                        {{$siswa->presensis->where('status', 'Hadir')->count()}} <span>Hari Hadir</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END PROFILE HEADER -->
                        <!-- PROFILE DETAIL -->
                        <div class="profile-detail">
                            <div class="profile-info">
                                <h4 class="heading">Biodata Siswa</h4>
                                <ul class="list-unstyled list-justify">
                                    <li>NIS <span>{{$siswa->nis}}</span></li>
                                    <li>Jenis Kelamin <span>{{$siswa->jenis_kelamin == 'L' ? 'Laki-Laki' : 'Perempuan'}}</span></li>
                                    <li>Kelas <span>{{$siswa->kelas}}</span></li>
                                    <li>Kompetensi Keahlian <span>{{$siswa->komp_keahlian}}</span></li>
                                </ul>
                            </div>
                            <div class="text-center" style="margin-top: 15px;">
                                <a href="/siswa/{{$siswa->id}}/edit" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit Profil</a>
                                <a href="{{route('nilais.transkrip', $siswa->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-print"></i> Lihat Raport</a>
                            </div>
                        </div>
                        <!-- END PROFILE DETAIL -->
                    </div>
                    <!-- END LEFT COLUMN -->

                    <!-- RIGHT COLUMN -->
                    <div class="profile-right">
                        <div class="custom-tabs-line tabs-line-bottom left-aligned">
                            <ul class="nav" role="tablist">
                                <li class="active"><a href="#tab-nilai" role="tab" data-toggle="tab">Capaian Nilai Akademik</a></li>
                                <li><a href="#tab-presensi" role="tab" data-toggle="tab">Catatan Presensi Terakhir</a></li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <!-- TAB NILAI -->
                            <div class="tab-pane fade in active" id="tab-nilai">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>MATA PELAJARAN</th>
                                                <th>KKM</th>
                                                <th>TUGAS</th>
                                                <th>UTS</th>
                                                <th>UAS</th>
                                                <th>NILAI AKHIR</th>
                                                <th>PREDIKAT</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($siswa->nilais as $nl)
                                            <tr>
                                                <td><strong>{{$nl->mapel ? $nl->mapel->nama_mapel : '-'}}</strong></td>
                                                <td>{{$nl->mapel ? $nl->mapel->kkm : 75}}</td>
                                                <td>{{$nl->nilai_tugas}}</td>
                                                <td>{{$nl->nilai_uts}}</td>
                                                <td>{{$nl->nilai_uas}}</td>
                                                <td><strong>{{$nl->nilai_akhir}}</strong></td>
                                                <td><span class="badge">{{$nl->predikat}}</span></td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="7" class="text-center text-muted">Belum ada input nilai untuk siswa ini.</td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                <div class="margin-top-15 text-right">
                                    <a href="{{route('nilais.transkrip', $siswa->id)}}" class="btn btn-info btn-sm"><i class="fa fa-file-text-o"></i> Cetak Raport Lengkap</a>
                                </div>
                            </div>

                            <!-- TAB PRESENSI -->
                            <div class="tab-pane fade" id="tab-presensi">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>TANGGAL</th>
                                                <th>STATUS KEHADIRAN</th>
                                                <th>KETERANGAN</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($siswa->presensis()->latest('tanggal')->take(10)->get() as $pr)
                                            <tr>
                                                <td>{{$pr->tanggal->format('d M Y')}}</td>
                                                <td>
                                                    @if($pr->status === 'Hadir')
                                                        <span class="label label-success">Hadir</span>
                                                    @elseif($pr->status === 'Sakit')
                                                        <span class="label label-warning">Sakit</span>
                                                    @elseif($pr->status === 'Izin')
                                                        <span class="label label-info">Izin</span>
                                                    @else
                                                        <span class="label label-danger">Alpa</span>
                                                    @endif
                                                </td>
                                                <td>{{$pr->keterangan ?? '-'}}</td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="3" class="text-center text-muted">Belum ada catatan presensi.</td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END RIGHT COLUMN -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
