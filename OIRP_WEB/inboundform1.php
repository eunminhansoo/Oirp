<?php
	include 'inbound_application.php';
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
		<div class="header ">
			<a href="index.php"><img src='img/logo.png' class="img-responsive"></a>	
		</div>
		
		<div class="container-fluid">
			<nav class="col-sm-2 sidebar">
				<ul class="nav nav-stacked">
					<li><a href="inboundform1.php">Personal Information</a></li>
					<li><a href="inboundform2.php">Educational Backround</a></li>
					<li><a href="inboundform3.php">Proposed Field of Study</a></li>
					<li><a href="inboundform4.php">English Proficiency & Medical Information</a></li>
					<li><a href="inboundform5.php">Expectations from the Program</a></li>
				</ul>
			</nav>
			<div class="col-sm-9 container-fluid">
				<form method="post">
					<div class="form-group row">
						<div class="col-sm-5">
							<label>Citizenship</label>
							<input type="text" name="citizenship" id="citizenship" class="form-control" pattern="[^0-9<>].{1,25}" maxlength="25" required value="<?php echo $geSel_CITIZENSHIP_IN ?>">
						</div>
						<div class="col-sm-5">
							<label>Nationality</label>
							<input type="text" name="nationality" id="nationality" class="form-control" pattern="[^0-9<>].{1,25}" maxlength="25" required value="<?php echo $geSel_NATIONALITY_IN?>">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-4">
							<label>Passport No.</label>
							<input type="text" name="passport" id="passport" class="form-control" pattern="[^<>].{1,20}" maxlength="20" required value="<?php echo $geSel_PASSPORT_NUM_IN?>">
						</div>
						<div class="col-sm-3">
							<label>Validity Date</label>
							<input type="date" name="validity" id="validity" class="form-control" required value="<?php echo $geSel_VALIDITY_DATE_IN?>">
						</div>
						<div class="col-sm-3">
							<label>Date of Issuance</label>
							<input type="date" name="issuance" id="issuance" class="form-control" required value="<?php echo $geSel_DATE_ISSUANCE_IN?>">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-10">
							<label>Mailing Address</label>
							<input type="text" name="address" id="address" class="form-control" pattern="[^<>].{1,115}" maxlength="115" required value="<?php echo $geSel_MAILING_ADD_IN?>">
						</div>					
					</div>
					<div class="form-group row">
						<div class="col-sm-5">
							<label>Telephone Number</label>
							<p>ex: +63 2-406-1611</p>
							<input type="text" name="telephone" id="telephone" class="form-control"  placeholder="country code - area code - telephone number" pattern="([+]\d{1,4})([\s]\d{1,3}[-]\d{2,3}[-]\d{3,4})" maxlength=30 required value="<?php echo $geSel_TELEPHONE_NUM_IN?>">
						</div>
						<div class="col-sm-5">
							<label>Mobile Number</label>
							<p>ex: +63 974-887-6512</p>
							<input type="text" name="mobile" id="mobile" class="form-control" placeholder="country code - telephone number" pattern="([+]\d{1,4})([\s]\d{1,3}[-]\d{2,3}[-]\d{3,4})" maxlength=40 required value="<?php echo $geSel_MOBILE_NUM_IN?>">
						</div>
					</div>
					
					<div class="form-group row break">
						<div class="col-sm-6">
							<label>Person to Contact (in case of emergency)</label>
							<input type="text" name="contactperson" id="contactperson" class="form-control" pattern="[^<>].{1,20}" maxlength="60" required value="<?php echo $getSel_PERSONAL_CONTACT_IN_BILA?>"> 
						</div>
						<div class="col-sm-4">
							<label>Relationship</label>
							<input type="text" name="relCP" id="relCP" class="form-control" pattern="[^<>].{1,20}" maxlength="20" required value="<?php echo $getSel_RELATIONSHIP_IN_BILA?>">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-10">
							<label>Address</label>
							<input type="text" name="addressCP" id="addressCP" class="form-control" pattern="[^<>].{1,115}" maxlength="115" required  value="<?php echo $getSel_ADD_IN_BILA?>">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-6">
							<label>Email Address</label>
							<input type="email" name="emailCP" id="emailCP" class="form-control" maxlength="60" required value="<?php echo $getSel_EMAIL_ADD_IN_BILA?>">
						</div>
						<div class="col-sm-4">
							<label>Phone Number</label>
							<p class="text_style">ex: +63 2-406-1611 or +63 974-887-6512</p>
							<input type="text" name="numberCP" id="numberCP" class="form-control" placeholder="Phone number or Mobile number" pattern="([+]\d{1,4})([\s]\d{1,3}[-]\d{2,3}[-]\d{3,4})" maxlength=30 required value="<?php echo $getSel_TELEPHONE_NUM_IN_BILA?>">
						</div>
					</div>
						
					<div class="form-group row break col-xs-6" align="right">
						<div class="col-sm-10">
							<input type="submit" name="btnSaveinform1" class="btn btn-primary" value="Save">
						</div>
					</div>
					<div class="form-group row break col-xs-6" align="right">
						<div class="col-sm-10">
							<input type="submit" name="btn_inform1" class="btn btn-primary" value="Next">
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



        