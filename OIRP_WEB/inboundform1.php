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
	};
	
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
 		
		<div class="header ">
			<img src='img/logo.png' height=auto class="img-responsive" >
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
<<<<<<< HEAD
				<form action="inboundform2.php" id="inboundform1">
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
=======
				<form method="post" id="inboundform1">
				<div class="form-group row">
						<div class="col-sm-5">
							<label>Country of Origin</label>
							<select name="country" id="country" class="form-control">
							
							</select>
>>>>>>> origin/master
						</div>
						<div class="form-group row">
							<div class="col-sm-10">
								<p>Country of origin or home university not available? Click <a href="#" id="toTextCU">here</a>.</p>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<div id="textCU">
							<div class="col-sm-5">
								<label>Country of Origin</label>
								<input type="text" name="country" id="country" class="form-control">
							</div>
							<div class="col-sm-5">
								<label>Home University</label>
								<input type="text" name="homeUniversity" id="homeUniversity" class="form-control">
							</div>				
						</div>
					</div>	
					<div class="form-group row">
						<div class="col-sm-10">
							<label>University Address</label>
							<input type="text" name="univAddress" id="univAddress" class="form-control">
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
					
					<div class="form-group row break">
						<div class="col-sm-6">
							<label>Person to Contact</label>
							<input type="text" name="contactperson" id="contactperson" class="form-control">
						</div>
						<div class="col-sm-4">
							<label>Relationship</label>
							<input type="text" name="relCP" id="relCP" class="form-control">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-10">
							<label>Address</label>
							<input type="text" name="addressPC" id="addressPC" class="form-control">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-6">
							<label>Email Address</label>
							<input type="email" name="emailCP" id="emailCP" class="form-control">
						</div>
						<div class="col-sm-4">
							<label>Phone Number</label>
							<input type="text" name="numberCP" id="numberCP" class="form-control">
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
        	$("#textCU").hide();
        	
        	$("#toTextCU").click(function(){
				$("#dropdownCU").hide();
				$("#textCU").show();
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


        