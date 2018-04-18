<?php
	include 'database_connection.php';
	error_reporting(0);
	
	$country = $_POST['shcountry'];
	$sql = "select * from share_universities where country = '".$country."' order by university asc";
	$result = mysqli_query($conn, $sql);
	
	$res;
	while($row = mysqli_fetch_array($result)) {
	        $res .=  "<option value='".$row["ID"]."'>".$row["UNIVERSITY"]."</option>";
	}
	
	echo $res;
	
	//mysql_free_result($result);
	//echo $sql;

?>