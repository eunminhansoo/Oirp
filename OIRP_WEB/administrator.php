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
    </head>
    <body>
        <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
		<script src="bootstrap-3.3.7-dist/js/jquery-3.3.1.min.js"></script>
        <script src="bootstrap-3.3.7-dist/js/jquery-3.3.1.min.js"></script>	  
        <div class="container">
            <div class="col-xs-6">
                <h2>INBOUND</h2>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="tbl_student_in" >
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Applicationg Program</th>
                                <th>Application Form</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($row = mysqli_fetch_array($query)){ ?>
                            <tr>
                                <td><?php echo $row['FAMILY_NAME'].', '.$row['GIVEN_NAME'].' '.$row['MIDDLE_NAME']; ?></td>
                                <td><?php echo $row['APPLICATION_PROG']; ?></td>
                                <td><?php echo $row['APPLICATION_TYPE_PROG']; ?>
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
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($row1 = mysqli_fetch_array($query1)){ ?>
                            <tr>
                                <td><?php echo $row1['FAMILY_NAME'].', '.$row1['GIVEN_NAME'].' '.$row1['MIDDLE_NAME']; ?></td>
                                <td><?php echo $row1['APPLICATION_PROG']; ?></td>
                                <td><?php echo $row1['APPLICATION_TYPE_PROG']; ?>
                            </tr>
                        <?php } ?> 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>