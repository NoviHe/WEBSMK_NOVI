<?php

namespace App\Http\Controllers;

use App\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    /**
     * Dynamic major view or fallback to dedicated custom view.
     */
    public function show($slug)
    {
        $jurusan = Jurusan::where('slug', $slug)->firstOrFail();
        $code = strtolower($jurusan->kode_jurusan);

        if (view()->exists("sites.jurusan.{$code}")) {
            return view("sites.jurusan.{$code}", compact('jurusan'));
        }

        return view('sites.jurusan.detail', compact('jurusan'));
    }

    public function rpl()
    {
        $jurusan = Jurusan::where('kode_jurusan', 'RPL')->first();
        return view('sites.jurusan.rpl', compact('jurusan'));
    }

    public function tkj()
    {
        $jurusan = Jurusan::where('kode_jurusan', 'TKJ')->first();
        return view('sites.jurusan.tkj', compact('jurusan'));
    }

    public function mm()
    {
        $jurusan = Jurusan::where('kode_jurusan', 'MM')->first();
        return view('sites.jurusan.mm', compact('jurusan'));
    }

    public function upw()
    {
        $jurusan = Jurusan::where('kode_jurusan', 'UPW')->first();
        return view('sites.jurusan.upw', compact('jurusan'));
    }

    public function tein()
    {
        $jurusan = Jurusan::where('kode_jurusan', 'TEIN')->first();
        return view('sites.jurusan.tein', compact('jurusan'));
    }

    public function tkr()
    {
        $jurusan = Jurusan::where('kode_jurusan', 'TKR')->first();
        return view('sites.jurusan.tkr', compact('jurusan'));
    }

    public function tpmp()
    {
        $jurusan = Jurusan::where('kode_jurusan', 'TPMP')->first();
        return view('sites.jurusan.tpmp', compact('jurusan'));
    }

    public function gp()
    {
        $jurusan = Jurusan::where('kode_jurusan', 'GP')->first();
        return view('sites.jurusan.gp', compact('jurusan'));
    }
}
