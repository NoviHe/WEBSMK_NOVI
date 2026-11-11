@extends('layouts.master')
@section('title', 'Data Guru & Tenaga Pendidik')
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
                            <h3 class="panel-title">Data Guru &amp; Tenaga Pendidik</h3>
                            <div class="right">
                                <a href="{{route('gurus.create')}}" class="btn btn-primary btn-sm"><i class="lnr lnr-plus-circle"></i> Tambah Guru</a>
                            </div>
                        </div>

                        <div class="panel-body">
                            <form action="{{route('gurus.index')}}" method="GET" class="form-inline" style="margin-bottom: 20px;">
                                <div class="form-group">
                                    <input type="text" name="cari" class="form-control" placeholder="Cari nama atau NIP..." value="{{request('cari')}}">
                                </div>
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i> Cari</button>
                            </form>

                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>FOTO</th>
                                            <th>NIP</th>
                                            <th>NAMA GURU &amp; GELAR</th>
                                            <th>L/P</th>
                                            <th>BIDANG STUDI</th>
                                            <th>STATUS</th>
                                            <th>TELEPON</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($gurus as $g)
                                        <tr>
                                            <td>
                                                <img src="{{$g->getFoto()}}" width="40" height="40" class="img-circle" style="object-fit: cover;">
                                            </td>
                                            <td>{{$g->nip ?? '-'}}</td>
                                            <td>
                                                <strong>{{$g->nama_guru}}</strong>{{$g->gelar ? ', ' . $g->gelar : ''}}
                                            </td>
                                            <td>{{$g->jenis_kelamin}}</td>
                                            <td><span class="label label-info">{{$g->bidang_studi ?? 'Umum'}}</span></td>
                                            <td><span class="label label-default">{{$g->status_kepegawaian}}</span></td>
                                            <td>{{$g->telepon ?? '-'}}</td>
                                            <td>
                                                <a href="{{route('gurus.edit', $g->id)}}" class="btn btn-warning btn-sm">Edit</a>
                                                <form action="{{route('gurus.destroy', $g->id)}}" method="POST" style="display:inline-block;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data guru ini?')">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="8" class="text-center text-muted">Belum ada data guru.</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="pull-right">
                                {{$gurus->appends(request()->input())->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
