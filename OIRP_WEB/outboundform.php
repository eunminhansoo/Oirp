<?php
	
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width = device-width, initial-scale = 1">
        <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/custom.css">
        <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap-theme.min.css">
        <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap-theme.css">
        <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/style.css">
	</head>
	<body>
		<script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
        <script src="bootstrap-3.3.7-dist/js/jquery-3.0.0.min.js"></script>
		
		<div class="header">
			<img src='img/logo.png' height=auto>
		</div>
		
		<nav class="col-sm-3 sidebar">
			<ul class="nav nav-stacked">
				<li role="presentation" class="active"><a href="">Personal Information</a></li>
				<li role="presentation"><a href="">Educational Background</a></li>
				<li role="presentation"><a href="">Guardian's Information</a></li>
				<li role="presentation"><a href="">Country & University</a></li>
			</ul>
		</nav>
		
		<div class="col-sm-9">
			<form>
				<div class="form-group container">
					<div class="col-sm-6">
						<input type="text" placeholder="Citizenship" name="citizenship" id="citizenship" class="form-control">
					</div>
					<div class="col-sm-6">
						<input type="text" placeholder="Nationality" name="nationality" id="nationality" class="form-control">
					</div>
				</div>
				<div class="form-group container">
					<div class="col-sm-4">
						<input type="text" placeholder="Passport No." name="passport" id="passport" class="form-control">
					</div>
					<div class="col-sm-4">
						<input type="text" placeholder="Validity Date" name="validity" id="validity" class="form-control">
					</div>
					<div class="col-sm-4">
						<input type="text" placeholder="Date of Issuance" name="issuance" id="issuance" class="form-control">
					</div>
				</div>
				<div class="form-group container">
					<div class="col-sm-12">
						<input type="text" placeholder="Mailing Address" name="address" id="address" class="form-control">
					</div>					
				</div>
				<div class="form-group container">
					
				</div>
			</form>
		</div>
	
	</body>
</html>