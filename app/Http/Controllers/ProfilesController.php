<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    public function sejarah()
    {
        return view('sites.profiles.sejarah-singkat');
    }
    public function visi()
    {
        return view('sites.profiles.visimisi');
    }
    public function kepala()
    {
        return view('sites.profiles.kepsek');
    }
    public function organisasi()
    {
        return view('sites.profiles.organisasi');
    }
    public function prestasi()
    {
        return view('sites.profiles.prestasi');
    }
}
