<?php

use Illuminate\Database\Seeder;
use App\Jurusan;
use App\PpdbPendaftaran;

class PpdbTableSeeder extends Seeder
{
    public function run()
    {
        $rpl = Jurusan::where('kode_jurusan', 'RPL')->first();
        $tkj = Jurusan::where('kode_jurusan', 'TKJ')->first();

        if (!$rpl) {
            return;
        }

        PpdbPendaftaran::firstOrCreate(
            ['nisn' => '0081234567'],
            [
                'nomor_pendaftaran' => 'PPDB-2026-00001',
                'nik' => '3218010101080001',
                'nama_lengkap' => 'Muhammad Rizki Pratama',
                'jenis_kelamin' => 'L',
                'tempat_lahir' => 'Pangandaran',
                'tanggal_lahir' => '2010-05-14',
                'asal_sekolah' => 'SMP Negeri 1 Padaherang',
                'jurusan_id_1' => $rpl->id,
                'jurusan_id_2' => $tkj ? $tkj->id : null,
                'nama_wali' => 'Hendra Pratama',
                'nomor_wa_wali' => '081223344550',
                'alamat_lengkap' => 'Dusun Padaherang RT 02 / RW 01, Kec. Padaherang, Kab. Pangandaran',
                'status_pendaftaran' => 'Menunggu Verifikasi',
                'catatan_verifikasi' => 'Pendaftaran online berhasil, menunggu verifikasi berkas.'
            ]
        );
    }
}
