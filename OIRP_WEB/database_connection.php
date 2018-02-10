<?php
	$conn = mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($conn, "oixrp_db");
    
    if(!$db){
    	echo '<script>console.log("error connection to database")';
    	die();
    	
    }
    echo '<script>console.log("you have connected successfully")</script>';
?>