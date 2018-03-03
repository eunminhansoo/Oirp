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
			<div class="col-sm-3 navbar" role="navigation">
				<ul class="nav nav-stacked">
					<li class=""><a href="inboundform1.php">Personal Information</a></li>
					<li class="active"><a href="inboundform2.php">Proposed Field of Study</a></li>
					<li class="disabled"><a href="">English Proficiency</a></li>
				</ul>
			</div>

			<div class="col-sm-9 container-fluid">
				<form action="inboundform3.php">
				<div class="form-group row break">
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
						<div class="col-sm-2">
							<label>Type of program:</label>
						</div>
						<div class="col-sm-2">
							<input type="radio" name="program" value="proBilateral" id="proBilateral"> Exchange through bilateral agreement
						</div>
						<div class="col-sm-2">
							<input type="radio" name="program" value="proScholar" id="proScholar"> Exchange through scholarship
						</div>
						<div class="col-sm-1">
							<input type="radio" name="program" id="proOthers"> Others: 
						</div>
						<div class="col-sm-3">
							<input type="text" name="program" id="proText" class="form-control" disabled>
						</div>
					</div>
					<div class="form-group row">
						<div id="bilateralOptions">
							<div class="col-sm-2">
								<label>Bilateral Options:</label>
							</div>
							<div class="col-sm-1">
								<input type="radio" name="bilateral" id="" value="year"> 1 year
							</div>
							<div class="col-sm-1">
								<input type="radio" name="bilateral" id="" value="sem"> 1 sem
							</div>
							<div class="col-sm-1">
								<input type="radio" name="bilateral" id="bilateralOthers"> Others: 
							</div>
							<div class="col-sm-3">
								<input type="text" name="bilateral" id="bilateralText" class="form-control" disabled>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<div id="scholarshipOptions">
							<div class="col-sm-2">
								<label>Scholarship:</label>
							</div>
							<div class="col-sm-1">
								<input type="radio" name="scholarship" id="scholarshipAIMS" value="AIMS"> AIMS
							</div>
							<div class="col-sm-1">
								<input type="radio" name="scholarship" id="scholarshipSHARE" value="SHARE"> SHARE
							</div>
							<div class="col-sm-1">
								<input type="radio" name="scholarship" id="scholarshipOthers"> Others: 
							</div>
							<div class="col-sm-3">
								<input type="text" name="scholarship" id="scholarshipText" class="form-control" disabled>
							</div>
						</div>
					</div>
				
					<div class="form-group row">
						<div class="col-sm-6">
							<label>Officer to Contact</label>
							<input type="text" name="officer" id="officer" class="form-control">
						</div>
						<div class="col-sm-4">
							<label>Designation</label>
							<input type="text" name="designationO" id="designationO" class="form-control">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-6">
							<label>Email Address</label>
							<input type="email" name="emailO" id="emailO" class="form-control">
						</div>
						<div class="col-sm-4">
							<label>Phone Number</label>
							<input type="text" name="numberO" id="numberO" class="form-control">
						</div>	
					</div>				
					<div class="form-group row break">
						<div class="col-sm-10">
							<label>Proposed Program</label>
							<input type="text" name="proposedProg" id="proposedProg" class="form-control">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-10">
							<label>Courses to be taken at UST</label> (Refer to the <a href="http://www.ust.edu.ph/academics/programs/">UST website</a>)
							<div class="input-group">
							    <span class="input-group-addon">1.</span>
							    <input type="text" name="course1" id="course1" class="form-control">
							</div>
						</div>
						<div class="col-sm-10">
							<div class="input-group">
							    <span class="input-group-addon">2.</span>
							    <input type="text" name="course2" id="course2" class="form-control">
							</div>
						</div>
						<div class="col-sm-10">
							<div class="input-group">
							    <span class="input-group-addon">3.</span>
							    <input type="text" name="course3" id="course3" class="form-control">
							</div>
						</div>
						<div class="col-sm-10">
							<div class="input-group">
							    <span class="input-group-addon">4.</span>
							    <input type="text" name="course4" id="course4" class="form-control">
							</div>
						</div>
						<div class="col-sm-10">
							<div class="input-group">
							    <span class="input-group-addon">5.</span>
							    <input type="text" name="course5" id="course5" class="form-control">
							</div>
						</div>
					</div>
					
					<div class="form-group row break" align="right">
						<div class="col-sm-10">
							<button type="button" class="btn btn-primary">Previous</button>
							<input type="submit" class="btn btn-primary" value="Next">
						</div>
					</div>
				</form>
			</div>
		</div>
	</body>
	<script>
        $(document).ready(function(){    	
        	$("#scholarshipOptions").hide();
        	$("#bilateralOptions").hide();

        	$('#proScholar').click(function(){
	            $("#scholarshipOptions").show();
	            $("#bilateralOptions").hide();
	            $("#proText").prop('disabled', true);
            });	

        	$('#proBilateral').click(function(){
            	$("#bilateralOptions").show();
                $("#scholarshipOptions").hide();
                $("#proText").prop('disabled', true);
            });	

        	$('#proOthers').click(function(){
        		$("#bilateralOptions").hide();
                $("#scholarshipOptions").hide();
        		$("#proText").prop('disabled', false);
        	});
                
        	$('#scholarshipOthers').click(function(){
        	    $("#scholarshipText").prop('disabled', false);
			});

			$('#bilateralOthers').click(function(){
				$("#bilateralText").prop('disabled', false);
			});

        	$('#scholarshipAIMS').click(function(){
        	    $("#scholarshipText").prop('disabled', true);
			});

        	$('#scholarshipSHARE').click(function(){
        	    $("#scholarshipText").prop('disabled', true);
			});				
		});
	</script>
</html>