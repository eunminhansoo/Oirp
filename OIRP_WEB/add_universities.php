<?php

	require 'database_connection.php';
	
	error_reporting(0);
	
	$country = $_POST['country'];
	$university = $_POST['university'];
	
	$sql = "select university,country from partner_universities where university = '".$university."'";
	$result = mysqli_query($conn, $sql);
	
	while ($row = $result->fetch_array()){
		$univ = $row['university'];
		$coun = $row['country'];
		
		if ($univ==$university && $coun==$country){
			echo $university." is already recorded.";
		} else{
			$sql = "insert into partner_universities(university,country) values ('".$university."', '".$country."')";
			$result = mysqli_query($conn, $sql);
			
			echo "1 row inserted.";
		}
		
	}
	
?>

