<?php
include 'database_connection.php';

	session_start();
	$getSes_studentID = $_SESSION['student_id_session'];
	
	$get_studentID = $_SESSION['student_id_session'];
	$sql_query = "SELECT * FROM student WHERE STUDENT_ID = '$get_studentID' ";
	$db_query = mysqli_query($conn, $sql_query);
	while($row = mysqli_fetch_array($db_query)){
		$familyName = $row['FAMILY_NAME'];
		$givenName = $row['GIVEN_NAME'];
		//$status = $row['STATUS'];
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
	
	
	if (isset($_POST['btn_submit']))
    {
    	while($row = mysqli_fetch_array($db_query)){
    	$application_prog = $row['APPLICATION_PROG'];
    	$target = "images/".basename($_FILES['pdfScan']['name']);
    	$pdf_name = $_POST['pdf_name'];
    	$pdfScan = $_FILES['pdfScan']['name'];
    	
    	$query_db = "INSERT INTO upload_pdf(
    	STUDENT_COUNT,
    	STUDENT_ID,
    	APPLICATION_PROG,
    	PDF_NAME,
    	PDF_IMG,
    	) VALUES(
    	'', 
    	'$getSes_studentID',
    	'$application_prog',
    	'$pdf_name',
    	'$pdfScan')";
    	
    	$query_db1 = mysqli_query($conn, $query_db);
    	
    	if($query_db1)
			{
				// echo 'success';
				header("Location: student_home.php");
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
    	
    }

?>