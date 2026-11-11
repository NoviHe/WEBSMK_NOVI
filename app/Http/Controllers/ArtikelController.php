<?php

namespace App\Http\Controllers;

use App\Artikel;
use App\KategoriArtikel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArtikelController extends Controller
{
    /**
     * Display a listing of articles for admin.
     */
    public function index(Request $request)
    {
        $query = Artikel::with(['user', 'kategori'])->latest();

        if ($request->has('cari') && !empty($request->cari)) {
            $query->where('judul', 'LIKE', '%' . $request->cari . '%');
        }

        if ($request->has('kategori') && !empty($request->kategori)) {
            $query->where('kategori_id', $request->kategori);
        }

        $artikels = $query->paginate(10);
        $kategoris = KategoriArtikel::all();

        return view('artikels.index', compact('artikels', 'kategoris'));
    }

    /**
     * Show form for creating a new article.
     */
    public function create()
    {
        $kategoris = KategoriArtikel::all();
        return view('artikels.create', compact('kategoris'));
    }

    /**
     * Store newly created article.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori_id' => 'nullable|exists:kategori_artikel,id',
            'konten' => 'required|string',
            'status' => 'required|in:draft,published',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);

        $slug = Str::slug($request->judul);
        $count = Artikel::where('slug', 'LIKE', "{$slug}%")->count();
        if ($count > 0) {
            $slug .= '-' . ($count + 1);
        }

        $data = [
            'user_id' => auth()->id() ?? 1,
            'kategori_id' => $request->kategori_id,
            'judul' => $request->judul,
            'slug' => $slug,
            'konten' => $request->konten,
            'status' => $request->status,
            'published_at' => $request->status === 'published' ? now() : null,
        ];

        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $filename = 'art_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $destination = public_path('images/berita');
            if (!file_exists($destination)) {
                mkdir($destination, 0755, true);
            }
            $file->move($destination, $filename);
            $data['thumbnail'] = $filename;
        }

        Artikel::create($data);

        return redirect()->route('artikels.index')->with('sukses', 'Artikel berhasil diterbitkan');
    }

    /**
     * Show form for editing the article.
     */
    public function edit($id)
    {
        $artikel = Artikel::findOrFail($id);
        $kategoris = KategoriArtikel::all();
        return view('artikels.edit', compact('artikel', 'kategoris'));
    }

    /**
     * Update specified article.
     */
    public function update(Request $request, $id)
    {
        $artikel = Artikel::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori_id' => 'nullable|exists:kategori_artikel,id',
            'konten' => 'required|string',
            'status' => 'required|in:draft,published',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);

        $data = [
            'kategori_id' => $request->kategori_id,
            'judul' => $request->judul,
            'konten' => $request->konten,
            'status' => $request->status,
        ];

        if ($artikel->judul !== $request->judul) {
            $slug = Str::slug($request->judul);
            $count = Artikel::where('slug', 'LIKE', "{$slug}%")->where('id', '!=', $id)->count();
            if ($count > 0) {
                $slug .= '-' . ($count + 1);
            }
            $data['slug'] = $slug;
        }

        if ($request->status === 'published' && !$artikel->published_at) {
            $data['published_at'] = now();
        }

        if ($request->hasFile('thumbnail')) {
            if ($artikel->thumbnail && file_exists(public_path('images/berita/' . $artikel->thumbnail))) {
                @unlink(public_path('images/berita/' . $artikel->thumbnail));
            }

            $file = $request->file('thumbnail');
            $filename = 'art_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $destination = public_path('images/berita');
            if (!file_exists($destination)) {
                mkdir($destination, 0755, true);
            }
            $file->move($destination, $filename);
            $data['thumbnail'] = $filename;
        }

        $artikel->update($data);

        return redirect()->route('artikels.index')->with('sukses', 'Artikel berhasil diperbarui');
    }

    /**
     * Delete specified article.
     */
    public function destroy($id)
    {
        $artikel = Artikel::findOrFail($id);

        if ($artikel->thumbnail && file_exists(public_path('images/berita/' . $artikel->thumbnail))) {
            @unlink(public_path('images/berita/' . $artikel->thumbnail));
        }

        $artikel->delete();

        return redirect()->route('artikels.index')->with('sukses', 'Artikel berhasil dihapus');
    }
}
