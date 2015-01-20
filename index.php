<?php $page_title = "Welcome";
include ('inc/header.html');
?>
</nav>
<?php 

echo '<br/><br/><span id="log">';
if(isset($_SESSION['id'])) {

		echo "Logged as " . $_SESSION['name'] . " (" . $_SESSION['id'] . ") - started at " . $_SESSION['logindate'];
		
	}
	else {
		echo "You are not logged in.";
	}
?>
</span>
		<h1>Welcome to LinkKeeper</h1>
		<p><em>LinkKeeper</em> is the funniest way to keep, share and manage your favourite bookmarks. Share linked information with other users.</p>
		<p>For now, this application is only available for a few, who are known as 'the chosen'. If you want to be part of this elite, please, contact us <a href="mailto:none@mailkeeper.com?subject=LinkKeeper%20Account">here</a>

<?php
include('inc/footer.html');
?>
