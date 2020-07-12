<?php
session_start();
require 'koneksi/koneksi.php';
$data = mysqli_query($conn, "SELECT * FROM alkes");
$id=$_GET["id"];

$result=mysqli_query($conn,"SELECT * from alkes WHERE id=$id");

foreach ($result as $data) {
	$id = $data["id"];
	$nama = $data["nama"];
	$stok = $data["stok"];
	$gambar = $data["gambar"];
	$harga = $data["harga"];
	$perusahaan = $data["perusahaan"];
}
if (isset($_POST['keranjang'])) {
	if (isset($_SESSION['keranjang'])) {
		$keranjang = $_SESSION['keranjang'];
		$keranjang[] = $_POST;
	}
	else $keranjang[] = $_POST;

	// unset($_SESSION['keranjang']);
	$_SESSION['keranjang'] = $keranjang;
	echo "<script>alert('Alkes telah masuk di keranjang anda')</script>";
}

require 'header.php';
?>
<br><br><br><br>
<div class="text_section">
	<div class="container">
		<div class="row">

			<!-- Text Section Image -->
			<div class="col-lg-5">
				<div class="text_section_image"><img src="admin/img/<?= $gambar?>" width="400px" alt=""></div>
			</div>

			<!-- Text Section Content -->
			<div class="col-lg-7">
				<div class="text_section_content">
					<form method="POST">
						<div class="section_title"><h2><?= $nama?></h2></div>
						<div class="text_section_text">
							<div class="card-view">
								<h3><i class="fa fa-money" style="color:#0000FF"> Rp. <?= $harga?></i></h3>
								<h4>Stok : <?= $stok?> </h4>
								<!-- <h4><i>Expired : <?= $expired?></i></h4> -->
								<h4>Supplier : <?= $perusahaan?></h4>
							</div>	
						</div>
						<hr>
						<h4>Masukkan Jumlah Beli :</h4>
						<div class="form-inline">

							<a href="javascript:;" role="button" id="kurang" name="beli" class="btn btn-primary rounded-0"> - </a>
							<input id="jumlah" class="form-control rounded-0" name="jumlah" style="width:50px" type="text" readonly value="0">
							<input type="hidden" name="nama" value="<?= $nama?>">	
							<input type="hidden" name="harga" value="<?= $harga?>">	
							<input type="hidden" name="gambar" value="<?= $gambar?>">
							<input type="hidden" name="tipe" value="alkes">	
							<input type="hidden" name="id" value="<?= $id?>">	
							<input type="hidden" id="stok" value="<?= $stok?>">
							<?php if ($stok <= 0){  ?>	
							<button  type="button" id="tambah" name="beli" class="btn btn-primary rounded-0" disabled=""> + </button><?php } else {?>
							<a href="javascript:;" role="button" id="tambah" name="beli" class="btn btn-primary rounded-0"> + </a> <?php } ?>
						</div>
					</div>	

					<div class="mt-3">
						<a href="alkes.php"  name="beli" class="btn btn-outline-primary btn-lg" style="width:150px">Kembali</a>
						<button type="submit" name="keranjang" class="btn btn-outline-primary btn-lg" style="width:150px">Keranjang</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
</div>
</div>
<?php 
require 'footer.php';
?>
<script type="text/javascript">
	$(document).ready(function() {
		$('#tambah').click(function() {

			var jumlah = $('#jumlah').val();
			var datastok = $('#stok').val();
			var stok = datastok - jumlah;
			var jum = parseInt(jumlah)+1;
			$('#jumlah').val(jum);
			if (stok<=0) {
				alert('Stok Kurang');
				$('#jumlah').val('0');
			}
			})
		$('#kurang').click(function() {
			var jumlah = $('#jumlah').val();
			var jum = parseInt(jumlah)-1;
			$('#jumlah').val(jum);

			if (parseInt(jumlah)<=1)  {
				$('#jumlah').val(1);
			};
		});
	})
</script>