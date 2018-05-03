<?php
	include 'register_php.php';
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
        <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/custom.css">
        <link rel="icon" href="img/ust.png" type="image/png" sizes="196x196">
	</head>
	<body>
		<script src='https://www.google.com/recaptcha/api.js'></script>
		<script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
		<script src="bootstrap-3.3.7-dist/js/jquery-3.3.1.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
		<div class="">
		<div class="header">
			<a href="index.php"><img src='img/logo.png' height=auto class="img-responsive"></a>
		</div>
		
	<div style="height: 10px; background-color: #FDC601;     box-shadow: 2px 2px 4px #888888;
">
		<div class="container-fluid">
			<div class="navbar-header">				
			</div>
		</div>
	</div>
	
		 <form method="post">
			<div class="container div_center_signUp"> 
	        	<div>
				<div class="form-group row">
				<div class="col-sm-3">
				</div>
				<div class="col-sm-6">
					<div class="form-group row">
					<div class="col-sm-12">
						<label>Last Name</label>
						<input type="text" name="family_name" class="input form-control" pattern="[^0-9<>].{1,50}" maxlength="50" required/>
					</div>
					</div>
					<div class="form-group row">
					<div class="col-sm-12">
						<label>Given Name</label>
						<input type="text" name="given_name" class="input form-control" pattern="[^0-9<>].{1,50}" maxlength="50" required/>
					</div>
					</div>
					<div class="form-group row">
					<div class="col-sm-12">
						<label>Middle Name</label>
						<input type="text" name="middle_name" class="input form-control" pattern="[^0-9<>].{1,50}" maxlength="50"/>
					</div>
					</div>
					<div class="form-group row">
					<div class="col-sm-12">
						<label>Email</label>
						<input type="email" name="email" class="input form-control" maxlength="60" required/>
					</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-3">
							<label>Gender</label>
							<select name="gender" class="form-control">
								<option value="Male">Male</option>
								<option value="Female">Female</option>
							</select>
						</div>
						<div class="col-sm-4">	
							<label>Birthdate</label>				
							<input type="date" name="birthday" id="birthday" class="form-control" required/>
						</div>
		        		<div class="col-sm-5">
		        			<label>Birthplace</label>					
							<input type="text" name="birthplace" class="form-control" pattern="[^<>].{1,25}" maxlength="25" required/>
						</div>
					</div>
					<div class="form-group row">					
						<div class="col-sm-10">
							<label>Are you a Student of UST? </label>
						&nbsp;
							<input type="radio" name="application_form" value="yes" required> Yes
						&nbsp;
							<input type="radio" name="application_form" value="no"> No
						</div>
					</div>
					<div class="g-recaptcha" data-sitekey="6LeuFVcUAAAAAAOo1j7nS9jSzJPtu6-htYkwDe3t"></div>
				
				<button type="submit" name="btn_register" class="btn btn-success shadowbtn" style="float: left;"><span class="glyphicon glyphicon-ok-sign"></span>  Submit</button>
				&nbsp;&nbsp;&nbsp;<button onclick="location.href='index.php'" class="btn btn-danger shadowbtn">Cancel</button>
				</div>
				</div>
				<div class="col-sm-3">
				</div>
				</div>
				<?php echo $message?>
				<?php echo $message_captcha?>
			</div>
		</form>
		</div>
	</body>
	<script>
		$(document).ready(function(){
			var now = new Date();
		    minDate = now.toISOString().substring(0,10);

			$('#birthday').prop('max', minDate);

		});
	</script>
</html>	
