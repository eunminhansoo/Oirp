<?php
    include 'database_connection.php';
    //$sql_query = "SELECT * FROM student INNER JOIN educ_background_inbound ON student.STUDENT_ID = educ_background_inbound.STUDENT_ID";
    $sql_query = "SELECT * FROM admin_student_data a INNER JOIN student b ON a.STUDENT_ID = b.STUDENT_ID INNER JOIN educ_background_inbound c ON b.STUDENT_ID = c.STUDENT_ID";
    $query = mysqli_query($conn, $sql_query);
    
    //$sql_query1 = "SELECT * FROM student INNER JOIN proposed_field_study ON student.STUDENT_ID = proposed_field_study.STUDENT_ID";
     $sql_query1 = "SELECT * FROM admin_student_data a INNER JOIN student b ON a.STUDENT_ID = b.STUDENT_ID INNER JOIN proposed_field_study c ON b.STUDENT_ID = c.STUDENT_ID";
    $query1 = mysqli_query($conn, $sql_query1);
    
    if(isset($_POST['delete_inbound'])){
    	if(empty($_POST['cb_num_in'])){
        	echo "<script language='javascript'>(function(){alert('PLEASE SELECT THE CHECKBOX YOU WANT TO DELETE');})();</script>";
        }else {
	    	$checkbox = $_POST['cb_num_in'];
	    	for($i = 0 ; $i < count($checkbox);$i++){
	    		$del_check = $checkbox[$i];
	    		$query_del = mysqli_query($conn, "DELETE FROM admin_student_data WHERE STUDENT_ID = '$del_check'");
	    	}
	    	if($query_del){
	    		echo "success";
	    		echo "<meta http-equiv=\"refresh\" content=\"0;URL=administrator.php\">";
	    	}
        }
    }
    
    if(isset($_POST['delete_outbound'])){
    	if(empty($_POST['cb_num_out'])){
        	echo "<script language='javascript'>(function(){alert('PLEASE SELECT THE CHECKBOX YOU WANT TO DELETE');})();</script>";
    	}else {
	    	$checkbox = $_POST['cb_num_out'];
	    	for($i = 0 ; $i < count($checkbox);$i++){
	    		$del_check = $checkbox[$i];
	    		$query_del1 = mysqli_query($conn, "DELETE FROM admin_student_data WHERE STUDENT_ID = '$del_check'");
	    	}
    	if($query_del1){
	    		echo "success";
	    		echo "<meta http-equiv=\"refresh\" content=\"0;URL=administrator.php\">";
	    	}
        }
    }
    

?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width = device-width, initial-scale = 1">
        <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap-theme.min.css">
        <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap-theme.css">
        <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.css">
        <link rel="icon" href="img/ust.png" type="image/png" sizes="196x196">
    </head>
    <body>
        <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
		<script src="bootstrap-3.3.7-dist/js/jquery-3.3.1.min.js"></script>
        <script src="bootstrap-3.3.7-dist/js/jquery-3.3.1.min.js"></script>
        <form method="post">	  
	        <div class="">
	            <div class="col-xs-6">
	                <h2>INBOUND</h2>
	                <div class="table-responsive">
	                    <table class="table table-striped table-bordered table-hover" id="tbl_student_in" >
	                        <thead>
	                            <tr>
	                                <th>Name</th>
	                                <th>Application Program</th>
	                                <th>Application Form</th>
	                                <th>DATE SUBMITED</th>
	                                <th>STATUS</th>
	                                <th></th>
	                            </tr>
	                        </thead>
	                        <tfoot>
	                        	<tr>
			                        <th><button type="submit" name="delete_inbound" class="btn btn-primary" >DELETE</button></th>
		                        </tr>
	                        </tfoot>
	                        <tbody>
	                            <?php while($row = mysqli_fetch_array($query)){ 
	                                $studentID = $row['STUDENT_ID'];
	                                $fullname = $row['FAMILY_NAME'].", ".$row['GIVEN_NAME']." ".$row['MIDDLE_NAME'];
	                                $ddate = $row['DATE_ENROLL'];
	                                $date = new DateTime($ddate);
									$get_TYPE_OF_PROGRAM = $row['TYPE_OF_PROGRAM'];
									$get_TYPE_OF_FORM = $row['TYPE_OF_FORM'];
			                        $resultdate = $date->format('F j, Y,');
	                            ?>
	                            <tfoot>
	                            <tr>
	                                <td><?php echo "<a href=admin_student_application_in.php?studentName=".urlencode($studentID).">".$fullname."</a>" ?></td>
									<?php
										if($get_TYPE_OF_PROGRAM == 'Others'){
											echo "<td>Bilateral</td>";
											echo "<td>".$row['TYPE_OF_PROG_OTHER']."</td>";
										}else{
											echo "<td>".$get_TYPE_OF_PROGRAM."</td>";
											if($get_TYPE_OF_FORM == 'OTHERS'){
												echo "<td>".$row['TYPE_OF_FORM_OTHER']."</td>";
											}else{
												echo "<td>".$get_TYPE_OF_FORM."</td>";
											}
										}
									?>
	                                <!--<td><?php //echo $row['TYPE_OF_PROGRAM']; ?></td>
	                                <td><?php //echo $row['APPLICATION_TYPE_PROG'].": ".$row['APPLICATION_FORM']; ?></td>-->
									<td><?php echo $resultdate ?></td>
	                                <td><?php?></td>
	                                <td><input type="checkbox" name="cb_num_in[]" value="<?php echo $studentID ?>"></td>
	                            </tr>
	                        <?php } ?>
	                        </tfoot> 
	                        </tbody>
	                    </table>
	                </div>
	            </div>
	            <div class="col-xs-6">
	                <h2>OUTBOUND</h2>
	                <div class="table-responsive">
	                    <table class="table table-striped table-bordered table-hover" id="tbl_student_in" >
	                        <thead>
	                            <tr>
	                                <th>Name</th>
	                                <th>Application Program</th>
	                                <th>Application Form</th>
	                                <th>DATE SUBMITED</th>
	                                <th>STATUS</th>
	                                <th></th>
	                            </tr>
	                        </thead>
	                        <tfoot>
	                        	<tr>
			                        <th><button type="submit" name="delete_outbound" class="btn btn-primary" >DELETE</button></th>
			                        
		                        </tr>
	                        </tfoot>
	                        <tbody>
	                            <?php while($row1 = mysqli_fetch_array($query1)){ 
	                                $studentID1 = $row1['STUDENT_ID'];
	                                $fullname1 = $row1['FAMILY_NAME'].", ".$row1['GIVEN_NAME']." ".$row1['MIDDLE_NAME'];
	                                $ddate1 = $row1['DATE_ENROLL'];
									$get_TYPE_OF_PROGRAM1 = $row1['TYPE_OF_PROGRAM'];
									$get_TYPE_OF_FORM1 = $row1['TYPE_OF_FORM'];
	                                $date1 = new DateTime($ddate1);
			                        $resultdate1 = $date1->format('F j, Y,');
	                            ?>
	                            <tr>
	                                <td><?php echo "<a href=admin_student_application_out.php?studentName=".urlencode($studentID1).">".$fullname1."</a>" ?></td>
									<?php
										if($get_TYPE_OF_PROGRAM1 == 'Others'){
											echo "<td>Bilateral</td>";
											echo "<td>".$row1['TYPE_OF_PROG_OTHER']."</td>";
										}else{
											echo "<td>".$get_TYPE_OF_PROGRAM1."</td>";
											if($get_TYPE_OF_FORM1 == 'OTHERS'){
												echo "<td>".$row1['TYPE_OF_FORM_OTHER']."</td>";
											}else{
												echo "<td>".$get_TYPE_OF_FORM1."</td>";
											}
										}
									?>
	                                <!--<td><?php //echo $row1['APPLICATION_PROG']; ?></td>
	                                <td><?php //echo $row1['APPLICATION_TYPE_PROG'].": ".$row1['APPLICATION_FORM']; ?></td>-->
	                                <td><?php echo $resultdate1 ?></td>
	                                <td></td>
	                                <td><form method="post" ><input type="checkbox" name="cb_num_out[]" value="<?php echo $studentID1 ?>" ></form></td>
	                            </tr>
	                        <?php } ?>
	                        </tbody>
	                        
	                    </table>
	                </div>
	            </div>
	        </div>
        </form>
    </body>
</html>