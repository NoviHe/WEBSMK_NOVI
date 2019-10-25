<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JurusanController extends Controller
{
    public function rpl()
    {
        return view('sites.jurusan.rpl');
    }
    public function tkj()
    {
        return view('sites.jurusan.tkj');
    }
    public function mm()
    {
        return view('sites.jurusan.mm');
    }
    public function upw()
    {
        return view('sites.jurusan.upw');
    }
    public function tein()
    {
        return view('sites.jurusan.tein');
    }
    public function tkr()
    {
        return view('sites.jurusan.tkr');
    }
    public function tpmp()
    {
        return view('sites.jurusan.tpmp');
    }
    public function gp()
    {
        return view('sites.jurusan.gp');
    }
}
