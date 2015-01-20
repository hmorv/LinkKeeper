<?php session_start();
if(!isset($_SESSION['id'])) {
		//require('login.php');
		require('inc/login_functions.inc.php');
		redirect_user('index.php');
	}
$page_title = "Edit";
include('inc/header.html');
?>
<h1>Edit bookmarks / Categories</h1>
<?php
/*
Esquema general:
	-Recoger resultados SELECT usuario / Categorias
	-Recoger resultados SELECT Categoria / Usuario
	Mostrar resultados
	¿Permitir edicion desde aqui?*/
include('inc/footer.html');
?>