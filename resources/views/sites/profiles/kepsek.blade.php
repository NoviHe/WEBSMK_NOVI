@extends('layouts.frontend')
@section('title','Kepala Sekolah | ')
@section('class','dark')
@section('content')

<section id="page-title">

    <div class="container clearfix">
        <h1>Kepala Sekolah</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Kepala Sekolah</li>
        </ol>
    </div>

</section><!-- #page-title end -->

<!-- Site Content
============================================= -->
<section id="content">

    <div class="content-wrap">

        <div class="container clearfix">
            <!-- post content -->
            <div class="postcontent nobottommargin clearfix">
                <div class="col_full">
                    <div>
                        <div class="team team-list clearfix">
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
                        </div>
                        <div>
                        <p>Dalam usianya yang sudah mencapai empat belas tahun, SMK Negeri 1 Padaherang Kabupaten Pangandaran sudah dipimpin oleh 6 kepala sekolah, yaitu:</p>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>NAMA KEPALA SEKOLAH</th>
                                    <th>DARI TAHUN</th>
                                    <th>SAMPAI TAHUN</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1.</td>
                                    <td>Drs. Endang Sudarman,M.M.</td>
                                    <td>2004</td>
                                    <td>2005</td>
                                </tr>
                                <tr>
                                    <td>2.</td>
                                    <td>Drs. Dede Tarlana M.M.</td>
                                    <td>2005</td>
                                    <td>2012</td>
                                </tr>
                                <tr>
                                    <td>3.</td>
                                    <td>Drs. Asep Agus</td>
                                    <td>2012</td>
                                    <td>2012</td>
                                </tr>
                                <tr>
                                    <td>4.</td>
                                    <td>Drs. H. Joko Maryoto</td>
                                    <td>2013</td>
                                    <td>2013</td>
                                </tr>
                                <tr>
                                    <td>5.</td>
                                    <td>Drs. Dede Tarlana M.M.</td>
                                    <td>2013</td>
                                    <td>2017</td>
                                </tr>
                                <tr>
                                    <td>6.</td>
                                    <td>Nana Supena Dipayana, S.Pd.,M.M.</td>
                                    <td>2017</td>
                                    <td>2018</td>
                                </tr>
                                <tr>
                                    <td>7.</td>
                                    <td>Drs. Dede Tarlana M.M.</td>
                                    <td>2018</td>
                                    <td>Sekarang</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    </div>
            <!-- side bar -->
            @include('layouts.includes._rightbar')
            </div>
        </div>

    </div>

</section>
@stop