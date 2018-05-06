<?php
	include 'database_connection.php';
	session_start();
	echo $_SESSION['outValidaition'];

	if($_SESSION['outValidaition'] == 'empty' && $_SESSION['stuValid'] != 'yes'){
		header("Location: index.php");
		// echo "pumasok ka!!!!";
	}else if($_SESSION['outValidaition'] == 'empty' && $_SESSION['stuValid'] == 'yes' ){
		header("Location: student_home.php");
	}elseif($_SESSION['outValidaition'] == 'outvalid' && $_SESSION['stuValid'] == 'yes'){

		$getses_StudentID =  $_SESSION['student_id_session'];
		$message = '';

		$query = mysqli_query($conn, "SELECT * FROM student WHERE STUDENT_ID = '$getses_StudentID'");
		while($rows = mysqli_fetch_array($query))
		{
			$email = $rows['EMAIL'];
			$application_prog = $rows['APPLICATION_PROG'];
			$familyName = $rows['FAMILY_NAME'];
			$givenName = $rows['GIVEN_NAME'];
		}

		// GET THE DATA FROM DATABSE~~~~
			// START OUTBOUNDFORM1
				$sql_select = "SELECT * FROM personal_info_outbound WHERE STUDENT_ID = '$getses_StudentID'";
				$get_select = mysqli_query($conn, $sql_select);
				while($row = mysqli_fetch_array($get_select)){
					$setSel_NATIONALITY_OUT = $row['NATIONALITY_OUT'];
					$setSel_PASSPORT_NUM_OUT = $row['PASSPORT_NUM_OUT'];
					$setSel_VALIDITY_DATE_OUT = $row['VALIDITY_DATE_OUT'];
					$setSel_DATE_ISSUANCE_OUT = $row['DATE_ISSUANCE_OUT'];
					$setSel_MAILING_ADD_OUT = $row['MAILING_ADD_OUT'];
					$setSel_TELEPHONE_NUM_OUT = $row['TELEPHONE_NUM_OUT'];
					$setSel_MOBILE_NUM_OUT = $row['MOBILE_NUM_OUT'];
					$setSel_COLLEGE_INSTITUTE_FACULTY_OUT = $row['COLLEGE_INSTITUTE_FACULTY_OUT'];
					$setSel_DEGREE_PROG_OUT = $row['DEGREE_PROG_OUT'];
					$setSel_YEAR_LEVEL_OUT = $row['YEAR_LEVEL_OUT'];
				}
			// END OUTBOUNDFORM1

			// START OUTBOUNDFORM2
				$sql_select1 = "SELECT * FROM guardian_info_outbound WHERE STUDENT_ID = '$getses_StudentID' ";
				$get_select1 = mysqli_query($conn, $sql_select1);
				while($row1 = mysqli_fetch_array($get_select1)){
					$getSel_FATHER_NAME_OUT = $row1['FATHER_NAME_OUT'];
					$getSel_OCCUPATION_DADA_OUT = $row1['OCCUPATION_DADA_OUT'];
					$getSel_COMPANY_DADA_OUT = $row1['COMPANY_DADA_OUT'];
					$getSel_ADDRESS_DADA_OUT = $row1['ADDRESS_DADA_OUT'];				
					$getSel_EMAIL_ADD_DADA_OUT = $row1['EMAIL_ADD_DADA_OUT'];
					$getSel_CONTACT_NUM_DADA_OUT = $row1['CONTACT_NUM_DADA_OUT'];
					$getSel_ANNUAL_INCOME_DADA_OUT = $row1['ANNUAL_INCOME_DADA_OUT'];
					$getSel_MOTHER_NAME_OUT = $row1['MOTHER_NAME_OUT'];
					$getSel_OCCUPATION_MOM_OUT = $row1['OCCUPATION_MOM_OUT'];
					$getSel_COMPANY_MOM_OUT = $row1['COMPANY_MOM_OUT'];
					$getSel_ADDRESS_MOM_OUT = $row1['ADDRESS_MOM_OUT'];
					$getSel_EMAIL_ADD_MOM_OUT = $row1['EMAIL_ADD_MOM_OUT'];
					$getSel_CONTACT_NUM_MOM_OUT = $row1['CONTACT_NUM_MOM_OUT'];
					$getSel_ANNUAL_INCOME_MOM_OUT = $row1['ANNUAL_INCOME_MOM_OUT'];
				}
			// END OUTBOUNDFORM2

			// start outboundform3
				$sql_select2 = "SELECT * FROM proposed_field_study WHERE STUDENT_ID ='$getses_StudentID' ";
				$get_select2 = mysqli_query($conn, $sql_select2);
				while($row2 = mysqli_fetch_array($get_select2)){
					$getSel_PROPOSED_PROG = $row2['PROPOSED_PROG'];
					$getSel_COURSE_1 = $row2['COURSE_1'];
					$getSel_COURSE_2 = $row2['COURSE_2'];
					$getSel_COURSE_3 = $row2['COURSE_3'];
					$getSel_COURSE_4 = $row2['COURSE_4'];
					$getSel_COURSE_5 = $row2['COURSE_5'];
					$getSel_TYPE_OF_PROGRAM = $row2['TYPE_OF_PROGRAM'];
					$getSel_TYPE_OF_PROG_OTHER = $row2['TYPE_OF_PROG_OTHER'];
					$getSel_TYPE_OF_FORM = $row2['TYPE_OF_FORM'];
					$getSel_TYPE_OF_FORM_OTHER = $row2['TYPE_OF_FORM_OTHER'];
					$getSel_SCHOLARSHIP_LOAN = $row2['SCHOLARSHIP_LOAN'];
					$getSel_SCHOLARSHIP_LOAN_OTHER = $row2['SCHOLARSHIP_LOAN_OTHER'];
					// $getSel_SCHOLARSHIP_LOAN1 = $row2['SCHOLARSHIP_LOAN1'];
					// $getSel_SCHOLARSHIP_LOAN_OTHER1 = $row2['SCHOLARSHIP_LOAN_OTHER1'];
				}
				$sql_select3 = "SELECT * FROM country_univ_outbound WHERE STUDENT_ID ='$getses_StudentID' ";
				$get_select3 = mysqli_query($conn, $sql_select3);
				while($row3 = mysqli_fetch_array($get_select3)){
					$getSel_APPLICATION_PROG = $row3['APPLICATION_PROG'];
					$getSel_COUNTRY_OUT = $row3['COUNTRY_OUT'];
					$getSel_UNIVERSITY_OUT = $row3['UNIVERSITY_OUT'];
				}
			// end outboundform3
		// END GET THE DATA FROM DATABSE~~~~
		
		// UPDATE THE TABLE ONCE THEY SUBMIT OR NEXT IT
		
			//for outboundform1
			
				if(isset($_POST['btn_outform1'])){
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

					$sql_query = "UPDATE personal_info_outbound SET
					NATIONALITY_OUT = '$nationality_out',
					PASSPORT_NUM_OUT = '$passport_num_out',
					VALIDITY_DATE_OUT = '$validity_date_out',
					DATE_ISSUANCE_OUT = '$date_issuance_out',
					MAILING_ADD_OUT = '$mailing_add_out',
					TELEPHONE_NUM_OUT = '$telephone_num_out',
					MOBILE_NUM_OUT = '$mobile_num_out',
					COLLEGE_INSTITUTE_FACULTY_OUT = '$college_institute_faculty_out',
					DEGREE_PROG_OUT = '$program',
					YEAR_LEVEL_OUT = '$year_level_out' 
					WHERE STUDENT_ID = '$getses_StudentID'
					";

					// $sql_query = "INSERT INTO `personal_info_outbound` (`STUDENT_COUNT`, `STUDENT_ID`, 
					// `NATIONALITY_OUT`, `CITIZENSHIP_OUT`, `PASSPORT_NUM_OUT`, `VALIDITY_DATE_OUT`, `DATE_ISSUANCE_OUT`, 
					// `MAILING_ADD_OUT`, `TELEPHONE_NUM_OUT`, `MOBILE_NUM_OUT`, `COLLEGE_INSTITUTE_FACULTY_OUT`, `DEGREE_PROG_OUT`, `YEAR_LEVEL_OUT`
					// ) VALUES ('', '$getses_StudentID', '$nationality_out', '$citizenship_out', 
					// '$passport_num_out', '$validity_date_out', '$date_issuance_out', '$mailing_add_out', 
					// '$telephone_num_out', '$mobile_num_out', '$college_institute_faculty_out', '$program$program', '$year_level_out')";
					
					$query_db = mysqli_query($conn, $sql_query);

					if($query_db)
					{
						// echo 'success';
						header("Location: outboundform2.php");
					}else{
						// echo 'error';
						header("Location: error_page.php");
					}
				}
			// END for outboundform1
			
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
					$mIncome = $_POST['mIncome'];
					
					//QUERY
					
					$sql_query = "UPDATE guardian_info_outbound SET
						FATHER_NAME_OUT = '$father',
						OCCUPATION_DADA_OUT = '$fOccupation',
						COMPANY_DADA_OUT = '$fCompany',
						ADDRESS_DADA_OUT = '$fAddress',
						EMAIL_ADD_DADA_OUT = '$fEmail',
						CONTACT_NUM_DADA_OUT = '$fNumber',
						ANNUAL_INCOME_DADA_OUT = '$fIncome',
						MOTHER_NAME_OUT = '$mother',
						OCCUPATION_MOM_OUT = '$mOccupation',
						COMPANY_MOM_OUT = '$mCompany',
						ADDRESS_MOM_OUT = '$mAddress',
						EMAIL_ADD_MOM_OUT = '$mEmail',
						CONTACT_NUM_MOM_OUT = '$mNumber',
						ANNUAL_INCOME_MOM_OUT = '$mIncome'
						WHERE STUDENT_ID = '$getses_StudentID'
					";
					// $sql_query = "INSERT INTO guardian_info_outbound(
					// 	STUDENT_COUNT, 
					// 	STUDENT_ID,
					// 	FATHER_NAME_OUT,
					// 	OCCUPATION_DADA_OUT,
					// 	COMPANY_DADA_OUT,
					// 	ADDRESS_DADA_OUT,
					// 	EMAIL_ADD_DADA_OUT,
					// 	CONTACT_NUM_DADA_OUT,
					// 	ANNUAL_INCOME_DADA_OUT,
					// 	MOTHER_NAME_OUT,
					// 	OCCUPATION_MOM_OUT,
					// 	COMPANY_MOM_OUT,
					// 	ADDRESS_MOM_OUT,
					// 	EMAIL_ADD_MOM_OUT,
					// 	CONTACT_NUM_MOM_OUT,
					// 	ANNUAL_INCOME_MOM_OUT
					// 	) VALUES (
					// 	'',
					// 	'$getses_StudentID',
					// 	'$father',
					// 	'$fOccupation',
					// 	'$fCompany',
					// 	'$fAddress',
					// 	'$fEmail',
					// 	'$fNumber',
					// 	'$fIncome',
					// 	'$mother',
					// 	'$mOccupation',
					// 	'$mCompany',
					// 	'$mAddress',
					// 	'$mEmail',
					// 	'$mNumber',
					// 	'$mIncome')";

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
			//END FOR FORM 2
			
			// FORM 3
			
				if(isset($_POST['btn_form3']))
				{
					$country = $_POST['country'];
					$university = $_POST['university'];
					$shcountry = $_POST['shcountry'];
					$shuniversity = $_POST['shuniversity'];
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

					$sql_syn = "SELECT * FROM share_universities WHERE ID = '$shuniversity' AND COUNTRY = '$shcountry' ";
					$query1 = mysqli_query($conn, $sql_syn);
					while($rows1 = mysqli_fetch_array($query1)){
						$get_univSh = $rows1['UNIVERSITY'];	
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
						if($type_program == "Scholarship"){
							$scholarship = $_POST['scholarship'];
							if($scholarship == "OTHERS")
							{
								$scholarshipText = $_POST['scholarshipText'];

								$sql_query = "UPDATE proposed_field_study SET
									PROPOSED_PROG = '$proposedProg',
									COURSE_1 = '$course1', 
									COURSE_2 = '$course2', 
									COURSE_3 = '$course3', 
									COURSE_4 = '$course4', 
									COURSE_5 = '$course5',
									TYPE_OF_PROGRAM = '$type_program',
									TYPE_OF_PROG_OTHER = ' ',
									TYPE_OF_FORM = '$scholarship',
									TYPE_OF_FORM_OTHER = '$scholarshipText',
									SCHOLARSHIP_LOAN = ' ',
									SCHOLARSHIP_LOAN_OTHER = ' ',
									SCHOLARSHIP_LOAN1 = ' ',
									SCHOLARSHIP_LOAN_OTHER1 = ' '
									WHERE STUDENT_ID = '$getses_StudentID'
								";
								// $sql_query = "INSERT INTO proposed_field_study
								// (
								// 	STUDENT_COUNT,
								// 	STUDENT_ID,
								// 	PROPOSED_PROG,
								// 	COURSE_1, 
								// 	COURSE_2, 
								// 	COURSE_3, 
								// 	COURSE_4, 
								// 	COURSE_5,
								// 	SCHOLARSHIP_OUTBOUND,
								// 	SCHOLARSHIP_TEXT_OUTBOUND,
								// 	APPLICATION_FORM,
								// 	APPLICATION_TYPE_PROG
								// ) VALUES 
								// (
								// 	 '',
								// 	 '$getses_StudentID',
								// 	 '$proposedProg',
								// 	 '$course1',
								// 	 '$course2',
								// 	 '$course3',
								// 	 '$course4',
								// 	 '$course5',
								// 	 '',
								// 	 '',
								// 	 '$scholarshipText',
								// 	 '$type_program'
								// )";
							}else{
								$scholarshipText = '';

								$sql_query = "UPDATE proposed_field_study SET
									PROPOSED_PROG = '$proposedProg',
									COURSE_1 = '$course1', 
									COURSE_2 = '$course2', 
									COURSE_3 = '$course3', 
									COURSE_4 = '$course4', 
									COURSE_5 = '$course5',
									TYPE_OF_PROGRAM = '$type_program',
									TYPE_OF_PROG_OTHER = ' ',
									TYPE_OF_FORM = '$scholarship',
									TYPE_OF_FORM_OTHER = ' ',
									SCHOLARSHIP_LOAN = ' ',
									SCHOLARSHIP_LOAN_OTHER = ' ',
									SCHOLARSHIP_LOAN1 = ' ',
									SCHOLARSHIP_LOAN_OTHER1 = ' '
									WHERE STUDENT_ID = '$getses_StudentID'
								";
								// $sql_query = "INSERT INTO proposed_field_study
								// (
								// 	STUDENT_COUNT,
								// 	STUDENT_ID,
								// 	PROPOSED_PROG,
								// 	COURSE_1, 
								// 	COURSE_2, 
								// 	COURSE_3, 
								// 	COURSE_4, 
								// 	COURSE_5,
								// 	SCHOLARSHIP_OUTBOUND,
								// 	SCHOLARSHIP_TEXT_OUTBOUND,
								// 	APPLICATION_FORM,
								// 	APPLICATION_TYPE_PROG
								// ) VALUES 
								// (
								// 	'',
								// 	'$getses_StudentID',
								// 	'$proposedProg',
								// 	'$course1',
								// 	'$course2',
								// 	'$course3',
								// 	'$course4',
								// 	'$course5',
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
									$scholarloanText = ' ';
								}
							}

							if($bilateral == "Others"){
								$bilateralText = $_POST['bilateralText'];

								$sql_query = "UPDATE proposed_field_study SET
									PROPOSED_PROG = '$proposedProg',
									COURSE_1 = '$course1', 
									COURSE_2 = '$course2', 
									COURSE_3 = '$course3', 
									COURSE_4 = '$course4', 
									COURSE_5 = '$course5',
									TYPE_OF_PROGRAM = '$type_program',
									TYPE_OF_PROG_OTHER = ' ',
									TYPE_OF_FORM = '$bilateral',
									TYPE_OF_FORM_OTHER = '$bilateralText',
									SCHOLARSHIP_LOAN = '$scholarloan',
									SCHOLARSHIP_LOAN_OTHER = '$scholarloanText',
									SCHOLARSHIP_LOAN1 = ' ',
									SCHOLARSHIP_LOAN_OTHER1 = ' '
									WHERE STUDENT_ID = '$getses_StudentID'
								";
							}else{
								$sql_query = "UPDATE proposed_field_study SET
									PROPOSED_PROG = '$proposedProg',
									COURSE_1 = '$course1', 
									COURSE_2 = '$course2', 
									COURSE_3 = '$course3', 
									COURSE_4 = '$course4', 
									COURSE_5 = '$course5',
									TYPE_OF_PROGRAM = '$type_program',
									TYPE_OF_PROG_OTHER = ' ',
									TYPE_OF_FORM = '$bilateral',
									TYPE_OF_FORM_OTHER = ' ',
									SCHOLARSHIP_LOAN = '$scholarloan',
									SCHOLARSHIP_LOAN_OTHER = '$scholarloanText',
									SCHOLARSHIP_LOAN1 = ' ',
									SCHOLARSHIP_LOAN_OTHER1 = ' '
									WHERE STUDENT_ID = '$getses_StudentID'
								";
							}
						}
					}	
					$query_db = mysqli_query($conn, $sql_query);

					if($type_program == "Scholarship"){
						$scholarship = $_POST['scholarship'];
						if($scholarship == "AIMS"){
							$sql_query1 = "UPDATE country_univ_outbound SET
								APPLICATION_PROG = '$application_prog',
								COUNTRY_OUT = '$country',
								UNIVERSITY_OUT = '$get_univ'
								WHERE STUDENT_ID = '$getses_StudentID'
							";
						}else if($scholarship == "SHARE"){
							$sql_query1 = "UPDATE country_univ_outbound SET
								APPLICATION_PROG = '$application_prog',
								COUNTRY_OUT = '$shcountry',
								UNIVERSITY_OUT = '$get_univSh'
								WHERE STUDENT_ID = '$getses_StudentID'
							";
						}else{
							$sql_query1 = "UPDATE country_univ_outbound SET
								APPLICATION_PROG = '$application_prog',
								COUNTRY_OUT = '$country',
								UNIVERSITY_OUT = '$get_univ'
								WHERE STUDENT_ID = '$getses_StudentID'
							";
						}
						$query_db1 = mysqli_query($conn, $sql_query1);
					}


					$query_db3 = "UPDATE student SET
						PAGINATION = 'submitted summary' 
						WHERE STUDENT_ID ='$getses_StudentID'
					";
					$checkQuery3 = mysqli_query($conn, $query_db3);

					if($query_db && $checkQuery3)
					{
						if($_SESSION['outValidaition'] == 'outvalid'){
							$_SESSION['outValidaition'] == 'empty';
							$_SESSION['validSummarypdf_out'] = 'sumpdfvalid_out';
							header("Location: summary_pdf_out.php");
						}else if($_SESSION['inValidation'] == 'invalid'){
							header("Location: index.php");
						}
						// header("Location: student_home.php");
						// echo 'success';
					}else{
						// echo 'error';
						header("Location: error_page.php");
					}
					
				}
				
			// END FORM 3
		// end UPDATE THE TABLE ONCE THEY SUBMIT OR NEXT IT

		// FOR SAVE BUTTON!!!!!!!!!!!!!!!!!~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
			//for outboundform1
			
				if(isset($_POST['btnSaveoutform1'])){
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

					$sql_query = "UPDATE personal_info_outbound SET
					NATIONALITY_OUT = '$nationality_out',
					PASSPORT_NUM_OUT = '$passport_num_out',
					VALIDITY_DATE_OUT = '$validity_date_out',
					DATE_ISSUANCE_OUT = '$date_issuance_out',
					MAILING_ADD_OUT = '$mailing_add_out',
					TELEPHONE_NUM_OUT = '$telephone_num_out',
					MOBILE_NUM_OUT = '$mobile_num_out',
					COLLEGE_INSTITUTE_FACULTY_OUT = '$college_institute_faculty_out',
					DEGREE_PROG_OUT = '$program',
					YEAR_LEVEL_OUT = '$year_level_out' 
					WHERE STUDENT_ID = '$getses_StudentID'
					";

					// $sql_query = "INSERT INTO `personal_info_outbound` (`STUDENT_COUNT`, `STUDENT_ID`, 
					// `NATIONALITY_OUT`, `CITIZENSHIP_OUT`, `PASSPORT_NUM_OUT`, `VALIDITY_DATE_OUT`, `DATE_ISSUANCE_OUT`, 
					// `MAILING_ADD_OUT`, `TELEPHONE_NUM_OUT`, `MOBILE_NUM_OUT`, `COLLEGE_INSTITUTE_FACULTY_OUT`, `DEGREE_PROG_OUT`, `YEAR_LEVEL_OUT`
					// ) VALUES ('', '$getses_StudentID', '$nationality_out', '$citizenship_out', 
					// '$passport_num_out', '$validity_date_out', '$date_issuance_out', '$mailing_add_out', 
					// '$telephone_num_out', '$mobile_num_out', '$college_institute_faculty_out', '$program$program', '$year_level_out')";
					
					$query_db = mysqli_query($conn, $sql_query);

					$query_db3 = "UPDATE student SET
					PAGINATION = 'outbound page 1' 
					WHERE STUDENT_ID ='$getses_StudentID'
					";

					$checkQuery3 = mysqli_query($conn, $query_db3);

					if($query_db && $checkQuery3)
					{
						// echo 'success';
						header("Location: student_home.php");
					}else{
						// echo 'error';
						header("Location: error_page.php");
					}
				}
			// END for outboundform1
			
			//FOR FORM 2
			
				if(isset($_POST['btnSaveoutform2']))
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
					$mIncome = $_POST['mIncome'];
					
					//QUERY
					
					$sql_query = "UPDATE `guardian_info_outbound` SET
						`FATHER_NAME_OUT` = '$father',
						`OCCUPATION_DADA_OUT` = '$fOccupation',
						`COMPANY_DADA_OUT` = '$fCompany',
						`ADDRESS_DADA_OUT` = '$fAddress',
						`EMAIL_ADD_DADA_OUT` = '$fEmail',
						`CONTACT_NUM_DADA_OUT` = '$fNumber',
						`ANNUAL_INCOME_DADA_OUT` =' $fIncome',
						`MOTHER_NAME_OUT` = '$mother',
						`OCCUPATION_MOM_OUT` = '$mOccupation',
						`COMPANY_MOM_OUT` = '$mCompany',
						`ADDRESS_MOM_OUT` = '$mAddress',
						`EMAIL_ADD_MOM_OUT` = '$mEmail',
						`CONTACT_NUM_MOM_OUT` = '$mNumber',
						`ANNUAL_INCOME_MOM_OUT` = '$mIncome'
						WHERE `STUDENT_ID` = '$getses_StudentID'
					";

					$query_db = mysqli_query($conn, $sql_query);

					$query_db3 = "UPDATE student SET
					PAGINATION = 'outbound page 2' 
					WHERE STUDENT_ID = '$getses_StudentID'
					";

					$checkQuery3 = mysqli_query($conn, $query_db3);

					if($query_db && $checkQuery3)
					{
						// echo 'success';
						header("Location: student_home.php");
					}else{
						// echo 'error';
						header("Location: error_page.php");
					}

				}
			//END FOR FORM 2
			
			// FORM 3
			
				if(isset($_POST['btnSaveoutform3']))
				{
					$country = $_POST['country'];
					$university = $_POST['university'];
					$shcountry = $_POST['shcountry'];
					$shuniversity = $_POST['shuniversity'];
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
					$sql_syn = "SELECT * FROM share_universities WHERE ID = '$shuniversity' AND COUNTRY = '$shcountry' ";
					$query1 = mysqli_query($conn, $sql_syn);
					while($rows1 = mysqli_fetch_array($query1)){
						$get_univSh = $rows1['UNIVERSITY'];	
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
						if($type_program == "Scholarship"){
							$scholarship = $_POST['scholarship'];
							if($scholarship == "OTHERS")
							{
								$scholarshipText = $_POST['scholarshipText'];

								$sql_query = "UPDATE proposed_field_study SET
									PROPOSED_PROG = '$proposedProg',
									COURSE_1 = '$course1', 
									COURSE_2 = '$course2', 
									COURSE_3 = '$course3', 
									COURSE_4 = '$course4', 
									COURSE_5 = '$course5',
									TYPE_OF_PROGRAM = '$type_program',
									TYPE_OF_PROG_OTHER = ' ',
									TYPE_OF_FORM = '$scholarship',
									TYPE_OF_FORM_OTHER = '$scholarshipText',
									SCHOLARSHIP_LOAN = ' ',
									SCHOLARSHIP_LOAN_OTHER = ' ',
									SCHOLARSHIP_LOAN1 = ' ',
									SCHOLARSHIP_LOAN_OTHER1 = ' '
									WHERE STUDENT_ID = '$getses_StudentID'
								";
								// $sql_query = "INSERT INTO proposed_field_study
								// (
								// 	STUDENT_COUNT,
								// 	STUDENT_ID,
								// 	PROPOSED_PROG,
								// 	COURSE_1, 
								// 	COURSE_2, 
								// 	COURSE_3, 
								// 	COURSE_4, 
								// 	COURSE_5,
								// 	SCHOLARSHIP_OUTBOUND,
								// 	SCHOLARSHIP_TEXT_OUTBOUND,
								// 	APPLICATION_FORM,
								// 	APPLICATION_TYPE_PROG
								// ) VALUES 
								// (
								// 	 '',
								// 	 '$getses_StudentID',
								// 	 '$proposedProg',
								// 	 '$course1',
								// 	 '$course2',
								// 	 '$course3',
								// 	 '$course4',
								// 	 '$course5',
								// 	 '',
								// 	 '',
								// 	 '$scholarshipText',
								// 	 '$type_program'
								// )";
							}else{
								$scholarshipText = '';

								$sql_query = "UPDATE proposed_field_study SET
									PROPOSED_PROG = '$proposedProg',
									COURSE_1 = '$course1', 
									COURSE_2 = '$course2', 
									COURSE_3 = '$course3', 
									COURSE_4 = '$course4', 
									COURSE_5 = '$course5',
									TYPE_OF_PROGRAM = '$type_program',
									TYPE_OF_PROG_OTHER = ' ',
									TYPE_OF_FORM = '$scholarship',
									TYPE_OF_FORM_OTHER = ' ',
									SCHOLARSHIP_LOAN = ' ',
									SCHOLARSHIP_LOAN_OTHER = ' ',
									SCHOLARSHIP_LOAN1 = ' ',
									SCHOLARSHIP_LOAN_OTHER1 = ' '
									WHERE STUDENT_ID = '$getses_StudentID'
								";
								// $sql_query = "INSERT INTO proposed_field_study
								// (
								// 	STUDENT_COUNT,
								// 	STUDENT_ID,
								// 	PROPOSED_PROG,
								// 	COURSE_1, 
								// 	COURSE_2, 
								// 	COURSE_3, 
								// 	COURSE_4, 
								// 	COURSE_5,
								// 	SCHOLARSHIP_OUTBOUND,
								// 	SCHOLARSHIP_TEXT_OUTBOUND,
								// 	APPLICATION_FORM,
								// 	APPLICATION_TYPE_PROG
								// ) VALUES 
								// (
								// 	'',
								// 	'$getses_StudentID',
								// 	'$proposedProg',
								// 	'$course1',
								// 	'$course2',
								// 	'$course3',
								// 	'$course4',
								// 	'$course5',
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
									$scholarloanText = ' ';
								}
							}

							if($bilateral == "Others"){
								$bilateralText = $_POST['bilateralText'];

								$sql_query = "UPDATE proposed_field_study SET
									PROPOSED_PROG = '$proposedProg',
									COURSE_1 = '$course1', 
									COURSE_2 = '$course2', 
									COURSE_3 = '$course3', 
									COURSE_4 = '$course4', 
									COURSE_5 = '$course5',
									TYPE_OF_PROGRAM = '$type_program',
									TYPE_OF_PROG_OTHER = ' ',
									TYPE_OF_FORM = '$bilateral',
									TYPE_OF_FORM_OTHER = '$bilateralText',
									SCHOLARSHIP_LOAN = '$scholarloan',
									SCHOLARSHIP_LOAN_OTHER = '$scholarloanText',
									SCHOLARSHIP_LOAN1 = ' ',
									SCHOLARSHIP_LOAN_OTHER1 = ' '
									WHERE STUDENT_ID = '$getses_StudentID'
								";
							}else{
								$sql_query = "UPDATE proposed_field_study SET
									PROPOSED_PROG = '$proposedProg',
									COURSE_1 = '$course1', 
									COURSE_2 = '$course2', 
									COURSE_3 = '$course3', 
									COURSE_4 = '$course4', 
									COURSE_5 = '$course5',
									TYPE_OF_PROGRAM = '$type_program',
									TYPE_OF_PROG_OTHER = ' ',
									TYPE_OF_FORM = '$bilateral',
									TYPE_OF_FORM_OTHER = ' ',
									SCHOLARSHIP_LOAN = '$scholarloan',
									SCHOLARSHIP_LOAN_OTHER = '$scholarloanText',
									SCHOLARSHIP_LOAN1 = ' ',
									SCHOLARSHIP_LOAN_OTHER1 = ' '
									WHERE STUDENT_ID = '$getses_StudentID'
								";
							}
						}

					}
					$query_db = mysqli_query($conn, $sql_query);

					if($type_program == "Scholarship"){
						$scholarship = $_POST['scholarship'];
						if($scholarship == "AIMS"){
							$sql_query1 = "UPDATE country_univ_outbound SET
								APPLICATION_PROG = '$application_prog',
								COUNTRY_OUT = '$country',
								UNIVERSITY_OUT = '$get_univ'
								WHERE STUDENT_ID = '$getses_StudentID'
							";
						}else if($scholarship == "SHARE"){
							$sql_query1 = "UPDATE country_univ_outbound SET
								APPLICATION_PROG = '$application_prog',
								COUNTRY_OUT = '$shcountry',
								UNIVERSITY_OUT = '$get_univSh'
								WHERE STUDENT_ID = '$getses_StudentID'
							";
						}else{
							$sql_query1 = "UPDATE country_univ_outbound SET
								APPLICATION_PROG = '$application_prog',
								COUNTRY_OUT = '$country',
								UNIVERSITY_OUT = '$get_univ'
								WHERE STUDENT_ID = '$getses_StudentID'
							";
						}
						$query_db1 = mysqli_query($conn, $sql_query1);
					}

					$query_db3 = "UPDATE student SET
						PAGINATION = 'outbound page 3' 
						WHERE STUDENT_ID ='$getses_StudentID'
					";

					$checkQuery3 = mysqli_query($conn, $query_db3);

					if($query_db && $checkQuery3)
					{
						//echo 'success';
						header("Location: student_home.php");
					}else{
						//echo 'error';
						header("Location: error_page.php");
					}
				}
			// END FORM 3
		//  end FOR SAVE BUTTON!!!!!!!!!!!!!!!!!~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
	}
?>