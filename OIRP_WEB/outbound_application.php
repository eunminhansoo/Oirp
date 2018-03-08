<?php
	include 'database_connection.php';
	session_start();
    $getses_StudentID = $_SESSION['$studentID_session'];
	$message = '';

	
	$query = mysqli_query($conn, "SELECT * FROM student WHERE STUDENT_ID = '$getses_StudentID'");
	while($rows = mysqli_fetch_array($query))
	{
		$email = $rows['EMAIL'];
		$application_prog = $rows['APPLICATION_PROG'];
	}
	
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
		$program = $_POST['program'];
		$year_level_out = $_POST['yearlevel'];

		mysqli_query($conn, "INSERT INTO `personal_info_outbound` (`STUDENT_COUNT`, `STUDENT_ID`, `AGE_OUT`, 
		`NATIONALITY_OUT`, `CITIZENSHIP_OUT`, `PASSPORT_NUM_OUT`, `VALIDITY_DATE_OUT`, `DATE_ISSUANCE_OUT`, 
		`MAILING_ADD_OUT`, `TELEPHONE_NUM_OUT`, `MOBILE_NUM_OUT`, `COLLEGE_INSTITUTE_FACULTY_OUT`, `DEGREE_PROG_OUT`, `YEAR_LEVEL_OUT`, 
		`APPLICATION_PROG`) VALUES ('', '$getses_StudentID', ' ', '$nationality_out', '$citizenship_out', 
		'$passport_num_out', '$validity_date_out', '$date_issuance_out', '$mailing_add_out', 
		'$telephone_num_out', '$mobile_num_out', '$college_institute_faculty_out', '$program', '$year_level_out', '')");
		header("Location: outboundform2.php");
	}

	
	//FOR FORM 2
	
	if(isset($_POST['btn_form2']))
	{
		// FATHER
		$father = $_POST['father'];
		$fOccupation = $_POST['fOccupation'];
		$fCompany = $_POST['fCompany'];
		$fAddress = $_POST['fAddress'];
		$fEmail = $_POST['fEmail'];
		$fNumber = $_POST['fNumber'];
		$fIncome = $_POST['fIncome'];
		//MOTHER
		$mother = $_POST['mother'];
		$mOccupation = $_POST['mOccupation'];
		$mCompany = $_POST['mCompany'];
		$mAddress = $_POST['mAddress'];
		$mEmail = $_POST['mEmail'];
		$mNumber = $_POST['mNumber'];
		$mEmail = $_POST['mEmail'];
		$mIncome = $_POST['mIncome'];
		
		//QUERY
		
		mysqli_query($conn, "INSERT INTO guardian_info_outbound(
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
			'$getses_StudentID',
			'$father',
			'$fOccupation',
			'$fCompany',
			'$fAddress',
			'$fEmail',
			'$fNumber',
			'$fIncome',
			'$mother',
			'$mOccupation',
			'$mCompany',
			'$mAddress',
			'$mEmail',
			'$mNumber',
			'$mIncome'
			)"

		);
		
		header("Location: outboundform3.php");
	}
	// FORM 3
	
	if(isset($_POST['btn_from3']))
	{
		$country = $_POST['country'];
		$university = $_POST['university'];
		$proposedProg = $_POST['proposedProg'];
		$course1 = $_POST['course1'];
		$course2 = $_POST['course2'];
		$course3 = $_POST['course3'];
		$course4 = $_POST['course4'];
		$course5 = $_POST['course5'];
		
		$sql_syn = "SELECT * FROM partner_universities WHERE ID = '$university' AND COUNTRY = '$country' ";
		$query1 = mysqli_query($conn, $sql_syn);
		while($rows1 = mysqli_fetch_array($query1)){
			$get_univ = $rows1['UNIVERSITY'];	
		}

		//Condition
		if (isset($_POST['type_program']))
		{
			$type_program = $_POST['type_program'];
		} else 
		{
			$type_program = NULL;
		}
		if ($type_program != NULL)
		{
			//condition
			if($type_program == "Others")
			{
				$programText = $_POST['programText'];
				$prog_other = 'Bilateral';

				if(isset($_POST['scholarloan'])){
					$scholarloan = $_POST['scholarloan'];

					if($scholarloan == 'Yes'){
						$scholarloanText = $_POST['scholarloanText'];
						echo 'pumasok ka ba dito?';
					}else{
						$scholarloanText = '';
					}
				}
				$sql_query = "INSERT INTO proposed_field_study(
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
					'$getses_StudentID',
					'$proposedProg',
					'$course1',
					'$course2',
					'$course3',
					'$course4',
				 	'$course5',
					'$scholarloan',
					'$scholarloanText',
					'$programText',
					'$prog_other'

				)";
			}

			if($type_program == "Bilateral")
			{
				$bilateral = $_POST['bilateral'];

				if(isset($_POST['scholarloan'])){

					$scholarloan = $_POST['scholarloan'];

					if($scholarloan == 'Yes'){

						$scholarloanText = $_POST['scholarloanText'];
						
					}else{
						$scholarloanText = '';
					}
				}
				$sql_query = "INSERT INTO proposed_field_study
					(
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
						 '$getses_StudentID',
						 '$proposedProg',
						 '$course1',
						 '$course2',
						 '$course3',
						 '$course4',
						 '$course5',
						 '$scholarloan',
						 '$scholarloanText',
						 '$bilateral',
						 '$type_program'
					)";		
			}

			if($type_program == "Scholarship")
			{
				$scholarship = $_POST['scholarship'];

				if($scholarship == "OTHERS")
				{
					$scholarshipText = $_POST['scholarshipText'];

					$sql_query = "INSERT INTO proposed_field_study
					(
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
						 '$getses_StudentID',
						 '$proposedProg',
						 '$course1',
						 '$course2',
						 '$course3',
						 '$course4',
						 '$course5',
						 '',
						 '',
						 '$scholarshipText',
						 '$type_program'
					)";
				}else{
					$scholarshipText = '';
					$sql_query = "INSERT INTO proposed_field_study
					(
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
						 '$getses_StudentID',
						 '$proposedProg',
						 '$course1',
						 '$course2',
						 '$course3',
						 '$course4',
						 '$course5',
						 '',
						 '',
						 '$scholarship',
						 '$type_program'
					)";
				}

			}

			$query_db = mysqli_query($conn, $sql_query);

			if($query_db)
			{
				// echo 'success';
				header("Location: outboundform3.php");
			}else{
				// echo 'error';
				header("Location: error_page.php");
			}
		}	
		
		mysqli_query($conn, "INSERT INTO country_univ_outbound
		(
			STUDENT_COUNT,
		 	STUDENT_ID,
		 	APPLICATION_PROG,
		 	COUNTRY_OUT,
		 	UNIVERSITY_OUT
		) VALUES 
		(
			'',
			'$getses_StudentID',
			'$application_prog',
			'$country',
			'$get_univ'
		)");
	}
	
	
?>