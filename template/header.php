 <?php 
 if (!isset($_SESSION["login_admin"]))
 {
 	header("location: ../login.php");
 	exit();
 }


 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8" />
 	<title><?= $_SESSION["judul"]; ?></title>
 	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
 	<meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
 	<meta content="Coderthemes" name="author" />
 	<meta http-equiv="X-UA-Compatible" content="IE=edge" />

 	<!-- App favicon -->
 	<link rel="shortcut icon" href="https://myproject-apotek.herokuapp.com/asset/images/reski.png">

 	<!-- DataTables -->
 	<link href="https://myproject-apotek.herokuapp.com/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
 	<link href="https://myproject-apotek.herokuapp.com/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
 	<!-- Responsive datatable examples -->
 	<link href="https://myproject-apotek.herokuapp.com/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

 	<!-- App css -->
 	<link href="https://myproject-apotek.herokuapp.com/asset/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
 	<link href="https://myproject-apotek.herokuapp.com/asset/css/icons.css" rel="stylesheet" type="text/css" />
 	<link href="https://myproject-apotek.herokuapp.com/asset/css/metismenu.min.css" rel="stylesheet" type="text/css" />
 	<link href="https://myproject-apotek.herokuapp.com/asset/css/style.css" rel="stylesheet" type="text/css" />


 	<script src="https://myproject-apotek.herokuapp.com/asset/js/modernizr.min.js"></script>

 </head>


 <body>

 	<!-- Begin page -->
 	<div id="wrapper">

 		<!-- Top Bar Start -->
 		<div class="topbar">

 			<!-- LOGO -->
 			<div class="topbar-left">
 				<a href="index.php" class="logo">
 					<span>
 						<img src="https://myproject-apotek.herokuapp.com/asset/images/reski.png" alt="" height="50">
 					</span>
 					<i>
 						<img src="https://myproject-apotek.herokuapp.com/asset/images/reski.png" alt="" height="28">
 					</i>
 				</a>
 			</div>

 			<nav class="navbar-custom">

 				<ul class="list-unstyled topbar-right-menu float-right mb-0">

 					<li class="dropdown notification-list">
 						<a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
 						aria-haspopup="false" aria-expanded="false">
 						<img src="https://myproject-apotek.herokuapp.com/asset/images/users/avatar-1.jpg" alt="user" class="rounded-circle"> <span class="ml-1"><i class="mdi mdi-chevron-down"></i> </span>
 					</a>
 					<div class="dropdown-menu dropdown-menu-right profile-dropdown ">
 						<!-- item-->
 						<div class="dropdown-item noti-title">
 							<h6 class="text-overflow m-0">Welcome !</h6>
 							<h6 class="text-overflow m-0">Admin</h6>
 						</div>

 						<!-- item-->
 						<a href="https://myproject-apotek.herokuapp.com/logout.php" class="dropdown-item notify-item">
 							<i class="fi-power"></i> <span>Logout</span>
 						</a>

 					</div>
 				</li>

 			</ul>

 			<ul class="list-inline menu-left mb-0">
 				<li class="float-left">
 					<button class="button-menu-mobile open-left waves-light waves-effect">
 						<i class="dripicons-menu"></i>
 					</button>
 				</li>
 				<li class="hide-phone app-search">
 					<form role="search" class="">
 						<input type="text" placeholder="Cari..." class="form-control">
 						<a href=""><i class="fa fa-search"></i></a>
 					</form>
 				</li>
 			</ul>

 		</nav>

 	</div>
 	<!-- Top Bar End -->


 	<!-- ========== Left Sidebar Start ========== -->
 	<div class="left side-menu">
 		<div class="slimscroll-menu" id="remove-scroll">

 			<!--- Sidemenu -->
 			<div id="sidebar-menu">
 				<!-- Left Menu Start -->
 				<ul class="metismenu" id="side-menu">
 					<li>
 						<a href="https://myproject-apotek.herokuapp.com/admin/">
 							<i class="fi-air-play"></i><span> Dashboard </span>
 						</a>
 					</li>

 					<li>
 						<a href="#"><i class="fa fa-fw fa-tasks"></i>Master Data<span class="menu-arrow"></span></a>
 						<ul class="nav-second-level" aria-expanded="false">
 							<li><a href="https://myproject-apotek.herokuapp.com/admin/apotik/resep.php"><i class="fa fa-user-md"></i> Data Resep
 								<span class="badge badge-danger badge-pill pull-right"><?= $notifikasi?></span>

 							</a></li>

 							<li><a href="https://myproject-apotek.herokuapp.com/admin/apotik/dataapotik.php"><i class="fa fa-fw fa-medkit"></i> Data Obat</a></li>
 							<li><a href="https://myproject-apotek.herokuapp.com/admin/apotik/datasupply.php"><i class="fa fa-fw fa-automobile"></i> Data Supplier</a></li>
 							<li><a href="https://myproject-apotek.herokuapp.com/admin/apotik/dataalkes.php"><i class="fa fa-fw fa-ambulance"></i> Data Alkes</a></li>
 							<li><a href="https://myproject-apotek.herokuapp.com/admin/apotik/dataartikel.php"><i class="fa fa-fw fa-file-text-o"></i> Data Artikel</a></li>
 						</ul>
 					</li>

 					<li>
 						<a href="#"><i class="fa fa-fw fa-credit-card "></i>Transaksi<span class="menu-arrow"></span></a>
 						<ul class="nav-second-level" aria-expanded="false">
 							<li><a href="https://myproject-apotek.herokuapp.com/admin/apotik/konfirmasi.php"><i class="fa fa fa-handshake-o"></i> Konfirmasi</a></li>
 							<li><a href="https://myproject-apotek.herokuapp.com/admin/apotik/datalaporan.php"><i class="fa fa-fw fa-file-text"></i> Laporan</a></li>
 						</ul>				
 					</li>

 					<li>
 						<li><a href="https://myproject-apotek.herokuapp.com/admin/apotik/kritik_saran.php"><i class="fa fa fa-envelope-open"></i>Kritik dan Saran</a></li>
 					</li>



 				</div>
 				<!-- Sidebar -->
 				<div class="clearfix"></div>

 			</div>
 			<!-- Sidebar -left -->

 		</div>
 		<!-- Left Sidebar End -->



 		<!-- ============================================================== -->
 		<!-- Start right Content here -->
 		<!-- ============================================================== -->
 		<div class="content-page">
 			<!-- Start content -->
 			<div class="content">
 				<div class="container-fluid">
