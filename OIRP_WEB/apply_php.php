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
	
	 if (isset($_POST['btn_apply'])){
	 	$age = $_POST['age'];
	 	$nationality = $_POST['nationality'];
	 	$passport_num_in = $_POST['passport_num_in'];
	 	$date_issuance_in = $_POST['date_issuance_in'];
	 	$validity_date_in = $_POST['validity_date_in'];
	 	$mailing_add_in = $_POST['mailing_add_in'];
	 	$telephone_num_in = $_POST['telephone_num_in'];
	 	$mobile_num_in = $_POST['mobile_num_in'];
	 }
?>