<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $table = 'artikel';
    protected $fillable = [
        'user_id',
        'kategori_id',
        'judul',
        'slug',
        'konten',
        'thumbnail',
        'status',
        'views_count',
        'published_at'
    ];

    protected $dates = ['published_at'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function kategori()
    {
        return $this->belongsTo(KategoriArtikel::class, 'kategori_id');
    }

    public function getThumbnail()
    {
        if (!$this->thumbnail || !file_exists(public_path('images/berita/' . $this->thumbnail))) {
            return asset('frontend/images/magazine/1.jpg');
        }
        return asset('images/berita/' . $this->thumbnail);
    }
}
