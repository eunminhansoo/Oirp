<?php
	include 'database_connection.php';
	
	if (isset($_POST['btn_login'])){
		$email = $_POST['email'];
		$pass_word = $_POST['password'];
		
		$query = mysqli_query($conn, "SELECT * FROM student WHERE EMAIL = '$email' AND PASSWORD = '$pass_word' ");
		$row = mysqli_num_rows($query);
		
		if($row == 1){
			while ($row1 = mysqli_fetch_array($query)){
				$_SESSION['givenname_session'] = $row1['GIVEN_NAME'];
				$_SESSION['lastname_session'] = $row1['LAST_NAME'];
				header("Location: home_page.php");
			}
		}
	}
?>

