<?php
	include 'outbound_application.php';
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
	
	$sql = "select distinct country from share_universities order by country asc";
	$result = mysqli_query($conn, $sql);
	
	$share;
	while($row = mysqli_fetch_array($result)) {
		$share .=  "<option value='".$row["country"]."'>".$row["country"]."</option>";
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
			<a href="index.php"><img src='img/logo.png' height=auto class="img-responsive"></a>	
		</div>
		<!--START OF NAVBAR-->
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
		<!--END OF NAVBAR-->
		
		<div class="container-fluid">
			<nav class="col-sm-2 sidebar">
				<ul class="nav nav-stacked">
					<li><a href="outboundform1.php">Personal Information</a></li>
					<li><a href="outboundform2.php">Guardian's Information</a></li>
					<li class="active"><a href="outboundform3.php">Proposed Field of Study</a></li>
				</ul>
			</nav>
			
			<div class="col-sm-9 container-fluid">
				<form method="post">
					<div class="form-group row">
						<div class="col-sm-2">
							<label>Type of program: <span class="required">*</span></label>
						</div>
						<div class="col-sm-2">
							<input type="radio" name="type_program" value="Scholarship" id="proScholar"> Exchange through Scholarship
						</div>
						<div class="col-sm-2">
							<input type="radio" name="type_program" value="ShortStudy" id="ShortStudy" required> Short Study Abroad 
						</div>
						<div class="col-sm-2">
							<input type="radio" name="type_program" value="StudyTour" id="StudyTour" required> Study Tour 
						</div>
						<div class="col-sm-2">
							<input type="radio" name="type_program" value="ServiceLearning" id="ServiceLearning" required> Service Learning
						</div>
						<div class="col-sm-1">
							<input type="radio" name="type_program" value="" checked="checked" hidden> 
						</div>
					</div>
					<div id="bilateralOptions">
						<div class="form-group row">
							<div class="col-sm-2">
								<label>Duration:</label>
							</div>
							<div class="col-sm-2">
								<input type="radio" name="bilateral" value="1 Sem" id="1sem" disabled> 1 Sem
							</div>
							<div class="col-sm-1">
								<input type="radio" name="bilateral" value="Others" id="othersBi" disabled> Others: 
							</div>
							<div class="col-sm-2">
								<input type="text" name="bilateralText" id="biText" class="form-control" pattern="[^<>=]{1,20}" maxlength="20" value=" " disabled>
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
								<input type="radio" name="scholarship" id="scholarshipUMAP" value="UMAP" disabled> UMAP
							</div>
							<div class="col-sm-1">
								<input type="radio" name="scholarship" id="scholarshipOthers" value="OTHERS" disabled> Others: 
							</div>
							<div class="col-sm-2">
								<input type="text" name="scholarshipText" id="scholarshipText" class="form-control" value=" " pattern="[^<>=]{1,20}" maxlength="20" disabled>
							</div>
							<div class="col-sm-1">
								<input type="radio" name="scholarship" value="" checked="checked" hidden> 
							</div>
						</div>
					</div>
					<div class="form-group row">
						<div id="scholarloanrow">
							<div class="col-sm-4">
								<label>Are you a recipient of scholarship?: </label>
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
					<div class="form-group row" id="countrydiv">
						<div class="col-sm-5">
							<label>Chosen Country <span class="required">*</span></label>
							<select name="country" id="country" class="form-control">
							
							</select>
						</div>
						<div class="col-sm-5">
							<label>Chosen University <span class="required">*</span></label>
							<select name="university" id="university" class="form-control">
								
							</select>
						</div>
					</div>
					<div class="form-group row" id="sharediv">
						<div class="col-sm-5">
							<label>Chosen Country <span class="required">*</span></label>
							<select name="shcountry" id="shcountry" class="form-control">
							
							</select>
						</div>
						<div class="col-sm-5">
							<label>Chosen University <span class="required">*</span></label>
							<select name="shuniversity" id="shuniversity" class="form-control">
							
							</select>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-10">
							<label>Proposed Program <span class="required">*</span></label>
							<input type="text" name="proposedProg" id="proposedProg" class="form-control" pattern="[^<>=]{1,45}" maxlength="45" value="<?php echo $getSel_PROPOSED_PROG?>" required>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-10">
							<label>Courses <span class="required">*</span></label>
							<div class="input-group">
							    <span class="input-group-addon">1.</span>
							    <input type="text" name="course1" id="course1" class="form-control" pattern="[^<>=]{1,45}" maxlength="45" value="<?php echo $getSel_COURSE_1?>" required>
							</div>
						</div>
						<div class="col-sm-10">
							<div class="input-group">
							    <span class="input-group-addon">2.</span>
							    <input type="text" name="course2" id="course2" class="form-control" pattern="[^<>=]{1,45}" maxlength="45" value="<?php echo $getSel_COURSE_2?>">
							</div>
						</div>
						<div class="col-sm-10">
							<div class="input-group">
							    <span class="input-group-addon">3.</span>
							    <input type="text" name="course3" id="course3" class="form-control" pattern="[^<>=]{1,45}" maxlength="45" value="<?php echo $getSel_COURSE_3?>">
							</div>
						</div>
						<div class="col-sm-10">
							<div class="input-group">
							    <span class="input-group-addon">4.</span>
							    <input type="text" name="course4" id="course4" class="form-control" pattern="[^<>=]{1,45}" maxlength="45" value="<?php echo $getSel_COURSE_4?>">
							</div>
						</div>
						<div class="col-sm-10">
							<div class="input-group">
							    <span class="input-group-addon">5.</span>
							    <input type="text" name="course5" id="course5" class="form-control" pattern="[^<>=]{1,45}" maxlength="45" value="<?php echo $getSel_COURSE_5?>">
							</div>
						</div>
					</div>
					
					
					
					<div class="form-group row break col-xs-4">
						<div class="col-sm-10">
							<button type="submit" class="btn btn-primary btn-block shadowbtn" formaction="outboundform2.php">Previous</button>
						</div>
					</div>
					<div class="form-group row break col-xs-4">
						<div class="col-sm-10">
							<input type="submit" name="btnSaveoutform3" class="btn btn-warning btn-block shadowbtn" value="Save">
						</div>
					</div>
					<div class="form-group row break col-xs-4">
						<div class="col-sm-10">
							<input type="submit" name="btn_form3" class="btn btn-success btn-block shadowbtn" value="Next">
						</div>
					</div>
					
				</form>
			</div>
		</div>
		</div>
	</body>
	<?php
		$get_query = "SELECT * FROM proposed_field_study WHERE STUDENT_ID = '$getses_StudentID'";
		$get_db = mysqli_query($conn, $get_query);
		while($rrow = mysqli_fetch_array($get_db)){
			$type_prog = $rrow['TYPE_OF_PROGRAM'];
		}
	?>
	<script>
		var typeProg = "<?php echo $type_prog?>";
		$(document).ready(function(){
			var val = "<?php echo $res ?>";
			var sh = "<?php echo $share ?>";

			$("#country").empty().append(val);
			$("#shcountry").empty().append(sh);

			$("#sharediv").hide();
			
			$("#scholarshipSHARE").click(function(i){
				$("#sharediv").show();
				$("#countrydiv").hide();
			});

			
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

			$("#shcountry").change(function(){
			    $.ajax({
				    type: "POST",
			        url: "share_universities.php",   
			        data: {
				        shcountry: $("#shcountry").val(),
			       	},
			        success: function(e) {
				        $('#shuniversity').empty();
			            $('#shuniversity').append(e);
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