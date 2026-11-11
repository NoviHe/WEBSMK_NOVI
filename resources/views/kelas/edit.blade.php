@extends('layouts.master')
@section('title', 'Edit Data Kelas')
@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Edit Kelas: <strong>{{$kelas->nama_kelas}}</strong></h3>
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

                            <form action="{{route('kelas.update', $kelas->id)}}" method="POST">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="nama_kelas">Nama Kelas</label>
                                    <input type="text" name="nama_kelas" class="form-control" id="nama_kelas" value="{{old('nama_kelas', $kelas->nama_kelas)}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="tingkat">Tingkat / Tingkatan</label>
                                    <select name="tingkat" class="form-control" id="tingkat" required>
                                        <option value="10" {{old('tingkat', $kelas->tingkat) == '10' ? 'selected' : ''}}>Kelas 10 (Sepuluh)</option>
                                        <option value="11" {{old('tingkat', $kelas->tingkat) == '11' ? 'selected' : ''}}>Kelas 11 (Sebelas)</option>
                                        <option value="12" {{old('tingkat', $kelas->tingkat) == '12' ? 'selected' : ''}}>Kelas 12 (Dua Belas)</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="jurusan_id">Kompetensi Keahlian</label>
                                    <select name="jurusan_id" class="form-control" id="jurusan_id">
                                        <option value="">Pilih Jurusan</option>
                                        @foreach($jurusans as $j)
                                            <option value="{{$j->id}}" {{old('jurusan_id', $kelas->jurusan_id) == $j->id ? 'selected' : ''}}>{{$j->nama_jurusan}} ({{$j->kode_jurusan}})</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="guru_id">Wali Kelas</label>
                                    <select name="guru_id" class="form-control" id="guru_id">
                                        <option value="">Pilih Wali Kelas</option>
                                        @foreach($gurus as $g)
                                            <option value="{{$g->id}}" {{old('guru_id', $kelas->guru_id) == $g->id ? 'selected' : ''}}>{{$g->nama_guru}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tahun_ajaran">Tahun Ajaran</label>
                                    <input type="text" name="tahun_ajaran" class="form-control" id="tahun_ajaran" value="{{old('tahun_ajaran', $kelas->tahun_ajaran)}}" required>
                                </div>
                                <button type="submit" class="btn btn-warning"><i class="fa fa-save"></i> Perbarui Kelas</button>
                                <a href="{{route('kelas.index')}}" class="btn btn-default">Kembali</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
