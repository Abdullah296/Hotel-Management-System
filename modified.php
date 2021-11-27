<html>
<body>

<?php
$fname = isset($_POST['FName']) ? $_POST['FName'] : '';
$lname = isset($_POST['LName']) ? $_POST['LName'] : '';
$email = isset($_POST['Email']) ? $_POST['Email'] : '';
$todate = isset($_POST['todate']) ? $_POST['todate'] : '';
$fromdate = isset($_POST['Fromdate']) ? $_POST['Fromdate'] : '';
$city = isset($_POST['City']) ? $_POST['City'] : '';
?>

Welcome <?php echo $fname; ?><br>
Welcome <?php echo $lname; ?><br>
Welcome <?php echo $email; ?><br>
Welcome <?php echo $todate; ?><br>
Welcome <?php echo $fromdate; ?><br>
Welcome <?php echo $city; ?><br>




<?php




$conn = new mysqli("127.0.0.1:3333","root","","hms");
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO user (First_Name, Last_Name, E_mail_ID)
VALUES ('$fname',  '$lname', '$email')";


if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "INSERT INTO booking (From_Date, To_Date, Price_of_Booking, Room_Number, User_ID)
VALUES ('$fromdate',  '$todate', '5000', '101', '1')";


if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
?>
    <table>
<?php
 $records = mysqli_query($conn,"select * from room");

while ($row = mysqli_fetch_array($records)){
?>
   <tr>
    <td><?php echo $row['userId'];?></td>
  </tr>

<?php 
} 

?>


$conn->close();


?>







</body>
</html>


