<?php
$page_title = "Welcome to LinkKeeper";
include ('inc/header.html');
?>
</nav>
<?php 
	if(isset($_SESSION['id'])) {
		echo "logged as " . $_SESSION['name'] . " (" . $_SESSION['id'] . ") - started at " . $_SESSION['logindate'];
		
	}
	else {
		echo "logged as guest.";
	}
	?>
		<h1>Welcome to LinkKeeper</h1>
		<p><em>LinkKeeper</em> is the funniest way to keep, share and manage your favourite bookmarks. Share linked information with other users.</p>
		<p>For now, this application is only available for a few, who are known as 'the chosen'. If you want to be part of this elite, please, contact us <a href="mailto:none@mailkeeper.com?subject="LinkKeeper%20Account">here</a>

<?php
include('inc/footer.html');
?>
