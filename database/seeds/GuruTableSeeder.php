<?php

use Illuminate\Database\Seeder;
use App\Guru;

class GuruTableSeeder extends Seeder
{
    public function run()
    {
        $gurus = [
            [
                'nip' => '197508152000031001',
                'nama_guru' => 'Dra. Hj. Nunung Erni Nuraeni',
                'gelar' => 'M.MPd',
                'jenis_kelamin' => 'P',
                'bidang_studi' => 'Manajemen Sekolah',
                'telepon' => '081223344551',
                'status_kepegawaian' => 'PNS',
            ],
            [
                'nip' => '198003122005011002',
                'nama_guru' => 'Dr. Oo Kosidin',
                'gelar' => 'MM',
                'jenis_kelamin' => 'L',
                'bidang_studi' => 'Kurikulum & Pendidikan',
                'telepon' => '081223344552',
                'status_kepegawaian' => 'PNS',
            ],
            [
                'nip' => '198506202008011003',
                'nama_guru' => 'Abdul Munir',
                'gelar' => 'S.Pd, M.M.',
                'jenis_kelamin' => 'L',
                'bidang_studi' => 'Kesiswaan & Bimbingan Konseling',
                'telepon' => '081223344553',
                'status_kepegawaian' => 'PNS',
            ],
            [
                'nip' => '199001152015021004',
                'nama_guru' => 'Yudi Permana',
                'gelar' => 'S.Kom, M.T.',
                'jenis_kelamin' => 'L',
                'bidang_studi' => 'Rekayasa Perangkat Lunak',
                'telepon' => '081223344554',
                'status_kepegawaian' => 'PNS',
            ],
            [
                'nip' => '199204102018012005',
                'nama_guru' => 'Dewi Anggraeni',
                'gelar' => 'S.Pd',
                'jenis_kelamin' => 'P',
                'bidang_studi' => 'Bahasa Inggris',
                'telepon' => '081223344555',
                'status_kepegawaian' => 'Honorer',
            ],
        ];

        foreach ($gurus as $guru) {
            Guru::firstOrCreate(['nip' => $guru['nip']], $guru);
        }
    }
}
