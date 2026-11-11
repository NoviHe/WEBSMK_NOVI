<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';
    protected $fillable = ['nis', 'nama_siswa', 'jenis_kelamin', 'kelas', 'komp_keahlian', 'avatar'];

    /**
     * Get avatar url or fallback to default.
     *
     * @return string
     */
    public function getAvatar()
    {
        if (!$this->avatar || !file_exists(public_path('images/' . $this->avatar))) {
            return asset('images/default.png');
        }
        return asset('images/' . $this->avatar);
    }

    public function presensis()
    {
        return $this->hasMany(PresensiSiswa::class, 'siswa_id');
    }

    public function nilais()
    {
        return $this->hasMany(NilaiSiswa::class, 'siswa_id');
    }
}
