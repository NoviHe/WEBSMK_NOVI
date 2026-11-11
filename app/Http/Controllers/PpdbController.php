<?php

namespace App\Http\Controllers;

use App\Jurusan;
use App\PpdbPendaftaran;
use Illuminate\Http\Request;

class PpdbController extends Controller
{
    /**
     * PPDB information and procedure guide.
     */
    public function info()
    {
        $jurusans = Jurusan::where('is_active', true)->get();
        $totalPendaftar = PpdbPendaftaran::count();
        return view('sites.ppdb.info', compact('jurusans', 'totalPendaftar'));
    }

    /**
     * Show registration form.
     */
    public function daftar()
    {
        $jurusans = Jurusan::where('is_active', true)->get();
        return view('sites.ppdb.daftar', compact('jurusans'));
    }

    /**
     * Store new student registration.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nisn' => 'required|numeric|digits_between:8,15|unique:ppdb_pendaftaran,nisn',
            'nik' => 'nullable|numeric|digits_between:15,20',
            'nama_lengkap' => 'required|string|max:150',
            'jenis_kelamin' => 'required|in:L,P',
            'tempat_lahir' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'asal_sekolah' => 'required|string|max:150',
            'jurusan_id_1' => 'required|exists:jurusan,id',
            'jurusan_id_2' => 'nullable|exists:jurusan,id|different:jurusan_id_1',
            'nama_wali' => 'required|string|max:150',
            'nomor_wa_wali' => 'required|string|max:25',
            'alamat_lengkap' => 'required|string',
            'berkas_ijazah' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'berkas_kk' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'berkas_akta' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $data = $request->except(['berkas_ijazah', 'berkas_kk', 'berkas_akta', '_token']);
        $data['nomor_pendaftaran'] = PpdbPendaftaran::generateNomor();
        $data['status_pendaftaran'] = 'Menunggu Verifikasi';

        $destination = public_path('files/ppdb');
        if (!file_exists($destination)) {
            mkdir($destination, 0755, true);
        }

        if ($request->hasFile('berkas_ijazah')) {
            $file = $request->file('berkas_ijazah');
            $filename = 'ijazah_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move($destination, $filename);
            $data['berkas_ijazah'] = $filename;
        }

        if ($request->hasFile('berkas_kk')) {
            $file = $request->file('berkas_kk');
            $filename = 'kk_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move($destination, $filename);
            $data['berkas_kk'] = $filename;
        }

        if ($request->hasFile('berkas_akta')) {
            $file = $request->file('berkas_akta');
            $filename = 'akta_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move($destination, $filename);
            $data['berkas_akta'] = $filename;
        }

        $pendaftar = PpdbPendaftaran::create($data);

        return redirect()->route('ppdb.bukti', $pendaftar->nomor_pendaftaran)
            ->with('sukses', 'Pendaftaran PPDB berhasil dikirim! Silakan simpan dan cetak bukti pendaftaran Anda.');
    }

    /**
     * Check registration status.
     */
    public function cekStatus(Request $request)
    {
        $hasil = null;
        if ($request->has('keyword') && !empty($request->keyword)) {
            $keyword = trim($request->keyword);
            $hasil = PpdbPendaftaran::with(['pilihan1', 'pilihan2'])
                ->where('nomor_pendaftaran', $keyword)
                ->orWhere('nisn', $keyword)
                ->first();
        }

        return view('sites.ppdb.cek_status', compact('hasil'));
    }

    /**
     * Printable registration receipt.
     */
    public function bukti($nomor)
    {
        $pendaftar = PpdbPendaftaran::with(['pilihan1', 'pilihan2'])
            ->where('nomor_pendaftaran', $nomor)
            ->firstOrFail();

        return view('sites.ppdb.bukti_pendaftaran', compact('pendaftar'));
    }
}
