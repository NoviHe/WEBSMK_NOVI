@extends('layouts.frontend')
@section('title','Website ')
@section('class','transparent-header')
@section('content')
<section id="slider" class="slider-element slider-parallax swiper_wrapper full-screen clearfix">
    <div class="slider-parallax-inner">

        <div class="swiper-container swiper-parent">
            <div class="swiper-wrapper">
                <div class="swiper-slide dark" style="background-image: url('{{asset('/frontend')}}/images/slider/swiper/slider-1a.jpg');">
                    <div class="container clearfix">
                        <div class="slider-caption slider-caption-center">
                            <h2 data-animate="fadeInUp">SMK N1 PADAHERANG</h2>
                            <p class="d-none d-sm-block" data-animate="fadeInUp" data-delay="200">Selamat datang di website SMKN 1 Padaherang. Kami berkomitmen menjadi SMK unggul di Kabupaten Pangandaran unggul yang mampu bersaing pada era global.</p>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide dark">
                    <div class="container clearfix">
                        <div class="slider-caption slider-caption-center">
                            <h2 data-animate="fadeInUp">Menjadi SMK Unggulan</h2>
                            <p class="d-none d-sm-block" data-animate="fadeInUp" data-delay="200">SMKN 1 PADAHERANG selalu menjadi SMK unggulan di Kabupaten Pangandaran.</p>
                        </div>
                    </div>
                    <div class="video-wrap">
                        <video id="slide-video" poster="{{asset('/frontend')}}/images/videos/smk2.jpg" preload="auto" loop autoplay muted>
                            <source src='{{asset('/frontend')}}/images/videos/smk2.webm' type='video/webm' />
                            <source src='{{asset('/frontend')}}/images/videos/smk2.mp4' type='video/mp4' />
                        </video>
                        <div class="video-overlay" style="background-color: rgba(0,0,0,0.55);"></div>
                    </div>
                </div>
                <div class="swiper-slide" style="background-image: url('{{asset('/frontend')}}/images/slider/swiper/smk0.jpg'); background-position: center top;">
                    <div class="container clearfix">
                        <div class="slider-caption">
                            <h2 data-animate="fadeInUp">Great Performance</h2>
                            <p class="d-none d-sm-block" data-animate="fadeInUp" data-delay="200">You'll be surprised to see the Final Results of your Creation &amp; would crave for more.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slider-arrow-left"><i class="icon-angle-left"></i></div>
            <div class="slider-arrow-right"><i class="icon-angle-right"></i></div>
        </div>

        <a href="#" data-scrollto="#content" data-offset="100" class="dark one-page-arrow"><i class="icon-angle-down infinite animated fadeInDown"></i></a>

    </div>
</section>

<section id="content">
    <dir class="content-warp">
        <div class="container clearfix">
            <div class="col_one_third bottommargin-sm center">
                <img data-animate="fadeInLeft" src="{{asset('/frontend')}}/images/team/smk.jpg" alt="Iphone">
                <a data-animate="rotateInDownLeft" href="kepala-sekolah.html" class="button button-border button-dark button-rounded button-large noleftmargin topmargin-sm d-none d-md-block">Learn more</a>
            </div>
            <div class="col_two_third bottommargin-sm col_last">
                <div data-animate="slideInRight" class="heading-block topmargin-sm">
                    <h3>Selamat Datang di Website SMKN 1 Padaherang.</h3>
                    <p><b><i>Assalamu’alaikum Wr. Wb.</i></b></p>
                    <p>Segala puji dan syukur kita panjatkan kehadirat Alloh SWT, semoga kita semua ada dalam lindungan-Nya. dan atas perkenan-Nya pula kami dapat membuat website SMK Negeri 1 Padaherang. Seiring dengan perkembangan era Teknologi Komunikasi dan Informasi yang sedang kita alami, menuntut terciptanya Sumber Daya Manusia yang handal dan mempunyai kemampuan sejalan dengan kemajuan iptek dalam bidang teknologi komunikasi dan informasi.</p>

                    <p>Diharapkan dengan adanya website SMK Negeri 1 Padaherang dapat mengimplementasikan pembelajaran berbasis Infomation Technology sehingga secara signifikan meningkatkan kualitas sekolah. Tiada gading yang tak retak, website yang kami buat dalam proses pengembangan, masih banyak kekurangan yang harus kami perbaiki. Kritik dan saran yang membangun sangat kami harapkan untuk pengembangan ke depan.</p>

                    <p>Akhirnya, kami ucapkan terimakasih yang sebesar-besarnya atas segala bantuan dan fasilitasnya yang telah diberikan semoga semua yang kita lakukan bermanfaat bagi masyarakat</p>

                    <p><b>Dra. Hj. Nunung Erni Nuraeni, M.MPd</b></p>

                    <i>Terimakasih.</i>
                    <a data-animate="rotateInDownLeft" href="kepala-sekolah.html" class="button button-border button-dark button-rounded button-large noleftmargin topmargin-sm d-block d-md-none">Learn more</a>
                </div>
            </div>
        </div>
    </dir>
    <div class="content-warp">
        <div class="container clearfix">
            <div class="heading-block topmargin-sm center">
                <h3>Kepala &amp; Wakil Kepala Sekolah</h3>
            </div>
            <div class="row">
                <div data-animate="fadeInLeft" class="col-lg-2 col-md-6 bottommargin">
                    <div class="team">
                        <div class="team-image">
                            <img src="{{asset('/frontend')}}/images/team/uk.jpg" alt="Kepala Sekolah">
                        </div>
                        <div class="team-desc team-desc-bg">
                            <div class="team-title"><h4>Dra. Hj. Nunung Erni Nuraeni, M.MPd</h4><span>Kepala Sekolah</span></div>
                                <a href="#" class="social-icon inline-block si-small si-light si-rounded si-facebook">
                                    <i class="icon-facebook"></i>
                                    <i class="icon-facebook"></i>
                                </a>
                                <a href="#" class="social-icon inline-block si-small si-light si-rounded si-twitter">
                                    <i class="icon-twitter"></i>
                                    <i class="icon-twitter"></i>
                                </a>
                                <a href="#" class="social-icon inline-block si-small si-light si-rounded si-gplus">
                                    <i class="icon-gplus"></i>
                                    <i class="icon-gplus"></i>
                                </a>
                        </div>
                    </div>
                </div>
                <div data-animate="fadeInLeft" class="col-lg-2 col-md-6 bottommargin">
                    <div class="team">
                        <div class="team-image">
                            <img src="{{asset('/frontend')}}/images/team/uk.jpg" alt="Kurikulum">
                        </div>
                        <div class="team-desc team-desc-bg">
                            <div class="team-title"><h4>DR. OO KOSIDIN, MM.</h4><span>Kurikulum</span></div>
                                <a href="#" class="social-icon inline-block si-small si-light si-rounded si-facebook">
                                    <i class="icon-facebook"></i>
                                    <i class="icon-facebook"></i>
                                </a>
                                <a href="#" class="social-icon inline-block si-small si-light si-rounded si-twitter">
                                    <i class="icon-twitter"></i>
                                    <i class="icon-twitter"></i>
                                </a>
                                <a href="#" class="social-icon inline-block si-small si-light si-rounded si-gplus">
                                    <i class="icon-gplus"></i>
                                    <i class="icon-gplus"></i>
                                </a>
                        </div>
                    </div>
                </div>
                <div data-animate="fadeInLeft" class="col-lg-2 col-md-6 bottommargin">
                    <div class="team">
                        <div class="team-image">
                            <img src="{{asset('/frontend')}}/images/team/uk.jpg" alt="Kesiswaan">
                        </div>
                        <div class="team-desc team-desc-bg">
                            <div class="team-title"><h4>ABDUL MUNIR, S.PD, M.M.</h4><span>Kesiswaan</span></div>
                                <a href="#" class="social-icon inline-block si-small si-light si-rounded si-facebook">
                                    <i class="icon-facebook"></i>
                                    <i class="icon-facebook"></i>
                                </a>
                                <a href="#" class="social-icon inline-block si-small si-light si-rounded si-twitter">
                                    <i class="icon-twitter"></i>
                                    <i class="icon-twitter"></i>
                                </a>
                                <a href="#" class="social-icon inline-block si-small si-light si-rounded si-gplus">
                                    <i class="icon-gplus"></i>
                                    <i class="icon-gplus"></i>
                                </a>
                        </div>
                    </div>	
                </div>
                <div data-animate="fadeInRight" class="col-lg-2 col-md-6 bottommargin d-none d-md-block">
                    <div class="team">
                        <div class="team-image">
                            <img src="{{asset('/frontend')}}/images/team/uk.jpg" alt="Sumberdaya">
                        </div>
                        <div class="team-desc team-desc-bg">
                            <div class="team-title"><h4>HERDIANA, S.PD.</h4><span>Sumberdaya Manusia</span></div>
                                <a href="#" class="social-icon inline-block si-small si-light si-rounded si-facebook">
                                    <i class="icon-facebook"></i>
                                    <i class="icon-facebook"></i>
                                </a>
                                <a href="#" class="social-icon inline-block si-small si-light si-rounded si-twitter">
                                    <i class="icon-twitter"></i>
                                    <i class="icon-twitter"></i>
                                </a>
                                <a href="#" class="social-icon inline-block si-small si-light si-rounded si-gplus">
                                    <i class="icon-gplus"></i>
                                    <i class="icon-gplus"></i>
                                </a>
                        </div>
                    </div>
                </div>
                <div data-animate="fadeInRight" class="col-lg-2 col-md-6 bottommargin d-none d-md-block">
                    <div class="team">
                        <div class="team-image">
                            <img src="{{asset('/frontend')}}/images/team/uk.jpg" alt="Humas Hubin">
                        </div>
                        <div class="team-desc team-desc-bg">
                            <div class="team-title"><h4>DRS. AAP DADANG SUTISNA</h4><span>Humas Hubin</span></div>
                                <a href="#" class="social-icon inline-block si-small si-light si-rounded si-facebook">
                                    <i class="icon-facebook"></i>
                                    <i class="icon-facebook"></i>
                                </a>
                                <a href="#" class="social-icon inline-block si-small si-light si-rounded si-twitter">
                                    <i class="icon-twitter"></i>
                                    <i class="icon-twitter"></i>
                                </a>
                                <a href="#" class="social-icon inline-block si-small si-light si-rounded si-gplus">
                                    <i class="icon-gplus"></i>
                                    <i class="icon-gplus"></i>
                                </a>
                        </div>
                    </div>
                </div>
                <div data-animate="fadeInRight" class="col-lg-2 col-md-6 bottommargin d-none d-md-block">
                    <div class="team">
                        <div class="team-image">
                            <img src="{{asset('/frontend')}}/images/team/uk.jpg" alt="Sarana Prasarana">
                        </div>
                        <div class="team-desc team-desc-bg">
                            <div class="team-title"><h4>SUKENDAR, S.PD</h4><span>Sarana &amp; Prasarana</span></div>
                                <a href="#" class="social-icon inline-block si-small si-light si-rounded si-facebook">
                                    <i class="icon-facebook"></i>
                                    <i class="icon-facebook"></i>
                                </a>
                                <a href="#" class="social-icon inline-block si-small si-light si-rounded si-twitter">
                                    <i class="icon-twitter"></i>
                                    <i class="icon-twitter"></i>
                                </a>
                                <a href="#" class="social-icon inline-block si-small si-light si-rounded si-gplus">
                                    <i class="icon-gplus"></i>
                                    <i class="icon-gplus"></i>
                                </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content-warp">
        <div class="container clearfix">
            <div data-animate="fadeIn" class="postcontent nobottommargin clearfix">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>KOMPETENSI KEAHLIAN</th>
                      <th>PRODUK/JASA UNGGULAN</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Geologi Pertambangan</td>
                      <td>Jasa Pemetaan Geologi</td>
                    </tr>
                    <tr>
                      <td>Teknik Komputer dan Jaringan</td>
                      <td>Bengkel Resmi Mitra Suzuki</td>
                    </tr>
                    <tr>
                      <td>Rekayasa Perangkat Lunak</td>
                      <td>Jasa Pembuatan Website &amp; Software Development</td>
                    </tr>
                    <tr>
                      <td>Teknik Elektronika Industri</td>
                      <td>the Running Text LED Display</td>
                    </tr>
                    <tr>
                      <td>TeknkPengelola Migas dan Petrokimia</td>
                      <td>Sabun Cuci Piring</td>
                    </tr>
                    <tr>
                      <td>Teknik Kendaraan Ringan</td>
                      <td>Alat Anti Maling Motor/Mobil</td>
                    </tr>
                    <tr>
                      <td>Multimedia</td>
                      <td>Jasa Foto &amp; Video Shooting</td>
                    </tr>
                    <tr>
                      <td>Usaha Perjalanan Wisata</td>
                      <td>Tour &amp; Event Organizer</td>
                    </tr>
                  </tbody>
                </table>
                <div class="divider"><i class="icon-circle"></i></div>

                <h4>INSTANSI TERKAIT</h4>

                <ul data-animate="fadeInUpBig" class="clients-grid grid-4 nobottommargin clearfix">
                    <li ><a href="#"><img src="{{asset('/frontend')}}/images/clients/logo/JB-5.png" alt="Clients"></a></li>
                    <li ><a href="#"><img src="{{asset('/frontend')}}/images/clients/logo/K-5.png" alt="Clients"></a></li>
                    <li class="d-none d-md-block"><a href="#"><img src="{{asset('/frontend')}}/images/clients/logo/SMK-1.png" alt="Clients"></a></li>
                    <li class="d-none d-md-block"><a href="#"><img src="{{asset('/frontend')}}/images/clients/logo/PND-3.png" alt="Clients"></a></li>
                </ul>
                <ul data-animate="fadeInUpBig" class="clients-grid grid-4 nobottommargin clearfix d-block d-md-none">
                    <li ><a href="#"><img src="{{asset('/frontend')}}/images/clients/logo/SMK-1.png" alt="Clients"></a></li>
                    <li ><a href="#"><img src="{{asset('/frontend')}}/images/clients/logo/PND-3.png" alt="Clients"></a></li>
                </ul>

                <div class="clear"></div>

            </div>
            <div class="sidebar nobottommargin col_last clearfix">
                <div data-animate="fadeInRight" class="sidebar-widgets-wrap">
                    <div class="widget clearfix">
                        <h4>Upcoming Events</h4>
                        <div id="post-list-footer">

                            <div class="spost clearfix">
                                <div class="entry-image">
                                    <a href="#" class="nobg"><img src="images/events/thumbs/1.jpg" alt=""></a>
                                </div>
                                <div class="entry-c">
                                    <div class="entry-title">
                                        <h4><a href="#">Lorem ipsum dolor sit amet, consectetur</a></h4>
                                    </div>
                                    <ul class="entry-meta">
                                        <li>10th July 2014</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="spost clearfix">
                                <div class="entry-image">
                                    <a href="#" class="nobg"><img src="images/events/thumbs/2.jpg" alt=""></a>
                                </div>
                                <div class="entry-c">
                                    <div class="entry-title">
                                        <h4><a href="#">Elit Assumenda vel amet dolorum quasi</a></h4>
                                    </div>
                                    <ul class="entry-meta">
                                        <li>10th July 2014</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="spost clearfix">
                                <div class="entry-image">
                                    <a href="#" class="nobg"><img src="images/events/thumbs/3.jpg" alt=""></a>
                                </div>
                                <div class="entry-c">
                                    <div class="entry-title">
                                        <h4><a href="#">Debitis nihil placeat, illum est nisi</a></h4>
                                    </div>
                                    <ul class="entry-meta">
                                        <li>10th July 2014</li>
                                    </ul>
                                </div>
                            </div>
                        </div>	
                </div>
                
                <div class="widget quick-contact-widget clearfix">
                    <h4>Quick Contact</h4>
                    <div class="quick-contact-form-result"></div>
                        <form id="quick-contact-form" name="quick-contact-form" action="include/quickcontact.php" method="post" class="quick-contact-form nobottommargin">
                            <div class="form-process"></div>
                            <input type="text" class="required sm-form-control input-block-level" id="quick-contact-form-name" name="quick-contact-form-name" value="" placeholder="Full Name" />
                            <input type="text" class="required sm-form-control email input-block-level" id="quick-contact-form-email" name="quick-contact-form-email" value="" placeholder="Email Address" />
                            <textarea class="required sm-form-control input-block-level short-textarea" id="quick-contact-form-message" name="quick-contact-form-message" rows="4" cols="30" placeholder="Message"></textarea>
                            <input type="text" class="hidden" id="quick-contact-form-botcheck" name="quick-contact-form-botcheck" value="" />
                            <button type="submit" id="quick-contact-form-submit" name="quick-contact-form-submit" class="button button-small button-3d nomargin" value="submit">Send Email</button>
                        </form>
                </div>
                </div>
                    <div class="widget clearfix bottommargin-lg">
                        <img src="{{asset('/frontend')}}/images/tik.png">
                        <div class="clear"></div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
</section>    

@stop