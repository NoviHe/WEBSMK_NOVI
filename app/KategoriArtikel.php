<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KategoriArtikel extends Model
{
    protected $table = 'kategori_artikel';
    protected $fillable = ['nama_kategori', 'slug'];

    public function artikels()
    {
        return $this->hasMany(Artikel::class, 'kategori_id');
    }
}
