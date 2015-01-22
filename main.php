<?php session_start();

//if session is not started, redirect to index.php
if(!isset($_SESSION['id'])){
	require('inc/login_functions.inc.php');
	redirect_user('index.php');
}
else {
	//header load
	$page_title = "Main";
	$userid = $_SESSION['id'];
	$user = $_SESSION['name'];
	include('inc/header.html');
	require('inc/management_functions.inc.php');
	//array that stores user categories
	$catArray = array();
	//array that stores links from user categories
	$linksArray = array();
	//load database data to arrays
	$catArray = getCategories($userid);
	$linksArray = getLinks($linksArray,$userid);
}

if($_SERVER['REQUEST_METHOD']=='POST') {
	//show Links
	echo "<div id=\"showLinks\">";
	$currentCAT = $_POST['Categories'];
	echo "<p> Links from category: ".$catArray[$currentCAT] ."</p>";
	buildBookmarks($linksArray,$_POST['Categories']);
	echo "</div>";
}
?>
<div id="title">
<h1>Bookmarks screen</h1>
<p>Hi <?php echo $user ?>, your categories and bookmarks are shown below:</p>
</div>
<div id="showCategories">
	<p> Select Category </p>
	<form action="main.php" method="POST">
	<select name="Categories" id="CAT" onchange="this.form.submit()">
		<?php $catArray = getCategories($userid);echo $catArray; buildCategories($catArray); ?>
	</select>
	</form>
</div>

<?php include('inc/footer.html');?>