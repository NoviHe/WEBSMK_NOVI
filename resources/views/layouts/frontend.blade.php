<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="SemiColonWeb" />

	<!-- Stylesheets
	============================================= -->
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Raleway:300,400,500,600,700|Crete+Round:400i" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="{{asset('/frontend')}}/css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="{{asset('/frontend')}}/style.css" type="text/css" />
	<link rel="stylesheet" href="{{asset('/frontend')}}/css/swiper.css" type="text/css" />
	<link rel="stylesheet" href="{{asset('/frontend')}}/css/dark.css" type="text/css" />
	<link rel="stylesheet" href="{{asset('/frontend')}}/css/font-icons.css" type="text/css" />
	<link rel="stylesheet" href="{{asset('/frontend')}}/css/animate.css" type="text/css" />
	<link rel="stylesheet" href="{{asset('/frontend')}}/css/magnific-popup.css" type="text/css" />

	<link rel="stylesheet" href="{{asset('/frontend')}}/css/responsive.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />


	<!-- Your Stylesheets, Scripts & Title
	============================================= -->
	<link rel="icon" href="{{asset('/frontend')}}/favicon.png" type="image/png" sizes="16x16">
	<title>@yield('title')SMKN 1 PADAHERANG</title>

</head>
<body class="stretched rtl">

	<!-- The Main Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">


		<!-- Header
		============================================= -->
		<header id="header" class="@yield('class') full-header" data-sticky-class="dark">

			<div id="header-wrap">

				<div class="container clearfix">

					<div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

					<!-- Logo
					============================================= -->
					<div id="logo">
						<a href="/" class="standard-logo" data-dark-logo="{{asset('/frontend')}}/images/logo-smk.png"><img src="{{asset('/frontend')}}/images/logo-smk2.png" alt="Canvas Logo"></a>
					</div><!-- #logo end -->
					
					<nav id="primary-menu" class="dark">
						<ul>
							<li><a href="/"><div>Home</div></a></li>
							<li><a href="#"><div>Profil sekolah</div></a>
								<ul>
									<li><a href="/profile/sejarah-singkat"><div>Sejarah Singkat</div></a></li>
									<li><a href="/profile/visi-misi"><div>Visi &amp; Misi Sekolah</div></a></li>
									<li><a href="/profile/kepala-sekolah"><div>Kepala Sekolah</div></a></li>
									<li><a href="/profile/struktur-organisasi"><div>Struktur Organisasi</div></a></li>
									<li><a href="/profile/prestasi-sekolah"><div>Prestasi Sekolah</div></a></li>
								</ul>
							</li>
							<li><a href="#"><div>Kompetisi keahlian</div></a>
								<ul>
									<li><a href="/keahlian/geologi-pertambangan"><div>Geologi Pertambangan</div></a></li>
									<li><a href="/keahlian/teknik-komputer-jaringan"><div>Teknik Komputer &amp; Jaringan</div></a></li>
									<li><a href="/keahlian/rekayasa-perankat-lunak"><div>Rekayasa Perangkat Lunak</div></a></li>
									<li><a href="/keahlian/teknik-elektronika-industri"><div>Teknik Elektronika Industri</div></a></li>
									<li><a href="/keahlian/pengelolaan-migas-petrokmia"><div>Peng. Migas &amp; Petrokimia</div></a></li>
									<li><a href="/keahlian/teknik-kendaraan-ringan"><div>Teknik Kendaraan Ringan </div></a></li>
									<li><a href="/keahlian/usaha-perjalanan-wisata"><div>Usaha Perjalan Wisata</div></a></li>
									<li><a href="/keahlian/multimedia"><div>Multimedia</div></a></li>
								</ul>
							</li>
							<li><a href="#"><div>Manajemen</div></a>
								<ul>
									<li><a href="Kurikulum.html"><div>Kurikulum</div></a></li>
									<li><a href="kesiswaan.html"><div>Kesiswaan</div></a></li>
									<li><a href="humas-hubin.html"><div>Humas Hubin</div></a></li>
									<li><a href="sarana-prasarana.html"><div>Sarana &amp; Prasarana</div></a></li>
									<li><a href="suberdaya.html"><div>Sumber Daya Manusia</div></a></li>
									<li><a href="manajemen.html"><div>Manajemen Mutu</div></a></li>
								</ul>
							</li>
							<li><a href="#"><div>GTK &amp; Siswa</div></a>
								<ul>
									<li><a href="data-guru.html"><div>Data Guru</div></a></li>
									<li><a href="administrasi.html"><div>Tenaga Administrasi</div></a></li>
									<li><a href="/dataSiswa"><div>Data Siswa</div></a></li>
									<li><a href="data-alumni"><div>Data Alumni</div></a></li>
								</ul>
							</li>
							<li><a href="#"><div>Layanan Aplikasi</div></a>
								<ul>
									<li><a href="http://lms.smkn1padaherang.sch.id/" target="_blank"><div>E-Learning</div></a></li>
									<li><a href="http://library.smkn1padaherang.sch.id/" target="_blank"><div>E-Library</div></a></li>
									<li><a href="http://139.180.133.190:8154/admin/auth" target="_blank"><div>E-Raport</div></a></li>
									<li><a href="http://139.180.133.190:5774/" target="_blank"><div>Dapodik</div></a></li>
									<li><a href="http://139.180.133.190:5774/" target="_blank"><div>Bursa Kerja</div></a></li>
								</ul>
							</li>
							<li><a href="/login"><div>Login</div></a></li>
						</ul>

					<!-- search -->
					<div id="top-search">
							<a href="#" id="top-search-trigger"><i class="icon-search3"></i><i class="icon-line-cross"></i></a>
							<form action="search.html" method="get">
								<input type="text" name="q" class="form-control" value="" placeholder="Type &amp; Hit Enter..">
							</form>
					</div>


					</nav>
					
				</div>
			</div>
		</header>


	    @yield('content')
		<!-- Content
		============================================= -->
		
		<!-- #content end -->

		<!-- Footer
		============================================= -->
		<footer id="footer" class="dark">

			<div class="container">

			</div>

			<!-- Copyrights
			============================================= -->
			<!-- Copyrights
			============================================= -->
			<div id="copyrights">

				<div class="container clearfix">

					<div class="col_half">
						Copyrights &copy; 2019 All Rights Reserved by Canvas Inc.<br>
						<div class="copyright-links"><a href="#">Terms of Use</a> / <a href="#">Privacy Policy</a></div>
					</div>

					<div class="col_half col_last tright">
						<div class="fright clearfix">
							<a href="#" class="social-icon si-small si-borderless si-facebook">
								<i class="icon-facebook"></i>
								<i class="icon-facebook"></i>
							</a>

							<a href="#" class="social-icon si-small si-borderless si-twitter">
								<i class="icon-twitter"></i>
								<i class="icon-twitter"></i>
							</a>

							<a href="#" class="social-icon si-small si-borderless si-gplus">
								<i class="icon-gplus"></i>
								<i class="icon-gplus"></i>
							</a>

							<a href="#" class="social-icon si-small si-borderless si-pinterest">
								<i class="icon-pinterest"></i>
								<i class="icon-pinterest"></i>
							</a>

							<a href="#" class="social-icon si-small si-borderless si-vimeo">
								<i class="icon-vimeo"></i>
								<i class="icon-vimeo"></i>
							</a>

							<a href="#" class="social-icon si-small si-borderless si-github">
								<i class="icon-github"></i>
								<i class="icon-github"></i>
							</a>

							<a href="#" class="social-icon si-small si-borderless si-yahoo">
								<i class="icon-yahoo"></i>
								<i class="icon-yahoo"></i>
							</a>

							<a href="#" class="social-icon si-small si-borderless si-linkedin">
								<i class="icon-linkedin"></i>
								<i class="icon-linkedin"></i>
							</a>
						</div>

						<div class="clear"></div>

						<i class="icon-envelope2"></i> info@canvas.com <span class="middot">&middot;</span> <i class="icon-headphones"></i> +628XX-XXXX-XXXX <span class="middot">&middot;</span> <i class="icon-skype2"></i> CanvasOnSkype

						<div class="clear"></div>
						
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item"><a href="#">Agenda</a></li>
							<li class="breadcrumb-item"><a href="#">Galery</a></li>
							<li class="breadcrumb-item active" aria-current="page">Events</li>
						</ol>

					</div>

				</div>

			</div><!-- #copyrights end -->

		</footer>

	</div>
	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>

	<!-- External JavaScripts
	============================================= -->
	<script src="{{asset('/frontend')}}/js/jquery.js"></script>
	<script src="{{asset('/frontend')}}/js/plugins.js"></script>

	<!-- Footer Scripts
	============================================= -->
	<script src="{{asset('/frontend')}}/js/functions.js"></script>
</body>
</html>