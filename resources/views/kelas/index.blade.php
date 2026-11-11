@extends('layouts.master')
@section('title', 'Data Kelas')
@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <!-- FORM TAMBAH KELAS -->
                <div class="col-md-4">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Tambah Kelas Baru</h3>
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

                            <form action="{{route('kelas.store')}}" method="POST">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="nama_kelas">Nama Kelas</label>
                                    <input type="text" name="nama_kelas" class="form-control" id="nama_kelas" placeholder="Contoh: X RPL 1" value="{{old('nama_kelas')}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="tingkat">Tingkat / Tingkatan</label>
                                    <select name="tingkat" class="form-control" id="tingkat" required>
                                        <option value="10" {{old('tingkat') == '10' ? 'selected' : ''}}>Kelas 10 (Sepuluh)</option>
                                        <option value="11" {{old('tingkat') == '11' ? 'selected' : ''}}>Kelas 11 (Sebelas)</option>
                                        <option value="12" {{old('tingkat') == '12' ? 'selected' : ''}}>Kelas 12 (Dua Belas)</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="jurusan_id">Kompetensi Keahlian</label>
                                    <select name="jurusan_id" class="form-control" id="jurusan_id">
                                        <option value="">Pilih Jurusan</option>
                                        @foreach($jurusans as $j)
                                            <option value="{{$j->id}}" {{old('jurusan_id') == $j->id ? 'selected' : ''}}>{{$j->nama_jurusan}} ({{$j->kode_jurusan}})</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="guru_id">Wali Kelas</label>
                                    <select name="guru_id" class="form-control" id="guru_id">
                                        <option value="">Pilih Wali Kelas</option>
                                        @foreach($gurus as $g)
                                            <option value="{{$g->id}}" {{old('guru_id') == $g->id ? 'selected' : ''}}>{{$g->nama_guru}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tahun_ajaran">Tahun Ajaran</label>
                                    <input type="text" name="tahun_ajaran" class="form-control" id="tahun_ajaran" value="{{old('tahun_ajaran', '2026/2027')}}" required>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-save"></i> Tambah Kelas</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- TABEL DAFTAR KELAS -->
                <div class="col-md-8">
                    <div class="panel">
                        @if(session('sukses'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <i class="fa fa-check-circle"></i> {{session('sukses')}}
                        </div>
                        @endif

                        <div class="panel-heading">
                            <h3 class="panel-title">Daftar Rombongan Belajar (Kelas)</h3>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>NAMA KELAS</th>
                                            <th>TINGKAT</th>
                                            <th>JURUSAN</th>
                                            <th>WALI KELAS</th>
                                            <th>THN AJARAN</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($kelasList as $k)
                                        <tr>
                                            <td><strong>{{$k->nama_kelas}}</strong></td>
                                            <td><span class="label label-primary">Kelas {{$k->tingkat}}</span></td>
                                            <td>{{$k->jurusan ? $k->jurusan->nama_jurusan : '-'}}</td>
                                            <td>{{$k->waliKelas ? $k->waliKelas->nama_guru : '-'}}</td>
                                            <td>{{$k->tahun_ajaran}}</td>
                                            <td>
                                                <a href="{{route('kelas.edit', $k->id)}}" class="btn btn-warning btn-sm">Edit</a>
                                                <form action="{{route('kelas.destroy', $k->id)}}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus kelas ini?')">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="6" class="text-center text-muted">Belum ada rombel kelas yang terdaftar.</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="pull-right">
                                {{$kelasList->links()}}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
