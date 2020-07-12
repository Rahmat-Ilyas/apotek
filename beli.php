<?php
session_start();
require 'header.php';

if (isset($_SESSION['beli'])) {
	$nama = $_SESSION['beli']['nama'];
	$harga = $_SESSION['beli']['harga'];
	$jumlah = $_SESSION['beli']['jumlah'];
	$total = $harga * $jumlah;
}
$booking = mysqli_query($conn, "SELECT * FROM tb_transaksi ORDER BY id DESC");
$get_id = mysqli_fetch_assoc($booking);
$id_psn = $get_id['id']+1;
?>
<div class="home">
	<div class="home_background parallax-window" data-parallax="scroll" data-image-src="assetFront/images/contact.jpg" data-speed="0.8"></div>
	<div class="home_container">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="home_content">
						<div class="home_title"><span>Keranjang</span></div>
						<div class="breadcrumbs">
							<ul>
								<li><a href="index.php">Beranda</a></li>
								<li>Keranjang</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container">

	<div class="row">
		<div class="col-md-8">
			<div class="card mb-5 mt-5">
				<h5 class="card-header"><?= $nama ?></h5>
				<div class="card-body ">
					<div class="row">
						<div class="col-md-2">
							<img src="admin/img/5d54d3f49339c.jpg" width="100px" class="rounded float-left" alt="...">
						</div>
						<div class="col-md-10 row">
							<p class="col-md-6 card-title">Jumlah Beli : <?= $jumlah ?></p>
							<p class="col-md-6 card-tittle">Harga : <?= $harga ?></p>
							<h5 class="col-md-12 card-title"><b>Total Harga : <?= $total ?></b></h5>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card mb-5 mt-5">
				<h5 class="card-header">Cetak / Lihat Struk</h5>
				<div class="card-body ">
				<h5 class="card-title">Kode Transaksi :</h5>
				<input type="text" style="color: black" name="kode_tr" class="form-control input_box" value="<?= "MDN-".sprintf('%05s', $id_psn) ?>" readonly>
					<p class="card-text">Silahkan Cetak / foto struk untuk pengambilan obat di Apotik</p>
					<br>
					<div class="col-md-12 text-right">
					<a href="#" class="btn btn-primary"><i class="fa fa-print"></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>



<?php
require 'footer.php';
?>