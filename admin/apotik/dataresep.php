<?php
session_start();

$_SESSION["judul"] = "Data Resep";

if (!isset($_SESSION["login_admin"]))
{
	header("location: ../../login.php");
	exit();
}
require '../../koneksi/koneksi.php';
$data = mysqli_query($conn, "SELECT * FROM tb_resep");
$id=$_GET["id"];

$result=mysqli_query($conn,"SELECT * from tb_resep WHERE id='$id'");

$data = mysqli_fetch_assoc($result);
if (isset($_POST['konfir'])) {
	$data = $_POST['konfirmasi'];
	$datakonfir = implode(',', $data);
	foreach ($_POST['jum'] as $jb ) {
		if ($jb > 0) {
			$jm[] = $jb;

		}
	}

	$datajb = implode(',', $jm);

	mysqli_query($conn, "UPDATE tb_resep SET status='Acc',konfirmasi='$datakonfir',jumlah='$datajb' WHERE id=$id");
	header("location: resep.php");	
}


require '../../template/header.php';
$datas = mysqli_query($conn, "SELECT * FROM apotik");
?>
<div class="row">
	<div class="col-12">
		<div class="page-title-box">
			<h4 class="page-title float-left">Data Resep</h4>

			<ol class="breadcrumb float-right">
				<li class="breadcrumb-item"><a href="#">Master Data</a></li>
				<li class="breadcrumb-item active">Data Resep</li>
			</ol>

			<div class="clearfix"></div>
		</div>
	</div>
</div>
<!-- end row -->

<div class="row">
	<div class="col-lg-6">

		<div class="card-box">
			<h4 class="header-title m-t-0">Foto Resep</h4>
			<p class="text-muted font-14 m-b-20">
				Melakukan Pengecekan Resep Yang di Upload oleh Pelanggan
			</p>

			<form action="#" novalidate="">
				<div class="form-group">
					<center><img src="../img/resep/<?=$data['foto']?>" alt="image" style="width:100%"></center>
				</div>
			</form>
		</div> <!-- end card-box -->
	</div>
	<!-- end col -->

	<div class="col-lg-6">
		<div class="card-box">
			<h4 class="header-title m-t-0">Daftar Obat</h4>
			<p class="text-muted font-14 m-b-20">
				Daftar Obat yang Tersedia di apotik
			</p>
			
			<form role="form" method="POST">
				<table id="datatable" class="table table-bordered" autocomplete="on">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Obat</th>
							<th>Stok</th>
							<th>Validasi</th>
							<th>Jumlah</th>
						</thead>


						<tbody>
							<?php $i=1;?>
							<?php foreach ($datas as $dta) : ?>
								<tr>
									<td><?=$i?></td>
									<td><?= $dta["nama_obat"]?></td>
									<td><?= $dta["stok"]?></td>
									<td><input type="checkbox" name="konfirmasi[]" class="form-control" value="<?=$dta['id']?>"></td>	
									<td><input type="number" name="jum[]" id="jum" class="form-control" ></td>
								</tr>
								<?php $i++;
								$n[]=$dta['id'];
								?>
							<?php endforeach; ?>
						</tbody>
					</table>
					<button type="submit" name="konfir" class="btn btn-primary ml-3">Tidak Tersedia</button>
					<button type="submit" name="konfir" class="btn btn-primary ml-3">Konfirmasi</button>
				</form>
			</div>

		</div> <!-- end col -->
	</div>


	<?php
	require '../../template/footer.php';
	?>
