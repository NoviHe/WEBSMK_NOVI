<?php

namespace Tests\Feature;

use App\Artikel;
use App\Jurusan;
use App\KategoriArtikel;
use App\Pengumuman;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CmsModuleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function public_can_view_home_page()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('SMK N1 PADAHERANG');
    }

    /** @test */
    public function public_can_view_published_news_list_and_detail()
    {
        $user = factory(User::class)->create();
        $kat = KategoriArtikel::create(['nama_kategori' => 'Prestasi', 'slug' => 'prestasi']);

        $artikel = Artikel::create([
            'user_id' => $user->id,
            'kategori_id' => $kat->id,
            'judul' => 'Uji Coba Berita Pertama',
            'slug' => 'uji-coba-berita-pertama',
            'konten' => '<p>Konten artikel percobaan SMKN 1 Padaherang.</p>',
            'status' => 'published',
            'published_at' => now(),
        ]);

        $responseList = $this->get('/berita');
        $responseList->assertStatus(200);
        $responseList->assertSee('Uji Coba Berita Pertama');

        $responseDetail = $this->get('/berita/' . $artikel->slug);
        $responseDetail->assertStatus(200);
        $responseDetail->assertSee('Konten artikel percobaan SMKN 1 Padaherang.');
    }

    /** @test */
    public function public_can_view_announcements()
    {
        $user = factory(User::class)->create();

        $pengumuman = Pengumuman::create([
            'user_id' => $user->id,
            'judul' => 'Pengumuman Ujian Semester',
            'slug' => 'pengumuman-ujian-semester',
            'isi_pengumuman' => 'Seluruh siswa wajib hadir tepat waktu jam 07.00 WIB.',
            'target_audiens' => 'siswa',
            'is_urgent' => true,
        ]);

        $responseList = $this->get('/pengumuman');
        $responseList->assertStatus(200);
        $responseList->assertSee('Pengumuman Ujian Semester');

        $responseDetail = $this->get('/pengumuman/' . $pengumuman->slug);
        $responseDetail->assertStatus(200);
        $responseDetail->assertSee('Seluruh siswa wajib hadir tepat waktu jam 07.00 WIB.');
    }

    /** @test */
    public function public_can_view_jurusan_detail()
    {
        $jurusan = Jurusan::create([
            'kode_jurusan' => 'RPL',
            'nama_jurusan' => 'Rekayasa Perangkat Lunak',
            'slug' => 'rekayasa-perangkat-lunak',
            'deskripsi' => 'Pengembangan software modern.',
            'is_active' => true,
        ]);

        $response = $this->get('/keahlian/' . $jurusan->slug);
        $response->assertStatus(200);
    }

    /** @test */
    public function unauthenticated_user_cannot_access_cms_admin_pages()
    {
        $this->get('/admin/artikels')->assertRedirect('/login');
        $this->get('/admin/pengumumans')->assertRedirect('/login');
        $this->get('/admin/jurusans')->assertRedirect('/login');
    }

    /** @test */
    public function admin_can_create_new_article()
    {
        $user = factory(User::class)->create();
        $kat = KategoriArtikel::create(['nama_kategori' => 'Info SMK', 'slug' => 'info-smk']);

        $payload = [
            'judul' => 'Juara Robotika Nasional',
            'kategori_id' => $kat->id,
            'status' => 'published',
            'konten' => 'Siswa SMKN 1 Padaherang meraih juara 1 kompetisi robotika nasional.'
        ];

        $response = $this->actingAs($user)->post('/admin/artikels', $payload);
        $response->assertRedirect('/admin/artikels');

        $this->assertDatabaseHas('artikel', [
            'judul' => 'Juara Robotika Nasional',
            'slug' => 'juara-robotika-nasional'
        ]);
    }

    /** @test */
    public function admin_can_create_announcement()
    {
        $user = factory(User::class)->create();

        $payload = [
            'judul' => 'Pemberitahuan Libur Nasional',
            'isi_pengumuman' => 'Sekolah libur mulai tanggal 12 hingga 15.',
            'target_audiens' => 'semua',
            'is_urgent' => 1
        ];

        $response = $this->actingAs($user)->post('/admin/pengumumans', $payload);
        $response->assertRedirect('/admin/pengumumans');

        $this->assertDatabaseHas('pengumuman', [
            'judul' => 'Pemberitahuan Libur Nasional'
        ]);
    }

    /** @test */
    public function admin_can_create_jurusan()
    {
        $user = factory(User::class)->create();

        $payload = [
            'kode_jurusan' => 'DKV',
            'nama_jurusan' => 'Desain Komunikasi Visual',
            'deskripsi' => 'Program keahlian komunikasi visual.',
            'is_active' => 1
        ];

        $response = $this->actingAs($user)->post('/admin/jurusans', $payload);
        $response->assertRedirect('/admin/jurusans');

        $this->assertDatabaseHas('jurusan', [
            'kode_jurusan' => 'DKV',
            'nama_jurusan' => 'Desain Komunikasi Visual'
        ]);
    }
}
