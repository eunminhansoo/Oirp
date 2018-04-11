<?php
	include 'outbound_application.php';
	
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
			
		<div class="">
		<div class="header">
			<a href="index.php"><img src='img/logo.png' height=auto class="img-responsive"></a>	
		</div>
		
		<div class="container-fluid">
			<nav class="col-sm-2 sidebar">
				<ul class="nav nav-stacked">
					<li><a href="outboundform1.php">Personal Information</a></li>
					<li><a href="outboundform2.php">Guardian's Information</a></li>
					<li><a href="outboundform3.php">Proposed Field of Study</a></li>
				</ul>
			</nav>
			
			<div class="col-sm-9 container-fluid">
				<form method="post">
					<div class="form-group row">
						<div class="col-sm-2">
							<label>Type of program:</label>
						</div>
						<div class="col-sm-2">
							<input type="radio" name="type_program" value="Bilateral" id="proBilateral" required> Exchange through bilateral agreement
						</div>
						<div class="col-sm-2">
							<input type="radio" name="type_program" value="Scholarship" id="proScholar"> Exchange through scholarship
						</div>
						<div class="col-sm-1">
							<input type="radio" name="type_program" value="Others" id="proOthers"> Others: 
						</div>
						<div class="col-sm-3">
							<input type="text" name="programText" id="proText" class="form-control" pattern="[^<>].{1,20}" value="<?php echo $getSel_TYPE_OF_PROG_OTHER?>" maxlength="20" disabled>
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
								<input type="radio" name="bilateral" value="1 Year" id="1year" disabled> 1 Year
							</div>
							<div class="col-sm-1">
								<input type="radio" name="bilateral" value="1 Sem" id="1sem" disabled> 1 Sem
							</div>
							<div class="col-sm-1">
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
								<input type="text" name="scholarshipText" id="scholarshipText" class="form-control" value="<?php echo $getSel_TYPE_OF_FORM_OTHER?>" pattern="[^<>].{1,20}" maxlength="20" disabled>
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
								<input type="text" name="scholarloanText" id="scholarloanText" class="form-control" value="<?php echo $getSel_SCHOLARSHIP_LOAN_OTHER?>" pattern="[^<>].{1,20}" maxlength="20" disabled>
							</div>
							<div class="col-sm-1">
								<input type="radio" name="scholarloan" value="" checked="checked" hidden> 
							</div>
						</div>
					</div>
					<div class="form-group row">
						<div id="scholarloanrow1">
							<div class="col-sm-4">
								<label>Are you a recipient of scholarship or loan?: </label>
							</div>
							<div class="col-sm-1">
								<input type="radio" name="scholarloan1" id="scholarloanYes1" value="Yes" disabled> Yes
							</div>
							<div class="col-sm-1">
								<input type="radio" name="scholarloan1" id="scholarloanNo1" value="No" disabled> No
							</div>
							<div class="col-sm-1">
								Please specify: 
							</div>
							<div class="col-sm-2">
								<input type="text" name="scholarloanText1" id="scholarloanText1" class="form-control" value="<?php echo $getSel_SCHOLARSHIP_LOAN_OTHER1?>" pattern="[^<>].{1,20}" maxlength="20" disabled>
							</div>
							<div class="col-sm-1">
								<input type="radio" name="scholarloan1" value="" checked="checked" hidden> 
							</div>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-5">
							<label>Chosen Country</label>
							<select name="country" id="country" class="form-control">
						
							</select>
						</div>
						<div class="col-sm-5">
							<label>Chosen University</label>
							<select name="university" id="university" class="form-control">
							
							</select>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-10">
							<label>Proposed Program</label>
							<input type="text" name="proposedProg" id="proposedProg" class="form-control" pattern="[^<>].{1,45}" maxlength="45" value="<?php echo $getSel_PROPOSED_PROG?>" required>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-10">
							<label>Courses</label>
							<div class="input-group">
							    <span class="input-group-addon">1.</span>
							    <input type="text" name="course1" id="course1" class="form-control" pattern="[^<>].{1,45}" maxlength="45" value="<?php echo $getSel_COURSE_1?>">
							</div>
						</div>
						<div class="col-sm-10">
							<div class="input-group">
							    <span class="input-group-addon">2.</span>
							    <input type="text" name="course2" id="course2" class="form-control" pattern="[^<>].{1,45}" maxlength="45" value="<?php echo $getSel_COURSE_2?>">
							</div>
						</div>
						<div class="col-sm-10">
							<div class="input-group">
							    <span class="input-group-addon">3.</span>
							    <input type="text" name="course3" id="course3" class="form-control" pattern="[^<>].{1,45}" maxlength="45" value="<?php echo $getSel_COURSE_3?>">
							</div>
						</div>
						<div class="col-sm-10">
							<div class="input-group">
							    <span class="input-group-addon">4.</span>
							    <input type="text" name="course4" id="course4" class="form-control" pattern="[^<>].{1,45}" maxlength="45" value="<?php echo $getSel_COURSE_4?>">
							</div>
						</div>
						<div class="col-sm-10">
							<div class="input-group">
							    <span class="input-group-addon">5.</span>
							    <input type="text" name="course5" id="course5" class="form-control" pattern="[^<>].{1,45}" maxlength="45" value="<?php echo $getSel_COURSE_5?>">
							</div>
						</div>
					</div>
					
					
					
					<div class="form-group row break col-xs-4">
						<div class="col-sm-10">
							<button type="submit" class="btn btn-primary" formaction="outboundform2.php">Previous</button>
						</div>
					</div>
					<div class="form-group row break col-xs-4">
						<div class="col-sm-10">
							<input type="submit" name="btnSaveoutform3" class="btn btn-primary" value="Save">
						</div>
					</div>
					<div class="form-group row break col-xs-4">
						<div class="col-sm-10">
							<input type="submit" name="btn_form3" class="btn btn-primary" value="Submit">
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
	   		$("#country").empty().append(val);
			
			$("#country").change(function(){
			    $.ajax({
				    type: "POST",
			        url: "universities.php",   
			        data: {
				        country: $("#country").val(),
			       	},
			        success: function(e) {
				        $('#university').empty();
			            $('#university').append(e);
			        },
			        error: function(response) {
			            alert("error");
			        }
				});
			}).trigger('change');
		});
	</script>
	<?php
		include 'bootstrap-3.3.7-dist/js/actionRadio.php';
	?>
</html>