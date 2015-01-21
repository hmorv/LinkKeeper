<?php session_start();
if(isset($_SESSION['id'])) {
	include('inc/login_functions.inc.php');
	redirect_user('main.php');
	exit();
}
/*PENDIENTE:
	Validacion campos del formulario.
	Procesar formulario
*/
	$page_title = "Register";
	include('inc/header.html');
	if($_SERVER['METHOD']=='POST') {
		require('inc/validation_functions.inc.php');
		//validar campos
		//enviar datos
		//lectura resultados
		//visualizacion resultados

	} ?>
	<div id="login">
		<form name="register" method="POST" action="register.php">
			<table>
				<tr>
					<td>e-Mail account</td>
					<td><input name="regemail" type="text"  maxlength="70"/></td>
				</tr>
				<tr>
					<td>Bookmarker Name</td>
					<td><input name="reguser" type="text"  maxlength="10"/></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input name="regpass" type="password"  maxlength="20"/></td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" value="send"></input></td>
				</tr>
			</table>
		</form>
	</div>
	<?php include('inc/footer.html');?>