<?php
	include 'database_connection.php';
	//include 'inbound_application_php.php';

	session_start();
	$getSes_studentID = $_SESSION['$studentID_session'];

	echo $getSes_studentID;

	if(isset($_POST['btn_inform1']))
	{
		$country = $_POST['country'];
		$homeUniversity = $_POST['homeUniversity'];
		$citizenship = $_POST['citizenship'];
		$nationality = $_POST['nationality'];
		$passport = $_POST['passport'];
		$validity = $_POST['validity'];
		$issuance = $_POST['issuance'];
		$address = $_POST['address'];
		$telephone = $_POST['telephone'];
		$mobile = $_POST['mobile'];
		$program = $_POST['program'];
		$major = $_POST['major'];
		$yearlevel = $_POST['yearlevel'];

		mysqli_query($conn, "INSERT INTO personal_info_inbound(STUDENT_COUNT, STUDENT_ID, APPLICATION_PROG, AGE_IN,
		NATIONALITY_IN, PASSPORT_NUM_IN, VALIDITY_DATE_IN, DATE_ISSUANCE_iN, MAILING_ADD_IN, TELEPHONE_NUM_IN, 
		MOBILE_NUM_IN) VALUES('', '$getSes_studentID', '')");
	}
?>
<!--<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width = device-width, initial-scale = 1">
        <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap-theme.min.css">
        <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap-theme.css">
        <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/style.css">
	</head>
	
	<body>
		<script src="bootstrap-3.3.7-dist/js/style.js"></script>
		<script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
		<script src="bootstrap-3.3.7-dist/js/jquery-3.3.1.min.js"></script>	    
				
		<div>
        	<div class="navsticky navbar-topaz">
        		<div class="navbar">
        			<img src="img/SHARE.png">
        		</div>
        	</div>
        </div>
		<form method="post">
			<!-- PERSONAL INFORMATION -->
		<!--	<div class="container">
				<div class="input-group col-xs-8">
					<span class="input-group-addon span-style">Email Address: </span>
					<input type="text" name="email" disabled value="<?php //echo $email?>"  class="form-control"/>
				</div>
				<div class="input-group col-xs-8">
					<span class="input-group-addon span-style">Family Name: </span>
					<input type="text" name="family_name" disabled value="<?php //echo $family_name?>"  class="form-control"/>
				</div>
				<div class="input-group col-xs-8">
					<span class="input-group-addon span-style">Given Name: </span>
					<input type="text" name="given_name" disabled value="<?php// echo $given_name?>"  class="form-control"/>
				</div>
				<div class="input-group col-xs-8">
					<span class="input-group-addon span-style">Middle Name: </span>
					<input type="text" name="middle_name" disabled value="<?php //echo $middle_name?>"  class="form-control"/>
				</div>
				<div class="input-group col-xs-8">
					<span class="input-group-addon span-style">Gender: </span>
					<input type="text" name="gender" disabled value="<?php //echo $gender ?>"  class="form-control"/>
				</div>
				<div class="input-group col-xs-8">
					<span class="input-group-addon span-style">Date of Birth: </span>
					<input type="text" name="birthday" disabled value="<?php //echo base64_decode($birthday)?>"  class="form-control"/>
				</div>
				<div class="form-group">
					<input type="number" name="age" class="input form-control" placeholder="Age" required/>
				</div>
				<div class="form-group">
					<input type="text" name="nationality" class="input form-control" placeholder="Nationality" required/>
				</div>
				<div class="form-group">
					<input type="number" name="passport_num_in" class="input form-control" placeholder="Passport Number" required/>
				</div>
				<div class="form-group">
					<input type="date" name="date_issuance_in" class="input form-control" placeholder="Issuance date of Passport" required/>
				</div>
				<div class="form-group">
					<input type="date" name="validity_date_in" class="input form-control" placeholder="Validity date of Passport" required/>
				</div>
				<div class="form-group">
					<input type="text" name="mailing_add_in" class="input form-control" placeholder="Mailing Address" required/>
				</div>
				<div class="form-group">
					<input type="number" name="telephone_num_in" class="input form-control" placeholder="Telephone Number" required/>
				</div>
				<div class="form-group">
					<input type="number" name="mobile_num_in" class="input form-control" placeholder="Mobile Number" required/>
				</div>
				<div>
					Does your university has an agreement sign with UST?
					<input type="radio" name="application_form" value="yes"> Yes
					<input type="radio" name="application_form" value="no"> No
				</div>				
        	</div>
		
			<!-- EDUCATIONAL BACKGROUND -->
			<!--<div class="container">
				<div class="form-group">
					<span class="input-group-addon span-style">Home University </span>
					<input type="text" name="home_univ_in" class="input from-control" />
				</div>
				<div class="form-group">
					<span class="input-group-addon span-style">Degree Program </span>
					<input type="text" name="degree_prog_in" class="input from-control" />
				</div>
				<div class="form-group">
					<span class="input-group-addon span-style">Major </span>
					<input type="text" name="major_in" class="input from-control" />
				</div>
				<div class="form-group">
					<span class="input-group-addon span-style">Year Level </span>
					<input tyep="text" name="year_level_in" class="input from-control" />
				</div>
			</div>
			<!-- PROPOSED PROGRAM-->
			<!--<div>
				<div class="form-group">
					<span class="input-group-addon span-style">Proposed Program </span>
					<input type="text" name="year_level_in" class="input from-control" />
				</div>
			</div>
		</form>
	</body>
</html>-->