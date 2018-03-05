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
		$officer = $_POST['officer'];
		$designationO = $_POST['designationO'];
		$emailO = $_POST['emailO'];
		$numberO = $_POST['numberO'];
		
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
			if ($type_program == 'Bilateral')
			{
				echo $type_program;
			} else if ($type_program == 'Scholarship')
			{
				echo $type_program;
			} else if ($type_program == 'Others')
			{
				$programText = $_POST['programText'];
				echo $programText;
			}
			else {
				echo "You must select an answer";
			}
		}
		
		//radion button for bilateral
		if (isset($_POST['bilateral']))
		{
			$bilateral = $_POST['bilateral'];
		} else 
		{
			$bilateral = NULL;
		}
		if ($bilateral != NULL)
		{
			if ($bilateral == '1 Year')
			{
				echo $bilateral;
			} else if ($bilateral == '1 Sem')
			{
				echo $bilateral;
			} else if ($bilateral == 'Short Study Abroad')
			{
				echo $bilateral;
			}
			else
			{
				echo "please select Bilateral option";
			}
		}
		
		//radion button for scholarloan
		if (isset($_POST['scholarloan']))
		{
			$scholarloan = $_POST['scholarloan'];
		} else 
		{
			$scholarloan = NULL;
		}
		if ($scholarloan != NULL)
		{
		if ($scholarloan == 'Yes')
		{
			$scholarloanText = $_POST['$scholarloanText'];
			echo $scholarloanText;
		} else if ($scholarloan == 'No')
		{
			echo $scholarloan;
		}
		else
		{
			echo "Select an option";
		}
		}
		
		//radio button for scholarship
		if (isset($_POST['scholarship']))
		{
			$scholarship = $_POST['scholarship'];
		} else 
		{
			$scholarship = NULL;
		}
		if ($scholarship != NULL)
		{
		if ($scholarship == 'AIMS')
		{
			echo $scholarship;
		} else if ($scholarship == 'SHARE')
		{
			echo $scholarship;
		} else if ($scholarship == 'OTHERS')
		{
			$scholarshipText = $_POST['scholarshipText'];
			echo $scholarshipText;
		} else 
		{
			"Please select an option";
		}
		}
		
		//header("Location: inboundform3.php");
		
	}
	
?>
