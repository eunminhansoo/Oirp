<?php
	include 'database_connection.php';
	$error_message = '';
	
	if (isset($_POST['btn_login'])){
		$email = $_POST['email'];
		$pass_word = $_POST['password'];
		$date = $pass_word;
		if (DateTime::createFromFormat('d/m/Y', $date) !== FALSE) {
		// it's a date
			Datetime::createFromFormat('d/m/Y', $date)->format('d/m/Y');
			$pass_word_enc = base64_encode($date);

			$query = mysqli_query($conn, "SELECT * FROM student WHERE EMAIL = '$email' AND PASSWORD = '$pass_word_enc' ");
			$row = mysqli_num_rows($query);
			
			if($row == 1){
				while ($row1 = mysqli_fetch_array($query)){
					$_SESSION['givenname_session'] = $row1['GIVEN_NAME'];
					$_SESSION['lastname_session'] = $row1['FAMILY_NAME'];
					header("Location: home_page.php");
				}
			}else{
				$error_message = "<script language='javascript'>(function(){alert('Incorrect Email or Password or Both');})();</script>";
			}
		}else{
			$error_message = "<script language='javascript'>(function(){alert('Incorrect Email or Password or Both');})();</script>";
		}
	}
?>

