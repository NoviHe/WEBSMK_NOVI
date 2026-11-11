<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MataPelajaran extends Model
{
    protected $table = 'mata_pelajaran';
    protected $fillable = [
        'kode_mapel',
        'nama_mapel',
        'jurusan_id',
        'kelompok',
        'kkm'
    ];

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'jurusan_id');
    }

    public function nilais()
    {
        return $this->hasMany(NilaiSiswa::class, 'mapel_id');
    }
}
