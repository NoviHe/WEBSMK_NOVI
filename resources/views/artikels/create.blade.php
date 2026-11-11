@extends('layouts.master')
@section('title', 'Tulis Berita / Artikel Baru')
@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Tulis Berita / Artikel Baru</h3>
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

                            <form action="{{route('artikels.store')}}" method="POST" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="judul">Judul Artikel</label>
                                    <input type="text" name="judul" class="form-control" id="judul" placeholder="Masukkan judul artikel..." value="{{old('judul')}}" required>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="kategori_id">Kategori</label>
                                            <select name="kategori_id" class="form-control" id="kategori_id">
                                                <option value="">Pilih Kategori</option>
                                                @foreach($kategoris as $kat)
                                                    <option value="{{$kat->id}}" {{old('kategori_id') == $kat->id ? 'selected' : ''}}>{{$kat->nama_kategori}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="status">Status Publikasi</label>
                                            <select name="status" class="form-control" id="status" required>
                                                <option value="published" {{old('status') == 'published' ? 'selected' : ''}}>Terbitkan Langsung (Published)</option>
                                                <option value="draft" {{old('status') == 'draft' ? 'selected' : ''}}>Simpan Draft</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="thumbnail">Gambar Sampul / Thumbnail</label>
                                    <input type="file" name="thumbnail" class="form-control-file" id="thumbnail" accept="image/*">
                                    <p class="help-block text-muted">Format: JPG, JPEG, PNG, WEBP. Maks 2MB.</p>
                                </div>
                                <div class="form-group">
                                    <label for="konten">Isi Konten Berita</label>
                                    <textarea name="konten" id="konten" rows="12" class="form-control" placeholder="Tuliskan isi artikel sekolah di sini..." required>{{old('konten')}}</textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Publikasikan</button>
                                    <a href="{{route('artikels.index')}}" class="btn btn-default">Kembali</a>
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
