<?php
	// $conn = mysqli_connect("localhost", "root", "");
    // $db = mysqli_select_db($conn, "");
    
    // if(!$db){
    // 	echo '<script>console.log("error connection to database")';
    // 	die();
    	
    // }
    // echo '<script>console.log("you have connected successfully")</script>';
    
    $server = "localhost";
    $username = "root";
    $pass = "";
    $db = "oirp_db";

    $conn = new mysqli($server, $username, $pass, $db);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
?>