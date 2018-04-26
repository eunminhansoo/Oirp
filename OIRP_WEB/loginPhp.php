<?php
	include 'database_connection.php';
	$error_message = '';
	
	if (isset($_POST['btn_login'])){
		$email = htmlspecialchars($_POST['email']);
		$pass_word = htmlspecialchars($_POST['password']);
		str_replace("<", "&lt;", $pass_word);
		str_replace(">", "&gt;", $pass_word);
		$date = $pass_word;

		 if(DateTime::createFromFormat('d/m/Y', $date) !== FALSE) {
			// it's a date
			Datetime::createFromFormat('d/m/Y', $date)->format('d/m/Y');
			$pass_word_enc = base64_encode($date);

			

			// STUDENT
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
			// ADMINISTRATOR
			$admin_query = "SELECT * FROM colleges WHERE username = '$email' AND password = '$pass_word'";
			$admin_db = mysqli_query($conn, $admin_query);
			$admin_row = mysqli_num_rows($admin_db);

			if($admin_row == 1){
				while($rrow = mysqli_fetch_array($admin_db)){
					$id = $rrow['id'];
					$college = $rrow['college'];
				}
				if($id == 1){
					header("Location: administrator.php");
				}else{
					header("Location: administrator_college.php");
					session_start();
					$_SESSION['coll_sess'] = $college;
				}
			}else{
				$error_message = "<script language='javascript'>(function(){alert('Invalid Username and Password');})();</script>";
			}
		}

	}
?>

