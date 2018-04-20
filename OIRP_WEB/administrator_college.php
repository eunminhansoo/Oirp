<?php
	include 'database_connection.php';
	session_start();
	$college = $_SESSION['coll_sess'];
    // $sql_query = "SELECT * FROM admin_college a INNER JOIN student b ON a.STUDENT_ID = b.STUDENT_ID INNER JOIN educ_background_inbound c ON b.STUDENT_ID = c.STUDENT_ID";
	

	if(isset($_POST['delete_inbound'])){
    	if(empty($_POST['cb_num_in'])){
        	echo "<script language='javascript'>(function(){alert('PLEASE SELECT THE CHECKBOX YOU WANT TO DELETE');})();</script>";
        }else {
	    	$checkbox = $_POST['cb_num_in'];
	    	for($i = 0 ; $i < count($checkbox);$i++){
	    		$del_check = $checkbox[$i];
	    		$query_del = mysqli_query($conn, "DELETE FROM admin_college WHERE STUDENT_ID = '$del_check'");
	    	}
	    	if($query_del){
	    		echo "success";
	    		echo "<meta http-equiv=\"refresh\" content=\"0;URL=administrator.php\">";
	    	}
        }
    }
    $col_query = "SELECT * FROM admin_college WHERE COLLEGE = '$college' ";
	$col_db = mysqli_query($conn, $col_query);
	while($col_row = mysqli_fetch_array($col_db)){
		$studentid = $col_row['STUDENT_ID'];
		$getCollege = $col_row['COLLEGE'];
	}
    $sql_query = "SELECT * FROM student WHERE STUDENT_ID = '$studentid'";
    $query = mysqli_query($conn, $sql_query);
	$sql_query1 = "SELECT * FROM educ_background_inbound WHERE STUDENT_ID = '$studentid'";
    $query1 = mysqli_query($conn, $sql_query1);
	$sql_query2 = "SELECT * FROM upload_pdf WHERE STUDENT_ID = '$studentid'";
    $query2 = mysqli_query($conn, $sql_query2);
	$sql_query3 = "SELECT * FROM student WHERE STUDENT_ID = '$studentid'";
    $query3 = mysqli_query($conn, $sql_query3);

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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

		<div class="">
		<div class="header">
			<img src='img/logo.png' height=auto class="img-responsive">
		</div>
		
		<!--HOVER LIST STARTO-->
		<div id="mySidenav" class="sidenav">
			<a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><span class="glyphicon glyphicon-remove"></span></a>
			<a href="index.php" class="logoutbtn" ><span class="glyphicon glyphicon-log-out">  Logout</span></a>
		</div>
		<!--HOVER LIST ENDOO-->
		
		<!--NAV BAR START-->
		<!--div>
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
										<li><a href="administrator_college.php">Home</a></li>
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
		</div-->
		
		<nav class="navbar" id="bar">
						<div class="container-fluid">
							<div class="navbar-header">
								<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-expand" aria-expanded="false">
							        <span class="sr-only">Toggle navigation</span>
							        <span class="icon-bar"></span>
							        <span class="icon-bar"></span>
							        <span class="icon-bar"></span>
							     </button>
							</div>
							<div class="collapse navbar-collapse" id="nav-expand" aria-expanded="true">
										<ul class="nav navbar-nav navbar-right">
											<li><a href="administrator_college.php" style="padding-right: 30px;">Home</a></li>
											<li class="dropdown" style="border-left: 1px solid #333333; padding-left: 30px;">
									          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">College<span class="caret"></span></a>
									          <ul class="dropdown-menu">
									            <li><a href="index.php" class="logoutbtn" >Logout <span class="glyphicon glyphicon-log-out"></span></a></li>
									          </ul>
									        </li>
										</ul> 
									</div>
							</div>
						</nav>
		
		<!--NAV BART END-->
		<form>
			<div class="container">
				<div class="">
	                <h2>INBOUND</h2>
	                <div class="table-responsive">
	                    <table class="table table-striped table-bordered table-hover" id="tbl_student_in" >
	                        <thead>
	                            <tr>
	                                <th>Name</th>
	                                <th>Application Program</th>
	                                <th>Application Form</th>
	                                <th>Course</th>
	                                <th>DATE SUBMITED</th>
	                                <th>STATUS</th>
	                                <th><button type="submit" name="delete_inbound" class="btn btn-primary" ><span class="glyphicon glyphicon-trash"></span></button></th>
	                            </tr>
	                        </thead>
	                        <tbody>
	                            	<?php while($row = mysqli_fetch_array($query)){ 

	                                $fullname = $row['FAMILY_NAME'].", ".$row['GIVEN_NAME']." ".$row['MIDDLE_NAME'];
	                                // $ddate = $row['DATE_ENROLL'];
	                                // $date = new DateTime($ddate);
									// $get_TYPE_OF_PROGRAM = $row['TYPE_OF_PROGRAM'];
									// $get_TYPE_OF_FORM = $row['TYPE_OF_FORM'];
			                        // $resultdate = $date->format('F j, Y');
	                            ?>
	                            <tfoot>
	                            <tr>
	                                <td><?php echo "<a href=admin_college_form.php?studentName=".urlencode($studentid).">".$fullname."</a>" ?></td>
									<?php 
										} 
										while($row1 = mysqli_fetch_array($query1)){ 
											$get_TYPE_OF_PROGRAM = $row1['TYPE_OF_PROGRAM'];
											$get_TYPE_OF_FORM = $row1['TYPE_OF_FORM'];
											echo "<td>".$get_TYPE_OF_PROGRAM."</td>";

											if($get_TYPE_OF_PROGRAM == "Scholarship"){
												if($get_TYPE_OF_FORM  == "OTHERS"){
													echo "<td>".$row1['TYPE_OF_FORM_OTHER']."</td>";
												}else{
													echo "<td>".$get_TYPE_OF_FORM."</td>";
												}
											}else{
												if($get_TYPE_OF_FORM == "Others"){
													echo "<td>".$row1['TYPE_OF_FORM_OTHER']."</td>";
												}else{
													echo "<td>".$get_TYPE_OF_FORM."</td>";
												}
											}
										}
										
									?>
	                                <!--<td><?php //echo $row['TYPE_OF_PROGRAM']; ?></td>
	                                <td><?php //echo $row['APPLICATION_TYPE_PROG'].": ".$row['APPLICATION_FORM']; ?></td>-->
									<td><?php echo $getCollege?></td>
									<?php
									while($row2 = mysqli_fetch_array($query2)){ 
										$resultdate = $row2['DATE_SUBMITTED'];
									?>
									<td><?php echo $resultdate ?></td>
									<?php
										}
										while($row3 = mysqli_fetch_array($query3)){
										$status = $row3['STATUS'];
									?>
	                                <td><?php echo $status?></td>
									<?php
										}
									?>
	                                <td><input type="checkbox" name="cb_num_in[]" value="<?php echo $studentid?>"></td>
	                            </tr>
	                        
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
