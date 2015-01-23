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
<form id='SendCat' method='POST' action='<?php $_SERVER['PHP_SELF']; ?>'>
<div id="AddCategories">
	<h1>Add Categories</h1>
	<input type='textbox' name='CategoriesAdd'> 
<?php

require('inc/mysqli_connect.php');
$CATINS = $_POST['CategoriesAdd'];
$Owner = $_SESSION['id'];

$q = "INSERT INTO Categories (Owner, CATName)
VALUES ('$Owner', '$CATINS')";

if ($dbc->query($q) === TRUE) {
    echo "New category created successfully";
} else {
    echo "Error: " . $q . "<br>" . $dbc->error;
}

mysqli_close($dbc);
?>
	<input type='submit' value='Send'> 
</div>
</form>


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


