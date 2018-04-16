<?php
    session_start();
    $get_year = $_SESSION['$set_yearly'];
    if($get_year == NULL){
        $get_year = '2015';
        session_destroy();
    }
    echo $get_year;
?>