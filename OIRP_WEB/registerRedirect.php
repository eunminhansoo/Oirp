<?php
	include 'database_connection.php';
	
	$getData = mysqli_query($conn, "SELECT * FROM student WHERE EMAIL = '$email' ");
	while ($getRows = mysqli_fetch_array($getData)){
		$studentCOUNT = $getRows['STUDENT_COUNT'];
		$dateSignIn = $getRows['DATE_ENROLL'];
		$appPROG = $getRows['APPLICATION_PROG'];
	}
	$studentID = $studentCOUNT.$dateSignIn.$appPROG;
	mysqli_query($conn, "UPDATE student SET STUDENT_ID = '$studentID' ");
	header("Location: home_page.php")
?>