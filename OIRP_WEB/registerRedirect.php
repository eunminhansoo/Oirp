<?php
	include 'database_connection.php';
	
	/* FOR STUDENT NUMBER*/
	echo 'puta pumupunta ka ba dito???!';
	session_start();
	$show_email = $_SESSION['$ses_email'];
	$getData = mysqli_query($conn, "SELECT * FROM student WHERE EMAIL = '$show_email' ");
	
	while ($getRows = mysqli_fetch_array($getData)){
		$studentCOUNT = $getRows['STUDENT_COUNT'];
		$dateSignIn = $getRows['DATE_ENROLL'];
		$appPROG = $getRows['APPLICATION_PROG'];
		
	}
	/* date format*/
	$timestamp = strtotime($dateSignIn);
	$dateuSignIn = date('Ymd', $timestamp);
		
	if(strlen($studentCOUNT) == 2){
		$dateuSignIn1 = $dateuSignIn * 1000;
	}elseif (strlen($studentCOUNT) == 1){
		$dateuSignIn1 = $dateuSignIn * 1000;
	}else {
		if (strlen($studentCOUNT) == 3){
			$dateuSignIn1 = $dateuSignIn * 1000;
				
		}
	}
	/* convert a inbound and outbaound into in and out*/
	if ($appPROG == 'outbound'){
		$appPROG = 'out';
	}else {
		if ($appPROG == 'inbound'){
			$appPROG = 'in';
		}
	}
			
	$dateuSignIn2 = $dateuSignIn1 + $studentCOUNT;
	
	$studentID = $dateuSignIn2."-".$appPROG;

	mysqli_query($conn, "UPDATE student SET STUDENT_ID = '$studentID' WHERE EMAIL = '$show_email'");

	// INSERT ALL TABLE
	if($appPROG == 'in'){
		$query_db = "INSERT INTO personal_info_inbound(
			STUDENT_COUNT, 
			STUDENT_ID, 
			CITIZENSHIP_IN,
			NATIONALITY_IN, 
			PASSPORT_NUM_IN, 
			VALIDITY_DATE_IN, 
			DATE_ISSUANCE_iN, 
			MAILING_ADD_IN, 
			TELEPHONE_NUM_IN, 
			MOBILE_NUM_IN
			) VALUES(
				'', 
				'$studentID', 
				'', 
				'', 
				'', 
				'', 
				'', 
				'', 
				'',
				'')";
			mysqli_query($conn, $query_db);

			$query_db1 = "INSERT INTO personal_contact_inbound(STUDENT_COUNT, STUDENT_ID, PERSONAL_CONTACT_IN_BILA, RELATIONSHIP_IN_BILA, ADD_IN_BILA, EMAIL_ADD_IN_BILA, TELEPHONE_NUM_IN_BILA
			) VALUES('', '$studentID', '', '', '', '', '')";
			mysqli_query($conn, $query_db1);

			$sql_query = "INSERT INTO educ_background_inbound(
				STUDENT_COUNT,
				STUDENT_ID,
				COUNTRY_ORIGIN,
				HOME_UNIV_IN_BILA,
				UNIV_ADD_IN_BILA,
				NAME_OFFICER_CONTACT_IN_BILA,
				EMAIL_ADD_IN_BILA,
				CURRENT_PROG_STUDY_IN_BILA,
				DESIGNATION_IN_BILA,
				TELEPHONE_NUM_BILA,
				SPECIALIZATION_IN_BILA,
				YEAR_LEVEL,
				SCHOLARSHIP_IN_BILA,
				SCHOLARSHIP_TEXT_IN_BILA,
				APPLICATION_FORM,
				APPLICATION_TYPE_PROG
			) VALUES (
				'',
				'$studentID',
				'',
				'',
				'',
				'',
				'',
				'',
				'',
				'',
				'',
				'',
				'',
				'',
				'',
				''
			)";
			mysqli_query($conn, $sql_query);


			$sql_query1 = "INSERT INTO medical_english_inbound(
				STUDENT_COUNT,
				STUDENT_ID,
				DO_YOU_SMOKE_INBOUND,
				DESCRIBE_DISABILI_INBOUND,
				DESCRIBE_ILL_INBOUND,
				COMPLETE_TOEF_INBOUND,
				COMPLETE_TOEF_SCORE_INBOUND,
				INTEND_TAKE_TOEF_INBOUND,
				INTEND_TAKE_TOEF_DATE_INBOUND,
				INTEND_TAKE_TOEF_TYPE_INBOUND
			) VALUES(
				'',
				'$studentID',
				'',
				'',
				'',
				'',
				'',
				'',
				'',
				''			
			)";
			mysqli_query($conn, $sql_query1);

			$sql_query2 = "INSERT INTO expectation_prog_inbound(
				STUDENT_COUNT,
				STUDENT_ID,
				EXPECTATION_PROG
			) VALUES (
				'',
				'$studentID',
				''
			)";
			mysqli_query($conn, $sql_query2);
	}else{
		if($appPROG == 'out'){
			$sql_query = "INSERT INTO `personal_info_outbound` (`STUDENT_COUNT`, `STUDENT_ID`, 
			`NATIONALITY_OUT`, `CITIZENSHIP_OUT`, `PASSPORT_NUM_OUT`, `VALIDITY_DATE_OUT`, `DATE_ISSUANCE_OUT`, 
			`MAILING_ADD_OUT`, `TELEPHONE_NUM_OUT`, `MOBILE_NUM_OUT`, `COLLEGE_INSTITUTE_FACULTY_OUT`, `DEGREE_PROG_OUT`, `YEAR_LEVEL_OUT`
			) VALUES ('', '$studentID', '', '', '', '', '', '', '', '', '', '', '')";
			
			mysqli_query($conn, $sql_query);

			$sql_query1 = "INSERT INTO guardian_info_outbound(
				STUDENT_COUNT, 
				STUDENT_ID,
				FATHER_NAME_OUT,
				OCCUPATION_DADA_OUT,
				COMPANY_DADA_OUT,
				ADDRESS_DADA_OUT,
				EMAIL_ADD_DADA_OUT,
				CONTACT_NUM_DADA_OUT,
				ANNUAL_INCOME_DADA_OUT,
				MOTHER_NAME_OUT,
				OCCUPATION_MOM_OUT,
				COMPANY_MOM_OUT,
				ADDRESS_MOM_OUT,
				EMAIL_ADD_MOM_OUT,
				CONTACT_NUM_MOM_OUT,
				ANNUAL_INCOME_MOM_OUT
			) VALUES (
				'',
				'$studentID',
				'',
				'',
				'',
				'',
				'',
				'',
				'',
				'',
				'',
				'',
				'',
				'',
				'',
				'')";

			mysqli_query($conn, $sql_query1);

			$sql_query2 = "INSERT INTO proposed_field_study(
					STUDENT_COUNT,
					STUDENT_ID,
					PROPOSED_PROG,
					COURSE_1, 
					COURSE_2, 
					COURSE_3, 
				 	COURSE_4, 
				 	COURSE_5,
					SCHOLARSHIP_OUTBOUND,
					SCHOLARSHIP_TEXT_OUTBOUND,
				 	APPLICATION_FORM,
					APPLICATION_TYPE_PROG
				) VALUES 
				(
					'',
					'$studentID',
					'',
					'',
					'',
					'',
					'',
				 	'',
					'',
					'',
					'',
					''

				)";
				mysqli_query($conn, $sql_query2);

				$sql_query3 = "INSERT INTO country_univ_outbound
				(
					STUDENT_COUNT,
					STUDENT_ID,
					APPLICATION_PROG,
					COUNTRY_OUT,
					UNIVERSITY_OUT
				) VALUES 
				(
					'',
					'$studentID',
					'',
					'',
					''
				)";
				mysqli_query($conn, $sql_query3);
		}
	}
	
	$_SESSION['student_id_session'] = $studentID;
	//header("Location: inbound_application.php");
	
	if($appPROG == "out")
	{
		header("Location: outboundform1.php");
	}else{
		if($appPROG == "in"){
			header("Location: inboundform1.php");
		}
	}
	
?>