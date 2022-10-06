<?php 
    //Start Session
    session_start(); 
    //Create Constants to Store Non Repeating Values
    define('SITEURL','http://localhost/food-order/admin/');
    //define('SITEURL','http://localhost/food-order/');
    define('LOCALHOST','localhost');
    define('DB_USERNAME','root');
    define('DB_PASSWORD','');
    define('DB_NAME','fooddb');
    $conn = mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die(mysqli_error()); //Database Connection
    $db_Select = mysqli_select_db($conn,DB_NAME)or die(mysqli_error()); //Select Database
?>