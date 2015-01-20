<?php

/*PENDIENTE:
	Validacion campos del formulario.
	Procesar formulario
*/
$page_title = "Register";
include('inc/header.html');
?>
<php if($_SERVER['METHOD']=='POST') {
	
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