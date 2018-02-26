<?php 
	include 'apply_php.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width = device-width, initial-scale = 1">
        <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap-theme.min.css">
        <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap-theme.css">
        <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/style.css">
	</head>
	<body>
		<script src="bootstrap-3.3.7-dist/js/style.js"></script>
		<script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
		<script src="bootstrap-3.3.7-dist/js/jquery-3.0.0.min.js"></script>
		<div>
        	<div class="navsticky navbar-topaz">
        		<div class="navbar">
        			<img src="img/SHARE.png">
        		</div>
        	</div>
        </div>
        <div>
		 <form method="post">
			<div class="container div_center_signUp">
				
	        <div>
	        <div class="input-group col-xs-8">
				<span class="input-group-addon span-style">Email Address: </span>
				<input type="text" name="email" disabled value="<?php echo $email?>"  class="form-control"/>
			</div>
			<div class="input-group col-xs-8">
				<span class="input-group-addon span-style">Family Name: </span>
				<input type="text" name="family_name" disabled value="<?php echo $family_name?>"  class="form-control"/>
			</div>
			<div class="input-group col-xs-8">
				<span class="input-group-addon span-style">Given Name: </span>
				<input type="text" name="given_name" disabled value="<?php echo $given_name?>"  class="form-control"/>
			</div>
			<div class="input-group col-xs-8">
				<span class="input-group-addon span-style">Middle Name: </span>
				<input type="text" name="middle_name" disabled value="<?php echo $middle_name?>"  class="form-control"/>
			</div>
			<div class="input-group col-xs-8">
				<span class="input-group-addon span-style">Gender: </span>
				<input type="text" name="gender" disabled value="<?php echo $gender ?>"  class="form-control"/>
			</div>
			<div class="input-group col-xs-8">
				<span class="input-group-addon span-style">Date of Birth: </span>
				<input type="date" name="birthday" disabled value="<?php echo $birthday?>"  class="form-control"/>
			</div>
			<div class="form-group">
				<input type="number" name="age" class="input form-control" placeholder="Age" required/>
			</div>
			<div class="form-group">
				<input type="text" name="nationality" class="input form-control" placeholder="Nationality" required/>
			</div>
			<div class="form-group">
						<input type="number" name="passport_num_in" class="input form-control" placeholder="Passport Number" required/>
					</div>
			<div class="form-group">
						<input type="date" name="date_issuance_in" class="input form-control" placeholder="Issuance date of Passport" required/>
					</div>
			<div class="form-group">
						<input type="date" name="validity_date_in" class="input form-control" placeholder="Validity date of Passport" required/>
					</div>
			<div class="form-group">
						<input type="text" name="mailing_add_in" class="input form-control" placeholder="Mailing Address" required/>
					</div>
			<div class="form-group">
						<input type="number" name="telephone_num_in" class="input form-control" placeholder="Telephone Number" required/>
					</div>
			<div class="form-group">
						<input type="number" name="mobile_num_in" class="input form-control" placeholder="Mobile Number" required/>
					</div>
				</div>
				<button type="submit" name="btn_apply" class="btn button_style">Submit</button>
				
			</div>
		</form>
		</div>
	</body>
</html>	