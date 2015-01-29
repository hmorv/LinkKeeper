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
	include('inc/header.php');
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
//	echo "dentro post<br>";
	if(!empty($_POST['delete'])) {
	//	echo "dentro formLinks<br>";
		$todelete = $_POST['delete'];
		//echo $todelete;
		echo(count($todelete));
		for ($i=0; $i<count($todelete);$i++) {
			//echo $todelete[$v];
			echo "valor: ".$todelete[$i];
			eliminar($todelete[$i]);
		}

		/*
		falta que indique el resultado del DELETE al usuario y que recargue
		ambas tablas en pantalla.
		buildCategories($catArray);
		buildBookmarks($linksArray,$currentCAT);*/

	}
	//aquí debería ir el envío de datos para modificar /eliminar categorias y enlaces.
	//show Links
	/*
	echo "<div id=\"showLinks\">";
	$currentCAT = $_POST['Categories'];
	echo "<p> Links from category: ".$catArray[$currentCAT] ."</p>";
	buildBookmarks($linksArray,$_POST['Categories']);
	echo "</div>";*/
	
	
}
?>
<div id="title">
	<h1>Bookmarks screen</h1>
	<p>Hi <?php echo $user ?>, your categories and bookmarks are shown below:</p>
	<div id="showCategories">
		<p> Select Category </p>
		<form name="formCategories" action="" method="POST">
			<select name="Categories" id="CAT" onchange="this.form.submit()">
				<?php $catArray = getCategories($userid);echo $catArray; buildCategories($catArray); ?>
			</select>
		</form>
	</div>
	<div id="showLinks">
		<form name="formLinks" action="" method="POST">
			<?php
			$currentCAT = $_POST['Categories'];
			echo "Links from category: ". "<h1>".$catArray[$currentCAT]."</h1>";	
			buildBookmarks($linksArray,$currentCAT);
			?> 
		</form>
	</div>
</div>




<?php include('inc/footer.php');?>
