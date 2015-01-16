<?php
if($_SERVER['REQUEST_METHOD']=='POST') {
	require('inc/login_page.inc.php');
	require('inc/login_functions.inc.php');
	require('inc/mysqli_connect.php');	
	list($check,$data) = check_login($dbc,$_POST['user'],$_POST['pass']);
	if($check) {
		session_start();
		$dt = date('Y-m-d H:i:s');
		$_SESSION['id'] = $data['Email'];
		$_SESSION['name'] = $data['Name'];
		$_SESSION['logindate'] = $dt;
		$id = $_SESSION['id'];
		$insQuery="INSERT INTO Logs (Email,Time) VALUES ('$id','$dt')";
		mysqli_query($dbc,$insQuery);
		//insert_log($db,$id,$dt);
		//setcookie('lastlogin',)
		redirect_user('loggedin.php');
		exit();
	}
	else {
		$errors = $data;
	}
	mysqli_close($dbc);
}
include('inc/login_page.inc.php');
?>