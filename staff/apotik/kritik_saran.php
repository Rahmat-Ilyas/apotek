<?php 
session_start();

$_SESSION["judul"] = "Kritik Dan Saran";

if (!isset($_SESSION["login_staff"]))
{
	header("location: ../../login.php");
	exit();
}
require '../../koneksi/koneksi.php';

$data = mysqli_query($conn, "SELECT * FROM tb_ks");

require '../header.php';
?>
<div class="row">
	<div class="col-12">
		<div class="page-title-box">
			<h4 class="page-title float-left">Data Laporan</h4>

			<ol class="breadcrumb float-right">
				<li class="breadcrumb-item"><a href="#">Master Data</a></li>
				<li class="breadcrumb-item active">Data Laporan</li>
			</ol>

			<div class="clearfix"></div>
		</div>
	</div>
</div>
<!-- end row -->

<div class="row">
	<div class="col-12">
		<div class="card-box table-responsive">


		<table id="datatable" class="table table-bordered" autocomplete="on">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Pengirim</th>
						<th>Email</th>
						<th>Subjek</th>
						<th>Pesan</th>
					</tr>
				</thead>


				<tbody>
					<?php $i=1;?>
					<?php foreach ($data as $dta) : ?>
						<tr>
							<td><?=$i?></td>
							<td><?= $dta["nama"]?></td>
							<td><?= $dta["email"]?></td>
							<td><?= $dta["subjek"]?></td>
							<td><?= $dta["pesan"]?></td>
						</tr>
						<?php $i++;?>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php require '../footer.php'; ?>