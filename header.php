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
	<link rel="stylesheet" type="text/css" href="assetFront/styles/about.css">
	<link rel="stylesheet" type="text/css" href="assetFront/styles/about_responsive.css">
	<link rel="stylesheet" type="text/css" href="assetFront/styles/services.css">
	<link rel="stylesheet" type="text/css" href="assetFront/styles/services_responsive.css">
	<link rel="stylesheet" type="text/css" href="assetFront/styles/news.css">
	<link rel="stylesheet" type="text/css" href="assetFront/styles/news_responsive.css">
	<link rel="stylesheet" type="text/css" href="assetFront/styles/contact.css">
	<link rel="stylesheet" type="text/css" href="assetFront/styles/contact_responsive.css">

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
					</div>
					<div class="menu_extra">
						<div class="menu_appointment"><a href="#">Request an Appointment</a></div>
						<div class="menu_emergencies">For Emergencies: +563 47558 623</div>
					</div>

				</div>

			</div>