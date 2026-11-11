@extends('layouts.master')
@section('title', 'Penilaian & Raport Siswa')
@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <!-- FORM INPUT NILAI -->
                <div class="col-md-4">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Input Nilai Siswa</h3>
                        </div>
                        <div class="panel-body">
                            @if(session('sukses'))
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <i class="fa fa-check-circle"></i> {{session('sukses')}}
                            </div>
                            @endif

                            @if($errors->any())
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <strong>Kesalahan:</strong>
                                <ul style="margin-top: 5px; margin-bottom: 0;">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                            <form action="{{route('nilais.store')}}" method="POST">
                                {{csrf_field()}}
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
                                    <label for="mapel_id">Mata Pelajaran</label>
                                    <select name="mapel_id" class="form-control" id="mapel_id" required>
                                        <option value="">Pilih Mata Pelajaran</option>
                                        @foreach($mapels as $m)
                                            <option value="{{$m->id}}">{{$m->kode_mapel}} - {{$m->nama_mapel}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="semester">Semester</label>
                                            <select name="semester" class="form-control" id="semester" required>
                                                <option value="Ganjil">Ganjil</option>
                                                <option value="Genap">Genap</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tahun_ajaran">Tahun Ajaran</label>
                                            <input type="text" name="tahun_ajaran" class="form-control" id="tahun_ajaran" value="2026/2027" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="nilai_tugas">Tugas (30%)</label>
                                            <input type="number" step="0.01" name="nilai_tugas" class="form-control" id="nilai_tugas" min="0" max="100" placeholder="0-100" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="nilai_uts">UTS (30%)</label>
                                            <input type="number" step="0.01" name="nilai_uts" class="form-control" id="nilai_uts" min="0" max="100" placeholder="0-100" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="nilai_uas">UAS (40%)</label>
                                            <input type="number" step="0.01" name="nilai_uas" class="form-control" id="nilai_uas" min="0" max="100" placeholder="0-100" required>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-calculator"></i> Simpan &amp; Kalkulasi</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- TABEL DATA NILAI -->
                <div class="col-md-8">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Daftar Nilai Akademik Siswa</h3>
                        </div>
                        <div class="panel-body">
                            <form action="{{route('nilais.index')}}" method="GET" class="form-inline" style="margin-bottom: 20px;">
                                <div class="form-group">
                                    <select name="siswa_id" class="form-control">
                                        <option value="">Semua Siswa</option>
                                        @foreach($siswas as $s)
                                            <option value="{{$s->id}}" {{request('siswa_id') == $s->id ? 'selected' : ''}}>{{$s->nama_siswa}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select name="semester" class="form-control">
                                        <option value="">Semua Semester</option>
                                        <option value="Ganjil" {{request('semester') == 'Ganjil' ? 'selected' : ''}}>Ganjil</option>
                                        <option value="Genap" {{request('semester') == 'Genap' ? 'selected' : ''}}>Genap</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-default"><i class="fa fa-filter"></i> Filter</button>
                            </form>

                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>SISWA</th>
                                            <th>MATA PELAJARAN</th>
                                            <th>TUGAS</th>
                                            <th>UTS</th>
                                            <th>UAS</th>
                                            <th>NILAI AKHIR</th>
                                            <th>PREDIKAT</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($nilais as $nl)
                                        <tr>
                                            <td>
                                                @if($nl->siswa)
                                                    <a href="{{route('nilais.transkrip', $nl->siswa->id)}}"><strong>{{$nl->siswa->nama_siswa}}</strong></a>
                                                    <br><small class="text-muted">{{$nl->siswa->nis}} ({{$nl->siswa->kelas}})</small>
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td>{{$nl->mapel ? $nl->mapel->nama_mapel : '-'}}</td>
                                            <td>{{$nl->nilai_tugas}}</td>
                                            <td>{{$nl->nilai_uts}}</td>
                                            <td>{{$nl->nilai_uas}}</td>
                                            <td><strong>{{$nl->nilai_akhir}}</strong></td>
                                            <td>
                                                @if($nl->predikat === 'A')
                                                    <span class="label label-success">A (Sangat Baik)</span>
                                                @elseif($nl->predikat === 'B')
                                                    <span class="label label-primary">B (Baik)</span>
                                                @elseif($nl->predikat === 'C')
                                                    <span class="label label-warning">C (Cukup)</span>
                                                @else
                                                    <span class="label label-danger">D (Kurang)</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($nl->siswa)
                                                    <a href="{{route('nilais.transkrip', $nl->siswa->id)}}" class="btn btn-info btn-xs" title="Lihat Raport"><i class="fa fa-file-text-o"></i></a>
                                                @endif
                                                <form action="{{route('nilais.destroy', $nl->id)}}" method="POST" style="display:inline-block;" onsubmit="return confirm('Hapus nilai ini?')">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="8" class="text-center text-muted">Belum ada data nilai akademik.</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="pull-right">
                                {{$nilais->appends(request()->input())->links()}}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
