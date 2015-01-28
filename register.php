<?php session_start();
if(isset($_SESSION['id'])) {
	include('inc/login_functions.inc.php');
	redirect_user('main.php');
	exit();
}
else {

/*PENDIENTE:
	Validacion campos del formulario...(funciones encapsuladas en otro php)
	Procesar formulario (misma pagina, claro está....)
	Si registro OK, vamos a loggedin o le obligamos a pasar por login.php?
	si registro no OK, idem.
	tabla de registro de registros en mysql?!?!?!??!?!
*/
	$page_title = "Register";
	include('inc/header.html');
	require('inc/validation_functions.inc.php');
	echo "joder";
	if($_SERVER['REQUEST_METHOD']=='POST') {
		echo "dentro de  post";
		$errors = array();
		$mail = trim($_POST['formMail']);
		$username = trim($_POST['formUser']);
		$pass = trim($_POST['formPass']);
		echo $mail . $username . $pass;
		
		if(validateMail($mail) && validateUserName($username) && validatePass($pass)) {
			echo "validado!";
			if(checkDBMail($mail) && checkDBUser($username)) {
				//insert user
				//insDB($user);
			}
			else {
				//showError($email,$userName);
			}
		}
		else {
			echo "no validado!";
			//showError($registerForm);
		}
	}
}
?>
<div id="login">
	<form name="register" method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
		<table>
			<tr>
				<td>e-Mail account</td>
				<td><input name="formMail" type="text"  maxlength="70"/></td>
			</tr>
			<tr>
				<td>Bookmarker Name</td>
				<td><input name="formUser" type="text"  maxlength="20"/></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input name="formPass" type="password"  maxlength="20"/></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" value="register"></input></td>
			</tr>
		</table>
	</form>
</div>
<?php include('inc/footer.html');?>
