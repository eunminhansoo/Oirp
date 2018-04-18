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
        <link rel="icon" href="img/ust.png" type="image/png" sizes="196x196">
	</head>
	<body>
		<script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
		<script src="bootstrap-3.3.7-dist/js/jquery-3.3.1.min.js"></script>	    
				
		<div class="">
		<div class="header">
			<a href="index.php"><img src='img/logo.png' height=auto class="img-responsive"></a>	
		</div>
		
		<div class="container-fluid">
			<nav class="col-sm-2 sidebar">
				<ul class="nav nav-stacked">
					<li class="active"><a href="outboundform1.php">Personal Information</a></li>
					<li><a href="outboundform2.php">Guardian's Information</a></li>
					<li><a href="outboundform3.php">Proposed Field of Study</a></li>
				</ul>
			</nav>
			
			<div class="col-sm-9 container-fluid">
				<form method="post" action="outboundform2.php">
					<div class="form-group row">
						<div class="col-sm-3">
							<label>Nationality</label>
							<input type="text" name="nationality" id="nationality" class="form-control" pattern="[^<>].{1,25}" maxlength="25" value="<?php echo $setSel_NATIONALITY_OUT?>" required>
						</div>
						<div class="col-sm-3">
							<label>Passport No.</label>
							<input type="text" name="passport" id="passport" class="form-control" pattern="[^<>].{1,20}" maxlength="20" value="<?php echo $setSel_PASSPORT_NUM_OUT ?>" required>
						</div>
						<div class="col-sm-2">
							<label>Date of Issuance</label>
							<input type="date" name="issuance" id="issuance" class="form-control" value="<?php echo $setSel_DATE_ISSUANCE_OUT?>"  required>
						</div>
						<div class="col-sm-2">
							<label>Validity Date</label>
							<input type="date" name="validity" id="validity" class="form-control" value="<?php echo $setSel_VALIDITY_DATE_OUT?>" required>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-10">
							<label>Mailing Address</label>
							<input type="text" name="address" id="address" class="form-control"  pattern="[^<>].{1,115}" maxlength="115" value="<?php echo $setSel_MAILING_ADD_OUT?>" required>
						</div>					
					</div>
					<!-- div class="form-group row">
						<div class="col-sm-10">
							<label>Email Address</label>
							<input type="text" name="email" id="email" value="<?php echo $email?>"class="form-control" disabled>
						</div>
					</div-->
					<div class="form-group row">
						<div class="col-sm-5">
							<label>Telephone Number</label>
							<p>ex: +63 2-406-1611</p>
							<input type="text" name="telephone" id="telephone" class="form-control" placeholder="country code - area code - telephone number" pattern="([+]\d{1,4})([\d\s-+]{7,15})" maxlength=30 value="<?php echo $setSel_TELEPHONE_NUM_OUT?>" required>
						</div>
						<div class="col-sm-5">
							<label>Mobile Number</label>
							<p>ex: +63 974-887-6512</p>
							<input type="text" name="mobile" id="mobile" class="form-control" placeholder="country code - telephone number" pattern="([+]\d{1,4})([\d\s-+]{7,15})" maxlength=40 value="<?php echo $setSel_MOBILE_NUM_OUT?>" required>
						</div>
					</div>
					<div class="form-group row break">
						<div class="col-sm-4">
							<label>College/Faculty/Institute</label>
							<input type="text" name="college" id="college" class="form-control" pattern="[^<>].{1,50}" maxlength="50" value="<?php echo $setSel_COLLEGE_INSTITUTE_FACULTY_OUT?>" required>
						</div>
						<div class="col-sm-4">
							<label>Degree Program</label>
							<input type="text" name="program" id="program" class="form-control" pattern="[^<>].{1,50}" maxlength="50" value="<?php echo $setSel_DEGREE_PROG_OUT?>" required>
						</div>
						<div class="col-sm-2">
							<label>Year Level</label>
							<input type="number" name="yearlevel" id="yearlevel" class="form-control" min="1" max="10" value="<?php echo $setSel_YEAR_LEVEL_OUT?>">
						</div>
					</div>
					
					<div class="form-group row break col-xs-6" align="right">
						<div class="col-sm-10">
							<input type="submit" name="btnSaveoutform1" class="btn btn-primary" value="Save">
						</div>
					</div>
					<div class="form-group row break col-xs-6" align="right">
						<div class="col-sm-10">
							<input type="submit" name="btn_outform1" class="btn btn-primary" value="Next">
						</div>
					</div>
				</form>
			</div>
		</div>
		</div>
	</body>
	<script>
		$(document).ready(function(){
			var now = new Date();
		    date = now.toISOString().substring(0,10);
	
			$('#issuance').prop('max', date);
			$('#validity').prop('min', date);
	
		});
	</script>
</html>