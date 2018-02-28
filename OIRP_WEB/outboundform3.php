<?php
	$conn = mysqli_connect("localhost", "root", "","oirp_db");
	$db = mysqli_select_db($conn, "oirp_db");
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
	</head>
	<body>
		<script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
		<script src="bootstrap-3.3.7-dist/js/jquery-3.3.1.min.js"></script>
			
		<div class="header">
			<img src='img/logo.png' height=auto>
		</div>
		
		<div class="container-fluid">
			<nav class="col-sm-3 sidebar">
				<ul class="nav nav-stacked">
					<li class="active"><a href="">Personal Information</a></li>
					<li><a href="">Guardian's Information</a></li>
					<li><a href="">Country & University</a></li>
				</ul>
			</nav>
			
			<div class="col-sm-9 container-fluid">
				<form action="#">
					<div class="form-group row">
						<div class="col-sm-5">
							<label>Chosen Country</label>
							<select name="country" id="country" class="form-control">
								<option value="Australia">Australia</option>
								<option value="Bangladesh">Bangladesh</option>
								<option value="Belgium">Belgium</option>
								<option value="Brazil">Brazil</option>
								<option value="Canada">Canada</option>
								<option value="China">China</option>
								<option value="CzechRepublic">Czech Republic</option>
								<option value="Denmark">Denmark</option>
								<option value="France">France</option>
								<option value="Germany">Germany</option>
								<option value="HongKong">Hong Kong S.A.R.</option>
								<option value="India">India</option>
								<option value="Italy">Italy</option>
								<option value="Japan">Japan</option>
								<option value="Macau">Macau S.A.R.</option>
								<option value="Malaysia">Malaysia</option>
								<option value="Mexico">Mexico</option>
								<option value="NewZealand">New Zealand</option>
								<option value="Poland">Poland</option>
								<option value="Singapore">Singapore</option>
								<option value="SouthKorea">South Korea</option>
								<option value="Spain">Spain</option>
								<option value="Sweden">Sweden</option>
								<option value="Taiwan">Taiwan</option>
								<option value="Thailand">Thailand</option>
								<option value="Ukraine">Ukraine</option>
								<option value="UK">United Kingdom</option>
								<option value="USA">United States of America</option>
								<option value="Vietnam">Vietnam</option>

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
							<input type="text" name="proposedProg" id="proposedProg" class="form-control">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-10">
							<label>Courses</label>
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
							<input type="submit" class="btn btn-primary" value="Submit">
						</div>
					</div>
				</form>
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
</html>