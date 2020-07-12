<?php
	require 'koneksi/koneksi.php';
$data = mysqli_query($conn, "SELECT * FROM tb_artikel");
$id=$_GET["id"];

$result=mysqli_query($conn,"SELECT * from tb_artikel WHERE id=$id");

foreach ($result as $data) {
    $judul = $data["judul"];
    $gambar = $data["gambar"];
	$konten = $data["konten"];
    $tgl_buat = $data["tgl_buat"];
}

	require 'header.php';
?>
	
	<!-- Home -->

	<div class="home">
		<div class="home_background parallax-window" data-parallax="scroll" data-image-src="assetFront/images/services.jpg" data-speed="0.8"></div>
		<div class="home_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="home_content">
							<div class="home_title"><span>Detail Artikel</span></div>
							<div class="breadcrumbs">
								<ul>
									<li><a href="index.php">Beranda</a></li>
									<li><a href="news.php">Artikel</a></li>
									<li>Detail Artikel</li>
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
				<div class="col-lg-12">
					<div class="news_posts">
						
						<!-- News Post -->

						<div class="news_post">
							<div class="news_image">
								<img src="admin/img/<?= $gambar?>" width="1200px" height="500px" alt="">
							</div>
							<div class="news_body">
								<div class="news_title"><a href="#"><?= $judul?></a></div>
								<div class="news_info">
									<ul>
										<li class="news_author"><a><?= $tgl_buat?></a></li>
									</ul>
								</div>
								<div class="news_text">
									&emsp;&emsp;<?=$konten?>	
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