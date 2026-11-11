<?php

namespace App\Http\Controllers;

use App\Guru;
use App\Jurusan;
use App\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of classes.
     */
    public function index()
    {
        $kelasList = Kelas::with(['jurusan', 'waliKelas'])->latest()->paginate(15);
        $jurusans = Jurusan::where('is_active', true)->get();
        $gurus = Guru::all();

        return view('kelas.index', compact('kelasList', 'jurusans', 'gurus'));
    }

    /**
     * Store newly created class.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required|string|max:50|unique:kelas,nama_kelas',
            'tingkat' => 'required|integer|between:10,12',
            'jurusan_id' => 'nullable|exists:jurusan,id',
            'guru_id' => 'nullable|exists:guru,id',
            'tahun_ajaran' => 'required|string|max:20'
        ]);

        Kelas::create($request->all());

        return redirect()->route('kelas.index')->with('sukses', 'Data kelas berhasil ditambahkan');
    }

    /**
     * Show form for editing class.
     */
    public function edit($id)
    {
        $kelas = Kelas::findOrFail($id);
        $jurusans = Jurusan::where('is_active', true)->get();
        $gurus = Guru::all();

        return view('kelas.edit', compact('kelas', 'jurusans', 'gurus'));
    }

    /**
     * Update specified class.
     */
    public function update(Request $request, $id)
    {
        $kelas = Kelas::findOrFail($id);

        $request->validate([
            'nama_kelas' => 'required|string|max:50|unique:kelas,nama_kelas,' . $kelas->id,
            'tingkat' => 'required|integer|between:10,12',
            'jurusan_id' => 'nullable|exists:jurusan,id',
            'guru_id' => 'nullable|exists:guru,id',
            'tahun_ajaran' => 'required|string|max:20'
        ]);

        $kelas->update($request->all());

        return redirect()->route('kelas.index')->with('sukses', 'Data kelas berhasil diperbarui');
    }

    /**
     * Delete class.
     */
    public function destroy($id)
    {
        $kelas = Kelas::findOrFail($id);
        $kelas->delete();

        return redirect()->route('kelas.index')->with('sukses', 'Data kelas berhasil dihapus');
    }
}
