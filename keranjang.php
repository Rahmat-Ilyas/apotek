<?php

session_start();
if (isset($_SESSION['keranjang'])) {
	if (isset($_GET['del'])) {
		$del = $_GET['del'];
		unset($_SESSION['keranjang'][$del]);
		header('location: keranjang.php');
	}
	$data = $_SESSION['keranjang'];
	if(count($_SESSION['keranjang'])<=0){
		unset($_SESSION['keranjang']);

	}
}
require 'koneksi/koneksi.php';
if (isset($_POST["submit"])){

	foreach ($data as $dta) {
		$tgl = $_POST["tgl_tr"];
		$kode = $_POST["kode_tr"];
		$nama = $dta["nama"];
		$harga = $dta["harga"];
		$jumlah = $dta["jumlah"];
		$total = $dta['jumlah'] * $dta['harga'];
		$status = "waiting";

		mysqli_query($conn,"INSERT INTO tb_transaksi VALUES ('', '$tgl', '$kode', '$nama', '$harga', '$jumlah', '$total','$status')");
	}
	
	foreach ($_SESSION['keranjang'] as $das) {
		$id = $das['id'];
		$tipe = $das['tipe'];
		$jumlah = $das['jumlah'];

		if ($tipe == 'obat') {
			$getstok = mysqli_query($conn,"SELECT * FROM apotik WHERE id='$id'");
			$stok = mysqli_fetch_assoc($getstok);
			$set_stok = $stok['stok']-$jumlah;

			mysqli_query($conn,"UPDATE apotik SET stok ='$set_stok' WHERE id='$id'");
		}else{
			$getstok = mysqli_query($conn,"SELECT * FROM alkes WHERE id='$id'");
			$stok = mysqli_fetch_assoc($getstok);
			$set_stok = $stok['stok']-$jumlah;

			mysqli_query($conn,"UPDATE alkes SET stok ='$set_stok' WHERE id='$id'");
		}
	}

	$_SESSION['transaksi']=$_POST;
	header('location: laporan.php');

	setcookie('	',$id,time()+3600);

	// unset($_SESSION['keranjang']);

}
if (isset($_POST['keranjang'])) {
	if (isset($_SESSION['keranjang'])) {
		$keranjang = $_SESSION['keranjang'];
		$keranjang[] = $_POST;
	}
	else $keranjang[] = $_POST;

	// unset($_SESSION['keranjang']);
	$_SESSION['keranjang'] = $keranjang;
}
$booking = mysqli_query($conn, "SELECT * FROM tb_transaksi ORDER BY id DESC");
$get_id = mysqli_fetch_assoc($booking);
$id_psn = $get_id['id']+1;

require 'header.php';
?>
<div class="home">
	<div class="home_background parallax-window" data-parallax="scroll" data-image-src="assetFront/images/basket.jpg" data-speed="0.8"></div>
	<div class="home_container">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="home_content">
						<div class="home_title"><span>Keranjang</span></div>
						<div class="breadcrumbs">
							<ul>
								<li><a style="color:#000000" href="index.php">Beranda</a></li>
								<li style="color:#000000">Keranjang</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php if (isset($_SESSION['keranjang'])) { ?>
<div class="container">

	<div class="row">
		
		<div class="col-md-8">
			<?php foreach ($data as $i => $dta) { 
				$total = $dta['jumlah'] * $dta['harga'];
				$count[] = $total;

				$biaya_admin = 0;
				if (isset($dta['biaya_admin'])) {
					$biaya_admin = $dta['biaya_admin'];
				}
				?>
				<form method="POST">
					<div class="card mb-5 mt-5">
						<h5 class="card-header"><?= $dta['nama']?></h5>
						<div class="card-body ">
							<div class="row">
								<div class="col-md-2">
									<img src="admin/img/<?= $dta['gambar']?>" width="100px" class="rounded float-left" alt="...">
								</div>
								<div class="col-md-10 row">
									<p class="col-md-6 card-title">Jumlah Beli : <?= $dta['jumlah']?></p>
									<p class="col-md-6 card-tittle">Harga : <?= $dta['harga']?></p>
									<h5 class="col-md-12 card-title"><b>Total Harga :  <?= $total?></b></h5>
									<input type="hidden" name="totalj" value="<?=$total?>">	

									<div class="col-md-12 text-right">
										<a href="keranjang.php?del=<?=$i?>" class="btn btn-danger waves-light waves-effect"><i class="fa fa-trash"></i></a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php } ?>
				</div>
				<div class="col-md-4">
					<div class="card mb-5 mt-5">
						<h5 class="card-header">Total</h5>
						<div class="card-body ">
							<h5 class="card-title">Tanggal Transaksi :</h5>
							<input type="text" style="color: black" name="tgl_tr" class="form-control input_box" value="<?=date('Y-m-d')?>" readonly>	

							<h5 class="card-title mt-2">Kode Transaksi :</h5>
							<input type="text" style="color: black" name="kode_tr" class="form-control input_box" value="<?= "MDN-".sprintf('%05s', $id_psn) ?>" readonly>

							<h5 class="card-title mt-2">Sub Total : </h5>
							<input type="text" style="color: black" name="total" class="form-control input_box" value="<?= "Rp. ".array_sum($count)?>" readonly>

							<h5 class="card-title mt-2">Biaya Admin : </h5>
							<input type="text" style="color: black" name="total" class="form-control input_box" value="<?= "Rp. ".$biaya_admin ?>" readonly>

							<h5 class="card-title mt-2">Total Bayar : </h5>
							<input type="text" style="color: black" name="total" class="form-control input_box" value="Rp. <?= array_sum($count) + $biaya_admin?>" readonly>
							<p class="card-text">Silahkan Cetak / foto struk untuk pengambilan obat di Apotik</p>
							<br>

							<input type="hidden" name="nama" value="<?= $dta['nama']?>">	
							<input type="hidden" name="harga" value="<?= $dta['harga']?>">	
							<input type="hidden" name="jumlah" value="<?= $dta['jumlah']?>">	
							<div class="col-md-12 text-right">
								<button type="submit" name="submit" class="btn btn-primary fa fa-print" > Cetak Struk</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<?php } else {?>
	<div class="container">

		<div class="row">

			<div class="col-md-8">
				<div class="card mb-5 mt-5">
					<h5 class="card-header">Kosong</h5>
					<div class="card-body ">
						<div class="row">
							<div class="col-md-2">
								<img src="admin/img/keranjang.png" width="100px" class="rounded float-left" alt="...">
							</div>
							<div>
								<h3 style="color:#000000">Keranjang Kamu Belum Berisi</h3>
								<div class="button cta_button"><a href="services.php">Beli</a></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card mb-5 mt-5">
					<h5 class="card-header">Total</h5>
					<div class="card-body ">
						<h5 class="card-title">Tanggal Transaksi :</h5>
						<input type="text" style="color: black" name="tgl_tr" class="form-control input_box" value="<?= date('d-m-Y') ?>" readonly>					
						<h5 class="card-title mt-2">Kode Transaksi :</h5>
						<input type="text" style="color: black" name="kode_tr" class="form-control input_box" value="" readonly>
						<h5 class="card-title mt-2">Total Bayar : </h5>
						<input type="text" style="color: black" name="total" class="form-control input_box" value="" readonly>
						<p class="card-text">Silahkan Cetak / foto struk untuk pengambilan obat di Apotik</p>
						<br>
						<div class="col-md-12 text-right">
							<button type="submit" name="submit" class="btn btn-primary fa fa-print" > Cetak Struk</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>



	<?php
	require 'footer.php';
	?>