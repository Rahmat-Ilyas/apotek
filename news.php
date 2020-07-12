<?php
	session_start();
	require 'koneksi/koneksi.php';
	// $data = mysqli_query($conn, "SELECT * FROM tb_artikel");
	$datas = mysqli_query($conn, "SELECT * FROM tb_artikel");
	require 'header.php';
?>
<?php 
if(isset($_GET['cari'])){
	$cari = $_GET['cari'];
	$data = mysqli_query($conn,"SELECT * FROM tb_artikel where judul like '%".$cari."%'");				
}else{
	$data = mysqli_query($conn,"SELECT * FROM tb_artikel");		
}
?>
	
	<!-- Home -->

	<div class="home">
		<div class="home_background parallax-window" data-parallax="scroll" data-image-src="assetFront/images/artikel.jpg" data-speed="0.8"></div>
		<div class="home_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="home_content">
							<div class="home_title"><span>Artikel</span></div>
							<div class="breadcrumbs">
								<ul>
									<li><a style="color:#000000" href="index.php">Beranda</a></li>
									<li style="color:#000000">Artikel</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- News -->

	<div class="news">
		<div class="container">
			<div class="row">
				
				<!-- News Posts -->
				<div class="col-lg-8">
					<div class="news_posts">
						
						<!-- News Post -->
						<?php foreach ($data as $dta) : ?>

							<div class="news_post">
								<div class="news_image">
									<img src="admin/img/<?= $dta["gambar"]?>" height="400px" width="800px" alt="">
								</div>
								<div class="news_body">
									<div class="news_title"><a href="#"><?= $dta["judul"]?></a></div>
									<div class="news_info">
										<ul>
											<li class="news_author"><a><?= $dta["tgl_buat"]?></a></li>
										</ul>
									</div>
									<div class="news_text">
										<?= substr($dta["konten"],0,90)?><p>..</p>
									</div>
									<div class="news_link"><a href="singlenews.php?id=<?= $dta["id"] ?>">Read More</a></div>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
					<div class="news_page_nav">
						<!-- <ul>
							<li class="active"><a href="#">01.</a></li>
							<li><a href="#">02.</a></li>
							<li><a href="#">03.</a></li>
						</ul> -->
					</div>
				</div>

				<!-- Sidebar -->
				<div class="col-lg-4">
					<div class="sidebar">

						<!-- Search -->
						<div class="sidebar_search">
							<form action="#" id="sidebar_search_form" class="sidebar_search_form">
								<input type="text" name="cari" class="search_input" placeholder="Search" required="required">
								<button class="search_button"><img src="assetFront/images/search.png" alt=""></button>
							</form>
						</div>

						<!-- Archives -->
						<div class="sidebar_archives sidebar_section">
							<div class="sidebar_section_title">
								<div class="sidebar_title">Artikel</div>
							</div>
							<ul><?php foreach ($datas as $dta) : ?>
								<li><a href="singlenews.php?id=<?= $dta["id"] ?>"><?= $dta["judul"]?></a></li>
								<?php endforeach; ?>
							</ul>
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