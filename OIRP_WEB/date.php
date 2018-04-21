<?php
	include 'database_connection.php';

	// $today = date("m/d/Y");
	// $new = "08/01/".date('Y');;
	// $prevyears = date('Y');
	// $nextyears = date('Y', strtotime('+1 year'));
	// $cret_year = $prevyears."-".$nextyears;
	// $sel_query = "SELECT * FROM yearly";
	// $sel_db = mysqli_query($conn, $sel_query);
	// while($selRow = mysqli_fetch_array($sel_db)){
	// 	$yyear = $selRow['YEARLY'];
	// }
	// if($cret_year != $yyear){
	// 	if($today == $new){	
	// 		// echo "success";
	// 		$sql = "INSERT INTO yearly(COUNT, YEARLY) VALUES (' ', '$cret_year')";
	// 		$query = mysqli_query($conn, $sql);
	// 		if($query){
	// 			echo "success";
	// 		}
	// 	} 	                   
	// }
	
				$yearlySel_query = "SELECT * FROM yearly";
				$yearlySel_db = mysqli_query($conn, $yearlySel_query);
				while($yearSel_row = mysqli_fetch_array($yearlySel_db)){
					$yearr = $yearSel_row['YEARLY'];
				}
				$sel_query = "SELECT * FROM outstatistics WHERE COUNTRY = 'South Korea' AND YEAR = '$yearr'";
				$sel_db = mysqli_query($conn, $sel_query);
				$countNum = mysqli_num_rows($sel_db);
				echo $countNum;
				if($countNum == 1){
					while($seRow = mysqli_fetch_array($sel_db)){
						$num_student = $seRow['NUMBER_STUDENT'];
					}
					$num_student += 1;
					$statUp = "UPDATE outstatistics SET NUMBER_STUDENT = '$num_student' WHERE COUNTRY = 'South Korea' AND YEAR = '$yearr'";
					mysqli_query($conn, $statUp);
				}
				if($countNum == 0){
					$numStu = 1;
					$appform = "outbound";
					$statInt = "INSERT INTO outstatistics(STUDENT_COUNT, NUMBER_STUDENT, YEAR, COUNTRY, APPLICATION_FORM) VALUES (
						'',
						'$numStu',
						'$yearr',
						'South Korea',
						'$appform'
					)";
					mysqli_query($conn, $statInt);
				}
?>