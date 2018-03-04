<?php
	//include 'inbound_application.php';
	
	$conn = mysqli_connect("localhost", "root", "","oirp_db");
	$db = mysqli_select_db($conn, "oirp_db");
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
	</head>
	<body>
		<script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
		<script src="bootstrap-3.3.7-dist/js/jquery-3.3.1.min.js"></script>	    
				
		<div class="header">
			<img src='img/logo.png' height=auto>
		</div>
		
		<div class="container-fluid">
			<nav class="col-sm-2 sidebar">
				<ul class="nav nav-stacked">
					<li class="active"><a href="">Personal Information</a></li>
					<li><a href="">Guardian's Information</a></li>
					<li><a href="">Country & University</a></li>
				</ul>
			</nav>

			<div class="col-sm-9 container-fluid">
				<form method="post" action="inboundform4.php">
					<div class="form-group row break">
						<div class="col-sm-10">
							<label>Proposed Program</label>
							<input type="text" name="proposedProg" id="proposedProg" class="form-control">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-10">
							<label>Courses to be taken at UST</label> (Refer to the <a href="http://www.ust.edu.ph/academics/programs/">UST website</a>)
							<div class="input-group">
							    <span class="input-group-addon">1.</span>
							    <input type="text" name="course1" id="course1" class="form-control">
							</div>
						</div>
						<div class="col-sm-10">
							<div class="input-group">
							    <span class="input-group-addon">2.</span>
							    <input type="text" name="course2" id="course2" class="form-control">
							</div>
						</div>
						<div class="col-sm-10">
							<div class="input-group">
							    <span class="input-group-addon">3.</span>
							    <input type="text" name="course3" id="course3" class="form-control">
							</div>
						</div>
						<div class="col-sm-10">
							<div class="input-group">
							    <span class="input-group-addon">4.</span>
							    <input type="text" name="course4" id="course4" class="form-control">
							</div>
						</div>
						<div class="col-sm-10">
							<div class="input-group">
							    <span class="input-group-addon">5.</span>
							    <input type="text" name="course5" id="course5" class="form-control">
							</div>
						</div>
					</div>
					
					<div class="form-group row">
						<div class="col-sm-2">
							<label>Semester to Study</label>
							<select name="sem" class="form-control">
								<option value="1st Semester">1st Semester</option>
								<option value="2nd Semester">2nd Semester</option>
								<option value="Special Semester">Special Semester</option>
							</select>
						</div>
						<div class="col-sm-8">
							<label>Research Topic</label>
							<input type="text" name="research" id="research" class="form-control">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-5">
							<label>Reason for Application</label>
							<input type="text" name="reason" id="reason" class="form-control">
						</div>
						<div class="col-sm-5">
							<label>Disciplinary Status/Action</label>
							<input type="text" name="disciplinary" id="disciplinary" class="form-control">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-6">
							<label>Do you need accommodation during the program? (subject to availability)</label>
						</div>
						<div class="col-sm-1">
							<input type="radio" name="accomodation" value="Yes"> Yes
						</div>
						<div class="col-sm-1">
							<input type="radio" name="accomodation" value="No"> No
						</div>
					</div>
					
					<div class="form-group row break" align="right">
						<div class="col-sm-10">
							<button type="button" class="btn btn-primary">Previous</button>
							<input type="submit" class="btn btn-primary" value="Next">
						</div>
					</div>
				</form>
			</div>
		</div>
	</body>
</html>