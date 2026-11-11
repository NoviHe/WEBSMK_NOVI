@extends('layouts.master')
@section('title', 'Edit Mata Pelajaran')
@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Edit Mapel: <strong>{{$mapel->nama_mapel}}</strong></h3>
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

                            <form action="{{route('mapels.update', $mapel->id)}}" method="POST">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="kode_mapel">Kode Mapel</label>
                                    <input type="text" name="kode_mapel" class="form-control" id="kode_mapel" value="{{old('kode_mapel', $mapel->kode_mapel)}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="nama_mapel">Nama Mata Pelajaran</label>
                                    <input type="text" name="nama_mapel" class="form-control" id="nama_mapel" value="{{old('nama_mapel', $mapel->nama_mapel)}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="kelompok">Kelompok Mapel</label>
                                    <select name="kelompok" class="form-control" id="kelompok" required>
                                        <option value="Normatif" {{old('kelompok', $mapel->kelompok) == 'Normatif' ? 'selected' : ''}}>Muatan Nasional (Normatif)</option>
                                        <option value="Adaptif" {{old('kelompok', $mapel->kelompok) == 'Adaptif' ? 'selected' : ''}}>Muatan Kewilayahan (Adaptif)</option>
                                        <option value="Produktif" {{old('kelompok', $mapel->kelompok) == 'Produktif' ? 'selected' : ''}}>Peminatan Kejuruan (Produktif)</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="jurusan_id">Khusus Jurusan (Opsional)</label>
                                    <select name="jurusan_id" class="form-control" id="jurusan_id">
                                        <option value="">Semua Jurusan (Umum)</option>
                                        @foreach($jurusans as $j)
                                            <option value="{{$j->id}}" {{old('jurusan_id', $mapel->jurusan_id) == $j->id ? 'selected' : ''}}>{{$j->nama_jurusan}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="kkm">Kriteria Ketuntasan Minimal (KKM)</label>
                                    <input type="number" name="kkm" class="form-control" id="kkm" min="0" max="100" value="{{old('kkm', $mapel->kkm)}}" required>
                                </div>
                                <button type="submit" class="btn btn-warning"><i class="fa fa-save"></i> Perbarui Mapel</button>
                                <a href="{{route('mapels.index')}}" class="btn btn-default">Kembali</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
