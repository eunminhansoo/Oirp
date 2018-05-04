<?php
	error_reporting(0);
	
	include 'database_connection.php';
	include 'logout.php';
	session_start();
	if($_SESSION['superadmin'] != 'oirp'){
		header("Location: index.php");
	}
    // $sql_query = "SELECT * FROM student a INNER JOIN educ_background_inbound b ON a.STUDENT_ID = b.STUDENT_ID WHERE a.STATUS = 'Qualified'";
    // $sql_query = "SELECT * FROM admin_college a INNER JOIN student b ON a.STUDENT_ID = b.STUDENT_ID INNER JOIN educ_background_inbound c ON b.STUDENT_ID = c.STUDENT_ID WHERE b.STATUS = 'Qualified' ";
    // $query = mysqli_query($conn, $sql_query);

	// $sql_query1 = "SELECT * FROM admin_student_data a INNER JOIN student b ON a.STUDENT_ID = b.STUDENT_ID INNER JOIN proposed_field_study c ON b.STUDENT_ID = c.STUDENT_ID WHERE b.STATUS = 'Qualified'";
    // $query1 = mysqli_query($conn, $sql_query1);


?>

<html>
    <head>
        <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap-theme.css">
        <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
        <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/custom.css">
        <link rel="icon" href="img/ust.png" type="image/png" sizes="196x196">
    </head>

    <body>
        <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
		<script src="bootstrap-3.3.7-dist/js/jquery-3.3.1.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	    <script src="bootstrap-3.3.7-dist/js/search.js"></script>
	    

		<div class="">
		<div class="header">
			<img src='img/logo.png' height=auto class="img-responsive">
		</div>
		
		<!--NAV BAR START-->
		<nav class="navbar" id="bar">
			<div class="container-fluid">
				<div class="col-sm-5" style="padding-top: 0.5%; padding-bottom: 0.5%;">
					<input type="text" id="myInput" onkeyup="search()" placeholder="Search" class="form-control">
				</div>
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
						<li><a href="administrator.php">Home</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Applications<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="approved_students.php">Approved Students</a></li>
								<li><a href="qualified_students.php">Qualified Students</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Statistics<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="outboundStatistics.php">Outbound Data Statistics <span class="fa fa-pie-chart"></span></a></li>
								<li><a href="InboundStatistics.php">Inbound Data Statistics <span class="fa fa-pie-chart"></a></li>
								<li><a href="outboundComparison.php">Outbound Comparison <span class="fa fa-bar-chart"></span></a></li>
								<li><a href="inboundComparison.php">Inbound Comparison <span class="fa fa-bar-chart"></span></a></li>
							</ul>
						</li>
						<li class="dropdown" style="padding-right: 30px;">
							<a href="#" class="dropdown-toggle" id="notif" data-toggle="dropdown"><span class="label label-pill label-danger count" style="border-radius:10px;"></span><span class="glyphicon glyphicon-bell" style="font-size:18px;"></span></a>
							<ul class="dropdown-menu" id="notif-down"></ul>
						</li>
						<li class="dropdown" style="border-left: 1px solid #333333; padding-left: 30px;">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">OIRP<span id="down" class="caret"></a>
							<ul class="dropdown-menu">
								<li><a href="addUniversities.php">Add Universities  <span class="glyphicon glyphicon-plus-sign"></span></a></li>
								<li><a href="admin_logs.php">Audit Logs <span class="glyphicon glyphicon-list-alt"></span></a></li>
								<li class="divider"></li>
								<li style="text-align: center"><form method="post"><button name="logoutbtn" class="btn-logout float-center">Logout <span class="glyphicon glyphicon-log-out"></span></button></form></li>
							</ul>
						</li>
					</ul> 
				</div>
			</div>
		</nav>		
		<!--NAV BAR END-->
		
		<form>
			<div class="container-fluid">
	            <div class="col-sm-6">
	                <h2>INBOUND</h2>
	                <div class="table-responsive">
	                    <table class="table table-striped table-bordered table-hover" id="tbl_student_in" >
	                        <thead>
	                            <tr>
	                                <th>
										NAME
									</th>
	                                <th>
										TYPE OF PROGRAM
									</th>
	                                <th>
										DURATION / SCHOLARSHIP
									</th>
	                                <th>
										DATE SUBMITTED
									</th>
	                                <th>
										STATUS
									</th>
	                                <th><button type="submit" name="delete_outbound" class="btn btn-secondary" ><span class="glyphicon glyphicon-trash"></span></button></th>
	                            </tr>
	                        </thead>
	                        <tbody>
								<tfoot>
								<?php
									$sql_query = "SELECT * FROM admin_student_data a INNER JOIN student b ON a.STUDENT_ID = b.STUDENT_ID INNER JOIN educ_background_inbound c ON b.STUDENT_ID = c.STUDENT_ID WHERE b.STATUS ='Qualified'";
									$query = mysqli_query($conn, $sql_query);
									while($row = mysqli_fetch_array($query)){ 
										$studentID = $row['STUDENT_ID'];
										$encryptstudentid = base64_encode($studentID);
										$fullname = $row['FAMILY_NAME'].", ".$row['GIVEN_NAME']." ".$row['MIDDLE_NAME'];
										$ddate = $row['DATE_ENROLL'];
										$date = new DateTime($ddate);
										$status = $row['STATUS'];
										$get_TYPE_OF_PROGRAM = $row['TYPE_OF_PROGRAM'];
										$get_TYPE_OF_PROG_OTHER = $row['TYPE_OF_PROG_OTHER'];
										$get_TYPE_OF_FORM = $row['TYPE_OF_FORM'];
										$get_TYPE_OF_FORM_OTHER = $row['TYPE_OF_FORM_OTHER'];
										$resultdate = $date->format('F j, Y');
										echo "<tr>";
											echo "<td><a href='admin_student_application_in.php?studentName=".urlencode($encryptstudentid)."'>".$fullname."</a></td>";
											if($get_TYPE_OF_PROGRAM == 'Scholarship'){
												echo "<td>".$get_TYPE_OF_PROGRAM ."</td>";
												if($get_TYPE_OF_FORM == 'OTHERS'){
													echo "<td>".$get_TYPE_OF_FORM_OTHER."</td>";
												}else{
													echo "<td>".$get_TYPE_OF_FORM."</td>";
												}
											}else{
												echo "<td>".$get_TYPE_OF_PROGRAM."</td>";
												if($get_TYPE_OF_FORM == 'Others'){
													echo "<td>".$get_TYPE_OF_FORM_OTHER."</td>";
												}else{
													echo "<td>".$get_TYPE_OF_FORM."</td>";
												}
											}
											echo "
												<td>".$resultdate."</td>
												<td>".$status."</td>
												<td><input type=\"checkbox\" name=\"cb_num_in[]\" value=".$studentID."></td>
											";
										echo "</tr>";
									}
								?>    
								</tfoot> 
	                        </tbody>
	                    </table>
	                </div>
	            </div>
	            <div class="col-sm-6">
	                <h2>OUTBOUND</h2>
	                <div class="table-responsive">
	                    <table class="table table-striped table-bordered table-hover display" id="tbl_student_out" >
	                        <thead>
	                            <tr>
	                                <th>
										NAME
									</th>
	                                <th>
										TYPE OF PROGRAM
									</th>
	                                <th>
										DURATION / SCHOLARSHIP
									</th>
	                                <th>
										DATE SUBMITTED
									</th>
	                                <th>
										STATUS
									</th>
	                                <th><button type="submit" name="delete_outbound" class="btn btn-secondary" ><span class="glyphicon glyphicon-trash"></span></button></th>
	                            </tr>
	                        </thead>
	                        <tbody>
	                            <?php 
									$sql_query1 = "SELECT * FROM admin_student_data a INNER JOIN student b ON a.STUDENT_ID = b.STUDENT_ID INNER JOIN proposed_field_study c ON b.STUDENT_ID = c.STUDENT_ID b.STATUS ='Qualified'";
    								$query1 = mysqli_query($conn, $sql_query1);
									while($row1 = mysqli_fetch_array($query1)){ 
										$studentID1 = $row1['STUDENT_ID'];
										$encryptStudentid = base64_encode($studentID1);
										$fullname1 = $row1['FAMILY_NAME'].", ".$row1['GIVEN_NAME']." ".$row1['MIDDLE_NAME'];
										$ddate1 = $row1['DATE_ENROLL'];
										$get_TYPE_OF_PROGRAM1 = $row1['TYPE_OF_PROGRAM'];
										$get_TYPE_OF_FORM1 = $row1['TYPE_OF_FORM'];
										$status1 = $row1['STATUS'];
										$date1 = new DateTime($ddate1);
										$resultdate1 = $date1->format('F j, Y');
										echo "<tr>";
										echo "<td><a href='admin_student_application_out.php?studentName=",urlencode($encryptStudentid),"'>".$fullname1."</a></td>";
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
											echo "
												<td>".$resultdate1."</td>
												<td>".$status1,"</td>
												<td><input type=\"checkbox\" name=\"cb_num_out[]\" value=".$studentID1."></td>
											";
										}
										echo "</tr>";
									}
	                            ?>
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
	<script src="bootstrap-3.3.7-dist/js/jquery-1.12.4.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
</html>

<script>
	$('#tbl_student_out').dataTable({
		"searching": false
	});

	$('#tbl_student_in').dataTable({
		"searching": false
	});
	$(document).ready(function(){
	
		function load_unseen_notification(view = '')
		{
			$.ajax({
				url:"fetch_comment.php",
				method:"POST",
				data:{view:view},
				dataType:"json",
				success:function(data)
				{
					$('#notif-down').html(data.notification);
					if(data.unseen_notification > 0)
					{
					$('.count').html(data.unseen_notification);
					}
				}
			});
		}
		
		load_unseen_notification();
		
		$(document).on('click', '#notif', function(){
			$('.count').html('');
			load_unseen_notification('yes');
		});
	});

	function myFunction() {
	  // Declare variables 
	  var input, filter, table, tr, td, i;
	  input = document.getElementById("myInput");
	  filter = input.value.toUpperCase();
	  table_in = document.getElementById("tbl_student_in");
	  tr_in = table_in.getElementsByTagName("tr");

	  // Loop through all table rows, and hide those who don't match the search query
		for (i = 0; i < tr_in.length; i++) {
			td = tr_in[i].getElementsByTagName("td")[0];
			td1 = tr_in[i].getElementsByTagName("td")[1];
			if (td) {
				if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
					tr_in[i].style.display = "";
				}else{
					if (td1) {
						if (td1.innerHTML.toUpperCase().indexOf(filter) > -1) {
							tr_in[i].style.display = "";
						} else {
							tr_in[i].style.display = "none";
						}
					}
				}
			} 
		}
	}
</script>
