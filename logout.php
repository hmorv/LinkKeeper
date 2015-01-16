<?php
	session_start();
	$page_title = "logged out";
	if(!isset($_SESSION['id'])) {
		//require('login.php');
		require('inc/login_functions.inc.php');
		redirect_user('index.php');
	}
	else {
		$_SESSION=array();
		session_destroy();
		include('inc/header.html');
		//setcookie ('PHPESSID',date('Y-m-d H:i:s'),NULL,'/','',0,0);
	}
	echo "<div id=\"message\"><h1>You are logged out!</h1><p>See you soon!!</p></div>";
	include('inc/footer.html');
?>