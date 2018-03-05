<?php
	$conn1 = mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($conn1, "administrator");
    
    if(!$db){
    	echo '<script>console.log("error connection to database")';
    	die();
    	
    }
    echo '<script>console.log("you have connected successfully")</script>';
    
?>