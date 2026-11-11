<?php

use Illuminate\Database\Seeder;
use App\Kelas;
use App\Jurusan;
use App\Guru;

class KelasTableSeeder extends Seeder
{
    public function run()
    {
        $rpl = Jurusan::where('kode_jurusan', 'RPL')->first();
        $tkj = Jurusan::where('kode_jurusan', 'TKJ')->first();
        $mm  = Jurusan::where('kode_jurusan', 'MM')->first();
        $guru = Guru::first();

        $kelasList = [
            [
                'jurusan_id' => $rpl ? $rpl->id : null,
                'guru_id' => $guru ? $guru->id : null,
                'tingkat' => 10,
                'nama_kelas' => 'X RPL 1',
                'tahun_ajaran' => '2026/2027',
            ],
            [
                'jurusan_id' => $rpl ? $rpl->id : null,
                'guru_id' => $guru ? $guru->id : null,
                'tingkat' => 11,
                'nama_kelas' => 'XI RPL 1',
                'tahun_ajaran' => '2026/2027',
            ],
            [
                'jurusan_id' => $rpl ? $rpl->id : null,
                'guru_id' => $guru ? $guru->id : null,
                'tingkat' => 12,
                'nama_kelas' => 'XII RPL 1',
                'tahun_ajaran' => '2026/2027',
            ],
            [
                'jurusan_id' => $tkj ? $tkj->id : null,
                'guru_id' => $guru ? $guru->id : null,
                'tingkat' => 10,
                'nama_kelas' => 'X TKJ 1',
                'tahun_ajaran' => '2026/2027',
            ],
            [
                'jurusan_id' => $mm ? $mm->id : null,
                'guru_id' => $guru ? $guru->id : null,
                'tingkat' => 11,
                'nama_kelas' => 'XI MM 1',
                'tahun_ajaran' => '2026/2027',
            ]
        ];

        foreach ($kelasList as $kelas) {
            Kelas::firstOrCreate(['nama_kelas' => $kelas['nama_kelas']], $kelas);
        }
    }
}
