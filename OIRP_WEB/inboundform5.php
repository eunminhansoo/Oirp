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
		
		<div class="header">
			<img src='img/logo.png' height=auto>
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
						<div class="col-sm-10">
							<label>Expectations from the Program (express in 1000 characters or less)</label>
<<<<<<< HEAD
							<textarea rows="5" cols="75" name="expectation_area" maxLength="1000" class="form-control"><?php echo $getSel_EXPECTATION_PROG?></textarea>
=======
							<textarea rows="5" cols="75" name="expectation_area" maxLength="1000" class="form-control" required></textarea>
>>>>>>> origin/master
						</div>
					</div>
					
					<div class="form-group row break col-xs-5">
						<div class="col-sm-10">
							<button type="submit" class="btn btn-primary" formaction="inboundform4.php">Previous</button>
						</div>
					</div>
					<div class="form-group row break col-xs-5">
						<div class="col-sm-10">
							<input type="submit" name="btnSaveinform5" class="btn btn-primary" value="Save">
						</div>
					</div>
					<div class="form-group row break col-xs-3">
						<div class="col-sm-10">
							<input type="submit" name="btn_inform5" class="btn btn-primary" value="Next">
						</div>
					</div>
				</form>
			</div>
		</div>
	</body>
</html>

