<?php
	include 'database_connection.php';
	//include 'inbound_application_php.php';

	session_start();
	$getSes_studentID = $_SESSION['$studentID_session'];


	if(isset($_POST['btn_inform1']))
	{
		$country = $_POST['country'];
		$homeUniversity = $_POST['homeUniversity'];
		$univAddress = $_POST['univAddress'];
		$citizenship = $_POST['citizenship'];
		$nationality = $_POST['nationality'];
		$passport = $_POST['passport'];
		$validity = $_POST['validity'];
		$issuance = $_POST['issuance'];
		$address = $_POST['address'];
		$telephone = $_POST['telephone'];
		$mobile = $_POST['mobile'];
		$degree = $_POST['program'];
		$major = $_POST['major'];
		$yearlevel = $_POST['yearlevel'];
		$contactperson = $_POST['contactperson'];
		$relCP = $_POST['relCP'];
		$addressCP = $_POST['addressCP'];
		$emailCP = $_POST['emailCP'];
		$numberCP = $_POST['$numberCP'];

		mysqli_query($conn, "INSERT INTO personal_info_inbound(STUDENT_COUNT, STUDENT_ID, APPLICATION_PROG, AGE_IN,
		NATIONALITY_IN, PASSPORT_NUM_IN, VALIDITY_DATE_IN, DATE_ISSUANCE_iN, MAILING_ADD_IN, TELEPHONE_NUM_IN, 
		MOBILE_NUM_IN) VALUES('', '$getSes_studentID', '', '', '$nationality', '$passport', '$validity', '$issuance', '$address', '$telephone',
		'$mobile')");

		mysqli_query($conn, "INSERT INTO educ_back_inbound(STUDENT_COUNT, STUDENT_ID, HOME_UNIV_IN, UNIV_ADDRESS_IN, DEGREE_PROG_IN, YEAR_LEVEL_IN, MAJOR_IN
		) VALUES('', '$getSes_studentID', '$homeUniversity', '$univAddress', '$degree', '$yearlevel', '$major')");

		mysqli_query($conn, "INSERT INTO personal_contact_in_bila(STUDENT_COUNT, STUDENT_ID, PERSONAL_CONTACT_IN_BILA, RELATIONSHIP_IN_BILA, ADD_IN_BILA, EMAIL_ADD_IN_BILA, TELEPHONE_NUM_IN_BILA
		) VALUES('', '$getSes_studentID', '$contactperson', '$relCP', '$addressCP', '$emailCP', '$numberCP')");

		header("Location: inboundform2.php");
	}
?>
