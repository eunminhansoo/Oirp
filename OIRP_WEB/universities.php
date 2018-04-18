<?php
	include 'database_connection.php';
	error_reporting(0);
	
	$country = $_POST['country'];
	$sql = "select * from partner_universities where country = '".$country."' order by university asc";
	$result = mysqli_query($conn, $sql);
	
	$results;
	while($row = mysqli_fetch_array($result)) {
	        $results .=  "<option value='".$row["ID"]."'>".$row["UNIVERSITY"]."</option>";
	}
	
	echo $results;

	//mysql_free_result($result);
	//echo $sql;
	
	
?>