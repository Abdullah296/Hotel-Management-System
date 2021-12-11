<?php

$str1 = $_REQUEST["a"];
$str2 = $_REQUEST["b"];
$str3 = $_REQUEST["c"];
$str4 = $_REQUEST["d"];
$str5 = $_REQUEST["e"];
$str6 = $_REQUEST["f"];
$str7 = $_REQUEST["g"];
$str8 = $_REQUEST["h"];
$str9 = $_REQUEST["i"];

include './Connection.php';
            $conn = OpenCon();

$sql = "INSERT INTO `room` (`Room_Number`, `Area`, `Price`, `Internet`, `BathTub`, `NewsPaper`, `Shower`, `Iron`, `Ironing_Table`) 
        VALUES ('$str1', '$str2', '$str3', '$str4', '$str5', '$str6', '$str7', '$str8', '$str9');";
                          
                          
                          if ($conn->query($sql) === TRUE) 
                          {
                            //room book with existing user
                             // header('Location: index.php?var=3');
                              echo " Room Added Successful";
                            } 
                            else 
                            {
                                echo "Some Error Occured, can't add room";
                              //echo "Error: " . $sql . "<br>" . $conn->error;
                            }

                            CloseCon($conn); 

?>