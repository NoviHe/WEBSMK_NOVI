@extends('layouts.master')
@section('title', 'Manajemen Berita & Artikel')
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
                            <h3 class="panel-title">Daftar Berita & Artikel Sekolah</h3>
                            <div class="right">
                                <a href="{{route('artikels.create')}}" class="btn btn-primary btn-sm"><i class="lnr lnr-plus-circle"></i> Buat Berita Baru</a>
                            </div>
                        </div>

                        <div class="panel-body">
                            <form action="{{route('artikels.index')}}" method="GET" class="form-inline" style="margin-bottom: 20px;">
                                <div class="form-group">
                                    <input type="text" name="cari" class="form-control" placeholder="Cari judul..." value="{{request('cari')}}">
                                </div>
                                <div class="form-group">
                                    <select name="kategori" class="form-control">
                                        <option value="">Semua Kategori</option>
                                        @foreach($kategoris as $kat)
                                            <option value="{{$kat->id}}" {{request('kategori') == $kat->id ? 'selected' : ''}}>{{$kat->nama_kategori}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i> Filter</button>
                            </form>

                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>THUMBNAIL</th>
                                            <th>JUDUL</th>
                                            <th>KATEGORI</th>
                                            <th>PENULIS</th>
                                            <th>STATUS</th>
                                            <th>DIBACA</th>
                                            <th>TANGGAL</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($artikels as $art)
                                        <tr>
                                            <td>
                                                <img src="{{$art->getThumbnail()}}" width="50" height="40" style="object-fit: cover; border-radius: 4px;">
                                            </td>
                                            <td>
                                                <strong><a href="{{route('berita.detail', $art->slug)}}" target="_blank">{{$art->judul}}</a></strong>
                                            </td>
                                            <td><span class="label label-info">{{$art->kategori ? $art->kategori->nama_kategori : 'Umum'}}</span></td>
                                            <td>{{$art->user ? $art->user->name : 'Admin'}}</td>
                                            <td>
                                                @if($art->status === 'published')
                                                    <span class="label label-success">Terbit</span>
                                                @else
                                                    <span class="label label-default">Draft</span>
                                                @endif
                                            </td>
                                            <td>{{$art->views_count}}x</td>
                                            <td>{{$art->created_at->format('d M Y')}}</td>
                                            <td>
                                                <a href="{{route('artikels.edit', $art->id)}}" class="btn btn-warning btn-sm">Edit</a>
                                                <form action="{{route('artikels.destroy', $art->id)}}" method="POST" style="display:inline-block;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus artikel ini?')">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="8" class="text-center text-muted">Belum ada artikel yang ditambahkan.</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="pull-right">
                                {{$artikels->appends(request()->input())->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
