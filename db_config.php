<?php
    // if(!isset($_SESSION)) 
    // { 
    //     session_start(); 
    // }
    // else
    // {
    //     session_destroy();
    //     session_start(); 
    // }

    $servername = "localhost";
    $username = "root";
    $password = "123456";
    $database = "launchpad";
    
    $conn =new mysqli($servername,$username,$password,$database);
?>