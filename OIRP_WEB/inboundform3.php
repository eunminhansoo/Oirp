<?php
	include 'inbound_application.php';
	
	$familyName;
	$givenName;
	
	error_reporting(0);
	
	$sql = "select distinct country from partner_universities order by country asc";
	$result = mysqli_query($conn, $sql);
	
	$res;
	while($row = mysqli_fetch_array($result)) {
		$res .=  "<option value='".$row["country"]."'>".$row["country"]."</option>";
	}
	
?>

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width = device-width, initial-scale = 1">        
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
			<a href="index.php"><img src='img/logo.png' height=auto class="img-responsive"></a>	
		</div>
		
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
						<li><a href="student_home.php">Home</a></li>
						<li class="dropdown" style="border-left: 1px solid #333333; padding-left: 30px;">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $familyName.", ".$givenName ?><span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li style="text-align: center"><form method="post"><button name="logoutbtn" class="btn-logout float-center">Logout <span class="glyphicon glyphicon-log-out"></span></button></form></li>									          
							 </ul>
						</li>
					</ul> 
				</div>
			</div>
		</nav>
		<div class="container-fluid">
			<nav class="col-sm-2 sidebar">
				<ul class="nav nav-stacked">
					<li><a href="inboundform1.php">Personal Information</a></li>
					<li><a href="inboundform2.php">Educational Backround</a></li>
					<li class="active"><a href="inboundform3.php">Proposed Field of Study</a></li>
					<li><a href="inboundform4.php">English Proficiency & Medical Information</a></li>
					<li><a href="inboundform5.php">Expectations from the Program</a></li>
				</ul>
			</nav>

			<div class="col-sm-9 container-fluid">
				<form method="post">
					<div class="form-group row">
						<div class="col-sm-10">
							<label>Proposed Program</label> (Refer to the <a onclick="window.open('http://www.ust.edu.ph/academics/programs/')">UST website </a>)
							<input type="text" name="proposedProg" id="proposedProg" class="form-control" pattern="[^<>=]{1,45}" maxlength="45" required value="<?php echo $getSel_PROPOSED_PROG_INBOUND?>">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-10">
							<label>Courses to be taken at UST</label> 
							<div class="input-group">
							    <span class="input-group-addon">1.</span>
							    <input type="text" name="course1" id="course1" class="form-control" pattern="[^<>=]{1,45}" maxlength="45" value="<?php echo $getSel_COURSE_1_INBOUND?>">
							</div>
						</div>
						<div class="col-sm-10">
							<div class="input-group">
							    <span class="input-group-addon">2.</span>
							    <input type="text" name="course2" id="course2" class="form-control" pattern="[^<>=]{1,45}" maxlength="45" value="<?php echo $getSel_COURSE_2_INBOUND?>">
							</div>
						</div>
						<div class="col-sm-10">
							<div class="input-group">
							    <span class="input-group-addon">3.</span>
							    <input type="text" name="course3" id="course3" class="form-control" pattern="[^<>=]{1,45}" maxlength="45" value="<?php echo $getSel_COURSE_3_INBOUND?>">
							</div>
						</div>
						<div class="col-sm-10">
							<div class="input-group">
							    <span class="input-group-addon">4.</span>
							    <input type="text" name="course4" id="course4" class="form-control" pattern="[^<>=]{1,45}" maxlength="45" value="<?php echo $getSel_COURSE_4_INBOUND?>">
							</div>
						</div>
						<div class="col-sm-10">
							<div class="input-group">
							    <span class="input-group-addon">5.</span>
							    <input type="text" name="course5" id="course5" class="form-control" pattern="[^<>=]{1,45}" maxlength="45" value="<?php echo $getSel_COURSE_5_INBOUND?>">
							</div>
						</div>
					</div>
					
					<div class="form-group row">
						<div class="col-sm-3">
							<label>Semester to Study</label>
							<select name="sem" class="form-control">
								<option value="1st Semester">1st Semester (August to December)</option>
								<option value="2nd Semester">2nd Semester (January to May)</option>
								<option value="Special Semester">Special Semester (June to July)</option>
							</select>
						</div>
						<div class="col-sm-7">
							<label>Research Topic (if applicable)</label>
							<input type="text" name="research" id="research" class="form-control" pattern="[^<>=]{1,50}" maxlength="50" value="<?php echo $getSel_RESEARCH_TOPIC_INBOUND?>">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-5">
							<label>Reason for Application</label>
							<input type="text" name="reason" id="reason" class="form-control" pattern="[^<>=]{1,25}" maxlength="25" required value="<?php echo $getSel_REASON_STUDYING_INBOUND?>">
						</div>
						<div class="col-sm-5">
							<label>Disciplinary Status/Action</label>
							<input type="text" name="disciplinary" id="disciplinary" class="form-control" pattern="[^<>=]{1,25}" maxlength="25" required value="<?php echo $getSel_DESCRIPTION_ACTION_STATUS_INBOUND?>">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-6">
							<label>Do you need accommodation during the program? (subject to availability)</label>
						</div>
						<div class="col-sm-1">
							<input type="radio" name="accomodation" value="Yes" required> Yes
						</div>
						<div class="col-sm-1">
							<input type="radio" name="accomodation" value="No"> No
						</div>
					</div>
					
					<div class="form-group row break col-xs-4">
						<div class="col-sm-10">
							<button type="submit" class="btn btn-primary btn-block shadowbtn" formaction="inboundform2.php">Previous</button>
						</div>
					</div>
					<div class="form-group row break col-xs-4">
						<div class="col-sm-10">
							<input type="submit" name="btnSaveinform3" class="btn btn-warning btn-block shadowbtn" value="Save">
						</div>
					</div>
					<div class="form-group row break col-xs-4">
						<div class="col-sm-10">
							<input type="submit" name="btn_inform3" class="btn btn-success btn-block shadowbtn" value="Next">
						</div>
					</div>
				</form>
			</div>
		</div>
		</div>
	</body>
<script>
	
	var getradio = "<?php echo $getSel_ACCOMODATION_INBOUND?>";
	if (getradio) { // check if variable is empty or not
		$(":radio[value="+ getradio +"]").prop('checked', true);
	}
	
</script>
</html>