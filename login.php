<?php session_start();
if(isset($_SESSION['id'])) {
		include('inc/login_functions.inc.php');
		redirect_user('main.php');
		exit();
	}
$page_title = "Login";
if($_SERVER['REQUEST_METHOD']=='POST') {
	require('inc/login_page.inc.php');
	require('inc/login_functions.inc.php');
	require('inc/mysqli_connect.php');	
	//collect data from query, if login ok, then check is true, $dats stores the query result.
	list($check,$data) = check_login($dbc,$_POST['user'],$_POST['pass']);
	if($check) {
		//start building session variables and insert into Logs table
		session_start();
		$dt = date('Y-m-d H:i:s');
		$_SESSION['id'] = $data['Email'];
		$_SESSION['name'] = $data['Name'];
		$_SESSION['logindate'] = $dt;
		$_SESSION['IP'] = $_SERVER['REMOTE_ADDR'];
		$id = $_SESSION['id'];
		$IP = $_SESSION['IP'];
		$insQuery="INSERT INTO Logs (Email,Time,IP) VALUES ('$id','$dt','$IP')";
		mysqli_query($dbc,$insQuery);
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
