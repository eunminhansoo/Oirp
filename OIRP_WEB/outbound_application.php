<?php
	include 'database_connection.php';
	session_start();
    $getses_StudentID = $_SESSION['$studentID_session'];
    echo $getses_StudentID;
	$message = '';
	
	//for outboundform1
	
	if(isset($_POST['btn_outbound1_1'])){
	$citizenship_out = $_POST['citizenship'];
	$nationality_out = $_POST['nationality'];
	$passport_num_out = $_POST['passport'];
	$date_issuance_out = $_POST['issuance'];
	$validity_date_out = $_POST['validity'];
	$mailing_add_out = $_POST['address'];
	$telephone_num_out = $_POST['telephone'];
	$mobile_num_out = $_POST['mobile'];
	$college_institute_faculty_out = $_POST['college'];
	$application_prog = $_POST['program'];
	$year_level_out = $_POST['yearlevel'];

	mysqli_query($conn, "INSERT INTO personal_info_outbound(STUDENT_COUNT, STUDENT_ID, BIRTHPLACE_OUT, 
	AGE_OUT, NATIONALITY_OUT, CITIZENSHIP_OUT, PASSPORT_NUM_OUT, VALIDITY_DATE_OUT, DATE_ISSUANCE_OUT, 
	MAILING_ADD_OUT, TELEPHONE_NUM_OUT, MOBILE_NUM_OUT, FATHER_NAME_OUT, OCCUPATION_DADA_OUT, COMPANY
	DADA_OUT, ADDRESS_DADA_OUT, CONTACT_NUM_DADA_OUT, ANNUAL_INCOME_DADA_OUT, MOTHER_NAME_OUT, OCCUPA
	TION_MOM_OUT, COMPANY_MOM_OUT, ADDRESS_MOM_OUT, CONTACT_NUM_MOM_OUT, ANNUAL_INCOME_MOM_OUT, COLLE
	GE_INSTITUTE_FACULTY_OUT, DEGREE_PROG_OUT, YEAR_LEVEL_OUT, APPLICATION_PROG) VALUES ('', '', '', 
	'', $nationality_out', '$citizenship_out', '$passport_num_out', '$validity_date_out', '$date_issuance_out', 
	'$mailing_add_out', '$telephone_num_out', '$mobile_num_out', '', '', '', '', '', '', '', '', '', '', '', 
	'', '', '$college_institute_faculty_out', '$year_level_out', '$application_prog')");
	}
	
	
	
?>