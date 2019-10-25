@extends('layouts.frontend')
@section('title','Rekayasa Perangkat Lunak | ')
@section('class','dark')
@section('content')
<section id="page-title">

    <div class="container clearfix" data-animate="fadeInDown">
        <h1>RPL | Rekayasa Perangkat Lunak</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">RPL</li>
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
                            <h2>Rekayasa Perangkat Lunak</h2>
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
                            <a href="#"><img src="{{asset('/frontend')}}/images/blog/full/rpl.jpg" alt="Blog Single"></a>
                        </div><!-- .entry-image end -->

                        <!-- Entry Content
                        ============================================= -->
                        <div class="entry-content notopmargin">
                            <h4>Kompetensi Keahlian Rekayasa Perangkat Lunak</h4>

                            <p>Kompetensi <a href="rpl.html">keahlian Rekayasa Perangkat Lunak (Software Enginering)</a> merupakan salah satu kompetensi keahlian di SMK Negeri 1 Padaherang dalam bidang Teknologi Komputer dan Informatika yang secara khusus mempelajari tentang analisis serta pemrograman komputer. Lulusan RPL dewasa ini sangat dibutuhkan untuk menjawab banyaknya kebutuhan industri bagi ketersediaan tenaga teknisi dalam bidang Rekayasa Perangkat Lunak, mengingat teknologi informasi berbasis komputer sudah mulai merambah ke berbagai sektor.</p>

                            <p>Kompetensi Keahlian Rekayasa Perangkat Lunak (RPL) SMK Negeri 1 Padaherang didirikan sejak tahun 2007. Rekayasa Perangkat Lunak merupakan salah satu kompetensi keahlian dalam bidang Teknologi Komputer dan Informatika yang secara khusus mempelajari tentang pemrograman komputer. Saat ini RPL memiliki 10 kelas dari mulai kelas X, kelas XI dan Kelas XII.</p>

                            <p>Secara khusus tujuan Program Keahlian Rekayasa Perangkat Lunak (RPL) SMK Negeri 1 Padaherang adalah membekali peserta didik dengan keterampilan, pengetahuan dan sikap agar kompeten untuk:</p>

                            <table class="table">
                                <tr>
                                    <td>1.</td>
                                    <td>Menginstalasi Perangkat Komputer Personal dan Menginstal Sistem Operasi dan Aplikasi</td>
                                </tr>
                                <tr>
                                    <td>2.</td>
                                    <td>Mengerti tentang Konsep Algoritma Pemrograman dan Konsep Perangkat Lunak</td>
                                </tr>
                                <tr>
                                    <td>3.</td>
                                    <td>Merancang Sistem Informasi (Business Process) untuk membangun suatu Software atau Aplikasi</td>
                                </tr>
                                <tr>
                                    <td>4.</td>
                                    <td>Membangun Software Aplikasi Databases Berbasis Desktop, Web dan Mobile</td>
                                </tr>
                            </table>

                            <h4>Prospek Kerja</h4>
                            <p>Dengan memanfaatkan kemampuan, kompetensi, pengalaman dan berbagai peluang yang ada, lulusan Program Keahlian Rekayasa Perangkat Lunak diharapkan akan bisa menjadi :</p>

                            <table class="table">
                                <tr>
                                    <td></td>
                                    <td>Web Application Programmer</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>Database Programmer</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>Interfacing Programmer</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>Mobile Application Programmer (Java and Android)</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>Desktop Application Programmer</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>C++ Programmer</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>Game Programmer</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>Hardware and Software Technicians</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>IT Support and IT Staff</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>Pekerjaan-pekerjaan lainnya yang berbasis komputer</td>
                                </tr>
                            </table>
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