<?php
	include 'database_connection.php';

	session_start();
	if($_SESSION['inValidation'] == 'empty' && $_SESSION['stuValid'] != 'yes'){
		header("Location: index.php");
	}else if($_SESSION['inValidation'] == 'empty' && $_SESSION['stuValid'] == 'yes'){
		header("Location: student_home.php");
	}elseif($_SESSION['inValidation'] == 'invalid' && $_SESSION['stuValid'] == 'yes'){
		$getSes_studentID = $_SESSION['student_id_session'];
		
		$query = mysqli_query($conn, "SELECT * FROM student WHERE STUDENT_ID = '$getSes_studentID'");
		while($rows = mysqli_fetch_array($query))
		{
			$familyName = $rows['FAMILY_NAME'];
			$givenName = $rows['GIVEN_NAME'];
		}

		// GET THE DATA FROM DATABSE~~~~
			//start inboundform1
				$query_select = "SELECT * FROM personal_info_inbound WHERE STUDENT_ID = '$getSes_studentID' ";
				$get_select = mysqli_query($conn, $query_select);
				while($row = mysqli_fetch_array($get_select)){
					$geSel_NATIONALITY_IN = $row['NATIONALITY_IN'];
					$geSel_PASSPORT_NUM_IN = $row['PASSPORT_NUM_IN'];
					$geSel_VALIDITY_DATE_IN = $row['VALIDITY_DATE_IN'];
					$geSel_DATE_ISSUANCE_IN = $row['DATE_ISSUANCE_IN'];
					$geSel_MAILING_ADD_IN = $row['MAILING_ADD_IN'];
					$geSel_TELEPHONE_NUM_IN = $row['TELEPHONE_NUM_IN'];
					$geSel_MOBILE_NUM_IN = $row['MOBILE_NUM_IN'];
				}

				$query_select1 = "SELECT * FROM personal_contact_inbound WHERE STUDENT_ID = '$getSes_studentID'";
				$get_select1 = mysqli_query($conn, $query_select1);
				while($row1 = mysqli_fetch_array($get_select1)){
					$getSel_PERSONAL_CONTACT_IN_BILA = $row1['PERSONAL_CONTACT_IN_BILA'];
					$getSel_RELATIONSHIP_IN_BILA = $row1['RELATIONSHIP_IN_BILA'];
					$getSel_ADD_IN_BILA = $row1['ADD_IN_BILA'];
					$getSel_EMAIL_ADD_IN_BILA = $row1['EMAIL_ADD_IN_BILA'];
					$getSel_TELEPHONE_NUM_IN_BILA  = $row1['TELEPHONE_NUM_IN_BILA'];
				}
			//end inboundform1
				
			// start inboundform2
				$query_select2 = "SELECT * FROM educ_background_inbound WHERE STUDENT_ID = '$getSes_studentID'";
				$get_select2 = mysqli_query($conn, $query_select2);
				while($row2 = mysqli_fetch_array($get_select2)){
					$getSel_COUNTRY_ORIGIN = $row2['COUNTRY_ORIGIN'];
					$getSel_HOME_UNIV_IN_BILA = $row2['HOME_UNIV_IN_BILA'];
					$getSel_UNIV_ADD_IN_BILA = $row2['UNIV_ADD_IN_BILA'];
					$getSel_NAME_OFFICER_CONTACT_IN_BILA = $row2['NAME_OFFICER_CONTACT_IN_BILA'];
					$getSel_EMAIL_ADD_IN_BILA_OFFIC = $row2['EMAIL_ADD_IN_BILA'];
					$getSel_CURRENT_PROG_STUDY_IN_BILA = $row2['CURRENT_PROG_STUDY_IN_BILA'];
					$getSel_DESIGNATION_IN_BILA = $row2['DESIGNATION_IN_BILA'];
					$getSel_TELEPHONE_NUM_BILA = $row2['TELEPHONE_NUM_BILA'];
					$getSel_SPECIALIZATION_IN_BILA = $row2['SPECIALIZATION_IN_BILA'];
					$getSel_YEAR_LEVEL = $row2['YEAR_LEVEL'];
					$getSel_TYPE_OF_PROGRAM = $row2['TYPE_OF_PROGRAM'];
					$getSel_TYPE_OF_PROG_OTHER = $row2['TYPE_OF_PROG_OTHER'];
					$getSel_TYPE_OF_FORM = $row2['TYPE_OF_FORM'];
					$getSel_TYPE_OF_FORM_OTHER = $row2['TYPE_OF_FORM_OTHER'];
					$getSel_SCHOLARSHIP_LOAN = $row2['SCHOLARSHIP_LOAN'];
					$getSel_SCHOLARSHIP_LOAN_OTHER = $row2['SCHOLARSHIP_LOAN_OTHER'];
					$getSel_SCHOLARSHIP_LOAN1 = $row2['SCHOLARSHIP_LOAN1'];
					$getSel_SCHOLARSHIP_LOAN_OTHER1 = $row2['SCHOLARSHIP_LOAN_OTHER1'];
				}
			//end inboundform2

			//start inboundform3
				$query_select3 = "SELECT * FROM proposed_field_study_in_bila WHERE STUDENT_ID = '$getSes_studentID'";
				$get_select3 = mysqli_query($conn, $query_select3);
				while($row3 = mysqli_fetch_array($get_select3)){
					$getSel_PROPOSED_PROG_INBOUND = $row3['PROPOSED_PROG_INBOUND'];
					$getSel_COURSE_1_INBOUND = $row3['COURSE_1_INBOUND'];
					$getSel_COURSE_2_INBOUND = $row3['COURSE_2_INBOUND'];
					$getSel_COURSE_3_INBOUND = $row3['COURSE_3_INBOUND'];
					$getSel_COURSE_4_INBOUND = $row3['COURSE_4_INBOUND'];
					$getSel_COURSE_5_INBOUND = $row3['COURSE_5_INBOUND'];
					$getSel_RESEARCH_TOPIC_INBOUND = $row3['RESEARCH_TOPIC_INBOUND'];
					$getSel_INTENDED_SEM_STUDY_INBOUND = $row3['INTENDED_SEM_STUDY_INBOUND'];
					$getSel_DESCRIPTION_ACTION_STATUS_INBOUND = $row3['DESCRIPTION_ACTION_STATUS_INBOUND'];
					$getSel_REASON_STUDYING_INBOUND = $row3['REASON_STUDYING_INBOUND'];
					$getSel_ACCOMODATION_INBOUND = $row3['ACCOMODATION_INBOUND'];
				}
			//end inboundform3

			//start inboundform4
				$query_select4 = "SELECT * FROM medical_english_inbound WHERE STUDENT_ID = '$getSes_studentID'";
				$get_select4 = mysqli_query($conn, $query_select4);
				while($row4 = mysqli_fetch_array($get_select4)){
					$getSel_DO_YOU_SMOKE_INBOUND = $row4['DO_YOU_SMOKE_INBOUND'];
					$getSel_DESCRIBE_DISABILI_INBOUND = $row4['DESCRIBE_DISABILI_INBOUND'];
					$getSel_DESCRIBE_ILL_INBOUND = $row4['DESCRIBE_ILL_INBOUND'];
					$getSel_COMPLETE_TOEF_INBOUND = $row4['COMPLETE_TOEF_INBOUND'];
					$getSel_COMPLETE_TOEF_SCORE_INBOUND = $row4['COMPLETE_TOEF_SCORE_INBOUND'];
					$getSel_INTEND_TAKE_TOEF_INBOUND = $row4['INTEND_TAKE_TOEF_INBOUND'];
					$getSel_INTEND_TAKE_TOEF_DATE_INBOUND = $row4['INTEND_TAKE_TOEF_DATE_INBOUND'];
					$getSel_INTEND_TAKE_TOEF_TYPE_INBOUND = $row4['INTEND_TAKE_TOEF_TYPE_INBOUND'];
				}
			//end inboundform4
			
			//start inboundform5
				$query_select5 = "SELECT * FROM expectation_prog_inbound WHERE STUDENT_ID ='$getSes_studentID' ";
				$get_select5 = mysqli_query($conn, $query_select5);
				while($row5 = mysqli_fetch_array($get_select5)){
					$getSel_EXPECTATION_PROG = $row5['EXPECTATION_PROG'];
				}
			//end inboundform5

		// END GET THE DATA FROM DATABSE~~~~

		
		// UPDATE THE TABLE ONCE THEY SUBMIT OR NEXT IT

			//for inboundform1
				if(isset($_POST['btn_inform1']))
				{
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

					$query_db = "UPDATE personal_info_inbound SET
					NATIONALITY_IN = '$nationality',
					PASSPORT_NUM_IN = '$passport',
					VALIDITY_DATE_IN = '$validity',
					DATE_ISSUANCE_IN = '$issuance',
					MAILING_ADD_IN = '$address',
					TELEPHONE_NUM_IN = '$telephone',
					MOBILE_NUM_IN = '$mobile'
					WHERE STUDENT_ID = '$getSes_studentID' ";
					
					// $query_db = "INSERT INTO personal_info_inbound(
					// 	STUDENT_COUNT, 
					// 	STUDENT_ID, 
					// 	APPLICATION_PROG, 
					// 	_IN,
					// 	NATIONALITY_IN, 
					// 	PASSPORT_NUM_IN, 
					// 	VALIDITY_DATE_IN, 
					// 	DATE_ISSUANCE_iN, 
					// 	MAILING_ADD_IN, 
					// 	TELEPHONE_NUM_IN, 
					// 	MOBILE_NUM_IN
					// 	) VALUES(
					// 		'', 
					// 		'$getSes_studentID', 
					// 		'',
					// 		'$citizenship', 
					// 		'$nationality', 
					// 		'$passport', 
					// 		'$validity', 
					// 		'$issuance', 
					// 		'$address', 
					// 		'$telephone',
					// 		'$mobile')";

					$checkQuery1 = mysqli_query($conn, $query_db);

					// $query_db1 = "INSERT INTO personal_contact_inbound(STUDENT_COUNT, STUDENT_ID, PERSONAL_CONTACT_IN_BILA, RELATIONSHIP_IN_BILA, ADD_IN_BILA, EMAIL_ADD_IN_BILA, TELEPHONE_NUM_IN_BILA
					// ) VALUES('', '$getSes_studentID', '$contactperson', '$relCP', '$addressCP', '$emailCP', '$numberCP')";

					$query_db1 = "UPDATE personal_contact_inbound SET 
					PERSONAL_CONTACT_IN_BILA = '$contactperson',
					RELATIONSHIP_IN_BILA = '$relCP',
					ADD_IN_BILA = '$addressCP',
					EMAIL_ADD_IN_BILA = '$emailCP',
					TELEPHONE_NUM_IN_BILA = '$numberCP'
					WHERE STUDENT_ID = '$getSes_studentID'";

					$checkQuery2 = mysqli_query($conn, $query_db1);

					if($checkQuery1 && $checkQuery2)
					{
						header("Location: inboundform2.php");
					}else
					{
						header("Location: error_page.php");
					}
					
				}
			// end for inboundform1

			//for inboundform2
			
				if(isset($_POST['btn_inform2']))
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
						if($type_program == "Scholarship"){
							$scholarship = $_POST['scholarship'];

							if($scholarship == "OTHERS")
							{
								$scholarshipText = $_POST['scholarshipText'];

								$sql_query = "UPDATE educ_background_inbound SET 
									COUNTRY_ORIGIN = '$country',
									HOME_UNIV_IN_BILA = '$get_univ',
									UNIV_ADD_IN_BILA = '$univAddress',
									NAME_OFFICER_CONTACT_IN_BILA = '$officer',
									EMAIL_ADD_IN_BILA = '$emailO',
									CURRENT_PROG_STUDY_IN_BILA = '$program',
									DESIGNATION_IN_BILA = '$designationO',
									TELEPHONE_NUM_BILA = '$numberO',
									SPECIALIZATION_IN_BILA = '$major',
									YEAR_LEVEL = '$yearLevel',
									TYPE_OF_PROGRAM = '$type_program',
									TYPE_OF_PROG_OTHER = ' ',
									TYPE_OF_FORM = '$scholarship',
									TYPE_OF_FORM_OTHER = '$scholarshipText',
									SCHOLARSHIP_LOAN = ' ',
									SCHOLARSHIP_LOAN_OTHER = ' ',
									SCHOLARSHIP_LOAN1 = ' ',
									SCHOLARSHIP_LOAN_OTHER1 = ' '
								WHERE STUDENT_ID = '$getSes_studentID'";
								
								// $sql_query = "INSERT INTO educ_background_inbound(
								// 	STUDENT_COUNT,
								// 	STUDENT_ID,
								// 	COUNTRY_ORIGIN,
								// 	HOME_UNIV_IN_BILA,
								// 	UNIV_ADD_IN_BILA,
								// 	NAME_OFFICER_CONTACT_IN_BILA,
								// 	EMAIL_ADD_IN_BILA,
								// 	CURRENT_PROG_STUDY_IN_BILA,
								// 	DESIGNATION_IN_BILA,
								// 	TELEPHONE_NUM_BILA,
								// 	SPECIALIZATION_IN_BILA,
								// 	YEAR_LEVEL,
								// 	SCHOLARSHIP_IN_BILA,
								// 	SCHOLARSHIP_TEXT_IN_BILA,
								// 	APPLICATION_FORM,
								// 	APPLICATION_TYPE_PROG	
								// ) VALUES (
								// 	'',
								// 	'$getSes_studentID',
								// 	'$country',
								// 	'$get_univ',
								// 	'$univAddress',
								// 	'$officer',
								// 	'$emailO',
								// 	'$program',
								// 	'$designationO',
								// 	'$numberO',
								// 	'$major',
								// 	'$yearLevel',
								// 	'',
								// 	'',
								// 	'$scholarshipText',
								// 	'$type_program'
								// )";
							}else{
								$scholarshipText = '';
								$sql_query = "UPDATE educ_background_inbound SET 
									COUNTRY_ORIGIN = '$country',
									HOME_UNIV_IN_BILA = '$get_univ',
									UNIV_ADD_IN_BILA = '$univAddress',
									NAME_OFFICER_CONTACT_IN_BILA = '$officer',
									EMAIL_ADD_IN_BILA = '$emailO',
									CURRENT_PROG_STUDY_IN_BILA = '$program',
									DESIGNATION_IN_BILA = '$designationO',
									TELEPHONE_NUM_BILA = '$numberO',
									SPECIALIZATION_IN_BILA = '$major',
									YEAR_LEVEL = '$yearLevel',
									TYPE_OF_PROGRAM = '$type_program',
									TYPE_OF_PROG_OTHER = ' ',
									TYPE_OF_FORM = '$scholarship',
									TYPE_OF_FORM_OTHER = ' ',
									SCHOLARSHIP_LOAN = ' ',
									SCHOLARSHIP_LOAN_OTHER = ' ',
									SCHOLARSHIP_LOAN1 = ' ',
									SCHOLARSHIP_LOAN_OTHER1 = ' '
								WHERE STUDENT_ID = '$getSes_studentID'";
								// $sql_query = "INSERT INTO educ_background_inbound(
								// 	STUDENT_COUNT,
								// 	STUDENT_ID,
								// 	COUNTRY_ORIGIN,
								// 	HOME_UNIV_IN_BILA,
								// 	UNIV_ADD_IN_BILA,
								// 	NAME_OFFICER_CONTACT_IN_BILA,
								// 	EMAIL_ADD_IN_BILA,
								// 	CURRENT_PROG_STUDY_IN_BILA,
								// 	DESIGNATION_IN_BILA,
								// 	TELEPHONE_NUM_BILA,
								// 	SPECIALIZATION_IN_BILA,
								// 	YEAR_LEVEL,
								// 	SCHOLARSHIP_IN_BILA,
								// 	SCHOLARSHIP_TEXT_IN_BILA,
								// 	APPLICATION_FORM,
								// 	APPLICATION_TYPE_PROG	
								// ) VALUES (
								// 	'',
								// 	'$getSes_studentID',
								// 	'$country',
								// 	'$get_univ',
								// 	'$univAddress',
								// 	'$officer',
								// 	'$emailO',
								// 	'$program',
								// 	'$designationO',
								// 	'$numberO',
								// 	'$major',
								// 	'$yearLevel',
								// 	'',
								// 	'',
								// 	'$scholarship',
								// 	'$type_program'
								// )";
							}
						}

						if($type_program == "ShortStudy" || $type_program == "StudyTour" || $type_program == "ServiceLearning" ){
							$bilateral = $_POST['bilateral'];

							if(isset($_POST['scholarloan'])){

								$scholarloan = $_POST['scholarloan'];

								if($scholarloan == 'Yes'){

									$scholarloanText = $_POST['scholarloanText'];
									
								}else{
									$scholarloanText = '';
								}
							}
							if($bilateral == "Others"){
								$bilateralText = $_POST['bilateralText'];

								$sql_query = "UPDATE educ_background_inbound SET 
									COUNTRY_ORIGIN = '$country',
									HOME_UNIV_IN_BILA = '$get_univ',
									UNIV_ADD_IN_BILA = '$univAddress',
									NAME_OFFICER_CONTACT_IN_BILA = '$officer',
									EMAIL_ADD_IN_BILA = '$emailO',
									CURRENT_PROG_STUDY_IN_BILA = '$program',
									DESIGNATION_IN_BILA = '$designationO',
									TELEPHONE_NUM_BILA = '$numberO',
									SPECIALIZATION_IN_BILA = '$major',
									YEAR_LEVEL = '$yearLevel',
									TYPE_OF_PROGRAM = '$type_program',
									TYPE_OF_PROG_OTHER = ' ',
									TYPE_OF_FORM = '$bilateral',
									TYPE_OF_FORM_OTHER = '$bilateralText',
									SCHOLARSHIP_LOAN = '$scholarloan',
									SCHOLARSHIP_LOAN_OTHER = '$scholarloanText',
									SCHOLARSHIP_LOAN1 = ' ',
									SCHOLARSHIP_LOAN_OTHER1 = ' '
								WHERE STUDENT_ID = '$getSes_studentID'";
							
							// $sql_query = "INSERT INTO educ_background_inbound(
							// 	STUDENT_COUNT,
							// 	STUDENT_ID,
							// 	COUNTRY_ORIGIN,
							// 	HOME_UNIV_IN_BILA,
							// 	UNIV_ADD_IN_BILA,
							// 	NAME_OFFICER_CONTACT_IN_BILA,
							// 	EMAIL_ADD_IN_BILA,
							// 	CURRENT_PROG_STUDY_IN_BILA,
							// 	DESIGNATION_IN_BILA,
							// 	TELEPHONE_NUM_BILA,
							// 	SPECIALIZATION_IN_BILA,
							// 	YEAR_LEVEL,
							// 	SCHOLARSHIP_IN_BILA,
							// 	SCHOLARSHIP_TEXT_IN_BILA,
							// 	APPLICATION_FORM,
							// 	APPLICATION_TYPE_PROG	
							// ) VALUES (
							// 	'',
							// 	'$getSes_studentID',
							// 	'$country',
							// 	'$get_univ',
							// 	'$univAddress',
							// 	'$officer',
							// 	'$emailO',
							// 	'$program',
							// 	'$designationO',
							// 	'$numberO',
							// 	'$major',
							// 	'$yearLevel',
							// 	'$scholarloan',
							// 	'$scholarloanText',
							// 	'$bilateral',
							// 	'$type_program'
							// )";

							}else{
								$sql_query = "UPDATE educ_background_inbound SET 
								COUNTRY_ORIGIN = '$country',
								HOME_UNIV_IN_BILA = '$get_univ',
								UNIV_ADD_IN_BILA = '$univAddress',
								NAME_OFFICER_CONTACT_IN_BILA = '$officer',
								EMAIL_ADD_IN_BILA = '$emailO',
								CURRENT_PROG_STUDY_IN_BILA = '$program',
								DESIGNATION_IN_BILA = '$designationO',
								TELEPHONE_NUM_BILA = '$numberO',
								SPECIALIZATION_IN_BILA = '$major',
								YEAR_LEVEL = '$yearLevel',
								TYPE_OF_PROGRAM = '$type_program',
								TYPE_OF_PROG_OTHER = ' ',
								TYPE_OF_FORM = '$bilateral',
								TYPE_OF_FORM_OTHER = ' ',
								SCHOLARSHIP_LOAN = '$scholarloan',
								SCHOLARSHIP_LOAN_OTHER = '$scholarloanText',
								SCHOLARSHIP_LOAN1 = ' ',
								SCHOLARSHIP_LOAN_OTHER1 = ' '
							WHERE STUDENT_ID = '$getSes_studentID'";
							
							// $sql_query = "INSERT INTO educ_background_inbound(
							// 	STUDENT_COUNT,
							// 	STUDENT_ID,
							// 	COUNTRY_ORIGIN,
							// 	HOME_UNIV_IN_BILA,
							// 	UNIV_ADD_IN_BILA,
							// 	NAME_OFFICER_CONTACT_IN_BILA,
							// 	EMAIL_ADD_IN_BILA,
							// 	CURRENT_PROG_STUDY_IN_BILA,
							// 	DESIGNATION_IN_BILA,
							// 	TELEPHONE_NUM_BILA,
							// 	SPECIALIZATION_IN_BILA,
							// 	YEAR_LEVEL,
							// 	SCHOLARSHIP_IN_BILA,
							// 	SCHOLARSHIP_TEXT_IN_BILA,
							// 	APPLICATION_FORM,
							// 	APPLICATION_TYPE_PROG	
							// ) VALUES (
							// 	'',
							// 	'$getSes_studentID',
							// 	'$country',
							// 	'$get_univ',
							// 	'$univAddress',
							// 	'$officer',
							// 	'$emailO',
							// 	'$program',
							// 	'$designationO',
							// 	'$numberO',
							// 	'$major',
							// 	'$yearLevel',
							// 	'$scholarloan',
							// 	'$scholarloanText',
							// 	'$bilateral',
							// 	'$type_program'
							// )";
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
			// end for inboundform2

			// for inboundform3
				if(isset($_POST['btn_inform3']))
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

					$sql_query = "UPDATE proposed_field_study_in_bila SET
						PROPOSED_PROG_INBOUND = '$proposedProg',
						COURSE_1_INBOUND = '$course1',
						COURSE_2_INBOUND = '$course2',
						COURSE_3_INBOUND = '$course3',
						COURSE_4_INBOUND = '$course4',
						COURSE_5_INBOUND = '$course5',
						RESEARCH_TOPIC_INBOUND = '$research',
						INTENDED_SEM_STUDY_INBOUND = '$sem',
						DESCRIPTION_ACTION_STATUS_INBOUND = '$disciplinary',
						REASON_STUDYING_INBOUND = '$reason',
						ACCOMODATION_INBOUND ='$accomodation'
						WHERE STUDENT_ID = '$getSes_studentID' ";

					// $sql_query = "INSERT INTO proposed_field_study_in_bila(
					// 	STUDENT_COUNT,
					// 	STUDENT_ID,
					// 	PROPOSED_PROG_INBOUND,
					// 	COURSE_1_INBOUND,
					// 	COURSE_2_INBOUND,
					// 	COURSE_3_INBOUND,
					// 	COURSE_4_INBOUND,
					// 	COURSE_5_INBOUND,
					// 	RESEARCH_TOPIC_INBOUND,
					// 	INTENDED_SEM_STUDY_INBOUND,
					// 	DESCRIPTION_ACTION_STATUS_INBOUND,
					// 	REASON_STUDYING_INBOUND,
					// 	ACCOMODATION_INBOUND
					// ) VALUES (
					// 	'',
					// 	'$getSes_studentID',
					// 	'$proposedProg',
					// 	'$course1',
					// 	'$course2',
					// 	'$course3',
					// 	'$course4',
					// 	'$course5',
					// 	'$research',
					// 	'$sem',
					// 	'$reason',
					// 	'$disciplinary',
					// 	'$accomodation'
					// )";

					$query_db = mysqli_query($conn, $sql_query);

					if($query_db)
					{
						header("Location: inboundform4.php");
					}else{
						// header("Location: error_page.php");
					}
				}
			// end for inboundform3

			// for inboundform4
				if(isset($_POST['btn_inform4']))
				{
					$toeflTest = $_POST['toeflTest'];
					$toeflScore = $_POST['toeflScore'];
					$toeflFuture = $_POST['toeflFuture'];
					$toeflDate = $_POST['toeflDate'];
					$toeflType = $_POST['toeflType'];
					$smoker = $_POST['smoker'];
					$disabilities = $_POST['disabilities'];
					$illness = $_POST['illness'];
					
					$sql_query = "UPDATE medical_english_inbound SET
						DO_YOU_SMOKE_INBOUND = '$smoker',
						DESCRIBE_DISABILI_INBOUND = '$disabilities',
						DESCRIBE_ILL_INBOUND = '$illness',
						COMPLETE_TOEF_INBOUND = '$toeflTest',
						COMPLETE_TOEF_SCORE_INBOUND = '$toeflScore',
						INTEND_TAKE_TOEF_INBOUND = '$toeflFuture',
						INTEND_TAKE_TOEF_DATE_INBOUND = '$toeflDate',
						INTEND_TAKE_TOEF_TYPE_INBOUND = '$toeflType'
						WHERE STUDENT_ID = '$getSes_studentID' ";

					// $sql_query = "INSERT INTO medical_english_inbound(
					// 	STUDENT_COUNT,
					// 	STUDENT_ID,
					// 	DO_YOU_SMOKE_INBOUND,
					// 	DESCRIBE_DISABILI_INBOUND,
					// 	DESCRIBE_ILL_INBOUND,
					// 	COMPLETE_TOEF_INBOUND,
					// 	COMPLETE_TOEF_SCORE_INBOUND,
					// 	INTEND_TAKE_TOEF_INBOUND,
					// 	INTEND_TAKE_TOEF_DATE_INBOUND,
					// 	INTEND_TAKE_TOEF_TYPE_INBOUND
					// ) VALUES(
					// 	'',
					// 	'$getSes_studentID',
					// 	'$smoker',
					// 	'$disabilities',
					// 	'$illness',
					// 	'$toeflTest',
					// 	'$toeflScore',
					// 	'$toeflFuture',
					// 	'$toeflDate',
					// 	'$toeflType'			
					// )";
					$query_db = mysqli_query($conn, $sql_query);

					if($query_db)
					{
						// echo 'success';
						header("Location: inboundform5.php");
					}else{
						header("Location: error_page.php");
					}
				}
			// end for inboundform4

			// for inboundform5
				if(isset($_POST['btn_inform5']))
				{
					$expectation_area = $_POST['expectation_area'];
					
					str_replace("<", "&lt;", $expectation_area);
					str_replace(">", "&gt;", $expectation_area);

					$sql_query = "UPDATE expectation_prog_inbound SET
					EXPECTATION_PROG = '$expectation_area' 
					WHERE STUDENT_ID = '$getSes_studentID' ";

					$query_db = mysqli_query($conn, $sql_query);

					$query_db = mysqli_query($conn, $sql_query);
						$query_db3 = "UPDATE student SET
						PAGINATION = 'submitted summary' 
						WHERE STUDENT_ID ='$getSes_studentID'
						";

					$checkQuery3 = mysqli_query($conn, $query_db3);

					if($query_db && $checkQuery3)
					{
						if($_SESSION['inValidation'] == 'invalid'){
							$_SESSION['inValidation'] = 'empty';
							$_SESSION['validSummarypdf'] = 'sumpdfvalid';
							header("Location: summary_pdf_in.php");
						}
					}else{
						header("Location: error_page.php");

					}
				}
			// end for inboundform5

		// END UPDATE THE TABLE ONCE THEY SUBMIT OR NEXT IT
		
		// FOR SAVE BUTTON!!!!!!!!!!!!!!!!!~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
			//for inboundform1
				if(isset($_POST['btnSaveinform1']))
				{
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

					$query_db = "UPDATE personal_info_inbound SET
					NATIONALITY_IN = '$nationality',
					PASSPORT_NUM_IN = '$passport',
					VALIDITY_DATE_IN = '$validity',
					DATE_ISSUANCE_IN = '$issuance',
					MAILING_ADD_IN = '$address',
					TELEPHONE_NUM_IN = '$telephone',
					MOBILE_NUM_IN = '$mobile'
					WHERE STUDENT_ID = '$getSes_studentID' ";
					
					// $query_db = "INSERT INTO personal_info_inbound(
					// 	STUDENT_COUNT, 
					// 	STUDENT_ID, 
					// 	APPLICATION_PROG, 
					// 	CITIZENSHIP_IN,
					// 	NATIONALITY_IN, 
					// 	PASSPORT_NUM_IN, 
					// 	VALIDITY_DATE_IN, 
					// 	DATE_ISSUANCE_iN, 
					// 	MAILING_ADD_IN, 
					// 	TELEPHONE_NUM_IN, 
					// 	MOBILE_NUM_IN
					// 	) VALUES(
					// 		'', 
					// 		'$getSes_studentID', 
					// 		'',
					// 		'$citizenship', 
					// 		'$nationality', 
					// 		'$passport', 
					// 		'$validity', 
					// 		'$issuance', 
					// 		'$address', 
					// 		'$telephone',
					// 		'$mobile')";

					$checkQuery1 = mysqli_query($conn, $query_db);

					// $query_db1 = "INSERT INTO personal_contact_inbound(STUDENT_COUNT, STUDENT_ID, PERSONAL_CONTACT_IN_BILA, RELATIONSHIP_IN_BILA, ADD_IN_BILA, EMAIL_ADD_IN_BILA, TELEPHONE_NUM_IN_BILA
					// ) VALUES('', '$getSes_studentID', '$contactperson', '$relCP', '$addressCP', '$emailCP', '$numberCP')";

					$query_db1 = "UPDATE personal_contact_inbound SET 
					PERSONAL_CONTACT_IN_BILA = '$contactperson',
					RELATIONSHIP_IN_BILA = '$relCP',
					ADD_IN_BILA = '$addressCP',
					EMAIL_ADD_IN_BILA = '$emailCP',
					TELEPHONE_NUM_IN_BILA = '$numberCP'
					WHERE STUDENT_ID = '$getSes_studentID'";

					$checkQuery2 = mysqli_query($conn, $query_db1);

					$query_db3 = "UPDATE student SET
					PAGINATION = 'inbound page 1' 
					WHERE STUDENT_ID ='$getSes_studentID'
					";

					$checkQuery3 = mysqli_query($conn, $query_db3);

					if($checkQuery1 && $checkQuery2 && $checkQuery3)
					{
						header("Location: student_home.php");
					}else
					{
						header("Location: error_page.php");
					}
					
				}
			// end for inboundform1

			//for inboundform2
			
				if(isset($_POST['btnSaveinform2']))
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
						if($type_program == "Scholarship"){
							$scholarship = $_POST['scholarship'];

							if($scholarship == "OTHERS")
							{
								$scholarshipText = $_POST['scholarshipText'];

								$sql_query = "UPDATE educ_background_inbound SET 
									COUNTRY_ORIGIN = '$country',
									HOME_UNIV_IN_BILA = '$get_univ',
									UNIV_ADD_IN_BILA = '$univAddress',
									NAME_OFFICER_CONTACT_IN_BILA = '$officer',
									EMAIL_ADD_IN_BILA = '$emailO',
									CURRENT_PROG_STUDY_IN_BILA = '$program',
									DESIGNATION_IN_BILA = '$designationO',
									TELEPHONE_NUM_BILA = '$numberO',
									SPECIALIZATION_IN_BILA = '$major',
									YEAR_LEVEL = '$yearLevel',
									TYPE_OF_PROGRAM = '$type_program',
									TYPE_OF_PROG_OTHER = ' ',
									TYPE_OF_FORM = '$scholarship',
									TYPE_OF_FORM_OTHER = '$scholarshipText',
									SCHOLARSHIP_LOAN = ' ',
									SCHOLARSHIP_LOAN_OTHER = ' ',
									SCHOLARSHIP_LOAN1 = ' ',
									SCHOLARSHIP_LOAN_OTHER1 = ' '
								WHERE STUDENT_ID = '$getSes_studentID'";
								
								// $sql_query = "INSERT INTO educ_background_inbound(
								// 	STUDENT_COUNT,
								// 	STUDENT_ID,
								// 	COUNTRY_ORIGIN,
								// 	HOME_UNIV_IN_BILA,
								// 	UNIV_ADD_IN_BILA,
								// 	NAME_OFFICER_CONTACT_IN_BILA,
								// 	EMAIL_ADD_IN_BILA,
								// 	CURRENT_PROG_STUDY_IN_BILA,
								// 	DESIGNATION_IN_BILA,
								// 	TELEPHONE_NUM_BILA,
								// 	SPECIALIZATION_IN_BILA,
								// 	YEAR_LEVEL,
								// 	SCHOLARSHIP_IN_BILA,
								// 	SCHOLARSHIP_TEXT_IN_BILA,
								// 	APPLICATION_FORM,
								// 	APPLICATION_TYPE_PROG	
								// ) VALUES (
								// 	'',
								// 	'$getSes_studentID',
								// 	'$country',
								// 	'$get_univ',
								// 	'$univAddress',
								// 	'$officer',
								// 	'$emailO',
								// 	'$program',
								// 	'$designationO',
								// 	'$numberO',
								// 	'$major',
								// 	'$yearLevel',
								// 	'',
								// 	'',
								// 	'$scholarshipText',
								// 	'$type_program'
								// )";
							}else{
								$scholarshipText = '';
								$sql_query = "UPDATE educ_background_inbound SET 
									COUNTRY_ORIGIN = '$country',
									HOME_UNIV_IN_BILA = '$get_univ',
									UNIV_ADD_IN_BILA = '$univAddress',
									NAME_OFFICER_CONTACT_IN_BILA = '$officer',
									EMAIL_ADD_IN_BILA = '$emailO',
									CURRENT_PROG_STUDY_IN_BILA = '$program',
									DESIGNATION_IN_BILA = '$designationO',
									TELEPHONE_NUM_BILA = '$numberO',
									SPECIALIZATION_IN_BILA = '$major',
									YEAR_LEVEL = '$yearLevel',
									TYPE_OF_PROGRAM = '$type_program',
									TYPE_OF_PROG_OTHER = ' ',
									TYPE_OF_FORM = '$scholarship',
									TYPE_OF_FORM_OTHER = ' ',
									SCHOLARSHIP_LOAN = ' ',
									SCHOLARSHIP_LOAN_OTHER = ' ',
									SCHOLARSHIP_LOAN1 = ' ',
									SCHOLARSHIP_LOAN_OTHER1 = ' '
								WHERE STUDENT_ID = '$getSes_studentID'";
								// $sql_query = "INSERT INTO educ_background_inbound(
								// 	STUDENT_COUNT,
								// 	STUDENT_ID,
								// 	COUNTRY_ORIGIN,
								// 	HOME_UNIV_IN_BILA,
								// 	UNIV_ADD_IN_BILA,
								// 	NAME_OFFICER_CONTACT_IN_BILA,
								// 	EMAIL_ADD_IN_BILA,
								// 	CURRENT_PROG_STUDY_IN_BILA,
								// 	DESIGNATION_IN_BILA,
								// 	TELEPHONE_NUM_BILA,
								// 	SPECIALIZATION_IN_BILA,
								// 	YEAR_LEVEL,
								// 	SCHOLARSHIP_IN_BILA,
								// 	SCHOLARSHIP_TEXT_IN_BILA,
								// 	APPLICATION_FORM,
								// 	APPLICATION_TYPE_PROG	
								// ) VALUES (
								// 	'',
								// 	'$getSes_studentID',
								// 	'$country',
								// 	'$get_univ',
								// 	'$univAddress',
								// 	'$officer',
								// 	'$emailO',
								// 	'$program',
								// 	'$designationO',
								// 	'$numberO',
								// 	'$major',
								// 	'$yearLevel',
								// 	'',
								// 	'',
								// 	'$scholarship',
								// 	'$type_program'
								// )";
							}
						}

						if($type_program == "ShortStudy" || $type_program == "StudyTour" || $type_program == "ServiceLearning" ){
							$bilateral = $_POST['bilateral'];

							if(isset($_POST['scholarloan'])){

								$scholarloan = $_POST['scholarloan'];

								if($scholarloan == 'Yes'){

									$scholarloanText = $_POST['scholarloanText'];
									
								}else{
									$scholarloanText = '';
								}
							}
							if($bilateral == "Others"){
								$bilateralText = $_POST['bilateralText'];

								$sql_query = "UPDATE educ_background_inbound SET 
									COUNTRY_ORIGIN = '$country',
									HOME_UNIV_IN_BILA = '$get_univ',
									UNIV_ADD_IN_BILA = '$univAddress',
									NAME_OFFICER_CONTACT_IN_BILA = '$officer',
									EMAIL_ADD_IN_BILA = '$emailO',
									CURRENT_PROG_STUDY_IN_BILA = '$program',
									DESIGNATION_IN_BILA = '$designationO',
									TELEPHONE_NUM_BILA = '$numberO',
									SPECIALIZATION_IN_BILA = '$major',
									YEAR_LEVEL = '$yearLevel',
									TYPE_OF_PROGRAM = '$type_program',
									TYPE_OF_PROG_OTHER = ' ',
									TYPE_OF_FORM = '$bilateral',
									TYPE_OF_FORM_OTHER = '$bilateralText',
									SCHOLARSHIP_LOAN = '$scholarloan',
									SCHOLARSHIP_LOAN_OTHER = '$scholarloanText',
									SCHOLARSHIP_LOAN1 = ' ',
									SCHOLARSHIP_LOAN_OTHER1 = ' '
								WHERE STUDENT_ID = '$getSes_studentID'";
							
							// $sql_query = "INSERT INTO educ_background_inbound(
							// 	STUDENT_COUNT,
							// 	STUDENT_ID,
							// 	COUNTRY_ORIGIN,
							// 	HOME_UNIV_IN_BILA,
							// 	UNIV_ADD_IN_BILA,
							// 	NAME_OFFICER_CONTACT_IN_BILA,
							// 	EMAIL_ADD_IN_BILA,
							// 	CURRENT_PROG_STUDY_IN_BILA,
							// 	DESIGNATION_IN_BILA,
							// 	TELEPHONE_NUM_BILA,
							// 	SPECIALIZATION_IN_BILA,
							// 	YEAR_LEVEL,
							// 	SCHOLARSHIP_IN_BILA,
							// 	SCHOLARSHIP_TEXT_IN_BILA,
							// 	APPLICATION_FORM,
							// 	APPLICATION_TYPE_PROG	
							// ) VALUES (
							// 	'',
							// 	'$getSes_studentID',
							// 	'$country',
							// 	'$get_univ',
							// 	'$univAddress',
							// 	'$officer',
							// 	'$emailO',
							// 	'$program',
							// 	'$designationO',
							// 	'$numberO',
							// 	'$major',
							// 	'$yearLevel',
							// 	'$scholarloan',
							// 	'$scholarloanText',
							// 	'$bilateral',
							// 	'$type_program'
							// )";

							}else{
								$sql_query = "UPDATE educ_background_inbound SET 
								COUNTRY_ORIGIN = '$country',
								HOME_UNIV_IN_BILA = '$get_univ',
								UNIV_ADD_IN_BILA = '$univAddress',
								NAME_OFFICER_CONTACT_IN_BILA = '$officer',
								EMAIL_ADD_IN_BILA = '$emailO',
								CURRENT_PROG_STUDY_IN_BILA = '$program',
								DESIGNATION_IN_BILA = '$designationO',
								TELEPHONE_NUM_BILA = '$numberO',
								SPECIALIZATION_IN_BILA = '$major',
								YEAR_LEVEL = '$yearLevel',
								TYPE_OF_PROGRAM = '$type_program',
								TYPE_OF_PROG_OTHER = ' ',
								TYPE_OF_FORM = '$bilateral',
								TYPE_OF_FORM_OTHER = ' ',
								SCHOLARSHIP_LOAN = '$scholarloan',
								SCHOLARSHIP_LOAN_OTHER = '$scholarloanText',
								SCHOLARSHIP_LOAN1 = ' ',
								SCHOLARSHIP_LOAN_OTHER1 = ' '
							WHERE STUDENT_ID = '$getSes_studentID'";
							
							// $sql_query = "INSERT INTO educ_background_inbound(
							// 	STUDENT_COUNT,
							// 	STUDENT_ID,
							// 	COUNTRY_ORIGIN,
							// 	HOME_UNIV_IN_BILA,
							// 	UNIV_ADD_IN_BILA,
							// 	NAME_OFFICER_CONTACT_IN_BILA,
							// 	EMAIL_ADD_IN_BILA,
							// 	CURRENT_PROG_STUDY_IN_BILA,
							// 	DESIGNATION_IN_BILA,
							// 	TELEPHONE_NUM_BILA,
							// 	SPECIALIZATION_IN_BILA,
							// 	YEAR_LEVEL,
							// 	SCHOLARSHIP_IN_BILA,
							// 	SCHOLARSHIP_TEXT_IN_BILA,
							// 	APPLICATION_FORM,
							// 	APPLICATION_TYPE_PROG	
							// ) VALUES (
							// 	'',
							// 	'$getSes_studentID',
							// 	'$country',
							// 	'$get_univ',
							// 	'$univAddress',
							// 	'$officer',
							// 	'$emailO',
							// 	'$program',
							// 	'$designationO',
							// 	'$numberO',
							// 	'$major',
							// 	'$yearLevel',
							// 	'$scholarloan',
							// 	'$scholarloanText',
							// 	'$bilateral',
							// 	'$type_program'
							// )";
							}
						}
					}
						
					$query_db = mysqli_query($conn, $sql_query);

					$query_page = "UPDATE student SET
						PAGINATION = 'inbound page 2' 
						WHERE STUDENT_ID ='$getSes_studentID'
					";

					$checkQuery_page = mysqli_query($conn, $query_page);

					if($query_db && $checkQuery_page)
					{
						echo 'success';
						header("Location: student_home.php");
					}else{
						header("Location: error_page.php");
					}
				}
			// end for inboundform2

			// for inboundform3
				if(isset($_POST['btnSaveinform3']))
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

					$sql_query = "UPDATE proposed_field_study_in_bila SET
						PROPOSED_PROG_INBOUND = '$proposedProg',
						COURSE_1_INBOUND = '$course1',
						COURSE_2_INBOUND = '$course2',
						COURSE_3_INBOUND = '$course3',
						COURSE_4_INBOUND = '$course4',
						COURSE_5_INBOUND = '$course5',
						RESEARCH_TOPIC_INBOUND = '$research',
						INTENDED_SEM_STUDY_INBOUND = '$sem',
						DESCRIPTION_ACTION_STATUS_INBOUND = '$disciplinary',
						REASON_STUDYING_INBOUND = '$reason',
						ACCOMODATION_INBOUND ='$accomodation'
						WHERE STUDENT_ID = '$getSes_studentID' ";

					// $sql_query = "INSERT INTO proposed_field_study_in_bila(
					// 	STUDENT_COUNT,
					// 	STUDENT_ID,
					// 	PROPOSED_PROG_INBOUND,
					// 	COURSE_1_INBOUND,
					// 	COURSE_2_INBOUND,
					// 	COURSE_3_INBOUND,
					// 	COURSE_4_INBOUND,
					// 	COURSE_5_INBOUND,
					// 	RESEARCH_TOPIC_INBOUND,
					// 	INTENDED_SEM_STUDY_INBOUND,
					// 	DESCRIPTION_ACTION_STATUS_INBOUND,
					// 	REASON_STUDYING_INBOUND,
					// 	ACCOMODATION_INBOUND
					// ) VALUES (
					// 	'',
					// 	'$getSes_studentID',
					// 	'$proposedProg',
					// 	'$course1',
					// 	'$course2',
					// 	'$course3',
					// 	'$course4',
					// 	'$course5',
					// 	'$research',
					// 	'$sem',
					// 	'$reason',
					// 	'$disciplinary',
					// 	'$accomodation'
					// )";

					$query_db = mysqli_query($conn, $sql_query);
					
					$query_db3 = "UPDATE student SET
						PAGINATION = 'inbound page 3' 
						WHERE STUDENT_ID ='$getSes_studentID'
					";

					$checkQuery3 = mysqli_query($conn, $query_db3);

					if($query_db && $checkQuery3)
					{
						// echo 'success';
						header("Location: student_home.php");
					}else{
						// echo "error";
						header("Location: error_page.php");
					}
				}
			// end for inboundform3

			// for inboundform4
				if(isset($_POST['btnSaveinform4']))
				{
					$toeflTest = $_POST['toeflTest'];
					$toeflScore = $_POST['toeflScore'];
					$toeflFuture = $_POST['toeflFuture'];
					$toeflDate = $_POST['toeflDate'];
					$toeflType = $_POST['toeflType'];
					$smoker = $_POST['smoker'];
					$disabilities = $_POST['disabilities'];
					$illness = $_POST['illness'];
					
					$sql_query = "UPDATE medical_english_inbound SET
						DO_YOU_SMOKE_INBOUND = '$smoker',
						DESCRIBE_DISABILI_INBOUND = '$disabilities',
						DESCRIBE_ILL_INBOUND = '$illness',
						COMPLETE_TOEF_INBOUND = '$toeflTest',
						COMPLETE_TOEF_SCORE_INBOUND = '$toeflScore',
						INTEND_TAKE_TOEF_INBOUND = '$toeflFuture',
						INTEND_TAKE_TOEF_DATE_INBOUND = '$toeflDate',
						INTEND_TAKE_TOEF_TYPE_INBOUND = '$toeflType'
						WHERE STUDENT_ID = '$getSes_studentID' ";

					// $sql_query = "INSERT INTO medical_english_inbound(
					// 	STUDENT_COUNT,
					// 	STUDENT_ID,
					// 	DO_YOU_SMOKE_INBOUND,
					// 	DESCRIBE_DISABILI_INBOUND,
					// 	DESCRIBE_ILL_INBOUND,
					// 	COMPLETE_TOEF_INBOUND,
					// 	COMPLETE_TOEF_SCORE_INBOUND,
					// 	INTEND_TAKE_TOEF_INBOUND,
					// 	INTEND_TAKE_TOEF_DATE_INBOUND,
					// 	INTEND_TAKE_TOEF_TYPE_INBOUND
					// ) VALUES(
					// 	'',
					// 	'$getSes_studentID',
					// 	'$smoker',
					// 	'$disabilities',
					// 	'$illness',
					// 	'$toeflTest',
					// 	'$toeflScore',
					// 	'$toeflFuture',
					// 	'$toeflDate',
					// 	'$toeflType'			
					// )";
					$query_db = mysqli_query($conn, $sql_query);
					
					$query_db = mysqli_query($conn, $sql_query);
						$query_db3 = "UPDATE student SET
						PAGINATION = 'inbound page 4' 
						WHERE STUDENT_ID ='$getSes_studentID'
						";

					$checkQuery3 = mysqli_query($conn, $query_db3);

					if($query_db && $checkQuery3)
					{
						// echo 'success';
						header("Location: student_home.php");
					}else{
						header("Location: error_page.php");
					}
				}
			// end for inboundform4

			// for inboundform5
				if(isset($_POST['btnSaveinform5']))
				{
					$expectation_area = $_POST['expectation_area'];
					
					str_replace("<", "&lt;", $expectation_area);
					str_replace(">", "&gt;", $expectation_area);

					$sql_query = "UPDATE expectation_prog_inbound SET
					EXPECTATION_PROG = '$expectation_area' 
					WHERE STUDENT_ID = '$getSes_studentID' ";

					// $sql_query = "INSERT INTO expectation_prog_inbound(
					// 	STUDENT_COUNT,
					// 	STUDENT_ID,
					// 	EXPECTATION_PROG
					// ) VALUES (
					// 	'',
					// 	'$getSes_studentID',
					// 	'$expectation_area'
					// )";
					$query_db = mysqli_query($conn, $sql_query);
					
						$query_db3 = "UPDATE student SET
						PAGINATION = 'inbound page 5' 
						WHERE STUDENT_ID ='$getSes_studentID'
						";

					$checkQuery3 = mysqli_query($conn, $query_db3);

					if($query_db && $checkQuery3)
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
			// end for inboundform5

		// end FOR SAVE BUTTON!!!!!!!!!!!!!!!!!~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
	}else{
		header("Location: index.php");
	}

?>
