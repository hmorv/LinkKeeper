<?php
function validateMail($m) {
	$pattern = '/[\w.-]+@[\w.-]+\.[A-Za-z]{2,6}/';
	return preg_match($pattern, $m);
}
function validateUserName($u) {
	$pattern = '/^\w{3,20}$/';
	return preg_match($pattern, $u);
}
function validatePass($p) {
	/*this is quite tricky...
	minimum length: & characters, maximum length: 20.
	user must password must check:
		-1 lowercase character
		-1 uppercase character
	*/
		$pattern = '((?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20})';
		return preg_match($pattern, $p);
	}
	function checkDBName($m) {
		require('inc/mysqli_connect.php');
		$query = "SELECT Email FROM Users WHERE Email = '$m'";
		$result = @mysqli_query($dbc,$query);
		//check if no rows, email can be used to register.
		if($result) {
			return true;
		}
		else {
			return false;
		}
	}
	function checkDBUser($u) {
		require('inc/mysqli_connect.php');
		$query = "SELECT Name FROM Users WHERE Name = '$u'";
		$result = @mysqli_query($dbc,$query);
		//check if no rows, email can be used to register.
		if($result) {
			return true;
		}
		else {
			return false;
		}
	}

	?>