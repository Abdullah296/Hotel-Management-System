<?php
   // getting configs
   include_once 'config.php';
   
   function OpenCon()
    {
    $dbhost = DB_HOST;
    $dbuser = DB_USERNAME;
    $dbpass = DB_PASSWORD;
    $db = DB_NAME;
    
    $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
    
    return $conn;
    }
    
   function CloseCon($conn)
    {
    $conn -> close();
    }
      
   ?>