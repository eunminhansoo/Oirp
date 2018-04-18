<?php
    include 'database_connection.php';

    $getStudentID = $_GET['studentName'];
    
    $sql = "SELECT * FROM upload_pdf WHERE STUDENT_ID = '$getStudentID'";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_array($result)){
        $file = $row['PDF_IMG'];
		$torScan = $row['TOR_SCAN'];
    }
    $query = "SELECT * FROM student WHERE STUDENT_ID= '$getStudentID'";
    $queryBD = mysqli_query($conn, $query);
    $query1 = "SELECT * FROM country_univ_outbound WHERE STUDENT_ID = '$getStudentID'";
    $queryCU = mysqli_query($conn, $query1);   
	$query2 = "SELECT * FROM proposed_field_study WHERE STUDENT_ID = '$getStudentID' "; 
	$queryPF = mysqli_query($conn, $query2);        

	if(isset($_POST['update_status'])){
		$status = $_POST['status'];

		$stat_query = "UPDATE student SET STATUS = '$status' WHERE STUDENT_ID = '$getStudentID' ";
		$stat_db = mysqli_query($conn, $stat_query);
		
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
        <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/custom.css">
        <link rel="icon" href="img/ust.png" type="image/png" sizes="196x196">
	</head>
	<body>
		<script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
		<script src="bootstrap-3.3.7-dist/js/jquery-3.3.1.min.js"></script>
		<div class="">
		<div class="header">
			<img src='img/logo.png' height=auto class="img-responsive">
		</div>
		
		<!--HOVER LIST STARTO-->
		<div id="mySidenav" class="sidenav">
			<a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><span class="glyphicon glyphicon-remove"></span></a>
			<a href="graph.php">Statistics</a>
			<a href="approved_students.php">Approved Students</a>
			<a href="qualified_students.php">Qualified Students</a>
			<a href="index.php" class="logoutbtn" ><span class="glyphicon glyphicon-log-out">  Logout</span></a>
		</div>
		<!--HOVER LIST ENDOO-->
		
		<!--NAV BAR START-->
		<div>
			<div class="menu_white2">
				<div class="navsticky">
					<nav class="navbar navbar-topaz" role="navigation">
						<div class="topnav">
							<div class="container">
								<div class="navbar-header">
									<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
									<a class="navbar-brand" href="#"></a>
								</div>
								<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
									<ul class="nav navbar-nav navbar-left">
                                        <!-- font style: Bookman Old Style-->
                                        <li><a><span class="styletext"><h4>STUDENT APPLICATION FORM</h4></span></a></li>
                                    </ul>
									<ul class="nav navbar-nav navbar-right" >
										<li><a href="administrator.php">Home</a></li>
										<li><a><span class="bordernavbar"></span><span><?php //echo $familyName.", ".$givenName ?></span></a></li>
										<li>
										<a href="#notifications-panel" class="nav-link dropdown-toggle" data-toggle="dropdown">
          									<i data-count="2" class="oi oi-bell notification-icon" aria-label="Nofitication centre"></i>
        								</a>
										<!--  	<a href="administrator_notification.php" class="dropdown-toggle" data-toggle="dropdown">
												<span class="bordernavbar"></span>
												<span class="label label-pill label-danger count" style="border-radius:10px;"></span> 
												<span class="glyphicon glyphicon-bell" style="font-size:18px;"></span>
											</a> -->
										</li>
										<li>
											<a href="#" class="btn btn-secondary" id="menu-toggle">
											<span class="bordernavbar"></span>
											<span class="glyphicon glyphicon-align-justify" style="font-size:20px;cursor:pointer" onclick="openNav()"></span>
											</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</nav>
				</div>
			</div>
		</div>
		<!--NAV BART END-->

		<form method="post">
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
							$fullname = $row['FAMILY_NAME'].", ".$row['GIVEN_NAME']." ".$row['MIDDLE_NAME'];
						}
						while($row1 = mysqli_fetch_array($queryCU)){
							$country = $row1['COUNTRY_OUT'];
							$university = $row1['UNIVERSITY_OUT'];
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
								<option value="Qualified">Qualified</option>
								<option value="Not-Qualified">Not-Qualified</option>
								<option value="On-Going">On-going</option>
								<option value="Completed">Completed</option>
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
					<div id="certUp" class="break">
						<div class="col-xs-3">
							<span><b>Upload Certificate of Completion</b></span>
						</div>
						<div class="col-xs-3">
							<input type="file" name="certfile" id="certfile"/>
						</div>
					</div>
				</div>
				<br>
			</div> 
		</form>       
	</body>
	<script>
		$(document).ready(function(){
			$("#certUp").hide();
		});
	
		 function func(sel) {
		     var stat = (sel.options[sel.selectedIndex]).text;

		   	if(stat === 'Completed'){
		 		$("#certUp").show();
		   	} else{
		 		$("#certUp").hide();
		   	}
		}
	</script>
</html>