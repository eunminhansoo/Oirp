<?php
include 'database_connection.php';

	session_start();
	$errorTORmsg = " ";
	if($_SESSION['stuValid'] != 'yes'){
		header("Location: index.php");
	}else{

		$get_studentID = $_SESSION['student_id_session'];
		
		$sql_query = "SELECT * FROM student WHERE STUDENT_ID = '$get_studentID' ";
		$db_query = mysqli_query($conn, $sql_query);
		while($row = mysqli_fetch_array($db_query)){
			$familyName = $row['FAMILY_NAME'];
			$givenName = $row['GIVEN_NAME'];
			$status = $row['STATUS'];
			$application_prog = $row['APPLICATION_PROG'];
			$pagination = $row['PAGINATION'];
			$gender = $row['GENDER'];

			if($gender == "Female")
			{
				$gen = "Ms";
			}else{
				if($gender == "Male")
				{
					$gen = "Mr";
				}
			}
		}
		// // oppen the session
		// if($pagination != 'submitted' || $pagination != 'Submitted PDF'){
		// 	$_SESSION['inValidation'] = 'invalid';
		// }

		$type_of_program = "";
		if ($application_prog == 'outbound'){
			$sql_query = "select type_of_program from proposed_field_study where student_id = '$get_studentID'";
			$db_query = mysqli_query($conn, $sql_query);
			while($row = mysqli_fetch_array($db_query)){
				$type_of_program = $row['type_of_program'];
			}
		} elseif ($application_prog == 'inbound'){
			$sql_query = "select type_of_program from educ_background_inbound where student_id = '$get_studentID'";
			$db_query = mysqli_query($conn, $sql_query);
			while($row = mysqli_fetch_array($db_query)){
				$type_of_program = $row['type_of_program'];
			}
		} 
		
		
		if(isset($_POST['btn_submit']))
		{
			
			$target = "images/".basename($_FILES['pdfScan']['name']);
			$target1 = "images/".basename($_FILES['TAscan']['name']);

			$pdfScan = $_FILES['pdfScan']['name'];
			$torscan = $_FILES['TAscan']['name'];

			$ext = pathinfo($torscan, PATHINFO_EXTENSION);
			if($ext == 'gif' || $ext == 'png' || $ext == 'jpg' || $_FILES["TAscan"]["type"] == "application/pdf"){
				$date = date('Ymd');
				//insert to table upload_pdf
				$query_db = "INSERT INTO upload_pdf(STUDENT_COUNT,
					STUDENT_ID,
					APPLICATION_PROG,
					PDF_NAME,
					PDF_IMG,
					TOR_SCAN,
					DATE_SUBMITTED
					) VALUES (
						'', 
						'$get_studentID',
						'$application_prog',
						'$familyName',
						'$pdfScan',
						'$torscan',
						'$date'
					)";
				//insert to table admin_student_data
				$query_db1 = "INSERT INTO admin_student_data(STUDENT_COUNT,
					STUDENT_ID) VALUES (
						'',
						'$get_studentID'
						)";
				
				
				
				// STUDENT_COUNT,
				// STUDENT_ID,
				// APPLICATION_PROG,
				// PDF_NAME,
				// PDF_IMG,
				// )VALUES(
				// '', 
				// '$get_studentID',
				// '$application_prog',
				// '$familyName',
				// '$pdfScan'
				// )";
				
				//insert to comment
				$query_notification = "INSERT INTO notification(STUDENT_COUNT,
				STUDENT_ID,
				LASTNAME,
				FIRSTNAME,
				COMMENT_STATUS,
				APPLICATION_FORM,
				COLLEGE,
				COURSE,
				STATUS
				) VALUES (
					'',
					'$get_studentID',
					'$familyName',
					'$givenName',
					'',
					'$application_prog',
					'',
					'',
					''
				)";
				
				$comment = mysqli_query($conn, $query_notification);
				//end of insert comment 
				
				//insert to audit_logs
				date_default_timezone_set('Asia/Manila');
				$date1 = date('Y-m-d/H:i:s');
				$query_log = "INSERT INTO audit_logs(STUDENT_COUNT,
				STUDENT_ID,
				LASTNAME,
				FIRSTNAME,
				APPLICATION_FORM,
				COLLEGE,
				COURSE,
				STATUS,
				DATE
				) VALUES (
					'',
					'$get_studentID',
					'$familyName',
					'$givenName',
					'$application_prog',
					'',
					'',
					'',
					'$date1'
					)";
				$query_audit = mysqli_query($conn, $query_log);
				
				$query = mysqli_query($conn, $query_db);
				$query1 = mysqli_query($conn, $query_db1);
			
				
				if($query && $query1)
				{
					$sql_query1 = "UPDATE student SET
						PAGINATION = 'Submitted PDF'
						WHERE STUDENT_ID = '$get_studentID'
					";
					mysqli_query($conn, $sql_query1);
					echo "<meta http-equiv='refresh' content='0'>";
							

					$sql_query2 = "UPDATE student set STATUS = 'Pending' where STUDENT_ID = '$get_studentID'";
					mysqli_query($conn, $sql_query2);
						
					//header("Location: student_home.php");
				} else{
					header("Location: error_page.php");
				}
				
				
				if (move_uploaded_file($_FILES['pdfScan']['tmp_name'], $target)) 
				{
					$msg = "Upload Successful";
				}
				else 
				{
					$msg = "Upload Failed";
				}
				if(move_uploaded_file($_FILES['TAscan']['tmp_name'], $target1)) 
				{
					$msg = "Upload Successful";
				}
				else 
				{
					$msg = "Upload Failed";
				}
			}else{
				$errorTORmsg = "
					<div class='container-fluid alert'>
						<span class='closebtn ' onclick=\"this.parentElement.style.display='none';\">&times;</span> 
						<p>The File must be .jpg, .png, or pdf format</p>
					</div>
				";
			}
		}
		
	}
    	
   
?>