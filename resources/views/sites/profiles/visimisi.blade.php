@extends('layouts.frontend')
@section('title','Visi & Misi | ')
@section('class','dark')
@section('content')
<section id="page-title">

    <div class="container clearfix" data-animate="fadeInDown">
        <h1>Visi &amp; Misi Sekolah</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Visi &amo; Misi</li>
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
                            <h2>Visi &amp; Misi Sekolah</h2>
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
                            <a href="#"><img src="{{asset('/frontend')}}/images/blog/full/smk-2.jpg" alt="Blog Single"></a>
                        </div><!-- .entry-image end -->

                        <!-- Entry Content
                        ============================================= -->
                        <div class="entry-content notopmargin">

                            <h3>Visi dan Misi Sekolah</h3>

                            <h5>Visi Sekolah :</h5>

                            <p>Menjadi SMK unggul yang mampu bersaing pada era global tahun 2019</p>

                            <h5>Misi Sekolah :</h5>

                            <p>Bersikap profesional dalam melakukan segala tindakan dan perbuatan dengan tetap berlandaskan pada keimanan dan ketakwaan terhadap Alloh SWT.
                            Menciptakan kemitraan yang kokoh dengan pemerintah daerah, masyarakat, institusi pasangan, dan dunia usaha industri
                            Melakukan pembaharuan dalam bidang ilmu pengetahuan dan teknologi
                            Membekali tamatan dengan pengetahuan, sikap, dan keterampilan agar mampu bersaing dalam era global
                            Melaksanakan Sistem Manajemen Mutu berdasarkan ISO 9001 : 2008</p>
                            <p><b>Tujuan Sekolah :</b></p>

                            <p>Menghasilkan tamatan yang mempunyai pengetahuan, keterampilan, dan berbudaya serta mampu bersaing dalam era global.</p>
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