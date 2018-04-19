<?Php
    //   check out the php manual for more about this
    //   This is just for database connection 
    // include 'graph_button.php';

    $dbhost = 'localhost';
    $dbname = 'oirp_db';  
    $dbuser = 'root';                  
    $dbpass = ''; 
    
    
    try{
        
        $dbcon = new PDO("mysql:host={$dbhost};dbname={$dbname}",$dbuser,$dbpass);
        $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    }catch(PDOException $ex){
        
        die($ex->getMessage());
    }
    $year_query = "SELECT * FROM YEALY";
    $year_db = mysqli_query($dbcon, $year_query);
    while($row = mysqli_fetch_array($year_db)){
        $years = $row['YEARLY'];
        // $sel_query = "SELECT YEAR FROM outStatistics WHERE YEAR = '$years'";
        // $sel_db = mysqli_query($dbcon, $sel_query);
        // $setYear = mysqli_num_rows();
        // session_start();
        // $get_year = '2015-2016';
        // if(!empty($_SESSION['$set_yearly'])){
        //     $get_year = $_SESSION['$set_yearly'];
        // }
        //     $_SESSION['$set_yearly1'] = $get_year;

        // //from here we select the table and display records of table using while loop
        $stmt=$dbcon->prepare("SELECT YEAR FROM outStatistics WHERE YEAR = '$years'");
        $getw = mysqli_num_rows($stmt);
        $getw->execute();
        $json = [$getw];
        // while($row=$getw->fetch(PDO::FETCH_ASSOC)){
        //     extract($row);
        //     $json[]= [];
        //     $json1 = $get_year;
        // }
    }

    echo json_encode($json);
?>
