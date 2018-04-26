<?php
	error_reporting(0);
	
	include 'database_connection.php';
	session_start();
	$college = $_SESSION['collegeName'];
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
?>

<html>
    <head>
        <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap-theme.css">
        <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/custom.css">
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
						<li class="dropdown" style="padding-right: 30px;">
							<a href="#" class="dropdown-toggle" id="notif" data-toggle="dropdown"><span class="label label-pill label-danger count" style="border-radius:10px;"></span><span class="glyphicon glyphicon-bell" style="font-size:18px;"></span></a>
							<ul class="dropdown-menu" id="notif-down"></ul>
						</li>
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
				<h2><?php echo $college?></h2>
			</div>
			<div class="container">
				<div class="">
	                <h2>INBOUND</h2>
	                <div class="table-responsive">
	                    <table class="table table-striped table-bordered table-hover" id="tbl_student_in" >
	                        <thead>
	                            <tr>
	                                <th>NAME</th>
	                                <th>TYPE OF PROGRAM</th>
	                                <th>DURATION / SCHOLARSHIP</th>
									<th>COURSE</th>
	                                <th>DATE SUBMITTED</th>
	                                <th>STATUS</th>
	                            </tr>
	                        </thead>
	                        <tbody>
	                            <tfoot>
								<?php
									$col_query = "SELECT * FROM admin_college WHERE COLLEGE = '$college' ";
									$col_db = mysqli_query($conn, $col_query);
									while($col_row = mysqli_fetch_array($col_db)){
										$studentid = $col_row['STUDENT_ID'];
										$getCollege = $col_row['COLLEGE'];
									}
										$sql_query = "SELECT * FROM student a INNER JOIN admin_college b ON a.STUDENT_ID = b.STUDENT_ID INNER JOIN educ_background_inbound c 
										ON a.STUDENT_ID = c.STUDENT_ID INNER JOIN upload_pdf d ON d.STUDENT_ID = a.STUDENT_ID WHERE b.COLLEGE = '$college'";
										$sql_db = mysqli_query($conn, $sql_query);
										while($sqlRow = mysqli_fetch_array($sql_db)){
											$fullname = $sqlRow['FAMILY_NAME'].", ".$sqlRow['GIVEN_NAME']." ".$sqlRow['MIDDLE_NAME'];
											$get_TYPE_OF_PROGRAM = $sqlRow['TYPE_OF_PROGRAM'];
											$get_TYPE_OF_FORM = $sqlRow['TYPE_OF_FORM'];
											$get_TYPE_OF_FORM_OTHER = $sqlRow['TYPE_OF_FORM_OTHER'];
											$resultdate = $sqlRow['DATE_SUBMITTED'];
											$status = $sqlRow['STATUS'];
											$course = $sqlRow['COURSE'];
								?>
	                            <tr>
	                                <td><?php echo "<a href=admin_college_form.php?studentName=".$studentid."&course=".urlencode($course).">".$fullname."</a>";?></td>
									<?php 
											echo "<td>".$get_TYPE_OF_PROGRAM."</td>";

											if($get_TYPE_OF_PROGRAM == "Scholarship"){
												if($get_TYPE_OF_FORM  == "OTHERS"){
													echo "<td>".$sqlRow['TYPE_OF_FORM_OTHER']."</td>";
												}else{
													echo "<td>".$get_TYPE_OF_FORM."</td>";
												}
											}else if($get_TYPE_OF_PROGRAM == "ShortStudy" || $get_TYPE_OF_PROGRAM == "StudyTour" || $get_TYPE_OF_PROGRAM == "ServiceLearning"){
												if($get_TYPE_OF_FORM == "Others"){
													echo "<td>".$get_TYPE_OF_FORM_OTHER."</td>";
												}else{
													echo "<td>".$get_TYPE_OF_FORM."</td>";
												}
											}
									?>
									<td><?php echo $course;?></td>
									<td><?php echo $resultdate; ?></td>
	                                <td><?php echo $status?></td>
										
									<?php }?>		
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
	<script>
		$(document).ready(function(){
			//$('#tbl_student_in').DataTable(); 
			function load_unseen_notification(view = '')
			{
				$.ajax({
					url:"fetch_notif.php",
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
	</script>
</html>
