<?php
    include 'database_connection.php';
	session_start();
	if($_SESSION['superadmin'] != 'oirp'){
		header("Location: index.php");
	}
	$errorCoCmsg = "";
    $sql = "SELECT * FROM upload_pdf WHERE STUDENT_ID = '$getStudentID'";
    $mssg = ' ';
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_array($result)){
        $file = $row['PDF_IMG'];
		$torScan = $row['TOR_SCAN'];
    }
    $query = "SELECT * FROM student WHERE STUDENT_ID= '$getStudentID'";
    $queryBD = mysqli_query($conn, $query);
	// while($queryDBrow = mysqli_fetch_array($queryDB)){
	// 	$studentAppPrgo = $queryDBrow['APPLICATION_PROG'];
	// }
    $query1 = "SELECT * FROM educ_background_inbound WHERE STUDENT_ID= '$getStudentID'";
    $queryCU = mysqli_query($conn, $query1);   
	// $query2 = "SELECT * FROM proposed_field_study_in_bila WHERE STUDENT_ID = '$getStudentID'";
    // $queryPF = mysqli_query($conn, $query2);
	$selCollege = "SELECT * FROM proposed_field_study_in_bila WHERE STUDENT_ID = '$getStudentID'";
	$setCollege = mysqli_query($conn, $selCollege);
	while($colRow = mysqli_fetch_array($setCollege)){
		$set_COURSE_1_INBOUND = $colRow['COURSE_1_INBOUND'];
		$set_COURSE_2_INBOUND = $colRow['COURSE_2_INBOUND'];
		$set_COURSE_3_INBOUND = $colRow['COURSE_3_INBOUND'];
		$set_COURSE_4_INBOUND = $colRow['COURSE_4_INBOUND'];
		$set_COURSE_5_INBOUND = $colRow['COURSE_5_INBOUND'];
	}
	while($row1 = mysqli_fetch_array($queryCU)){
		$application_prog = $row1['TYPE_OF_PROGRAM'];
		$application_prog_other = $row1['TYPE_OF_PROG_OTHER'];
		$application_form = $row1['TYPE_OF_FORM'];
		$application_form_other = $row1['TYPE_OF_FORM_OTHER'];
		$country = $row1['COUNTRY_ORIGIN'];
		$university = $row1['HOME_UNIV_IN_BILA'];
	}

	// IF STATUS DENIED, ONGOING, 
	// if(isset($_POST['update_status'])){
	// 	$status = $_POST['status']; 

	// 	$query2 = "UPDATE student SET STATUS = '$status' WHERE STUDENT_ID = '$getStudentID'";
		
	// 	$query_db = mysqli_query($conn, $query2);

	// 	if($query_db){
	// 		header("Location:admin_student_application_in.php?studentName=$getStudentID");
	// 		$sel_query = "SELECT * FROM student WHERE STUDENT_ID = '$getStudentID'";
	// 		$queryy_db = mysqli_query($conn, $sel_query);
	// 		while($rrow = mysqli_fetch_array($queryy_db)){
	// 			$sel_query = $rrow['STATUS'];
	// 		}
	// 		if($sel_query == 'Approved'){

				
	// 			$sel_check_query = "SELECT * FROM admin_college WHERE STUDENT_ID = '$getStudentID'";
	// 			$sel_check_db = mysqli_query($conn, $sel_check_query);
	// 			if(mysqli_num_rows($sel_check_db) <= 0){
	// 				$ins_query = "INSERT INTO admin_college ('STUDENT_COUNT', 'STUDENT_ID, 'PROPOSED_PROGRAM', 'COURSE_1', 'COURSE_2', 'COURSE_3', 'COURSE_4', 'COURSE_5') VALUES ('', '$getStudentID', '', '', '', '', '', '')";
	// 				//add in audit
	// 				//insert to audit log
	// 				$approved = 'Approved';
	// 				date_default_timezone_set('Asia/Manila');
	// 				$date_approved = date('Y-m-d/H:i:s');
	// 				$query_approved = "INSERT INTO audit_logs(STUDENT_COUNT,
	// 				STUDENT_ID,
	// 				LASTNAME,
	// 				FIRSTNAME,
	// 				APPLICATION_FORM,
	// 				COLLEGE,
	// 				COURSE,
	// 				STATUS,
	// 				DATE
	// 				) VALUES (
	// 					'',
	// 					'$getStudentID',
	// 					'',
	// 					'',
	// 					'',
	// 					'',
	// 					'',
	// 					'$approved',
	// 					'$date_approved'
	// 				)";
	// 				mysqli_query($conn, $query_approved);
	// 				mysqli_query($conn, $ins_query);
	// 			}
	// 		}else{
	// 			$del_query = "DELETE FROM admin_college WHERE STUDENT_ID = '$getStudentID'";
	// 			//add in audit
	// 			//insert to audit log
	// 			date_default_timezone_set('Asia/Manila');
	// 			$date_rejected = date('Y-m-d/H:i:s');
	// 			$rejected = 'Rejected';
	// 			$query_rejected = "INSERT INTO audit_logs(STUDENT_COUNT,
	// 			STUDENT_ID,
	// 			LASTNAME,
	// 			FIRSTNAME,
	// 			APPLICATION_FORM,
	// 			COLLEGE,
	// 			COURSE,
	// 			STATUS,
	// 			DATE
	// 			) VALUES (
	// 				'',
	// 				'$getStudentID',
	// 				'',
	// 				'',
	// 				'',
	// 				'',
	// 				'',
	// 				'$rejected',
	// 				'$date_rejected'
	// 			)";
    // 	        mysqli_query($conn, $query_rejected);
	// 			mysqli_query($conn, $del_query);
	// 		}   
	// 	}
	// }
	// while($pf_row = mysqli_fetch_array($queryPF)){
	// 	$pf_COURSE_1_INBOUND = $pf_row['COURSE_1_INBOUN'];
	// 	$pf_COURSE_2_INBOUND = $pf_row['COURSE_2_INBOUND'];
	// 	$pf_COURSE_3_INBOUND = $pf_row['COURSE_3_INBOUND'];
	// 	$pf_COURSE_4_INBOUND = $pf_row['COURSE_4_INBOUND'];
	// 	$pf_COURSE_5_INBOUND = $pf_row['COURSE_5_INBOUND'];
	// }
	$sql = "select college from colleges where id > 1 order by college asc";
	$result = mysqli_query($conn, $sql);
	
	$col='';
	while($row = mysqli_fetch_array($result)) {
		$col .=  "<option value='".$row['college']."'>".$row['college']."</option>";
	}
	// if THE STATUS DENIED, PENDING
	if(isset($_POST['update_status'])){
		$status = $_POST['status'];

		// UPDATE THE STATUS
		$query2 = "UPDATE student SET STATUS = '$status' WHERE STUDENT_ID = '$getStudentID'";
		$query_db = mysqli_query($conn, $query2);
		//insert to audit log
		$approved = 'Approved';
		date_default_timezone_set('Asia/Manila');
		$date_approved = date('Y-m-d/H:i:s');
		$query_approved = "INSERT INTO audit_logs(STUDENT_COUNT,
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
				'$getStudentID',
				'',
				'',
				'',
				'',
				'',
				'$approved',
				'$date_approved'
			)";
			$query_db = mysqli_query($conn, $query_approved);
			$ins_query = mysqli_query($conn, $ins_query);

			if($query_db && $ins_query){
				$mssg = "<script language='javascript'>(function(){alert('Has been Sent!!');})();</script>";
			}
	}

	// IF THE STATUS IS APPROVED
	if(isset($_POST['send'])){
		// INSERT THE COURSE IN THE RESPECTIVE COLLEGE
		$course_1 = $_POST['course1'];
		$course_2 = $_POST['course2'];
		$course_3 = $_POST['course3'];
		$course_4 = $_POST['course4'];
		$course_5 = $_POST['course5'];
		$status = $_POST['status']; 
		
		$queryName = "SELECT * FROM student WHERE STUDENT_ID= '$getStudentID'";
		$queryName2 = mysqli_query($conn, $queryName);
		
		while($row_name = mysqli_fetch_array($queryName2)){
			$LastName = $row_name['FAMILY_NAME'];
			$FirstName =$row_name['GIVEN_NAME'];
		}

		// course 1
		if($course_1 != NULL){
			$course_query = "INSERT INTO admin_college(
				STUDENT_COUNT,
				STUDENT_ID,
				PROPOSED_PROGRAM,
				COURSE,
				COLLEGE,
				STATUS
			) VALUES (
				' ',
				'$getStudentID',
				' ',
				'$set_COURSE_1_INBOUND',
				'$course_1',
				'Approved'
			)";
			//insert to audit log
			date_default_timezone_set('Asia/Manila');
			$date1 = date('Y-m-d/H:i:s');
			$query_log1 = "INSERT INTO audit_logs(STUDENT_COUNT,
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
				'$getStudentID',
				'$LastName',
				'$FirstName',
				'',
				'$course_1',
				'$set_COURSE_1_INBOUND',
				'',
				'$date1'
				)";
			// INSERT COLLEGE NOTIFICATION
				$query_log2 = "INSERT INTO collegenotification(STUDENT_COUNT,
				STUDENT_ID,
				LASTNAME,
				FIRSTNAME,
				APPLICATION_FORM,
				COLLEGE,
				COURSE,
				STATUS
				) VALUES (
					'',
					'$getStudentID',
					'$LastName',
					'$FirstName',
					'',
					'$course_1',
					'$set_COURSE_1_INBOUND',
					''
					)";
			$log_db = mysqli_query($conn, $query_log1);
			$log_db1 = mysqli_query($conn, $query_log2);
			$ddbb = mysqli_query($conn, $course_query);
		}
		// course 2
		if($course_2 != NULL){
			// course 2
			$course_query1 = "INSERT INTO admin_college(
				STUDENT_COUNT,
				STUDENT_ID,
				PROPOSED_PROGRAM,
				COURSE,
				COLLEGE,
				STATUS
			) VALUES (
				' ',
				'$getStudentID',
				' ',
				'$set_COURSE_2_INBOUND',
				'$course_2',
				'Approved'
			)";
			//insert to audit log
			date_default_timezone_set('Asia/Manila');
			$date2 = date('Y-m-d/H:i:s');
			$query_log2 = "INSERT INTO audit_logs(STUDENT_COUNT,
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
				'$getStudentID',
				'$LastName',
				'$FirstName',
				'',
				'$course_2',
				'$set_COURSE_2_INBOUND',
				'',
				'$date2'
				)";

			// INSERT COLLEGE NOTIFICATION
				$query_log3 = "INSERT INTO collegenotification(STUDENT_COUNT,
				STUDENT_ID,
				LASTNAME,
				FIRSTNAME,
				APPLICATION_FORM,
				COLLEGE,
				COURSE,
				STATUS
				) VALUES (
					'',
					'$getStudentID',
					'$LastName',
					'$FirstName',
					'',
					'$course_2',
					'$set_COURSE_2_INBOUND',
					''
					)";
			$log_db1 = mysqli_query($conn, $query_log2);
			$log_db2 = mysqli_query($conn, $query_log3);
			$ddbb1 = mysqli_query($conn, $course_query1);
		}
		// course 3
		if($course_3 != NULL){

			// course 3
			$course_query2 = "INSERT INTO admin_college(
				STUDENT_COUNT,
				STUDENT_ID,
				PROPOSED_PROGRAM,
				COURSE,
				COLLEGE,
				STATUS
			) VALUES (
				' ',
				'$getStudentID',
				' ',
				'$set_COURSE_3_INBOUND',
				'$course_3',
				'Approved'
			)";

			//insert to audit log
			date_default_timezone_set('Asia/Manila');
			$date3 = date('Y-m-d/H:i:s');
			$query_log3 = "INSERT INTO audit_logs(STUDENT_COUNT,
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
				'$getStudentID',
				'$LastName',
				'$FirstName',
				'',
				'$course_3',
				'$set_COURSE_3_INBOUND',
				'',
				'$date3'
				)";
			
			// INSERT COLLEGE NOTIFICATION
				$query_log4 = "INSERT INTO collegenotification(STUDENT_COUNT,
				STUDENT_ID,
				LASTNAME,
				FIRSTNAME,
				APPLICATION_FORM,
				COLLEGE,
				COURSE,
				STATUS
				) VALUES (
					'',
					'$getStudentID',
					'$LastName',
					'$FirstName',
					'',
					'$course_3',
					'$set_COURSE_3_INBOUND',
					''
					)";

			$log_db2 = mysqli_query($conn, $query_log3);
			$log_db3 = mysqli_query($conn, $query_log4);
			$ddbb2 = mysqli_query($conn, $course_query2);
		}
		// course 4
		if($course_4 != NULL){

			// course 4
			$course_query3 = "INSERT INTO admin_college(
				STUDENT_COUNT,
				STUDENT_ID,
				PROPOSED_PROGRAM,
				COURSE,
				COLLEGE,
				STATUS
			) VALUES (
				' ',
				'$getStudentID',
				' ',
				'$set_COURSE_4_INBOUND',
				'$course_4',
				'Approved'
			)";
			//insert to audit log
			date_default_timezone_set('Asia/Manila');
			$date4 = date('Y-m-d/H:i:s');
			$query_log4 = "INSERT INTO audit_logs(STUDENT_COUNT,
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
				'$getStudentID',
				'$LastName',
				'$FirstName',
				'',
				'$course_4',
				'$set_COURSE_4_INBOUND',
				'',
				'$date4'
				)";
			// INSERT COLLEGE NOTIFICATION
				$query_log5 = "INSERT INTO collegenotification(STUDENT_COUNT,
				STUDENT_ID,
				LASTNAME,
				FIRSTNAME,
				APPLICATION_FORM,
				COLLEGE,
				COURSE,
				STATUS
				) VALUES (
					'',
					'$getStudentID',
					'$LastName',
					'$FirstName',
					'',
					'$course_4',
					'$set_COURSE_4_INBOUND',
					''
					)";
			$log_db3 = mysqli_query($conn, $query_log4);
			$log_db4 = mysqli_query($conn, $query_log5);
			$ddbb3 = mysqli_query($conn, $course_query3);
		}
		// course 5
		if($course_5 != NULL){
			// course 5
			$course_query4 = "INSERT INTO admin_college(
				STUDENT_COUNT,
				STUDENT_ID,
				PROPOSED_PROGRAM,
				COURSE,
				COLLEGE,
				STATUS
			) VALUES (
				' ',
				'$getStudentID',
				' ',
				'$set_COURSE_5_INBOUND',
				'$course_5',
				'Approved'
			)";
			//insert to audit log
			date_default_timezone_set('Asia/Manila');
			$date5 = date('Y-m-d/H:i:s');
			$query_log5 = "INSERT INTO audit_logs(STUDENT_COUNT,
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
				'$getStudentID',
				'$LastName',
				'$FirstName',
				'',
				'$course_5',
				'$set_COURSE_5_INBOUND',
				'',
				'$date5'
				)";
			// INSERT COLLEGE NOTIFICATION
				$query_log6 = "INSERT INTO collegenotification(STUDENT_COUNT,
				STUDENT_ID,
				LASTNAME,
				FIRSTNAME,
				APPLICATION_FORM,
				COLLEGE,
				COURSE,
				STATUS
				) VALUES (
					'',
					'$getStudentID',
					'$LastName',
					'$FirstName',
					'',
					'$course_5',
					'$set_COURSE_5_INBOUND',
					''
					)";
			$log_db4 = mysqli_query($conn, $query_log5);
			$log_db5 = mysqli_query($conn, $query_log6);
			$ddbb4 = mysqli_query($conn, $course_query4);
		}
		
		$query2 = "UPDATE student SET STATUS = '$status' WHERE STUDENT_ID = '$getStudentID'";
		
		$query_db = mysqli_query($conn, $query2);

		// message that it has been approved
		if($query_db){
			$mssg = "<script language='javascript'>(function(){alert('Has been Sent!!');})();</script>";
		}

		// if($query_db){
		// 	header("Location:admin_student_application_in.php?studentName=$getStudentID");
		// 	$sel_query = "SELECT * FROM student WHERE STUDENT_ID = '$getStudentID'";
		// 	$queryy_db = mysqli_query($conn, $sel_query);
		// 	while($rrow = mysqli_fetch_array($queryy_db)){
		// 		$sel_query = $rrow['STATUS'];
		// 	}
		// }

		// if($sel_query == 'Completed'){
		// 	$prevyears = date('Y');
		// 	$nextyears = date('Y', strtotime('+1 year'));
					
		// 	$cret_year = $prevyears."-".$nextyears;
		// 	$sel_query = "SELECT * FROM yearly";
		// 	$sel_db = mysqli_query($conn, $sel_query);
		// 	while($selRow = mysqli_fetch_array($sel_db)){
		// 		$yyear = $selRow['YEARLY'];
		// 	}
		// 	if($cret_year != $yyear){
		// 		// echo "success"."<br>";
		// 		// echo "you enrolled in first semester";
		// 		$sql = "INSERT INTO yearly(COUNT, YEARLY) VALUES (' ', '$cret_year')";
		// 		$query = mysqli_query($conn, $sql);
		// 		// if($query){
		// 		// 	echo "success";
		// 		// }
		// 	} else{
		// 		// echo "doesnt match";
		// 		header("Location: error_page.php");
		// 	}	

		// 	// CHECK IF THE NOT EXIST IN OUTBOUND GRAPH
		// 	$yearlySel_query = "SELECT * FROM yearly";
		// 	$yearlySel_db = mysqli_query($conn, $yearlySel_query);
		// 	while($yearSel_row = mysqli_fetch_array($yearlySel_db)){
		// 		$yearr = $yearSel_row['YEARLY'];
		// 	}
		// 	$sel_query = "SELECT * FROM instatistics WHERE COUNTRY = '$country' AND YEAR = '$yearr'";
		// 	$sel_db = mysqli_query($conn, $sel_query);
		// 	$countNum = mysqli_num_rows($sel_db);
		// 	if($countNum == 1){
		// 		while($seRow = mysqli_fetch_array($sel_db)){
		// 			$num_student = $seRow['NUMBER_STUDENT'];
		// 		}
		// 		$num_student += 1;
		// 		$statUp = "UPDATE instatistics SET NUMBER_STUDENT = '$num_student' WHERE COUNTRY = '$country' AND YEAR = '$yearr'";
		// 		mysqli_fetch_array($conn, $statUp);
		// 	}

		// 	if($countNum == 0){
		// 		$numStu = 1;
		// 		$appform = "inbound";
		// 		$statInt = "INSERT INTO instatistics(ID, NUMBER_STUDENT, YEAR, COUNTRY, APPLICATION_FORM) VALUES (
		// 			'',
		// 			'$numStu',
		// 			'$yearr',
		// 			'$country',
		// 			'$appform'
		// 		)";
		// 		mysqli_query($conn, $statInt);
		// 	}
		// }else{
		// 	$del_query = "DELETE FROM admin_college WHERE STUDENT_ID = '$getStudentID'";
		// 	mysqli_query($conn, $del_query);
		// }   
	}

	// if THE SATUS IN ON-GOING
	if(isset($_POST['goinbtn'])){
		$dateStrat = $_POST['dateStrat'];
		$goinstatus = $_POST['status'];

		$datstart_query = "UPDATE admin_student_data SET DATE_STARTED = '$dateStrat' WHERE STUDENT_ID = '$getStudentID'";
		$datstart_db = mysqli_query($conn, $datstart_query);

		$update_start_query = "UPDATE student SET STATUS = '$goinstatus' WHERE STUDENT_ID = '$getStudentID'";
		$update_db = mysqli_query($conn, $update_start_query);
		if($datstart_db && $update_db){
			$mssg = "<script language='javascript'>(function(){alert('Has been Sent!!');})();</script>";
		}
	}

	// if the status is COMPLETED 
    if(isset($_POST['subCert'])){
        $expireCert = $_POST['expirationCert'];
		$status = $_POST['status'];
        $target = "images/".basename($_FILES['certificate']['name']);
        
        $cert = $_FILES['certificate']['name'];
		// CHECK IF THE FILE FORMAT IS RIGTH
		$ext = pathinfo($cert, PATHINFO_EXTENSION);
		if($ext == 'gif' || $ext == 'png' || $ext == 'jpg' || $_FILES["certificate"]["type"] == "application/pdf"){

			$inn = "inbound";
			// INSERT SA CERTIFICAT TABLE
			$cert_query = "INSERT INTO certificateofcompletion(
				STUDENT_COUNT,
				STUDENT_ID,
				APPLICATION_FORM,
				CERTIFICATION,
				EXPIRATION_ACCESS
			) values (
				'',
				'$getStudentID',
				'$inn',
				'$cert',
				'$expireCert'
			)";
			mysqli_query($conn, $cert_query);

			// UPDATE THE STATUS NA COMPLETED

			$query2 = "UPDATE student SET STATUS = '$status' WHERE STUDENT_ID = '$getStudentID'";
			$query_completed = "";
			$query_db = mysqli_query($conn, $query2);

			// FOR AUDIT LOG
			$query_name = "SELECT * FROM student WHERE STUDENT_ID = '$getStudentID'";
			$name_db = mysqli_query($conn, $query_name);
			while($row_complete = mysqli_fetch_array($name_db)){
				$surname = $row_complete['FAMILY_NAME'];
				$givenname = $row_complete['GIVEN_NAME'];
			}
			
			//insert to audit log
				date_default_timezone_set('Asia/Manila');
				$datecomplete = date('Y-m-d/H:i:s');
				$query_logcomplete = "INSERT INTO audit_logs(STUDENT_COUNT,
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
					'$getStudentID',
					'$surname',
					'$givenname',
					'',
					'',
					'',
					'$status',
					'$datecomplete'
					)";
				$log_complete = mysqli_query($conn, $query_logcomplete);

			if($query_db){ // CHECK IF NG UPDATE YUNG STATUS INTO COMPLETED

				// CHECK IF THE YEAR IS EXISTING THEN INSERT SA YEALY IF NONE
				$dateStarted_select = "SELECT * FROM admin_student_data WHERE STUDENT_ID = '$getStudentID'";
				$dateStarted_db = mysqli_query($conn, $dateStarted_select);
				while($row_datestarted = mysqli_fetch_array($dateStarted_db)){
					$getDateStarted = $row_datestarted['DATE_STARTED'];
				}
				$date = new DateTime($getDateStarted);
				$getStartresult = $date->format('m/Y');

				$firstTerm = array("08/".date('Y'), "09/".date('Y'), "10/".date('Y'), "11/".date('Y'), "12/".date('Y'));
				$countfirstray = count($firstTerm);
				$secondTerm = array("01/".date('Y'), "02/".date('Y'), "03/".date('Y'), "04/".date('Y'), "05/".date('Y'));
				$countsecondray = count($secondTerm);
				$thirdTerm = array("06/".date('Y'), "07/".date('Y'));
				$countthird = count($thirdTerm);
				
				$setfirstSem = " ";
				$setsecondSem = " ";
				$setthirdSem = " ";
				// LOOP FOR FIRST TERM
				for($i = 0 ; $i < $countfirstray ; $i++){
					// echo $firstTerm[$i]."<br>";
					if($firstTerm[$i] == $getStartresult){
						// echo $firstTerm[$i]."<br>";
						$setfirstSem = $firstTerm[$i];
						break;
					}
				}
				// LOOP FOR SECOND TERM
				for($n = 0 ; $n < $countsecondray ; $n++){
					if($secondTerm[$n] == $getStartresult){
						// echo $secondTerm[$n]."<br>";
						$setsecondSem = $secondTerm[$n];
						// echo "success";
						break;
					}
				}
				// LOOP FOR SPECIAL TERM
				for($y = 0 ; $y < $countthird ; $y++){
					if($thirdTerm[$y] == $getStartresult){
						// echo $secondTerm[$n]."<br>";
						$setthirdSem = $thirdTerm[$y];
						// echo "success";
						break;
					}
				}

				// IDENTIFY WHAT YEAR IT BELONG
				if($setfirstSem != " "){

					$firstsemdate = new DateTime($getDateStarted);
					$firstsemresult = $firstsemdate->format('Y');
					$nextyears = date('Y', strtotime('+1 year'));
							
					$cret_year = $firstsemresult."-".$nextyears;
					$sel_query = "SELECT * FROM yearly";
					$sel_db = mysqli_query($conn, $sel_query);
					while($selRow = mysqli_fetch_array($sel_db)){
						$yyear = $selRow['YEARLY'];
					}
					if($cret_year != $yyear){
						// echo "success"."<br>";
						// echo "you enrolled in first semester";
						$sql = "INSERT INTO yearly(COUNT, YEARLY) VALUES (' ', '$cret_year')";
						$query = mysqli_query($conn, $sql);
						// if($query){
						// 	echo "success";
						// }
					}
					$selectYearly_query = "SELECT * FROM yearly";
					$selectYearly_db = mysqli_query($conn, $selectYearly_query);
					while($selectYearly_row = mysqli_fetch_array($selectYearly_db)){
						$yyearly = $selectYearly_row['YEARLY'];
					}
					$selectincompa_query = "SELECT * FROM incomparison WHERE YEAR = '$yyearly' AND SEMESTER = '1st Semester'";
					$selectincompa_db = mysqli_query($conn, $selectincompa_query);
					$selectincompa_count = mysqli_num_rows($selectincompa_db);
					$num_student = 1;
					if($selectincompa_count == 0){

						$insertDataCompa_query = "INSERT INTO incomparison(
							STUDENT_COUNT,
							NUMBER_STUDENT,
							YEAR,
							SEMESTER
							) VALUES (
								'',
								'$num_student',
								'$yyearly',
								'1st Semester'
							)";
						$insertDataCompa_db = mysqli_query($conn, $insertDataCompa_query);
					}else if($selectincompa_count == 1){
						while($selectincompa_row = mysqli_fetch_array($selectincompa_db)){
							$incompa_numStudent = $selectincompa_row['NUMBER_STUDENT'];
						}
						$incompa_numStudent =+ 1;
						$updateincompa_query = "UPDATE incomparison SET NUMBER_STUDENT = '$incompa_numStudent' WHERE YEAR = '$yyearly' AND SEMESTER = '1st Semester'";
						$updateincompa_db = mysqli_query($conn, $updateincompa_query);
					}
				}
				if($setsecondSem != " "){
					
					$firstsemdate = new DateTime($getDateStarted);
					$firstsemresult = $firstsemdate->format('Y');
					$prevyears = date('Y', strtotime('-1 year'));
							
					$cret_year = $prevyears."-".$firstsemresult;
					$sel_query = "SELECT * FROM yearly";
					$sel_db = mysqli_query($conn, $sel_query);
					while($selRow = mysqli_fetch_array($sel_db)){
						$yyear = $selRow['YEARLY'];
					}
					if($cret_year != $yyear){
						// echo "success"."<br>";
						// echo "you enrolled in first semester";
						$sql = "INSERT INTO yearly(COUNT, YEARLY) VALUES (' ', '$cret_year')";
						$query = mysqli_query($conn, $sql);
						// if($query){
						// 	echo "success";
						// }
					}
					$selectincompa_query = "SELECT * FROM incomparison WHERE YEAR = '$yyearly' AND SEMESTER = '2nd Semester'";
					$selectincompa_db = mysqli_query($conn, $selectincompa_query);
					$selectincompa_count = mysqli_num_rows($selectincompa_db);
					$num_student = 1;
					if($selectincompa_count == 0){

						$insertDataCompa_query = "INSERT INTO incomparison(
							STUDENT_COUNT,
							NUMBER_STUDENT,
							YEAR,
							SEMESTER
							) VALUES (
								'',
								'$num_student',
								'$yyearly',
								'2nd Semester'
							)";
						$insertDataCompa_db = mysqli_query($conn, $insertDataCompa_query);
					}else if($selectincompa_count == 1){
						while($selectincompa_row = mysqli_fetch_array($selectincompa_db)){
							$incompa_numStudent = $selectincompa_row['NUMBER_STUDENT'];
						}
						$incompa_numStudent =+ 1;
						$updateincompa_query = "UPDATE incomparison SET NUMBER_STUDENT = '$incompa_numStudent' WHERE YEAR = '$yyearly' AND SEMESTER = '2nd Semester'";
						$updateincompa_db = mysqli_query($conn, $updateincompa_query);
					}
				}

				if($setthirdSem != " "){
					$firstsemdate = new DateTime($getDateStarted);
					$firstsemresult = $firstsemdate->format('Y');
					$prevyears = date('Y', strtotime('-1 year'));
							
					$cret_year = $prevyears."-".$firstsemresult;
					$sel_query = "SELECT * FROM yearly";
					$sel_db = mysqli_query($conn, $sel_query);
					while($selRow = mysqli_fetch_array($sel_db)){
						$yyear = $selRow['YEARLY'];
					}
					if($cret_year != $yyear){
						echo "success"."<br>";
						echo "you enrolled in first semester";
						$sql = "INSERT INTO yearly(COUNT, YEARLY) VALUES (' ', '$cret_year')";
						$query = mysqli_query($conn, $sql);
						// if($query){
						// 	echo "success";
						// }
					}

					$selectYearly_query = "SELECT * FROM yearly";
					$selectYearly_db = mysqli_query($conn, $selectYearly_query);
					while($selectYearly_row = mysqli_fetch_array($selectYearly_db)){
						$yyearly = $selectYearly_row['YEARLY'];
					}
					$selectincompa_query = "SELECT * FROM incomparison WHERE YEAR = '$yyearly' AND SEMESTER = 'Special Term'";
					$selectincompa_db = mysqli_query($conn, $selectincompa_query);
					$selectincompa_count = mysqli_num_rows($selectincompa_db);
					$num_student = 1;
					if($selectincompa_count == 0){

						$insertDataCompa_query = "INSERT INTO incomparison(
							STUDENT_COUNT,
							NUMBER_STUDENT,
							YEAR,
							SEMESTER
							) VALUES (
								'',
								'$num_student',
								'$yyearly',
								'Special term'
							)";
						$insertDataCompa_db = mysqli_query($conn, $insertDataCompa_query);
					}else if($selectincompa_count == 1){
						while($selectincompa_row = mysqli_fetch_array($selectincompa_db)){
							$incompa_numStudent = $selectincompa_row['NUMBER_STUDENT'];
						}
						$incompa_numStudent =+ 1;
						$updateincompa_query = "UPDATE incomparison SET NUMBER_STUDENT = '$incompa_numStudent' WHERE YEAR = '$yyearly' AND SEMESTER = 'Special Term'";
						$updateincompa_db = mysqli_query($conn, $updateincompa_query);
					}
				}

				// FOR INBOUND STATISTIC
				$yearlySel_query = "SELECT * FROM yearly"; 
				$yearlySel_db = mysqli_query($conn, $yearlySel_query);
				while($yearSel_row = mysqli_fetch_array($yearlySel_db)){
					$yearr = $yearSel_row['YEARLY'];
				}
				$sel_query = "SELECT * FROM instatistics WHERE COUNTRY = '$country' AND YEAR = '$yearr'";
				$sel_db = mysqli_query($conn, $sel_query);
				$countNum = mysqli_num_rows($sel_db);
				if($countNum == 1){
					while($seRow = mysqli_fetch_array($sel_db)){
						$num_student = $seRow['NUMBER_STUDENT'];
					}
					$num_student += 1;
					$statUp = "UPDATE instatistics SET NUMBER_STUDENT = '$num_student' WHERE COUNTRY = '$country' AND YEAR = '$yearr'";
					mysqli_query($conn, $statUp);
				}
				if($countNum == 0){
					$numStu = 1;
					$appform = "inbound";
					$statInt = "INSERT INTO instatistics(ID, NUMBER_STUDENT, YEAR, COUNTRY, APPLICATION_FORM) VALUES (
						'',
						'$numStu',
						'$yearr',
						'$country',
						'$appform'
					)";
					mysqli_query($conn, $statInt);
				}
			}
			if($query_db){
				$mssg = "<script language='javascript'>(function(){alert('Has been Sent!!');})();</script>";
			}

			// FOR STORED A FILES
			if (move_uploaded_file($_FILES['certificate']['tmp_name'], $target)) 
			{
				$msg = "Upload Successful";
			}
			else 
			{
				$msg = "Upload Failed";
			}
			
		}else{
			$errorCoCmsg = "
				<div class='container-fluid alert'>
					<span class='closebtn ' onclick=\"this.parentElement.style.display='none';\">&times;</span> 
					<p>The File must be .jpg, .png, and PDF file!</p>
				</div>
			";
		}
    }

?>