<?php

use Illuminate\Database\Seeder;
use App\Pengumuman;
use App\User;

class PengumumanTableSeeder extends Seeder
{
    public function run()
    {
        $admin = User::first();
        if (!$admin) {
            return;
        }

        $pengumumans = [
            [
                'user_id' => $admin->id,
                'judul' => 'Jadwal Penilaian Akhir Semester (PAS) Ganjil Tahun Ajaran 2026/2027',
                'slug' => 'jadwal-penilaian-akhir-semester-pas-ganjil-2026-2027',
                'isi_pengumuman' => 'Diberitahukan kepada seluruh siswa kelas X, XI, dan XII SMKN 1 Padaherang bahwa pelaksanaan Penilaian Akhir Semester (PAS) Ganjil akan dimulai pada hari Senin pekan depan. Harap melunasi administrasi dan membawa kartu peserta ujian.',
                'berkas_lampiran' => null,
                'target_audiens' => 'siswa',
                'is_urgent' => true,
                'tanggal_berakhir' => now()->addDays(14)->toDateString(),
            ],
            [
                'user_id' => $admin->id,
                'judul' => 'Sosialisasi Praktik Kerja Lapangan (PKL) Siswa Kelas XI',
                'slug' => 'sosialisasi-praktik-kerja-lapangan-pkl-siswa-kelas-xi',
                'isi_pengumuman' => 'Pertemuan daring dan tatap muka bersama orang tua/wali murid kelas XI dalam rangka pembekalan program Praktik Kerja Lapangan (PKL) tahun industri 2026/2027 akan diadakan di Aula Utama SMKN 1 Padaherang.',
                'berkas_lampiran' => null,
                'target_audiens' => 'semua',
                'is_urgent' => false,
                'tanggal_berakhir' => now()->addDays(20)->toDateString(),
            ]
        ];

        foreach ($pengumumans as $item) {
            Pengumuman::firstOrCreate(['slug' => $item['slug']], $item);
        }
    }
}
