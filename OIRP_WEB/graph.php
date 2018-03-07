<?php
    include 'database_conn_admin.php';


    $syntax_query = "SELECT SUM(NUMBER_STUDENT) as count FROM all_student_applicant";
    $query = mysqli_query($conn1, $syntax_query);
    $getquery = mysqli_fetch_all($query, MYSQLI_ASSOC);
    $getquery = json_encode(array_column($getquery, 'count'), JSON_NUMERIC_CHECK);

    $rows=array();
    $syntax_query1 = "SELECT NUMBER_STUDENT FROM all_student_applicant";
    $query1 = mysqli_query($conn1, $syntax_query1);
    while($row = mysqli_fetch_array($query1))
    {
        $student_num = $row['NUMBER_STUDENT'];
        
        array_push($rows, $student_num);
    }
        $num = json_encode($rows, JSON_NUMERIC_CHECK);
        echo $num;  
?>
<html>
    <head>

    </head>

    <body>
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <script type="text/javascript" src="grapheuu.js"></script>

        <div id="graph" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
        <!--<div id="container1" style="min-width: 310px; height: 400px; margin: 0 auto"></div>-->
    </body>
    <script>
        Highcharts.chart('graph', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Browser market shares January, 2015 to May, 2015'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                        style: {
                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                        }
                    }
                }
            },
            series: [{
                name: 'Brands',
                colorByPoint: true,
                data: [{
                    name: 'IE',
                    y: 56.33
                }, {
                    name: 'Chrome',
                    y: 24.03,
                    sliced: true,
                    selected: true
                }, {
                    name: 'Firefox',
                    y: 10.38
                }, {
                    name: 'Safari',
                    y: 4.77
                }, {
                    name: 'Opera',
                    y: 0.91
                }, {
                    name: 'Other',
                    y: 0.2
                }]
            }]
        });
    </script>
</html>
