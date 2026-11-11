# Website Profil & Sistem Informasi Siswa SMKN 1 Padaherang

[![Laravel Version](https://img.shields.io/badge/Laravel-5.8-red.svg)](https://laravel.com)
[![PHP Version](https://img.shields.io/badge/PHP-%5E7.1.3-blue.svg)](https://php.net)
[![License](https://img.shields.io/badge/license-MIT-green.svg)](LICENSE)

Portal profil sekolah resmi dan sistem informasi manajemen data siswa berbasis web untuk **SMK Negeri 1 Padaherang**, Kabupaten Pangandaran. Aplikasi ini dibangun dengan framework Laravel 5.8 dengan antarmuka publik modern dan panel dashboard manajemen data siswa berbasis Klorofil Admin Template.

---

## 📌 Daftar Isi
- [Gambaran Umum](#-gambaran-umum)
- [Teknologi yang Digunakan](#-teknologi-yang-digunakan)
- [Daftar Fitur](#-daftar-fitur)
  - [1. Halaman Publik (Frontend)](#1-halaman-publik-frontend)
  - [2. Panel Manajemen (Backend Admin)](#2-panel-manajemen-backend-admin)
- [Struktur Database Saat Ini](#-struktur-database-saat-ini)
- [Panduan Instalasi & Menjalankan](#-panduan-instalasi--menjalankan)
  - [Prasyarat Sistem](#prasyarat-sistem)
  - [Langkah-langkah Instalasi](#langkah-langkah-instalasi)
- [Struktur Proyek](#-struktur-proyek)
- [Catatan Teknis & Isu Keamanan (Penting)](#-catatan-teknis--isu-keamanan-penting)
- [Rencana Pengembangan Lanjutan](#-rencana-pengembangan-lanjutan)

---

## 🏫 Gambaran Umum
Website ini berfungsi sebagai:
1. **Media Informasi & Promosi Sekolah**: Memperkenalkan profil sekolah, sejarah, visi-misi, pimpinan, prestasi, dan kompetensi keahlian ke masyarakat luas.
2. **Sistem Informasi Siswa Sederhana**: Mengelola pencatatan data induk siswa (NIS, nama, kelas, jenis kelamin, jurusan, foto).

---

## 🛠 Teknologi yang Digunakan

| Komponen | Spesifikasi / Library |
| :--- | :--- |
| **Backend Framework** | Laravel 5.8.* |
| **Bahasa Pemrograman** | PHP ^7.1.3 (Dianjurkan PHP 7.2 – 7.4) |
| **Database** | MySQL / MariaDB |
| **Frontend Public Template** | Canvas Multi-Purpose HTML5 Template |
| **Backend Admin Template** | Klorofil Free Bootstrap Admin Dashboard |
| **Frontend Asset Bundler** | Laravel Mix 4, Sass, jQuery, Bootstrap 4 |

---

## 🚀 Daftar Fitur

### 1. Halaman Publik (Frontend)
- **Beranda (Landing Page)**: Hero slider dengan video banner latar, ringkasan profil, preview program keahlian, prestasi, dan galeri.
- **Profil Sekolah**:
  - Sejarah Singkat (`/profile/sejarah-singkat`)
  - Visi & Misi (`/profile/visi-misi`)
  - Profil Kepala Sekolah & Sambutan (`/profile/kepala-sekolah`)
  - Struktur Organisasi Sekolah (`/profile/struktur-organisasi`)
  - Galeri Prestasi Siswa & Guru (`/profile/prestasi-sekolah`)
- **Kompetensi Keahlian (8 Jurusan)**:
  - Rekayasa Perangkat Lunak (RPL)
  - Teknik Komputer dan Jaringan (TKJ)
  - Multimedia (MM)
  - Usaha Perjalanan Wisata (UPW)
  - Teknik Elektronika Industri (TEIN)
  - Teknik Kendaraan Ringan (TKR)
  - Teknik Pengolahan Minyak, Gas & Petrokimia (TPMP)
  - Geologi Pertambangan (GP)
- **Data Siswa Terbuka**: Akses publik untuk melihat daftar siswa terdaftar (`/dataSiswa`).
- **Direktori Guru Terbuka**: Akses publik profil tenaga pendidik & mata pelajaran yang diampu (`/dataGuru`).
- **Warta & Berita Terkini**: Portal publik membaca berita & prestasi sekolah (`/berita`, `/berita/{slug}`) dilengkapi fitur pencarian dan artikel terkait.
- **Papan Pengumuman Resmi**: Pemberitahuan akademik dan kedinasan (`/pengumuman`, `/pengumuman/{slug}`) dengan penanda urgensi dan berkas unduhan.
- **Portal PPDB Online (`/ppdb`)**:
  - Halaman informasi, persyaratan, dan alur pendaftaran siswa baru.
  - Formulir registrasi daring calon siswa (`/ppdb/daftar`) dengan validasi NISN dan unggah scan dokumen (Ijazah, KK, Akta Kelahiran).
  - Cek status verifikasi & kelulusan pendaftaran mandiri (`/ppdb/cek-status`).
  - Cetak tanda bukti registrasi pendaftaran resmi (`/ppdb/bukti/{nomor}`).

### 2. Panel Manajemen (Backend Admin)
- **Autentikasi Admin & RBAC**: Form login (`/login`) & logout dengan proteksi `auth` middleware serta peran pengguna (`admin`, `guru`, `siswa`).
- **Dashboard Ringkasan**: Tampilan beranda admin dengan widget ringkasan dan notifikasi.
- **Master Data**:
  - **Data Siswa (CRUD)**: Kelola data induk siswa, upload avatar aman, pencarian, dan profil detail siswa.
  - **Data Guru (CRUD)**: Kelola tenaga pendidik (`/admin/gurus`), NIP, gelar, foto, status PNS/Honorer, dan kontak.
  - **Data Kelas (CRUD)**: Kelola rombongan belajar (`/admin/kelas`), tingkat 10-12, jurusan, dan penugasan wali kelas.
  - **Mata Pelajaran (CRUD)**: Kelola kurikulum pelajaran (`/admin/mapels`), kelompok Normatif/Adaptif/Produktif, dan standar KKM.
- **Modul Akademik & Kesiswaan**:
  - **Presensi Harian (`/admin/presensi`)**: Pencatatan kehadiran harian siswa per tanggal & rombel (Hadir, Sakit, Izin, Alpa) dengan metrik rekapitulasi.
  - **Penilaian & Raport (`/admin/nilais`)**: Input nilai tugas (30%), UTS (30%), UAS (40%) dengan kalkulasi otomatis nilai akhir dan predikat A/B/C/D.
  - **Cetak Raport / Transkrip (`/admin/nilais/transkrip/{id}`)**: Lembar transkrip capaian belajar dan rekap kehadiran siswa siap cetak.
  - **Pendaftar PPDB Online (`/admin/ppdb`)**: Verifikasi berkas dokumen calon siswa, input catatan panitia, penetapan status (Diverifikasi, Diterima, Ditolak), dan cetak arsip bukti.
- **Publikasi & CMS**:
  - **Berita & Artikel CMS (`/admin/artikels`)**: Tulis, edit, hapus berita dengan upload thumbnail aman, slug otomatis, kategori, dan status draft/published.
  - **Pengumuman (`/admin/pengumumans`)**: Publikasi pengumuman dengan target audiens, urgensi, dan berkas lampiran.
  - **Kompetensi Jurusan (`/admin/jurusans`)**: Kelola 8 jurusan keahlian secara dinamis.

---

## 🗄 Struktur Database Saat Ini

Aplikasi ini memiliki 12 tabel dalam basis data:

1. **`users`**: Akun pengguna, peran autentikasi (`role`: admin/guru/siswa).
2. **`siswa`**: Data induk siswa terdaftar (`nis`, `nama_siswa`, `jenis_kelamin`, `kelas`, `komp_keahlian`, `avatar`).
3. **`guru`**: Data tenaga pendidik & staf (`nip`, `nama_guru`, `gelar`, `jenis_kelamin`, `bidang_studi`, `foto`, `status_kepegawaian`).
4. **`kelas`**: Data rombel belajar (`jurusan_id`, `guru_id`, `tingkat`, `nama_kelas`, `tahun_ajaran`).
5. **`mata_pelajaran`**: Kurikulum mapel (`kode_mapel`, `nama_mapel`, `jurusan_id`, `kelompok`, `kkm`).
6. **`presensi_siswa`**: Log kehadiran siswa harian (`siswa_id`, `kelas_id`, `tanggal`, `status`, `keterangan`).
7. **`nilai_siswa`**: Nilai capaian belajar (`siswa_id`, `mapel_id`, `semester`, `tahun_ajaran`, `nilai_tugas`, `nilai_uts`, `nilai_uas`, `nilai_akhir`, `predikat`).
8. **`ppdb_pendaftaran`**: Pendaftaran calon peserta didik baru (`nomor_pendaftaran`, `nisn`, `nik`, `nama_lengkap`, `asal_sekolah`, `jurusan_id_1`, `jurusan_id_2`, `berkas_ijazah`, `berkas_kk`, `berkas_akta`, `status_pendaftaran`, `catatan_verifikasi`).
9. **`kategori_artikel`**: Taksonomi pengelompokan berita/artikel (`nama_kategori`, `slug`).
10. **`artikel`**: Konten berita & warta sekolah (`user_id`, `kategori_id`, `judul`, `slug`, `konten`, `thumbnail`, `status`, `views_count`, `published_at`).
11. **`pengumuman`**: Pengumuman resmi sekolah (`user_id`, `judul`, `slug`, `isi_pengumuman`, `berkas_lampiran`, `target_audiens`, `is_urgent`, `tanggal_berakhir`).
12. **`jurusan`**: Master data 8 kompetensi keahlian (`kode_jurusan`, `nama_jurusan`, `slug`, `deskripsi`, `visi_misi`, `prospek_kerja`, `gambar`, `icon`, `is_active`).

---

## 💻 Panduan Instalasi & Menjalankan

### Prasyarat Sistem
- **PHP**: Versi `>= 7.1.3` dan `< 8.0` (Sangat disarankan PHP 7.3 atau 7.4).
- **Composer**: Versi 1.x atau 2.2 (LTS).
- **Database**: MySQL 5.7+ atau MariaDB 10.3+.
- **Node.js & NPM**: Node 12 - 16 (untuk kompilasi asset lama jika diperlukan).

### Langkah-langkah Instalasi

1. **Clone Repositori**:
   ```bash
   git clone https://github.com/NoviHe/WEBSMK_NOVI.git websmk
   cd websmk
   ```

2. **Pasang Dependensi PHP (Composer)**:
   ```bash
   composer install
   ```

3. **Konfigurasi Environment**:
   Salin file konfigurasi `.env.example` ke `.env`:
   ```bash
   copy .env.example .env      # Untuk Windows Command Prompt / PowerShell
   # atau
   cp .env.example .env        # Untuk Linux / macOS
   ```

4. **Generate Application Key**:
   ```bash
   php artisan key:generate
   ```

5. **Pengaturan Database**:
   Buka file `.env` dan sesuaikan koneksi database Anda:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=websmk
   DB_USERNAME=root
   DB_PASSWORD=
   ```

6. **Jalankan Migrasi Database**:
   ```bash
   php artisan migrate
   ```
   > *Catatan: Pastikan kolom `avatar` sudah ditambahkan pada file migration `database/migrations/2019_07_25_061242_create_siswa_table.php` sebelum migrasi dijalankan.*

7. **Buat Akun Administrator**:
   Buka `tinker` untuk membuat akun login pertama:
   ```bash
   php artisan tinker
   ```
   Lalu masukkan baris PHP berikut:
   ```php
   App\User::create([
       'name' => 'Administrator',
       'email' => 'admin@smkn1padaherang.sch.id',
       'password' => bcrypt('admin123')
   ]);
   exit;
   ```

8. **Jalankan Server Lokal**:
   ```bash
   php artisan serve
   ```
   Akses aplikasi pada peramban melalui alamat: `http://localhost:8000`

---

## 📂 Struktur Proyek

```text
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── AuthController.php       # Logika autentikasi admin
│   │       ├── DashboardController.php  # Dashboard backend
│   │       ├── JurusanController.php    # Halaman profil tiap jurusan
│   │       ├── ProfilesController.php   # Halaman profil sekolah
│   │       ├── SiswaController.php      # Operasi CRUD siswa
│   │       └── SiteController.php       # Beranda & data siswa publik
│   ├── User.php                         # Model Eloquent User
│   └── siswa.php                        # Model Eloquent Siswa
├── config/                              # File konfigurasi Laravel
├── database/
│   └── migrations/                      # Skema migrasi database
├── public/
│   ├── admin/                           # Aset CSS/JS tema Klorofil
│   ├── Frontend/                        # Aset CSS/JS tema Canvas
│   └── images/                          # Direktori unggahan foto/avatar
├── resources/
│   └── views/
│       ├── auths/                       # View form login
│       ├── dashboards/                  # View beranda admin
│       ├── layouts/                     # Master template (frontend & backend)
│       ├── siswa/                       # View CRUD siswa
│       └── sites/                       # View halaman profil & jurusan
├── routes/
│   └── web.php                          # Deklarasi rute web aplikasi
├── BLUEPRINT.md                         # Blueprint & Roadmap Pengembangan Lanjutan
└── README.md                            # Dokumentasi utama proyek
```

---

## ⚠️ Catatan Teknis & Isu Keamanan (Penting)

Berdasarkan hasil audit kode sumber awal, ditemukan beberapa poin kritis yang wajib diperbaiki sebelum sistem digunakan di lingkungan produksi:

1. **Vulnerabilitas Upload Berkas (RCE Risk)**:
   - Pada `SiswaController@update`, berkas foto diunggah langsung menggunakan `$request->file('avatar')->getClientOriginalName()` tanpa validasi ekstensi/MIME type. Hal ini memungkinkan unggahan berkas executable/script jahat (seperti `.php`).
   - **Solusi**: Gunakan validasi Laravel `mimes:jpeg,png,jpg|max:2048` dan gunakan nama acak unik via `store()` / `hashName()`.
2. **Penghapusan Data Melalui Rute GET**:
   - Rute `/siswa/{id}/delete` dideklarasikan menggunakan metode `GET` tanpa token CSRF.
   - **Solusi**: Ubah ke metode `DELETE` atau `POST` berbalut `@csrf` dan `@method('DELETE')`.
3. **Validasi Formulir Belum Ada**:
   - Metode `create` dan `update` langsung menyimpan `$request->all()` tanpa sanitasi dan validasi field wajib/tipe data.
4. **Perbedaan Kasus Nama File Model (Case Sensitivity)**:
   - Model dinamai `app/siswa.php` (huruf kecil), namun dipanggil sebagai `\App\Siswa` pada controller. Hal ini dapat menimbulkan error `Class not found` di server Linux.
5. **Versi Framework Usang**:
   - Laravel 5.8 sudah mencapai masa End-of-Life (EOL). Direkomendasikan melakukan migrasi bertahap ke Laravel versi LTS / modern (Laravel 10 atau 11).

---

## 🗺️ Rencana Pengembangan Lanjutan

Untuk melihat cetak biru arsitektur lengkap, pemodelan database masa depan (ERD), strategi keamanan, dan tahapan refactoring, silakan baca dokumen:
👉 **[BLUEPRINT.md](BLUEPRINT.md)**

---

## 📄 Lisensi

Proyek ini dirilis di bawah lisensi [MIT License](https://opensource.org/licenses/MIT).
