@extends('layouts.master')
@section('title', 'Manajemen Jurusan')
@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        @if(session('sukses'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <i class="fa fa-check-circle"></i> {{session('sukses')}}
                        </div>
                        @endif

                        <div class="panel-heading">
                            <h3 class="panel-title">Kompetensi Keahlian / Jurusan SMKN 1 Padaherang</h3>
                            <div class="right">
                                <a href="{{route('jurusans.create')}}" class="btn btn-primary btn-sm"><i class="lnr lnr-plus-circle"></i> Tambah Jurusan Baru</a>
                            </div>
                        </div>

                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>GAMBAR</th>
                                            <th>KODE</th>
                                            <th>NAMA KOMPETENSI KEAHLIAN</th>
                                            <th>ICON</th>
                                            <th>STATUS</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($jurusans as $j)
                                        <tr>
                                            <td>
                                                <img src="{{$j->getGambar()}}" width="60" height="40" style="object-fit: cover; border-radius: 4px;">
                                            </td>
                                            <td><span class="label label-primary">{{$j->kode_jurusan}}</span></td>
                                            <td>
                                                <strong><a href="{{route('jurusan.show', $j->slug)}}" target="_blank">{{$j->nama_jurusan}}</a></strong>
                                            </td>
                                            <td><code>{{$j->icon}}</code></td>
                                            <td>
                                                @if($j->is_active)
                                                    <span class="label label-success">Aktif</span>
                                                @else
                                                    <span class="label label-default">Nonaktif</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{route('jurusans.edit', $j->id)}}" class="btn btn-warning btn-sm">Edit</a>
                                                <form action="{{route('jurusans.destroy', $j->id)}}" method="POST" style="display:inline-block;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus jurusan ini?')">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="6" class="text-center text-muted">Belum ada jurusan yang terdaftar.</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="pull-right">
                                {{$jurusans->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
