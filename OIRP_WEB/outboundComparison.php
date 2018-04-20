<?php
    include 'database_connection.php';
    // include 'graph_button.php';
    $sel_query = "SELECT yearly FROM yearly ORDER BY COUNT ASC";
    $sel_db = mysqli_query($conn, $sel_query);

    $res="";
    $get_year = "2015-2016";
    while($row = mysqli_fetch_array($sel_db)){
        $setYear = $row["yearly"];
        $res .="<button type='submit' class='btn btn-secondary bbtn col-xs-12' id='".$setYear."'value='".$setYear."' name='".$setYear."'>".$setYear."</button>";
    }
    session_start();
    if(!empty($_SESSION['$set_yearly1'])){
        $get_year = $_SESSION['$set_yearly1'];
    }

    $sele_query = "SELECT * FROM yearly";
    $sele_db = mysqli_query($conn, $sele_query);

    while($rows = mysqli_fetch_array($sele_db)){
        $yearlyy = $rows['YEARLY'];
        if(isset($_POST[$yearlyy])){
            $get_year = $_POST[$yearlyy];
            $_SESSION['$set_yearly'] = $get_year;
        }
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <!--<script
    src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>-->
        <!--<script src="https://code.highcharts.com/highcharts.js"></script>-->
        <!--<script src="https://code.highcharts.com/highcharts.js"></script>-->
        <!--<script src="https://code.highcharts.com/modules/exporting.js"></script>
        <script src="https://code.highcharts.com/modules/export-data.js"></script>-->
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/data.js"></script>
        <script src="https://code.highcharts.com/modules/drilldown.js"></script>
        <script src="bootstrap-3.3.7-dist/js/exporting.js"></script>
        <script src="bootstrap-3.3.7-dist/js/export-data.js"></script>
        <script src="bootstrap-3.3.7-dist/js/highcharts.js"></script>
        
        <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/custom.css">
        <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap-theme.css">
        <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.css">
        <link rel="icon" href="img/ust.png" type="image/png" sizes="196x196">
    </head>
    <style>
        /*DROPDOWN DESIGN*/
        .dropbtn {
            background-color: #F7DC6F;
            color: black;
            padding: 16px;
            font-size: 16px;
            border: none;
            cursor: pointer;
        }

        .dropbtn:hover, .dropbtn:focus {
            background-color: #F7DC6F;
            
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f1f1f1;
            min-width: 160px;
            overflow: auto;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            width: auto;
            right: -5%;
            
        }

        .dropdown-content button {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            
        }

        .dropdown button:hover {
            background-color: #ddd
            
        }

        /*.show {
            display:block;
        }*/

        .bbtn{
            padding: 0;
            border: none;
            background: none;
        }
    </style>
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
			<a href="outboundStatistics.php">Outbound Data Statistics</a>
			<a href="InboundStatistics.php">Inbound Data Statistics</a>
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
										<li>
                                            <a href="">
                                                <span class="bordernavbar"></span>
                                                <span>
                                                    Data Comparison Statistics
                                                </span>
                                            </a>
                                        </li>
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
        <div>
            <div class="col-xs-5">
                <div class="col-xs-6">
                    <button onclick="myFunction()" class="dropdown dropbtn btn btn-secondary"><u>Data Year</u></button>
                </div>
                <form method="post">
                    <div id="myDropdown" class="dropdown-content col-xs-1 col-xs-push-3">
                        <!--<button type="submit" class="btn btn-secondary bbtn col-xs-12" name="2015-2016" id="2015-2016">2015-2016</button>
                        <button type="submit" class="btn btn-secondary bbtn col-xs-12" name="2016-2017" id="2016-2017">2016-2017</button>-->
                    </div>
                </form>
            </div>
            <div class="col-xs-6 col-xs-pull-0">
                <span><b><h3>Outbound Student <?php echo $get_year ?></h3></b></span>
            </div>
        </div>

        <div class="container" id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
        <script type="text/javascript">
            $(document).ready(function(){
                
				var year = "<?php echo $res?>";
				$("#myDropdown").empty().append(year);

                var data;
                var getYear;
                var options ={
                chart: {
                        plotBackgroundColor: null,
                        plotBorderWidth: null,
                        plotShadow: false,
                        renderTo: 'container',
                        type: 'column',

                },
                title: {
                    text: ' '
                },
                subtitle: {
                    text: 'Click the columns to view versions. Source: <a href="http://statcounter.com" target="_blank">statcounter.com</a>'
                },
                xAxis: {
                    type: 'category'
                },
                yAxis: {
                    title: {
                        text: ' '
                    }

                },
                legend: {
                    enabled: false
                },
                plotOptions: {
                    series: {
                        borderWidth: 0,
                        dataLabels: {
                            enabled: true,
                            format: '{point.y:.1f}%'
                        }
                    }
                },

                tooltip: {
                    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
                },
                series: [{
                }]
                };
                $.getJSON('outComparison_process.php', function(data){
                options.series[0].data = data;
                var chart = new Highcharts.Chart(options);
                });
            });

            function myFunction() {
                    document.getElementById("myDropdown").classList.toggle("show");
                }

                // Close the dropdown if the user clicks outside of it
                window.onclick = function(event) {
                    if (!event.target.matches('.dropbtn')) {

                        var dropdowns = document.getElementsByClassName("dropdown-content");
                        var i;
                        for (i = 0; i < dropdowns.length; i++) {
                        var openDropdown = dropdowns[i];
                        if (openDropdown.classList.contains('show')) {
                            openDropdown.classList.remove('show');
                        }
                        }
                    }
                }
        </script>
    </body>
    <script src="bootstrap-3.3.7-dist/js/jquery-1.11.0.min.js"></script>
	<script src="bootstrap-3.3.7-dist/js/jquery.superslides.min.js"></script>
	<script src="bootstrap-3.3.7-dist/js/jquery.isotope.min.js"></script>
	<script src="bootstrap-3.3.7-dist/js/jquery.nicescroll.js"></script>
	<script src="bootstrap-3.3.7-dist/js/style.js"></script>
</html>