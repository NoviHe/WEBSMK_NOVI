<?php

use Illuminate\Database\Seeder;
use App\PresensiSiswa;
use App\Siswa;
use App\Kelas;

class PresensiTableSeeder extends Seeder
{
    public function run()
    {
        $siswaList = Siswa::take(5)->get();
        $kelas = Kelas::first();

        foreach ($siswaList as $siswa) {
            PresensiSiswa::firstOrCreate(
                ['siswa_id' => $siswa->id, 'tanggal' => now()->toDateString()],
                [
                    'kelas_id' => $kelas ? $kelas->id : null,
                    'status' => 'Hadir',
                    'keterangan' => 'Hadir tepat waktu'
                ]
            );
        }
    }
}
