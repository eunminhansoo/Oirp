<?php
	include 'database_connection.php';
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
		<div class="container div_center_signUp">
			<script src="bootstrap-3.3.7-dist/js/style.js"></script>
			<script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
	        <script src="bootstrap-3.3.7-dist/js/jquery-3.0.0.min.js"></script>
	        <form action="#">
	        	<div>
	        		<div class="form-group">
	        			<input type="text" name="student_id" class="input form-control" placeholder="Enter Email"/>
	        		</div>
					<div class="form-group">
						<input type="password" name="password" class="input form-control" placeholder="Enter Password"/>
					</div>
					<div class="form-group">
						<input type="password" name="ret_try_pass" class="input form-control" placeholder="Re-Enter Password"/>
					</div>
					<div class="form-group">
						<input type="text" name="family_name" class="input form-control" placeholder="Enter Surname"/>
					</div>
					<div class="form-group">
						<input type="text" name="given_name" class="input form-control" placeholder="Enter Given Name"/>
					</div>
					<div class="form-group">
						<input type="text" name="middle_name" class="input form-control" placeholder="Enter Middle Name"/>
					</div>
					<div class="dropdown">
						<select name="gender" class="selectpicker">
							<option value="Male">Male</option>
							<option value="Female">Female</option>
						</select>
					</div>
					<div class="form-group no_space_betweem">					
						<input type="date" name="birthday" class="form-control"/>
					</div>
				</div>
				<div>
					<button type="submit" name="btn_register" class="btn button_style">Submit</button>
				</div>
			</form>
		</div>
	</body>
</html>	