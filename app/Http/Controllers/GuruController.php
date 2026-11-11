<?php

namespace App\Http\Controllers;

use App\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    /**
     * Display a listing of teachers.
     */
    public function index(Request $request)
    {
        $query = Guru::latest();

        if ($request->has('cari') && !empty($request->cari)) {
            $query->where('nama_guru', 'LIKE', '%' . $request->cari . '%')
                  ->orWhere('nip', 'LIKE', '%' . $request->cari . '%')
                  ->orWhere('bidang_studi', 'LIKE', '%' . $request->cari . '%');
        }

        $gurus = $query->paginate(15);

        return view('gurus.index', compact('gurus'));
    }

    /**
     * Show form for creating a new teacher.
     */
    public function create()
    {
        return view('gurus.create');
    }

    /**
     * Store newly created teacher.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'nullable|string|max:30|unique:guru,nip',
            'nama_guru' => 'required|string|max:150',
            'gelar' => 'nullable|string|max:50',
            'jenis_kelamin' => 'required|in:L,P',
            'bidang_studi' => 'nullable|string|max:100',
            'telepon' => 'nullable|string|max:25',
            'status_kepegawaian' => 'required|string|max:50',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);

        $data = $request->except(['foto', '_token']);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = 'guru_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $destination = public_path('images/guru');
            if (!file_exists($destination)) {
                mkdir($destination, 0755, true);
            }
            $file->move($destination, $filename);
            $data['foto'] = $filename;
        }

        Guru::create($data);

        return redirect()->route('gurus.index')->with('sukses', 'Data guru berhasil ditambahkan');
    }

    /**
     * Show form for editing teacher.
     */
    public function edit($id)
    {
        $guru = Guru::findOrFail($id);
        return view('gurus.edit', compact('guru'));
    }

    /**
     * Update specified teacher.
     */
    public function update(Request $request, $id)
    {
        $guru = Guru::findOrFail($id);

        $request->validate([
            'nip' => 'nullable|string|max:30|unique:guru,nip,' . $guru->id,
            'nama_guru' => 'required|string|max:150',
            'gelar' => 'nullable|string|max:50',
            'jenis_kelamin' => 'required|in:L,P',
            'bidang_studi' => 'nullable|string|max:100',
            'telepon' => 'nullable|string|max:25',
            'status_kepegawaian' => 'required|string|max:50',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);

        $data = $request->except(['foto', '_token', '_method']);

        if ($request->hasFile('foto')) {
            if ($guru->foto && file_exists(public_path('images/guru/' . $guru->foto))) {
                @unlink(public_path('images/guru/' . $guru->foto));
            }

            $file = $request->file('foto');
            $filename = 'guru_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $destination = public_path('images/guru');
            if (!file_exists($destination)) {
                mkdir($destination, 0755, true);
            }
            $file->move($destination, $filename);
            $data['foto'] = $filename;
        }

        $guru->update($data);

        return redirect()->route('gurus.index')->with('sukses', 'Data guru berhasil diperbarui');
    }

    /**
     * Delete teacher.
     */
    public function destroy($id)
    {
        $guru = Guru::findOrFail($id);

        if ($guru->foto && file_exists(public_path('images/guru/' . $guru->foto))) {
            @unlink(public_path('images/guru/' . $guru->foto));
        }

        $guru->delete();

        return redirect()->route('gurus.index')->with('sukses', 'Data guru berhasil dihapus');
    }
}
