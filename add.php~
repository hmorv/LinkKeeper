<?php
session_start();
if(!isset($_SESSION['id'])) {
		//require('login.php');
	require('inc/login_functions.inc.php');
	redirect_user('index.php');
}
$page_title = "Add";
include('inc/header.html');
/*Aquí se podrán realizar búsquedas por palabras (busqueda de enlaces, mostrara enlace y usuarios que la comparten),
y también buscar usuarios (por email o nombre de usuario).*/
?>
<h1>Add Bookmarks / Categories</h1>
<div id="AddCategories">


	<h1>Add Categories</h1>
	<input type='textbox' name='CategoriesAdd'> 
	<input type='submit' value='Send'> 
</div>

<div id="AddLinks">
	<h1> Add Links:</h1>
	<p> Select Link Name </p>
	<input type='text' name='LinkName'>
	<br/>
	<p> Insert Url </p>
	<textarea cols='50' rows='4' name='LinkUrl'>Place your URL Here</textarea>
	<br/>
	<input type='submit' value='Send'>
</div>
<?php include('inc/footer.html');?>


