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
	<body>
		<?php 
			echo "<embed src='images/".$file."' style=\"height:100%\" width=\"width:100%\">";
		?>
		
		 <div class="col-xs-6">
	                <h2>Basic Information</h2>
		<div class="table-responsive">
	                    <table class="table table-striped table-bordered table-hover" >
	                    
	                    <?php
	                     while($row = mysqli_fetch_array($queryBD)){
	                                $fullname = $row['FAMILY_NAME'].", ".$row['GIVEN_NAME']." ".$row['MIDDLE_NAME'];
	                                $application_prog =$row['APPLICATION_PROG'];
	                    }
	                    while($row = mysqli_fetch_array($queryCU)){
	                    	$country = $row['COUNTRY_ORIGIN'];
	                    	$university = $row['HOME_UNIV_IN_BILA'];
	                    }
	                     ?>
	                    <tr>
	                    <td><h3>FullName:</h3><td>            
	                    <td><?php echo $fullname ?></td><br>
	                    <td><h3>Application:</h3><td><br>
	                    <td><?php echo $application_prog ?></td>
	                    <td><h3>Country:</h3><td>            
	                    <td><?php echo $country ?></td><br>
	                    <td><h3>University:</h3><td><br>
	                    <td><?php echo $university ?></td> 
	                    </tr>
	                 </table>
	                 </div>
	                 </div>
	                 <br>
	                 
	</body>
</html>