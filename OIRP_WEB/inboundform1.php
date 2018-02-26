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
		<script src="bootstrap-3.3.7-dist/js/bootstrap.js"></script>
		<script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
        <script src="bootstrap-3.3.7-dist/js/jquery-3.3.1.min.js"></script>
        
        <script>
        	$(document).ready(function(){
				$("#universityAustralia").hide();
				
				$("#country").change(function(){
					var val = $(this).val();
					if(val == "Taiwan"){
						$("#universityAustralia").show();
					}
				}).trigger('change');
			});
		</script>
		
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
				<form action="inboundform2.php">
				<div class="form-group row">
						<div class="col-sm-5">
							<label>Country of Origin</label>
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
							<label>Home University</label>
							<select name="homeUniversity" id="universityAustralia" class="form-control">								<option value="">Charles Sturt University</option>
								<option value="">Curtin University</option>
								<option value="">Deakin University</option>
								<option value="">Griffith University</option>
								<option value="">Joanna Briggs Institute</option>
								<option value="">Macquarie University</option>
								<option value="">Queensland University of Technology</option>
								<option value="">RMIT University</option>
								<option value="">University of Canberra</option>
								<option value="">University of New Castle</option>
								<option value="">University of South Australia</option>
								<option value="">University of the Sunshine Coast</option>
								<option value="">University of Wollongong</option>
								<option value="">Victoria University</option>
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
</html>