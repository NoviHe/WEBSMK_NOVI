<?php

namespace App\Http\Controllers;

use App\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of siswa.
     */
    public function index(Request $request)
    {
        if ($request->has('cari') && !empty($request->cari)) {
            $data_siswa = Siswa::where('nama_siswa', 'LIKE', '%' . $request->cari . '%')
                ->orWhere('nis', 'LIKE', '%' . $request->cari . '%')
                ->orWhere('komp_keahlian', 'LIKE', '%' . $request->cari . '%')
                ->latest()
                ->paginate(15);
        } else {
            $data_siswa = Siswa::latest()->paginate(15);
        }

        return view('siswa.index', ['data_siswa' => $data_siswa]);
    }

    /**
     * Store a newly created siswa in database.
     */
    public function create(Request $request)
    {
        $request->validate([
            'nis' => 'required|numeric|unique:siswa,nis',
            'nama_siswa' => 'required|string|max:100',
            'jenis_kelamin' => 'required|in:L,P',
            'kelas' => 'required|string|max:20',
            'komp_keahlian' => 'required|string|max:50',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->only(['nis', 'nama_siswa', 'jenis_kelamin', 'kelas', 'komp_keahlian']);

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $filename = 'avatar_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $data['avatar'] = $filename;
        }

        Siswa::create($data);

        return redirect('/siswa')->with('sukses', 'Data siswa berhasil ditambahkan');
    }

    /**
     * Show form for editing the specified siswa.
     */
    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        return view('siswa.edit', ['siswa' => $siswa]);
    }

    /**
     * Update the specified siswa in database.
     */
    public function update(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id);

        $request->validate([
            'nis' => 'required|numeric|unique:siswa,nis,' . $siswa->id,
            'nama_siswa' => 'required|string|max:100',
            'jenis_kelamin' => 'required|in:L,P',
            'kelas' => 'required|string|max:20',
            'komp_keahlian' => 'required|string|max:50',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->only(['nis', 'nama_siswa', 'jenis_kelamin', 'kelas', 'komp_keahlian']);

        if ($request->hasFile('avatar')) {
            // Delete old avatar if exists and not default
            if ($siswa->avatar && file_exists(public_path('images/' . $siswa->avatar))) {
                @unlink(public_path('images/' . $siswa->avatar));
            }

            $file = $request->file('avatar');
            $filename = 'avatar_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $data['avatar'] = $filename;
        }

        $siswa->update($data);

        return redirect('/siswa')->with('sukses', 'Data siswa berhasil diperbarui');
    }

    /**
     * Remove the specified siswa from database.
     */
    public function delete($id)
    {
        $siswa = Siswa::findOrFail($id);

        if ($siswa->avatar && file_exists(public_path('images/' . $siswa->avatar))) {
            @unlink(public_path('images/' . $siswa->avatar));
        }

        $siswa->delete();

        return redirect('/siswa')->with('sukses', 'Data siswa berhasil dihapus');
    }

    /**
     * Display the specified siswa profile.
     */
    public function profile($id)
    {
        $siswa = Siswa::with(['nilais.mapel', 'presensis'])->findOrFail($id);
        return view('siswa.profile', ['siswa' => $siswa]);
    }
}
