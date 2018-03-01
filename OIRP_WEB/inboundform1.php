<?php
	include 'inbound_application.php';
	//include 'database_connection.php';

	$conn = mysqli_connect("localhost", "root", "");
	$db = mysqli_select_db($conn, "oirp_db");
	error_reporting(0);
	
	$sql = "select distinct country from partner_universities order by country asc";
	$result = mysqli_query($conn, $sql);
	
	$res;
	while($row = mysqli_fetch_array($result)) {
		$res .=  "<option value='".$row["country"]."'>".$row["country"]."</option>";
	}
	echo $res;
	
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
			<div class="col-sm-3 navbar" role="navigation">
				<ul class="nav nav-stacked">
					<li class="active"><a href="inboundform1.php">Personal Information</a></li>
					<li class="disabled"><a href="">Proposed Field of Study</a></li>
					<li class="disabled"><a href="">English Proficiency</a></li>
				</ul>
			</div>
			
			<div class="col-sm-9 container-fluid">
				<form method="post" id="inboundform1">
				<div class="form-group row">
						<div class="col-sm-5">
							<label>Country of Origin</label>
							<select name="country" id="country" class="form-control">
							
							</select>
						</div>
						<div class="col-sm-5">
							<label>Home University</label>
							<select name="homeUniversity" id="homeUniversity" class="form-control">
							
							</select>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-10">
							<p>Country of origin or home university not available? Click <a href="inboundbilateral1.php">here</a>.</p>
						</div>
					</div>
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
						<div class="col-sm-3">
							<label>Are you a scholar?</label>
						</div>
						<div class="col-sm-1">
							<input type="radio" name="scholar" id="scholarYes" value="yes"> Yes
						</div>
						<div class="col-sm-1">
							<input type="radio" name="scholar" id="scholarNo" value="no"> No
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
						<div class="col-sm-3">
							<label>Type of program you are interested in:</label>
						</div>
						<div class="col-sm-3">
							<input type="radio" name="program" value="shortstudy"> Short Study Abroad
						</div>
						<div class="col-sm-3">
							<input type="radio" name="program" value="exchange"> Student Exchange Program
						</div>
					</div>
					
					<div class="form-group row break" align="right">
						<div class="col-sm-10">
							<button type="button" class="btn btn-primary disabled">Previous</button>
							<input type="submit" name="btn_inform1" class="btn btn-primary" value="Next">
						</div>
					</div>
				</form>
			</div>
		</div>
	</body>
	<script>
        $(document).ready(function(){    	
        	$("#scholarshipOptions").hide();

        	$('#scholarYes').click(function(){
	            $("#scholarshipOptions").show();
            });	

        	$('#scholarNo').click(function(){
                $("#scholarshipOptions").hide();
            });	
                
        	$('#scholarshipOthers').click(function(){
        	    $("#scholarshipText").prop('disabled', false);
			});

        	$('#scholarshipAIMS').click(function(){
        	    $("#scholarshipText").prop('disabled', true);
			});

        	$('#scholarshipSHARE').click(function(){
        	    $("#scholarshipText").prop('disabled', true);
			});

        	var val = "<?php echo $res ?>";
        	$("#country").empty().append(val);
				
			$("#country").change(function(){
				$.ajax({
					type: "POST",
				    url: "universities.php",   
				    data: {
				    	country: $("#country").val(),
				    },
				        success: function(e) {
					    	$('#homeUniversity').empty();
				            $('#homeUniversity').append(e);
				        },
				    	error: function(response) {
				            alert("error");
				        }
					});
				}).trigger('change');				
			});
		</script>
</html>


        