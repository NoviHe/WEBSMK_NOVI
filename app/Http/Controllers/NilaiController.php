<?php

namespace App\Http\Controllers;

use App\MataPelajaran;
use App\NilaiSiswa;
use App\Siswa;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    /**
     * Display a listing of grades or transcript view.
     */
    public function index(Request $request)
    {
        $query = NilaiSiswa::with(['siswa', 'mapel'])->latest();

        if ($request->has('siswa_id') && !empty($request->siswa_id)) {
            $query->where('siswa_id', $request->siswa_id);
        }

        if ($request->has('semester') && !empty($request->semester)) {
            $query->where('semester', $request->semester);
        }

        $nilais = $query->paginate(20);
        $siswas = Siswa::all();
        $mapels = MataPelajaran::all();

        return view('nilais.index', compact('nilais', 'siswas', 'mapels'));
    }

    /**
     * Store or update grade record with auto calculation.
     */
    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswa,id',
            'mapel_id' => 'required|exists:mata_pelajaran,id',
            'semester' => 'required|in:Ganjil,Genap',
            'tahun_ajaran' => 'required|string|max:20',
            'nilai_tugas' => 'required|numeric|between:0,100',
            'nilai_uts' => 'required|numeric|between:0,100',
            'nilai_uas' => 'required|numeric|between:0,100',
        ]);

        $calc = NilaiSiswa::calculateGrade(
            $request->nilai_tugas,
            $request->nilai_uts,
            $request->nilai_uas
        );

        NilaiSiswa::updateOrCreate(
            [
                'siswa_id' => $request->siswa_id,
                'mapel_id' => $request->mapel_id,
                'semester' => $request->semester,
                'tahun_ajaran' => $request->tahun_ajaran,
            ],
            [
                'nilai_tugas' => $request->nilai_tugas,
                'nilai_uts'   => $request->nilai_uts,
                'nilai_uas'   => $request->nilai_uas,
                'nilai_akhir' => $calc['nilai_akhir'],
                'predikat'    => $calc['predikat'],
            ]
        );

        return redirect()->route('nilais.index')->with('sukses', 'Nilai akademik siswa berhasil disimpan & dikalkulasi');
    }

    /**
     * View complete student academic report card / transcript.
     */
    public function transkrip($siswa_id)
    {
        $siswa = Siswa::with(['nilais.mapel', 'presensis'])->findOrFail($siswa_id);
        $nilais = $siswa->nilais;

        $rata_rata = $nilais->avg('nilai_akhir') ?? 0;
        $total_hadir = $siswa->presensis()->where('status', 'Hadir')->count();
        $total_sakit = $siswa->presensis()->where('status', 'Sakit')->count();
        $total_izin  = $siswa->presensis()->where('status', 'Izin')->count();
        $total_alpa  = $siswa->presensis()->where('status', 'Alpa')->count();

        return view('nilais.transkrip', compact(
            'siswa', 'nilais', 'rata_rata',
            'total_hadir', 'total_sakit', 'total_izin', 'total_alpa'
        ));
    }

    /**
     * Delete grade record.
     */
    public function destroy($id)
    {
        $nilai = NilaiSiswa::findOrFail($id);
        $nilai->delete();

        return redirect()->route('nilais.index')->with('sukses', 'Data nilai berhasil dihapus');
    }
}
