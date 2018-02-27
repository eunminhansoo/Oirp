<?php
	include 'database_connection.php';
    
	$message = '';
	
	if(isset($_POST['btn_outform1'])){
	$citizenship_out = $_POST['citizenship_out'];
	$nationality_out = $_POST['nationality_out'];
	$passport_num_out = $_POST['passport_num_out'];
	$date_issuance_out = $_POST['date_issuance_out'];
	$validity_date_out = $_POST['validity_date_out'];
	$mailing_add_out = $_POST['mailing_add_out'];
	$telephone_num_out = $_POST['telephone_num_out'];
	$mobile_num_out = $_POST['mobile_num_out'];	
	
	}

?>