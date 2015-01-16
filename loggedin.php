<?php
	session_start();
	if(!isset($_SESSION['id'])) {
		include('inc/login_functions.inc.php');
		redirect_user('index.php');
		exit();
	}
	$page_title="Logged in!!";
	include('inc/header.html');
	echo "<div id=\"message\"><h1>Logged in!</h1><p>You are now logged in, " . $_SESSION['name'] . "!</p>";
	echo "<p><a href=\"main.php\">Main</a></p></div>";
	include('inc/footer.html');
?>