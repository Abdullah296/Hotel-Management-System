
<?php

$dbhost = "127.0.0.1:3333";
$dbuser = "root";
$dbpass = "";
$db = "hms";

$mysqli = new mysqli($dbhost, $dbuser, $dbpass,$db);
if($mysqli->connect_error) {
  exit('Could not connect');
}

$sql = "SELECT
room.*
FROM
  room
LEFT JOIN
  Booking
  ON (
      Booking.Room_Number = room.Room_Number AND
      NOT (
          (booking.From_Date < ? and booking.To_Date < ?)
          OR
          (booking.From_Date > ? and booking.To_Date > ?)
          )
      )
WHERE
  booking.Room_Number IS NULL;";




$stmt = $mysqli->prepare($sql);
$stmt->bind_param("ssss", $_GET['q'], $_GET['p'], $_GET['q'], $_GET['p']);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8, $a9, $a10 );



echo "<h2><t>Rooms</h2>";
echo "<table border='2'>";
echo
                "<tr>
                    <td>Room Number.</td>
                    <td>Facilities</td>
                    <td>Price</td>
                </tr>";

while ($stmt->fetch()) {
    
    echo        "<tr>
                     <td width='20%'>".$a1."</td>
                     <td width='50%'> Area = ". $a2." sq ft";
                           if ($a5  == 'T') 
                           {
                              echo "<br><br><br><i class='fa fa-wifi'/>";
                           }
                           if ($a6  == 'T') 
                           {
                              echo " <i class='fa fa-bath'/>";
                           }
                           if ($a7  == 'T') 
                           {
                              echo " <i class='fa fa-newspaper-o'/>";
                           }
                           if ($a9  == 'T') 
                           {
                              echo " <i class='fa fa-steam'/>";
                           }

    echo             "</td>".
                     "<td width='30%'>". $a3.
                     "<br><br><button onclick=\"location.href='101.php?varname=".$a1."'\">Check Now</button>
                     </td>
                </tr>";
  }
echo "</table>";

$stmt->close();


?>

