<?php
	include 'database_connection.php';
    
	$message = ' ';
	
	if(isset($_POST['btn_register'])){
		function post_captcha($user_response) {
			$fields_string = '';
			$fields = array(
				'secret' => '6LeuFVcUAAAAAOQ8pti7ncWhQK285V6tmAzQ5THo',
				'response' => $user_response
			);
			foreach($fields as $key=>$value)
			$fields_string .= $key . '=' . $value . '&';
			$fields_string = rtrim($fields_string, '&');

			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
			curl_setopt($ch, CURLOPT_POST, count($fields));
			curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, True);

			$result = curl_exec($ch);
			curl_close($ch);

			return json_decode($result, true);
    	}

		// Call the function post_captcha
		$res = post_captcha($_POST['g-recaptcha-response']);
		echo $res;

		if (!$res['success']) {
			// What happens when the CAPTCHA wasn't checked
			// header("Location: register.php");
			$message = "<script language='javascript'>(function(){alert('Please click the security checkbox!');})();</script>";
		} else {
			$email = htmlspecialchars($_POST['email']);
			$familyName = htmlspecialchars( $_POST['family_name']);
			$givenName = htmlspecialchars($_POST['given_name']);
			$middleName = htmlspecialchars($_POST['middle_name']);
			$gender = htmlspecialchars($_POST['gender']);
			$birth = $_POST['birthday'];
			$date = new DateTime($birth);
			$result = $date->format('m/d/Y');
			$birth_enc = base64_encode($result);
			$appForm = htmlspecialchars($_POST['application_form']);
			$birthplace = htmlspecialchars($_POST['birthplace']);
			$date = date('Ymd');
			$timestamp = strtotime($birth);
			$birth_date = date('mdY', $timestamp);
			
			$age = date_diff(date_create($birth), date_create('now'))->y;
			

			if($appForm == 'yes')
			{
				$appForm = "outbound";

			}else{

				$appForm = "inbound";
				
			}
			
			$check_email = mysqli_query($conn, "SELECT * FROM student WHERE EMAIL = '$email' ");

			if(mysqli_num_rows($check_email) >= 1){
				$message = "<script language='javascript'>(function(){alert('Email already exists! Try again?');})();</script>";
			}else if($email == " " || $familyName == " " || $givenName == " " || $birthplace == " "){
				$message = "<script language='javascript'>(function(){alert('ERROR INPUT!!');})();</script>";
			}else{
				$insert_query = "INSERT INTO student(STUDENT_COUNT, DATE_ENROLL, APPLICATION_PROG, STUDENT_ID, EMAIL, PASSWORD, FAMILY_NAME,".
							" GIVEN_NAME, MIDDLE_NAME, GENDER, BIRTHDAY, AGE, BIRTHPLACE, STATUS, PAGINATION) VALUES ('', '$date', '$appForm', '', '$email', '$birth_enc', '$familyName', '$givenName', '$middleName', '$gender', '$birth_enc', '$age', '$birthplace', '', '')";
				$insert_db = mysqli_query($conn, $insert_query);
				if($insert_db){
					session_start();
					$_SESSION['$ses_email'] = $email;
					$_SESSION['stuValid'] = 'yes';
					header("Location: registerRedirect.php");
				}else{
					header("Location: register.php");
					$message = "<script language='javascript'>(function(){alert('Error 404');})();</script>";
				}
			}
		}
	}

?>
