<?php
include 'Connection.php';
$mysqli = OpenCon();

use PHPMailer\PHPMailer\PHPMailer;
                        use PHPMailer\PHPMailer\Exception;
                        require 'PHPMailer-master/src/Exception.php';
                        require 'PHPMailer-master/src/PHPMailer.php';
                        require 'PHPMailer-master/src/SMTP.php';

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
    echo "<h2>This record found against this Id, and it is going to be deleted.</h2>";
    
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

    echo "This record is going to be deleted";

    $sql = "Delete FROM  booking WHERE Booking_ID ='".$_GET['q']."';";
         
         
         if ($mysqli->query($sql) === TRUE) {
             echo "Recorded Deleted, Kindly contact at this email abd296@yahoo.com for Money return. <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br> ";
           } else {
             echo "Error: " . $sql . "<br>" . $conn->error;
           }



           $mail = new PHPMailer();
           $mail->IsSMTP();
           $mail->Mailer = "smtp";

           $mail->SMTPDebug  = 1;  
           $mail->SMTPAuth   = TRUE;
           $mail->SMTPSecure = "tls";
           $mail->Port       = 587;
           $mail->Host       = "smtp.gmail.com";
           $mail->Username   = "engineerhotelmail@gmail.com";
           $mail->Password   = "chaudary123";
           
           
           $mail->IsHTML(true);
           $mail->AddAddress("abd296@yahoo.com", "Abdullah");
           $mail->SetFrom("engineerhotelmail@gmail.com", "Engineer Hotel");
           //$mail->AddReplyTo("reply-to-email@domain", "reply-to-name");
           //$mail->AddCC("cc-recipient-email@domain", "cc-recipient-name");
           $mail->Subject = "Person record Deleted";
           $content = "<b>Dear Maalik,<br> One person deleted a record, here is the detailed of that booking</b><br> Customer Id: ".$a7."<br> Room Number: ".$a6."<br> Price: ".$a5."<br> From Date: ".$a2."<br> To Date".$a3."<br>Kindly look into this matter, and return the money according to the policy";

           $mail->MsgHTML($content); 
           if(!$mail->Send()) {
             //echo "Error while sending Email.";
             var_dump($mail);
           } else {
             //echo "Verify your Email.";
           }
/*

  $mail = new PHPMailer();
  $mail->IsSMTP();
  $mail->Mailer = "smtp";
  
  $mail->SMTPDebug  = 1;  
  $mail->SMTPAuth   = TRUE;
  $mail->SMTPSecure = "tls";
  $mail->Port       = 587;
  $mail->Host       = "smtp.gmail.com";
  $mail->Username   = "engineerhotelmail@gmail.com";
  $mail->Password   = "chaudary123";
  
  
  $mail->IsHTML(true);
  $mail->AddAddress("abd296@yahoo.com", "Owner");
  $mail->SetFrom("engineerhotelmail@gmail.com", "Engineer Hotel");
  $mail->Subject = "Person Deleted record.";
  $content = "<b>Dear Owner, One person deleted a record, here is the detailed of that booking.</b><br> Customer Id: " . $a7 ."<br> Room Number: " . $a6 ."<br> Price: " . $a5 ."<br> From Date: " . $a2 ."<br> To Date" . $a3 ."<br>Kindly look into this matter, and return the money according to the policy";
  
  $mail->MsgHTML($content); 
  if(!$mail->Send()) {
    //echo "Error while sending Email.";
    var_dump($mail);
  } else {
    //echo "Verify your Email.";
  }
  */
}


?>