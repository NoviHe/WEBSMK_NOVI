<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PpdbPendaftaran extends Model
{
    protected $table = 'ppdb_pendaftaran';

    protected $fillable = [
        'nomor_pendaftaran',
        'nisn',
        'nik',
        'nama_lengkap',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'asal_sekolah',
        'jurusan_id_1',
        'jurusan_id_2',
        'nama_wali',
        'nomor_wa_wali',
        'alamat_lengkap',
        'berkas_ijazah',
        'berkas_kk',
        'berkas_akta',
        'status_pendaftaran',
        'catatan_verifikasi'
    ];

    protected $dates = ['tanggal_lahir'];

    public function pilihan1()
    {
        return $this->belongsTo(Jurusan::class, 'jurusan_id_1');
    }

    public function pilihan2()
    {
        return $this->belongsTo(Jurusan::class, 'jurusan_id_2');
    }

    /**
     * Generate unique registration number.
     */
    public static function generateNomor()
    {
        $year = date('Y');
        $random = strtoupper(substr(uniqid(), -5));
        return 'PPDB-' . $year . '-' . $random;
    }
}
