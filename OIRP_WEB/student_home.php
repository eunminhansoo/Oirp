<?php
	include 'student_home_process.php';
	
?>
<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Welcome to OIRP</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/custom.css">
        <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap-theme.css">
        <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.css">
		<!-- link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/stylus.css">
		<link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/color_3.css"-->
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
			<a href="#">Status <?php echo $status ?></a>
			<a href="#">My Application</a>
			<a href="#">Clients</a>
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
										<li><a href="#upload">Home</a></li>
										<li><a><span class="bordernavbar"></span><span><?php echo $familyName.", ".$givenName ?></span></a></li>
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
	<div class="main container-fluid">
		<!--APPLICATION BOX START-->
		<div class="col-sm-6">
			<div class="boxxes container-fluid">
				<div class="col-sm-12">
					<span><h2 class="txtStyle">APPLICATION FORM</h2></span>
					<!-- a class="cms"><span class="glyphicon glyphicon-triangle-bottom"></span></a-->
					<div class="appietxt">
						<span><h3><?php echo "$gen".". ".$familyName?>'s Application form</h3></span>
					</div>
							
					<div class="appietxt1">
						<a class="btn btn-secondary" id="btnClicksu">
							<?php
								if($pagination == 'inbound page 1'){
									echo '<span class="caf"> Continue Application form</span>';
								}
								else if($pagination == 'inbound page 2'){
									echo '<span class="caf"> Continue Application form</span>';
								}else if($pagination == 'inbound page 3'){
									echo '<span class="caf"> Continue Application form</span>';
								}else if($pagination == 'inbound page 4'){
									echo '<span class="caf"> Continue Application form</span>';
								}else if($pagination == 'inbound page 5'){
									echo '<span class="caf"> Continue Application form</span>';
								}else if($pagination == 'outbound page 1'){
									echo '<span class="caf"> Continue Application form</span>';
								}else if($pagination == 'outbound page 2'){
									echo '<span class="caf"> Continue Application form</span>';
								}else if($pagination == 'outbound page 3'){
									echo '<span class="caf"> Continue Application form</span>';
								}else {
									if($pagination == 'submited'){
										echo '<span>Upload Application form </span>';
									}
								}
							?>
							<!--<span>Upload Application form </span>-->
							<!--<span class="caf"> Continue Application form</span>-->
						</a>
					</div>
				</div>
			</div>
		</div>
		<!--APPLICATION BOX END-->
		
		<form method="post" enctype="multipart/form-data">
		<!--APPLICATION BOX START-->
			<div class="col-sm-6" id="uploadbox">
				<div class="boxxes container-fluid">
					<div class="col-sm-12" style="padding-top: 10px; padding-bottom: 20px;">
						<div class="exus" style="float: right;">
							<a class="btn btn-secondary" id="toggelexus"><span class="glyphicon glyphicon-remove"></span></a>
						</div>
						<br>
						<div class="form-group" style="padding-top: 20px;">
							<input type="file" name="pdfScan" id="pdfscan" class="form-control-file" disabled>
						</div>
						<div class="">
							<button type="submit" name="btn_submit" class="btn">Submit</button>
						</div>
					</div>
				</div>
			</div>
		</form>
		<!--APPLICATION BOX END-->
	</div>
	</div>
		<script>
		$(document).ready(function(){
			var page = "<?php echo $pagination ?>";
			$('#uploadbox').hide();

			$('#btnClicksu').click(function(){
				if(page == "inbound page 1"){
					window.location.href = "inboundform1.php";
				}else if(page == "inbound page 2"){
					window.location.href = "inboundform2.php";
				}else if(page == "inbound page 3"){
					window.location.href = "inboundform3.php";
				}else if(page == "inbound page 2"){
					window.location.href = "inboundform3.php";
				}else if(page == "inbound page 4"){
					window.location.href = "inboundform4.php";
				}else if(page == "inbound page 5"){
					window.location.href = "inboundform5.php";
				}else if(page == "outbound page 1"){
					window.location.href = "outboundform1.php";
				}else if(page == "outbound page 2"){
					window.location.href = "outboundform2.php";
				}else if(page == "outbound page 3"){
					window.location.href = "outboundform3.php";
				}else{
					if(page == "submited"){
						$('#uploadbox').show();
						$('#pdfscan').prop('disabled', false);
					}
				}
			});
			$('#toggelexus').click(function(){
				$('#uploadbox').hide();
				$('#pdfscan').prop('disabled', true);
			});
		});
	</script>
	</body>
	<script src="bootstrap-3.3.7-dist/js/jquery-1.11.0.min.js"></script>
	<script src="bootstrap-3.3.7-dist/js/jquery.superslides.min.js"></script>
	<script src="bootstrap-3.3.7-dist/js/jquery.isotope.min.js"></script>
	<script src="bootstrap-3.3.7-dist/js/jquery.nicescroll.js"></script>
	<script src="bootstrap-3.3.7-dist/js/style.js"></script>
	
</html>