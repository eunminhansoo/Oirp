<?php
	include 'outbound_application.php';
	$email;
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
			<nav class="col-sm-3 sidebar">
				<ul class="nav nav-stacked">
					<li class="active"><a href="">Personal Information</a></li>
					<li><a href="">Guardian's Information</a></li>
					<li><a href="">Country & University</a></li>
				</ul>
			</nav>
			
			<div class="col-sm-9 container-fluid">
				<form method="post">
					<div class="form-group row">
						<div class="col-sm-5">
							<label>Citizenship</label>
							<input type="text" name="citizenship" id="citizenship" class="form-control" placeholder="<?php echo $citizenship?>">
						</div>
						<div class="col-sm-5">
							<label>Nationality</label>
							<input type="text" name="nationality" id="nationality" class="form-control" placeholder="<?php echo $nationality?>">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-4">
							<label>Passport No.</label>
							<input type="text" name="passport" id="passport" class="form-control" placeholder="<?php echo $passport_num?>">
						</div>
						<div class="col-sm-3">
							<label>Validity Date</label>
							<input type="date" name="validity" id="validity" class="form-control" placeholder="<?php echo $validity_date?>">
						</div>
						<div class="col-sm-3">
							<label>Date of Issuance</label>
							<input type="date" name="issuance" id="issuance" class="form-control" placeholder="<?php echo $date_issuance?>">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-10">
							<label>Mailing Address</label>
							<input type="text" name="address" id="address" class="form-control" placeholder="<?php echo $mailing_add?>">
						</div>					
					</div>
					<div class="form-group row">
						<div class="col-sm-10">
							<label>Email Address</label>
							<input type="text" name="email" id="email" value="<?php echo $email?>"class="form-control" disabled>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-5">
							<label>Telephone Number</label>
							<input type="text" name="telephone" id="telephone" class="form-control" placeholder="ex: +63-2-406-1611">
						</div>
						<div class="col-sm-5">
							<label>Mobile Number</label>
							<input type="text" name="mobile" id="mobile" class="form-control" placeholder="ex: (+63)974887651">
						</div>
					</div>
					<div class="form-group row break">
						<div class="col-sm-4">
							<label>College/Faculty/Institute</label>
							<input type="text" name="college" id="college" class="form-control" placeholder="<?php echo $college_institute_faculty?>">
						</div>
						<div class="col-sm-4">
							<label>Degree Program</label>
							<input type="text" name="program" id="program" class="form-control" placeholder="<?php echo $degree_prog?>">
						</div>
						<div class="col-sm-2">
							<label>Year Level</label>
							<input type="text" name="yearlevel" id="yearlevel" class="form-control" placeholder="<?php echo $year_level?>">
						</div>
					</div>
					
					<div class="form-group row break" align="right">
						<div class="col-sm-10">
							<button type="button" class="btn btn-primary disabled">Previous</button>
							<input type="submit" name="btn_outbound1_1" class="btn btn-primary" value="Next">
						</div>
					</div>
				</form>
			</div>
		</div>
	</body>
</html>