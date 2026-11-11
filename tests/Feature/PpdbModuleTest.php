<?php

namespace Tests\Feature;

use App\Jurusan;
use App\PpdbPendaftaran;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PpdbModuleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function public_can_view_ppdb_info_page()
    {
        $response = $this->get('/ppdb');
        $response->assertStatus(200);
        $response->assertSee('Penerimaan Peserta Didik Baru');
    }

    /** @test */
    public function public_can_view_ppdb_registration_form()
    {
        $response = $this->get('/ppdb/daftar');
        $response->assertStatus(200);
        $response->assertSee('Formulir Pendaftaran Siswa Baru');
    }

    /** @test */
    public function candidate_student_can_register_for_ppdb()
    {
        $jurusan = Jurusan::create([
            'kode_jurusan' => 'RPL',
            'nama_jurusan' => 'Rekayasa Perangkat Lunak',
            'slug' => 'rekayasa-perangkat-lunak',
        ]);

        $payload = [
            'nisn' => '0087654321',
            'nik' => '3218010101080002',
            'nama_lengkap' => 'Anisa Rahma',
            'jenis_kelamin' => 'P',
            'tempat_lahir' => 'Ciamis',
            'tanggal_lahir' => '2010-08-20',
            'asal_sekolah' => 'SMPN 2 Padaherang',
            'jurusan_id_1' => $jurusan->id,
            'nama_wali' => 'Sulaeman',
            'nomor_wa_wali' => '081399887766',
            'alamat_lengkap' => 'Jl. Desa Karangpawitan No. 12',
        ];

        $response = $this->post('/ppdb/daftar', $payload);
        $pendaftar = PpdbPendaftaran::where('nisn', '0087654321')->first();

        $this->assertNotNull($pendaftar);
        $response->assertRedirect('/ppdb/bukti/' . $pendaftar->nomor_pendaftaran);
        $this->assertEquals('Menunggu Verifikasi', $pendaftar->status_pendaftaran);
    }

    /** @test */
    public function candidate_student_can_check_registration_status()
    {
        $jurusan = Jurusan::create([
            'kode_jurusan' => 'TKJ',
            'nama_jurusan' => 'Teknik Komputer dan Jaringan',
            'slug' => 'teknik-komputer-jaringan',
        ]);

        $pendaftar = PpdbPendaftaran::create([
            'nomor_pendaftaran' => 'PPDB-2026-TEST1',
            'nisn' => '0091122334',
            'nama_lengkap' => 'Doni Saputra',
            'jenis_kelamin' => 'L',
            'asal_sekolah' => 'SMPN 1 Kalipucang',
            'jurusan_id_1' => $jurusan->id,
            'nama_wali' => 'Bambang',
            'nomor_wa_wali' => '085211223344',
            'alamat_lengkap' => 'Kalipucang',
            'status_pendaftaran' => 'Diverifikasi'
        ]);

        $response = $this->get('/ppdb/cek-status?keyword=PPDB-2026-TEST1');
        $response->assertStatus(200);
        $response->assertSee('Doni Saputra');
        $response->assertSee('BERKAS DIVERIFIKASI');
    }

    /** @test */
    public function printable_registration_receipt_can_be_viewed()
    {
        $jurusan = Jurusan::create([
            'kode_jurusan' => 'MM',
            'nama_jurusan' => 'Multimedia',
            'slug' => 'multimedia',
        ]);

        $pendaftar = PpdbPendaftaran::create([
            'nomor_pendaftaran' => 'PPDB-2026-PRINT1',
            'nisn' => '0099988776',
            'nama_lengkap' => 'Rangga Wijaya',
            'jenis_kelamin' => 'L',
            'asal_sekolah' => 'SMPN 1 Pangandaran',
            'jurusan_id_1' => $jurusan->id,
            'nama_wali' => 'Kusnadi',
            'nomor_wa_wali' => '087766554433',
            'alamat_lengkap' => 'Pangandaran'
        ]);

        $response = $this->get('/ppdb/bukti/' . $pendaftar->nomor_pendaftaran);
        $response->assertStatus(200);
        $response->assertSee('Tanda Bukti Pendaftaran Calon Siswa Baru');
        $response->assertSee('PPDB-2026-PRINT1');
    }

    /** @test */
    public function admin_can_verify_and_update_applicant_status()
    {
        $admin = factory(User::class)->create(['role' => 'admin']);
        $jurusan = Jurusan::create([
            'kode_jurusan' => 'RPL',
            'nama_jurusan' => 'Rekayasa Perangkat Lunak',
            'slug' => 'rekayasa-perangkat-lunak',
        ]);

        $pendaftar = PpdbPendaftaran::create([
            'nomor_pendaftaran' => 'PPDB-2026-VERIF1',
            'nisn' => '0085544332',
            'nama_lengkap' => 'Siti Aisyah',
            'jenis_kelamin' => 'P',
            'asal_sekolah' => 'MTs Negeri 1 Pangandaran',
            'jurusan_id_1' => $jurusan->id,
            'nama_wali' => 'Ahmad',
            'nomor_wa_wali' => '081299887711',
            'alamat_lengkap' => 'Padaherang',
            'status_pendaftaran' => 'Menunggu Verifikasi'
        ]);

        $payload = [
            'status_pendaftaran' => 'Diterima',
            'catatan_verifikasi' => 'Selamat, Anda lolos jalur reguler jurusan RPL.'
        ];

        $response = $this->actingAs($admin)->post('/admin/ppdb/' . $pendaftar->id . '/verifikasi', $payload);
        $response->assertSessionHas('sukses');

        $this->assertDatabaseHas('ppdb_pendaftaran', [
            'id' => $pendaftar->id,
            'status_pendaftaran' => 'Diterima',
            'catatan_verifikasi' => 'Selamat, Anda lolos jalur reguler jurusan RPL.'
        ]);
    }
}
