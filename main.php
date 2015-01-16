<?php
session_start();
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

<?php include('inc/footer.html');?>