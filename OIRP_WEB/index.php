<?php
	include 'loginPhp.php';
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
		<script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
        <script src="bootstrap-3.3.7-dist/js/jquery-3.0.0.min.js"></script>
		<div class="container div_center_signIn">
			<form method="post">
				<div class="form-group">
					<input type="text" name="email" class="input form-control" placeholder="Enter Email"/>
				</div>
				<div class="form-group">
					<input type="password" name="password" class="input form-control" placeholder="Enter Password"/>
				</div>
				<div>
					<p>New user? <a href="register.php">Create new account</a></p>
				</div>
				<button type="submit" name="btn_login" class="btn button_style">Submit</button>
			</form>
		</div>
	</body>
</html>