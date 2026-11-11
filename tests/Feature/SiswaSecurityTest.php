<?php

namespace Tests\Feature;

use App\Siswa;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class SiswaSecurityTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function unauthenticated_user_cannot_access_siswa_dashboard()
    {
        $response = $this->get('/siswa');
        $response->assertRedirect('/login');
    }

    /** @test */
    public function authenticated_user_can_view_siswa_index()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get('/siswa');
        $response->assertStatus(200);
        $response->assertSee('Data Siswa');
    }

    /** @test */
    public function validation_fails_if_required_fields_are_missing()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->post('/siswa/create', []);
        $response->assertSessionHasErrors(['nis', 'nama_siswa', 'jenis_kelamin', 'kelas', 'komp_keahlian']);
    }

    /** @test */
    public function authorized_user_can_create_siswa()
    {
        $user = factory(User::class)->create();

        $payload = [
            'nis' => '12345678',
            'nama_siswa' => 'Budi Testing',
            'jenis_kelamin' => 'L',
            'kelas' => 'X RPL 1',
            'komp_keahlian' => 'Rekayasa Perangkat Lunak'
        ];

        $response = $this->actingAs($user)->post('/siswa/create', $payload);
        $response->assertRedirect('/siswa');
        $this->assertDatabaseHas('siswa', [
            'nis' => '12345678',
            'nama_siswa' => 'Budi Testing'
        ]);
    }

    /** @test */
    public function authorized_user_can_delete_siswa_via_delete_method()
    {
        $user = factory(User::class)->create();
        $siswa = Siswa::create([
            'nis' => '99999999',
            'nama_siswa' => 'Siswa Dihapus',
            'jenis_kelamin' => 'P',
            'kelas' => 'X TKJ 1',
            'komp_keahlian' => 'Teknik Komputer dan Jaringan'
        ]);

        $response = $this->actingAs($user)->delete('/siswa/' . $siswa->id);
        $response->assertRedirect('/siswa');
        $this->assertDatabaseMissing('siswa', ['id' => $siswa->id]);
    }

    /** @test */
    public function malicious_file_extension_upload_is_rejected()
    {
        $user = factory(User::class)->create();
        $fakePhp = UploadedFile::fake()->create('shell.php', 10, 'application/x-php');

        $payload = [
            'nis' => '88888888',
            'nama_siswa' => 'Hacker Test',
            'jenis_kelamin' => 'L',
            'kelas' => 'XII RPL',
            'komp_keahlian' => 'Rekayasa Perangkat Lunak',
            'avatar' => $fakePhp
        ];

        $response = $this->actingAs($user)->post('/siswa/create', $payload);
        $response->assertSessionHasErrors(['avatar']);
    }
}
