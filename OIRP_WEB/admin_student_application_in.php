<?php
    include 'database_connection.php';

    $getStudentID = $_GET['studentName'];

    $sql = "SELECT PDF_IMG FROM upload_pdf WHERE STUDENT_ID = '$getStudentID'";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_array($result)){
        $file = $row['PDF_IMG'];
    }
    
    $query = "SELECT * FROM student WHERE STUDENT_ID= '$getStudentID'";
    $queryBD = mysqli_query($conn, $query);
    $query1 = "SELECT * FROM educ_background_inbound WHERE STUDENT_ID= '$getStudentID'";
    $queryCU = mysqli_query($conn, $query1);   
	$query2 = "SELECT * FROM proposed_field_study_in_bila WHERE STUDENT_ID= '$getStudentID'";
    $queryPF = mysqli_query($conn, $query2);

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
					$ins_query = "INSERT INTO `admin_college` (`STUDENT_COUNT`, `STUDENT_ID`, `PROPOSED_PROGRAM`, `COURSE_1`, `COURSE_2`, `COURSE_3`, `COURSE_4`, `COURSE_5`) VALUES (' ', '$getStudentID', ' ', ' ', ' ', ' ', ' ', ' ')";
					mysqli_query($conn, $ins_query);
				}
			}else{
				$del_query = "DELETE FROM admin_college WHERE STUDENT_ID = '$getStudentID'";
				mysqli_query($conn, $del_query);
			}   
		}
	}

	$sql = "select college from colleges where id > 1 order by college asc";
	$result = mysqli_query($conn, $sql);
	
	$col='';
	while($row = mysqli_fetch_array($result)) {
		$col .=  "<option value='".$row['college']."'>".$row['college']."</option>";
	}

	if(isset($_POST['send'])){
		$college[] = $_POST['college'];
		$status = $_POST['status'];
		echo $college;

		// $setStat_query = "UPDATE student SET STATUS = '$status'";
		// $setStat_db = mysqli_query($conn, $setStat_query);
		// $setColl_query = "INSERT INTO admin_college
		// (
		// 	STUDENT_COUNT,
		// 	STUDENT_ID,
		// 	PROPOSED_PROGRAM,
		// 	COURSE_1,
		// 	COURSE_2,
		// 	COURSE_3,
		// 	COURSE_4,
		// 	COURSE_5
		// ) 
		// VALUES (
		// 	' ',
		// 	'$getStudentID',
		// 	' ',
		// 	'',
		// 	'',
		// 	'',
		// 	'',
		// 	''
		// )";

	}
?>
<html>
	<head>
	<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width = device-width, initial-scale = 1">
        <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/custom.css">
        <link rel="icon" href="img/ust.png" type="image/png" sizes="196x196">
	</head>
	<body>
		<script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
		<script src="bootstrap-3.3.7-dist/js/jquery-3.3.1.min.js"></script>
		
		<form method="post">
			<div class="container-fluid">
				<div class="col-sm-7">
					<?php 
						echo "<embed src='images/".$file."' width='100%' height='100%'>";
					?>
				</div>
				<div class="col-sm-5">
					<p style="margin-top: 80px;"><h2>Basic Information</h2></p>
					<?php
						while($row = mysqli_fetch_array($queryBD)){
							$fullname = $row['FAMILY_NAME'].", ".$row['GIVEN_NAME']." ".$row['MIDDLE_NAME'];
						}
						while($row1 = mysqli_fetch_array($queryCU)){
							$application_prog = $row1['TYPE_OF_PROGRAM'];
							$application_prog_other = $row1['TYPE_OF_PROG_OTHER'];
							$application_form = $row1['TYPE_OF_FORM'];
							$application_form_other = $row1['TYPE_OF_FORM_OTHER'];
							$country = $row1['COUNTRY_ORIGIN'];
							$university = $row1['HOME_UNIV_IN_BILA'];
						}
					?>
					<br>
					<p>
						<span><b>Full Name:</b></span> <span> <?php echo $fullname?></span>
					</p>
					<p>
						<span><b>Type of Program:</b></span> 
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
						<span><b>Type of Form:</b></span>
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
						<span><b>Country of Origin: </b></span> <span><?php echo $country?></span> 
					</p>
					<p>
						<span> <b>Home University: </b></span> <span> <?php echo $university?></span> 
					</p>
					<p>
						<span><b>Status: </b></span>
						<span>
							<select name="status[]" id="status" onChange="func(this);">
								<option value="Pending">Pending</option>
								<option value="Approved">Approved</option>
								<option value="Denied">Denied</option>
								<option value="On-Going">On-going</option>
								<option value="Completed">Completed</option>
							</select>
						</span>
					</p>
					<br>
					<p>
						<div id="conf" class="col-xs-4">
							<button type="submit" name="update_status" class="btn btn-primary" >Confirm</button>
						</div>
						<div id="backuu" class="col-xs-4">
							<input type="submit" class="btn btn-primary" formaction="administrator.php" value="Back" />
						</div>
					</p>
				</div>
				<?php
					while($pf_row = mysqli_fetch_array($queryPF)){
						$pf_COURSE_1_INBOUND = $pf_row['COURSE_1_INBOUND'];
						$pf_COURSE_2_INBOUND = $pf_row['COURSE_2_INBOUND'];
						$pf_COURSE_3_INBOUND = $pf_row['COURSE_3_INBOUND'];
						$pf_COURSE_4_INBOUND = $pf_row['COURSE_4_INBOUND'];
						$pf_COURSE_5_INBOUND = $pf_row['COURSE_5_INBOUND'];
					}
				?>
				<div id="send" class="col-sm-5">
					<div class="container-fluid">
						<div class="form-group row">
							<br>
							<p><span><b>College: </b></span></p>
							<p><select name="college" id="college" size=15 multiple>
								</select>
							</p>
						</div>	
						<div class="form-group row">
							<input type="submit" value="Send" name="send" class="btn btn-primary">
						</div>
							<!--<div>
								<p>
									<b><span>Course 1: </span></b><span><?php //echo $pf_COURSE_1_INBOUND?></span>
								</p>
								<div class="">
									<select name="course1" id="college">

									</select>
								</div>
							</div>
							<div>
								<p>
									<b><span>Course 2: </span></b><span><?php //echo $pf_COURSE_2_INBOUND?></span>
								</p>
								<select name="course2" id="college1">

								</select>
							</div>
							<div>
								<p>
									<b><span>Course 3: </span></b><span><?php //echo $pf_COURSE_3_INBOUND?></span>
								</p>
								<select name="course3" id="college2">

								</select>
							</div>
							<div>
								<p>
									<b><span>Course 4: </span></b><span><?php //echo $pf_COURSE_4_INBOUND?></span>
								</p>
								<select name="course4" id="college3">

								</select>
							</div>
							<div>
								<p>
									<b><span>Course 5: </span></b><span><?php //echo $pf_COURSE_5_INBOUND?></span>
								</p>
								<select name="course5" id="college4">

								</select>
							</div>-->
					</div>
				</div>
			</div>
		</form>
	</body>
	<script>
		$(document).ready(function(){
			var val = "<?php echo $col ?>";
			$("#college").empty().append(val);
			$("#send").hide();
		});

		function func(sel) {
		    var stat = (sel.options[sel.selectedIndex]).text;

		  	if(stat === 'Approved'){
				$("#send").show();
				$("#backuu").hide();
				$("#conf").hide();
		  	} else{
				$("#send").hide();
				$("#backuu").show();
				$("#conf").show();
		  	}
		}
	</script>
</html>