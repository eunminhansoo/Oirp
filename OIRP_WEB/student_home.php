<?php
	include 'student_home_process.php';
	$get_studentID = $_SESSION['student_id_session'];
	$sql_query = "SELECT * FROM student WHERE STUDENT_ID = '$get_studentID' ";
	$db_query = mysqli_query($conn, $sql_query);
	while($row = mysqli_fetch_array($db_query)){
		$familyName = $row['FAMILY_NAME'];
		$givenName = $row['GIVEN_NAME'];
		$status = $row['STATUS'];
		$gender = $row['GENDER'];

		if($gender == "Female")
		{
			$gen = "Ms";
		}else{
			if($gender == "Male")
			{
				$gen = "Mr";
			}
		}
	}
?>
<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Welcome to OIRP</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/custom.css">
        <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap-theme.css">
        <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.css">
		<!--<link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/stylus.css">-->
		<link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/color_3.css">
		<link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/style1.css">
		<link rel="icon" href="img/ust.png" type="image/png" sizes="196x196">
	</head>
	
	<body>
		<script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
		<script src="bootstrap-3.3.7-dist/js/jquery-3.3.1.min.js"></script>

		<div class="header">
			<img src='img/logo.png' height=auto>
		</div>

		<!--HOVER LIST STARTO-->
		<div id="mySidenav" class="sidenav">
			<a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><span class="glyphicon glyphicon-remove"></span></a>
			<a href="#">Status <?php echo $status ?></a>
			<a href="#">My Application</a>
			<a href="#">Clients</a>
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
									<ul class="nav navbar-nav navbar-right" >
										<li><a href="#home"></a></li>
										<li><a href="#status"></a></li>
										<li><a href="#view"></a></li>
										<li><a href="#upload">Home</a></li>
										<li><a><span class="bordernavbar"></span><span><?php echo $familyName.", ".$givenName ?></span></a></li>
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

		<!--APPLICATION BOX START-->
		<div class="col-xs-6">
			<div class="boxxes">
				<div class="appText">
					<span class="txtStyle" >APPLICATION FORM</span>
					<a class="cms"><span class="glyphicon glyphicon-triangle-bottom"></span></a>
					<div class="appietxt">
						<span><?php echo "$gen".". ".$familyName?> Application form</span>
					</div>
					<div class="appietxt1">
						<a class="btn btn-secondary" id="btnClicksu">
							<span>Upload Application form /</span>
							<span class="caf"> Continue Application form</span>
						</a>
					</div>
				</div>
			</div>
		</div>
		<!--APPLICATION BOX END-->

		<!--APPLICATION BOX START-->
		<div class="col-xs-6" id="uploadbox">
			<div class="boxxes">
				<div class="exus">
					<a class="btn btn-secondary" id="toggelexus"> <span class="glyphicon glyphicon-remove"></span></a>
				</div>
				<div class="appText">
					<div class="">
						<input type="file" name="pdfScan" id="pdfscan" disabled>
					</div>
				</div>
			</div>
		</div>
		<!--APPLICATION BOX END-->


		<div class="content col-sm-8 margin-left">
			<h2>About UST</h2>
			<p>While the University of Santo Tomas holds the distinction of being Asia's oldest existing university, its age is coupled with its preeminence in Philippine education. Not only does it boast of several firsts in the different realms of education, it also has administrators and faculty members who are holding leadership positions in the Philippines' policy-making bodies and professional organizations, helping influence policies for the betterment of the society in general.</p>
		</div>
		<div class="content col-sm-8 margin-left">
			<h2>About OIRP</h2>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
		</div>
		<div class="menu_white2" >
			<div class="col-sm-5">
				<img src="img/logo.png" class="img-responsive" height=50px>
			</div>
			<div class="col-sm-4 ">
				<p>Office of International Relations and Programs</p>
				<p>Espana Blvd., Sampaloc, Manila, Philippines 1015</p>
				<p>406-1611 local 8658</p>
				<p>international@ust.edu.ph</p>
			</div>
		</div>
		<script>
		$(document).ready(function(){
			$('#uploadbox').hide();

			$('#btnClicksu').click(function(){
				$('#uploadbox').show();
				$('#pdfscan').prop('disabled', false);
			});
			$('#toggelexus').click(function(){
				$('#uploadbox').hide();
				$('#pdfscan').prop('disabled', true);
			});
		});
	</script>
	</body>
	<script src="bootstrap-3.3.7-dist/js/jquery-1.11.0.min.js"></script>
	<script src="bootstrap-3.3.7-dist/js/jquery.superslides.min.js"></script>
	<script src="bootstrap-3.3.7-dist/js/jquery.isotope.min.js"></script>
	<script src="bootstrap-3.3.7-dist/js/jquery.nicescroll.js"></script>
	<script src="bootstrap-3.3.7-dist/js/style.js"></script>
	
</html>