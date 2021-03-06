<?php
	include 'inbound_application.php';
	include 'logout.php';
	$familyName;
	$givenName;
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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>   
		
		<div class="">
		<div class="header">
			<a href="index.php"><img src='img/logo.png' height=auto class="img-responsive"></a>	
		</div>
		
		<nav class="navbar" id="bar">
						<div class="container-fluid">
							<div class="navbar-header">
								<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-expand" aria-expanded="false">
							        <span class="sr-only">Toggle navigation</span>
							        <span class="icon-bar"></span>
							        <span class="icon-bar"></span>
							        <span class="icon-bar"></span>
							     </button>
							</div>
							<div class="collapse navbar-collapse" id="nav-expand" aria-expanded="true">
										<ul class="nav navbar-nav navbar-right">
											<li><a href="student_home.php">Home</a></li>
											<li class="dropdown" style="border-left: 1px solid #333333; padding-left: 30px;">
									          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $familyName.", ".$givenName ?><span class="caret"></span></a>
									          <ul class="dropdown-menu">
												<li style="text-align: center"><form method="post"><button name="logoutbtn" class="btn-logout float-center">Logout <span class="glyphicon glyphicon-log-out"></span></button></form></li>									         
											  </ul>
									        </li>
											
											
										</ul> 
									</div>
							</div>
						</nav>
		
		<div class="container-fluid">
			<nav class="col-sm-2 sidebar">
				<ul class="nav nav-stacked">
					<li><a href="inboundform1.php">Personal Information</a></li>
					<li><a href="inboundform2.php">Educational Backround</a></li>
					<li><a href="inboundform3.php">Proposed Field of Study</a></li>
					<li class="active"><a href="inboundform4.php">English Proficiency & Medical Information</a></li>
					<li><a href="inboundform5.php">Expectations from the Program</a></li>
				</ul>
			</nav>
			
			<div class="col-sm-9 container-fluid">
				<form method="post">
					<div class="form-group row">
						<div class="col-sm-10">
							<label>Have you completed a TOEFL/ELTS test or equivalent in the last twelve months? <span class="required">*</span></label>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-2">
							<input type="radio" name="toeflTest" id="toeflTestYes" value="Yes" required> Yes
						</div>
						<div class="col-sm-2">
							<input type="radio" name="toeflTest" id="toeflTestNo" value="No"> No
						</div>
						<div class="col-sm-1">
							<p>Score: </p>
						</div>
						<div class="col-sm-2">
							<input type="number" name="toeflScore" id="toeflScore" class="form-control" min="1" max="120" disabled value="<?php echo $getSel_COMPLETE_TOEF_SCORE_INBOUND ?>">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-10">
							<label>Do you intend to take a TOEFL/ELTS test or equivalent in the immediate future? <span class="required">*</span></label>
						</div> 
					</div>
					<div class="form-group row">
						<div class="col-sm-2">
							<input type="radio" name="toeflFuture" id="toeflFutureYes" value="Yes" required> Yes
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
							<input type="text" name="toeflType" id="toeflType" class="form-control" pattern="[^<>=]{1,25}" maxlength="25" disabled  value="<?php echo $getSel_INTEND_TAKE_TOEF_TYPE_INBOUND?>">
						</div>
					</div>
					<div class="row col-sm-10">
						<p><b>Note:</b> In the absence of TOEFL test or equivalent, English proficiency must be assessed by an English teacher in Home University</p>
					</div>
					
					<div class="form-group row break">
						<div class="col-sm-3">
							<label>Are you a smoker? <span class="required">*</span></label>
						</div>
						<div class="col-sm-2">
							<input type="radio" name="smoker" id="smokerYes" value="Yes" required> Yes
						</div>
						<div class="col-sm-2">
							<input type="radio" name="smoker" id="smokerNo" value="No"> No
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-10">
							<label>Any physical disabilities or personal problems?</label>
							<input type="text" name="disabilities" id="disabilities" class="form-control" pattern="[^<>=]{1,40}" maxlength="40" value="<?php echo $getSel_DESCRIBE_DISABILI_INBOUND ?>">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-10">
							<label>Any serious illness, conditions, or allergies?</label>
							<input type="text" name="illness" id="illness" class="form-control" pattern="[^<>=]{1,75}" maxlength="75" value="<?php echo $getSel_DESCRIBE_ILL_INBOUND?>">
						</div>
					</div>
					
					<div class="form-group row break col-xs-4">
						<div class="col-sm-10">
							<button type="submit" class="btn btn-primary btn-block shadowbtn" formaction="inboundform3.php">Previous</button>
						</div>
					</div>
					<div class="form-group row break col-xs-4">
						<div class="col-sm-10">
							<input type="submit" name="btnSaveinform4" class="btn btn-warning btn-block shadowbtn" value="Save">
						</div>
					</div>
					<div class="form-group row break col-xs-4">
						<div class="col-sm-10">
							<input type="submit" name="btn_inform4" class="btn btn-success btn-block shadowbtn" value="Next">
						</div>
					</div>
				</form>
			</div>
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
				docuemnt.getElementById('toeflDate').value = " ";
				docuemnt.getElementById('toeflType').value = " ";
			});

			var getradio = "<?php echo $getSel_DO_YOU_SMOKE_INBOUND ?>";
			if (getradio) { // check if variable is empty or not
				$(':radio[name=smoker][value='+ getradio +']').prop('checked', true);
			}

			var getradio1 = "<?php echo $getSel_COMPLETE_TOEF_INBOUND ?>";
			if (getradio1) { // check if variable is empty or not
				$(':radio[name=toeflTest][value='+ getradio1 +']').prop('checked', true);
			}

			if(document.getElementById('toeflTestYes').checked == true){
				$("#toeflScore").prop('disabled', false);
			}
			var getradio2 = "<?php echo $getSel_INTEND_TAKE_TOEF_INBOUND ?>";
			if (getradio2) { // check if variable is empty or not
				$(':radio[name=toeflFuture][value='+ getradio2 +']').prop('checked', true);
			}
			if(document.getElementById('toeflFutureYes').checked == true){
				$("#toeflDate").prop('disabled', false);
        	    $("#toeflType").prop('disabled', false);
			}
		});
	</script>
</html>