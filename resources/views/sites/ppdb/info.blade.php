@extends('layouts.frontend')
@section('title', 'Penerimaan Peserta Didik Baru (PPDB Online)')
@section('content')

<!-- Page Title -->
<section id="page-title" class="page-title-mini">
    <div class="container clearfix">
        <h1>Penerimaan Peserta Didik Baru (PPDB Online)</h1>
        <span>Tahun Pelajaran 2026/2027 &bull; SMK Negeri 1 Padaherang</span>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">PPDB Online</li>
        </ol>
    </div>
</section>

<!-- Content -->
<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">

            <!-- Hero Banner -->
            <div class="jumbotron" style="background: linear-gradient(135deg, #1b3a4b 0%, #006466 100%); color: #fff; border-radius: 8px; padding: 40px;">
                <h1 style="color: #fff; font-size: 32px; font-weight: bold;">Selamat Datang di Portal Resmi PPDB SMKN 1 Padaherang</h1>
                <p style="font-size: 16px; opacity: 0.9;">Mari bergabung menjadi bagian dari generasi vokasi unggul dan profesional yang siap kerja, berkarakter, dan berdaya saing global.</p>
                <div class="topmargin-sm">
                    <a href="/ppdb/daftar" class="button button-3d button-large button-rounded button-amber"><i class="icon-line-check"></i> Daftar Sekarang</a>
                    <a href="/ppdb/cek-status" class="button button-3d button-large button-rounded button-light"><i class="icon-search3"></i> Cek Status Pendaftaran</a>
                </div>
            </div>

            <!-- Steps / Alur -->
            <div class="heading-block center topmargin-sm">
                <h3>Alur Pendaftaran Peserta Didik Baru</h3>
                <span>4 Langkah mudah pendaftaran secara daring</span>
            </div>

            <div class="row bottommargin-lg">
                <div class="col-md-3 text-center bottommargin-sm">
                    <div style="width: 70px; height: 70px; line-height: 70px; border-radius: 50%; background: #3498db; color: #fff; font-size: 24px; margin: 0 auto 15px; font-weight: bold;">1</div>
                    <h4>Pengisian Formulir</h4>
                    <p style="color: #666; font-size: 14px;">Calon siswa mengisi biodata lengkap, asal sekolah, dan memilih 2 pilihan kompetensi keahlian.</p>
                </div>
                <div class="col-md-3 text-center bottommargin-sm">
                    <div style="width: 70px; height: 70px; line-height: 70px; border-radius: 50%; background: #2ecc71; color: #fff; font-size: 24px; margin: 0 auto 15px; font-weight: bold;">2</div>
                    <h4>Unggah Dokumen</h4>
                    <p style="color: #666; font-size: 14px;">Mengunggah berkas scan kartu keluarga (KK), ijazah/SKL, dan akta kelahiran format PDF/JPG.</p>
                </div>
                <div class="col-md-3 text-center bottommargin-sm">
                    <div style="width: 70px; height: 70px; line-height: 70px; border-radius: 50%; background: #f39c12; color: #fff; font-size: 24px; margin: 0 auto 15px; font-weight: bold;">3</div>
                    <h4>Cetak Bukti Daftar</h4>
                    <p style="color: #666; font-size: 14px;">Mendapatkan nomor registrasi unik dan mencetak lembar bukti pendaftaran mandiri.</p>
                </div>
                <div class="col-md-3 text-center bottommargin-sm">
                    <div style="width: 70px; height: 70px; line-height: 70px; border-radius: 50%; background: #9b59b6; color: #fff; font-size: 24px; margin: 0 auto 15px; font-weight: bold;">4</div>
                    <h4>Verifikasi &amp; Hasil</h4>
                    <p style="color: #666; font-size: 14px;">Panitia memvalidasi berkas dan calon siswa memantau pengumuman kelulusan online.</p>
                </div>
            </div>

            <!-- Persyaratan & Jurusan -->
            <div class="row">
                <div class="col-md-6">
                    <div class="card" style="padding: 25px; border-radius: 8px; border: 1px solid #e0e0e0; background: #fff;">
                        <h4>Persyaratan Dokumen</h4>
                        <ul style="line-height: 2; color: #444;">
                            <li>Lulusan SMP / MTs / Sederajat tahun berjalan atau maksimal 2 tahun sebelumnya.</li>
                            <li>Memiliki NISN (Nomor Induk Siswa Nasional) yang terdaftar aktif di Kemdikbud.</li>
                            <li>Scan Ijazah asli atau Surat Keterangan Lulus (SKL) resmi.</li>
                            <li>Scan Kartu Keluarga (KK) dan Akta Kelahiran.</li>
                            <li>Batas usia maksimal 21 tahun pada saat awal tahun pelajaran.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card" style="padding: 25px; border-radius: 8px; border: 1px solid #e0e0e0; background: #fff;">
                        <h4>Pilihan Kompetensi Keahlian</h4>
                        <div class="row">
                            @foreach($jurusans as $j)
                            <div class="col-6" style="margin-bottom: 10px;">
                                <i class="icon-line-check text-success"></i> <strong>{{$j->kode_jurusan}}</strong> - {{$j->nama_jurusan}}
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection
