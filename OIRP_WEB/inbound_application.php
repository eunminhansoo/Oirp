<?php
	include 'database_connection.php';
	//include 'inbound_application_php.php';

	session_start();
	$getSes_studentID = $_SESSION['$studentID_session'];
	

	//for inboundform1
	if(isset($_POST['btn_inform1']))
	{
		$citizenship = $_POST['citizenship'];
		$nationality = $_POST['nationality'];
		$passport = $_POST['passport'];
		$validity = $_POST['validity'];
		$issuance = $_POST['issuance'];
		$address = $_POST['address'];
		$telephone = $_POST['telephone'];
		$mobile = $_POST['mobile'];
		$contactperson = $_POST['contactperson'];
		$relCP = $_POST['relCP'];
		$addressCP = $_POST['addressCP'];
		$emailCP = $_POST['emailCP'];
		$numberCP = $_POST['$numberCP'];

		mysqli_query($conn, "INSERT INTO personal_info_inbound(STUDENT_COUNT, STUDENT_ID, APPLICATION_PROG, AGE_IN,
		NATIONALITY_IN, PASSPORT_NUM_IN, VALIDITY_DATE_IN, DATE_ISSUANCE_iN, MAILING_ADD_IN, TELEPHONE_NUM_IN, 
		MOBILE_NUM_IN) VALUES('', '$getSes_studentID', '', '', '$nationality', '$passport', '$validity', '$issuance', '$address', '$telephone',
		'$mobile')");

		mysqli_query($conn, "INSERT INTO personal_contact_in_bila(STUDENT_COUNT, STUDENT_ID, PERSONAL_CONTACT_IN_BILA, RELATIONSHIP_IN_BILA, ADD_IN_BILA, EMAIL_ADD_IN_BILA, TELEPHONE_NUM_IN_BILA
		) VALUES('', '$getSes_studentID', '$contactperson', '$relCP', '$addressCP', '$emailCP', '$numberCP')");

		header("Location: inboundform2.php");
	}
	
	//for inboundform2
	
	if(isset($_POST['btn_inform2']))
	{
		$country = $_POST['country'];
		$homeUniversity = $_POST['homeUniversity'];
		$univAddress = $_POST['univAddress'];
		$program = $_POST['program'];
		$major = $_POST['major'];
		$yearLevel = $_POST['yearlevel'];
		$type_program = $_POST['type_program'];
		$programText = $_POST['programText'];
		$bilateral = $_POST['bilateral'];
		$scholarship = $_POST['scholarship'];
		$scholarshipText = $_POST['scholarshipText'];
		$scholarloan = $_POST['scholarloan'];
		$scholarloanText = $_POST['scholarloanText'];
		$officer = $_POST['officer'];
		$designationO = $_POST['designationO'];
		$emailO = $_POST['emailO'];
		$numberO = $_POST['numberO'];
		
		
		echo $programText."<br>";
		echo $scholarshipText;
		echo $scholarloanText;
		//header("Location: inboundform3.php");
		
	}
	
?>
