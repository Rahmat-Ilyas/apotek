<?php 
session_start();
require 'koneksi/koneksi.php';
// $data = mysqli_query($conn, "SELECT * FROM apotik");
require 'header.php';
?>
<?php 
if(isset($_GET['cari'])){
	$cari = $_GET['cari'];
	$data = mysqli_query($conn,"SELECT * FROM apotik where nama_obat like '%".$cari."%'");				
}else{
	$data = mysqli_query($conn,"SELECT * FROM apotik");		
}
?>
<div class="services">
	<div class="container">
		<div class="row">
			<div class="col mt-5">
				<div class="section_title text-center"><h2>Daftar Obat Yang Tersedia</h2></div>
			</div>
		</div>
		<form action="obat.php" method="GET">
			<div class="col mt-3">
				<center>
					<label>Cari Obat : </label>
					<input type="text" name="cari" placeholder="Cari Merk Obat" class="search_input">
					<div class="mt-2">
						<input class="btn btn-primary fa fa-print" type="submit" value="Cari">
					</div>	
				</center>
			</div>
			<div class="row services_row">

				<!-- Service -->
				<?php foreach ($data as $dta) : ?>
					<div class="col-lg-3 col-md-6 service_col">
						<a href="detailobat.php?id=<?= $dta["id"] ?>">
							<div class="service text-center trans_200">
								<div class="dept_image"><img src="admin/img/<?= $dta["gambar"]?>" alt=""></div>
								<div class="service_title trans_200"><?= $dta["nama_obat"]?></div>
								<div class="service_title trans_200">
									<h4> Stok : <?= $dta["stok"]."  ".$dta["kategori"] ?></h4>
								</div>
								<div class="service_text">
									<p>Rp.<?= $dta["harga"]?></p>
								</div>
							</div>
						</a>
					</div>

					
				<?php endforeach; ?>
			</div>
		</form>
	</div>
</div>

<?php 
require 'footer.php';
?>