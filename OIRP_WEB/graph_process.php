<?Php

    // if(isset($_POST['']){

    // }
    //   check out the php manual for more about this
    //   This is just for database connection 
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
     //from here we select the table and display records of table using while loop
    $stmt=$dbcon->prepare("SELECT * FROM 2015_Previous_data");
    $stmt->execute();
    $json = [];
    while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $json[]= [(string)$COUNTRY, (int)$NUMBER_STUDENT];
    }
    echo json_encode($json);
?>
