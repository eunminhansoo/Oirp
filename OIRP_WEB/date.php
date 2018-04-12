<?php
	include 'database_connection.php';

	$today = date("m/d/Y");
	$new = "08/01/".date("Y");
	
	if($today == $new){
		$sql = "CREATE TABLE ".date("Y")."_data (
				ID int(11) AUTO_INCREMENT,
				NUMBER_STUDENT int(100),
				YEAR varchar(100),
				COUNTRY varchar(500),
				APPLICATION_TYPE_PROG varchar(100),
				PRIMARY KEY(ID)
				)";
		$query = mysqli_query($conn, $sql);
	} 
	
?>