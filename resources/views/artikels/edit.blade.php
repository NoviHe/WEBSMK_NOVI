@extends('layouts.master')
@section('title', 'Edit Berita / Artikel')
@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Edit Berita / Artikel: <strong>{{$artikel->judul}}</strong></h3>
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

                            <form action="{{route('artikels.update', $artikel->id)}}" method="POST" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="judul">Judul Artikel</label>
                                    <input type="text" name="judul" class="form-control" id="judul" value="{{old('judul', $artikel->judul)}}" required>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="kategori_id">Kategori</label>
                                            <select name="kategori_id" class="form-control" id="kategori_id">
                                                <option value="">Pilih Kategori</option>
                                                @foreach($kategoris as $kat)
                                                    <option value="{{$kat->id}}" {{old('kategori_id', $artikel->kategori_id) == $kat->id ? 'selected' : ''}}>{{$kat->nama_kategori}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="status">Status Publikasi</label>
                                            <select name="status" class="form-control" id="status" required>
                                                <option value="published" {{old('status', $artikel->status) == 'published' ? 'selected' : ''}}>Terbitkan Langsung (Published)</option>
                                                <option value="draft" {{old('status', $artikel->status) == 'draft' ? 'selected' : ''}}>Simpan Draft</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="thumbnail">Gambar Sampul / Thumbnail</label>
                                    <div style="margin-bottom: 10px;">
                                        <img src="{{$artikel->getThumbnail()}}" width="120" class="img-thumbnail">
                                    </div>
                                    <input type="file" name="thumbnail" class="form-control-file" id="thumbnail" accept="image/*">
                                    <p class="help-block text-muted">Kosongkan jika tidak ingin mengubah thumbnail.</p>
                                </div>
                                <div class="form-group">
                                    <label for="konten">Isi Konten Berita</label>
                                    <textarea name="konten" id="konten" rows="12" class="form-control" required>{{old('konten', $artikel->konten)}}</textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-warning"><i class="fa fa-save"></i> Perbarui Artikel</button>
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
