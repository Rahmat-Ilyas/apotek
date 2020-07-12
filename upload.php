<?php
session_start();
require 'koneksi/koneksi.php';



$result = mysqli_query($conn,"SELECT * FROM tb_resep ORDER BY id DESC");
$tampil = mysqli_fetch_assoc($result);
$id=$tampil['id']+1;

$getresep = explode(',', $tampil['konfirmasi']);
$getjumlah = explode(',', $tampil['jumlah']);

$biaya_admin = 2000;

if (isset($_POST["kirim"])){
	tambah_resep($_POST);
	setcookie('tampilkan',$id,time()+3600);
}
if (isset($_POST['batal'])) {

	setcookie('tampilkan','',time()-10);
	header('location:index.php');

}


if (isset($_POST['pesan'])) {
	foreach ($getresep as $i => $id) {
		$data = mysqli_query($conn, "SELECT * FROM apotik WHERE id=$id");
		$dta = mysqli_fetch_assoc($data);
		$id = $dta['id'];
		$nama = $dta['nama_obat'];
		$total = $getjumlah[$i];
		$harga = $dta['harga'];
		$gambar = $dta['gambar'];
		$data_session = ['jumlah' => $total, 'nama' => $nama, 'harga' => $harga, 'gambar' => $gambar, 'tipe' => 'obat', 'id' => $id, 'biaya_admin' => $biaya_admin];
		if (isset($_SESSION['keranjang'])) {
			$keranjang = $_SESSION['keranjang'];
			$keranjang[] = $data_session;
		}
		else $keranjang[] = $data_session;
		$_SESSION['keranjang'] = $keranjang;

	}

	setcookie('tampilkan','',time()-10);
	echo "<script>alert('Obat telah masuk di kereanjang anda , Silahkan Pilih Obat Lain');
	document.location.href = 'keranjang.php';
	</script>";



}

require 'header.php';
?>
<div class="services">
	<div class="container">
		<br><br>
		<div class="row mt-5">
			<div class="col">
				<div class="section_title"><h2>Upload Resep Anda</h2></div>
			</div>
		</div>
		<div class="row mt-5 ml-5">

			<!-- Service -->
			<center>
				<div class="col-md-12">
					<div class="row">
						<form method="POST" enctype="multipart/form-data">
							<div class="card-box">
								<img src="assetFront/images/images.png">
								<div class="service_title trans_200">Upload Resep</div>
								<div class="col-10 mt-3">
									<input type="file" class="form-control" name="foto">
								</div>
								<div class="service_text">
									<p>Layanan ini memberikan kemudahan bagi Anda untuk tebus obat resep tanpa antre secara online dengan adanya layanan upload resep dokter. </p>
								</div>
								<div class="mt-3">
									<button type="submit" id="kirim" name="kirim" class="btn btn-outline-primary btn-lg" style="width:150px">Kirim</button>
								</div>
							</div>

							<?php if (isset($_COOKIE['tampilkan'])) { 
								if ($tampil['status']=='Belum Acc') {?>
									<hr class="mt-5">
									<div id="data" class="container">
										<h2 class="text-center">Resep Anda Sedang Dalam Proses</h2>
										<a href="upload.php" class="btn btn-outline-primary"><i class="fa fa-spin fa-spinner" style="width: auto;height: auto; line-height: 1px; margin-right: 10px;"></i>Cek Pesanan</a>
									</div>
								<?php } else if (($tampil['status']=='Acc')&&($tampil['konfirmasi']!=='')){?>
									<hr class="mt-3 mb-3">
									<div id="data" class="container">
										<h5>Obat Yang Tersedia diapotik kami</h5>
										<table class="table table-bordered" autocomplete="on">
											<thead>
												<tr>
													<th>No</th>
													<th>Gambar</th>
													<th>Nama Obat</th>
													<th>Jumlah</th>
													<th>Harga</th>
													<th>Total</th>
												</tr>
											</thead>


											<tbody>
												<?php $n=1;?>
												<?php foreach ($getresep as $i => $id) : 
													$data = mysqli_query($conn, "SELECT * FROM apotik WHERE id=$id");
													$dta1 = mysqli_fetch_assoc($data);
													$total = $getjumlah[$i] * $dta1['harga'];
													$count[] = $total;

													?>
													<tr>
														<td><?=$n?></td>
														<td><img src="admin/img/<?= $dta1["gambar"]?>" style="width:20%"></td>
														<td><?= $dta1["nama_obat"]?></td>
														<td><?= $getjumlah[$i]?></td>
														<td><?= $dta1["harga"]?></td>
														<td><?= $total?></td>
													</tr>
													<?php $n++;?>
												<?php endforeach; ?>
												<?php $tb = array_sum($count);?>

											</tbody>
										</table>

										<div class="row justify-content-end text-right">
											<div class="col-6">
												<div class="row">
													<div class="col-md-8">Sub Total :</div>
													<div class="col-md-4">Rp. <?= $tb ?></div>
												</div>
												<div class="row">
													<div class="col-md-8">Biaya Admin :</div>
													<div class="col-md-4">Rp. <?= $biaya_admin ?></div>
												</div>
												<div class="row">
													<div class="col-md-8">Total Bayar :</div>
													<div class="col-md-4"><b style="font-size: 20px;">Rp.<?= $tb + $biaya_admin ?></b></div>
												</div>
											</div>
										</div>
										<div>
											<button name="batal" class="btn btn-outline-primary">Batal</button>
											<button type="submit" name="pesan" class="btn btn-outline-primary">Pesan</button>
										</div>
									</div>

								<?php } else {?>
									<hr class="mt-5">
									<div id="data" class="container">
										<h2 class="text-center">Maaf Obat Tidak Tersedia</h2>
										<button name="batal" class="btn btn-outline-primary">Batal</button>
									</div>

								<?php }} ?>
							</form>
						</div>
					</div>
				</center>
			</div>
		</div>
	</div>	

	<script type="text/javascript">
		$(document).ready(function(){
			$('#kirim').submit(function(){
				$('#data').removeAttr('hidden','')
			})

		})


	</script>
	<?php
	require 'footer.php';

	?>