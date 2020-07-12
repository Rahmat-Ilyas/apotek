<?php 
session_start();
require 'header.php';
?>

<!-- Services -->
<div class="home">
	<div class="home_background parallax-window" data-parallax="scroll" data-image-src="assetFront/images/layanan.jpg" data-speed="0.8"></div>
	<div class="home_container">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="home_content">
						<div class="home_title"><span>Layanan</span></div>
						<div class="breadcrumbs">
							<ul>
								<li><a style="color:#000000" href="index.php">Beranda</a></li>
								<li style="color:#000000">Layanan</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

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
						<div class="service_icon"><img class="svg" src="assetFront/images/alkes.svg" alt=""></div>
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

<?php 
require 'footer.php';
?>