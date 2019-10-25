@extends('layouts.frontend')
@section('title','Geologi Pertambangan | ')
@section('class','dark')
@section('content')
<section id="page-title">

    <div class="container clearfix" data-animate="fadeInDown">
        <h1>GP | Geologi Pertambangan</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">GP</li>
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
                            <h2>Geologi Pertambangan</h2>
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
                            <a href="#"><img src="images/blog/full/gp.jpg" alt="Blog Single"></a>
                        </div><!-- .entry-image end -->

                        <!-- Entry Content
                        ============================================= -->
                        <div class="entry-content notopmargin">
                            <h4>Kompetensi Keahlian Geologi Pertambangan</h4>

                            <p>Kompetensi <a href="gp.html">Keahlian Geologi Pertambangan</a> mengemban tugas dan fungsi mencerdaskan kehidupan bangsa, khususnya dalam bidang geologi dan pertambangan. Geologi pertambangan adalah suatu ilmu yang mempelajari dan mengembangkan pengetahuan yang berkaitan dengan kebumian seperti, bentuk muka bumi, material penyusun bumi, jenis batuan, sifat-sifat fisika dan kimia, bentuk batuan, proses pembentukannya dan sejarah bumi serta geologi terapannya seperti Geologi Minyak dan Gas Bumi, Geologi Teknik, Hidro Geologi, Geologi Tata Lingkungan, Geologi Tambang dan lain-lain. Kompetensi Keahlian Geologi Pertambangan berperan sebagai wahana pengkajian dan pemanfaatan sumberdaya alam (mineral, energi, dan air) serta penerapan kerekayasaan, lingkungan hidup, dan mitigasi bencana alam.</p>

                            <p>Pada Geologi Pertambangan yang dipelajari adalah segala sesuatu yang berhubungan dengan bumi sebagai obyek, dengan ruang lingkup yang luas, misalnya batuan dan mineral, minyak dan gas bumi, gunung api dan panas bumi, atau struktur bumi, gempa bumi, maupun proses dipermukaan seperti erosi, pengendapan dan perubahan lain terhadap batuan. lingkungan, geofisika, kekuatan bahan, konstruksi, perminyakan, pertambangan, analisis.</p>

                            <p>Penerapan keahlian seorang lulusan Geologi Pertambangan cakupan bidang profesi yang sangat luas antara lain adalah: rekayasa dalam penyediaan dan pengelolaan sumber daya energi (minyak bumi, batubara, panas bumi, dan sebagainya), pengelolaan lingkungan (kelestarian air tanah, mitigasi gerakan tanah, penentuan lokasi pembuangan limbah, dan sebagainya), penataan; perencanaan; serta pengembangan wilayah, konstruksi (jalan, jembatan, bendungan, gedung bertingkat, bunker, terowongan, dan sebagainya), dan pengelolaan sumber daya air (pengembangan air tanah, pengelolaan mata air, pengembangan daerah aliran sungai, dan sebagainya).</p>

                            <p>Dengan peluang kerja yang sedemikian luas, maka lulusan Kompetensi Keahlian Geologi Pertambangan dapat bekerja di sektor pemerintah/departemen maupun swasta.</p>

                            <table class="table">
                                <tr>
                                    <td>1.</td>
                                    <td>Sektor Swasta (Lembaga Swadaya Masyarakat, Konsultan, Kontraktor, Perusahaan Minyak, Perusahaan Pertambangan, Perusahaan Geoservices, Suplier, serta Pengembang pemukiman, dll</td>
                                </tr>
                                <tr>
                                    <td>2.</td>
                                    <td>Sektor Pemerintah (Departemen Energi dan Sumberdaya Mineral, Menteri Negara Lingkungan Hidup, BPPT, Bappedal, Bapedalda, Departemen Dalam Negeri, LIPI, dll)</td>
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