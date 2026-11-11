<?php

namespace App\Http\Controllers;

use App\Jurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class JurusanAdminController extends Controller
{
    /**
     * Display a listing of jurusan in admin panel.
     */
    public function index()
    {
        $jurusans = Jurusan::latest()->paginate(10);
        return view('jurusans.index', compact('jurusans'));
    }

    /**
     * Show form for creating a new jurusan.
     */
    public function create()
    {
        return view('jurusans.create');
    }

    /**
     * Store newly created jurusan.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_jurusan' => 'required|string|max:20|unique:jurusan,kode_jurusan',
            'nama_jurusan' => 'required|string|max:150',
            'deskripsi' => 'nullable|string',
            'visi_misi' => 'nullable|string',
            'prospek_kerja' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'icon' => 'nullable|string|max:50',
        ]);

        $data = [
            'kode_jurusan' => strtoupper($request->kode_jurusan),
            'nama_jurusan' => $request->nama_jurusan,
            'slug' => Str::slug($request->nama_jurusan),
            'deskripsi' => $request->deskripsi,
            'visi_misi' => $request->visi_misi,
            'prospek_kerja' => $request->prospek_kerja,
            'icon' => $request->icon ?? 'icon-line-check',
            'is_active' => $request->has('is_active'),
        ];

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = 'jur_' . strtolower($data['kode_jurusan']) . '_' . time() . '.' . $file->getClientOriginalExtension();
            $destination = public_path('images/jurusan');
            if (!file_exists($destination)) {
                mkdir($destination, 0755, true);
            }
            $file->move($destination, $filename);
            $data['gambar'] = $filename;
        }

        Jurusan::create($data);

        return redirect()->route('jurusans.index')->with('sukses', 'Jurusan baru berhasil ditambahkan');
    }

    /**
     * Show form for editing the jurusan.
     */
    public function edit($id)
    {
        $jurusan = Jurusan::findOrFail($id);
        return view('jurusans.edit', compact('jurusan'));
    }

    /**
     * Update specified jurusan.
     */
    public function update(Request $request, $id)
    {
        $jurusan = Jurusan::findOrFail($id);

        $request->validate([
            'kode_jurusan' => 'required|string|max:20|unique:jurusan,kode_jurusan,' . $jurusan->id,
            'nama_jurusan' => 'required|string|max:150',
            'deskripsi' => 'nullable|string',
            'visi_misi' => 'nullable|string',
            'prospek_kerja' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'icon' => 'nullable|string|max:50',
        ]);

        $data = [
            'kode_jurusan' => strtoupper($request->kode_jurusan),
            'nama_jurusan' => $request->nama_jurusan,
            'slug' => Str::slug($request->nama_jurusan),
            'deskripsi' => $request->deskripsi,
            'visi_misi' => $request->visi_misi,
            'prospek_kerja' => $request->prospek_kerja,
            'icon' => $request->icon ?? $jurusan->icon,
            'is_active' => $request->has('is_active'),
        ];

        if ($request->hasFile('gambar')) {
            if ($jurusan->gambar && file_exists(public_path('images/jurusan/' . $jurusan->gambar))) {
                @unlink(public_path('images/jurusan/' . $jurusan->gambar));
            }

            $file = $request->file('gambar');
            $filename = 'jur_' . strtolower($data['kode_jurusan']) . '_' . time() . '.' . $file->getClientOriginalExtension();
            $destination = public_path('images/jurusan');
            if (!file_exists($destination)) {
                mkdir($destination, 0755, true);
            }
            $file->move($destination, $filename);
            $data['gambar'] = $filename;
        }

        $jurusan->update($data);

        return redirect()->route('jurusans.index')->with('sukses', 'Data jurusan berhasil diperbarui');
    }

    /**
     * Delete specified jurusan.
     */
    public function destroy($id)
    {
        $jurusan = Jurusan::findOrFail($id);

        if ($jurusan->gambar && file_exists(public_path('images/jurusan/' . $jurusan->gambar))) {
            @unlink(public_path('images/jurusan/' . $jurusan->gambar));
        }

        $jurusan->delete();

        return redirect()->route('jurusans.index')->with('sukses', 'Jurusan berhasil dihapus');
    }
}
