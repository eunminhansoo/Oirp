<?php
    include 'database_connection.php';
	include 'logout.php';
    session_start();
    if(empty($_SESSION['inValidation']) && $_SESSION['stuValid'] != 'yes'){
		header("Location: index.php");
	}else if(empty($_SESSION['inValidation']) && $_SESSION['stuValid'] == 'yes' && $_SESSION['validSummarypdf'] != 'sumpdfvalid'){
		header("Location: student_home.php");
    }else{
        if($_SESSION['validSummarypdf'] == 'sumpdfvalid'){
            $getSes_studentID = $_SESSION['student_id_session'];
            
            $sql_query = $conn->prepare('SELECT * FROM student WHERE STUDENT_ID = ?');
            $sql_query->bind_param('s', $getSes_studentID);
            $sql_query->execute();
            $result = $sql_query->get_result();
            //$db_query = mysqli_query($conn, $sql_query);
            while($row = $result->fetch_assoc()){
                $familyName = $row['FAMILY_NAME'];
                $givenName = $row['GIVEN_NAME'];
                $status = $row['STATUS'];
                $application_prog = $row['APPLICATION_PROG'];
                $pagination = $row['PAGINATION'];
                $gender = $row['GENDER'];
            }

            $sql_query = $conn->prepare('select type_of_program from educ_background_inbound where student_id = ?');
            $sql_query->bind_param('s', $getSes_studentID);
            $sql_query->execute();
            $result = $sql_query->get_result();
            while($row = $result->fetch_assoc()){
                $type_of_program = $row['type_of_program'];
            }

            if(isset($_POST['btn_informsummary'])){
                $query_db = mysqli_query($conn, $sql_query);
                $query_db3 = "UPDATE student SET
                    PAGINATION = 'submitted' 
                    WHERE STUDENT_ID ='$getSes_studentID'
                ";

                $checkQuery3 = mysqli_query($conn, $query_db3);
                if($checkQuery3){
                    unset($_SESSION['validSummarypdf']);
                    header("Location: student_home.php");
                }
            }else if(isset($_POST['btnSaveinformsummary'])){
                $query_db = mysqli_query($conn, $sql_query);
                $query_db3 = "UPDATE student SET
                    PAGINATION = 'save summary pdf' 
                    WHERE STUDENT_ID ='$getSes_studentID'
                ";

                $checkQuery3 = mysqli_query($conn, $query_db3);
                if($checkQuery3){
                    header("Location: student_home.php");
                }
            }else if(isset($_POST['btnEdit'])){
                $_SESSION['inValidation'] = 'invalid';
                header("Location: inboundform1.php");
            }
        }else{
            header("Location: student_home.php");
        } 
    }
	$familyName;
	$givenName;
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width = device-width, initial-scale = 1">        
        <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
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
			<a href="index.php"><img src='img/logo.png' height=auto class="img-responsive"></a>	
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
		<!-- END NAVIGATOR BAR -->
		
		<div class="container-fluid">
			<nav class="col-sm-2 sidebar">
				<ul class="nav nav-stacked">
                    <li class="active"><a href="summary_pdf_in.php">Expectations from the Program</a></li>
				</ul>
			</nav>
            <div class="col-sm-9 container-fluid">
                <div class="form-group row">
                    <div class="col-sm-10">
                        <h1>Summary Application form</h1>
                        <div class="col-sm-6 col-sm-push-1">
                            <span class="glyphicon glyphicon-chevron-right" style="font-size: 23px;">
                                <?php
                                    if($pagination == 'submitted summary' || $pagination == 'save summary pdf'){
                                        if($application_prog == 'inbound' && ($type_of_program == 'ShortStudy' || $type_of_program == 'StudyTour' || $type_of_program == 'ServiceLearning')){
                                            echo '<a href="pdf/inboundBilateral.php" target="_blank"><span class="caf">Open Summary PDF</span></a>';
                                        } elseif ($application_prog == 'inbound' && $type_of_program == "Scholarship"){
                                            echo '<a href="pdf/inbound.php" target="_blank"><span class="caf">Open Summary PDF</span></a>';
                                        }
								    }
                                ?>
                            </span>
                        </div>
                    </div>
                </div>
                <form method="post">
                    <div class="form-group row break col-xs-4">
						<div class="col-sm-10">
							<button type="submit" name="btnEdit" class="btn btn-primary btn-block shadowbtn" >Edit</button>
						</div>
					</div>
					<div class="form-group row break col-xs-4">
						<div class="col-sm-10">
							<input type="submit" name="btnSaveinformsummary" class="btn btn-warning btn-block shadowbtn" value="Save">
						</div>
					</div>
					<div class="form-group row break col-xs-4">
						<div class="col-sm-10">
							<input type="submit" name="btn_informsummary" class="btn btn-success btn-block shadowbtn" value="Submit">
						</div>
					</div>
                </form>
            </div>
		</div>
	</body>
</html>

