<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    protected $table = 'pengumuman';
    protected $fillable = [
        'user_id',
        'judul',
        'slug',
        'isi_pengumuman',
        'berkas_lampiran',
        'target_audiens',
        'is_urgent',
        'tanggal_berakhir'
    ];

    protected $dates = ['tanggal_berakhir'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
