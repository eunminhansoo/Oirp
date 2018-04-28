<?php
	include 'outbound_application.php';
	
	$familyName;
	$givenName;
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
					<li><a href="outboundform1.php">Personal Information</a></li>
					<li class="active"><a href="outboundform2.php">Guardian's Information</a></li>
					<li><a href="outboundform3.php">Proposed Field of Study</a></li>
				</ul>
			</nav>
			
			<div class="col-sm-9 container-fluid">
				<form method="post" action="outboundform3.php">
					<div class="form-group row">
						<div class="col-sm-10">
							<label>Father's Name</label>
							<input type="text" name="father" id="father" class="form-control" pattern="[^0-9<>].{1,60}" maxlength="60" value="<?php echo $getSel_FATHER_NAME_OUT?>" required>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-5">
							<label>Occupation</label>
							<input type="text" name="fOccupation" id="fOccupation" class="form-control" pattern="[^<>].{1,20}" maxlength="20" value="<?php echo $getSel_OCCUPATION_DADA_OUT?>">
						</div>
						<div class="col-sm-5">
							<label>Company</label>
							<input type="text" name="fCompany" id="fCompany" class="form-control" pattern="[^<>].{1,20}" maxlength="20" value="<?php echo $getSel_COMPANY_DADA_OUT?>">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-10">
							<label>Address</label>
							<input type="text" name="fAddress" id="fAddress" class="form-control" pattern="[^<>].{1,115}" maxlength="115" value="<?php echo $getSel_ADDRESS_DADA_OUT?>">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-4">
							<label>Contact Number</label>
							<input type="text" name="fNumber" id="fNumber" class="form-control" placeholder="ex: +63 2-406-1611 or +63 974-887-6512" pattern="([+]\d{1,4})([\d\s-+]{7,15})"  maxlength=30 value="<?php echo $getSel_CONTACT_NUM_DADA_OUT?>">
						</div>
						<div class="col-sm-6">
							<label>Email Address</label>
							<input type="email" name="fEmail" id="fEmail" class="form-control" maxlength="50" value="<?php echo $getSel_EMAIL_ADD_DADA_OUT?>">
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
							<input type="text" name="mother" id="mother" class="form-control" pattern="[^0-9<>].{1,60}" maxlength="60" value="<?php echo $getSel_MOTHER_NAME_OUT?>" required>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-5">
							<label>Occupation</label>
							<input type="text" name="mOccupation" id="mOccupation" class="form-control" pattern="[^<>].{1,20}" maxlength="20" value="<?php echo $getSel_OCCUPATION_MOM_OUT?>">
						</div>
						<div class="col-sm-5">
							<label>Company</label>
							<input type="text" name="mCompany" id="mCompany" class="form-control" pattern="[^<>].{1,20}" maxlength="20" value="<?php echo $getSel_COMPANY_MOM_OUT?>">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-10">
							<label>Address</label>
							<input type="text" name="mAddress" id="mAddress" class="form-control" pattern="[^<>].{1,115}" maxlength="115" value="<?php echo $getSel_ADDRESS_MOM_OUT?>"> 
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-4">
							<label>Contact Number</label>
							<input type="text" name="mNumber" id="mNumber" class="form-control" placeholder="ex: +63 2-406-1611 or +63 974-887-6512" pattern="([+]\d{1,4})([\d\s-+]{7,15})" maxlength=30 value="<?php echo $getSel_CONTACT_NUM_MOM_OUT?>">
						</div>
						<div class="col-sm-6">
							<label>Email Address</label>
							<input type="email" name="mEmail" id="mEmail" class="form-control" maxlength="50" value="<?php echo $getSel_EMAIL_ADD_MOM_OUT?>">
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
					
					
					<div class="form-group row break col-xs-4">
						<div class="col-sm-10">
							<button type="submit" class="btn btn-primary" formaction="outboundform1.php">Previous</button>
						</div>
					</div>
					<div class="form-group row break col-xs-4">
						<div class="col-sm-10">
							<input type="submit" name="btnSaveoutform2" class="btn btn-primary" value="Save">
						</div>
					</div>
					<div class="form-group row break col-xs-4">
						<div class="col-sm-10">
							<input type="submit" name="btn_form2" class="btn btn-primary" value="Next">
						</div>
					</div>
				</form>
			</div>
			</div>
		</div>
	</body>
</html>
<script type="text/javascript">
	var getdata = "<?php echo $getSel_ANNUAL_INCOME_DADA_OUT ?>";
	var getdata1 = "<?php echo $getSel_ANNUAL_INCOME_MOM_OUT?>";
	$('#fIncome option[value="'+ getdata +'"]').prop('selected', true);
	$('#mIncome option[value="'+ getdata1 +'"]').prop('selected', true);
	
</script>

