<?php
	error_reporting(0);	

    include 'database_connection.php';
	include 'logout.php';
	session_start();
	if($_SESSION['superadmin'] != 'oirp'){
		header("Location: index.php");
	}
	$errorCoCmsg = "";
	$mssg = " "; 
    $getStudentID = $_GET['studentName'];
    $encryptStudentid = base64_decode($getStudentID);
    $sql = "SELECT * FROM upload_pdf WHERE STUDENT_ID = '$encryptStudentid'";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_array($result)){
        $file = $row['PDF_IMG'];
		$torScan = $row['TOR_SCAN'];
    }
    $query = "SELECT * FROM student WHERE STUDENT_ID= '$encryptStudentid'";
    $queryBD = mysqli_query($conn, $query);
    $query1 = "SELECT * FROM country_univ_outbound WHERE STUDENT_ID = '$encryptStudentid'";
    $queryCU = mysqli_query($conn, $query1);   
	$query2 = "SELECT * FROM proposed_field_study WHERE STUDENT_ID = '$encryptStudentid' "; 
	$queryPF = mysqli_query($conn, $query2);        
	while($row1 = mysqli_fetch_array($queryCU)){
		$country = $row1['COUNTRY_OUT'];
		$university = $row1['UNIVERSITY_OUT'];
	}
	if(isset($_POST['update_status'])){
		$status = $_POST['status'];

		// UPDATE THE STATUS
		$query2 = "UPDATE student SET STATUS = '$status' WHERE STUDENT_ID = '$encryptStudentid'";
		$query_db = mysqli_query($conn, $query2);
		if($query_db){
			$mssg = "<script language='javascript'>(function(){alert('Has been Sent!!');})();</script>";
		}
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

	if(isset($_POST['subCert'])){
		$status = $_POST['status'];
		if($status == 'Completed'){
			$expireCert = $_POST['expirationCert'];
			$status = $_POST['status'];
			$target = "images/".basename($_FILES['certificate']['name']);
			
			$cert = $_FILES['certificate']['name'];
			$ext = pathinfo($cert, PATHINFO_EXTENSION);
			if($ext == 'gif' || $ext == 'png' || $ext == 'jpg' || $_FILES["TAscan"]["type"] == "application/pdf"){

				$inn = "inbound";
				$cert_query = "INSERT INTO certificateofcompletion(
					STUDENT_COUNT,
					STUDENT_ID,
					APPLICATION_FORM,
					CERTIFICATION,
					EXPIRATION_ACCESS
				) values (
					'',
					'$encryptStudentid',
					'$inn',
					'$cert',
					'$expireCert'
				)";
				mysqli_query($conn, $cert_query);

				// UPDATE THE STATUS
				$query2 = "UPDATE student SET STATUS = '$status' WHERE STUDENT_ID = '$encryptStudentid'";
				
				$query_db = mysqli_query($conn, $query2);

				// CHECK IF THE NOT EXIST IN OUTBOUND GRAPH
				if($query_db){
					// CHECK IF THE YEAR IS EXISTING THEN INSERT SA YEALY IF NONE
					$dateStarted_select = "SELECT * FROM admin_student_data WHERE STUDENT_ID = '$encryptStudentid'";
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
							$selectoutcompa_query = "SELECT * FROM outcomparison WHERE YEAR = '$yyearly' AND SEMESTER = '1st Semester'";
							$selectoutcompa_db = mysqli_query($conn, $selectoutcompa_query);
							$selectoutcompa_count = mysqli_num_rows($selectoutcompa_db);
							$num_student = 1;
							if($selectoutcompa_count == 0){

								$insertDataCompa_query = "INSERT INTO outcomparison(
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
							}else if($selectoutcompa_count == 1){
								while($selectoutcompa_row = mysqli_fetch_array($selectoutcompa_db)){
									$outcompa_numStudent = $selectoutcompa_row['NUMBER_STUDENT'];
								}
								$outcompa_numStudent =+ 1;
								$updateoutcompa_query = "UPDATE outcomparison SET NUMBER_STUDENT = '$outcompa_numStudent' WHERE YEAR = '$yyearly' AND SEMESTER = '1st Semester'";
								$updateoutcompa_db = mysqli_query($conn, $updateoutcompa_query);
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
							$selectoutcompa_query = "SELECT * FROM outcomparison WHERE YEAR = '$yyearly' AND SEMESTER = '2nd Semester'";
							$selectoutcompa_db = mysqli_query($conn, $selectoutcompa_query);
							$selectoutcompa_count = mysqli_num_rows($selectoutcompa_db);
							$num_student = 1;
							if($selectoutcompa_count == 0){

								$insertDataCompa_query = "INSERT INTO outcomparison(
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
							}else if($selectoutcompa_count == 1){
								while($selectoutcompa_row = mysqli_fetch_array($selectoutcompa_db)){
									$outcompa_numStudent = $selectoutcompa_row['NUMBER_STUDENT'];
								}
								$outcompa_numStudent =+ 1;
								$updateoutcompa_query = "UPDATE outcomparison SET NUMBER_STUDENT = '$outcompa_numStudent' WHERE YEAR = '$yyearly' AND SEMESTER = '2nd Semester'";
								$updateoutcompa_db = mysqli_query($conn, $updateoutcompa_query);
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
							$selectoutcompa_query = "SELECT * FROM outcomparison WHERE YEAR = '$yyearly' AND SEMESTER = 'Special Term'";
							$selectoutcompa_db = mysqli_query($conn, $selectoutcompa_query);
							$selectoutcompa_count = mysqli_num_rows($selectoutcompa_db);
							$num_student = 1;
							if($selectoutcompa_count == 0){

								$insertDataCompa_query = "INSERT INTO outcomparison(
									STUDENT_COUNT,
									NUMBER_STUDENT,
									YEAR,
									SEMESTER
									) VALUES (
										'',
										'$num_student',
										'$yyearly',
										'Special Term'
									)";
								$insertDataCompa_db = mysqli_query($conn, $insertDataCompa_query);
							}else if($selectoutcompa_count == 1){
								while($selectoutcompa_row = mysqli_fetch_array($selectoutcompa_db)){
									$outcompa_numStudent = $selectoutcompa_row['NUMBER_STUDENT'];
								}
								$outcompa_numStudent =+ 1;
								$updateoutcompa_query = "UPDATE outcomparison SET NUMBER_STUDENT = '$outcompa_numStudent' WHERE YEAR = '$yyearly' AND SEMESTER = 'Special Term'";
								$updateoutcompa_db = mysqli_query($conn, $updateoutcompa_query);
							}
					}

					$yearlySel_query = "SELECT * FROM yearly";
					$yearlySel_db = mysqli_query($conn, $yearlySel_query);
					while($yearSel_row = mysqli_fetch_array($yearlySel_db)){
						$yearr = $yearSel_row['YEARLY'];
					}
					$sel_query = "SELECT * FROM outstatistics WHERE COUNTRY = '$country' AND YEAR = '$yearr'";
					$sel_db = mysqli_query($conn, $sel_query);
					$countNum = mysqli_num_rows($sel_db);
					if($countNum == 1){
						while($seRow = mysqli_fetch_array($sel_db)){
							$num_student = $seRow['NUMBER_STUDENT'];
						}
						$num_student += 1;
						$statUp = "UPDATE outstatistics SET NUMBER_STUDENT = '$num_student' WHERE COUNTRY = '$country' AND YEAR = '$yearr'";
						mysqli_query($conn, $statUp);
					}
					if($countNum == 0){
						$numStu = 1;
						$appform = "outbound";
						$statInt = "INSERT INTO outstatistics(STUDENT_COUNT, NUMBER_STUDENT, YEAR, COUNTRY, APPLICATION_FORM) VALUES (
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
			}else{
				$errorCoCmsg = "
					<div class='container-fluid alert'>
						<span class='closebtn ' onclick=\"this.parentElement.style.display='none';\">&times;</span> 
						<p>The File must be .jpg, .png, and PDF file!</p>
					</div>
				";
			}
		}
	}	   
?>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width = device-width, initial-scale = 1">
        <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap-theme.min.css">
        <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap-theme.css">
        <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/custom.css">
        <link rel="icon" href="img/ust.png" type="image/png" sizes="196x196">
	</head>
	<body>
		<script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
		<script src="bootstrap-3.3.7-dist/js/jquery-3.3.1.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

		<div class="">
		<div class="header">
			<img src='img/logo.png' height=auto class="img-responsive">
		</div>
		<?php echo $mssg?>
		<?php echo $errorCoCmsg?>
		<!--START OF NAV BAR-->
		<nav class="navbar" id="bar">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-expand" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<div class="collapse navbar-collapse" id="nav-expand" aria-expanded="true">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="administrator.php">Home</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Applications<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="approved_students.php">Approved Students</a></li>
								<li><a href="qualified_students.php">Qualified Students</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Statistics<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="outboundStatistics.php">Outbound Data Statistics <span class="fa fa-pie-chart"></span></a></li>
								<li><a href="InboundStatistics.php">Inbound Data Statistics <span class="fa fa-pie-chart"></a></li>
								<li><a href="outboundComparison.php">Outbound Comparison <span class="fa fa-bar-chart"></span></a></li>
								<li><a href="inboundComparison.php">Inbound Comparison <span class="fa fa-bar-chart"></span></a></li>
							</ul>
						</li>
						<li class="dropdown" style="padding-right: 30px;">
							<a href="#" class="dropdown-toggle" id="notif" data-toggle="dropdown"><span class="label label-pill label-danger count" style="border-radius:10px;"></span><span class="glyphicon glyphicon-bell" style="font-size:18px;"></span></a>
							<ul class="dropdown-menu" id="notif-down"></ul>
						</li>
						<li class="dropdown" style="border-left: 1px solid #333333; padding-left: 30px;">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">OIRP<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="addUniversities.php">Add Universities  <span class="glyphicon glyphicon-plus-sign"></span></a></li>
								<li><a href="admin_logs.php">Audit Logs <span class="glyphicon glyphicon-list-alt"></span></a></li>
								<li><a href="index.php" class="logoutbtn" >Logout <span class="glyphicon glyphicon-log-out"></span></a></li>
							</ul>
						</li>
					</ul> 
				</div>
			</div>
		</nav>		
		<!--NAV BAR END-->

		<form method="post" enctype="multipart/form-data">
			<div class="container-responsive">
				<div class="col-sm-7">
					<?php 
						echo "<embed src='images/".$file."'  width='100%' height='100%'>";
					?>
				</div>
				<div class="col-sm-5">
					<p style="margin-top: 80px;"><h2>Basic Information</h2></p>
					<?php
						while($row = mysqli_fetch_array($queryBD)){
							$getStatus = $row['STATUS'];
							$fullname = $row['FAMILY_NAME'].", ".$row['GIVEN_NAME']." ".$row['MIDDLE_NAME'];
						}
						
						while($row2 = mysqli_fetch_array($queryPF)){
							$application_prog = $row2['TYPE_OF_PROGRAM'];
							$application_prog_other = $row2['TYPE_OF_PROG_OTHER'];
							$application_form = $row2['TYPE_OF_FORM'];
							$application_form_other = $row2['TYPE_OF_FORM_OTHER'];
						}
					?>
					<br>
					<p>
						<span><b>Full Name:</b></span> <span> <?php echo $fullname?></span>
					</p>
					<p>
						<span><b>Type of Program: </b></span> 
						<span>
							<?php
								if($application_prog == 'Others'){
									echo 'Bilateral';
								}else{
									echo $application_prog;
								}
							?>
						</span>
					</p>
					<p>
						<span><b>Type of Form: </b></span>
						<span>
							<?php  
								if($application_prog == 'Others'){
									echo $application_prog_other;
								}else{
									if($application_form == 'OTHERS'){
										echo $application_form_other;
									}else{
										echo $application_form;
									}
								}
							?>
						</span>
					</p>
					<p>
						<span><b>Chosen Country: </b></span><span><?php echo $country?></span>
					</p>
					<p>
						<span><b>Chosen University: </b></span><span><?php echo $university?></span>
					</p>
					<p>
						<span><b>Transcript of Record: </b></span>
						<?php echo "<a href=showTOR.php?numnum=".urldecode($getStudentID)." target='_blank'>".$torScan."</a>"?>
					</p>
					<p>
						<span><b>Status: </b></span>
							<select name="status" id="status" onChange="func(this);">
								<option value=" ">Choose a Status</option>
								<option value="Qualified" id="Qualified">Qualified</option>
								<option value="Not-Qualified" id="Not-Qualified">Not-Qualified</option>
								<option value="On-Going" id="On-Going">On-going</option>
								<option value="Completed" id="Completed">Completed</option>
							</select>
					</p>
					<p>
						<div id="conf" class="col-xs-4">
							<button type="submit" name="update_status" class="btn btn-primary" >Confirm</button>
						</div>
						<div id="backuu" class="col-xs-4">
							<input type="submit" class="btn btn-primary" formaction="administrator.php" value="Back"/>
						</div>
					</p>
					<br>
					<div id="cert">
						<div class="container-fluid">
							<p>
								<div>
									<div class="col-xs-6">
										<span><b>Upload a Certificate of Competion</b></span>
									</div>
									<div class="col-xs-6">
										<span><b>Student Access Limitation</b></span>
									</div>
								</div>
							</p>
							<br>
							<p>
								<div>
									<div class="col-xs-5">
										<input type="date" clas="form-control" name="expirationCert"/>
									</div>
									<div class="col-xs-5">
										<input type="file" name="certificate"/>
									</div>
								</div>
							</p>
						</div>
						<br>
						<p id="subcert">
							<div class="form-group row col-xs-4 col-xs-offset-1">
								<input type="submit" value="Submit" name="subCert" class="btn btn-primary">
							</div> 
						</p>
					</div>
					<div id="dateStarted">
						<div class="container-fluid">
							<p>
								<span><b>What Date He/She started: </b><input type="date" name="dateStrat"/></span>
							</p>
						</div>
						<br>
						<p id="ongoindbtn">
							<div class="form-group row col-xs-4 col-xs-offset-1">
								<input type="submit" value="Submit" name="goinbtn" class="btn btn-primary">
							</div> 
						</p>
					</div>
				</div>
				<br>
			</div> 
		</form>       
	</body>
	<script>
		$(document).ready(function(){
			$("#certUp").hide();
			$("#cert").hide();
			$("#subcert").hide(); 
			$("#dateStarted").hide();
		});
	
		 function func(sel) {
		     var stat = (sel.options[sel.selectedIndex]).text;

		   	if(stat == 'Approved'){
				$("#send").show();
				$("#backuu").hide();
				$("#conf").hide();
				$("#subcert").hide();
		  	}else if(stat == 'Completed'){
				$("#send").hide();
				$("#backuu").hide();
				$("#cert").show();
				$("#conf").hide();
				$("#subcert").show();
			}else if(stat === 'On-going'){
				$("#send").hide();
				$("#backuu").hide();
				$("#cert").hide();
				$("#conf").hide();
				$("#subcert").hide();
				$("#dateStarted").show();
			
			}else{
				$("#send").hide();
				$("#backuu").show();
				$("#conf").show();
				$("#cert").hide();
		  	}
		}
		// var setStatus = "<?php echo $getStatus?>";
		// $('#status option[value='+setStatus+']').prop('selected', true);
		// if(document.getElementById('Completed').selected == true){
		// 	$("#cert").show();
		// 	$("#backuu").hide();
		// 	$("#conf").hide(); 
		// }
	</script>
</html>
<script>
$(document).ready(function(){
	
 
	function load_unseen_notification(view = '')
	{
		$.ajax({
			url:"fetch_comment.php",
			method:"POST",
			data:{view:view},
			dataType:"json",
			success:function(data)
			{
				$('#notif-down').html(data.notification);
				if(data.unseen_notification > 0)
				{
				$('.count').html(data.unseen_notification);
				}
			}
		});
	}
 
	load_unseen_notification();
	
	$(document).on('click', '#notif', function(){
		$('.count').html('');
		load_unseen_notification('yes');
	});
 
});
</script>