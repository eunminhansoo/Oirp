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
													<li><a href="outboundStatistics.php">Outbound Data Statistics</a></li>
													<li><a href="InboundStatistics.php">Inbound Data Statistics</a></li>
												</ul>
											</li>
											<li class="dropdown" style="padding-right: 30px;">
												<a href="#" class="dropdown-toggle" id="notif" data-toggle="dropdown"><span class="label label-pill label-danger count" style="border-radius:10px;"></span><span class="glyphicon glyphicon-bell" style="font-size:18px;"></span></a>
												<ul class="dropdown-menu" id="notif-down"></ul>
											</li>
											<li class="dropdown" style="border-left: 1px solid #333333; padding-left: 30px;">
									          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">OIRP<span class="caret"></span></a>
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
			<div class="container-fluid">
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
</html>

<script>
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
</script>
