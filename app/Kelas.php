<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'kelas';
    protected $fillable = [
        'jurusan_id',
        'guru_id',
        'tingkat',
        'nama_kelas',
        'tahun_ajaran'
    ];

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'jurusan_id');
    }

    public function waliKelas()
    {
        return $this->belongsTo(Guru::class, 'guru_id');
    }

    public function presensis()
    {
        return $this->hasMany(PresensiSiswa::class, 'kelas_id');
    }
}
