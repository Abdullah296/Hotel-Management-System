<?php
   // getting configs
   $config = include 'config.php';
   
   function OpenCon()
    {
    $dbhost = $config["DB_Host"];
    $dbuser = $config["DB_User"];
    $dbpass = $config["DB_User"];
    $db = $config["DB_Name"];
    
    $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
    
    return $conn;
    }
    
   function CloseCon($conn)
    {
    $conn -> close();
    }
      
   ?>