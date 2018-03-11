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
					<li class="active"><a href="">Personal Information</a></li>
					<li><a href="">Guardian's Information</a></li>
					<li><a href="">Country & University</a></li>
				</ul>
			</nav>
			
			<div class="col-sm-9 container-fluid">
				<form method="post">
					<div class="form-group row">
						<div class="col-sm-10">
							<label>Have you completed a TOEFL/ELTS test or equivalent in the last twelve months?</label>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-2">
							<input type="radio" name="toeflTest" id="toeflTestYes" value="Yes"> Yes
						</div>
						<div class="col-sm-2">
							<input type="radio" name="toeflTest" id="toeflTestNo" value="No"> No
						</div>
						<div class="col-sm-1">
							<p>Score: </p>
						</div>
						<div class="col-sm-2">
							<input type="number" name="toeflScore" id="toeflScore" class="form-control" disabled>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-10">
							<label>Do you intend to take a TOEFL/ELTS test or equivalent in the immediate future?</label>
						</div> 
					</div>
					<div class="form-group row">
						<div class="col-sm-2">
							<input type="radio" name="toeflFuture" id="toeflFutureYes" value="Yes"> Yes
						</div>
						<div class="col-sm-2">
							<input type="radio" name="toeflFuture" id="toeflFutureNo" value="No"> No
						</div>
						<div class="col-sm-1">
							<p>Date: </p>
						</div>
						<div class="col-sm-2">
							<input type="date" name="toeflDate" id="toeflDate" class="form-control" disabled>
						</div>
					</div>
					
					<div class="form-group row break">
						<div class="col-sm-3">
							<label>Are you a smoker?</label>
						</div>
						<div class="col-sm-2">
							<input type="radio" name="smoker" id="smokerYes" value="Yes"> Yes
						</div>
						<div class="col-sm-2">
							<input type="radio" name="smoker" id="smokerNo" value="No"> No
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-10">
							<label>Any physical disabilities or personal problems?</label>
							<input type="text" name="disabilities" id="disabilities" class="form-control">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-10">
							<label>Any serious illness, conditions, or allergies?</label>
							<input type="text" name="illness" id="illness" class="form-control">
						</div>
					</div>
					
					<div class="form-group row break" align="right">
						<div class="col-sm-10">
							<button type="submit" class="btn btn-primary" formaction="inboundform3.php">Previous</button>
							<input type="submit" name="btn_form4" class="btn btn-primary" value="Next">
						</div>
					</div>
				</form>
			</div>
		</div>
	</body>
	<script>
		$(document).ready(function(){
		
			$('#toeflTestYes').click(function(){
        	    $("#toeflScore").prop('disabled', false);
			});
			
			$('#toeflTestNo').click(function(){
        	    $("#toeflScore").prop('disabled', true);
			});
			
			$('#toeflFutureYes').click(function(){
        	    $("#toeflDate").prop('disabled', false);
			});
			
			$('#toeflFutureNo').click(function(){
        	    $("#toeflDate").prop('disabled', true);
			});
			
		});
	</script>
</html>