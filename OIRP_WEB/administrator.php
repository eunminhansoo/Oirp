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
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <!--<link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap-theme.css">-->
        <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
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
		<!-- div id="mySidenav" class="sidenav">
			<a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><span class="glyphicon glyphicon-remove"></span></a>
			<a href="outboundStatistics.php">Outbound Data Statistics</a>
			<a href="InboundStatistics.php">Inbound Data Statistics</a>
			<a href="approved_students.php">Approved Students</a>
			<a href="qualified_students.php">Qualified Students</a>
			<a href="index.php" class="logoutbtn" ><span class="glyphicon glyphicon-log-out">  Logout</span></a>
		</div-->
		<!--HOVER LIST ENDOO-->
		
		<!--NAV BAR START-->
		<!--  
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
										 	 <a href="administrator_notification.php" class="dropdown-toggle" data-toggle="dropdown">
												<span class="bordernavbar"></span>
												<span class="label label-pill label-danger count" style="border-radius:10px;"></span> 
												<span class="glyphicon glyphicon-bell" style="font-size:18px;"></span>
											</a> -->
				
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
						<li><a href="admin_logs.php">Audit Logs</a></li>
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
								<li><a href="outboundComparison.php">Outbound Comparison</a></li>
								<li><a href="inboundComparison.php">Inbound Comparison</a></li>
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
		<!--NAV BAR END-->
		
		<br><br>
        <form method="post">	
          
	        <div class="container-fluid">
	        	<div class="col-sm-7">
	        		<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search" class="form-control">
	            </div>
	            <div class="col-sm-6">
	                <h2>INBOUND</h2>
	                <div class="table-responsive">
	                    <table class="table table-striped table-bordered table-hover" id="tbl_student_in" >
	                        <thead>
	                            <tr>
	                                <th>NAME</th>
	                                <th>TYPE OF PROGRAM</th>
	                                <th>DURATION / SCHOLARSHIP</th>
	                                <th>DATE SUBMITTED</th>
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
	                <h2>OUTBOUND</h2>
	                <div class="table-responsive">
	                    <table class="table table-striped table-bordered table-hover display" id="tbl_student_out" >
	                        <thead>
	                            <tr>
	                                <th>NAME</th>
	                                <th>TYPE OF PROGRAM</th>
	                                <th>DURATION / SCHOLARSHIP</th>
	                                <th>DATE SUBMITTED</th>
	                                <th>STATUS</th>
	                                <th><button type="submit" name="delete_outbound" class="btn btn-secondary" ><span class="glyphicon glyphicon-trash"></span></button></th>
	                            </tr>
	                        </thead>
	                        <tbody>
	                            <?php while($row1 = mysqli_fetch_array($query1)){ 
	                                $studentID1 = $row1['STUDENT_ID'];
	                                $fullname1 = $row1['FAMILY_NAME'].", ".$row1['GIVEN_NAME']." ".$row1['MIDDLE_NAME'];
	                                $ddate1 = $row1['DATE_ENROLL'];
									$get_TYPE_OF_PROGRAM1 = $row1['TYPE_OF_PROGRAM'];
									$get_TYPE_OF_FORM1 = $row1['TYPE_OF_FORM'];
									$status1 = $row1['STATUS'];
	                                $date1 = new DateTime($ddate1);
			                        $resultdate1 = $date1->format('F j, Y');
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
	                                <td><?php echo $status1?></td>
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
	<script src="bootstrap-3.3.7-dist/js/jquery-1.11.0.min.js"></script>
	<script src="bootstrap-3.3.7-dist/js/jquery.superslides.min.js"></script>
	<script src="bootstrap-3.3.7-dist/js/jquery.isotope.min.js"></script>
	<script src="bootstrap-3.3.7-dist/js/jquery.nicescroll.js"></script>
	<script src="bootstrap-3.3.7-dist/js/style.js"></script>

</html>

<script>
$(document).ready(function(){
    //$('#tbl_student_in').DataTable(); 
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
	table_out = document.getElementById("tbl_student_out");
	tr_in = table_in.getElementsByTagName("tr");
	tr_out = table_out.getElementsByTagName("tr");

	// Loop through all table rows, and hide those who don't match the search query
	for (i = 0; i < tr_in.length; i++) {
		td = tr_in[i].getElementsByTagName("td")[0];
		td1 = tr_in[i].getElementsByTagName("td")[1];
		if (td) {
		if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
			tr_in[i].style.display = "";
		} else {
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

 	for (i = 0; i < tr_out.length; i++) {
	    td = tr_out[i].getElementsByTagName("td")[0];
	    td1 = tr_out[i].getElementsByTagName("td")[1];
	    if (td) {
	      	if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
	       		tr_out[i].style.display = "";
	      	}else {
	    	  	if (td1) {
	    	    	if (td1.innerHTML.toUpperCase().indexOf(filter) > -1) {
	    	      		tr_out[i].style.display = "";
	    	    	}else {
	    	      		tr_out[i].style.display = "none";
	    	    	}
	    	  	}
	      	}
	    }
	}
}
</script>