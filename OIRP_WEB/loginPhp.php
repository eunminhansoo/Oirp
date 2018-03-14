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
					session_start();
					$_SESSION['student_id_session'] = $row1['STUDENT_ID'];
					header("Location: student_home.php");
				}
			}else{
				$error_message = "<script language='javascript'>(function(){alert('Incorrect Email or Password or Both');})();</script>";
			}
		}else{
			$error_message = "<script language='javascript'>(function(){alert('Incorrect Email or Password or Both');})();</script>";
		}
	}
?>

