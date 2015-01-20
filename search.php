<?php
session_start();
if(!isset($_SESSION['id'])) {
		//require('login.php');
		require('inc/login_functions.inc.php');
		redirect_user('index.php');
	}
$page_title = "Search";
include('inc/header.html');
/*Aquí se podrán realizar búsquedas por palabras (busqueda de enlaces, mostrara enlace y usuarios que la comparten),
y también buscar usuarios (por email o nombre de usuario).*/
?>
<div id="login">
<h1>Edit Search Bookmarks / Users</h1>

</div>
<?php include('inc/footer.html');?>
