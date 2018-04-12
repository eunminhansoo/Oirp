<?php
    include 'database_connection.php';

    $sel_query = "SELECT yearly FROM yearly ORDER BY COUNT ASC";
    $sel_db = mysqli_query($conn, $sel_query);

    $res="";
    while($row = mysqli_fetch_array($sel_db)){
		$res .= "<option value='".$row["yearly"]."'>".$row["yearly"]."</option>";
    }
    
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Highcharts using mysql php- parsing JSON data</title>
        <script
    src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <script src="https://code.highcharts.com/modules/export-data.js"></script>
        <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/custom.css">
        <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap-theme.css">
        <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/custom.css">
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
			<a href="graph.php">Statistics</a>
			<a href="approved_students.php">Approved Students</a>
			<a href="qualified_students.php">Qualified Students</a>
			<a href="index.php" class="logoutbtn" ><span class="glyphicon glyphicon-log-out">  Logout</span></a>
		</div>
		<!--HOVER LIST ENDOO-->
		
		<!--NAV BAR START-->
		<div>
			<div class="menu_white2">
				<div class="navsticky">
					<nav class="navbar navbar-topaz" role="navigation">
						<div class="topnav">
							<div class="">
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
                                    <ul class="nav navbar-nav navbar-left">
                                        <!-- font style: Bookman Old Style-->
                                        <li><a><span class="styletext"><h4>Data Statistics</h4></span></a></li>
                                    </ul>
									<ul class="nav navbar-nav navbar-right">
										<li><a href="administrator.php">Home</a></li>
										<li><a><span class="bordernavbar"></span><span><?php //echo $familyName.", ".$givenName ?></span></a></li>
										<li>
											<a href="#" class="dropdown-toggle" data-toggle="dropdown">
												<span class="bordernavbar"></span>
												<span class="label label-pill label-danger count" style="border-radius:10px;"></span> 
												<span class="glyphicon glyphicon-bell" style="font-size:18px;"></span>
											</a>
										</li>
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

        <div class="col-xs-offset-10">
            <select name="year" id="year" class="form-control"></select>
        </div>
        <div class="col-xs-2"></div>
        <div class="container" id="container" style="width:100%; height:400px;"></div>

        <script type="text/javascript">
            $(document).ready(function(){
				var year = "<?php echo $res?>";
				$("#year").empty().append(year);


                var data;
                var options ={
                chart: {
                        plotBackgroundColor: null,
                        plotBorderWidth: null,
                        plotShadow: false,
                        renderTo: 'container',
                        type: 'pie',

                },
                title: {
                    text: 'Outbound Student 2015'
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: false
                        },
                        showInLegend: true
                    }
                },
                series: [{
                }]
                };
                $.getJSON('graph_process.php', function(data){
                options.series[0].data = data;
                var chart = new Highcharts.Chart(options);
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