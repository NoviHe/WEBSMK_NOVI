@extends('layouts.frontend')
@section('title','Teknik Komputer & Jaringan | ')
@section('class','dark')
@section('content')
<section id="page-title">

    <div class="container clearfix" data-animate="fadeInDown">
        <h1>TKJ | Teknik Komputer &amp; Jaringan</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">TKJ</li>
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
                            <h2>Teknik Komputer &amp; Jaringan</h2>
                        </div><!-- .entry-title end -->

                        <!-- Entry Meta
                        ============================================= -->
                        <ul class="entry-meta clearfix">
                            <li><i class="icon-calendar3"></i> 10th July 2014</li>
                            <li><a href="#"><i class="icon-user"></i> admin</a></li>
                            <li><a href="#"><i class="icon-camera-retro"></i></a></li>
                        </ul><!-- .entry-meta end -->

                        <!-- Entry Image
                        ============================================= -->
                        <div class="entry-image" data-animate="pulse">
                            <a href="#"><img src="images/blog/full/tkj.jpg" alt="Blog Single"></a>
                        </div><!-- .entry-image end -->

                        <!-- Entry Content
                        ============================================= -->
                        <div class="entry-content notopmargin">
                            <h4>Kompetensi Keahlian Teknik Komputer &amp; Jaringan</h4>

                            <p><a href="tkj.html">Kompetensi Keahlian Teknik Komputer dan Jaringan (TKJ)</a> merupakan salah satu kompetensi unggulan di SMKN 1 Padaherang, pada tahun ajaran 2016/2017 usianya sudah menginjak tahun ke-12. Kompetensi Keahlian Teknik Komputer dan Jaringan (TKJ) SMKN 1 Padaherang telah mendapatkan beberapa prestasi membanggakan yang diraih oleh para siswa-siswi pada Lomba Kompetensi Siswa (LKS) baik ditingkat SMK wilayah Pangandaran dan di tingkat Provinsi Jawa Barat. Ini adalah suatu bukti bahwa pengelolaan kegiatan belajar mengajar di jurusan TKJ ini dikelola secara baik dan profesional.</p>

                            <p>Kompetensi Keahlian Teknik Komputer dan Jaringan (TKJ) merupakan model pendidikan kejuruan yang berbasis teknologi informasi dan komunikasi. Teknik komputer dan jaringan saat ini keberadaannya sudah mulai terlihat dimata publik, dimana kompetensi keahlian ini merupakan jurusan yang sudah mendekati ilmu praktisi yang langsung dapat diimplementasikan dilingkungan dunia kerja profesional. Menjalani jurusan teknik komputer dan jaringan tidak semudah yang dibayangkan oleh beberapa peminat khususnya calon siswa yang mendaftar pada jurusan ini.</p>

                            <p>Tujuan Kompetensi Keahlian Teknik Komputer dan Jaringan secara umum mengacu pada isi Undang-Undang Sistem Pendidikan Nasional (UU SPN) pasal 3 mengenai Tujuan Pendidikan Nasional (UU SPN) pasal 3 mengenai Tujuan Pendidikan Nasional dan penjelasan pasal 15 yang menyebutkan bahwa pendidikan kejuruan merupakan pendidikan menengah yang mempersiapkan peserta didik terutama untuk bekerja dalam bidang tertentu.</p>

                            <p>Secara khusus tujuan Program Keahlian Teknik Komputer dan Jaringan adalah membekali peserta didik dengan keterampilan, pengetahuan dan sikap agar kompeten, dengan kegiatan :</p>

                            <table class="table">
                                <tr>
                                    <td>1.</td>
                                    <td>Mendidik peserta didik dengan keahlian dan keterampilan dalam program keahlian teknik Komputer dan Jaringan agar dapat bekerja baik secara mandiri atau mengisi lowongan pekerjaan yang ada di dunia usaha dan dunia industri sebagai tenaga kerja tingkat menengah;</td>
                                </tr>
                                <tr>
                                    <td>2.</td>
                                    <td>Mendidik peserta didik agar mampu memilih karir, berkompetisi, dan mengembangkan sikap profesional dalam program keahlian Komputer dan Jaringan;</td>
                                </tr>
                                <tr>
                                    <td>3.</td>
                                    <td>Membekali peserta didik dengan ilmu pengetahuan dan keterampilan sebagai bekal bagi yang berminat untuk melanjutkan pendidikan. Kurikulum yang digunakan di Teknik Komputer dan Jaringan menggunakan Kurikulum KTSP (Kurikulum Tingkat Satuan Pendidikan).</td>
                                </tr>
                            </table>

                            <p>Disamping itu, Kompetensi Keahlian Teknik Komputer dan Jaringan akan menggunakan kurikulum Advance PC and Networking yang akan mengembangkan Kompetensi dengan mempelajari Perakitan Komputer, Installasi Software, Perbaikan Komputer, Membuat Jaringan LAN dan Internet.</p>
                            <!-- Post Single - Content End -->
                            <div class="divider"><i class="icon-circle"></i></div>
                            <!-- Tag Cloud
                            ============================================= -->
                            <div class="tagcloud clearfix bottommargin">
                                <a href="#">Visi</a>
                                <a href="#">Misi</a>
                                <a href="#">information</a>
                                <a href="#">media</a>
                                <a href="#">gallery</a>
                            </div><!-- .tagcloud end -->

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