<?php
//further versions: build an error(array) database!(?)

function redirect_user ($page='index.php') {
	/*this function builds an URL and send the user to it.
	To achieve that, URL is built using strings for the header + hostname + current directory.*/
	//La ultima concatenacion era inicialmente: dirname($S_SERVER['PHP_SELF'])
	$url = "http://" . $_SERVER['HTTP_HOST'] ."/LinkKeeper" ;
	$url = rtrim($url, '/\\');
	$url .= '/' . $page;
	echo $url;
	header("Location: $url");
	exit();
}
function check_login($dbc, $email = '', $pass = '') {
	/*this function checks login information. It takes three arguments: database connection,
	email and pass (both are optional).*/
	$errors=array();
	if(empty($email)) {
		$errors[] = 'Oops! You forgot to enter your email address...';
	} else {
		$e = mysqli_real_escape_string($dbc,trim($email));
	}
	if(empty($pass)) {
		$errors = 'Oops! You forgot to enter your password...';
	}
	else {
		$p = mysqli_real_escape_string($dbc,trim($pass));
	}
	if(empty($errors)) {
		$q = "SELECT Email, Name FROM Users WHERE Email='$e' AND Pass=SHA1('$p')";
		$r = mysqli_query($dbc,$q);
	}
	if(mysqli_num_rows($r) == 1) {
		//fetch results into $row
		$row = mysqli_fetch_array($r,MYSQLI_ASSOC);
		return array(true, $row);
	} else {
		//if there are no matches, then login info is wrong
		$errors[] = 'The email and password provided are wrong.';
	}
	return array(false,$errors);
}
/*function insert_log($database,$email,$time) {
	$query="INSERT INTO Logs (Email,Time) VALUES ('$email','$time')";
		return mysqli_query($database,$query);
}*/
?>