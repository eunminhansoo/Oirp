
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
			<nav class="col-sm-3 sidebar navbar" role="navigation">
				<ul class="nav navbar-nav">
					<li class=""><a href="inboundform1.php">Personal Information</a></li>
					<li class=""><a href="inboundform2.php">Proposed Field of Study</a></li>
					<li class="active"><a href="inboundform3.php">English Proficiency</a></li>
				</ul>
			</nav>
			
			<div class="col-sm-9 container-fluid">
				<form action="#">
					<div class="form-group row">
						<div class="col-sm-5">
							<label>Citizenship</label>
							<input type="text" name="citizenship" id="citizenship" class="form-control">
						</div>
						<div class="col-sm-5">
							<label>Nationality</label>
							<input type="text" name="nationality" id="nationality" class="form-control">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-4">
							<label>Passport No.</label>
							<input type="text" name="passport" id="passport" class="form-control">
						</div>
						<div class="col-sm-3">
							<label>Validity Date</label>
							<input type="date" name="validity" id="validity" class="form-control">
						</div>
						<div class="col-sm-3">
							<label>Date of Issuance</label>
							<input type="date" name="issuance" id="issuance" class="form-control">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-10">
							<label>Mailing Address</label>
							<input type="text" name="address" id="address" class="form-control">
						</div>					
					</div>
					<div class="form-group row">
						<div class="col-sm-5">
							<label>Telephone Number</label>
							<input type="text" name="telephone" id="telephone" class="form-control">
						</div>
						<div class="col-sm-5">
							<label>Mobile Number</label>
							<input type="text" name="mobile" id="mobile" class="form-control">
						</div>
					</div>			
					<div class="form-group row">
						<div class="col-sm-4">
							<label>Degree Program</label>
							<input type="text" name="program" id="program" class="form-control">
						</div>
						<div class="col-sm-4">
							<label>Major</label>
							<input type="text" name="major" id="major" class="form-control">
						</div>
						<div class="col-sm-2">
							<label>Year Level</label>
							<input type="number" name="yearlevel" id="yearlevel" class="form-control">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-5">
							<label>Country of Origin</label>
							<input type="text" name="country" id="country" class="form-control">
						</div>
						<div class="col-sm-5">
							<label>Home University</label>
							<input type="text" name="university" id="university" class="form-control">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-5">
							<label>Name of Officer to Contact</label>
							<input type="text" name="officer" id="officer" class="form-control">
						</div>
						<div class="col-sm-5">
							<label>Designation</label>
							<input type="text" name="officer" id="officer" class="form-control">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-5">
							<label>Email Address</label>
							<input type="text" name="officer" id="officer" class="form-control">
						</div>
						<div class="col-sm-5">
							<label>Telephone Number</label>
							<input type="text" name="officer" id="officer" class="form-control">
						</div>
					</div>
									
					
					<div class="form-group row break" align="right">
						<div class="col-sm-10">
							<button class="btn btn-primary">Previous</button>
							<input type="submit" class="btn btn-primary" value="Submit">
						</div>
					</div>
				</form>
			</div>
		</div>
	</body>
</html>