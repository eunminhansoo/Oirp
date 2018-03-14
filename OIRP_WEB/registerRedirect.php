<?php
	include 'database_connection.php';
	
	/* FOR STUDENT NUMBER*/
	echo 'puta pumupunta ka ba dito???!';
	session_start();
	$show_email = $_SESSION['$ses_email'];
	$getData = mysqli_query($conn, "SELECT * FROM student WHERE EMAIL = '$show_email' ");
	
	while ($getRows = mysqli_fetch_array($getData)){
		$studentCOUNT = $getRows['STUDENT_COUNT'];
		$dateSignIn = $getRows['DATE_ENROLL'];
		$appPROG = $getRows['APPLICATION_PROG'];
		
	}
	/* date format*/
	$timestamp = strtotime($dateSignIn);
	$dateuSignIn = date('Ymd', $timestamp);
		
	if(strlen($studentCOUNT) == 2){
		$dateuSignIn1 = $dateuSignIn * 1000;
	}elseif (strlen($studentCOUNT) == 1){
		$dateuSignIn1 = $dateuSignIn * 1000;
	}else {
		if (strlen($studentCOUNT) == 3){
			$dateuSignIn1 = $dateuSignIn * 1000;
				
		}
	}
	/* convert a inbound and outbaound into in and out*/
	if ($appPROG == 'outbound'){
		$appPROG = 'out';
	}else {
		if ($appPROG == 'inbound'){
			$appPROG = 'in';
		}
	}
			
	$dateuSignIn2 = $dateuSignIn1 + $studentCOUNT;
	
	$studentID = $dateuSignIn2."-".$appPROG;

	mysqli_query($conn, "UPDATE student SET STUDENT_ID = '$studentID' WHERE EMAIL = '$show_email'");
	
	$_SESSION['student_id_session'] = $studentID;
	//header("Location: inbound_application.php");
	
	if($appPROG == "out")
	{
		header("Location: outboundform1.php");
	}else{
		if($appPROG == "in"){
			header("Location: inboundform1.php");
		}
	}
	
?>