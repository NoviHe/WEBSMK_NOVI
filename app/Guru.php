<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $table = 'guru';
    protected $fillable = [
        'user_id',
        'nip',
        'nama_guru',
        'gelar',
        'jenis_kelamin',
        'bidang_studi',
        'telepon',
        'foto',
        'status_kepegawaian'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getFoto()
    {
        if (!$this->foto || !file_exists(public_path('images/guru/' . $this->foto))) {
            return asset('frontend/images/team/uk.jpg');
        }
        return asset('images/guru/' . $this->foto);
    }

    public function kelasBinaan()
    {
        return $this->hasMany(Kelas::class, 'guru_id');
    }
}
