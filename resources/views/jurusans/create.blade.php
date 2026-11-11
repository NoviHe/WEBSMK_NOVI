@extends('layouts.master')
@section('title', 'Tambah Jurusan Baru')
@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Tambah Kompetensi Keahlian Baru</h3>
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

                            <form action="{{route('jurusans.store')}}" method="POST" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="kode_jurusan">Kode Jurusan</label>
                                            <input type="text" name="kode_jurusan" class="form-control" id="kode_jurusan" placeholder="Contoh: RPL, TKJ" value="{{old('kode_jurusan')}}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="nama_jurusan">Nama Jurusan</label>
                                            <input type="text" name="nama_jurusan" class="form-control" id="nama_jurusan" placeholder="Contoh: Rekayasa Perangkat Lunak" value="{{old('nama_jurusan')}}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="icon">Icon Class (Canvas Icon / FontAwesome)</label>
                                    <input type="text" name="icon" class="form-control" id="icon" placeholder="Contoh: icon-code, icon-laptop, icon-truck" value="{{old('icon', 'icon-line-check')}}">
                                </div>
                                <div class="form-group">
                                    <label for="gambar">Foto / Gambar Sampul Jurusan</label>
                                    <input type="file" name="gambar" class="form-control-file" id="gambar" accept="image/*">
                                    <p class="help-block text-muted">Format: JPG, JPEG, PNG, WEBP. Maks 2MB.</p>
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi Singkat</label>
                                    <textarea name="deskripsi" id="deskripsi" rows="4" class="form-control" placeholder="Penjelasan umum kompetensi keahlian...">{{old('deskripsi')}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="visi_misi">Visi & Misi Jurusan</label>
                                    <textarea name="visi_misi" id="visi_misi" rows="3" class="form-control">{{old('visi_misi')}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="prospek_kerja">Prospek Karir & Lulusan</label>
                                    <textarea name="prospek_kerja" id="prospek_kerja" rows="3" class="form-control" placeholder="Profesi / bidang industri yang relevan...">{{old('prospek_kerja')}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label class="fancy-checkbox">
                                        <input type="checkbox" name="is_active" value="1" {{old('is_active', true) ? 'checked' : ''}}>
                                        <span>Aktifkan status jurusan pada portal publik</span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Jurusan</button>
                                    <a href="{{route('jurusans.index')}}" class="btn btn-default">Kembali</a>
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
