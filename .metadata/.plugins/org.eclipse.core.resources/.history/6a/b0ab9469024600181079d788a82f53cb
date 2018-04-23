<?php
    include 'database_connection.php';

    $getStudentID = $_GET['studentName'];
    session_start();
	$college = $_SESSION['coll_sess'];

    $sql = "SELECT PDF_IMG FROM upload_pdf WHERE STUDENT_ID = '$getStudentID'";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_array($result)){
        $file = $row['PDF_IMG'];
    }
    
    $query = "SELECT * FROM student WHERE STUDENT_ID= '$getStudentID'";
    $queryBD = mysqli_query($conn, $query);
    $query1 = "SELECT * FROM educ_background_inbound WHERE STUDENT_ID= '$getStudentID'";
    $queryCU = mysqli_query($conn, $query1);  

	$query2 = "SELECT * FROM proposed_field_study_in_bila WHERE STUDENT_ID= '$getStudentID'";
    $queryPF = mysqli_query($conn, $query2); 
    
    while($row = mysqli_fetch_array($queryBD)){
    	$familyName = $row['FAMILY_NAME'];
    	$givenName = $row['GIVEN_NAME'];
    	
		$fullname = $row['FAMILY_NAME'].", ".$row['GIVEN_NAME']." ".$row['MIDDLE_NAME'];
	}
		
	if(isset($_POST['update_status'])){
<<<<<<< Updated upstream
		$status = $_POST['status'];

		$query2 = "UPDATE student SET STATUS = '$status'";
=======
		$status = $_POST['status']; 
		$query2 = "UPDATE student SET STATUS = '$status'
		WHERE STUDENT_ID = '$getStudentID'";
>>>>>>> Stashed changes
		
		//insert to comment
		$query_notification = "INSERT INTO notification(STUDENT_COUNT,
		STUDENT_ID,
		LASTNAME,
		FIRSTNAME,
		COMMENT_STATUS,
		APPLICATION_FORM,
		COLLEGE
		) VALUES (
			'',
			'$getStudentID',
			'$familyName',
			'$givenName',
			'',
			'',
			'$college'
		)";
		
    	$comment = mysqli_query($conn, $query_notification);
    	//end of insert comment
		
		$query_db = mysqli_query($conn, $query2);
	}        

?>
<html>
	<head>
	<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width = device-width, initial-scale = 1">
        <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/custom.css">
        <link rel="icon" href="img/ust.png" type="image/png" sizes="196x196">
	</head>
	<body>
		<div class="col-xs-5">
			<?php 
				echo "<embed src='images/".$file."' width='800px' height='100%'>";
			?>
		</div>
		<div class="col-xs-push-3 col-xs-5">
			<h2>Basic Information</h2>
				<?php
					
					while($row1 = mysqli_fetch_array($queryCU)){
						$application_prog = $row1['TYPE_OF_PROGRAM'];
						$application_prog_other = $row1['TYPE_OF_PROG_OTHER'];
						$application_form = $row1['TYPE_OF_FORM'];
						$application_form_other = $row1['TYPE_OF_FORM_OTHER'];
						$country = $row1['COUNTRY_ORIGIN'];
						$university = $row1['HOME_UNIV_IN_BILA'];
					}
				?>
				<div>
					<span><b>Full Name:</b></span> <span> <?php echo $fullname?></span>
				</div>
				<div>
					<span><b>Type of Program:</b></span> 
					<span>
						<?php
							if($application_prog == 'Others'){
								echo 'Bilateral';
							}else{
								echo $application_prog;
							}
						?>
					</span>
				</div>
				<div>
					<span><b>Type of Form:</b></span>
					<span>
						<?php  
							if($application_prog == 'Others'){
								echo $application_prog_other;
							}else{
								if($application_form == 'OTHERS'){
									echo $application_form_other;
								}else{
									echo $application_form;
								}
							}
						?>
					</span>
				</div>
				<div>
					<span><b>Country of Origin:</b></span><span><?php echo $country?></span>
				</div>
				<div>
					<span><b>Home University:</b></span><span><?php echo $university?></span>
				</div>
				<div>
					<form method="post">
						<div>
							<select name="status">
								<option value="Qualified">Qualified</option>
								<option value="Not-Qualified">Not-Qualified</option>
							</select>
						</div>
						<div class="col-xs-9">
							<div class="col-xs-6">
								<button type="submit" name="update_status" class="btn btn-primary" >CONFIRM</button>
							</div>
							<div class="col-xs-4">
								<input type="submit" class="btn btn-primary" value="Back" formaction="administrator_college.php" />
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>
<?php
	
?>