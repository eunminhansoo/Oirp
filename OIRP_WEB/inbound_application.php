<?php
	include 'database_connection.php';

	session_start();
	$getSes_studentID = $_SESSION['$studentID_session'];
	echo $getSes_studentID;

	if(isset($_POST['btn_inform1']))
	{
		$country = $_POST['country'];
		$homeUniversity = $_POST['homeUniversity'];
		$citizenship = $_POST['citizenship'];
		$nationality = $_POST['nationality'];
		$passport = $_POST['passport'];
		$validity = $_POST['validity'];
		$issuance = $_POST['issuance'];
		$address = $_POST['address'];
		$telephone = $_POST['telephone'];
		$mobile = $_POST['mobile'];
		$program = $_POST['program'];
		$major = $_POST['major'];
		$yearlevel = $_POST['yearlevel'];

		mysqli_query($conn, "INSERT INTO personal_info_inbound(STUDENT_COUNT, STUDENT_ID, APPLICATION_PROG, AGE_IN,
		NATIONALITY_IN, PASSPORT_NUM_IN, VALIDITY_DATE_IN, DATE_ISSUANCE_iN, MAILING_ADD_IN, TELEPHONE_NUM_IN, MOBILE_NUM_IN)
		 VALUES('', '$getSes_studentID', '')");
	}
?>
