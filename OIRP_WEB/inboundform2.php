<?php
	include 'inbound_application.php';
	include 'logout.php';
	
	$familyName;
	$givenName;
	
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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>    
				
		<div class="">
		<div class="header">
			<img src='img/logo.png' class="img-responsive">
		</div>
		<!-- START NAVIGATOR BAR -->
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
		<!--START CONTENT -->
		
		<div class="container-fluid">
			<nav class="col-sm-2 sidebar">
				<ul class="nav nav-stacked">
					<li><a href="inboundform1.php">Personal Information</a></li>
					<li class="active"><a href="inboundform2.php">Educational Backround</a></li>
					<li><a href="inboundform3.php">Proposed Field of Study</a></li>
					<li><a href="inboundform4.php">English Proficiency & Medical Information</a></li>
					<li><a href="inboundform5.php">Expectations from the Program</a></li>
				</ul>
			</nav>

			<div class="col-sm-9 container-fluid">
				<form method="post">
					<div id="dropdownCU">
						<div class="form-group row">
							<div class="col-sm-5">
								<label>Country of Origin <span class="required">*</span></label>
								<select name="country" id="country" class="form-control">
									
								</select>
							</div>
							<div class="col-sm-5">
								<label>Home University <span class="required">*</span></label>
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
									<label>Country of Origin <span class="required">*</span></label>
									<input type="text" name="countryText" id="countryText" class="form-control" pattern="[^<>=]{1,30}" maxlength="30">
								</div>
								<div class="col-sm-5">
									<label>Home University <span class="required">*</span></label>
									<input type="text" name="homeUniversityText" id="homeUniversityText" class="form-control" pattern="[^<>=]{1,115}" maxlength="115">
								</div>
						</div>
					</div>
						<div class="form-group row">
							<div class="col-sm-10">
								<label>University Address <span class="required">*</span></label>
								<input type="text" name="univAddress" id="univAddress" class="form-control" pattern="[^<>=]{1,115}" maxlength="115" required value="<?php echo $getSel_UNIV_ADD_IN_BILA?>">
							</div>
						</div>
					<div class="form-group row break">
						<div class="col-sm-4">
							<label>Degree Program <span class="required">*</span></label>
							<input type="text" name="program" id="program" class="form-control" pattern="[^<>=]{1,45}" maxlength="45" required value="<?php echo $getSel_CURRENT_PROG_STUDY_IN_BILA?>">
						</div>
						<div class="col-sm-4">
							<label>Major</label>
							<input type="text" name="major" id="major" class="form-control" pattern="[^<>=]{1,30}" maxlength="30" value=" <?php echo $getSel_SPECIALIZATION_IN_BILA?>">
						</div>
						<div class="col-sm-2">
							<label>Year Level <span class="required">*</span></label>
							<input type="number" name="yearlevel" id="yearlevel" class="form-control" min="1" max="10" required value="<?php echo $getSel_YEAR_LEVEL?>">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-2">
							<label>Type of program: <span class="required">*</span></label>
						</div>
						<div class="col-sm-2">
							<input type="radio" name="type_program" value="Scholarship" id="proScholar" required> Exchange through Scholarship
						</div>
						<div class="col-sm-2">
							<input type="radio" name="type_program" value="ShortStudy" id="ShortStudy" > Short Study Abroad 
						</div>
						<div class="col-sm-2">
							<input type="radio" name="type_program" value="StudyTour" id="StudyTour" > Study Tour 
						</div>
						<div class="col-sm-2">
							<input type="radio" name="type_program" value="ServiceLearning" id="ServiceLearning" > Service Learning
						</div>
						<div class="col-sm-1">
							<input type="radio" name="type_program" value="" checked="checked" hidden> 
						</div>
					</div>
					<div id="bilateralOptions">
						<div class="form-group row">
							<div class="col-sm-2">
								<label>Duration: <span class="required">*</span></label>
							</div>
							<div class="col-sm-2">
								<input type="radio" name="bilateral" value="1 Sem" id="1sem" disabled> 1 Sem
							</div>
							<div class="col-sm-1">
								<input type="radio" name="bilateral" value="Others" id="othersBi" disabled> Others: 
							</div>
							<div class="col-sm-2">
								<input type="text" name="bilateralText" id="biText" class="form-control" pattern="[^<>=]{1,20}" maxlength="20" value="<?php echo $getSel_TYPE_OF_FORM_OTHER?>" disabled>
							</div>
							<div class="col-sm-1">
								<input type="radio" name="bilateral" value="" checked="checked" hidden> 
							</div>
						</div>
					</div>
					<div id="scholarshipOptions">	
						<div class="form-group row">
							<div class="col-sm-2">
								<label>Scholarship: <span class="required">*</span></label>
							</div>
							<div class="col-sm-1">
								<input type="radio" name="scholarship" id="scholarshipAIMS" value="AIMS" disabled> AIMS
							</div>
							<div class="col-sm-1">
								<input type="radio" name="scholarship" id="scholarshipSHARE" value="SHARE" disabled> SHARE
							</div>
							<div class="col-sm-1">
								<input type="radio" name="scholarship" id="scholarshipUMAP" value="UMAP" disabled> UMAP
							</div>
							<div class="col-sm-1">
								<input type="radio" name="scholarship" id="scholarshipOthers" value="OTHERS" disabled> Others: 
							</div>
							<div class="col-sm-2">
								<input type="text" name="scholarshipText" id="scholarshipText" class="form-control" value="<?php echo $getSel_TYPE_OF_FORM_OTHER?>" pattern="[^<>=]{1,20}" maxlength="20" disabled>
							</div>
							<div class="col-sm-1">
								<input type="radio" name="scholarship" value="" checked="checked" hidden> 
							</div>
						</div>
					</div>
					<div class="form-group row">
						<div id="scholarloanrow">
							<div class="col-sm-4">
								<label>Are you a recipient of scholarship?: <span class="required">*</span></label>
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
								<input type="text" name="scholarloanText" id="scholarloanText" class="form-control" value="<?php echo $getSel_SCHOLARSHIP_LOAN_OTHER?>" pattern="[^<>=]{1,20}" maxlength="20" disabled>
							</div>
							<div class="col-sm-1">
								<input type="radio" name="scholarloan" value="" checked="checked" hidden> 
							</div>
						</div>
					</div>
					<div class="form-group row break">
						<div class="col-sm-6">
							<label>Person to Contact from International Office <span class="required">*</span></label>
							<input type="text" name="officer" id="officer" class="form-control" pattern="[^0-9<>=]{1,20}" maxlength="60" required value="<?php echo $getSel_NAME_OFFICER_CONTACT_IN_BILA?>">
						</div>
						<div class="col-sm-4">
							<label>Designation <span class="required">*</span></label>
							<input type="text" name="designationO" id="designationO" class="form-control"  pattern="[^<>=]{1,25}" maxlength="25" required value="<?php echo $getSel_DESIGNATION_IN_BILA?>">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-6">
							<label>Email Address <span class="required">*</span></label>
							<input type="email" name="emailO" id="emailO" class="form-control" required value="<?php echo $getSel_EMAIL_ADD_IN_BILA_OFFIC?>">
						</div>
						<div class="col-sm-4">
							<label>Phone Number <span class="required">*</span></label>
							<input type="text" name="numberO" id="numberO" class="form-control" placeholder="ex: +63 2-406-1611 or +63 974-887-6512" pattern="([+]\d{1,4})([\d\s-+]{7,15})" maxlength=40 required value="<?php echo $getSel_TELEPHONE_NUM_BILA?>">
						</div>	
					</div>				
					
					<div class="form-group row break col-xs-4">
						<div class="col-sm-10">
							<button type="submit" class="btn btn-primary btn-block shadowbtn" formaction="inboundform1.php">Previous</button>
						</div>
					</div>
					<div class="form-group row break col-xs-4">
						<div class="col-sm-10">
							<input type="submit" name="btnSaveinform2" class="btn btn-warning btn-block shadowbtn" value="Save">
						</div>
					</div>
					<div class="form-group row break col-xs-4">
						<div class="col-sm-10">
							<input type="submit" name="btn_inform2" class="btn btn-success btn-block shadowbtn" value="Next">
						</div>
					</div>
				</form>
			</div>
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
		});
	</script>
	<?php
		include 'bootstrap-3.3.7-dist/js/actionRadio.php';
	?>
</html>