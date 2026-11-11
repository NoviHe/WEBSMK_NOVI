<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected $table = 'jurusan';
    protected $fillable = [
        'kode_jurusan',
        'nama_jurusan',
        'slug',
        'deskripsi',
        'visi_misi',
        'prospek_kerja',
        'gambar',
        'icon',
        'is_active'
    ];

    public function getGambar()
    {
        if (!$this->gambar || !file_exists(public_path('images/jurusan/' . $this->gambar))) {
            return asset('frontend/images/team/smk.jpg');
        }
        return asset('images/jurusan/' . $this->gambar);
    }
}
