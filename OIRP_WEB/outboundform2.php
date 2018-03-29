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
				
		<div class="container-fluid">
		<div class="container-fluid">
			<a href="index.php"><img src='img/logo.png' height=auto class="img-responsive"></a>	
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
							<input type="text" name="father" id="father" class="form-control" pattern="[^0-9<>].{1,20}" maxlength="60" value="<?php echo $getSel_FATHER_NAME_OUT?>" required>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-5">
							<label>Occupation</label>
							<input type="text" name="fOccupation" id="fOccupation" class="form-control" pattern="[^<>].{1,20}" maxlength="20" value="<?php echo $getSel_OCCUPATION_DADA_OUT?>" required>
						</div>
						<div class="col-sm-5">
							<label>Company</label>
							<input type="text" name="fCompany" id="fCompany" class="form-control" pattern="[^<>].{1,20}" maxlength="20" value="<?php echo $getSel_COMPANY_DADA_OUT?>" required>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-10">
							<label>Address</label>
							<input type="text" name="fAddress" id="fAddress" class="form-control" pattern="[^<>].{1,115}" maxlength="115" value="<?php echo $getSel_ADDRESS_DADA_OUT?>" required>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-4">
							<label>Contact Number</label>
							<p class="text_style" >Phone number or Mobile number</p>
							<input type="text" name="fNumber" id="fNumber" class="form-control" placeholder="ex: (+63)974887651 or +63-2-406-1611" pattern="([+]\d{1,4})([\s]\d{2,3}[-]\d{2,3}[-]\d{3,4})" maxlength=30 value="<?php echo $getSel_CONTACT_NUM_DADA_OUT?>" required>
						</div>
						<div class="col-sm-6">
							<label>Email Address</label>
							<input type="email" name="fEmail" id="fEmail" class="form-control" value="<?php echo $getSel_EMAIL_ADD_DADA_OUT?>" required>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-10">
							<label>Annual Income</label>
							<select name="fIncome" id="fIncome" class="form-control">
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
							<input type="text" name="mother" id="mother" class="form-control" pattern="[^0-9<>].{1,20}" maxlength="60" value="<?php echo $getSel_MOTHER_NAME_OUT?>" required>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-5">
							<label>Occupation</label>
							<input type="text" name="mOccupation" id="mOccupation" class="form-control" pattern="[^<>].{1,20}" maxlength="20" value="<?php echo $getSel_OCCUPATION_MOM_OUT?>" required>
						</div>
						<div class="col-sm-5">
							<label>Company</label>
							<input type="text" name="mCompany" id="mCompany" class="form-control" pattern="[^<>].{1,20}" maxlength="20" value="<?php echo $getSel_COMPANY_MOM_OUT?>" required>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-10">
							<label>Address</label>
							<input type="text" name="mAddress" id="mAddress" class="form-control" pattern="[^<>].{1,115}" maxlength="115" value="<?php echo $getSel_ADDRESS_MOM_OUT?>" required> 
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-4">
							<label>Contact Number</label>
							<p class="text_style" >Phone number or Mobile number</p>
							<input type="text" name="mNumber" id="mNumber" class="form-control" placeholder="ex: (+63)974887651 or +63-2-406-1611" pattern="([+]\d{1,4})([\s]\d{2,3}[-]\d{2,3}[-]\d{3,4})" maxlength=30 value="<?php echo $getSel_CONTACT_NUM_MOM_OUT?>" required>
						</div>
						<div class="col-sm-6">
							<label>Email Address</label>
							<input type="email" name="mEmail" id="mEmail" class="form-control" value="<?php echo $getSel_EMAIL_ADD_MOM_OUT?>" required>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-10">
							<label>Annual Income</label>
							<select name="mIncome" id="mIncome" class="form-control">
								<option value="PHP 8,001 - PHP 135,000" >PHP 8,001 - PHP 135,000</option>
								<option value="PHP 135,001 - PHP 250,000" >PHP 135,001 - PHP 250,000</option>
								<option value="PHP 250,001 - PHP 500,000">PHP 250,001 - PHP 500,000</option>
								<option value="PHP 500,001 - PHP 1,000,000">PHP 500,001 - PHP 1,000,000</option>
								<option value="PHP 1,000,001 or more">PHP 1,000,001 or more</option>
								<option value="Not Applicable">Not Applicable</option>
							</select>
						</div>
					</div>
					
					
					<div class="form-group row break col-xs-5">
						<div class="col-sm-10">
							<button type="submit" class="btn btn-primary" formaction="inboundform1.php">Previous</button>
						</div>
					</div>
					<div class="form-group row break col-xs-5">
						<div class="col-sm-10">
							<input type="submit" name="btnSaveoutform2" class="btn btn-primary" value="Save">
						</div>
					</div>
					<div class="form-group row break col-xs-3">
						<div class="col-sm-10">
							<input type="submit" name="btn_form2" class="btn btn-primary" value="Next">
						</div>
					</div>
				</form>
			</div>
			</div>
		</div>
		<?php echo $getSel_ANNUAL_INCOME_DADA_OUT ?>
	</body>
</html>
<script type="text/javascript">
	var getdata = "<?php echo $getSel_ANNUAL_INCOME_DADA_OUT ?>";
	var getdata1 = "<?php echo $getSel_ANNUAL_INCOME_MOM_OUT?>";
	$('#fIncome option[value="'+ getdata +'"]').prop('selected', true);
	$('#mIncome option[value="'+ getdata1 +'"]').prop('selected', true);

</script>

