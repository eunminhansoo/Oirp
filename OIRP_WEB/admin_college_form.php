<?php
    include 'database_connection.php';
	include 'logout.php';
    session_start();
	if($_SESSION['collegeName'] != 'college'){
		header("Location: index.php");
	}
    $getStudentID = $_GET['studentName'];
	$decryptStudentid = base64_decode($getStudentID);
	$course = $_GET['course'];
	$college = $_SESSION['collegeNames'];

	$stu_query = "SELECT * FROM student WHERE STUDENT_ID = '$decryptStudentid'";
	$stu_db = mysqli_query($conn, $stu_query);
	while($stuRow = mysqli_fetch_array($stu_db)){
		$stu_status = $stuRow['STATUS'];
	}
	$get_query = "SELECT * FROM admin_college WHERE STUDENT_ID = '$decryptStudentid' AND COURSE = '$course'";
	$set_query = mysqli_query($conn, $get_query);
	while($rroww = mysqli_fetch_array($set_query)){
		$setCourse = $rroww['COURSE'];
	}
    $sql = "SELECT PDF_IMG FROM upload_pdf WHERE STUDENT_ID = '$decryptStudentid'";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_array($result)){
        $file = $row['PDF_IMG'];
    }
    
    $query = "SELECT * FROM student WHERE STUDENT_ID= '$decryptStudentid'";
    $queryBD = mysqli_query($conn, $query);
    $query1 = "SELECT * FROM educ_background_inbound WHERE STUDENT_ID= '$decryptStudentid'";
    $queryCU = mysqli_query($conn, $query1);  

	$query2 = "SELECT * FROM proposed_field_study_in_bila WHERE STUDENT_ID= '$decryptStudentid'";
    $queryPF = mysqli_query($conn, $query2); 
    
    while($row = mysqli_fetch_array($queryBD)){
    	$familyName = $row['FAMILY_NAME'];
    	$givenName = $row['GIVEN_NAME'];
    	
		$fullname = $row['FAMILY_NAME'].", ".$row['GIVEN_NAME']." ".$row['MIDDLE_NAME'];
	}
		
	if(isset($_POST['update_status'])){

		$status = $_POST['status']; 
		$query2 = "UPDATE admin_college SET STATUS = '$status'
		WHERE STUDENT_ID = '$getStudentID' AND COURSE = '$course'";

		
		//insert to comment
		$query_notification = "INSERT INTO notification(STUDENT_COUNT,
		STUDENT_ID,
		LASTNAME,
		FIRSTNAME,
		COMMENT_STATUS,
		APPLICATION_FORM,
		COLLEGE,
		COURSE,
		STATUS
		) VALUES (
			'',
			'$decryptStudentid',
			'$familyName',
			'$givenName',
			'',
			'',
			'$college',
			'$course',
			'$status'
		)";
		
    	$comment = mysqli_query($conn, $query_notification);
    	//end of insert comment
    	
    	//start of audit_log
		date_default_timezone_set('Asia/Manila');
		$date_college = date('Y-m-d/H:i:s');
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
			'$decryptStudentid',
			'$familyName',
			'$givenName',
			'',
			'$college',
			'$course',
			'$status',
			'$date_college'
			)";
    	mysqli_query($conn, $query_log1);
    	
		$query_db = mysqli_query($conn, $query2);

		// UPDATE THE STUDENT TABLE
		if($status = 'Qualified'){
			$std_query = "UPDATE student SET STATUS = '$status' WHERE STUDENT_ID = '$getStudentID'";
			mysqli_query($conn, $std_query);
		}
	}        

?>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap-theme.css">
        <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/custom.css">
        <link rel="icon" href="img/ust.png" type="image/png" sizes="196x196">
	</head>
	<body>
		<script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
		<script src="bootstrap-3.3.7-dist/js/jquery-3.3.1.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	    <script src="bootstrap-3.3.7-dist/js/search.js"></script>
		<div class="header">
			<img src='img/logo.png' height=auto class="img-responsive">
		</div>
		<!--NAV BAR START-->
		<nav class="navbar" id="bar">
			<div class="container-fluid">
				<div class="col-sm-5" style="padding-top: 0.5%; padding-bottom: 0.5%;">
					<input type="text" id="myInput" onkeyup="search()" placeholder="Search" class="form-control">
				</div>
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
						<li><a href="administrator_college.php" style="padding-right: 30px;">Home</a></li>
						<li class="dropdown" style="padding-right: 30px;">
							<a href="#" class="dropdown-toggle" id="notif" data-toggle="dropdown"><span class="label label-pill label-danger count" style="border-radius:10px;"></span><span class="glyphicon glyphicon-bell" style="font-size:18px;"></span></a>
							<ul class="dropdown-menu" id="notif-down"></ul>
						</li>
						<li class="dropdown" style="border-left: 1px solid #333333; padding-left: 30px;">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">College<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li style="text-align: center"><form method="post"><button name="logoutbtn" class="btn-logout float-center">Logout <span class="glyphicon glyphicon-log-out"></span></button></form></li>
							</ul>
						</li>
					</ul> 
				</div>
			</div>
		</nav>
		<!--NAV BART END-->
		<div class="col-xs-5">
			<?php 
				echo "<embed src='images/".$file."' width='800px' height='100%'>";
			?>
		</div>
		<div class="col-xs-push-3 col-xs-5">
			<h2>Basic Information</h2>
				<?php
					
					while($row1 = mysqli_fetch_array($queryCU)){
						$application_prog = $row1['TYPE_OF_PROGRAM'];
						$application_prog_other = $row1['TYPE_OF_PROG_OTHER'];
						$application_form = $row1['TYPE_OF_FORM'];
						$application_form_other = $row1['TYPE_OF_FORM_OTHER'];
						$country = $row1['COUNTRY_ORIGIN'];
						$university = $row1['HOME_UNIV_IN_BILA'];
					}
				?>
				<div>
					<span><b>Full Name:</b></span> <span> <?php echo $fullname?></span>
				</div>
				<div>
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
				</div>
				<div>
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
				</div>
				<div>
					<span><b>Country of Origin:</b></span><span><?php echo $country?></span>
				</div>
				<div>
					<span><b>Home University:</b></span><span><?php echo $university?></span>
				</div>
				<div>
					<span><b>Course: </b></span><span><?php echo $setCourse?></span>
				<div>
					<form method="post">
						<div>
							<select name="status" id="status">
								<option value=" ">Choose a Status</option>
								<option value="Qualified">Qualified</option>
								<option value="Not-Qualified">Not-Qualified</option>
							</select>
						</div>
						<div class="col-xs-9">
							<div class="col-xs-6">
								<button type="submit" name="update_status" class="btn btn-primary" >CONFIRM</button>
							</div>
							<div class="col-xs-4">
								<input type="submit" class="btn btn-primary" value="Back" formaction="administrator_college.php" />
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
	<script src="bootstrap-3.3.7-dist/js/jquery-1.11.0.min.js"></script>
	<script src="bootstrap-3.3.7-dist/js/jquery.superslides.min.js"></script>
	<script src="bootstrap-3.3.7-dist/js/jquery.isotope.min.js"></script>
	<script src="bootstrap-3.3.7-dist/js/jquery.nicescroll.js"></script>
	<script src="bootstrap-3.3.7-dist/js/style.js"></script>
	<script>
		$(document).ready(function(){
			//$('#tbl_student_in').DataTable(); 
			function load_unseen_notification(view = '')
			{
				$.ajax({
					url:"fetch_notif.php",
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

		function search() {
			// Declare variables 
			var input, filter, table, tr, td, i;
			input = document.getElementById("myInput");
			filter = input.value.toUpperCase();
			table_in = document.getElementById("tbl_student_in");
			tr_in = table_in.getElementsByTagName("tr");

			// Loop through all table rows, and hide those who don't match the search query
			for (i = 0; i < tr_in.length; i++) {
				td = tr_in[i].getElementsByTagName("td")[0];
				td1 = tr_in[i].getElementsByTagName("td")[1];
				td2 = tr_in[i].getElementsByTagName("td")[2];
				td3 = tr_in[i].getElementsByTagName("td")[3];
				td4 = tr_in[i].getElementsByTagName("td")[4];
				if (td) {
					if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
						tr_in[i].style.display = "";
					} else {
						if (td1) {
							if (td1.innerHTML.toUpperCase().indexOf(filter) > -1) {
								tr_in[i].style.display = "";
							} else {
								if(td2){
									if (td2.innerHTML.toUpperCase().indexOf(filter) > -1) {
										tr_in[i].style.display = "";
									} else{
										if(td3){
											if(td3.innerHTML.toUpperCase().indexOf(filter) > -1){
												tr_in[i].style.display = "";
											} else{
												if(td4){
													if(td4.innerHTML.toUpperCase().indexOf(filter) > -1){
														tr_in[i].style.display = "";
													} else{
														tr_in[i].style.display = "none";
													}
												}
											}
										}
									}
								}
							}
						}
					}
				} 
			}
		}
		
	</script>
	<script>
		var setStatus = "<?php echo $stu_status?>";
		if(setStatus == 'Approved'){
			$('#status option[value=' ']').prop('selected', true);
		}else{
			$('#status option[value='+setStatus+']').prop('selected', true);
		}
	</script>
</html>