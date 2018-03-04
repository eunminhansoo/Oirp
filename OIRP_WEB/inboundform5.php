<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width = device-width, initial-scale = 1">        
        <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/custom.css">
	</head>
	<body>
		<script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
        <script src="bootstrap-3.3.7-dist/js/jquery-3.3.1.min.js"></script>
		
		<div class="header">
			<img src='img/logo.png' height=auto>
		</div>
		
		<div class="container-fluid">
			<nav class="col-sm-3 sidebar navbar " role="navigation">
				<ul class="nav navbar-nav">
					<li class=""><a href="inboundform1.php">Personal Information</a></li>
					<li class=""><a href="inboundform2.php">Proposed Field of Study</a></li>
					<li class="active"><a href="inboundform3.php">English Proficiency</a></li>
				</ul>
			</nav>
			
			<div class="col-sm-9 container-fluid">
				<form action="#">
					<div class="form-group row">
						<div class="col-sm-10">
							<label>Expectations from the Program</label>
							<textarea rows="5" cols="75" maxLength="1000" class="form-control"></textarea>
						</div>
					</div>
					
					<div class="form-group row break" align="right">
						<div class="col-sm-10">
							<button class="btn btn-primary">Previous</button>
							<button class="btn btn-primary">Save</button>
							<input type="submit" class="btn btn-primary" value="Submit">
						</div>
					</div>
				</form>
			</div>
		</div>
	</body>
</html>