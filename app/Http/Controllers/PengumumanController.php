<?php

namespace App\Http\Controllers;

use App\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PengumumanController extends Controller
{
    /**
     * Display a listing of announcements.
     */
    public function index(Request $request)
    {
        $query = Pengumuman::with('user')->latest();

        if ($request->has('cari') && !empty($request->cari)) {
            $query->where('judul', 'LIKE', '%' . $request->cari . '%');
        }

        $pengumumans = $query->paginate(10);

        return view('pengumumans.index', compact('pengumumans'));
    }

    /**
     * Show form for creating a new announcement.
     */
    public function create()
    {
        return view('pengumumans.create');
    }

    /**
     * Store newly created announcement.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi_pengumuman' => 'required|string',
            'target_audiens' => 'required|in:semua,siswa,guru,wali',
            'tanggal_berakhir' => 'nullable|date',
            'is_urgent' => 'nullable|boolean',
            'berkas_lampiran' => 'nullable|file|mimes:pdf,doc,docx,zip|max:5120'
        ]);

        $slug = Str::slug($request->judul);
        $count = Pengumuman::where('slug', 'LIKE', "{$slug}%")->count();
        if ($count > 0) {
            $slug .= '-' . ($count + 1);
        }

        $data = [
            'user_id' => auth()->id() ?? 1,
            'judul' => $request->judul,
            'slug' => $slug,
            'isi_pengumuman' => $request->isi_pengumuman,
            'target_audiens' => $request->target_audiens,
            'is_urgent' => $request->has('is_urgent'),
            'tanggal_berakhir' => $request->tanggal_berakhir,
        ];

        if ($request->hasFile('berkas_lampiran')) {
            $file = $request->file('berkas_lampiran');
            $filename = 'doc_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $destination = public_path('files/pengumuman');
            if (!file_exists($destination)) {
                mkdir($destination, 0755, true);
            }
            $file->move($destination, $filename);
            $data['berkas_lampiran'] = $filename;
        }

        Pengumuman::create($data);

        return redirect()->route('pengumumans.index')->with('sukses', 'Pengumuman berhasil dipublikasikan');
    }

    /**
     * Show form for editing the announcement.
     */
    public function edit($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);
        return view('pengumumans.edit', compact('pengumuman'));
    }

    /**
     * Update specified announcement.
     */
    public function update(Request $request, $id)
    {
        $pengumuman = Pengumuman::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:255',
            'isi_pengumuman' => 'required|string',
            'target_audiens' => 'required|in:semua,siswa,guru,wali',
            'tanggal_berakhir' => 'nullable|date',
            'is_urgent' => 'nullable|boolean',
            'berkas_lampiran' => 'nullable|file|mimes:pdf,doc,docx,zip|max:5120'
        ]);

        $data = [
            'judul' => $request->judul,
            'isi_pengumuman' => $request->isi_pengumuman,
            'target_audiens' => $request->target_audiens,
            'is_urgent' => $request->has('is_urgent'),
            'tanggal_berakhir' => $request->tanggal_berakhir,
        ];

        if ($pengumuman->judul !== $request->judul) {
            $slug = Str::slug($request->judul);
            $count = Pengumuman::where('slug', 'LIKE', "{$slug}%")->where('id', '!=', $id)->count();
            if ($count > 0) {
                $slug .= '-' . ($count + 1);
            }
            $data['slug'] = $slug;
        }

        if ($request->hasFile('berkas_lampiran')) {
            if ($pengumuman->berkas_lampiran && file_exists(public_path('files/pengumuman/' . $pengumuman->berkas_lampiran))) {
                @unlink(public_path('files/pengumuman/' . $pengumuman->berkas_lampiran));
            }

            $file = $request->file('berkas_lampiran');
            $filename = 'doc_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $destination = public_path('files/pengumuman');
            if (!file_exists($destination)) {
                mkdir($destination, 0755, true);
            }
            $file->move($destination, $filename);
            $data['berkas_lampiran'] = $filename;
        }

        $pengumuman->update($data);

        return redirect()->route('pengumumans.index')->with('sukses', 'Pengumuman berhasil diperbarui');
    }

    /**
     * Delete specified announcement.
     */
    public function destroy($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);

        if ($pengumuman->berkas_lampiran && file_exists(public_path('files/pengumuman/' . $pengumuman->berkas_lampiran))) {
            @unlink(public_path('files/pengumuman/' . $pengumuman->berkas_lampiran));
        }

        $pengumuman->delete();

        return redirect()->route('pengumumans.index')->with('sukses', 'Pengumuman berhasil dihapus');
    }
}
