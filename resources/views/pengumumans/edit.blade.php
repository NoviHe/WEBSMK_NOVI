@extends('layouts.master')
@section('title', 'Edit Pengumuman')
@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Edit Pengumuman: <strong>{{$pengumuman->judul}}</strong></h3>
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

                            <form action="{{route('pengumumans.update', $pengumuman->id)}}" method="POST" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="judul">Judul Pengumuman</label>
                                    <input type="text" name="judul" class="form-control" id="judul" value="{{old('judul', $pengumuman->judul)}}" required>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="target_audiens">Target Audiens</label>
                                            <select name="target_audiens" class="form-control" id="target_audiens" required>
                                                <option value="semua" {{old('target_audiens', $pengumuman->target_audiens) == 'semua' ? 'selected' : ''}}>Semua Civitas Sekolah</option>
                                                <option value="siswa" {{old('target_audiens', $pengumuman->target_audiens) == 'siswa' ? 'selected' : ''}}>Khusus Siswa</option>
                                                <option value="guru" {{old('target_audiens', $pengumuman->target_audiens) == 'guru' ? 'selected' : ''}}>Khusus Guru / Staf</option>
                                                <option value="wali" {{old('target_audiens', $pengumuman->target_audiens) == 'wali' ? 'selected' : ''}}>Khusus Orang Tua / Wali</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tanggal_berakhir">Batas Waktu Berlaku (Opsional)</label>
                                            <input type="date" name="tanggal_berakhir" class="form-control" id="tanggal_berakhir" value="{{old('tanggal_berakhir', $pengumuman->tanggal_berakhir ? $pengumuman->tanggal_berakhir->format('Y-m-d') : '')}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="fancy-checkbox">
                                        <input type="checkbox" name="is_urgent" value="1" {{old('is_urgent', $pengumuman->is_urgent) ? 'checked' : ''}}>
                                        <span>Tandai sebagai pengumuman mendesak / penting (Urgent Notice)</span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label for="berkas_lampiran">Berkas Lampiran Dokumen</label>
                                    @if($pengumuman->berkas_lampiran)
                                        <div style="margin-bottom: 5px;">
                                            <a href="{{asset('files/pengumuman/' . $pengumuman->berkas_lampiran)}}" target="_blank" class="text-primary"><i class="fa fa-file"></i> Lampiran saat ini: {{$pengumuman->berkas_lampiran}}</a>
                                        </div>
                                    @endif
                                    <input type="file" name="berkas_lampiran" class="form-control-file" id="berkas_lampiran" accept=".pdf,.doc,.docx,.zip">
                                    <p class="help-block text-muted">Kosongkan jika tidak ingin mengganti berkas.</p>
                                </div>
                                <div class="form-group">
                                    <label for="isi_pengumuman">Isi Detail Pengumuman</label>
                                    <textarea name="isi_pengumuman" id="isi_pengumuman" rows="8" class="form-control" required>{{old('isi_pengumuman', $pengumuman->isi_pengumuman)}}</textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-warning"><i class="fa fa-save"></i> Perbarui Pengumuman</button>
                                    <a href="{{route('pengumumans.index')}}" class="btn btn-default">Kembali</a>
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
