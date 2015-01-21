<?php
//this function builds a dropdownlist containing user's categories.
function buildCategories($a) {
	foreach($a as $key => $value) {
		echo $a; echo $key;
		echo "<option value=\"$key\">$value</option>";
		echo "JODER";
	}
	
}

function buildBookmarks($user) {
	//this function builds a table showing Link names, URL and edit check.
	require('inc/mysqli_connect.php');
	$query = "SELECT LinkName, URL FROM Links INNER JOIN Categories ON Links.IDCategory=Categories.IDCategory WHERE Owner='$user'";
	$result = @mysqli_query ($dbc, $query);
	if($result) {
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			echo "<tr>";
			echo "<td><a href=\"".$row['URL']."\" target=\"_blank\">".$row['LinkName']."</a></td>";
			echo "<td id='nombre'>".$row['URL']."</td>";
			echo "<td><label><input type='radio' name='radio' value=\"".$row['URL']."\">editar</label></input></td>";
			echo "</tr>";
		}
		mysqli_free_result ($result); // Free up the resources.
	} else {
		echo (mysqli_error($dbc));
	}
	mysqli_close($dbc); // Close the database connection.
}
function getCategories($user) {
	//this function receives an array and userid as arguments,
	//and then it returns the array filled with categories (id and name).
	require('inc/mysqli_connect.php');
	$cat = array();
	$query = "SELECT C.IDCategory,C.CATName FROM Categories as C WHERE C.Owner = '$user'";
	$result = @mysqli_query($dbc,$query);
	if($result) {
		while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
			$key = $row['IDCategory'];
			$value = $row['CATName'];
			$cat["$key"] = $value;
			echo "aqui";
		}
		echo "fuera de loop";
		echo $key;
		echo $value;
	}
	else {

		//mysqli_free_result($dbc);
	}
	mysqli_close($dbc);
	return ($cat);
}
function getLinks($a, $user) {
	require('inc/mysqli_connect.php');
	$links = array();
	$query = "SELECT U.IDLink, U.LinkName, U.URL AS U FROM Links INNER JOIN Categories AS C ON L.IDCategory=C.IDCategory WHERE Owner='$user'";
	$result = @mysqli_query($dbc,$query);
	if($result) {
		while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
			$IDLink = $row['IDLink'];
			$LinkName = $row['LinkName'];
			$URL = $row['URL'];
			$links["$IDLink"][0] = $IDLink;
			$links["$IDLink"][1] = $LinkName;
		}

	}
	else {
		//mysqli_free_result($dbc);
	}
mysqli_close($dbc);
	return ($links);
}
function fetchArray() {

}
function loadCategories($c,$IDCategory,$currentCAT) {
	return $c;
}
function loadBookmarks($c,$l,$IDLink,$linkName,$URL) {
	return $l;
}
function buildArray($a) {
	//this function builds a multidimensional array that contains link-array.
	//like this: Category1 => array(link1,link2,...,linkN)
	//SELECT C.IDCategory, C.CATName, L.IDLink, L.LinkName, L.URL FROM Categories AS C INNER JOIN Links AS L ON L.IDCategory = C.IDCategory WHERE C.Owner = 'hugo.moragues@gmail.com' ORDER BY C.IDCategory, L.LinkName
	require('inc/mysqli_connect().php');
	$user = $_SESSION['id'];
	$query = "SELECT C.IDCategory, C.CATName, L.IDLink, L.LinkName, L.URL FROM Categories AS C INNER JOIN Links AS L ON L.CATParent = C.IDCategory WHERE C.Owner = '$Owner' ORDER BY C.IDCategory, L.LinkName";
	//$query = "SELECT CATName, IDCategory FROM Categories WHERE Owner='$user'";
	$result = @mysqli_query($dbc, $query);
	if($result) {
		//fetch first result
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			//save current Category, it'll be checked in the while loop
			$IDCategory = $row['IDCategory'];
			$currentCAT = $row['CATName'];
			$IDLink = $row['IDLink'];
			$linkName = $row['LinkName'];
			$URL = $row['URL'];
			//array
			$link = array($IDLink,$linkName,$URL);
			//store first link into array
			$a[$currentCAT][$IDLink] = $link;
			//while links belong to the same category, get links.
			while($currentCAT == $row['IDCategory']) {
				while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
					//store remaining links into array
					$IDLink = $row['IDLink'];
					$linkName = $row['LinkName'];
					$URL = $row['URL'];
					//array
					$link = array($IDLink,$linkName,$URL);
					$a[$currentCAT][$LinkName] = $URL;
				}
			}
		}
		return $a;
	}
	else {
		mysqli_free_result ($dbc); // Free up the resources.
		return mysqli_error($result);
	}
	mysqli_close($dbc); // Close the database connection.
}
?>