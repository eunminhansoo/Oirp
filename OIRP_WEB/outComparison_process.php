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
 
    session_start();
    $get_year = '2015-2016';
    if(!empty($_SESSION['$set_yearly'])){
        $get_year = $_SESSION['$set_yearly'];
    }
        $_SESSION['$set_yearly1'] = $get_year;

    // //from here we select the table and display records of table using while loop
    $stmt=$dbcon->prepare("SELECT * FROM outComparison WHERE YEAR = '$get_year'");
    $stmt->execute();
    $json = [];
    while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $json[]= [(string)$SEMESTER, (int)$NUMBER_STUDENT];
        $json1 = $get_year;
    }
    echo json_encode($json);
?>
