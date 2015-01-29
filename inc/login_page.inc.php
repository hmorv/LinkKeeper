<?php
$page_title = 'Login form';
include('inc/header.php');

//check if is there any error to display
if(isset($errors) && !empty($errors)) {
	echo '<h1 class="error">Error!</h1><p class="error">The following errors ocurred...<br/>';
	foreach($errors as $msg) {
		echo " -- $msg<br/>\n";
	}
	echo '</p><p class="error">Please try again</p>';
}
?>
<h1>Login</h1>
<div id="login">
	<p id="tituloLogin"> Login to Access Link Database </p>
	<form name="login" method="post" action="login.php">
		<table>
			<tr>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;User e-Mail:</td>
				<td><input name="user" type="text" id="user" maxlength="70"/></td>
			</tr>
			<tr>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Password: </td>
				<td><input name="pass" type="password" id="pass" maxlength="20" /><br /></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" value="Log In" id="botonlogin"/></td>
			</tr>
		</table>

	</form>
</div>
<?php include('inc/footer.php');
