<?php
include 'database_connection.php';

	session_start();
	$get_studentID = $_SESSION['student_id_session'];
	
	$sql_query = "SELECT * FROM student WHERE STUDENT_ID = '$get_studentID' ";
	$db_query = mysqli_query($conn, $sql_query);
	while($row = mysqli_fetch_array($db_query)){
		$familyName = $row['FAMILY_NAME'];
		$givenName = $row['GIVEN_NAME'];
		//$status = $row['STATUS'];
		$application_prog = $row['APPLICATION_PROG'];
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
	
	
	if(isset($_POST['btn_submit']))
    {
    	
    	$target = "images/".basename($_FILES['pdfScan']['name']);
    	$pdfScan = $_FILES['pdfScan']['name'];
    	
    	
    	echo $pdfScan;
    	echo $application_prog;
    	echo $familyName;
    	echo $get_studentID;
		
		$query_db = "INSERT INTO upload_pdf(STUDENT_COUNT,
		 	STUDENT_ID,
		  	APPLICATION_PROG,
		   	PDF_NAME,
		    PDF_IMG
			) VALUES (
				'', 
			 	'$get_studentID',
			 	'$application_prog',
			 	'$familyName',
				'$pdfScan'
			)";
    	// $query_db = "INSERT INTO upload_pdf(
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
    	
    	$query = mysqli_query($conn, $query_db);
    
    	
    	if($query)
			{
				echo 'success';
				//header("Location: student_home.php");
			}else{
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
			
    	}
    	
   
?>