@extends('layouts.master')
@section('title', 'Manajemen Pengumuman')
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
                            <h3 class="panel-title">Daftar Pengumuman Sekolah</h3>
                            <div class="right">
                                <a href="{{route('pengumumans.create')}}" class="btn btn-primary btn-sm"><i class="lnr lnr-plus-circle"></i> Tambah Pengumuman</a>
                            </div>
                        </div>

                        <div class="panel-body">
                            <form action="{{route('pengumumans.index')}}" method="GET" class="form-inline" style="margin-bottom: 20px;">
                                <div class="form-group">
                                    <input type="text" name="cari" class="form-control" placeholder="Cari judul..." value="{{request('cari')}}">
                                </div>
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i> Cari</button>
                            </form>

                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>JUDUL</th>
                                            <th>TARGET</th>
                                            <th>URGENSI</th>
                                            <th>BERLAKU S/D</th>
                                            <th>LAMPIRAN</th>
                                            <th>TANGGAL POST</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($pengumumans as $p)
                                        <tr>
                                            <td>
                                                <strong><a href="{{route('pengumuman.detail', $p->slug)}}" target="_blank">{{$p->judul}}</a></strong>
                                            </td>
                                            <td><span class="label label-default">{{strtoupper($p->target_audiens)}}</span></td>
                                            <td>
                                                @if($p->is_urgent)
                                                    <span class="label label-danger">Mendesak / Penting</span>
                                                @else
                                                    <span class="label label-info">Biasa</span>
                                                @endif
                                            </td>
                                            <td>{{$p->tanggal_berakhir ? $p->tanggal_berakhir->format('d M Y') : 'Tanpa Batas'}}</td>
                                            <td>
                                                @if($p->berkas_lampiran)
                                                    <a href="{{asset('files/pengumuman/' . $p->berkas_lampiran)}}" target="_blank" class="btn btn-xs btn-default"><i class="fa fa-paperclip"></i> Unduh</a>
                                                @else
                                                    <span class="text-muted">-</span>
                                                @endif
                                            </td>
                                            <td>{{$p->created_at->format('d M Y')}}</td>
                                            <td>
                                                <a href="{{route('pengumumans.edit', $p->id)}}" class="btn btn-warning btn-sm">Edit</a>
                                                <form action="{{route('pengumumans.destroy', $p->id)}}" method="POST" style="display:inline-block;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengumuman ini?')">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="7" class="text-center text-muted">Belum ada pengumuman.</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="pull-right">
                                {{$pengumumans->appends(request()->input())->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
