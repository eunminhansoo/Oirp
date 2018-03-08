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
		$scholarloan = $_POST['scholarloan'];
		$bilateral = $_POST['bilateral'];
		$type_program = $_POST['type_program'];
		$programText = $_POST['programText'];
		$sql_syn = "SELECT * FROM partner_universities WHERE ID = '$homeUniversity' AND COUNTRY = '$country' ";
		$query1 = mysqli_query($conn, $sql_syn);
		while($rows1 = mysqli_fetch_array($query1)){
			$get_univ = $rows1['UNIVERSITY'];	
		}

		//condition
		if(type_program == "Others")
		{
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
		 		APPLICATION_FORM,
				APPLICATION_TYPE_PROG	
			) VALUES (
				'',
				'$getSes_studentID',
				'$country',
				'$get_univ',
				'$univAddress',
				'$officer',
				'$emailO'
			)";
		}
		// //radio buton for type of program
		// if (isset($_POST['type_program']))
		// {
		// 	$type_program = $_POST['type_program'];
		// } else 
		// {
		// 	$type_program = NULL;
		// }
		// if ($type_program != NULL)
		// {
		// 	if ($type_program == 'Bilateral')
		// 	{
		// 		mysqli_query($conn, "INSERT INTO educ_background_inbound(
		// 		STUDENT_COUNT,
		// 		STUDENT_ID,
		// 		COUNTRY_ORIGIN,
		// 		HOME_UNIV_IN_BILA,
		// 		UNIV_ADD_IN_BILA,
		// 		NAME_OFFICER_CONTACT_IN_BILA,
		// 		EMAIL_ADD_IN_BILA,
		// 		CURRENT_PROG_STUDY_IN_BILA,
		// 		DESIGNATION_IN_BILA,
		// 		TELEPHONE_NUM_BILA,
		// 		SPECIALIZATION_IN_BILA,
		// 		YEAR_STUDY,
		// 		YEAR_LEVEL,
		// 		SCHOLARSHIP_IN_BILA,
		// 		AGREEMENT_IN_BILA,
		// 		YEAR_SIGNED_IN_BILA,
		// 		YEAR_RENEWED,
		// 		APPLICATION_FORM,
		// 		APPLICATION_TYPE_PROG	
		// 		) VALUES (
		// 		'',
		// 		'$getSes_studentID',
		// 		'$country',
		// 		'$homeUniversity',
		// 		'$univAddress',
		// 		'$officer',
		// 		'$emailO',
		// 		'$program',
		// 		'$designationO',
		// 		'$numberO',
		// 		'$major',
		// 		'',
		// 		'$yearLevel',
		// 		'$scholarloan',
		// 		'',
		// 		'',
		// 		'',
		// 		'$bilateral',
		// 		'$type_program'
		// 		)");
		// 		echo $type_program;
		// 	} else if ($type_program == 'Scholarship')
		// 	{
		// 		echo $type_program;
		// 	} else if ($type_program == 'Others')
		// 	{
		// 		$programText = $_POST['programText'];
		// 		echo $programText;
		// 	}
		// 	else {
		// 		echo "You must select an answer";
		// 	}
		// }
		
		// //radion button for bilateral
		// if (isset($_POST['bilateral']))
		// {
		// 	$bilateral = $_POST['bilateral'];
		// } else 
		// {
		// 	$bilateral = NULL;
		// }
		// if ($bilateral != NULL)
		// {
		// 	if ($bilateral == '1 Year')
		// 	{
		// 		echo $bilateral;
		// 	} else if ($bilateral == '1 Sem')
		// 	{
		// 		echo $bilateral;
		// 	} else if ($bilateral == 'Short Study Abroad')
		// 	{
		// 		echo $bilateral;
		// 	}
		// 	else
		// 	{
		// 		echo "please select Bilateral option";
		// 	}
		// }
		
		// //radion button for scholarloan
		// if (isset($_POST['scholarloan']))
		// {
		// 	$scholarloan = $_POST['scholarloan'];
		// } else 
		// {
		// 	$scholarloan = NULL;
		// }
		// if ($scholarloan != NULL)
		// {
		// if ($scholarloan == 'Yes')
		// {
		// 	$scholarloanText = $_POST['$scholarloanText'];
		// 	echo $scholarloanText;
		// } else if ($scholarloan == 'No')
		// {
		// 	echo $scholarloan;
		// }
		// else
		// {
		// 	echo "Select an option";
		// }
		// }
		
		// //radio button for scholarship
		// if (isset($_POST['scholarship']))
		// {
		// 	$scholarship = $_POST['scholarship'];
		// } else 
		// {
		// 	$scholarship = NULL;
		// }
		// if ($scholarship != NULL)
		// {
		// if ($scholarship == 'AIMS')
		// {
		// 	echo $scholarship;
		// } else if ($scholarship == 'SHARE')
		// {
		// 	echo $scholarship;
		// } else if ($scholarship == 'OTHERS')
		// {
		// 	$scholarshipText = $_POST['scholarshipText'];
		// 	echo $scholarshipText;
		// } else 
		// {
		// 	"Please select an option";
		// }
		// }
		
		// //header("Location: inboundform3.php");
		
	}
	
?>
