<?php
	
	error_reporting(0);
	
    $getStudentID = $_GET['studentName'];
	include 'admin_student_application_in_processs.php';

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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

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
								<li><a href="outboundStatistics.php">Outbound Data Statistics</a></li>
								<li><a href="InboundStatistics.php">Inbound Data Statistics</a></li>
								<li><a href="outboundComparison.php">Outbound Comparison</a></li>
								<li><a href="inboundComparison.php">Inbound Comparison</a></li>
							</ul>
						</li>
						<li class="dropdown" style="padding-right: 30px;">
							<a href="#" class="dropdown-toggle" id="notif" data-toggle="dropdown"><span class="label label-pill label-danger count" style="border-radius:10px;"></span><span class="glyphicon glyphicon-bell" style="font-size:18px;"></span></a>
							<ul class="dropdown-menu" id="notif-down"></ul>
						</li>
						<li class="dropdown" style="border-left: 1px solid #333333; padding-left: 30px;">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">OIRP<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="index.php" class="logoutbtn" >Logout <span class="glyphicon glyphicon-log-out"></span></a></li>
							</ul>
						</li>					
					</ul> 
				</div>
			</div>
		</nav>
		<!--NAV BART END-->
		<form method="post" enctype="multipart/form-data">
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
							$getStatus = $row['STATUS'];
							$fullname = $row['FAMILY_NAME'].", ".$row['GIVEN_NAME']." ".$row['MIDDLE_NAME'];
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
						<span><b>Transcript of Record: </b></span>
						<?php 
							if($torScan){
								echo "<a href=showTOR.php?numnum=".urldecode($getStudentID)." target='_blank'>".$torScan."</a>";
							}else{
								$torScan ="";
							}
						?>
					</p>
					<p>
						<span><b>Status: </b></span>
						<span>
							<select name="status" id="status" onChange="func(this);">
								<option value=" ">Choose a Status</option>
								<option value="Pending" id="Pending">Pending</option>
								<option value="Approved" id="Approved">Approved</option>
								<option value="Denied" id="Denied">Denied</option>
								<option value="On-Going" id="On-going">On-going</option>
								<option value="Completed" id="Completed">Completed</option>
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
				 <div id="send" class="col-sm-5">
					<div class="container-fluid">
						<div>
							<p>
								<b><span>Course 1: </span></b><span><?php echo $pf_COURSE_1_INBOUND?></span>
							</p>
							<div class="">
								<select name="course1" id="college">

								</select>
							</div>
						</div>
						<div>
							<p>
								<b><span>Course 2: </span></b><span><?php echo $pf_COURSE_2_INBOUND?></span>
							</p>
							<select name="course2" id="college1">

							</select>
						</div>
						<div>
							<p>
								<b><span>Course 3: </span></b><span><?php echo $pf_COURSE_3_INBOUND?></span>
							</p>
							<select name="course3" id="college2">

							</select>
						</div>
						<div>
							<p>
								<b><span>Course 4: </span></b><span><?php echo $pf_COURSE_4_INBOUND?></span>
							</p>
							<select name="course4" id="college3">

							</select>
						</div>
						<div>
							<p>
								<b><span>Course 5: </span></b><span><?php echo $pf_COURSE_5_INBOUND?></span>
							</p>
							<select name="course5" id="college4">

							</select>
						</div>
						<div class="form-group row">
							<input type="submit" value="Send" name="send" class="btn btn-primary">
						</div> 
					</div>
				</div>
				<br>
				<div id="cert" class="col-sm-5">
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
			</div>
		</form>
	</body>
	<script>
		$(document).ready(function(){
			var val = "<?php echo $col ?>";
			$("#college").empty().append(val);
			$("#college1").empty().append(val);
			$("#college2").empty().append(val);
			$("#college3").empty().append(val);
			$("#college4").empty().append(val);
			$("#send").hide();
			$("#cert").hide();
			$("#subcert").hide();

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
			
			var setStatus = "<?php echo $getStatus?>";
			$('#status option[value='+setStatus+']').prop('selected', true);
		 
		});

		function func(sel) {
		    var stat = (sel.options[sel.selectedIndex]).text;

		  	if(stat === 'Approved'){
				$("#send").show();
				$("#backuu").hide();
				$("#conf").hide();
				$("#subcert").hide();
		  	}else if(stat === 'Completed'){
				$("#send").hide();
				$("#backuu").hide();
				$("#cert").show();
				$("#conf").hide();
				$("#subcert").show();
			}else{
				$("#send").hide();
				$("#backuu").show();
				$("#conf").show();
				$("#cert").hide();
		  	}
		}

</script>