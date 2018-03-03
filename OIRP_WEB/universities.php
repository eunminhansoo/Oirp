<?php
	$conn = mysqli_connect("localhost", "root", "","oirp_db");
	$db = mysqli_select_db($conn, "oirp_db");
	error_reporting(0);
	
	$country = $_POST['country'];
	session_start();
	$_SESSION['$country_session'] = $country;
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