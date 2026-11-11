@extends('layouts.master')
@section('title', 'Mata Pelajaran')
@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <!-- FORM TAMBAH MAPEL -->
                <div class="col-md-4">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Tambah Mata Pelajaran</h3>
                        </div>
                        <div class="panel-body">
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

                            <form action="{{route('mapels.store')}}" method="POST">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="kode_mapel">Kode Mapel</label>
                                    <input type="text" name="kode_mapel" class="form-control" id="kode_mapel" placeholder="Contoh: MP-MAT, RPL-WEB" value="{{old('kode_mapel')}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="nama_mapel">Nama Mata Pelajaran</label>
                                    <input type="text" name="nama_mapel" class="form-control" id="nama_mapel" placeholder="Contoh: Pemrograman Web" value="{{old('nama_mapel')}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="kelompok">Kelompok Mapel</label>
                                    <select name="kelompok" class="form-control" id="kelompok" required>
                                        <option value="Normatif" {{old('kelompok') == 'Normatif' ? 'selected' : ''}}>Muatan Nasional (Normatif)</option>
                                        <option value="Adaptif" {{old('kelompok') == 'Adaptif' ? 'selected' : ''}}>Muatan Kewilayahan (Adaptif)</option>
                                        <option value="Produktif" {{old('kelompok') == 'Produktif' ? 'selected' : ''}}>Peminatan Kejuruan (Produktif)</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="jurusan_id">Khusus Jurusan (Opsional)</label>
                                    <select name="jurusan_id" class="form-control" id="jurusan_id">
                                        <option value="">Semua Jurusan (Umum)</option>
                                        @foreach($jurusans as $j)
                                            <option value="{{$j->id}}" {{old('jurusan_id') == $j->id ? 'selected' : ''}}>{{$j->nama_jurusan}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="kkm">Kriteria Ketuntasan Minimal (KKM)</label>
                                    <input type="number" name="kkm" class="form-control" id="kkm" min="0" max="100" value="{{old('kkm', 75)}}" required>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-save"></i> Tambah Mapel</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- TABEL MAPEL -->
                <div class="col-md-8">
                    <div class="panel">
                        @if(session('sukses'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <i class="fa fa-check-circle"></i> {{session('sukses')}}
                        </div>
                        @endif

                        <div class="panel-heading">
                            <h3 class="panel-title">Daftar Kurikulum &amp; Mata Pelajaran</h3>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>KODE</th>
                                            <th>MATA PELAJARAN</th>
                                            <th>KELOMPOK</th>
                                            <th>PERUNTUKAN JURUSAN</th>
                                            <th>KKM</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($mapels as $m)
                                        <tr>
                                            <td><span class="label label-default">{{$m->kode_mapel}}</span></td>
                                            <td><strong>{{$m->nama_mapel}}</strong></td>
                                            <td><span class="label label-info">{{$m->kelompok}}</span></td>
                                            <td>{{$m->jurusan ? $m->jurusan->kode_jurusan : 'Semua Jurusan'}}</td>
                                            <td><span class="badge">{{$m->kkm}}</span></td>
                                            <td>
                                                <a href="{{route('mapels.edit', $m->id)}}" class="btn btn-warning btn-sm">Edit</a>
                                                <form action="{{route('mapels.destroy', $m->id)}}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus mata pelajaran ini?')">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="6" class="text-center text-muted">Belum ada mata pelajaran.</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="pull-right">
                                {{$mapels->links()}}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
