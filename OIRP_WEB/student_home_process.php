<?php
include 'database_connection.php';
	//include 'inbound_application_php.php';

	session_start();
	$getSes_studentID = $_SESSION['student_id_session'];
	

	//submitting image
	if(isset($_POST['btn_submit']))
	{
		$target = "images/".basename($_FILES['image']['name']);
		$image = $_FILES['image']['name'];
	}
	?>