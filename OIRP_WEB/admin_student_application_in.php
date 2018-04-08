<?php
    include 'database_connection.php';

    $getStudentID = $_GET['studentName'];

    $sql = "SELECT PDF_IMG FROM upload_pdf WHERE STUDENT_ID = '$getStudentID'";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_array($result)){
        $file = $row['PDF_IMG'];
    }
    
    $query = "SELECT * FROM student WHERE STUDENT_ID= '$getStudentID'";
    $queryBD = mysqli_query($conn, $query);
    $query1 = "SELECT * FROM educ_background_inbound WHERE STUDENT_ID= '$getStudentID'";
    $queryCU = mysqli_query($conn, $query1);               
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
					while($row = mysqli_fetch_array($queryBD)){
						$fullname = $row['FAMILY_NAME'].", ".$row['GIVEN_NAME']." ".$row['MIDDLE_NAME'];
					}
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
			<!--<div class="table-responsive">
				<table class="table table-striped table-bordered table-hover" >
							
						
					<tr>
						<td><h3>FullName:</h3><td>            
						<td><?php //echo $fullname ?></td><br>
						<td><h3>Application:</h3><td><br>
						<td><?php //echo $application_prog ?></td>
						<td><h3>Country:</h3><td>            
						<td><?php //echo $country ?></td><br>
						<td><h3>University:</h3><td><br>
						<td><?php //echo $university ?></td> 
					</tr>
				</table>-->
				<div>
					<form method="post">
						<div>
							<select name="status">
								<option value="Pending">Pending</option>
								<option value="Approved">Approved</option>
								<option value="Denied">Denined</option>
								<option value="On-Going">On-going</option>
								<option value="Completed">Completed</option>
							</select>
						</div>
						<div class="col-xs-4">
							<button type="submit" name="update_status" class="btn btn-primary" >CONFIRM</button>
						</div>
						<div class="col-xs-4">
							<input type="submit" class="btn btn-primary" value="Back" />
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>
<?php
	if(isset($_POST['update_status'])){
		$status = $_POST['status'];

		$query2 = "UPDATE student SET STATUS = '$status' WHERE STUDENT_ID = '$getStudentID'";
		
		mysqli_query($conn, $query2);
		header("Location:admin_student_application_in.php?studentName=$getStudentID");
	}
?>