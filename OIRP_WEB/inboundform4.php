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
					<li><a href="inboundform4.php">English Proficiency & Medical Info</a></li>
					<li><a href="inboundform5.php">Expectations from the Program</a></li>
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
							<input type="number" name="toeflScore" id="toeflScore" class="form-control" value="<?php echo $getSel_COMPLETE_TOEF_SCORE_INBOUND ?>" disabled>
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
							<input type="date" name="toeflDate" id="toeflDate" class="form-control" value="<?php echo $getSel_INTEND_TAKE_TOEF_DATE_INBOUND?>" disabled>
						</div>
						<div class="col-sm-1">
							<p>Type: </p>
						</div>
						<div class="col-sm-2">
							<input type="text" name="toeflType" id="toeflType" class="form-control" value="<?php echo $getSel_INTEND_TAKE_TOEF_TYPE_INBOUND?>" disabled>
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
							<input type="text" name="disabilities" id="disabilities" class="form-control" value="<?php echo $getSel_DESCRIBE_DISABILI_INBOUND ?>">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-10">
							<label>Any serious illness, conditions, or allergies?</label>
							<input type="text" name="illness" id="illness" class="form-control" value="<?php echo $getSel_DESCRIBE_ILL_INBOUND?>" >
						</div>
					</div>
					
					<div class="form-group row break col-xs-5">
						<div class="col-sm-10">
							<button type="submit" class="btn btn-primary" formaction="inboundform3.php">Previous</button>
						</div>
					</div>
					<div class="form-group row break col-xs-5">
						<div class="col-sm-10">
							<input type="submit" name="btnSaveinform4" class="btn btn-primary" value="Save">
						</div>
					</div>
					<div class="form-group row break col-xs-3">
						<div class="col-sm-10">
							<input type="submit" name="btn_inform4" class="btn btn-primary" value="Next">
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
        	    $("#toeflType").prop('disabled', false);
			});
			
			$('#toeflFutureNo').click(function(){
        	    $("#toeflDate").prop('disabled', true);
        	    $("#toeflType").prop('disabled', true);
			});
			
		});
	</script>
</html>