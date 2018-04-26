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
        <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap-theme.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.css">
        <link rel="icon" href="img/ust.png" type="image/png" sizes="196x196">
        <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/custom.css">
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
								<li><a href="outboundStatistics.php">Outbound Data Statistics <span class="fa fa-pie-chart"></span></a></li>
								<li><a href="InboundStatistics.php">Inbound Data Statistics <span class="fa fa-pie-chart"></a></li>
								<li><a href="outboundComparison.php">Outbound Comparison <span class="fa fa-bar-chart"></span></a></li>
								<li><a href="inboundComparison.php">Inbound Comparison <span class="fa fa-bar-chart"></span></a></li>
							</ul>
						</li>
						<li class="dropdown" style="padding-right: 30px;">
							<a href="#" class="dropdown-toggle" id="notif" data-toggle="dropdown"><span class="label label-pill label-danger count" style="border-radius:10px;"></span><span class="glyphicon glyphicon-bell" style="font-size:18px;"></span></a>
							<ul class="dropdown-menu" id="notif-down"></ul>
						</li>
						<li class="dropdown" style="border-left: 1px solid #333333; padding-left: 30px;">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">OIRP<span id="down" class="caret"></a>
							<ul class="dropdown-menu">
								<li><a href="addUniversities.php">Add Universities  <span class="glyphicon glyphicon-plus-sign"></span></a></li>
								<li><a href="admin_logs.php">Audit Logs <span class="glyphicon glyphicon-list-alt"></span></a></li>
								<li class="divider"></li>
								<li style="text-align: center"><form method="post"><button name="logoutbtn" class="btn-logout float-center">Logout <span class="glyphicon glyphicon-log-out"></span></button></form></li>
							</ul>
						</li>
					</ul> 
				</div>
			</div>
		</nav>		
		<!--NAV BAR END-->
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
        </div>
        
        <div class="container col-xs-5" id="container" style="width:100%; height:400px;"></div>
        <script type="text/javascript">
            $(document).ready(function(){
                
				var year = "<?php echo $res?>";
                var title = "Inbound Student <?php echo $get_year?>";
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
                    text: title
                },
                subtitle: {
                    text: 'Student inbound Comparison per Semester'
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
                            format: '{point.y:.1f}'
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
                $.getJSON('inComparison_process.php', function(data){
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