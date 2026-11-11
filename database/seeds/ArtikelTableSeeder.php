<?php

use Illuminate\Database\Seeder;
use App\Artikel;
use App\KategoriArtikel;
use App\User;

class ArtikelTableSeeder extends Seeder
{
    public function run()
    {
        $admin = User::first();
        if (!$admin) {
            return;
        }

        $prestasi = KategoriArtikel::where('slug', 'prestasi')->first();
        $kegiatan = KategoriArtikel::where('slug', 'kegiatan-sekolah')->first();

        $artikels = [
            [
                'user_id' => $admin->id,
                'kategori_id' => $prestasi ? $prestasi->id : null,
                'judul' => 'Siswa SMKN 1 Padaherang Raih Medali Emas LKS Tingkat Provinsi',
                'slug' => 'siswa-smkn-1-padaherang-raih-medali-emas-lks-tingkat-provinsi',
                'konten' => '<p>Prestasi membanggakan kembali ditorehkan oleh siswa SMKN 1 Padaherang dalam ajang Lomba Kompetensi Siswa (LKS) tingkat Provinsi Jawa Barat. Perwakilan bidang IT Software Solutions for Business berhasil meraih Juara 1 Medali Emas setelah mengungguli puluhan peserta dari berbagai kabupaten dan kota.</p><p>Kepala Sekolah menyampaikan apresiasi setinggi-tingginya kepada pembimbing dan siswa atas dedikasi serta kerja keras yang telah membuahkan hasil terbaik ini.</p>',
                'thumbnail' => null,
                'status' => 'published',
                'views_count' => 142,
                'published_at' => now(),
            ],
            [
                'user_id' => $admin->id,
                'kategori_id' => $kegiatan ? $kegiatan->id : null,
                'judul' => 'Peringatan Hari Guru Nasional dan Apresiasi Pendidik Teladan',
                'slug' => 'peringatan-hari-guru-nasional-dan-apresiasi-pendidik-teladan',
                'konten' => '<p>Seluruh civitas akademika SMKN 1 Padaherang memperingati Hari Guru Nasional dengan khidmat melalui upacara bendera dan penganugerahan guru teladan tahun 2026. Acara dilanjutkan dengan pentas seni persembahan dari OSIS dan kompetisi keakraban antar jurusan.</p>',
                'thumbnail' => null,
                'status' => 'published',
                'views_count' => 88,
                'published_at' => now()->subDays(3),
            ]
        ];

        foreach ($artikels as $item) {
            Artikel::firstOrCreate(['slug' => $item['slug']], $item);
        }
    }
}
