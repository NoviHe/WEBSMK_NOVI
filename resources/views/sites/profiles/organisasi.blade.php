@extends('layouts.frontend')
@section('title','Struktur Organisasi | ')
@section('class','dark')
@section('content')
<section id="content">

    <div class="content-wrap">

        <div class="container clearfix">
            <!-- post content -->
            <div class="postcontent nobottommargin clearfix" data-animate="fadeIn">
                <div class="col_full">
                    <h4>Struktur Organisasi</h4>
                    <div style="text-align: center;">
                        <p>STRUKTUR ORGANISASI DAN TATA KERJA
                        <br>SMKN 1 PADAHERANG
                        <br>TAHUN PELAJARAN 2018/2019</p>
                    </div>
                    <div class="tabs tabs-responsive side-tabs clearfix">

                        <ul class="tab-nav tab-nav2 clearfix" >
                            <li data-animate="bounceInRight"><a href="#tabs-1">Kepala Sekolah</a></li>
                            <li data-animate="bounceInLeft"><a href="#tabs-2">Kurikulum</a></li>
                            <li data-animate="bounceInRight"><a href="#tabs-3">Humas dan Hubin</a></li>
                            <li data-animate="bounceInLeft"><a href="#tabs-4">Sarana dan Prasarana</a></li>
                            <li data-animate="bounceInRight"><a href="#tabs-5">SDM dan Manajemen Mutu</a></li>
                            <li data-animate="bounceInLeft"><a href="#tabs-6">Kesiswaan</a></li>
                            <li data-animate="bounceInRight"><a href="#tabs-7">Koordinator</a></li>
                            <li data-animate="bounceInLeft"><a href="#tabs-8">Ketua Kompetensi Keahlian</a></li>
                        </ul>

                        <div class="tab-container">

                            <div class="tab-content clearfix" id="tabs-1" data-animate="fadeInLeft">
                                <table class=" d-block d-md-none table">
                                    <thead>
                                        <tr>
                                            <th>KEPALA SEKOLAH</th>
                                            <th>DRS. DEDE TARLANA, MM.</th>
                                        </tr>
                                    </thead>
                                </table>
                                <div class=" d-none d-xl-block team team-list clearfix">
                                    <div class="team-image">
                                        <img src="{{asset('/frontend')}}/images/team/uk.jpg" alt="John Doe">
                                        <div class="leftmargin-md topmargin-sm d-none d-md-block">
                                            <a href="#" class="social-icon si-rounded si-small si-light si-facebook">
                                                <i class="icon-facebook"></i>
                                                <i class="icon-facebook"></i>
                                            </a>
                                            <a href="#" class="social-icon si-rounded si-small si-light si-twitter">
                                                <i class="icon-twitter"></i>
                                                <i class="icon-twitter"></i>
                                            </a>
                                            <a href="#" class="social-icon si-rounded si-small si-light si-gplus">
                                                <i class="icon-gplus"></i>
                                                <i class="icon-gplus"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="team-desc">
                                        <div class="team-title"><h4>Drs. DEDE TARLANA, MM.</h4><span>Kepala Sekolah</span></div>
                                            <div class="team-content">
                                                <table class="table">							
                                                    <tr>
                                                        <td>NIP	</td>
                                                        <td>: 19640114 198903 1 009</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Pangkat/Gol	</td>
                                                        <td>: Pembina Tk.I/IVB</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tempat/Tgl. Lahir </td>
                                                        <td>: Tasikmalaya, 14 Januari 1964</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Jenis Kelamin </td>
                                                        <td>: Laki-laki</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Alamat	</td>
                                                        <td>: Kp.Ciburial RT.02/14 Manggungjaya Rajapolah Tsm</td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class=" topmargin-sm  d-block d-md-none">
                                                <a href="#" class="social-icon si-rounded si-small si-light si-facebook">
                                                    <i class="icon-facebook"></i>
                                                    <i class="icon-facebook"></i>
                                                </a>
                                                <a href="#" class="social-icon si-rounded si-small si-light si-twitter">
                                                    <i class="icon-twitter"></i>
                                                    <i class="icon-twitter"></i>
                                                </a>
                                                <a href="#" class="social-icon si-rounded si-small si-light si-gplus">
                                                    <i class="icon-gplus"></i>
                                                    <i class="icon-gplus"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                            </div>

                            <div class="tab-content clearfix" id="tabs-2"  data-animate="fadeInLeft">
                                <table class="table">
                                  <thead>
                                    <tr>
                                      <th>Wakil Kepala Sekolah Bidang Kurikulum</th>
                                      <th>Drs. Aap Dadang Sutisna</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td>Pelaksana Teknis</td>
                                      <td>Supriyatna, S.Pd.I</td>
                                    </tr>
                                </tbody>
                                </table>
                            </div>
                            <div class="tab-content clearfix" id="tabs-3"  data-animate="fadeInLeft">
                                <table class="table">
                                  <thead>
                                    <tr>
                                      <th>Wakil Kepala Sekolah Bidang Humas dan Hubin</th>
                                      <th>DR. OO KOSIDIN, MM.</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td>Pelaksana Teknis</td>
                                      <td>Yudi Yuswandi, S.Kom.</td>
                                    </tr>
                                  </tbody>
                                </table>
                            </div>
                            <div class="tab-content clearfix" id="tabs-4"  data-animate="fadeInLeft">
                                <table class="table">
                                    <tr>
                                        <th>Wakil Kepala Sekolah Bidang Sarana dan Prasarana</th>
                                        <td>Yayan Sopandi, S.IP., MM.</td>
                                    </tr>
                                    <tr>
                                        <td>Pelaksana Teknis</td>
                                        <td>Baharuddin Subekti, S.Kom</td>
                                    </tr>
                                </table>
                            </div>

                            <div class="tab-content clearfix" id="tabs-5"  data-animate="fadeInLeft">
                                <table class="table">
                                    <tr>
                                        <th>Wakil Kepala Sekolah Bidang SDM dan Manajemen Mutu</th>
                                        <td>Sukendar, S.Pd.</td>
                                    </tr>
                                    <tr>
                                        <td>Pelaksana Teknis</td>
                                        <td>Harry Agustiana P,S.Kom.</td>
                                    </tr>
                                </table>
                            </div>

                            <div class="tab-content clearfix" id="tabs-6"  data-animate="fadeInLeft">
                                <table class="table">
                                    <tr>
                                        <th>Wakil Kepala Sekolah Bidang Kesiswaan</th>
                                        <td>Abdul Munir, S.Pd, M.M.</td>
                                    </tr>
                                    <tr>
                                        <td>Pelaksana Teknis</td>
                                        <td>Heri Rip Kosasih, S.Pd.</td>
                                    </tr>
                                    <tr>
                                </table>
                            </div>

                            <div class="tab-content clearfix" id="tabs-7"  data-animate="fadeInLeft">
                                <table class="table">
                                    <tr>
                                        <th>Koordinator (Penanggung Jawab Khusus</th>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>BP / BK</td>
                                        <td>Trivia Safitri Gozali, S.Pd.</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>Anggi Seftiyono, S.Pd</td>
                                    </tr>
                                    <tr>
                                        <td>BKK</td>
                                        <td>Yayan Sopandi, S.IP., MM.</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>Oscar Satriana, S.Kom.</td>
                                    </tr>
                                    <tr>
                                        <td>Perpustakaan</td>
                                        <td>Edah Jubaedah, S.Pd.</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>Entin Kartini, S.Pd.</td>
                                    </tr>
                                    <tr>
                                        <td>SIM dan ICT</td>
                                        <td>Giri Rahayu Bastian, S.Pd.</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>Tim Khusus</td>
                                    </tr>
                                    <tr>
                                        <td>Unit Produksi</td>
                                        <td>Trisna Supriatna, S.ST.</td>
                                    </tr>
                                </table>
                            </div>

                            <div class="tab-content clearfix" id="tabs-8"  data-animate="fadeInLeft">
                                <table class="table">
                                    <tr>
                                        <th>Ketua Kompetensi Keahlian</th>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>GP (Geologi Pertambangan)</td>
                                        <td>Teguh Yuwono, ST.</td>
                                    </tr>
                                    <tr>
                                        <td>TKJ (Teknik Komputer Jaringan)</td>
                                        <td>Yudi Yuswandi, S.Kom</td>
                                    </tr>
                                    <tr>
                                        <td>RPL (Rekayasa Perangkat Lunak)</td>
                                        <td>Ade Roni, S.Kom</td>
                                    </tr>
                                    <tr>
                                        <td>TEIN (Teknik Elektronika Industri)</td>
                                        <td>Restu Abadi Sukma, S.Kom</td>
                                    </tr>
                                    <tr>
                                        <td>TPMP (Teknik Pengolahan Migas dan Petrokimia</td>
                                        <td>Eka Mulya Ade, S.Pd, Si.</td>
                                    </tr>
                                    <tr>
                                        <td>Teknik Kendaraan Ringan</td>
                                        <td>Wahyudin, M.Pd.</td>
                                    </tr>
                                    <tr>
                                        <td>Usaha Perjalanan Wisata</td>
                                        <td>Kaswan Hermawan, A.Md.</td>
                                    </tr>
                                    <tr>
                                        <td>Multimedia</td>
                                        <td>Giri Rahayu Bastian, S.Pd.</td>
                                    </tr>
                                </table>
                            </div>

                        </div>

                    </div>

                    <div class="line"></div>
                </div>
            </div>
            <!-- side bar -->
            @include('layouts.includes._rightbar')
            </div>
        </div>

    </div>

</section>

@stop