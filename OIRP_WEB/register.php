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
        <link rel="icon" href="img/ust.png" type="image/png" sizes="196x196">
	</head>
	<body>
		<div class="container-fluid">
		<div class="container-fluid">
			<a href="index.php"><img src='img/logo.png' height=auto class="img-responsive"></a>
		</div>
	
		 <form method="post">
			<div class="container div_center_signUp">
				<script src="bootstrap-3.3.7-dist/js/style.js"></script>
				<script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
				<script src="bootstrap-3.3.7-dist/js/jquery-3.3.1.min.js"></script>	    
					        
	        	<div>
					<div class="form-group">
						<input type="text" name="family_name" class="input form-control" placeholder="Enter Surname" pattern="(\p{L})([a-zA-Z.,()'+-!&*|/: ]).{1,50}" maxlength="50" required/>
					</div>
					<div class="form-group">
						<input type="text" name="given_name" class="input form-control" placeholder="Enter Given Name" pattern="(\p{L})([a-zA-Z.,()'+-!&*|/: ]).{1,50}" maxlength="50" required/>
					</div>
					<div class="form-group">
						<input type="text" name="middle_name" class="input form-control" placeholder="Enter Middle Name" pattern="(\p{L})([a-zA-Z.,()'+-!&*|/: ]).{1,50}" maxlength="50" required/>
					</div>
					<div class="form-group">
						<input type="text" name="email" class="input form-control" placeholder="Enter Email" maxlength="60" required/>
					</div>
					<div class="dropdown">
						<select name="gender" class="selectpicker">
							<option value="Male">Male</option>
							<option value="Female">Female</option>
						</select>
					</div>
					<div class="form-group no_space_betweem">					
						<input type="date" name="birthday" id="birthday" class="form-control" required/>
					</div>
	        		<div class="form-group no_space_betweem">					
						<input type="text" name="birthplace" class="form-control" placeholder="Enter your Birthplace" pattern="(\p{L})([a-zA-Z.,()'+-!&*|/: ]).{1,20}" maxlength="20" required/>
					</div>
					<div class="form-group no_space_betweem">					
						<div>
							Are you a Student of UST?
							<input type="radio" name="application_form" value="yes"> Yes
							<input type="radio" name="application_form" value="no"> No
						</div>	
					</div>
				</div>
				<button type="submit" name="btn_register" class="btn button_style">Submit</button>
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
