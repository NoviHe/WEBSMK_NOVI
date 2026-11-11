<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NilaiSiswa extends Model
{
    protected $table = 'nilai_siswa';
    protected $fillable = [
        'siswa_id',
        'mapel_id',
        'semester',
        'tahun_ajaran',
        'nilai_tugas',
        'nilai_uts',
        'nilai_uas',
        'nilai_akhir',
        'predikat'
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }

    public function mapel()
    {
        return $this->belongsTo(MataPelajaran::class, 'mapel_id');
    }

    /**
     * Compute final grade and predicate automatically.
     */
    public static function calculateGrade($tugas, $uts, $uas)
    {
        // Bobot: Tugas 30%, UTS 30%, UAS 40%
        $akhir = ($tugas * 0.3) + ($uts * 0.3) + ($uas * 0.4);

        if ($akhir >= 90) {
            $predikat = 'A';
        } elseif ($akhir >= 80) {
            $predikat = 'B';
        } elseif ($akhir >= 70) {
            $predikat = 'C';
        } else {
            $predikat = 'D';
        }

        return [
            'nilai_akhir' => round($akhir, 2),
            'predikat' => $predikat
        ];
    }
}
