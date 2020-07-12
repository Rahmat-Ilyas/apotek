<?php 
	session_start();
	require 'header.php';
	require 'koneksi/koneksi.php';

	if (isset($_POST["kirim"])){
	tambah_ks($_POST);
}
 ?>
	<!-- Home -->

	<div class="home">
		<div class="home_background parallax-window" data-parallax="scroll" data-image-src="assetFront/images/kontak.jpg" data-speed="0.8"></div>
		<div class="home_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="home_content">
							<div class="home_title"><span>Kontak</span></div>
							<div class="breadcrumbs">
								<ul>
									<li><a style="color:#000000" href="index.php">Beranda</a></li>
									<li style="color:#000000">Kontak</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Contact -->

	<div class="contact">
		<div class="container">
			<div class="row">

				<!-- Contact Info -->
				<div class="col-lg-6">
					<div class="section_title"><h2>Kontak Kami</h2></div>
					<div class="contact_text">
						<p>Para Pembeli dapat mengirim kritik dan saran terhadap apotik kami.Kami dengan senang hati menerima semua kritik dan saran dari semua pihak.</p>
					</div>
					<ul class="contact_about_list">
						<li><div class="contact_about_icon"><img src="assetFront/images/phone-call.svg" alt=""></div><span>+45 677 8993000 223</span></li>
						<li><div class="contact_about_icon"><img src="assetFront/images/envelope.svg" alt=""></div><span>ApotikMadani@gmail.com</span></li>
						<li><div class="contact_about_icon"><img src="assetFront/images/placeholder.svg" alt=""></div><span>Jl. Bontotangnga No.50, Paccinongang, Kec. Somba Opu, Kabupaten Gowa</span></li>
					</ul>
				</div>

				<!-- Contact Form -->
				<div class="col-lg-6 form_col">
					<div class="contact_form_container">
						<form method="POST" id="contact_form" class="contact_form">
							<div class="row">
								<div class="col-md-6 input_col">
									<div class="input_container input_name"><input type="text" class="contact_input" name="nama" placeholder="Nama" required="required"></div>
								</div>
								<div class="col-md-6 input_col">
									<div class="input_container"><input type="email" class="contact_input" name="email" placeholder="Email" required="required"></div>
								</div>
							</div>
							<div class="input_container"><input type="text" class="contact_input" name="subjek" placeholder="Subjek" required="required"></div>
							<div class="input_container"><textarea class="contact_input contact_text_area" name="pesan" placeholder="Pesan" required="required"></textarea></div>
							<button type="submit" name="kirim" class="button contact_button">&nbsp&nbspKirim&nbsp&nbsp</button>
						</form>
					</div>
				</div>
			</div>
			<div class="row map_row">
				<div class="col">

					<!-- Contact Map -->

					<div class="contact_map">


						<!-- Google Map -->
						
						<div class="map">
							<div id="google_map" class="google_map">
								<div class="map_container">
									<iframe id="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1986.7289650438727!2d119.46964764735324!3d-5.190466765988867!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dbee3b6b32e8ccd%3A0xc749ca1ed38ed736!2sApotek+Madani+Farma!5e0!3m2!1sid!2sid!4v1565064333898!5m2!1sid!2sid" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
								</div>
							</div>
						</div>

					</div>

				</div>
			</div>
		</div>
	</div>

	<!-- Footer -->

<?php 
	require 'footer.php';
 ?>