<?php
//this function builds a dropdownlist containing user's categories.
function buildCategories($user) {
	require('inc/mysqli_connect.php');
	$query = "SELECT CATName, IDCategory FROM Categories WHERE Owner='$user'";
	$result = @mysqli_query ($dbc, $query);
	if($result){
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			echo "<option value=\"".$row['IDCategory']."\">".$row['CATName']."</option>";
		}
		mysqli_free_result ($result); // Free up the resources.
	} else {
		echo (mysqli_error($dbc));
	}
	mysqli_close($dbc); // Close the database connection.
}

function buildBookmarks($user,$cat) {
	//this function builds a table showing Link names, URL and edit check.
	require('inc/mysqli_connect.php');
	$query = "SELECT L.LinkName, L.URL FROM Links AS L INNER JOIN Categories AS C ON L.CATParent = C.IDCategory WHERE C.Owner='$user' AND L.CATParent = '$cat'";
	$result = @mysqli_query ($dbc, $query);
	if($result) {
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			$t =  "<table>";
			$t += "<tr>";
			$t += "<td><a href=\"".$row['URL']."\" target=\"_blank\">".$row['LinkName']."</a></td>";
			$t += "<td id='nombre'>".$row['URL']."</td>";
			$t += "<td><label><input type='radio' name='radio' value=\"".$row['URL']."\">editar</label></input></td>";
			$t += "</tr>";
			$t += "</table>";
			echo "\$(\"enlacesMostrar\").append($t)";
		}
		mysqli_free_result ($result); // Free up the resources.
	} else {
		echo (mysqli_error($dbc));
	}
	mysqli_close($dbc); // Close the database connection.
}

?>