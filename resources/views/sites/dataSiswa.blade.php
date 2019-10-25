@extends('layouts.frontend')
@section('title','Data Peserta Didik Tahun Pelajaran 2018/2019 | ')
@section('class','dark')
@section('content')
<section id="page-title">

    <div class="container clearfix" data-animate="fadeInDown">
        <h1>Data Peserta Didik Tahun Pelajaran 2018/2019</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Siswa</li>
        </ol>
    </div>

</section><!-- #page-title end -->

<!-- Site Content
============================================= -->
<section id="content">

    <div class="content-wrap">

        <div class="container clearfix">
            <!-- post content -->
            <div class="postcontent nobottommargin clearfix" data-animate="fadeIn">
                <div class="col_full">
                    <!-- Single Post
                    ============================================= -->
                    <div class="entry clearfix">

                        <!-- Entry Title
                        ============================================= -->
                        <div class="entry-title">
                            <h2>Data Peserta Didik Tahun Pelajaran 2018/2019</h2>
                            <br>
                        </div><!-- .entry-title end -->
                        <table class="table table-hover">
                          <thead>
                            <tr>
                              <th>NO.</th>
                              <th>NIS</th>
                              <th>NAMA SISWA</th>
                              <th>L/P</th>
                              <th>KELAS</th>
                              <th>KOMPETENSI KEAHLIAN</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($data_siswa as $siswa)
                            <tr>
                                <td></td>
                                <td>{{$siswa->nis}}</td>
                                <td>{{$siswa->nama_siswa}}</td>
                                <td>{{$siswa->jenis_kelamin}}</td>
                                <td>{{$siswa->kelas}}</td>
                                <td>{{$siswa->komp_keahlian}}</td>
                            </tr>
                            
                            @endforeach
                        </tbody>
                        </table>

                        <!-- Entry Content
                        ============================================= -->
                        <div class="entry-content notopmargin">

                            <div class="divider"><i class="icon-circle"></i></div>
                            <div class="clear"></div>
                        </div>
                    </div><!-- .entry end -->
                </div>
            </div> <!-- end post content -->
            <!-- side bar -->
            @include('layouts.includes._rightbar')
            </div>
        </div>

    </div>

</section>

@stop