<?php
	include 'database_connection.php';
	
	session_start();
	$studentID_get = $_SESSION['$studentID_session'];
	
	$getdata = mysqli_query($conn, "SELECT * FROM student WHERE STUDENT_ID = '$studentID_get' ");
	while ($row = mysqli_fetch_array($getdata)){
		$email = $row['EMAIL'];
		$family_name = $row['FAMILY_NAME'];
		$given_name = $row['GIVEN_NAME'];
		$middle_name = $row['MIDDLE_NAME'];
		$gender = $row['GENDER'];
		$birthday = $row['BIRTHDAY'];
	}
	 if (isset($_POST[btn_apply])){
	 	
	 }
?>