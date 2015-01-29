<?php session_start();
	if(!isset($_SESSION['id'])) {
		include('inc/login_functions.inc.php');
		redirect_user('index.php');
		exit();
	}
	$page_title="Welcome, ". $_SESSION['name'];
	include('inc/header.php');
	echo "<div id=\"message\"><h1>Logged in!</h1><p>You are now logged in, " . $_SESSION['name'] . "!</p>";
	echo "Your public IP is: ".$_SESSION['IP'];
	echo "<p><a href=\"main.php\">Main</a></p></div>";
	include('inc/footer.php');
?>