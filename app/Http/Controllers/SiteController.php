<?php

namespace App\Http\Controllers;

use App\Artikel;
use App\Jurusan;
use App\Pengumuman;
use App\Siswa;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    /**
     * Home page with dynamic highlights.
     */
    public function home()
    {
        $jurusans = Jurusan::where('is_active', true)->get();
        $artikels = Artikel::where('status', 'published')->with('kategori')->latest('published_at')->take(4)->get();
        $pengumumans = Pengumuman::latest()->take(3)->get();
        $total_siswa = Siswa::count();
        $total_jurusan = Jurusan::where('is_active', true)->count();

        return view('sites.home', compact('jurusans', 'artikels', 'pengumumans', 'total_siswa', 'total_jurusan'));
    }

    /**
     * Public student directory.
     */
    public function dataSiswa(Request $request)
    {
        $query = Siswa::latest();

        if ($request->has('cari') && !empty($request->cari)) {
            $query->where('nama_siswa', 'LIKE', '%' . $request->cari . '%')
                  ->orWhere('nis', 'LIKE', '%' . $request->cari . '%')
                  ->orWhere('komp_keahlian', 'LIKE', '%' . $request->cari . '%');
        }

        $data_siswa = $query->paginate(20);

        return view('sites.dataSiswa', compact('data_siswa'));
    }

    /**
     * Public teachers directory.
     */
    public function dataGuru(Request $request)
    {
        $query = \App\Guru::latest();

        if ($request->has('cari') && !empty($request->cari)) {
            $query->where('nama_guru', 'LIKE', '%' . $request->cari . '%')
                  ->orWhere('bidang_studi', 'LIKE', '%' . $request->cari . '%');
        }

        $data_guru = $query->paginate(16);

        return view('sites.dataGuru', compact('data_guru'));
    }

    /**
     * List of published school articles.
     */
    public function berita(Request $request)
    {
        $query = Artikel::where('status', 'published')->with(['kategori', 'user'])->latest('published_at');

        if ($request->has('cari') && !empty($request->cari)) {
            $query->where('judul', 'LIKE', '%' . $request->cari . '%');
        }

        $artikels = $query->paginate(9);

        return view('sites.berita_index', compact('artikels'));
    }

    /**
     * Single article view with view counter.
     */
    public function detailBerita($slug)
    {
        $artikel = Artikel::where('slug', $slug)->where('status', 'published')->with(['kategori', 'user'])->firstOrFail();
        $artikel->increment('views_count');

        $artikel_terkait = Artikel::where('status', 'published')
            ->where('id', '!=', $artikel->id)
            ->latest('published_at')
            ->take(4)
            ->get();

        return view('sites.berita_detail', compact('artikel', 'artikel_terkait'));
    }

    /**
     * List of public announcements.
     */
    public function pengumuman()
    {
        $pengumumans = Pengumuman::latest()->paginate(10);
        return view('sites.pengumuman_index', compact('pengumumans'));
    }

    /**
     * Detail announcement view.
     */
    public function detailPengumuman($slug)
    {
        $pengumuman = Pengumuman::where('slug', $slug)->firstOrFail();
        return view('sites.pengumuman_detail', compact('pengumuman'));
    }
}
