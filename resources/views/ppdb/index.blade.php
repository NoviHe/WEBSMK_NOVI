@extends('layouts.master')
@section('title', 'Manajemen PPDB Online')
@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <!-- WIDGET METRIK PPDB -->
            <div class="row">
                <div class="col-md-3">
                    <div class="metric">
                        <span class="icon"><i class="fa fa-users text-primary"></i></span>
                        <p>
                            <span class="number">{{$pendaftars->total()}}</span>
                            <span class="title">Total Pendaftar</span>
                        </p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="metric">
                        <span class="icon"><i class="fa fa-clock-o text-warning"></i></span>
                        <p>
                            <span class="number">{{$countMenunggu}}</span>
                            <span class="title">Menunggu Verifikasi</span>
                        </p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="metric">
                        <span class="icon"><i class="fa fa-check-circle text-success"></i></span>
                        <p>
                            <span class="number">{{$countDiterima}}</span>
                            <span class="title">Diterima</span>
                        </p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="metric">
                        <span class="icon"><i class="fa fa-times-circle text-danger"></i></span>
                        <p>
                            <span class="number">{{$countDitolak}}</span>
                            <span class="title">Ditolak</span>
                        </p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        @if(session('sukses'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <i class="fa fa-check-circle"></i> {{session('sukses')}}
                        </div>
                        @endif

                        <div class="panel-heading">
                            <h3 class="panel-title">Daftar Calon Peserta Didik Baru (PPDB 2026/2027)</h3>
                        </div>

                        <div class="panel-body">
                            <!-- Filter Bar -->
                            <form action="{{route('admin.ppdb.index')}}" method="GET" class="form-inline" style="margin-bottom: 20px;">
                                <div class="form-group">
                                    <input type="text" name="cari" class="form-control" placeholder="Cari nama, NISN, atau no reg..." value="{{request('cari')}}">
                                </div>
                                <div class="form-group">
                                    <select name="status" class="form-control">
                                        <option value="">Semua Status</option>
                                        <option value="Menunggu Verifikasi" {{request('status') == 'Menunggu Verifikasi' ? 'selected' : ''}}>Menunggu Verifikasi</option>
                                        <option value="Diverifikasi" {{request('status') == 'Diverifikasi' ? 'selected' : ''}}>Diverifikasi</option>
                                        <option value="Diterima" {{request('status') == 'Diterima' ? 'selected' : ''}}>Diterima</option>
                                        <option value="Ditolak" {{request('status') == 'Ditolak' ? 'selected' : ''}}>Ditolak</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select name="jurusan_id" class="form-control">
                                        <option value="">Semua Pilihan Jurusan</option>
                                        @foreach($jurusans as $j)
                                            <option value="{{$j->id}}" {{request('jurusan_id') == $j->id ? 'selected' : ''}}>{{$j->kode_jurusan}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i> Filter</button>
                            </form>

                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>NO. REG</th>
                                            <th>NISN</th>
                                            <th>NAMA LENGKAP</th>
                                            <th>ASAL SEKOLAH</th>
                                            <th>PILIHAN JURUSAN</th>
                                            <th>STATUS</th>
                                            <th>TGL DAFTAR</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($pendaftars as $p)
                                        <tr>
                                            <td><strong>{{$p->nomor_pendaftaran}}</strong></td>
                                            <td>{{$p->nisn}}</td>
                                            <td><a href="{{route('admin.ppdb.show', $p->id)}}"><strong>{{$p->nama_lengkap}}</strong></a></td>
                                            <td>{{$p->asal_sekolah}}</td>
                                            <td>
                                                <span class="label label-primary">{{$p->pilihan1 ? $p->pilihan1->kode_jurusan : '-'}}</span>
                                                @if($p->pilihan2)
                                                    <span class="label label-default">{{$p->pilihan2->kode_jurusan}}</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($p->status_pendaftaran === 'Diterima')
                                                    <span class="label label-success">Diterima</span>
                                                @elseif($p->status_pendaftaran === 'Diverifikasi')
                                                    <span class="label label-info">Diverifikasi</span>
                                                @elseif($p->status_pendaftaran === 'Ditolak')
                                                    <span class="label label-danger">Ditolak</span>
                                                @else
                                                    <span class="label label-warning">Menunggu</span>
                                                @endif
                                            </td>
                                            <td>{{$p->created_at->format('d M Y')}}</td>
                                            <td>
                                                <a href="{{route('admin.ppdb.show', $p->id)}}" class="btn btn-info btn-xs" title="Review Berkas"><i class="fa fa-eye"></i> Periksa</a>
                                                <a href="{{route('ppdb.bukti', $p->nomor_pendaftaran)}}" target="_blank" class="btn btn-default btn-xs" title="Cetak Bukti"><i class="fa fa-print"></i></a>
                                                <form action="{{route('admin.ppdb.destroy', $p->id)}}" method="POST" style="display:inline-block;" onsubmit="return confirm('Hapus data pendaftar ini?')">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="8" class="text-center text-muted">Belum ada calon siswa yang mendaftar.</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="pull-right">
                                {{$pendaftars->appends(request()->input())->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
