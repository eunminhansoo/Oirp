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
		<div class="">
		<div class="header">
			<a href="index.php"><img src='img/logo.png' height=auto class="img-responsive"></a>
		</div>
	
		 <form method="post">
			<div class="container div_center_signUp">
				<script src="bootstrap-3.3.7-dist/js/style.js"></script>
				<script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
				<script src="bootstrap-3.3.7-dist/js/jquery-3.3.1.min.js"></script>	    
					        
	        	<div>
					<div class="form-group row">
					<div class="col-sm-12">
						<input type="text" name="family_name" class="input form-control" placeholder="Enter Surname" pattern="[^0-9<>].{1,50}" maxlength="50" required/>
					</div>
					</div>
					<div class="form-group row">
					<div class="col-sm-12">
						<input type="text" name="given_name" class="input form-control" placeholder="Enter Given Name" pattern="[^0-9<>].{1,50}" maxlength="50" required/>
					</div>
					</div>
					<div class="form-group row">
					<div class="col-sm-12">
						<input type="text" name="middle_name" class="input form-control" placeholder="Enter Middle Name" pattern="[^0-9<>].{1,50}" maxlength="50"/>
					</div>
					</div>
					<div class="form-group row">
					<div class="col-sm-12">
						<input type="email" name="email" class="input form-control" placeholder="Enter Email" maxlength="60" required/>
					</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-2">
							<select name="gender" class="form-control">
								<option value="Male">Male</option>
								<option value="Female">Female</option>
							</select>
						</div>
						<div class="col-sm-2">					
							<input type="date" name="birthday" id="birthday" class="form-control" required/>
						</div>
		        		<div class="col-sm-8">					
							<input type="text" name="birthplace" class="form-control" placeholder="Enter your Birthplace" pattern="[^<>].{1,20}" maxlength="20" required/>
						</div>
					</div>
					<div class="form-group row">					
						<div class="col-sm-12">
							Are you a Student of UST? 
							<input type="radio" name="application_form" value="yes"> Yes
							<input type="radio" name="application_form" value="no"> No
						</div>	
					</div>
				</div>
				<br>
				<button type="submit" name="btn_register" class="btn button_style" style="float: right;">Submit</button>
				<?php echo $message?>
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
