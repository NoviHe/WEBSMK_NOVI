<?php

use Illuminate\Database\Seeder;
use App\KategoriArtikel;

class KategoriArtikelTableSeeder extends Seeder
{
    public function run()
    {
        $kategoris = [
            ['nama_kategori' => 'Prestasi', 'slug' => 'prestasi'],
            ['nama_kategori' => 'Kegiatan Sekolah', 'slug' => 'kegiatan-sekolah'],
            ['nama_kategori' => 'Akademik', 'slug' => 'akademik'],
            ['nama_kategori' => 'Info SMK', 'slug' => 'info-smk'],
        ];

        foreach ($kategoris as $item) {
            KategoriArtikel::firstOrCreate(['slug' => $item['slug']], $item);
        }
    }
}
