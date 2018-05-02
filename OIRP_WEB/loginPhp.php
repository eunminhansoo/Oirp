<?php
	include 'database_connection.php';
	$error_message = '';
	session_start();
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
					$_SESSION['student_id_session'] = $row1['STUDENT_ID'];
					$_SESSION['stuValid'] = 'yes';
					if($_SESSION['stuValid'] == 'yes'){
						header("Location: student_home.php");
					}
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
					$_SESSION['superadmin'] =  $rrow['username'];
					$_SESSION['admin'] = 'login';
					$_SESSION['valid'] = 'valid';
					
					if($_SESSION['valid'] == 'valid'){
						if($_SESSION['admin'] == 'login'){
							if($_SESSION['superadmin'] == 'oirp'){
								header("Location: administrator.php");
							}else{
								$_SESSION['collegeName'] = $rrow['college'];
								header("Location: administrator_college.php");
							}
						}
					}
				}
				
			}else{
				$error_message = "<script language='javascript'>(function(){alert('Invalid Username and Password');})();</script>";
			}
		}
	}
?>

