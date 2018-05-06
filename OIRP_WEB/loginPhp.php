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
		
		//band-aid argument
		$test_query = $conn->prepare('SELECT * FROM colleges WHERE username = ?');
		$test_query->bind_param('s', $email);
		$test_query->execute();
		$college_rows = $test_query->get_result();
		$check_colleges = $college_rows->fetch_assoc();

		 if(DateTime::createFromFormat('d/m/Y', $date) !== FALSE) {
			// it's a date
			Datetime::createFromFormat('d/m/Y', $date)->format('d/m/Y');
			$pass_word_enc = base64_encode($date);
			// STUDENT
			//$query = mysqli_query($conn, "SELECT * FROM student WHERE EMAIL = '$email' AND PASSWORD = '$pass_word_enc' ");
			//$row = mysqli_num_rows($query);
			$stmt = $conn->prepare('SELECT * FROM student WHERE EMAIL = ? and PASSWORD = ?');
			$stmt->bind_param('ss', $email, $pass_word_enc); // 's' specifies the variable type => 'string'
			$stmt->execute();
			if($stmt->execute()){
				$result = $stmt->get_result();
				$num_rows = $result->num_rows;
				if($num_rows == 1){
					while ($row = $result->fetch_assoc()){
						$_SESSION['student_id_session'] = $row['STUDENT_ID'];
						$_SESSION['stuValid'] = 'yes';
						if($_SESSION['stuValid'] == 'yes'){
							header("Location: student_home.php");
						}
					}
				}else{
					$error_message = "<script language='javascript'>(function(){alert('Incorrect Email or Password or Both');})();</script>";
				}
			}else{
				$error_message = "<script language='javascript'>(function(){alert('Incorrect Email or Password or Both');})();</script>";
			}
		}else if ($check_colleges > 0){
			// ADMINISTRATOR
			//$admin_query = "SELECT * FROM colleges WHERE username = '$email' AND password = '$pass_word'";
			//$admin_db = mysqli_query($conn, $admin_query);
			//$admin_row = mysqli_num_rows($admin_db);
			$admin_query = $conn->prepare('SELECT * FROM colleges WHERE username = ? and password = ?');
			$admin_query->bind_param('ss', $email, $pass_word);
			$admin_query->execute();
			$admin_row = $admin_query->get_result();
			$num_of_rows = $admin_row->num_rows;
			

			if($num_of_rows > 0){
				while($rrow = $admin_row->fetch_assoc()){
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
								$_SESSION['collegeName'] = 'college';
								$_SESSION['collegeNames'] = $college;
								header("Location: administrator_college.php");
							}
						}
					}
				}
				
			}else{
				$error_message = "<script language='javascript'>(function(){alert('Invalid Username and Password');})();</script>";
			}
		} else {
			$error_message = "<script language='javascript'>(function(){alert('Invalid Username and Password');})();</script>";
		}
	}
?>

