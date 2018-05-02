<?php
	include 'student_home_process.php';
	include 'logout.php';
	
?>
<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Welcome to OIRP</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap-theme.css">
        <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.css">
		<!-- link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/stylus.css">
		<link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/color_3.css"-->
        <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/custom.css">
		<link rel="icon" href="img/ust.png" type="image/png" sizes="196x196">
	</head>
	<style>
		.alert {
			padding: 20px;
			background-color: #f44336;
			color: white;
		}

		.closebtn {
			margin-left: 15px;
			color: white;
			font-weight: bold;
			float: right;
			font-size: 22px;
			line-height: 20px;
			cursor: pointer;
			transition: 0.3s;
		}

		.closebtn:hover {
			color: black;
		}
	</style>
	
	<body>
		<script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
		<script src="bootstrap-3.3.7-dist/js/jquery-3.3.1.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<div class="">
		<?php echo $errorTORmsg;?>
		<div class="header">
			<img src='img/logo.png' height=auto class="img-responsive">
		</div>
		<!-- START NAVIGATOR BAR -->
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
							<li><a href="student_home.php">Home</a></li>
							<li>
								<?php
								if($pagination == NULL && $application_prog == 'outbound'){
									if($pagination == 'submited' || $pagination == 'Submitted PDF'){
										if($application_prog == 'outbound' && ($type_of_program == "ShortStudy" || $type_of_program == "StudyTour" ||  $type_of_program == "ServiceLearning")){
											echo '<a href="pdf/outboundBilateral.php" target="_blank">My Application</a>';
										} else if ($application_prog == 'outbound' && $type_of_program == "Scholarship"){
											echo '<a href="pdf/outbound.php" target="_blank">My Application</a>';
										} else if($application_prog == 'inbound' && ($type_of_program == "ShortStudy" || $type_of_program == "StudyTour" ||  $type_of_program == "ServiceLearning")){
											echo '<a href="pdf/inboundBilateral.php" target="_blank">My Application</a>';
										} else if ($application_prog == 'inbound' && $type_of_program == "Scholarship"){
											echo '<a href="pdf/inbound.php" target="_blank">My Application</a>';
										}else{
											echo '<a href="#">My Application</a>';
										}
									} 
								}else if($pagination == NULL && $application_prog == 'inbound'){
									if($pagination == 'submited' || $pagination == 'Submitted PDF'){
										if($application_prog == 'outbound' && ($type_of_program == "ShortStudy" || $type_of_program == "StudyTour" ||  $type_of_program == "ServiceLearning")){
											echo '<a href="pdf/outboundBilateral.php" target="_blank">My Application</a>';
										} else if ($application_prog == 'outbound' && $type_of_program == "Scholarship"){
											echo '<a href="pdf/outbound.php" target="_blank">My Application</a>';
										} else if($application_prog == 'inbound' && ($type_of_program == "ShortStudy" || $type_of_program == "StudyTour" ||  $type_of_program == "ServiceLearning")){
											echo '<a href="pdf/inboundBilateral.php" target="_blank">My Application</a>';
										} else if ($application_prog == 'inbound' && $type_of_program == "Scholarship"){
											echo '<a href="pdf/inbound.php" target="_blank">My Application</a>';
										}else{
											echo '<a href="#">My Application</a>';
										}
									} 
								}else if($pagination == 'inbound page 1'){
									$_SESSION['inValidation'] = 'invalid';
									echo '<a href="inboundform1.php">My Application</a>';
								}else if($pagination == 'inbound page 2'){
									$_SESSION['inValidation'] = 'invalid';
									echo '<a href="inboundform2.php">My Application</a>';
								}else if($pagination == 'inbound page 3'){
									$_SESSION['inValidation'] = 'invalid';
									echo '<a href="inboundform3.php">My Application</a>'; 
								}else if($pagination == 'inbound page 4'){
									$_SESSION['inValidation'] = 'invalid';
									echo '<a href="inboundform4.php">My Application</a>';
								}else if($pagination == 'inbound page 5'){
									$_SESSION['inValidation'] = 'invalid';
									echo '<a href="inboundform5.php">My Application</a>';
								}else if($pagination == 'outbound page 1'){
									$_SESSION['outValidaition'] = 'outvalid';
									echo '<a href="outboundform1.php">My Application</a>'; 
								}else if($pagination == 'outbound page 2'){
									$_SESSION['outValidaition'] = 'outvalid';
									echo '<a href="outboundform3.php">My Application</a>';  
								}else if($pagination == 'outbound page 3'){
									$_SESSION['outValidaition'] = 'outvalid';
									echo '<a href="outboundform3.php">My Application</a>';  
								}else if($pagination == 'submitted' || $pagination == 'Submitted PDF'){
									unset($_SESSION['outValidation']);
									unset($_SESSION['inValidation']);
									if($pagination == 'submitted' || $pagination == 'Submitted PDF'){
										if($application_prog == 'outbound' && ($type_of_program == "ShortStudy" || $type_of_program == "StudyTour" ||  $type_of_program == "ServiceLearning")){
											echo '<a href="pdf/outboundBilateral.php" target="_blank">My Application</a>';
										} else if ($application_prog == 'outbound' && $type_of_program == "Scholarship"){
											echo '<a href="pdf/outbound.php" target="_blank">My Application</a>';
										} else if($application_prog == 'inbound' && ($type_of_program == "ShortStudy" || $type_of_program == "StudyTour" ||  $type_of_program == "ServiceLearning")){
											echo '<a href="pdf/inboundBilateral.php" target="_blank">My Application</a>';
										} else if ($application_prog == 'inbound' && $type_of_program == "Scholarship"){
											echo '<a href="pdf/inbound.php" target="_blank">My Application</a>';
										}else{
											echo '<a href="#">My Application</a>';
										}
									} 
								}else{
									echo '<a href="#">My Application</a>';
								}
								
							?>
							</li>
							<li style="padding-right: 30px;">
								<a ><b>Status:</b> <span style="color: red">
								<?php 
									if($pagination == null || $pagination == 'inbound page 1' || $pagination == 'inbound page 2'
									|| $pagination == 'inbound page 3' || $pagination == 'inbound page 4' || $pagination == 'inbound page 5'
									|| $pagination == 'outbound page 1' || $pagination == 'outbound page 2'
									|| $pagination == 'outbound page 3' || $pagination == 'outbound page 4' || $pagination == 'outbound page 5'
									){
										echo "(Please finish application)";
									}else if($pagination == "submited"){
										if($status == 'Approved'){
											$status = " ";
											echo $status; 
										}else{
											echo $status;
										}
									}else if($pagination == "Submitted PDF"){
										if($status == 'Approved'){
											$status = " ";
											echo $status; 
										}else{
											echo $status;
										}
									}
								?></span></a>
							</li>
							<li class="dropdown" style="border-left: 1px solid #333333; padding-left: 30px;">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $familyName.", ".$givenName ?><span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li style="text-align: center"><form method="post"><button name="logoutbtn" class="btn-logout float-center">Logout <span class="glyphicon glyphicon-log-out"></span></button></form></li>
								</ul>
							</li>
						</ul> 
					</div>
				</div>
			</nav>	
		<!--START CONTENT -->
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
					<div style="margin-left: 15px; margin-top: 25px;">
						<?php 
							if($pagination == 'submitted'){
								if($application_prog == 'outbound' && ($type_of_program == "ShortStudy" || $type_of_program == "StudyTour" || $type_of_program == "ServiceLearning")){
									echo '<a href="pdf/outboundBilateral.php" target="_blank"><span class="caf">Open PDF form</span></a>';
								} elseif ($application_prog == 'outbound' && $type_of_program == "Scholarship"){
									echo '<a href="pdf/outbound.php" target="_blank"><span class="caf">Open PDF form</span></a>';
								} elseif($application_prog == 'inbound' && ($type_of_program == 'ShortStudy' || $type_of_program == 'StudyTour' || $type_of_program == 'ServiceLearning')){
									echo '<a href="pdf/inboundBilateral.php" target="_blank"><span class="caf">Open PDF form</span></a>';
								} elseif ($application_prog == 'inbound' && $type_of_program == "Scholarship"){
									echo '<a href="pdf/inbound.php" target="_blank"><span class="caf">Open PDF form</span></a>';
								}
							}
						?>
						
					</div>
						<a class="btn btn-secondary" id="btnClicksu">
							<?php
								if($pagination == NULL && $application_prog == 'outbound'){
									echo '<a href=outboundform1.php><span class="caf"> Continue Application form</span></a>';
								}else if($pagination == NULL && $application_prog == 'inbound'){
									echo '<a href=inboundform1.php><span class="caf"> Continue Application form</span></a>';
								}else if($pagination == 'inbound page 1'){
									$_SESSION['inValidation'] = 'invalid';
									echo '<span class="caf"> Continue Application form</span>';
								}
								else if($pagination == 'inbound page 2'){
									$_SESSION['inValidation'] = 'invalid';
									echo '<span class="caf"> Continue Application form</span>';
								}else if($pagination == 'inbound page 3'){
									$_SESSION['inValidation'] = 'invalid';
									echo '<span class="caf"> Continue Application form</span>';
								}else if($pagination == 'inbound page 4'){
									$_SESSION['inValidation'] = 'invalid';
									echo '<span class="caf"> Continue Application form</span>';
								}else if($pagination == 'inbound page 5'){
									$_SESSION['inValidation'] = 'invalid';
									echo '<span class="caf"> Continue Application form</span>';
								}else if($pagination == 'outbound page 1'){
									$_SESSION['outValidaition'] = 'outvalid';
									echo '<span class="caf"> Continue Application form</span>';
								}else if($pagination == 'outbound page 2'){
									$_SESSION['outValidaition'] = 'outvalid';
									echo '<span class="caf"> Continue Application form</span>';
								}else if($pagination == 'outbound page 3'){
									$_SESSION['outValidaition'] = 'outvalid';
									echo '<span class="caf"> Continue Application form</spapan>';
								}else if($pagination == 'submitted'){
									unset($_SESSION['outValidation']);
									unset($_SESSION['inValidation']);
									echo '<br><span class="caf" id>Upload Application form </span>';
								}else{
									if($pagination == 'Submitted PDF' && $status == 'Pending' || $pagination == 'Submitted PDF' && $status == 'Approved'|| $pagination == 'Submitted PDF' && $status == 'Denied'|| $pagination == 'Submitted PDF' && $status == 'On-going'){
										echo '<span>Wait for Confirmation</span>';
									}else if($pagination == 'Submitted PDF' && $status == 'Qualified'){
										echo '<span style="color: red"><b>You are '.$status.'!</b></span>';
									}else if($pagination == 'Submitted PDF' && $status == 'Not-Qualified'){
										echo '<span style="color: red"><b>Sorry you are '.$status.'</b></span>';
									}else if($pagination == 'Submitted PDF' && $status == 'Completed'){
										$cocSel_query = "SELECT * FROM certificateofcompletion WHERE STUDENT_ID = '$get_studentID'";
										$coc_db = mysqli_query($conn, $cocSel_query);
										while($coc_row = mysqli_fetch_array($coc_db )){
											$certCoc = $coc_row['CERTIFICATION'];
											$exp = $coc_row['EXPIRATION_ACCESS'];
										}
										$todaydate = date("m/d/Y");
										$datetoday = new DateTime($todaydate);
										$dateresult = $datetoday->format('m/d/Y');
										// echo $dateresult;
										// echo $todaydate;
										// if($todaydate == $dateresult ){
										// 	echo '<br><div><button class="btn btn-secondary"><a href=downloadCert.php?cOc='.$get_studentID.'>Download Certificate of Completion</a></button></span></div>';			
										// }else{
										// 	echo '<span> </span>';
										// }
										$timestamp = $todaydate;
										$start_date = date($timestamp);

										$expires = strtotime($exp, strtotime($timestamp));
										//$expires = date($expires);

										$date_diff=($expires-strtotime($timestamp)) / 86400;
										$dayleft = round($date_diff, 0);
										if($dayleft == 0){
											echo '<span></span>';
										}else{
											echo '<br><div id="cocDown"><button class="btn btn-secondary"><a href=downloadCert.php?cOc='.$get_studentID.'>Download Certificate of Completion</a></button></span></div>';
										}

										// echo "Start: ".$timestamp."<br>";
										// echo "Expire: ".date('Y-m-d H:i:s', $expires)."<br>";

										// echo round($date_diff, 0)." days left";
										
									}
								}
							?>
							<!--<span>Upload Application form </span>-->
							<!--<span class="caf"> Continue Application form</span>-->
						</a>
					</div>
				</div>
			</div>
		<!--APPLICATION BOX END-->
		
		<form method="post" id="comment_form" enctype="multipart/form-data">
		<!--APPLICATION BOX START-->
			<div id="uploadbox">
				<div class="boxxes container-fluid">
					<div class="col-sm-12" style="padding-top: 10px; padding-bottom: 20px;">
						<div class="exus" style="float: right;">
							<a class="btn btn-secondary" id="toggelexus"><span class="glyphicon glyphicon-remove"></span></a>
						</div>
						<br>
						<div id="fileType">
							<div class="form-group" style="padding-top: 20px;">
								<div class="col-xs-4 col-xs-push-1">
									<span><b>Upload PDF:</b></span>
								</div>
								<div class="col-xs-4 col-xs-push-1">
									<input type="file" name="pdfScan" id="pdfscan" class="custom-file-input form-control-file" accept="application/pdf" disabled>
								</div>
							</div>
							<br>
							<div class="form-group" style="padding-top: 20px;">
								<div class="col-xs-6">
									<span><b>Upload Transcript of Records:</b></span>
								</div>
								<div class="col-xs-3 col-xs-pull-1">
									<input type="file" name="TAscan" id="taScan" class="custom-file-input form-control-file" disabled/>
								</div>
								
							</div>
						</div>
						<br>
						<br>
						<div class="col-xs-12">
							<button type="submit" name="btn_submit" class="btn">Submit</button>
						</div>
					</div>
				</div>
			</div>
		</form>
		<!--APPLICATION BOX END-->
	</div>

	<div class="col-sm-6">
		<div class="container-fluid boxxes" style="padding-top: 5%; padding-bottom: 5%; text-align: justify;">
			<div class="col-sm-12">
				<h2>GUIDE</h2>
		
				<p>1. Go to My Application and fill out the online form. If you are unable to finish the form, you may save it and work on it on your on time.</p>
				<p>2. Once submitted, a PDF form will be generated which needs to be signed by the parties mentioned. Upload the form, together with your Transcript of Records, once the signatories are complete.</p>
				<p>3. Your application will be reviewed by the Office of International Relations and Programs and by the colleges or departments involved. You may refer to your Status to see the progress of your application. 
			</div>
		</div>
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
					if(page == "submitted"){
						$('#uploadbox').show();
						$('#pdfscan').prop('disabled', false);
						$('#taScan').prop('disabled', false);
					}
				}
			});
			$('#toggelexus').click(function(){
				$('#uploadbox').hide();
				$('#pdfscan').prop('disabled', true);
				$('#taScan').prop('disabled', true);
			});
		});
	</script>
	</div>
	</body>
	<script src="bootstrap-3.3.7-dist/js/jquery-1.11.0.min.js"></script>
	<script src="bootstrap-3.3.7-dist/js/jquery.superslides.min.js"></script>
	<script src="bootstrap-3.3.7-dist/js/jquery.isotope.min.js"></script>
	<script src="bootstrap-3.3.7-dist/js/jquery.nicescroll.js"></script>
	<script src="bootstrap-3.3.7-dist/js/style.js"></script>

</html>