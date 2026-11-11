<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bukti Pendaftaran PPDB - {{$pendaftar->nomor_pendaftaran}}</title>
    <link rel="stylesheet" href="{{asset('admin/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/vendor/font-awesome/css/font-awesome.min.css')}}">
    <style>
        body {
            font-family: 'Helvetica Neue', Arial, sans-serif;
            background-color: #f7f9fb;
            color: #333;
            padding: 30px 0;
        }
        .ticket-container {
            max-width: 800px;
            margin: 0 auto;
            background: #fff;
            border: 2px solid #2c3e50;
            border-radius: 8px;
            padding: 40px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        }
        .header-print {
            border-bottom: 3px double #2c3e50;
            padding-bottom: 15px;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
        }
        .header-logo {
            width: 80px;
            margin-right: 20px;
        }
        .header-text h3 {
            margin: 0;
            font-weight: bold;
            font-size: 20px;
            text-transform: uppercase;
        }
        .header-text p {
            margin: 3px 0 0 0;
            font-size: 13px;
            color: #555;
        }
        .nomor-badge {
            background-color: #f8f9fa;
            border: 1px dashed #2c3e50;
            padding: 12px 20px;
            text-align: center;
            border-radius: 6px;
            margin-bottom: 25px;
        }
        .nomor-badge h4 {
            margin: 0 0 5px 0;
            font-size: 13px;
            color: #666;
            text-transform: uppercase;
        }
        .nomor-badge .code {
            font-size: 24px;
            font-weight: bold;
            color: #2980b9;
            letter-spacing: 2px;
        }
        @media print {
            body {
                background: #fff;
                padding: 0;
            }
            .no-print {
                display: none !important;
            }
            .ticket-container {
                box-shadow: none;
                border: 2px solid #000;
                padding: 20px;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="ticket-container">
            <!-- Action buttons -->
            <div class="no-print text-right" style="margin-bottom: 20px;">
                <button onclick="window.print()" class="btn btn-primary"><i class="fa fa-print"></i> Cetak Bukti Pendaftaran</button>
                <a href="/ppdb" class="btn btn-default">Kembali ke PPDB</a>
            </div>

            <!-- Kop Surat -->
            <div class="header-print">
                <img src="{{asset('frontend/images/logo-smk2.png')}}" class="header-logo" alt="Logo Sekolah">
                <div class="header-text">
                    <h3>Panitia Penerimaan Peserta Didik Baru (PPDB)</h3>
                    <h3>SMK Negeri 1 Padaherang</h3>
                    <p>Jl. Raya Padaherang KM. 1, Kabupaten Pangandaran, Jawa Barat &bull; Email: info@smkn1padaherang.sch.id</p>
                </div>
            </div>

            <div class="text-center" style="margin-bottom: 20px;">
                <h4 style="font-weight: bold; text-transform: uppercase; text-decoration: underline; margin: 0;">Tanda Bukti Pendaftaran Calon Siswa Baru</h4>
                <p style="margin: 5px 0 0 0; color: #666;">Tahun Ajaran 2026/2027</p>
            </div>

            <div class="nomor-badge">
                <h4>Nomor Registrasi Pendaftaran</h4>
                <div class="code">{{$pendaftar->nomor_pendaftaran}}</div>
            </div>

            <!-- Data Pendaftar -->
            <table class="table table-bordered">
                <tr>
                    <th style="width: 200px;" class="active">Nama Lengkap</th>
                    <td><strong>{{$pendaftar->nama_lengkap}}</strong></td>
                </tr>
                <tr>
                    <th class="active">NISN</th>
                    <td>{{$pendaftar->nisn}}</td>
                </tr>
                <tr>
                    <th class="active">NIK Kependudukan</th>
                    <td>{{$pendaftar->nik ?? '-'}}</td>
                </tr>
                <tr>
                    <th class="active">Jenis Kelamin</th>
                    <td>{{$pendaftar->jenis_kelamin == 'L' ? 'Laki-Laki' : 'Perempuan'}}</td>
                </tr>
                <tr>
                    <th class="active">Tempat, Tanggal Lahir</th>
                    <td>{{$pendaftar->tempat_lahir}}, {{$pendaftar->tanggal_lahir ? $pendaftar->tanggal_lahir->format('d F Y') : '-'}}</td>
                </tr>
                <tr>
                    <th class="active">Asal Sekolah</th>
                    <td>{{$pendaftar->asal_sekolah}}</td>
                </tr>
                <tr class="info">
                    <th>Pilihan Jurusan 1</th>
                    <td><strong>{{$pendaftar->pilihan1 ? $pendaftar->pilihan1->nama_jurusan . ' (' . $pendaftar->pilihan1->kode_jurusan . ')' : '-'}}</strong></td>
                </tr>
                <tr>
                    <th class="active">Pilihan Jurusan 2</th>
                    <td>{{$pendaftar->pilihan2 ? $pendaftar->pilihan2->nama_jurusan . ' (' . $pendaftar->pilihan2->kode_jurusan . ')' : '-'}}</td>
                </tr>
                <tr>
                    <th class="active">Nama Orang Tua / Wali</th>
                    <td>{{$pendaftar->nama_wali}}</td>
                </tr>
                <tr>
                    <th class="active">Nomor WhatsApp Wali</th>
                    <td>{{$pendaftar->nomor_wa_wali}}</td>
                </tr>
                <tr>
                    <th class="active">Alamat Lengkap</th>
                    <td>{{$pendaftar->alamat_lengkap}}</td>
                </tr>
                <tr>
                    <th class="active">Status Saat Ini</th>
                    <td>
                        <span class="label label-primary">{{$pendaftar->status_pendaftaran}}</span>
                    </td>
                </tr>
            </table>

            <!-- Catatan & Tanda Tangan -->
            <div style="margin-top: 30px; font-size: 13px; color: #555;">
                <p><strong>Catatan Penting:</strong></p>
                <ol style="padding-left: 20px;">
                    <li>Simpan lembar bukti pendaftaran ini sebagai bukti registrasi yang sah.</li>
                    <li>Pantau status verifikasi dan jadwal tes/wawancara melalui menu Cek Status PPDB Online.</li>
                    <li>Bawalah berkas asli (Ijazah/SKL, KK, Akta) pada saat verifikasi fisik di sekolah.</li>
                </ol>
            </div>

            <div class="row" style="margin-top: 40px;">
                <div class="col-xs-6 text-center">
                    <p>Calon Peserta Didik,</p>
                    <div style="height: 60px;"></div>
                    <p>( <strong>{{$pendaftar->nama_lengkap}}</strong> )</p>
                </div>
                <div class="col-xs-6 text-center">
                    <p>Padaherang, {{date('d F Y')}}<br>Panitia PPDB SMKN 1 Padaherang,</p>
                    <div style="height: 60px;"></div>
                    <p>( _________________________ )</p>
                </div>
            </div>

        </div>
    </div>

</body>
</html>
