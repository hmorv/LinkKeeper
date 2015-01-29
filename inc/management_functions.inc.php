<?php
/* TODO protect queries from SQL injection */


//this function builds a dropdownlist containing user's categories.
//it receives $catArray as array argument.
function buildCategories($a) {
	echo "<option selected value=\"\">--Categories</option>";
	foreach($a as $key => $value) {
		echo "<option value=\"$key\">$value</option>";
	}
}

function buildBookmarks($a,$ccat) {
	//this function builds a table showing Link names, URL and (not ready)edit check.
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
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
			}
			echo "<td><input type='checkbox' name='delete[]' value='$key'/></td>";
			echo "</tr>";
		}
	}
	echo "</tr>";
	echo "</table>";
	echo "<input type='submit' value='Delete'/>";
}	
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

	}
	mysqli_close($dbc);
	return ($cat);
}
function getLinks($a, $u) {
	//this function build and send a SELECT query in order to get all links and store them into an array.
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
			//se puede quitar...creo....
			$IDURL = $row['IDLink'];
			$links["$IDLink"][0] = $LinkName;
			$links["$IDLink"][1] = $URL;
			$links["$IDLink"][2] = $CATParent;
			//se puede quitar...creo....
			$links["$IDLink"][3] = $IDURL;
		}
	}
	else {
		echo "Query ERROR";
		//mysqli_free_result($dbc);
	}
	mysqli_close($dbc);
	return ($links);
}

function eliminar($i) {
	require('inc/mysqli_connect.php');
	$query = "DELETE FROM Links WHERE IDLink = $i";
	echo $query;
	$result = mysqli_query($dbc,$query);
	if($result) {
		return true;
	}
	else {
		return false;
	}
}
?>