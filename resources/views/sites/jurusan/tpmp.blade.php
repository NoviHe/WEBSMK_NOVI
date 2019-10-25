@extends('layouts.frontend')
@section('title','Teknik Pengeloaan Minyak Petrokimia | ')
@section('class','dark')
@section('content')
<section id="page-title">

    <div class="container clearfix" data-animate="fadeInDown">
        <h1>TPMP | Teknik Peng. Migas &amp; Petrokimia</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">TPMP</li>
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
                            <h2>Teknik Peng. Migas &amp; Petrokimia</h2>
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
                            <a href="#"><img src="images/blog/full/tpmp.jpg" alt="Blog Single"></a>
                        </div><!-- .entry-image end -->

                        <!-- Entry Content
                        ============================================= -->
                        <div class="entry-content notopmargin">
                            <H4>Kompetensi Keahlian Teknik Peng. Migas &amp; Petrokimia</H4>

                            <p>Profil <a href="tpmp.html">Teknik Pengolahan Migas dan Petrokimia (TPMP)</a> SMK Negeri 1 Padaherang Kabupaten Pangandaran. Teknik Pengolahan Migas dan Petrokimia (TPMP) merupakan kompetensi keahlian kelima yang diselenggarakan di SMK Negeri 1 Padaherang. Dengan harapan dapat diselaraskan dengan Kompetensi Keahlian Geologi Pertambangan dan memenuhi kebutuhan akan tenaga di bidang Migas dan Petrokimia.</p>

                            <p>Teknik Pengolahan Migas dan Petrokimia (TPMP) merupakan kompetensi keahlian kelima yang diselenggarakan di SMK Negeri 1 Padaherang. Dengan harapan dapat diselaraskan dengan Kompetensi Keahlian Geologi Pertambangan dan memenuhi kebutuhan akan tenaga di bidang Migas dan Petrokimia. Teknik Pengolahan Migas dan Petrokimia (TPMP) merupakan kompetensi keahlian kelima yang diselenggarakan di SMK Negeri 1 Padaherang. Dengan harapan dapat diselaraskan dengan Kompetensi Keahlian Geologi Pertambangan dan memenuhi kebutuhan akan tenaga di bidang Migas dan Petrokimia.</p>
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