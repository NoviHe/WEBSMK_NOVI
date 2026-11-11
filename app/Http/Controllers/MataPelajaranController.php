<?php

namespace App\Http\Controllers;

use App\Jurusan;
use App\MataPelajaran;
use Illuminate\Http\Request;

class MataPelajaranController extends Controller
{
    /**
     * Display a listing of subjects.
     */
    public function index()
    {
        $mapels = MataPelajaran::with('jurusan')->paginate(15);
        $jurusans = Jurusan::where('is_active', true)->get();

        return view('mapels.index', compact('mapels', 'jurusans'));
    }

    /**
     * Store newly created subject.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_mapel' => 'required|string|max:30|unique:mata_pelajaran,kode_mapel',
            'nama_mapel' => 'required|string|max:150',
            'jurusan_id' => 'nullable|exists:jurusan,id',
            'kelompok' => 'required|string|max:50',
            'kkm' => 'required|integer|between:0,100'
        ]);

        $data = $request->all();
        $data['kode_mapel'] = strtoupper($data['kode_mapel']);

        MataPelajaran::create($data);

        return redirect()->route('mapels.index')->with('sukses', 'Mata pelajaran berhasil ditambahkan');
    }

    /**
     * Show form for editing subject.
     */
    public function edit($id)
    {
        $mapel = MataPelajaran::findOrFail($id);
        $jurusans = Jurusan::where('is_active', true)->get();

        return view('mapels.edit', compact('mapel', 'jurusans'));
    }

    /**
     * Update specified subject.
     */
    public function update(Request $request, $id)
    {
        $mapel = MataPelajaran::findOrFail($id);

        $request->validate([
            'kode_mapel' => 'required|string|max:30|unique:mata_pelajaran,kode_mapel,' . $mapel->id,
            'nama_mapel' => 'required|string|max:150',
            'jurusan_id' => 'nullable|exists:jurusan,id',
            'kelompok' => 'required|string|max:50',
            'kkm' => 'required|integer|between:0,100'
        ]);

        $data = $request->all();
        $data['kode_mapel'] = strtoupper($data['kode_mapel']);

        $mapel->update($data);

        return redirect()->route('mapels.index')->with('sukses', 'Mata pelajaran berhasil diperbarui');
    }

    /**
     * Delete subject.
     */
    public function destroy($id)
    {
        $mapel = MataPelajaran::findOrFail($id);
        $mapel->delete();

        return redirect()->route('mapels.index')->with('sukses', 'Mata pelajaran berhasil dihapus');
    }
}
