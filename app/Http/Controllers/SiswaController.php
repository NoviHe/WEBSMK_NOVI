<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function Index(Request $request)
    {
        if ($request->has('cari')) {
            $data_siswa = \App\Siswa::where('nama_siswa','LIKE','%'.$request->cari.'%')->get();
        }else{
            $data_siswa = \App\Siswa::all();    
        }
    	return view('siswa.index',['data_siswa'=> $data_siswa]);
    }
    public function Create(Request $request)
    {
    	\App\Siswa::create($request->all());
    	return redirect('/siswa')->with('sukses','data berhasil di input');
    }
    public function edit($id)
    {
    	$siswa = \App\Siswa::find($id);
    	return view('siswa/edit',['siswa'=>$siswa]);
    }
    public function update(Request $request,$id)
    {
        // dd($request->all());
    	$siswa = \App\Siswa::find($id);
        $siswa->update($request->all());
        if ($request->hasFile('avatar')) {
            $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $siswa->save();
        }
    	return redirect('/siswa')->with('sukses','data berhasil di update');
    }
    public function delete($id)
    {
        $siswa = \App\Siswa::find($id);
        $siswa->delete();
        return redirect('/siswa')->with('sukses','data berhasil di delete');
    }
    public function Profile($id)
    {
        $siswa = \App\Siswa::find($id);
        return view('siswa.profile',['siswa'=>$siswa]);
    }
}

