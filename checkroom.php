<?php
$dbhost = "127.0.0.1:3333";
$dbuser = "root";
$dbpass = "";
$db = "hms";

$mysqli = new mysqli($dbhost, $dbuser, $dbpass,$db);
if($mysqli->connect_error) {
  exit('Could not connect');
}

$sql = "SELECT * FROM  booking WHERE Booking_ID = ? And User_ID= ?";

$stmt = $mysqli->prepare($sql);
$stmt->bind_param("ss", $_GET['q'], $_GET['p']);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($a1, $a2, $a3, $a4, $a5, $a6, $a7);
$stmt->fetch();
$stmt->close();

if($a1 == '')
{
    echo "<h3>No record Found.</h3>";
}
else
{
    echo "<h3>Following Booking is registered against this booking ID.</h3>";
    echo "<table class=table table-bordered table-dark' border='2'>";
    echo "<tr>";
    echo "<td width='40%'>CustomerID</td>";
    echo "<td width='40%'>" . $a7 . "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Room Number</td>";
    echo "<td>" . $a6 . "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Price</td>";
    echo "<td>" . $a5 . "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>From</td>";
    echo "<td>" . $a2 . "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>To</td>";
    echo "<td>" . $a3 . "</td>";
    
    echo "</tr>";
    echo "</table>";
}


?>