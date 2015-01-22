<?php
//this function builds a dropdownlist containing user's categories.
//it receives $catArray as array parameter.
function buildCategories($a) {
	echo "<option selected value=\"\">--Categories</option>";
	foreach($a as $key => $value) {
		echo "<option value=\"$key\">$value</option>";
	}
}

function buildBookmarks($a,$ccat) {
	//this function builds a table showing Link names, URL and (not ready)edit check.
	echo "<table class='linkTable'>";
	foreach($a as $key => $value) {
		if($value[2]==$ccat) {
			echo "<tr>";
			for($i = 0; $i < 2; $i++) {
				if($i==0) {
					echo "<td><a href=$value[1] target='_blank'>$value[$i]</a></td>";
				}
				else {
				echo "<td>$value[$i]</td>";	
				}
				
				//echo "dentro bucle";
			}
			echo "</tr>";
		}
		//echo "bucle: $key - currentCat:$ccat";		
	}
	echo "</tr>";
	echo "</table>";
	/*foreach($a as $key => $value) {
		echo "-$key-- $value[0] - $value[1] - $value[2] - $value[3] <br>";*/
	
}
function getCategories($u) {
	//this function receives an array and userid as arguments,
	//and then it returns the array filled with categories (id and name).
	require('inc/mysqli_connect.php');
	$cat = array();
	$query = "SELECT C.IDCategory,C.CATName FROM Categories as C WHERE C.Owner = '$u'";
	$result = @mysqli_query($dbc,$query);
	if($result) {
		while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
			$key = $row['IDCategory'];
			$value = $row['CATName'];
			$cat["$key"] = $value;
		}
	}
	else {

		//mysqli_free_result($dbc);
	}
	mysqli_close($dbc);
	return ($cat);
}
function getLinks($a, $u) {
	require('inc/mysqli_connect.php');
	$links = array();
	$query = "SELECT L.IDLink, L.LinkName, L.URL, L.CATParent FROM Links AS L INNER JOIN Categories AS C ON L.CATParent=C.IDCategory WHERE Owner='$u'";
	$result = mysqli_query($dbc,$query);
	if($result) {
		while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
			$IDLink = $row['IDLink'];
			$LinkName = $row['LinkName'];
			$URL = $row['URL'];
			$CATParent = $row['CATParent'];
			$links["$IDLink"][0] = $LinkName;
			$links["$IDLink"][1] = $URL;
			$links["$IDLink"][2] = $CATParent;
		}
	}
	else {
		echo "ERROR con la query!";
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