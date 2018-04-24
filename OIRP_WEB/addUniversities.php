<?php
	require 'universities.php';
	
	$sql = "select distinct country from partner_universities order by country asc";
	$result = mysqli_query($conn, $sql);
	
	$res = "[";
	while($row = mysqli_fetch_array($result)){
		$res .= "'" .$row['country']."',";
	}
	$res .= "' '];";
	
	
	
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
		
		<!--START OF NAV BAR-->
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
								<li><a href="addUniversities.php">Add Universities  <span class="glyphicon glyphicon-plus-sign"></span></a></li>
								<li><a href="admin_logs.php">Audit Logs <span class="glyphicon glyphicon-list-alt"></span></a></li>
								<li><a href="index.php" class="logoutbtn" >Logout <span class="glyphicon glyphicon-log-out"></span></a></li>
							</ul>
						</li>
					</ul> 
				</div>
			</div>
		</nav>		
		<!--NAV BAR END-->
		<div class="container-fluid">
			<form method="post" action="add_universities.php">
				<div class="col-sm-1"></div>
				<div class="col-sm-11 container-fluid">
					<div class="form-group row">
						<div class="col-sm-10">
							<div class="ui-widget">
								<label>Country</label> <input type="text" name="country" id="country" class="form-control">
							</div>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-10">
							<label>University</label>
							<input type="text" name="university" id="university" class="form-control">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-2" align="right">
							<br>
							<input type="submit" value="Submit" class="btn btn-block btn-primary">
						</div>
					</div>
					
				</div>
			</form>
		</div>
		</div>
	</body>
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
	<script>
	$(document).ready(function(){
		var val = <?php echo $res ?>;
		
		$("#country").autocomplete({
			source: val;
		});
		
	});		
	</script>
	
</html>