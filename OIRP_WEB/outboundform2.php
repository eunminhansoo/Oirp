<?php
	include 'outbound_application.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width = device-width, initial-scale = 1">
        <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/custom.css">
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
					<li><a href="outboundform1.php">Personal Information</a></li>
					<li><a href="outboundform2.php">Guardian's Information</a></li>
					<li><a href="outboundform3.php">Proposed Field of Study</a></li>
				</ul>
			</nav>
			
			<div class="col-sm-9 container-fluid">
				<form method="post" action="outboundform3.php">
					<div class="form-group row">
						<div class="col-sm-10">
							<label>Father's Name</label>
							<input type="text" name="father" id="father" class="form-control" pattern="(\p{L})([a-zA-Z.,()'+-!&*|/: ]).{1,20}" maxlength="60" required>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-5">
							<label>Occupation</label>
							<input type="text" name="fOccupation" id="fOccupation" class="form-control" pattern="(\p{L})([a-zA-Z.,()'+-!&*|/: ]).{1,20}" maxlength="20" required>
						</div>
						<div class="col-sm-5">
							<label>Company</label>
							<input type="text" name="fCompany" id="fCompany" class="form-control" pattern="(\p{L})([a-zA-Z.,()'+-!&*|/: ]).{1,20}" maxlength="20" required>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-10">
							<label>Address</label>
							<input type="text" name="fAddress" id="fAddress" class="form-control" pattern="(\p{L})([a-zA-Z0-9.,()'+-!&*|/: ]).{1,115}" maxlength="115" required>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-4">
							<label>Contact Number</label>
							<p class="text_style" >Phone number or Mobile number</p>
							<input type="text" name="fNumber" id="fNumber" class="form-control" placeholder="ex: (+63)974887651 or +63-2-406-1611" pattern="([0-9+- ()]){1,30}" maxlength=30 required>
						</div>
						<div class="col-sm-6">
							<label>Email Address</label>
							<input type="email" name="fEmail" id="fEmail" class="form-control" required>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-10">
							<label>Annual Income</label>
							<select name="fIncome" class="form-control">
								<option value="PHP 8,001 - PHP 135,000">PHP 8,001 - PHP 135,000</option>
								<option value="PHP 135,001 - PHP 250,000">PHP 135,001 - PHP 250,000</option>
								<option value="PHP 250,001 - PHP 500,000">PHP 250,001 - PHP 500,000</option>
								<option value="PHP 500,001 - PHP 1,000,000">PHP 500,001 - PHP 1,000,000</option>
								<option value="PHP 1,000,001 or more">PHP 1,000,001 or more</option>
								<option value="Not Applicable">Not Applicable</option>
							</select>
						</div>
					</div>
					
					<div class="form-group row break">
						<div class="col-sm-10">
							<label>Mother's Name</label>
							<input type="text" name="mother" id="mother" class="form-control" pattern="(\p{L})([a-zA-Z.,()'+-!&*|/: ]).{1,20}" maxlength="60" required>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-5">
							<label>Occupation</label>
							<input type="text" name="mOccupation" id="mOccupation" class="form-control" pattern="(\p{L})([a-zA-Z.,()'+-!&*|/: ]).{1,20}" maxlength="20" required>
						</div>
						<div class="col-sm-5">
							<label>Company</label>
							<input type="text" name="mCompany" id="mCompany" class="form-control" pattern="(\p{L})([a-zA-Z.,()'+-!&*|/: ]).{1,20}" maxlength="20" required>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-10">
							<label>Address</label>
							<input type="text" name="mAddress" id="mAddress" class="form-control" pattern="(\p{L})([a-zA-Z0-9.,()'+-!&*|/: ]).{1,115}" maxlength="115" required> 
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-4">
							<label>Contact Number</label>
							<p class="text_style" >Phone number or Mobile number</p>
							<input type="text" name="mNumber" id="mNumber" class="form-control" placeholder="ex: (+63)974887651 or +63-2-406-1611" pattern="([0-9+- ()]){1,30}" maxlength=30 required>
						</div>
						<div class="col-sm-6">
							<label>Email Address</label>
							<input type="email" name="mEmail" id="mEmail" class="form-control" required>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-10">
							<label>Annual Income</label>
							<select name="mIncome" class="form-control">
								<option value="PHP 8,001 - PHP 135,000">PHP 8,001 - PHP 135,000</option>
								<option value="PHP 135,001 - PHP 250,000">PHP 135,001 - PHP 250,000</option>
								<option value="PHP 250,001 - PHP 500,000">PHP 250,001 - PHP 500,000</option>
								<option value="PHP 500,001 - PHP 1,000,000">PHP 500,001 - PHP 1,000,000</option>
								<option value="PHP 1,000,001 or more">PHP 1,000,001 or more</option>
								<option value="Not Applicable">Not Applicable</option>
							</select>
						</div>
					</div>
					
					
					<div class="form-group row break" align="right">
						<div class="col-sm-10">
							<button type="submit" class="btn btn-primary" formaction="outboundform1.php">Previous</button>
							<input type="submit" name="btn_form2" class="btn btn-primary" value="Next">
						</div>
					</div>
				</form>
			</div>
		</div>
	</body>
</html>

