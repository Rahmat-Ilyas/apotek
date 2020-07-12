<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Madani Farma</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="CareMed demo project">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="/medik_rev/asset/images/reski.png">
	<link rel="stylesheet" type="text/css" href="assetFront/styles/bootstrap4/bootstrap.min.css">
	<link href="assetFront/plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="assetFront/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="assetFront/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
	<link rel="stylesheet" type="text/css" href="assetFront/plugins/OwlCarousel2-2.2.1/animate.css">
	<link rel="stylesheet" type="text/css" href="assetFront/styles/main_styles.css">
	<link rel="stylesheet" type="text/css" href="assetFront/styles/responsive.css">
</head>
<body>

	<div class="super_container">
		
		<!-- Header -->

		<header class="header trans_200">
			
			<!-- Top Bar -->
			<div class="top_bar">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="top_bar_content d-flex flex-row align-items-center justify-content-start">
								<div class="emergencies  d-flex flex-row align-items-center justify-content-start ml-auto"><i class="fa fa-fw fa-map-marker"></i>Jl. Bontotangnga No.50, Paccinongang, Kec. Somba Opu, Kabupaten Gowa</div>
							</div>

						</div>
					</div>
				</div>
			</div>

			<!-- Header Content -->
			<div class="header_container">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="header_content d-flex flex-row align-items-center justify-content-start">
								<nav class="main_nav ml-auto">
									<ul>
										<li><a href="index.php">Beranda</a></li>
										<li><a href="about.php">Tentang Kami</a></li>
										<li><a href="services.php">Layanan</a></li>
										<li><a href="news.php">Artikel</a></li>
										<li><a href="contact.php">Kontak</a></li>
										<li>
											<a href="keranjang.php"><i class="fa fa-2x fa-cart-arrow-down"></i>
												<?php 
												if (isset($_SESSION['keranjang'])) { ?>
												<span class="badge badge-danger badge-pill pull-right"><?= count($_SESSION['keranjang']) ?></span>
												<?php } ?>
											</a>
										</li>
									</ul>
								</nav>
								<div class="hamburger ml-auto"><i class="fa fa-bars" aria-hidden="true"></i></div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Logo -->
			<div class="logo_container_outer">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="logo_container">
								<a href="#">
									<div class="logo_content d-flex flex-column align-items-start justify-content-center">
										<div class="logo_line"></div>
										<img src="assetFront/images/reski.png" width="150px" height="80px" alt="">
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>	
			</div>

		</header>

		<!-- Menu -->

		<div class="menu_container menu_mm">

			<!-- Menu Close Button -->
			<div class="menu_close_container">
				<div class="menu_close"></div>
			</div>

			<!-- Menu Items -->
			<div class="menu_inner menu_mm">
				<div class="menu menu_mm">
					<ul class="menu_list menu_mm">
						<li class="menu_item menu_mm"><a href="index.php">Beranda</a></li>
						<li class="menu_item menu_mm"><a href="about.php">Tentang Kami</a></li>
						<li class="menu_item menu_mm"><a href="services.php">Layanan</a></li>
						<li class="menu_item menu_mm"><a href="news.php">Artikel</a></li>
						<li class="menu_item menu_mm"><a href="contact.php">Kontak</a></li>
					</ul>
				</div>
				<div class="menu_extra">
					<div class="menu_appointment"><a href="#">Request an Appointment</a></div>
					<div class="menu_emergencies">For Emergencies: +563 47558 623</div>
				</div>

			</div>

		</div>
		
		<!-- Home -->

		<div class="home">
			<div class="home_slider_container">
				<!-- Home Slider -->
				<div class="owl-carousel owl-theme home_slider">
					
					<!-- Slider Item -->
					<div class="owl-item">
						<div class="home_slider_background" style="background-image:url(assetFront/images/reski.jpg)"></div>
						<div class="home_content">
							<div class="container">
								<div class="row">
									<div class="col">
										<div class="home_content_inner">
											<div class="home_title"><h1>Apotik Madani Farma</h1></div>
											<div class="home_text">
												<p>Apotik Terlengkap dan Pelayanan Terbaik</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- Slider Item -->
					<div class="owl-item">
						<div class="home_slider_background" style="background-image:url(assetFront/images/reski.jpg)"></div>
						<div class="home_content">
							<div class="container">
								<div class="row">
									<div class="col">
										<div class="home_content_inner">
											<div class="home_title"><h1>Apotik Madani Farma</h1></div>
											<div class="home_text">
												<p>Apotik Terlengkap dan Pelayanan Terbaik</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- Slider Item -->
					<div class="owl-item">
						<div class="home_slider_background" style="background-image:url(assetFront/images/reski.jpg)"></div>
						<div class="home_content">
							<div class="container">
								<div class="row">
									<div class="col">
										<div class="home_content_inner">
											<div class="home_title"><h1>Apotik Madani Farma</h1></div>
											<div class="home_text">
												<p>Apotik Terlengkap dan Pelayanan Terbaik</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>

				<!-- Slider Progress -->
				<div class="home_slider_progress"></div>
			</div>
		</div>

		<!-- 3 Boxes -->

		<div class="boxes">
			<div class="container">
				<div class="row">
					
					<!-- Box -->
					<div class="col-lg-4 box_col">
						<div class="box working_hours">
							<div class="box_icon d-flex flex-column align-items-start justify-content-center"><div style="width:29px; height:29px;"><img src="assetFront/images/alarm-clock.svg" alt=""></div></div>
							<div class="box_title">Jam Buka</div>
							<div class="working_hours_list">
								<ul>
									<li class="d-flex flex-row align-items-center justify-content-start">
										<div>Senin - Jum'at</div>
										<div class="ml-auto">8.00 – 19.00</div>
									</li>
									<li class="d-flex flex-row align-items-center justify-content-start">
										<div>Sabtu</div>
										<div class="ml-auto">9.30 – 17.00</div>
									</li>
									<li class="d-flex flex-row align-items-center justify-content-start">
										<div>Minggu</div>
										<div class="ml-auto">9.30 – 15.00</div>
									</li>
								</ul>
							</div>
						</div>
					</div>

					<!-- Box -->
					<div class="col-lg-4 box_col">
						<div class="box box_appointments">
							<div class="box_icon d-flex flex-column align-items-start justify-content-center"><div style="width: 29px; height:29px;"><img src="assetFront/images/bell.svg" alt=""></div></div>
							<div class="box_title">Cara Kerja</div>
							<div class="box_text">Anda dapat Membeli obat dengan mencari obat kemudian beli,tunggu kode pembelian.Bawa Kode ke Apotek Kami untuk pengambilan. </div>
						</div>
					</div>

					<!-- Box -->
					<div class="col-lg-4 box_col">
						<div class="box box_emergency">
							<div class="box_icon d-flex flex-column align-items-start justify-content-center"><div style="width: 37px; height:37px; margin-left:-4px;"><img src="assetFront/images/phone-call.svg" alt=""></div></div>
							<div class="box_title">Layanan Konsultasi</div>
							<div class="box_phone">+62 813 554 76036</div>
							<div class="box_emergency_text">Kontak yang bisa dihubungi ketika ingin konsultasi</div>
						</div>
					</div>

				</div>
			</div>
		</div>

		<div class="departments">
			<div class="departments_background parallax-window" data-parallax="scroll" data-image-src="assetFront/images/departments.jpg" data-speed="0.8"></div>
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="section_title section_title_light"><h2>Layanan Pemeriksaan</h2></div>
					</div>
				</div>
				<div class="row departments_row row-md-eq-height">
					
					<!-- Department -->
					<div class="col-lg-3 col-md-6 dept_col">
						<div class="dept">
							<div class="dept_image"><img src="assetFront/images/tensi.jpg" alt=""></div>
							<div class="dept_content text-center">
								<div class="dept_title">Pemeriksaan Tekanan Darah</div>
							</div>
						</div>
					</div>

					<!-- Department -->
					<div class="col-lg-3 col-md-6 dept_col">
						<div class="dept">
							<div class="dept_image"><img src="assetFront/images/darah.jpg" alt=""></div>
							<div class="dept_content text-center">
								<div class="dept_title">Pemeriksaan Golongan Darah</div>
							</div>
						</div>
					</div>

					<!-- Department -->
					<div class="col-lg-3 col-md-6 dept_col">
						<div class="dept">
							<div class="dept_image"><img src="assetFront/images/kolesterol.jpg" alt=""></div>
							<div class="dept_content text-center">
								<div class="dept_title">Pemeriksaan Kolesterol</div>
							</div>
						</div>
					</div>

					<!-- Department -->
					<div class="col-lg-3 col-md-6 dept_col">
						<div class="dept">
							<div class="dept_image"><img src="assetFront/images/asamurat.jpg" alt=""></div>
							<div class="dept_content text-center">
								<div class="dept_title">Pemeriksaan Asam Urat</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>

		<!-- Services -->

		<div class="services">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="section_title"><h2>Layanan Apotek Kami</h2></div>
					</div>
				</div>
				<div class="row services_row">

					<!-- Service -->
					<div class="col-lg-4 col-md-6 service_col">
						<a href="upload.php">
							<div class="service text-center trans_200">
								<div class="service_icon"><img class="svg" src="assetFront/images/resep.svg" alt=""></div>
								<div class="service_title trans_200">Tebus Resep</div>
								<div class="service_text">
									<p>Layanan ini memberikan kemudahan bagi Anda untuk tebus obat resep tanpa antre secara online dengan adanya layanan upload resep dokter. </p>
								</div>
							</div>
						</a>
					</div>

					<!-- Service -->
					<div class="col-lg-4 col-md-6 service_col">
						<a href="obat.php">
							<div class="service text-center trans_200">
								<div class="service_icon"><img class="svg" src="assetFront/images/obat.svg" alt=""></div>
								<div class="service_title trans_200">Beli Obat</div>
								<div class="service_text">
									<p>Anda dapat mencari dan membeli obat yang anda butuhkan.Jika sudah anda tinggal datang ke toko kami untuk langsung mengambil obat tanpa antre lagi.</p>
								</div>
							</div>
						</a>
					</div>

					<!-- Service -->
					<div class="col-lg-4 col-md-6 service_col">
						<a href="alkes.php">
							<div class="service text-center trans_200">
								<div class="service_icon"><img class="svg" src="assetFront/images/alkes.svg"  alt=""></div>
								<div class="service_title trans_200">Beli Alat Kesehatan</div>
								<div class="service_text">
									<p>Anda dapat mencari dan membeli alat kesehatan yang anda butuhkan.Jika sudah anda tinggal datang ke toko kami untuk langsung mengambil obat tanpa antre lagi.</p>
								</div>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
		<!-- Call to action -->

		<div class="cta">
			<div class="cta_background parallax-window" data-parallax="scroll" data-image-src="assetFront/images/cta.jpg" data-speed="0.8"></div>
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="cta_content text-center">
							<h2>Ingin Menambah Pengetahuan Tentang Penyakit ?</h2>
							<p>Anda bisa membuka menu artikel yang ada pada web kami</p>
							<div class="button cta_button"><a href="news.php">Artikel Kesehatan</a></div>
						</div>
					</div>
				</div>
			</div>		
		</div>

		<!-- Footer -->

		<footer class="footer">
			<div class="footer_container">
				<div class="container">
					<div class="row">
						
						<!-- Footer - About -->
						<div class="col-lg-4 footer_col">
							<div class="footer_about">
								<div class="footer_logo_container">
									<a href="#" class="d-flex flex-column align-items-center justify-content-center">
										<div class="logo_content">
											<img src="assetFront/images/reski.png" width="150px" height="80px" alt="">
										</div>
									</a>
								</div>
								<div class="footer_about_text">
									<p>Jl. Bontotangnga No.50, Paccinongang, Kec. Somba Opu, Kabupaten Gowa, Sulawesi Selatan 90223</p>
								</div>
								<ul class="footer_about_list">
									<li><div class="footer_about_icon"><img src="assetFront/images/phone-call.svg" alt=""></div><span>+45 677 8993000 223</span></li>
									<li><div class="footer_about_icon"><img src="assetFront/images/envelope.svg" alt=""></div><span>office@template.com</span></li>
									<li><div class="footer_about_icon"><img src="assetFront/images/placeholder.svg" alt=""></div><span>Main Str. no 45-46, b3, 56832, Los Angeles, CA</span></li>
								</ul>
							</div>
						</div>

						<!-- Footer - Links -->
						<div class="col-lg-4 footer_col">
							<div class="footer_links footer_column">
								<div class="footer_title">Menu</div>
								<ul>
									<li><a href="#">Beranda</a></li>
									<li><a href="#">Tentang Kami</a></li>
									<li><a href="#">Layanan</a></li>
									<li><a href="#">Artikel</a></li>
									<li><a href="#">Kontak</a></li>
									<li><a href="#">Services</a></li>
								</ul>
							</div>
						</div>

						<!-- Footer - News -->
						<div class="col-lg-4 footer_col">
							<div class="footer_news footer_column">
								<div class="footer_title">Layanan Tambahan</div>
								<ul>
									<li>
										<div class="footer_news_title"><a href="news.html">Layanan Pemeriksaan Tekanan Darah</a></div>
										<div class="footer_news_date">Rp. 10.000</div>
									</li>
									<li>
										<div class="footer_news_title"><a href="news.html">Layanan Pemriksaan Golongan Darah</a></div>
										<div class="footer_news_date">Rp. 10.000</div>
									</li>
									<li>
										<div class="footer_news_title"><a href="news.html">Layanan Pemeriksaan KAdar Kolesterol</a></div>
										<div class="footer_news_date">Rp. 20.000</div>
									</li>
									<li>
										<div class="footer_news_title"><a href="news.html">Layanan Pemeriksaan Kadar Asam Urat</a></div>
										<div class="footer_news_date">Rp. 20.000</div>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="copyright">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="copyright_content d-flex flex-lg-row flex-column align-items-lg-center justify-content-start">
								<div class="cr"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
									Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Apotik Madani Farma</a>
									<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></div>
									<div class="footer_social ml-lg-auto">
										<ul>
											<li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>			
				</div>
			</footer>
		</div>

		<script src="assetFront/js/jquery-3.2.1.min.js"></script>
		<script src="assetFront/styles/bootstrap4/popper.js"></script>
		<script src="assetFront/styles/bootstrap4/bootstrap.min.js"></script>
		<script src="assetFront/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
		<script src="assetFront/plugins/easing/easing.js"></script>
		<script src="assetFront/plugins/parallax-js-master/parallax.min.js"></script>
		<script src="assetFront/js/custom.js"></script>
	</body>
	</html>