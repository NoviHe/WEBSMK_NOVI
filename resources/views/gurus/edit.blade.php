@extends('layouts.master')
@section('title', 'Edit Data Guru')
@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Edit Guru: <strong>{{$guru->nama_guru}}</strong></h3>
                        </div>
                        <div class="panel-body">
                            @if($errors->any())
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <strong>Terjadi kesalahan input:</strong>
                                <ul style="margin-top: 5px; margin-bottom: 0;">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                            <form action="{{route('gurus.update', $guru->id)}}" method="POST" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nip">NIP</label>
                                            <input type="text" name="nip" class="form-control" id="nip" value="{{old('nip', $guru->nip)}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="status_kepegawaian">Status Kepegawaian</label>
                                            <select name="status_kepegawaian" class="form-control" id="status_kepegawaian" required>
                                                <option value="PNS" {{old('status_kepegawaian', $guru->status_kepegawaian) == 'PNS' ? 'selected' : ''}}>PNS</option>
                                                <option value="PPPK" {{old('status_kepegawaian', $guru->status_kepegawaian) == 'PPPK' ? 'selected' : ''}}>PPPK</option>
                                                <option value="Honorer" {{old('status_kepegawaian', $guru->status_kepegawaian) == 'Honorer' ? 'selected' : ''}}>Honorer / GTT</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="nama_guru">Nama Lengkap</label>
                                            <input type="text" name="nama_guru" class="form-control" id="nama_guru" value="{{old('nama_guru', $guru->nama_guru)}}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="gelar">Gelar Akademik</label>
                                            <input type="text" name="gelar" class="form-control" id="gelar" value="{{old('gelar', $guru->gelar)}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="jenis_kelamin">Jenis Kelamin</label>
                                            <select name="jenis_kelamin" class="form-control" id="jenis_kelamin" required>
                                                <option value="L" {{old('jenis_kelamin', $guru->jenis_kelamin) == 'L' ? 'selected' : ''}}>Laki Laki</option>
                                                <option value="P" {{old('jenis_kelamin', $guru->jenis_kelamin) == 'P' ? 'selected' : ''}}>Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="bidang_studi">Mata Pelajaran / Bidang</label>
                                            <input type="text" name="bidang_studi" class="form-control" id="bidang_studi" value="{{old('bidang_studi', $guru->bidang_studi)}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="telepon">Nomor Telepon / WA</label>
                                            <input type="text" name="telepon" class="form-control" id="telepon" value="{{old('telepon', $guru->telepon)}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="foto">Foto Profil</label>
                                    <div style="margin-bottom: 10px;">
                                        <img src="{{$guru->getFoto()}}" width="80" height="80" class="img-thumbnail" style="object-fit: cover;">
                                    </div>
                                    <input type="file" name="foto" class="form-control-file" id="foto" accept="image/*">
                                    <p class="help-block text-muted">Kosongkan jika tidak ingin mengubah foto.</p>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-warning"><i class="fa fa-save"></i> Perbarui Data Guru</button>
                                    <a href="{{route('gurus.index')}}" class="btn btn-default">Kembali</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
