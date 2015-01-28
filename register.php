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
	include('inc/header.php');
	require('inc/validation_functions.inc.php');
	if($_SERVER['REQUEST_METHOD']=='POST') {
		$errors = array();
		$mail = trim($_POST['formMail']);
		$username = trim($_POST['formUser']);
		$pass = trim($_POST['formPass']);
		if(validateMail($mail) && validateUserName($username) && validatePass($pass)) {
			if(checkDBMail($mail)) {
				if(checkDBUser($username)) {
					if(insDB($mail,$username,$pass)) {
						echo "<p>Welcome $username, you are now a LinkKeeper user!!\n Email has been sent to $mail, please check your inbox.</p>";
						//mail confirmation
						$to = $mail;
						$subject = "Welcome to LinkKeeper";
						$txt = "Dear $username,"."\n". "you are now registered in the best, coolest, and 'geekest' place in the Internet!. Thanks to Linkkeper you can save and manage your favourite bookmars. Additions to this service are implemented every week, so this thing will grow in a few!."."\n". "Have fun!"."\n\n\n\n". "The RunkKeeper Development Team";
						$headers = "From: webmaster@LinkKeeper.com";
						mail($to,$subject,$txt,$headers);
						echo "<a href='login.php'>Log in</a>";
					}
					else {
						echo "<p>Internal database error, please check later...</p>";
					}
				}
				else {
					echo "<p>Email $mail already in use.</p>";
				}
			}	
			
		}
		else {
			array_push($errors,"<h3>Error!</h3>");
			if(!validateMail($mail)) {
				array_push($errors,"<p>check your Email format.</p>");
			}
			if(!validateUserName($username)) {
				array_push($errors,"<p>check your user name.</p>");

			}
			if(!validatePass($pass)) {
				array_push($errors,"<p>password strength not enough it must containat least: 1 lowercase, 1 uppercase, 1 numeric character</p>");
			}
			foreach($errors as $e) {
				echo $e;
			}
		}
	}
}
?>
<div id="login">
	<form name="register" method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
		<table>
			<tr>
				<td>e-Mail account</td>
				<td><input name="formMail" type="text"  maxlength="70" value="<?php if(isset($_POST['formMail'])){echo $_POST['formMail'];}?>"/></td>
			</tr>
			<tr>
				<td>Bookmarker Name</td>
				<td><input name="formUser" type="text"  maxlength="20" value="<?php if(isset($_POST['formUser'])){echo $_POST['formUser'];}?>"/></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input name="formPass" type="password"  maxlength="20" value="<?php if(isset($_POST['formPass'])){echo $_POST['formPass'];}?>"/></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" value="register"></input></td>
			</tr>
		</table>
	</form>
</div>
<?php include('inc/footer.php');?>
