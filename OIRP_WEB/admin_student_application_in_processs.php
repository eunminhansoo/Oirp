<?php

    include 'database_connection.php';
    $sql = "SELECT * FROM upload_pdf WHERE STUDENT_ID = '$getStudentID'";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_array($result)){
        $file = $row['PDF_IMG'];
		$torScan = $row['TOR_SCAN'];
    }
    $query = "SELECT * FROM student WHERE STUDENT_ID= '$getStudentID'";
    $queryBD = mysqli_query($conn, $query);
    $query1 = "SELECT * FROM educ_background_inbound WHERE STUDENT_ID= '$getStudentID'";
    $queryCU = mysqli_query($conn, $query1);   
	$query2 = "SELECT * FROM proposed_field_study_in_bila WHERE STUDENT_ID= '$getStudentID'";
    $queryPF = mysqli_query($conn, $query2);

	while($row1 = mysqli_fetch_array($queryCU)){
		$application_prog = $row1['TYPE_OF_PROGRAM'];
		$application_prog_other = $row1['TYPE_OF_PROG_OTHER'];
		$application_form = $row1['TYPE_OF_FORM'];
		$application_form_other = $row1['TYPE_OF_FORM_OTHER'];
		$country = $row1['COUNTRY_ORIGIN'];
		$university = $row1['HOME_UNIV_IN_BILA'];
	}

	if(isset($_POST['update_status'])){
		$status = $_POST['status']; 

		$query2 = "UPDATE student SET STATUS = '$status' WHERE STUDENT_ID = '$getStudentID'";
		
		$query_db = mysqli_query($conn, $query2);

		if($query_db){
			header("Location:admin_student_application_in.php?studentName=$getStudentID");
			$sel_query = "SELECT * FROM student WHERE STUDENT_ID = '$getStudentID'";
			$queryy_db = mysqli_query($conn, $sel_query);
			while($rrow = mysqli_fetch_array($queryy_db)){
				$sel_query = $rrow['STATUS'];
			}
			if($sel_query == 'Approved'){

				
				$sel_check_query = "SELECT * FROM admin_college WHERE STUDENT_ID = '$getStudentID'";
				$sel_check_db = mysqli_query($conn, $sel_check_query);
				if(mysqli_num_rows($sel_check_db) <= 0){
					$ins_query = "INSERT INTO admin_college ('STUDENT_COUNT', 'STUDENT_ID, 'PROPOSED_PROGRAM', 'COURSE_1', 'COURSE_2', 'COURSE_3', 'COURSE_4', 'COURSE_5') VALUES ('', '$getStudentID', '', '', '', '', '', '')";
					//add in audit
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
    				mysqli_query($conn, $query_approved);
					mysqli_query($conn, $ins_query);
				}
			}else{
				$del_query = "DELETE FROM admin_college WHERE STUDENT_ID = '$getStudentID'";
				//add in audit
				//insert to audit log
		date_default_timezone_set('Asia/Manila');
		$date_rejected = date('Y-m-d/H:i:s');
		$rejected = 'Rejected';
    	$query_rejected = "INSERT INTO audit_logs(STUDENT_COUNT,
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
			'$rejected',
			'$date_rejected'
			)";
    	        mysqli_query($conn, $query_rejected);
				mysqli_query($conn, $del_query);
			}   
		}
	}
	while($pf_row = mysqli_fetch_array($queryPF)){
		$pf_COURSE_1_INBOUND = $pf_row['COURSE_1_INBOUND'];
		$pf_COURSE_2_INBOUND = $pf_row['COURSE_2_INBOUND'];
		$pf_COURSE_3_INBOUND = $pf_row['COURSE_3_INBOUND'];
		$pf_COURSE_4_INBOUND = $pf_row['COURSE_4_INBOUND'];
		$pf_COURSE_5_INBOUND = $pf_row['COURSE_5_INBOUND'];
	}

	$sql = "select college from colleges where id > 1 order by college asc";
	$result = mysqli_query($conn, $sql);
	
	$col='';
	while($row = mysqli_fetch_array($result)) {
		$col .=  "<option value='".$row['college']."'>".$row['college']."</option>";
	}
	if(isset($_POST['update_status'])){
		$status = $_POST['status'];

		// UPDATE THE STATUS
		$query2 = "UPDATE student SET STATUS = '$status' WHERE STUDENT_ID = '$getStudentID'";
		$query_db = mysqli_query($conn, $query2);
	}

	if(isset($_POST['send'])){
		// INSERT THE COURSE IN THE RESPECTIVE COLLEGE
		$course_1 = $_POST['course1'];
		$course_2 = $_POST['course2'];
		$course_3 = $_POST['course3'];
		$course_4 = $_POST['course4'];
		$course_5 = $_POST['course5'];
		$status = $_POST['status']; 

		// course 1
		$course_query = "INSERT INTO admin_college(
			STUDENT_COUNT,
			STUDENT_ID,
			PROPOSED_PROGRAM,
			COURSE,
			COLLEGE
		) VALUES (
			' ',
			'$getStudentID',
			' ',
			'$pf_COURSE_1_INBOUND',
			'$course_1'
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
			'',
			'',
			'',
			'$course_1',
			'$pf_COURSE_1_INBOUND',
			'',
			'$date1'
			)";
    	mysqli_query($conn, $query_log1);
		mysqli_query($conn, $course_query);

		// course 2
		$course_query1 = "INSERT INTO admin_college(
			STUDENT_COUNT,
			STUDENT_ID,
			PROPOSED_PROGRAM,
			COURSE,
			COLLEGE
		) VALUES (
			' ',
			'$getStudentID',
			' ',
			'$pf_COURSE_2_INBOUND',
			'$course_2'
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
			'',
			'',
			'',
			'$course_2',
			'$pf_COURSE_2_INBOUND',
			'',
			'$date2'
			)";
    	mysqli_query($conn, $query_log2);
		mysqli_query($conn, $course_query1);

		// course 3
		$course_query2 = "INSERT INTO admin_college(
			STUDENT_COUNT,
			STUDENT_ID,
			PROPOSED_PROGRAM,
			COURSE,
			COLLEGE
		) VALUES (
			' ',
			'$getStudentID',
			' ',
			'$pf_COURSE_3_INBOUND',
			'$course_3'
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
			'',
			'',
			'',
			'$course_3',
			'$pf_COURSE_3_INBOUND',
			'',
			'$date3'
			)";
    	mysqli_query($conn, $query_log3);
		mysqli_query($conn, $course_query2);

		// course 4
		$course_query3 = "INSERT INTO admin_college(
			STUDENT_COUNT,
			STUDENT_ID,
			PROPOSED_PROGRAM,
			COURSE,
			COLLEGE
		) VALUES (
			' ',
			'$getStudentID',
			' ',
			'$pf_COURSE_4_INBOUND',
			'$course_4'
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
			'',
			'',
			'',
			'$course_4',
			'$pf_COURSE_4_INBOUND',
			'',
			'$date4'
			)";
    	mysqli_query($conn, $query_log4);
		mysqli_query($conn, $course_query3);

		// course 5
		$course_query4 = "INSERT INTO admin_college(
			STUDENT_COUNT,
			STUDENT_ID,
			PROPOSED_PROGRAM,
			COURSE,
			COLLEGE
		) VALUES (
			' ',
			'$getStudentID',
			' ',
			'$pf_COURSE_5_INBOUND',
			'$course_5'
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
			'',
			'',
			'',
			'$course_5',
			'$pf_COURSE_5_INBOUND',
			'',
			'$date5'
			)";
    	mysqli_query($conn, $query_log5);
		mysqli_query($conn, $course_query4);
		
		$query2 = "UPDATE student SET STATUS = '$status' WHERE STUDENT_ID = '$getStudentID'";
		
		$query_db = mysqli_query($conn, $query2);

		if($query_db){
			header("Location:admin_student_application_in.php?studentName=$getStudentID");
			$sel_query = "SELECT * FROM student WHERE STUDENT_ID = '$getStudentID'";
			$queryy_db = mysqli_query($conn, $sel_query);
			while($rrow = mysqli_fetch_array($queryy_db)){
				$sel_query = $rrow['STATUS'];
			}
			if($sel_query == 'Approved'){
				// CHECK IF THE YEAR IS EXISTING IF NOT INSERT IN YEARLY
				$today = date("m/d/Y");
				$new = "08/01/".date('Y');;
				$prevyears = date('Y');
				$nextyears = date('Y', strtotime('+1 year'));
				$cret_year = $prevyears."-".$nextyears;
				$sel_query = "SELECT * FROM yearly";
				$sel_db = mysqli_query($conn, $sel_query);
				while($selRow = mysqli_fetch_array($sel_db)){
					$yyear = $selRow['YEARLY'];
				}
				if($cret_year != $yyear){
					if($today == $new){	
						// echo "success";
						$sql = "INSERT INTO yearly(COUNT, YEARLY) VALUES (' ', '$cret_year')";
						$query = mysqli_query($conn, $sql);
						if($query){
							echo "success";
						}
					} 	                   
				}
				$sel_check_query = "SELECT * FROM admin_college WHERE STUDENT_ID = '$getStudentID'";
				$sel_check_db = mysqli_query($conn, $sel_check_query);
				if(mysqli_num_rows($sel_check_db) <= 0){
					$ins_query = "INSERT INTO `admin_college` (`STUDENT_COUNT`, `STUDENT_ID`, `PROPOSED_PROGRAM`, `COURSE_1`, `COURSE_2`, `COURSE_3`, `COURSE_4`, `COURSE_5`) VALUES (' ', '$getStudentID', ' ', ' ', ' ', ' ', ' ', ' ')";
					mysqli_query($conn, $ins_query);
				}
			}else if($sel_query == 'Completed'){
				// CHECK IF THE NOT EXIST IN OUTBOUND GRAPH
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
					mysqli_fetch_array($conn, $statUp);
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
			}else{
				$del_query = "DELETE FROM admin_college WHERE STUDENT_ID = '$getStudentID'";
				mysqli_query($conn, $del_query);
			}   
		}
	}

    if(isset($_POST['subCert'])){
        $expireCert = $_POST['expirationCert'];
		$status = $_POST['status'];
        $target = "images/".basename($_FILES['certificate']['name']);
        
        $cert = $_FILES['certificate']['name'];
        $inn = "inbound";
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

		$query2 = "UPDATE student SET STATUS = '$status' WHERE STUDENT_ID = '$getStudentID'";
		
		$query_db = mysqli_query($conn, $query2);

		if($query_db){
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
        if (move_uploaded_file($_FILES['certificate']['tmp_name'], $target)) 
        {
            $msg = "Upload Successful";
        }
        else 
        {
            $msg = "Upload Failed";
        }
    }

?>