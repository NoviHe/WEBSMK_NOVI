<?php

use Illuminate\Database\Seeder;
use App\MataPelajaran;
use App\Jurusan;

class MataPelajaranTableSeeder extends Seeder
{
    public function run()
    {
        $rpl = Jurusan::where('kode_jurusan', 'RPL')->first();

        $mapels = [
            [
                'kode_mapel' => 'MP-IND',
                'nama_mapel' => 'Bahasa Indonesia',
                'jurusan_id' => null,
                'kelompok' => 'Normatif',
                'kkm' => 75,
            ],
            [
                'kode_mapel' => 'MP-MAT',
                'nama_mapel' => 'Matematika',
                'jurusan_id' => null,
                'kelompok' => 'Adaptif',
                'kkm' => 70,
            ],
            [
                'kode_mapel' => 'MP-ING',
                'nama_mapel' => 'Bahasa Inggris',
                'jurusan_id' => null,
                'kelompok' => 'Adaptif',
                'kkm' => 75,
            ],
            [
                'kode_mapel' => 'RPL-WEB',
                'nama_mapel' => 'Pemrograman Web dan Perangkat Bergerak',
                'jurusan_id' => $rpl ? $rpl->id : null,
                'kelompok' => 'Produktif',
                'kkm' => 78,
            ],
            [
                'kode_mapel' => 'RPL-PBO',
                'nama_mapel' => 'Pemrograman Berorientasi Objek',
                'jurusan_id' => $rpl ? $rpl->id : null,
                'kelompok' => 'Produktif',
                'kkm' => 78,
            ],
            [
                'kode_mapel' => 'RPL-BAS',
                'nama_mapel' => 'Basis Data & SQL',
                'jurusan_id' => $rpl ? $rpl->id : null,
                'kelompok' => 'Produktif',
                'kkm' => 80,
            ]
        ];

        foreach ($mapels as $mapel) {
            MataPelajaran::firstOrCreate(['kode_mapel' => $mapel['kode_mapel']], $mapel);
        }
    }
}
