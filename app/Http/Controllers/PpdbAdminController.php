<?php

namespace App\Http\Controllers;

use App\Jurusan;
use App\PpdbPendaftaran;
use Illuminate\Http\Request;

class PpdbAdminController extends Controller
{
    /**
     * Display a listing of PPDB applicants in admin panel.
     */
    public function index(Request $request)
    {
        $query = PpdbPendaftaran::with(['pilihan1', 'pilihan2'])->latest();

        if ($request->has('cari') && !empty($request->cari)) {
            $query->where('nama_lengkap', 'LIKE', '%' . $request->cari . '%')
                  ->orWhere('nomor_pendaftaran', 'LIKE', '%' . $request->cari . '%')
                  ->orWhere('nisn', 'LIKE', '%' . $request->cari . '%')
                  ->orWhere('asal_sekolah', 'LIKE', '%' . $request->cari . '%');
        }

        if ($request->has('status') && !empty($request->status)) {
            $query->where('status_pendaftaran', $request->status);
        }

        if ($request->has('jurusan_id') && !empty($request->jurusan_id)) {
            $query->where('jurusan_id_1', $request->jurusan_id);
        }

        $pendaftars = $query->paginate(15);
        $jurusans = Jurusan::where('is_active', true)->get();

        $countMenunggu = PpdbPendaftaran::where('status_pendaftaran', 'Menunggu Verifikasi')->count();
        $countDiterima = PpdbPendaftaran::where('status_pendaftaran', 'Diterima')->count();
        $countDitolak  = PpdbPendaftaran::where('status_pendaftaran', 'Ditolak')->count();

        return view('ppdb.index', compact('pendaftars', 'jurusans', 'countMenunggu', 'countDiterima', 'countDitolak'));
    }

    /**
     * Display detailed applicant profile & documents.
     */
    public function show($id)
    {
        $pendaftar = PpdbPendaftaran::with(['pilihan1', 'pilihan2'])->findOrFail($id);
        return view('ppdb.show', compact('pendaftar'));
    }

    /**
     * Verify or update application status.
     */
    public function verifikasi(Request $request, $id)
    {
        $pendaftar = PpdbPendaftaran::findOrFail($id);

        $request->validate([
            'status_pendaftaran' => 'required|in:Menunggu Verifikasi,Diverifikasi,Diterima,Ditolak',
            'catatan_verifikasi' => 'nullable|string'
        ]);

        $pendaftar->update([
            'status_pendaftaran' => $request->status_pendaftaran,
            'catatan_verifikasi' => $request->catatan_verifikasi,
        ]);

        return redirect()->back()->with('sukses', 'Status pendaftaran calon siswa berhasil diperbarui');
    }

    /**
     * Delete applicant record.
     */
    public function destroy($id)
    {
        $pendaftar = PpdbPendaftaran::findOrFail($id);

        // Delete uploaded docs
        $files = [$pendaftar->berkas_ijazah, $pendaftar->berkas_kk, $pendaftar->berkas_akta];
        foreach ($files as $file) {
            if ($file && file_exists(public_path('files/ppdb/' . $file))) {
                @unlink(public_path('files/ppdb/' . $file));
            }
        }

        $pendaftar->delete();

        return redirect()->route('admin.ppdb.index')->with('sukses', 'Data pendaftar PPDB berhasil dihapus');
    }
}
