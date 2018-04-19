<?php
	include 'database_connection.php';
    //$sql_query = "SELECT * FROM student INNER JOIN educ_background_inbound ON student.STUDENT_ID = educ_background_inbound.STUDENT_ID";
    $sql_query = "SELECT * FROM admin_student_data a INNER JOIN student b ON a.STUDENT_ID = b.STUDENT_ID INNER JOIN proposed_field_study c ON b.STUDENT_ID = c.STUDENT_ID WHERE STATUS = 'Approved'";
    $query = mysqli_query($conn, $sql_query);

	$sql_query1 = "SELECT * FROM admin_student_data a INNER JOIN student b ON a.STUDENT_ID = b.STUDENT_ID INNER JOIN educ_background_inbound c ON b.STUDENT_ID = c.STUDENT_ID WHERE STATUS = 'Approved'";
    $query1 = mysqli_query($conn, $sql_query1);

?>

<html>
    <head>
        <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/custom.css">
        <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap-theme.css">
        <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.css">
        <link rel="icon" href="img/ust.png" type="image/png" sizes="196x196">
    </head>

    <body>
        <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
		<script src="bootstrap-3.3.7-dist/js/jquery-3.3.1.min.js"></script>

		<div class="">
		<div class="header">
			<img src='img/logo.png' height=auto class="img-responsive">
		</div>
		
		<!--HOVER LIST STARTO-->
		<div id="mySidenav" class="sidenav">
			<a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><span class="glyphicon glyphicon-remove"></span></a>
			<a href="outboundStatistics.php">Outbound Data Statistics</a>
			<a href="InboundStatistics.php">Inbound Data Statistics</a>
			<a href="approved_students.php">Approved Students</a>
			<a href="qualified_students.php">Qualified Students</a>
			<a href="index.php" class="logoutbtn" ><span class="glyphicon glyphicon-log-out">  Logout</span></a>
		</div>
		<!--HOVER LIST ENDOO-->
		
		<!--NAV BAR START-->
		<div>
			<div class="menu_white2">
				<div class="navsticky">
					<nav class="navbar navbar-topaz" role="navigation">
						<div class="topnav">
							<div class="container">
								<div class="navbar-header">
									<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
									<a class="navbar-brand" href="#"></a>
								</div>
								<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
									<ul class="nav navbar-nav navbar-right" >
										<li><a href="administrator.php">Home</a></li>
										<li><a><span class="bordernavbar"></span><span><?php //echo $familyName.", ".$givenName ?></span></a></li>
										<li>
											<a href="#" class="dropdown-toggle" data-toggle="dropdown">
												<span class="bordernavbar"></span>
												<span class="label label-pill label-danger count" style="border-radius:10px;"></span> 
												<span class="glyphicon glyphicon-bell" style="font-size:18px;"></span>
											</a>
										</li>
										<li>
											<a href="#" class="btn btn-secondary" id="menu-toggle">
											<span class="bordernavbar"></span>
											<span class="glyphicon glyphicon-align-justify" style="font-size:20px;cursor:pointer" onclick="openNav()"></span>
											</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</nav>
				</div>
			</div>
		</div>
		<!--NAV BART END-->
		<form>
			<div class="container">
				<h2>Approved Students</h2>
				<div class="col-sm-6">
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
	                                <th><button type="submit" name="delete_inbound" class="btn btn-secondary" ><span class="glyphicon glyphicon-trash"></span></button></th>
	                            </tr>
	                        </thead>
	                        <tbody>
	                            <?php while($row = mysqli_fetch_array($query)){ 
	                                $studentID = $row['STUDENT_ID'];
	                                $fullname = $row['FAMILY_NAME'].", ".$row['GIVEN_NAME']." ".$row['MIDDLE_NAME'];
	                                $ddate = $row['DATE_ENROLL'];
	                                $date = new DateTime($ddate);
									$status = $row['STATUS'];
									$get_TYPE_OF_PROGRAM = $row['TYPE_OF_PROGRAM'];
									$get_TYPE_OF_FORM = $row['TYPE_OF_FORM'];
			                        $resultdate = $date->format('F j, Y');
	                            ?>
	                            <tfoot>
	                            <tr>
	                                <td><?php echo "$fullname" ?></td>
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
	                                <td><?php echo $status?></td>
	                                <td><input type="checkbox" name="cb_num_in[]" value="<?php echo $studentID ?>"></td>
	                            </tr>
	                        <?php } ?>
	                        </tfoot> 
	                        </tbody>
	                    </table>
	                </div>
	            </div>
				 <div class="col-sm-6">
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
	                                <th><button type="submit" name="delete_inbound" class="btn btn-secondary" ><span class="glyphicon glyphicon-trash"></span></button></th>
	                            </tr>
	                        </thead>
	                        <tbody>
	                            <?php while($row1 = mysqli_fetch_array($query1)){ 
	                                $studentID = $row1['STUDENT_ID'];
	                                $fullname = $row1['FAMILY_NAME'].", ".$row1['GIVEN_NAME']." ".$row1['MIDDLE_NAME'];
	                                $ddate = $row1['DATE_ENROLL'];
	                                $date = new DateTime($ddate);
									$status = $row1['STATUS'];
									$get_TYPE_OF_PROGRAM = $row1['TYPE_OF_PROGRAM'];
									$get_TYPE_OF_FORM = $row1['TYPE_OF_FORM'];
			                        $resultdate = $date->format('F j, Y,');
	                            ?>
	                            <tfoot>
	                            <tr>
	                                <td><?php echo "<a href=admin_student_application_in.php?studentName=".urlencode($studentID).">".$fullname."</a>" ?></td>
									<?php
										if($get_TYPE_OF_PROGRAM == 'Others'){
											echo "<td>Bilateral</td>";
											echo "<td>".$row1['TYPE_OF_PROG_OTHER']."</td>";
										}else{
											echo "<td>".$get_TYPE_OF_PROGRAM."</td>";
											if($get_TYPE_OF_FORM == 'OTHERS'){
												echo "<td>".$row1['TYPE_OF_FORM_OTHER']."</td>";
											}else{
												echo "<td>".$get_TYPE_OF_FORM."</td>";
											}
										}
									?>
	                                <!--<td><?php //echo $row['TYPE_OF_PROGRAM']; ?></td>
	                                <td><?php //echo $row['APPLICATION_TYPE_PROG'].": ".$row['APPLICATION_FORM']; ?></td>-->
									<td><?php echo $resultdate ?></td>
	                                <td><?php echo $status?></td>
	                                <td><input type="checkbox" name="cb_num_in[]" value="<?php echo $studentID ?>"></td>
	                            </tr>
	                        <?php } ?>
	                        </tfoot> 
	                        </tbody>
	                    </table>
	                </div>
	            </div>
			</div>
		</form>
    </body>
	<script src="bootstrap-3.3.7-dist/js/jquery-1.11.0.min.js"></script>
	<script src="bootstrap-3.3.7-dist/js/jquery.superslides.min.js"></script>
	<script src="bootstrap-3.3.7-dist/js/jquery.isotope.min.js"></script>
	<script src="bootstrap-3.3.7-dist/js/jquery.nicescroll.js"></script>
	<script src="bootstrap-3.3.7-dist/js/style.js"></script>
</html>
