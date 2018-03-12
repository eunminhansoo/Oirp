<?php
	include 'inbound_application.php';
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
				
		<div class="header">
			<img src='img/logo.png' height=auto>
		</div>
		
		<div class="container-fluid">
			<nav class="col-sm-2 sidebar">
				<ul class="nav nav-stacked">
					<li><a href="inboundform1.php">Personal Information</a></li>
					<li><a href="inboundform2.php">Educational Backround</a></li>
					<li><a href="inboundform3.php">Proposed Field of Study</a></li>
					<li><a href="inboundform4.php">English Proficiency & Medical Info</a></li>
					<li><a href="inboundform5.php">Expectations from the Program</a></li>
				</ul>
			</nav>

			<div class="col-sm-9 container-fluid">
				<form method="post">
					<div class="form-group row">
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
							<button type="submit" class="btn btn-primary" formaction="inboundform2.php">Previous</button>
							<input type="submit" name="btn_form3" class="btn btn-primary" value="Next">
						</div>
					</div>
				</form>
			</div>
		</div>
	</body>
</html>