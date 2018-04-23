<?php
	error_reporting(0);

	include 'database_connection.php';
    //$sql_query = "SELECT * FROM student INNER JOIN educ_background_inbound ON student.STUDENT_ID = educ_background_inbound.STUDENT_ID";
    $sql_query = "SELECT * FROM admin_student_data a INNER JOIN student b ON a.STUDENT_ID = b.STUDENT_ID INNER JOIN proposed_field_study c ON b.STUDENT_ID = c.STUDENT_ID WHERE STATUS = 'Approved'";
    $query = mysqli_query($conn, $sql_query);
    
    

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
		<!--NAV BART END-->
		<form>
			<div class="container">
				<h1>Approved Students</h1>
				<div class="">
	        		<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search" class="form-control">
	            </div>
				<div class="">
	                <h2>INBOUND</h2>
	                <div class="table$college-responsive">
	                    <table class="table table-striped table-bordered table-hover" id="tbl_student_in" >
	                        <thead>
	                            <tr>
	                                <th>NAME</th>
	                                <th>TYPE OF PROGRAM</th>
	                                <th>DURATION / SCHOLARSHIP</th>
									<th>COURSE</th>
	                                <th>DATE SUBMITTED</th>
	                                <th>STATUS</th>
	                                <th><button type="submit" name="delete_inbound" class="btn btn-secondary" ><span class="glyphicon glyphicon-trash"></span></button></th>
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
										ON a.STUDENT_ID = c.STUDENT_ID INNER JOIN upload_pdf d ON d.STUDENT_ID = a.STUDENT_ID WHERE b.STATUS = 'Approved'";
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
	                                <td><?php echo "<a href=admin_college_form.php?studentName=".urlencode($studentid).">".$fullname."</a>";?></td>
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
	                                <td><input type="checkbox" name="cb_num_in[]" value="<?php echo $studentid?>"></td>
										
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
		      } else {
		    	  if (td1) {
		    	    if (td1.innerHTML.toUpperCase().indexOf(filter) > -1) {
		    	      tr_out[i].style.display = "";
		    	    } else {
		    	      tr_out[i].style.display = "none";
		    	    }
		    	  }
		      }
		    }

		   
		}
	}
</script>
