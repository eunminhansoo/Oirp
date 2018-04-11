<?php
    include 'database_connection.php'; 
?>
<html>
    <head>

    </head>

    <body>
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <script src="https://code.highcharts.com/modules/export-data.js"></script>

        <div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>

    </body>
    <?php
        $sel_query = "SELECT * FROM student WHERE STATUS = 'Qualified'";
        $sel_db = mysqli_query($conn, $sel_query);
        while($row = mysqli_fetch_array($sel_db)){
            $fullname[] = $row['FAMILY_NAME'].", ".$row['GIVEN_NAME']." ".$row['MIDDLE_NAME'];
            
            for($i = 0 ; $i < $fullname.length ; $i++){

    ?>
    <script>   
    var fullname[] = "<?php echo $fullname[$i]?>"; 
    Highcharts.chart('container', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Browser market shares in January, 2018'
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
        var i;
        for(i = 0; i < fullname.length ; i++)
        {
            series: [{
                name: 'Brands',
                colorByPoint: true,
                data: [{
                    name: 'henloo',
                    data: fullname[i],
                    sliced: true,
                    selected: true
                }]
            }]
        }

        
    });
    </script>
    <?php
            }
        }
    ?>
</html>

