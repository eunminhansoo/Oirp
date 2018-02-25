
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
        <script src="bootstrap-3.3.7-dist/js/jquery-3.0.0.min.js"></script>
		
		<div class="header">
			<img src='img/logo.png' height=auto>
		</div>
		
		<div class="container-fluid">
			<nav class="col-sm-3 sidebar">
				<ul class="nav nav-stacked">
					<li class="active"><a href="">Personal Information</a></li>
					<li><a href="">Guardian's Information</a></li>
					<li><a href="">Country & University</a></li>
				</ul>
			</nav>
			
			<div class="col-sm-9 container-fluid">
				<form action="#">
					<div class="form-group row">
						<div class="col-sm-10">
							<p>Have you completed a TOEFL/ELTS test or equivalent in the last twelve months?</p>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-2">
							<input type="radio" name="toeflTest" value="yes"> Yes
							<input type="radio" name="toeflTest" value="no"> No
						</div>
						<div class="col-sm-1">
							<p>Score: </p>
						</div>
						<div class="col-sm-2">
							<input type="number" name="toeflScore" id="toeflScore" class="form-control">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-10">
							<p>Do you intend to take a TOEFL/ELTS test or equivalent in the immediate future?</p>
						</div> 
					</div>
					<div class="form-group row">
						<div class="col-sm-2">
							<input type="radio" name="toeflFuture" value="yes"> Yes
							<input type="radio" name="toeflFuture" value="no"> No
						</div>
						<div class="col-sm-1">
							<p>Date: </p>
						</div>
						<div class="col-sm-2">
							<input type="date" name="toeflDate" id="toeflDate" class="form-control">
						</div>
					</div>
					
					
					<div class="form-group row break" align="right">
						<div class="col-sm-10">
							<form action="inboundform2.php">
								<input type="submit" class="btn btn-primary" value="previous">
							</form>
							<input type="submit" class="btn btn-primary" value="Submit">
						</div>
					</div>
				</form>
			</div>
		</div>
	</body>
</html>