<?php
    include 'database_connection.php';
    $sql_query = "SELECT * FROM student INNER JOIN educ_background_inbound ON student.STUDENT_ID = educ_background_inbound.STUDENT_ID";
    $query = mysqli_query($conn, $sql_query);
    
    $sql_query1 = "SELECT * FROM student INNER JOIN proposed_field_study ON student.STUDENT_ID = proposed_field_study.STUDENT_ID";
    $query1 = mysqli_query($conn, $sql_query1);
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
        <div class="">
            <div class="col-xs-6">
                <h2>INBOUND</h2>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="tbl_student_in" >
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Applicationg Program</th>
                                <th>Application Form</th>
                                <th>DATE SUBMITED</th>
                                <th>STATUS</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($row = mysqli_fetch_array($query)){ 
                                $studentID = $row['STUDENT_ID'];
                                $fullname = $row['FAMILY_NAME'].", ".$row['GIVEN_NAME']." ".$row['MIDDLE_NAME'];
                                $ddate = $row['DATE_ENROLL'];
                                $date = new DateTime($ddate);
		                        $resultdate = $date->format('F j, Y,');
                            ?>
                            <tr>
                                <td><?php echo "<a href=admin_student_application.php?studentName=".urlencode($studentID).">".$fullname."</a>" ?></td>
                                <td><?php echo $row['APPLICATION_PROG']; ?></td>
                                <td><?php echo $row['APPLICATION_TYPE_PROG'].": ".$row['APPLICATION_FORM']; ?></td>
                                <td><?php echo $resultdate ?></td>
                                <td></td>
                                <td><form method="post" ><input type="checkbox" name="cb_num[]" value="<?php $studentID ?> " ></form></td>
                            </tr>
                        <?php } ?> 
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
                                <th>Applicationg Program</th>
                                <th>Application Form</th>
                                <th>DATE SUBMITED</th>
                                <th>STATUS</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($row1 = mysqli_fetch_array($query1)){ 
                                $studentID1 = $row1['STUDENT_ID'];
                                $fullname1 = $row1['FAMILY_NAME'].", ".$row1['GIVEN_NAME']." ".$row1['MIDDLE_NAME'];
                                $ddate1 = $row1['DATE_ENROLL'];
                                $date1 = new DateTime($ddate1);
		                        $resultdate1 = $date1->format('F j, Y,');
                            ?>
                            <tr>
                                <td><?php echo "<a href=admin_student_application.php?studentName=".urlencode($studentID1).">".$fullname1."</a>" ?></td>
                                <td><?php echo $row1['APPLICATION_PROG']; ?></td>
                                <td><?php echo $row1['APPLICATION_TYPE_PROG'].": ".$row1['APPLICATION_FORM']; ?></td>
                                <td><?php echo $resultdate1 ?></td>
                                <td></td>
                                <td><form method="post" ><input type="checkbox" name="cb_num[]" value="<?php $studentID1 ?>" ></form></td>
                            </tr>
                        <?php } ?> 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>