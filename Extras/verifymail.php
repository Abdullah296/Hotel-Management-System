<?php
echo "Verify your Email";
$email = $_REQUEST["q"];
$fname = $_REQUEST["l"];
$lname = $_REQUEST["j"];

include 'Connection.php';
$conn = OpenCon();



                    $sql = "INSERT INTO user (First_Name, Last_Name, E_mail_ID)
                      VALUES ('$fname',  '$lname', '$email')";      
      
                      if ($conn->query($sql) === TRUE) 
                      {
                        //echo "USER ENTERED successfully";
                      } 
                      else 
                      {
                        //echo "Error: " . $sql . "<br>" . $conn->error;
                      }




                      $sql = "SELECT User_ID FROM user where First_Name='$fname' And Last_Name='$lname' And E_mail_ID='$email'";
                      $result = $conn->query($sql);
                      
                      if ($result->num_rows > 0)
                        {
                        // output data of each row
                        while($row = $result->fetch_assoc())
                          {
                          $UID = $row["User_ID"];
                          }
                          echo $UID;
                      } 
                      else 
                      {
                        //echo "0 results";
                      }










                      
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Mailer = "smtp";

$mail->SMTPDebug  = 1;  
$mail->SMTPAuth   = TRUE;
$mail->SMTPSecure = "tls";
$mail->Port       = 587;
$mail->Host       = "smtp.gmail.com";
$mail->Username   = "abd290600@gmail.com";
$mail->Password   = "zxcbnmlkjdsa098";


$mail->IsHTML(true);
$mail->AddAddress("$email", "$fname");
$mail->SetFrom("abd290600@gmail.com", "Chaudary Hotel");
//$mail->AddReplyTo("reply-to-email@domain", "reply-to-name");
//$mail->AddCC("cc-recipient-email@domain", "cc-recipient-name");
$mail->Subject = "Verify your Email";
$content = "<b>Dear".$fname." ".$lname."<br>Thanks for registration, You user id is  ".$UID."</b><br>Kindy enter that to verify your email.";

$mail->MsgHTML($content); 
if(!$mail->Send()) {
  //echo "Error while sending Email.";
  var_dump($mail);
} else {
  //echo "Verify your Email.";
}
//echo "Verify your Email.";
CloseCon($conn); 
  
?>