<?php
    include 'database_connection.php';
	include 'logout.php';
    session_start();
    if($_SESSION['validSummarypdf_out'] == 'sumpdfvalid_out' && $_SESSION['stuValid'] == 'yes'){
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

        $sql_query = $conn->prepare('SELECT * FROM proposed_field_study WHERE STUDENT_ID = ?');
		$sql_query->bind_param('s', $getSes_studentID);
		$sql_query->execute();
		$result = $sql_query->get_result();
		while($row = $result->fetch_assoc()){
			$type_of_program = $row['TYPE_OF_PROGRAM'];
		}

        if(isset($_POST['btn_outformsummary'])){
            $query_db = mysqli_query($conn, $sql_query);
            $query_db3 = "UPDATE student SET
                PAGINATION = 'submitted' 
                WHERE STUDENT_ID ='$getSes_studentID'
            ";

            $checkQuery3 = mysqli_query($conn, $query_db3);
            if($checkQuery3){
                $_SESSION['outValidaition'] == 'empty';
                $_SESSION['validSummarypdf_out'] = " ";
                header("Location: student_home.php");
            }
        }else if(isset($_POST['btnSaveoutformsummary'])){
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
           $_SESSION['outValidaition'] = 'outvalid';
            header("Location: outboundform1.php");
        }
    }else{
        header("Location: student_home.php");
    } 
    // }
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
    <style>
        .danger {
			background-color: lightgrey;
			border-left: 6px solid #ffeb3b;
            color: red;
		}
    </style>
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
                    
				</ul>
			</nav>
            <div class="col-sm-9 container-fluid">
                <div class="form-group row">
                    <div class="col-sm-10">
                    <div class="danger" style="padding-left:15px; padding-top: 1px; padding-bottom: 1px; margin-bottom: 30px;">
                        <p><h3><strong>Notice!</strong></h3>You can only register once per semester.</p>
                    </div>
                        <h1>Summary Application form</h1>
                        <div class="col-sm-6 col-sm-push-1">
                            <span class="glyphicon glyphicon-chevron-right" style="font-size: 15px;"></span>
                                <?php
                                    if($pagination == 'submitted summary' || $pagination == 'save summary pdf'){
                                        if($application_prog == 'outbound' && ($type_of_program == 'ShortStudy' || $type_of_program == 'StudyTour' || $type_of_program == 'ServiceLearning')){
                                            echo '<a href="pdf/outboundBilateral.php" target="_blank"><span class="caf" style="font-size: 15px;">Open Summary PDF</span></a>';
                                        } elseif ($application_prog == 'outbound' && $type_of_program == "Scholarship"){
                                            echo '<a href="pdf/outbound.php" target="_blank"><span class="caf" style="font-size: 15px;">Open Summary PDF</span></a>';
                                        }
								    }
                                ?>
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
							<input type="submit" name="btnSaveoutformsummary" class="btn btn-warning btn-block shadowbtn" value="Save">
						</div>
					</div>
					<div class="form-group row break col-xs-4">
						<div class="col-sm-10">
							<input type="submit" name="btn_outformsummary" class="btn btn-success btn-block shadowbtn" value="Submit">
						</div>
					</div>
                </form>
            </div>
		</div>
	</body>
</html>

