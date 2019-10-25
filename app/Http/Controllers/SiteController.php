<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function home()
    {
        return view('sites.home');
    }

    public function dataSiswa(Request $request)
    {
        $data_siswa = \App\Siswa::all();
        return view('sites.dataSiswa',['data_siswa'=> $data_siswa]);
    }
    
}

