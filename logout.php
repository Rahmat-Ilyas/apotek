<?php
	
	session_start();
	if ($_SESSION['login_admin'] == true) {
		setcookie('masuk_admin', '', time()-3600);
	}
	if ($_SESSION['login_staff'] == true) {
		setcookie('masuk_staff', '', time()-3600);
	}
	

	session_unset();
	session_destroy();
	$_SESSION = [];

	header("Location: login.php");
	exit();
?>