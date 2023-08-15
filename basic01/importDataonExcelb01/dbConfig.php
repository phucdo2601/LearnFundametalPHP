<?php
    $dbHost = "localhost";
    $dbUsername = "root";
    $dbPass = "";
    $dbName = "product_crud_b01";

    //creaate dn connection str
    $db = new mysqli($dbHost, $dbUsername, $dbPass, $dbName);

    // Check connection 
    if ($db->connect_error) { 
        die("Connection failed: " . $db->connect_error); 
    } 
?>