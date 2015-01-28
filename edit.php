<?php session_start();
if(!isset($_SESSION['id'])) {
	require('inc/login_functions.inc.php');
	redirect_user('index.php');
}
$page_title = "Edit";
include('inc/header.php');
?>
<h1>Edit bookmarks / Categories</h1>
<?phpinclude('inc/footer.php');?>