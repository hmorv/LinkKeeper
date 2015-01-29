<?php
session_start();
if(!isset($_SESSION['id'])) {
		//require('login.php');
		require('inc/login_functions.inc.php');
		redirect_user('index.php');
	}
$page_title = "Add";
include('inc/header.php');

require('inc/management_functions.inc.php');

//$catArray= array();



?>
<h1>Add Bookmarks / Categories</h1>
<div id="AddCategories">


<h1>Add Categories:</h1>
<input type='textbox' name='CategoriesAdd'> 
<input type='submit' value='Send'> 
</div>

<div id="AddLinks">
<h1> Add Links:</h1>
<p> Select Category </p>
<select name="CategoriesShow" id="CATSH">
<?php 

require('inc/mysqli_connect.php');

$a = $_SESSION['id'];
$q = "SELECT CATName FROM Categories WHERE Owner = '$a' ";
$r = @mysqli_query ($dbc, $q);


while ($row = mysqli_fetch_array($r, MYSQLI_NUM)) {
	echo "<option value=\"$row[0]\">$row[0]</option>\n";
}

mysqli_free_result ($r); // Free up the resources.
mysqli_close($dbc); // Close the database connection.

?>
</select>
<p> Select Link Name </p>
<input type='text' name='LinkName'>
<br/>
<p> Insert Url </p>
<textarea cols='50' rows='4' name='LinkUrl'>Place your URL Here</textarea>
<br/>
<input type='submit' value='Send'>
<?php include('inc/footer.php');?>


