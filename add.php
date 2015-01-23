<?php
session_start();
if(!isset($_SESSION['id'])) {
		//require('login.php');
	require('inc/login_functions.inc.php');
	redirect_user('index.php');
}
	require('inc/management_functions.inc.php');
	//array that stores user categories
	$catArray = array();
	//array that stores links from user categories
	$linksArray = array();
	//load database data to arrays
	$catArray = getCategories($userid);
	$linksArray = getLinks($linksArray,$userid);
	$userid = $_SESSION['id'];
	$page_title = "Add";
	include('inc/header.html');
?>

<h1>Add Bookmarks / Categories</h1>
<form id='SendCat' method='POST' action='<?php $_SERVER['PHP_SELF']; ?>'>
<div id="AddCategories">
	<h1>Add Categories</h1>
	<input type='textbox' name='CategoriesAdd'> 
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	// Handle the form.
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
	
}

?>
<input type='submit' value='Send'> 
</div>
</form>


<form id='SendIns' method='POST' action='<?php $_SERVER['PHP_SELF']; ?>'>
<div id="AddLinks">
	<h1> Add Links:</h1>

	<p> Select Category </p>
	<select name="Categories">
		<?php $catArray = getCategories($userid);echo $catArray; buildCategories($catArray); ?>
	</select>

	<p> Select Link Name </p>
	<input type='text' name='LinkName'>
	<br/>

	<p> Insert Url </p>
	<textarea cols='50' rows='4' name='LinkUrl'>Place your URL Here</textarea>
	<br/>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	// Handle the form.
	require('inc/mysqli_connect.php');

$Category = $_POST['Categories'];
$LinkName = $_POST['LinkName'];
$URL = $_POST['LinkUrl'];


$q = "INSERT INTO Links (LinkName, URL, CATParent)
VALUES ('$LinkName', '$URL', '$Category')";

if ($dbc->query($q) === TRUE) {
    echo "New Link Added Successfully";
} else {
    echo "Error: " . $q . "<br>" . $dbc->error;
}

mysqli_close($dbc);
	
}

?>
	<input type='submit' value='Send'>
</div>
</form>
<?php include('inc/footer.html');?>


