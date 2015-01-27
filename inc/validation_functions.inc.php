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
	function checkDBName($mail) {
		return null;
	}
	function checkDBUser($username) {
		return null;
	}

	?>