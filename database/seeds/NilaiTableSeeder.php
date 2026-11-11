<?php

use Illuminate\Database\Seeder;
use App\NilaiSiswa;
use App\Siswa;
use App\MataPelajaran;

class NilaiTableSeeder extends Seeder
{
    public function run()
    {
        $siswa = Siswa::first();
        $mapels = MataPelajaran::take(3)->get();

        if (!$siswa || $mapels->isEmpty()) {
            return;
        }

        foreach ($mapels as $mapel) {
            $tugas = 85.0;
            $uts   = 82.0;
            $uas   = 88.0;
            $calc  = NilaiSiswa::calculateGrade($tugas, $uts, $uas);

            NilaiSiswa::firstOrCreate(
                [
                    'siswa_id' => $siswa->id,
                    'mapel_id' => $mapel->id,
                    'semester' => 'Ganjil',
                    'tahun_ajaran' => '2026/2027'
                ],
                [
                    'nilai_tugas' => $tugas,
                    'nilai_uts'   => $uts,
                    'nilai_uas'   => $uas,
                    'nilai_akhir' => $calc['nilai_akhir'],
                    'predikat'    => $calc['predikat']
                ]
            );
        }
    }
}
