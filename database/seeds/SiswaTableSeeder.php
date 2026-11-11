<?php

use Illuminate\Database\Seeder;
use App\Siswa;

class SiswaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dummySiswa = [
            [
                'nis' => '19201001',
                'nama_siswa' => 'Ahmad Fauzi',
                'jenis_kelamin' => 'L',
                'kelas' => 'XII RPL 1',
                'komp_keahlian' => 'Rekayasa Perangkat Lunak',
                'avatar' => null,
            ],
            [
                'nis' => '19201002',
                'nama_siswa' => 'Siti Nurhaliza',
                'jenis_kelamin' => 'P',
                'kelas' => 'XII RPL 1',
                'komp_keahlian' => 'Rekayasa Perangkat Lunak',
                'avatar' => null,
            ],
            [
                'nis' => '19202001',
                'nama_siswa' => 'Budi Santoso',
                'jenis_kelamin' => 'L',
                'kelas' => 'XII TKJ 2',
                'komp_keahlian' => 'Teknik Komputer dan Jaringan',
                'avatar' => null,
            ],
            [
                'nis' => '19203001',
                'nama_siswa' => 'Rina Andriani',
                'jenis_kelamin' => 'P',
                'kelas' => 'XI MM 1',
                'komp_keahlian' => 'Multimedia',
                'avatar' => null,
            ],
            [
                'nis' => '19204001',
                'nama_siswa' => 'Diki Permana',
                'jenis_kelamin' => 'L',
                'kelas' => 'XII TKR 1',
                'komp_keahlian' => 'Teknik Kendaraan Ringan',
                'avatar' => null,
            ],
            [
                'nis' => '19205001',
                'nama_siswa' => 'Nisa Rahmawati',
                'jenis_kelamin' => 'P',
                'kelas' => 'XI UPW 1',
                'komp_keahlian' => 'Usaha Perjalanan Wisata',
                'avatar' => null,
            ],
            [
                'nis' => '19206001',
                'nama_siswa' => 'Fajar Pratama',
                'jenis_kelamin' => 'L',
                'kelas' => 'XII TEIN 1',
                'komp_keahlian' => 'Teknik Elektronika Industri',
                'avatar' => null,
            ],
            [
                'nis' => '19207001',
                'nama_siswa' => 'Ilham Maulana',
                'jenis_kelamin' => 'L',
                'kelas' => 'XI GP 1',
                'komp_keahlian' => 'Geologi Pertambangan',
                'avatar' => null,
            ],
            [
                'nis' => '19208001',
                'nama_siswa' => 'Dewi Lestari',
                'jenis_kelamin' => 'P',
                'kelas' => 'XII TPMP 1',
                'komp_keahlian' => 'Pengelolaan Migas dan Petrokimia',
                'avatar' => null,
            ]
        ];

        foreach ($dummySiswa as $siswa) {
            Siswa::firstOrCreate(['nis' => $siswa['nis']], $siswa);
        }
    }
}
