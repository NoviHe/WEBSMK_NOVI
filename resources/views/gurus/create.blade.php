@extends('layouts.master')
@section('title', 'Tambah Data Guru')
@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Tambah Guru / Tenaga Pendidik Baru</h3>
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

                            <form action="{{route('gurus.store')}}" method="POST" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nip">NIP (Opsional)</label>
                                            <input type="text" name="nip" class="form-control" id="nip" value="{{old('nip')}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="status_kepegawaian">Status Kepegawaian</label>
                                            <select name="status_kepegawaian" class="form-control" id="status_kepegawaian" required>
                                                <option value="PNS" {{old('status_kepegawaian') == 'PNS' ? 'selected' : ''}}>PNS</option>
                                                <option value="PPPK" {{old('status_kepegawaian') == 'PPPK' ? 'selected' : ''}}>PPPK</option>
                                                <option value="Honorer" {{old('status_kepegawaian') == 'Honorer' ? 'selected' : ''}}>Honorer / GTT</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="nama_guru">Nama Lengkap</label>
                                            <input type="text" name="nama_guru" class="form-control" id="nama_guru" placeholder="Contoh: Budi Santoso" value="{{old('nama_guru')}}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="gelar">Gelar Akademik</label>
                                            <input type="text" name="gelar" class="form-control" id="gelar" placeholder="Contoh: S.Pd, M.Kom" value="{{old('gelar')}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="jenis_kelamin">Jenis Kelamin</label>
                                            <select name="jenis_kelamin" class="form-control" id="jenis_kelamin" required>
                                                <option value="L" {{old('jenis_kelamin') == 'L' ? 'selected' : ''}}>Laki Laki</option>
                                                <option value="P" {{old('jenis_kelamin') == 'P' ? 'selected' : ''}}>Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="bidang_studi">Mata Pelajaran / Bidang</label>
                                            <input type="text" name="bidang_studi" class="form-control" id="bidang_studi" placeholder="Contoh: Matematika" value="{{old('bidang_studi')}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="telepon">Nomor Telepon / WA</label>
                                            <input type="text" name="telepon" class="form-control" id="telepon" value="{{old('telepon')}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="foto">Foto Profil</label>
                                    <input type="file" name="foto" class="form-control-file" id="foto" accept="image/*">
                                    <p class="help-block text-muted">Format: JPG, JPEG, PNG. Maks 2MB.</p>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Data Guru</button>
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
