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
		
		mysqli_query($conn, "INSERT INTO personal_info_inbound(STUDENT_COUNT, STUDENT_ID, APPLICATION_PROG, AGE_IN,
		NATIONALITY_IN, PASSPORT_NUM_IN, VALIDITY_DATE_IN, DATE_ISSUANCE_iN, MAILING_ADD_IN, TELEPHONE_NUM_IN,
		MOBILE_NUM_IN) VALUES ('', '$studentID_get', '', '$age', '$nationality', '$passport_num_in', 
		'$validity_date_in', '$date_issuance_in', '$mailing_add_in', '$telephone_num_in', '$mobile_num_in')");
		
		// for Educational Background
		$home_univ_in = $_POST['home_univ_in'];
		$degree_prog_in = $_POST['degree_prog_in'];
		$major_in = $_POST['major_in'];
		$year_level_in = $_POST['year_level_in'];

		mysqli_query($conn, "INSERT INTO educ_back_inbound(STUDENT_COUNT, STUDENT_ID, HOME_UNIV_IN, DEGREE_PROG_IN,
		YEAR_LEVEL_IN, MAJOR_IN) VALUES ('', '$home_univ_in', '$degree_prog_in', '$year_level_in', '$major_in')");


		// PROPOSED FIELD OF STUDY

	 }
?>