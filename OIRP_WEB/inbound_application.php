<?php
	include 'database_connection.php';
	//include 'inbound_application_php.php';

	session_start();
	$getSes_studentID = $_SESSION['student_id_session'];
	

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
		$numberCP = $_POST['numberCP'];
		
		$query_db = "INSERT INTO personal_info_inbound(
			STUDENT_COUNT, 
			STUDENT_ID, 
			APPLICATION_PROG, 
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
				'$getSes_studentID', 
				'',
				'$citizenship', 
				'$nationality', 
				'$passport', 
				'$validity', 
				'$issuance', 
				'$address', 
				'$telephone',
				'$mobile')";

		$checkQuery1 = mysqli_query($conn, $query_db);

		$query_db1 = "INSERT INTO personal_contact_inbound(STUDENT_COUNT, STUDENT_ID, PERSONAL_CONTACT_IN_BILA, RELATIONSHIP_IN_BILA, ADD_IN_BILA, EMAIL_ADD_IN_BILA, TELEPHONE_NUM_IN_BILA
		) VALUES('', '$getSes_studentID', '$contactperson', '$relCP', '$addressCP', '$emailCP', '$numberCP')";

		$checkQuery2 = mysqli_query($conn, $query_db1);

		if($checkQuery1 && $checkQuery2)
		{
			header("Location: inboundform2.php");
		}else
		{
			header("Location: error_page.php");
		}
		
	}
	
	//for inboundform2
	
	if(isset($_POST['btn_form2']))
	{
		//doPOST 
		$country = $_POST['country'];
		$homeUniversity = $_POST['homeUniversity'];
		$univAddress = $_POST['univAddress'];
		$program = $_POST['program'];
		$major = $_POST['major'];
		$yearLevel = $_POST['yearlevel'];
		$officer = $_POST['officer'];
		$designationO = $_POST['designationO'];
		$emailO = $_POST['emailO'];
		$numberO = $_POST['numberO'];

		$sql_syn = "SELECT * FROM partner_universities WHERE ID = '$homeUniversity' AND COUNTRY = '$country' ";
		$query1 = mysqli_query($conn, $sql_syn);
		while($rows1 = mysqli_fetch_array($query1)){
			$get_univ = $rows1['UNIVERSITY'];	
		}
		// echo $country."<br>";
		// echo $homeUniversity."<br>";
		// echo $get_univ;

		//radio buton for type of program
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
						
					}else{
						$scholarloanText = '';
					}
				}
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
					'$getSes_studentID',
					'$country',
					'$get_univ',
					'$univAddress',
					'$officer',
					'$emailO ',
					'$program',
					'$designationO',
					'$numberO',
					'$major',
					'$yearLevel',
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
					'$getSes_studentID',
					'$country',
					'$get_univ',
					'$univAddress',
					'$officer',
					'$emailO',
					'$program',
					'$designationO',
					'$numberO',
					'$major',
					'$yearLevel',
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
						'$getSes_studentID',
						'$country',
						'$get_univ',
						'$univAddress',
						'$officer',
						'$emailO',
						'$program',
						'$designationO',
						'$numberO',
						'$major',
						'$yearLevel',
						'',
						'',
						'$scholarshipText',
						'$type_program'
					)";
				}else{
					$scholarshipText = '';
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
						'$getSes_studentID',
						'$country',
						'$get_univ',
						'$univAddress',
						'$officer',
						'$emailO',
						'$program',
						'$designationO',
						'$numberO',
						'$major',
						'$yearLevel',
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
				header("Location: inboundform3.php");
			}else{
				header("Location: error_page.php");
			}
			
			
		}
		
	}

	// for inboundform3
	if(isset($_POST['btn_form3']))
	{
		$proposedProg = $_POST['proposedProg'];
		$course1 = $_POST['course1'];
		$course2 = $_POST['course2'];
		$course3 = $_POST['course3'];
		$course4 = $_POST['course4'];
		$course5 = $_POST['course5'];
		$sem = $_POST['sem'];
		$research = $_POST['research'];
		$reason = $_POST['reason'];
		$disciplinary = $_POST['disciplinary'];
		$accomodation = $_POST['accomodation'];

		$sql_query = "INSERT INTO proposed_field_study_in_bila(
			STUDENT_COUNT,
			STUDENT_ID,
			PROPOSED_PROG_INBOUND,
			COURSE_1_INBOUND,
			COURSE_2_INBOUND,
			COURSE_3_INBOUND,
			COURSE_4_INBOUND,
			COURSE_5_INBOUND,
			RESEARCH_TOPIC_INBOUND,
			INTENDED_SEM_STUDY_INBOUND,
			DESCRIPTION_ACTION_STATUS_INBOUND,
			REASON_STUDYING_INBOUND,
			ACCOMODATION_INBOUND
		) VALUES (
			'',
			'$getSes_studentID',
			'$proposedProg',
			'$course1',
			'$course2',
			'$course3',
			'$course4',
			'$course5',
			'$sem',
			'$research',
			'$reason',
			'$disciplinary',
			'$accomodation'
		)";
		$query_db = mysqli_query($conn, $sql_query);

		if($query_db)
		{
			// echo 'success';
			header("Location: inboundform4.php");
		}else{
			header("Location: error_page.php");
		}
	}

	// for inboundform4
	if(isset($_POST['btn_form4']))
	{
		$toeflTest = $_POST['toeflTest'];
		$toeflScore = $_POST['toeflScore'];
		$toeflFuture = $_POST['toeflFuture'];
		$toeflDate = $_POST['toeflDate'];
		$toeflType = $_POST['toeflType'];
		$smoker = $_POST['smoker'];
		$disabilities = $_POST['disabilities'];
		$illness = $_POST['illness'];
		

		$sql_query = "INSERT INTO medical_english_inbound(
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
			'$getSes_studentID',
			'$smoker',
			'$disabilities',
			'$illness',
			'$toeflTest',
			'$toeflScore',
			'$toeflFuture',
			'$toeflDate',
			'$toeflType'			
		)";
		$query_db = mysqli_query($conn, $sql_query);

		if($query_db)
		{
			// echo 'success';
			header("Location: inboundform5.php");
		}else{
			header("Location: error_page.php");
		}
	}

	// for inboundform5
	if(isset($_POST['btn_form5']))
	{
		$expectation_area = $_POST['expectation_area'];

		$sql_query = "INSERT INTO expectation_prog_inbound(
			STUDENT_COUNT,
			STUDENT_ID,
			EXPECTATION_PROG
		) VALUES (
			'',
			'$getSes_studentID',
			'$expectation_area'
		)";
		$query_db = mysqli_query($conn, $sql_query);

		if($query_db)
		{
			header("Location: student_home.php");
		}else{
			header("Location: error_page.php");

		}

		// $sql_query1 = "SELECT APPLICATION_TYPE_PROG FROM educ_background_inbound WHERE STUDENT_ID = '$getSes_studentID' ";
		// $query_db2 = mysqli_query($conn, $sql_query1);

		// echo $query_db2;

		// if($query_db2 == 'Bilateral')
		// {
		// 	header("Location: pdf/inboundBilateral.php");
		// }else if($query_db2 == 'Scholarship'){
		// 	header("Location: pdf/inbound.php");
		// }else
		// {
		// 	header("Location: error_page.php");	
		// }

	}
	
?>
