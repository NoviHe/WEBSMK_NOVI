<?php

namespace Tests\Feature;

use App\Guru;
use App\Jurusan;
use App\Kelas;
use App\MataPelajaran;
use App\NilaiSiswa;
use App\PresensiSiswa;
use App\Siswa;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AcademicModuleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function public_can_view_data_guru_page()
    {
        $guru = Guru::create([
            'nip' => '198001012010011001',
            'nama_guru' => 'Pak Joko Widodo',
            'gelar' => 'S.Pd',
            'jenis_kelamin' => 'L',
            'bidang_studi' => 'Fisika',
            'status_kepegawaian' => 'PNS'
        ]);

        $response = $this->get('/dataGuru');
        $response->assertStatus(200);
        $response->assertSee('Pak Joko Widodo');
    }

    /** @test */
    public function admin_can_create_guru()
    {
        $user = factory(User::class)->create(['role' => 'admin']);

        $payload = [
            'nip' => '198505052010011002',
            'nama_guru' => 'Bu Ratna Sari',
            'gelar' => 'M.Pd',
            'jenis_kelamin' => 'P',
            'bidang_studi' => 'Kimia',
            'status_kepegawaian' => 'PNS',
            'telepon' => '08123456789'
        ];

        $response = $this->actingAs($user)->post('/admin/gurus', $payload);
        $response->assertRedirect('/admin/gurus');

        $this->assertDatabaseHas('guru', [
            'nip' => '198505052010011002',
            'nama_guru' => 'Bu Ratna Sari'
        ]);
    }

    /** @test */
    public function admin_can_create_kelas()
    {
        $user = factory(User::class)->create(['role' => 'admin']);
        $jurusan = Jurusan::create([
            'kode_jurusan' => 'RPL',
            'nama_jurusan' => 'Rekayasa Perangkat Lunak',
            'slug' => 'rekayasa-perangkat-lunak'
        ]);

        $payload = [
            'nama_kelas' => 'X RPL 2',
            'tingkat' => 10,
            'jurusan_id' => $jurusan->id,
            'tahun_ajaran' => '2026/2027'
        ];

        $response = $this->actingAs($user)->post('/admin/kelas', $payload);
        $response->assertRedirect('/admin/kelas');

        $this->assertDatabaseHas('kelas', [
            'nama_kelas' => 'X RPL 2',
            'tingkat' => 10
        ]);
    }

    /** @test */
    public function admin_can_create_mata_pelajaran()
    {
        $user = factory(User::class)->create(['role' => 'admin']);

        $payload = [
            'kode_mapel' => 'MP-IPA',
            'nama_mapel' => 'Ilmu Pengetahuan Alam',
            'kelompok' => 'Normatif',
            'kkm' => 75
        ];

        $response = $this->actingAs($user)->post('/admin/mapels', $payload);
        $response->assertRedirect('/admin/mapels');

        $this->assertDatabaseHas('mata_pelajaran', [
            'kode_mapel' => 'MP-IPA',
            'nama_mapel' => 'Ilmu Pengetahuan Alam'
        ]);
    }

    /** @test */
    public function admin_can_log_presensi_siswa()
    {
        $user = factory(User::class)->create(['role' => 'admin']);
        $siswa = Siswa::create([
            'nis' => '19201099',
            'nama_siswa' => 'Agus Siswa',
            'jenis_kelamin' => 'L',
            'kelas' => 'X RPL 1',
            'komp_keahlian' => 'Rekayasa Perangkat Lunak'
        ]);

        $payload = [
            'siswa_id' => $siswa->id,
            'tanggal' => now()->toDateString(),
            'status' => 'Hadir',
            'keterangan' => 'Hadir tepat waktu'
        ];

        $response = $this->actingAs($user)->post('/admin/presensi', $payload);
        $response->assertSessionHas('sukses');

        $this->assertDatabaseHas('presensi_siswa', [
            'siswa_id' => $siswa->id,
            'status' => 'Hadir'
        ]);
    }

    /** @test */
    public function admin_can_input_nilai_and_calculate_grade_automatically()
    {
        $user = factory(User::class)->create(['role' => 'admin']);
        $siswa = Siswa::create([
            'nis' => '19201088',
            'nama_siswa' => 'Citra Siswa',
            'jenis_kelamin' => 'P',
            'kelas' => 'XI RPL 1',
            'komp_keahlian' => 'Rekayasa Perangkat Lunak'
        ]);
        $mapel = MataPelajaran::create([
            'kode_mapel' => 'RPL-DB',
            'nama_mapel' => 'Basis Data',
            'kelompok' => 'Produktif',
            'kkm' => 75
        ]);

        // Tugas: 90 (27), UTS: 90 (27), UAS: 90 (36) -> Akhir: 90 (Predikat: A)
        $payload = [
            'siswa_id' => $siswa->id,
            'mapel_id' => $mapel->id,
            'semester' => 'Ganjil',
            'tahun_ajaran' => '2026/2027',
            'nilai_tugas' => 90,
            'nilai_uts' => 90,
            'nilai_uas' => 90
        ];

        $response = $this->actingAs($user)->post('/admin/nilais', $payload);
        $response->assertRedirect('/admin/nilais');

        $this->assertDatabaseHas('nilai_siswa', [
            'siswa_id' => $siswa->id,
            'mapel_id' => $mapel->id,
            'nilai_akhir' => 90,
            'predikat' => 'A'
        ]);
    }

    /** @test */
    public function academic_transcript_view_can_be_rendered()
    {
        $user = factory(User::class)->create(['role' => 'admin']);
        $siswa = Siswa::create([
            'nis' => '19201077',
            'nama_siswa' => 'Dimas Siswa',
            'jenis_kelamin' => 'L',
            'kelas' => 'XII RPL 1',
            'komp_keahlian' => 'Rekayasa Perangkat Lunak'
        ]);

        $response = $this->actingAs($user)->get('/admin/nilais/transkrip/' . $siswa->id);
        $response->assertStatus(200);
        $response->assertSee('Laporan Capaian Hasil Belajar Siswa');
        $response->assertSee('Dimas Siswa');
    }
}
