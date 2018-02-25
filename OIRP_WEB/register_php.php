<?php
	include 'database_connection.php';
    
	$message = '';
	
	if(isset($_POST['btn_register'])){
		$email = ($_POST['email']);
		$familyName = ($_POST['family_name']);
		$givenName = ($_POST['given_name']);
		$middleName = ($_POST['middle_name']);
		$gender = ($_POST['gender']);
		$birth = ($_POST['birthday']);
		$birthplace = ($_POST['birthplace']);
		$appForm = ($_POST['application_form']);
		$date = date('Ymd');
		
		$timestamp = strtotime($birth);
		$birth_date = date('mdY', $timestamp);
		
		if($appForm == 'yes')
		{
			$appForm = "outbound";
		}else
		{
			if($appForm == 'no')
			{
				$appForm = "inbound";
			}
		}
		
		$check_email = mysqli_query($conn, "SELECT * FROM student WHERE EMAIL = '$email' ");
		
		if(mysqli_num_rows($check_email) >= 1){
			$message = "<script language='javascript'>(function(){alert('Email already exists! Try again?');})();</script>";
		}else{
			mysqli_query($conn, "INSERT INTO student(STUDENT_COUNT, DATE_ENROLL, APPLICATION_PROG, STUDENT_ID, EMAIL, PASSWORD, FAMILY_NAME,".
						" GIVEN_NAME, MIDDLE_NAME, GENDER, BIRTHDAY, BIRTHPLACE) VALUES ('', '$date', '$appForm', '', '$email', '$birth_date', '$familyName', '$givenName', '$middleName', '$gender', '$birth', '$birthplace')");
			session_start();
			$_SESSION['$ses_email'] = $email;
			header("Location: registerRedirect.php");
		}
	}

?>
