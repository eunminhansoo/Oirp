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
    $query1 = "SELECT * FROM country_univ_outbound WHERE STUDENT_ID = '$getStudentID'";
    $queryCU = mysqli_query($conn, $query1);   
	$query2 = "SELECT * FROM proposed_field_study WHERE STUDENT_ID = '$getStudentID' "; 
	$queryPF = mysqli_query($conn, $query2);           
?>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width = device-width, initial-scale = 1">
        <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap-theme.min.css">
        <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap-theme.css">
        <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/custom.css">
        <link rel="icon" href="img/ust.png" type="image/png" sizes="196x196">
	</head>
	<body>
		<script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
		<script src="bootstrap-3.3.7-dist/js/jquery-3.3.1.min.js"></script>
		
		<div class="container-responsive">
			<div class="col-sm-7">
				<?php 
					echo "<embed src='images/".$file."'  width='100%' height='100%'>";
				?>
			</div>
			 <div class="col-sm-5">
		    	<p style="margin-top: 80px;"><h2>Basic Information</h2></p>
				<?php
					while($row = mysqli_fetch_array($queryBD)){
						$fullname = $row['FAMILY_NAME'].", ".$row['GIVEN_NAME']." ".$row['MIDDLE_NAME'];
					}
					while($row1 = mysqli_fetch_array($queryCU)){
						$country = $row1['COUNTRY_OUT'];
						$university = $row1['UNIVERSITY_OUT'];
					}
					while($row2 = mysqli_fetch_array($queryPF)){
						$application_prog = $row2['TYPE_OF_PROGRAM'];
						$application_prog_other = $row2['TYPE_OF_PROG_OTHER'];
						$application_form = $row2['TYPE_OF_FORM'];
						$application_form_other = $row2['TYPE_OF_FORM_OTHER'];
					}
				?>
					<br>
					<p>
						<span><b>Full Name:</b></span> <span> <?php echo $fullname?></span>
					</p>
					<p>
						<span><b>Type of Program: </b></span> 
						<span>
							<?php
								if($application_prog == 'Others'){
									echo 'Bilateral';
								}else{
									echo $application_prog;
								}
							?>
						</span>
					</p>
					<p>
						<span><b>Type of Form: </b></span>
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
					</p>
					<p>
						<span><b>Chosen Country: </b></span><span><?php echo $country?></span>
					</p>
					<p>
						<span><b>Chosen University: </b></span><span><?php echo $university?></span>
					</p>
				<!--<div class="table-responsive">
		            <table class="table table-striped table-bordered table-hover" >
						
		            	<tr>
		                    <td><h3>FullName:</h3><td>            
		                    <td><?php //echo $fullname ?></td><br>
		                    <td><h3>Application:</h3><td><br>
		                    <td><?php //echo $application_prog ?></td>
		                    <td><h3>Country Destination:</h3><td>            
		                    <td><?php //echo $country ?></td><br>
		                    <td><h3>University:</h3><td><br>
		                    <td><?php //echo $university ?></td> 
		                </tr>
		            </table>
		        </div>-->
		    </div>
		    <br>
	    </div>        
	</body>
</html>