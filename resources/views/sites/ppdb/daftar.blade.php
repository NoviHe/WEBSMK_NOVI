@extends('layouts.frontend')
@section('title', 'Formulir Pendaftaran Siswa Baru (PPDB Online)')
@section('content')

<!-- Page Title -->
<section id="page-title" class="page-title-mini">
    <div class="container clearfix">
        <h1>Formulir Pendaftaran Siswa Baru</h1>
        <span>Isi data diri dengan teliti dan benar sesuai dokumen kependudukan resmi</span>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/ppdb">PPDB</a></li>
            <li class="breadcrumb-item active" aria-current="page">Daftar</li>
        </ol>
    </div>
</section>

<!-- Content -->
<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">

                    @if($errors->any())
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <strong>Perhatian: Mohon perbaiki data input berikut:</strong>
                        <ul style="margin-top: 5px; margin-bottom: 0;">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <div style="background: #fff; border: 1px solid #e0e0e0; border-radius: 8px; padding: 35px; box-shadow: 0 4px 15px rgba(0,0,0,0.04);">
                        <form action="{{route('ppdb.store')}}" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}

                            <!-- BAGIAN 1: IDENTITAS CALON SISWA -->
                            <h4 style="border-bottom: 2px solid #3498db; padding-bottom: 8px; margin-bottom: 20px; color: #2c3e50;">
                                <i class="icon-user"></i> 1. Identitas Calon Siswa
                            </h4>

                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="nisn">NISN (10 Digit Angka) <span class="text-danger">*</span></label>
                                    <input type="text" name="nisn" id="nisn" class="form-control" placeholder="Nomor Induk Siswa Nasional" value="{{old('nisn')}}" required>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="nik">NIK KTP / KK (16 Digit Angka)</label>
                                    <input type="text" name="nik" id="nik" class="form-control" placeholder="Nomor Induk Kependudukan" value="{{old('nik')}}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-8 form-group">
                                    <label for="nama_lengkap">Nama Lengkap (Sesuai Ijazah SMP) <span class="text-danger">*</span></label>
                                    <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" placeholder="Nama Lengkap" value="{{old('nama_lengkap')}}" required>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="jenis_kelamin">Jenis Kelamin <span class="text-danger">*</span></label>
                                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                                        <option value="L" {{old('jenis_kelamin') == 'L' ? 'selected' : ''}}>Laki Laki</option>
                                        <option value="P" {{old('jenis_kelamin') == 'P' ? 'selected' : ''}}>Perempuan</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="tempat_lahir">Tempat Lahir <span class="text-danger">*</span></label>
                                    <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" placeholder="Kota / Kabupaten Lahir" value="{{old('tempat_lahir')}}" required>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="tanggal_lahir">Tanggal Lahir <span class="text-danger">*</span></label>
                                    <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" value="{{old('tanggal_lahir')}}" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="asal_sekolah">Asal Sekolah (SMP / MTs) <span class="text-danger">*</span></label>
                                <input type="text" name="asal_sekolah" id="asal_sekolah" class="form-control" placeholder="Contoh: SMP Negeri 1 Padaherang" value="{{old('asal_sekolah')}}" required>
                            </div>

                            <!-- BAGIAN 2: PILIHAN JURUSAN -->
                            <h4 style="border-bottom: 2px solid #3498db; padding-bottom: 8px; margin-top: 30px; margin-bottom: 20px; color: #2c3e50;">
                                <i class="icon-line-check"></i> 2. Pilihan Kompetensi Keahlian
                            </h4>

                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="jurusan_id_1">Pilihan Jurusan 1 (Prioritas Utama) <span class="text-danger">*</span></label>
                                    <select name="jurusan_id_1" id="jurusan_id_1" class="form-control" required>
                                        <option value="">Pilih Jurusan Utama</option>
                                        @foreach($jurusans as $j)
                                            <option value="{{$j->id}}" {{old('jurusan_id_1') == $j->id ? 'selected' : ''}}>{{$j->nama_jurusan}} ({{$j->kode_jurusan}})</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="jurusan_id_2">Pilihan Jurusan 2 (Alternatif)</label>
                                    <select name="jurusan_id_2" id="jurusan_id_2" class="form-control">
                                        <option value="">Pilih Jurusan Cadangan (Opsional)</option>
                                        @foreach($jurusans as $j)
                                            <option value="{{$j->id}}" {{old('jurusan_id_2') == $j->id ? 'selected' : ''}}>{{$j->nama_jurusan}} ({{$j->kode_jurusan}})</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- BAGIAN 3: ORANG TUA / WALI & ALAMAT -->
                            <h4 style="border-bottom: 2px solid #3498db; padding-bottom: 8px; margin-top: 30px; margin-bottom: 20px; color: #2c3e50;">
                                <i class="icon-home"></i> 3. Data Orang Tua / Wali &amp; Kontak
                            </h4>

                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="nama_wali">Nama Orang Tua / Wali <span class="text-danger">*</span></label>
                                    <input type="text" name="nama_wali" id="nama_wali" class="form-control" placeholder="Nama Ayah / Ibu / Wali" value="{{old('nama_wali')}}" required>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="nomor_wa_wali">Nomor WhatsApp Aktif <span class="text-danger">*</span></label>
                                    <input type="text" name="nomor_wa_wali" id="nomor_wa_wali" class="form-control" placeholder="Contoh: 081234567890" value="{{old('nomor_wa_wali')}}" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="alamat_lengkap">Alamat Tempat Tinggal Lengkap <span class="text-danger">*</span></label>
                                <textarea name="alamat_lengkap" id="alamat_lengkap" rows="3" class="form-control" placeholder="Dusun/Jalan, RT/RW, Desa/Kelurahan, Kecamatan, Kabupaten" required>{{old('alamat_lengkap')}}</textarea>
                            </div>

                            <!-- BAGIAN 4: UNGGAH DOKUMEN -->
                            <h4 style="border-bottom: 2px solid #3498db; padding-bottom: 8px; margin-top: 30px; margin-bottom: 20px; color: #2c3e50;">
                                <i class="icon-file-text"></i> 4. Dokumen Lampiran (Format: PDF, JPG, PNG &bull; Maks 2MB)
                            </h4>

                            <div class="row">
                                <div class="col-md-4 form-group">
                                    <label for="berkas_ijazah">Scan Ijazah / SKL</label>
                                    <input type="file" name="berkas_ijazah" id="berkas_ijazah" class="form-control-file" accept=".pdf,.jpg,.jpeg,.png">
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="berkas_kk">Scan Kartu Keluarga (KK)</label>
                                    <input type="file" name="berkas_kk" id="berkas_kk" class="form-control-file" accept=".pdf,.jpg,.jpeg,.png">
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="berkas_akta">Scan Akta Kelahiran</label>
                                    <input type="file" name="berkas_akta" id="berkas_akta" class="form-control-file" accept=".pdf,.jpg,.jpeg,.png">
                                </div>
                            </div>

                            <div class="topmargin-sm text-center">
                                <button type="submit" class="button button-3d button-rounded button-blue button-large btn-block">
                                    <i class="icon-paper-plane"></i> Kirim Formulir Pendaftaran PPDB
                                </button>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
