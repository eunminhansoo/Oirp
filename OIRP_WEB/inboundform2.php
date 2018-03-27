<?php
	include 'inbound_application.php';
	error_reporting(0);
	$sql = "select distinct country from partner_universities order by country asc";
	$result = mysqli_query($conn, $sql);
	
	$res;
	while($row = mysqli_fetch_array($result)) {
		$res .=  "<option value='".$row["country"]."'>".$row["country"]."</option>";
	}
	
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
					<div id="dropdownCU">
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
								<p>Country of origin or home university not available? Click <a href="#" id="toTextCU">here</a>.</p>
							</div>
						</div>
					</div>
					<div id="textCU">
						<div class="form-group row">
							<div class="col-sm-5">
									<label>Country of Origin</label>
									<input type="text" name="countryText" id="countryText" class="form-control">
								</div>
								<div class="col-sm-5">
									<label>Home University</label>
									<input type="text" name="homeUniversityText" id="homeUniversityText" class="form-control">
								</div>
						</div>
					</div>
						<div class="form-group row">
							<div class="col-sm-10">
								<label>University Address</label>
								<input type="text" name="univAddress" id="univAddress" class="form-control" maxlength="120" value="<?php echo $getSel_UNIV_ADD_IN_BILA?>">
							</div>
						</div>
					<div class="form-group row break">
						<div class="col-sm-4">
							<label>Degree Program</label>
							<input type="text" name="program" id="program" class="form-control" value="<?php echo $getSel_CURRENT_PROG_STUDY_IN_BILA?>">
						</div>
						<div class="col-sm-4">
							<label>Major</label>
							<input type="text" name="major" id="major" class="form-control" value=" <?php echo $getSel_SPECIALIZATION_IN_BILA?>">
						</div>
						<div class="col-sm-2">
							<label>Year Level</label>
							<input type="number" name="yearlevel" id="yearlevel" class="form-control" value="<?php echo $getSel_YEAR_LEVEL?>">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-2">
							<label>Type of program:</label>
						</div>
						<div class="col-sm-2">
							<input type="radio" name="type_program" value="Bilateral" id="proBilateral" > Exchange through bilateral agreement
						</div>
						<div class="col-sm-2">
							<input type="radio" name="type_program" value="Scholarship" id="proScholar"> Exchange through scholarship
						</div>
						<div class="col-sm-1">
							<input type="radio" name="type_program" value="Others" id="proOthers"> Others: 
						</div>
						<div class="col-sm-3">
							<input type="text" name="programText" id="proText" class="form-control" disabled>
						</div>
						<div class="col-sm-1">
							<input type="radio" name="type_program" value="" checked="checked" hidden> 
						</div>
					</div>
					<div id="bilateralOptions">
						<div class="form-group row">
							<div class="col-sm-2">
								<label>Bilateral Options:</label>
							</div>
							<div class="col-sm-1">
								<input type="radio" name="bilateral" value="1 Year" id="1year" disabled> 1 year
							</div>
							<div class="col-sm-1">
								<input type="radio" name="bilateral" value="1 Sem" id="1sem" disabled> 1 sem
							</div>
							<div class="col-sm-2">
								<input type="radio" name="bilateral" value="Short Study Abroad" id="shortStudy" disabled> Short Study Abroad
							</div>
							<div class="col-sm-1">
								<input type="radio" name="bilateral" value="" checked="checked" hidden> 
							</div>
						</div>
					</div>
					<div id="scholarshipOptions">	
						<div class="form-group row">
							<div class="col-sm-2">
								<label>Scholarship:</label>
							</div>
							<div class="col-sm-1">
								<input type="radio" name="scholarship" id="scholarshipAIMS" value="AIMS" disabled> AIMS
							</div>
							<div class="col-sm-1">
								<input type="radio" name="scholarship" id="scholarshipSHARE" value="SHARE" disabled> SHARE
							</div>
							<div class="col-sm-1">
								<input type="radio" name="scholarship" id="scholarshipOthers" value="OTHERS" disabled> Others: 
							</div>
							<div class="col-sm-2">
								<input type="text" name="scholarshipText" id="scholarshipText" value="" class="form-control" disabled>
							</div>
							<div class="col-sm-1">
								<input type="radio" name="scholarship" value="" checked="checked" hidden> 
							</div>
						</div>
					</div>
					<div class="form-group row">
						<div id="scholarloanrow">
							<div class="col-sm-4">
								<label>Are you a recipient of scholarship or loan?: </label>
							</div>
							<div class="col-sm-1">
								<input type="radio" name="scholarloan" id="scholarloanYes" value="Yes" disabled> Yes
							</div>
							<div class="col-sm-1">
								<input type="radio" name="scholarloan" id="scholarloanNo" value="No" disabled> No
							</div>
							<div class="col-sm-1">
								Please specify: 
							</div>
							<div class="col-sm-2">
								<input type="text" name="scholarloanText" id="scholarloanText" value="" class="form-control" disabled>
							</div>
							<div class="col-sm-1">
								<input type="radio" name="scholarloan" value="" checked="checked" hidden> 
							</div>
						</div>
					</div>	
									
					<div class="form-group row break">
						<div class="col-sm-6">
							<label>Officer to Contact</label>
							<input type="text" name="officer" id="officer" class="form-control" value="<?php echo $getSel_NAME_OFFICER_CONTACT_IN_BILA?>">
						</div>
						<div class="col-sm-4">
							<label>Designation</label>
							<input type="text" name="designationO" id="designationO" class="form-control" value="<?php echo $getSel_DESIGNATION_IN_BILA?>" >
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-6">
							<label>Email Address</label>
							<input type="email" name="emailO" id="emailO" class="form-control" value="<?php echo $getSel_EMAIL_ADD_IN_BILA?>">
						</div>
						<div class="col-sm-4">
							<label>Phone Number</label>
							<input type="text" name="numberO" id="numberO" class="form-control" value="<?php echo $getSel_TELEPHONE_NUM_BILA?>" >
						</div>	
					</div>				
					
					<div class="form-group row break col-xs-5">
						<div class="col-sm-10">
							<button type="submit" class="btn btn-primary" formaction="inboundform1.php">Previous</button>
						</div>
					</div>
					<div class="form-group row break col-xs-5">
						<div class="col-sm-10">
							<input type="submit" name="btnSaveinform2" class="btn btn-primary" value="Save">
						</div>
					</div>
					<div class="form-group row break col-xs-3">
						<div class="col-sm-10">
							<input type="submit" name="btn_inform2" class="btn btn-primary" value="Next">
						</div>
					</div>
				</form>
			</div>
		</div>
	</body>
	<script>

        $(document).ready(function(){ 
            var val = "<?php echo $res ?>";
			var data = "<?php echo $getSel_COUNTRY_ORIGIN ?>";

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

            $("#textCU").hide();
            	
            $("#toTextCU").click(function(){
    			$("#dropdownCU").hide();
    			$("#textCU").show();
				$("#country").prop('disabled', true);
				$("#homeUniversity").prop('disabled', true);
            });

    			
    		$("#scholarshipOptions").hide();
        	$("#bilateralOptions").hide();
        	$("#scholarloanrow").hide();

        	$('#proScholar').click(function(){
	            $("#scholarshipOptions").show();
	            $("#bilateralOptions").hide();
	            $("#scholarloanrow").hide();
	            $("#proText").prop('disabled', true);
            });	

        	$('#proBilateral').click(function(){
            	$("#bilateralOptions").show();
                $("#scholarshipOptions").hide();
                $("#scholarloanrow").show();
                $("#proText").prop('disabled', true);
            });	

        	$('#proShort').click(function(){
            	$("#bilateralOptions").hide();
                $("#scholarshipOptions").hide();
                $("#scholarloanrow").show();
                $("#proText").prop('disabled', true);
            });

        	$('#proOthers').click(function(){
        		$("#bilateralOptions").hide();
                $("#scholarshipOptions").hide();
                $("#scholarloanrow").show();
        		$("#proText").prop('disabled', false);
				$("#scholarloanYes").prop('disabled', false);
				$("#scholarloanNo").prop('disabled', false);
        	});

        	$('#scholarloanYes').click(function(){
        	    $("#scholarloanText").prop('disabled', false);
			});

        	$('#scholarloanNo').click(function(){
        	    $("#scholarloanText").prop('disabled', true);
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
			$(document).ready(function(){
				$('#proBilateral').click(function(){
					$("#scholarshipAIMS").prop('disabled', true);
					$("#scholarshipSHARE").prop('disabled', true);
					$("#scholarshipOthers").prop('disabled', true);
					$("#1year").prop('disabled', false);
					$("#1sem").prop('disabled', false);
					$("#shortStudy").prop('disabled', false);
					$("#scholarloanYes").prop('disabled', false);
					$("#scholarloanNo").prop('disabled', false);
				});		
			});
			$(document).ready(function(){
				$('#proScholar').click(function(){
					$("#1year").prop('disabled', true);
					$("#1sem").prop('disabled', true);
					$("#shortStudy").prop('disabled', true);
					$("#scholarloanYes").prop('disabled', true);
					$("#scholarloanNo").prop('disabled', true);
					$("#scholarshipAIMS").prop('disabled', false);
					$("#scholarshipSHARE").prop('disabled', false);
					$("#scholarshipOthers").prop('disabled', false);
				});		
			});			
			
		});
	</script>
</html>