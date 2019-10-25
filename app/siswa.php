<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    Protected $table = 'siswa';
    Protected $fillable = ['nis','nama_siswa','jenis_kelamin','kelas','komp_keahlian','avatar'];

    public function getAvatar()
    {
        if (!$this->avatar) {
            return asset('images/default.png');
        }
        return asset('images/'.$this->avatar);
    }
}
