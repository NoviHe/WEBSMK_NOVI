<?php

namespace App\Http\Controllers;

use App\Kelas;
use App\PresensiSiswa;
use App\Siswa;
use Illuminate\Http\Request;

class PresensiController extends Controller
{
    /**
     * Display a listing of presensi records.
     */
    public function index(Request $request)
    {
        $tanggal = $request->get('tanggal', now()->toDateString());
        $query = PresensiSiswa::with(['siswa', 'kelas'])->whereDate('tanggal', $tanggal)->latest();

        if ($request->has('kelas_id') && !empty($request->kelas_id)) {
            $query->where('kelas_id', $request->kelas_id);
        }

        $presensis = $query->paginate(20);
        $kelasList = Kelas::all();
        $siswas = Siswa::all();

        // Summary counts for the day
        $countHadir = PresensiSiswa::whereDate('tanggal', $tanggal)->where('status', 'Hadir')->count();
        $countSakit = PresensiSiswa::whereDate('tanggal', $tanggal)->where('status', 'Sakit')->count();
        $countIzin  = PresensiSiswa::whereDate('tanggal', $tanggal)->where('status', 'Izin')->count();
        $countAlpa  = PresensiSiswa::whereDate('tanggal', $tanggal)->where('status', 'Alpa')->count();

        return view('presensis.index', compact(
            'presensis', 'kelasList', 'siswas', 'tanggal',
            'countHadir', 'countSakit', 'countIzin', 'countAlpa'
        ));
    }

    /**
     * Store presensi for a student.
     */
    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswa,id',
            'kelas_id' => 'nullable|exists:kelas,id',
            'tanggal'  => 'required|date',
            'status'   => 'required|in:Hadir,Sakit,Izin,Alpa',
            'keterangan' => 'nullable|string|max:255'
        ]);

        PresensiSiswa::updateOrCreate(
            ['siswa_id' => $request->siswa_id, 'tanggal' => $request->tanggal],
            [
                'kelas_id' => $request->kelas_id,
                'status' => $request->status,
                'keterangan' => $request->keterangan
            ]
        );

        return redirect()->back()->with('sukses', 'Presensi siswa berhasil dicatat');
    }

    /**
     * Delete presensi record.
     */
    public function destroy($id)
    {
        $presensi = PresensiSiswa::findOrFail($id);
        $presensi->delete();

        return redirect()->back()->with('sukses', 'Catatan presensi berhasil dihapus');
    }
}
