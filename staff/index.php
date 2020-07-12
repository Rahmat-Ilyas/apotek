<?php 
session_start();

$_SESSION["judul"] = "Dashboard";

if (!isset($_SESSION["login_staff"]))
{
	header("location: ../login.php");
	exit();
}
require '../koneksi/koneksi.php';
require '../staff/header.php';
?>

<div class="row">
	<div class="col-12">
		<div class="page-title-box">
			<h4 class="page-title float-left">Dashboard</h4>

			<ol class="breadcrumb float-right">
				<li class="breadcrumb-item"><a href="#">Apotik Madani Farma</a></li>
				<li class="breadcrumb-item active">Dashboard</li>
			</ol>

			<div class="clearfix"></div>
		</div>
	</div>
</div>
<!-- end row -->

<div class="row">
	<div class="col-xl-12">
		<div class="card-box">
			<h4 class="header-title text-center">Selamat Datang Di Apotik Madani Farma</h4>
			<br><br>
			<div class="row-10">
				<center>
					<img src="../assetFront/images/reski.png">
				</center>
			</div>

			<canvas id="transactions-chart" height="350" class="mt-4"></canvas>
		</div>
	</div>


	<?php require '../staff/footer.php' ?>