@extends('layouts.master')
@section('title', 'Presensi Siswa Harian')
@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <!-- SUMMARY WIDGETS -->
            <div class="row">
                <div class="col-md-3">
                    <div class="metric">
                        <span class="icon"><i class="fa fa-check text-success"></i></span>
                        <p>
                            <span class="number">{{$countHadir}}</span>
                            <span class="title">Hadir</span>
                        </p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="metric">
                        <span class="icon"><i class="fa fa-medkit text-warning"></i></span>
                        <p>
                            <span class="number">{{$countSakit}}</span>
                            <span class="title">Sakit</span>
                        </p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="metric">
                        <span class="icon"><i class="fa fa-info-circle text-info"></i></span>
                        <p>
                            <span class="number">{{$countIzin}}</span>
                            <span class="title">Izin</span>
                        </p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="metric">
                        <span class="icon"><i class="fa fa-times text-danger"></i></span>
                        <p>
                            <span class="number">{{$countAlpa}}</span>
                            <span class="title">Alpa / Tanpa Keterangan</span>
                        </p>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- FORM INPUT PRESENSI -->
                <div class="col-md-4">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Catat Presensi Siswa</h3>
                        </div>
                        <div class="panel-body">
                            @if(session('sukses'))
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <i class="fa fa-check-circle"></i> {{session('sukses')}}
                            </div>
                            @endif

                            <form action="{{route('presensi.store')}}" method="POST">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="tanggal">Tanggal Presensi</label>
                                    <input type="date" name="tanggal" class="form-control" id="tanggal" value="{{$tanggal}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="siswa_id">Pilih Siswa</label>
                                    <select name="siswa_id" class="form-control" id="siswa_id" required>
                                        <option value="">Pilih Siswa</option>
                                        @foreach($siswas as $s)
                                            <option value="{{$s->id}}">{{$s->nis}} - {{$s->nama_siswa}} ({{$s->kelas}})</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="kelas_id">Rombel Kelas</label>
                                    <select name="kelas_id" class="form-control" id="kelas_id">
                                        <option value="">Pilih Kelas</option>
                                        @foreach($kelasList as $k)
                                            <option value="{{$k->id}}">{{$k->nama_kelas}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="status">Status Kehadiran</label>
                                    <select name="status" class="form-control" id="status" required>
                                        <option value="Hadir">Hadir</option>
                                        <option value="Sakit">Sakit</option>
                                        <option value="Izin">Izin</option>
                                        <option value="Alpa">Alpa</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan (Opsional)</label>
                                    <input type="text" name="keterangan" class="form-control" id="keterangan" placeholder="Contoh: Sakit demam...">
                                </div>
                                <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-check"></i> Simpan Presensi</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- TABEL LOG PRESENSI -->
                <div class="col-md-8">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Daftar Kehadiran Siswa</h3>
                        </div>
                        <div class="panel-body">
                            <form action="{{route('presensi.index')}}" method="GET" class="form-inline" style="margin-bottom: 20px;">
                                <div class="form-group">
                                    <label>Tanggal: &nbsp;</label>
                                    <input type="date" name="tanggal" class="form-control" value="{{$tanggal}}">
                                </div>
                                <div class="form-group">
                                    <select name="kelas_id" class="form-control">
                                        <option value="">Semua Kelas</option>
                                        @foreach($kelasList as $k)
                                            <option value="{{$k->id}}" {{request('kelas_id') == $k->id ? 'selected' : ''}}>{{$k->nama_kelas}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-default"><i class="fa fa-filter"></i> Filter</button>
                            </form>

                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>NIS</th>
                                            <th>NAMA SISWA</th>
                                            <th>KELAS</th>
                                            <th>STATUS</th>
                                            <th>KETERANGAN</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($presensis as $pr)
                                        <tr>
                                            <td>{{$pr->siswa ? $pr->siswa->nis : '-'}}</td>
                                            <td>
                                                @if($pr->siswa)
                                                    <a href="{{route('siswa.profile', $pr->siswa->id)}}"><strong>{{$pr->siswa->nama_siswa}}</strong></a>
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td>{{$pr->kelas ? $pr->kelas->nama_kelas : ($pr->siswa ? $pr->siswa->kelas : '-')}}</td>
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
                                            <td>
                                                <form action="{{route('presensi.destroy', $pr->id)}}" method="POST" style="display:inline-block;" onsubmit="return confirm('Hapus catatan presensi ini?')">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <button type="submit" class="btn btn-danger btn-xs">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="6" class="text-center text-muted">Belum ada data presensi pada tanggal ini.</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="pull-right">
                                {{$presensis->appends(request()->input())->links()}}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
