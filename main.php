<?php session_start();
if(!isset($_SESSION['id'])){
	require('inc/login_functions.inc.php');
	redirect_user('index.php');
}
else {
	$page_title = "Main";
	include('inc/header.html');
}
?>
<h1>BookMarks screen</h1>
<p>Hi <?php echo $_SESSION['name']?>, your categories and bookmarks:</p>

<div id="categoriasMostrar">
<p> Select Category </p>
<select name="Categories" id="CAT">

<?php 

require('inc/mysqli_connect.php');
$user=$_SESSION['id'];
$q = "SELECT CATName, IDCategory FROM Categories WHERE Owner='$user'";
$r = @mysqli_query ($dbc, $q);


while ($row = mysqli_fetch_array($r, MYSQLI_NUM)) {
	echo "<option value=\"$row[1]\">$row[0]</option>\n";
}



?>

</select>
</div>

<div id="enlacesMostrar">
<p> Your links from the chosen category: </p>

<table border="1">
<?php
$q1 = "SELECT LinkName, URL FROM Links INNER JOIN Categories ON Links.IDCategory=Categories.IDCategory WHERE Owner='$user'";
$r1 = @mysqli_query ($dbc, $q1);


while ($row = mysqli_fetch_array($r1, MYSQLI_NUM)) {
	echo "<tr><td><a href=\"$row[1]\" target=\"_blank\">$row[0]</a></td><td id='nombre'>$row[1]</td><td><label><input type='radio' name='radio' value=\"$row[1]\">Editar</label></input></td></tr> ";
}

mysqli_free_result ($r); // Free up the resources.
mysqli_close($dbc); // Close the database connection.
?>
</table>
<?php include('inc/footer.html');?>
