<?php
    $dbHost     = "localhost"; 
    $dbUsername = "barendro_user"; 
    $dbPassword = "Barendro@123"; 
    $dbName     = "barendro_shop";

    // Create database connection 
    $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName); 
     
    // Check connection 
    if ($db->connect_error) { 
        die("Connection failed: " . $db->connect_error); 
    }

?>