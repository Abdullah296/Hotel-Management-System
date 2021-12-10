<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';


$email = $_REQUEST["q"];


include 'Connection.php';
$conn = OpenCon();

                      $sql = "SELECT User_ID, First_Name FROM user where E_mail_ID='$email'";
                      $result = $conn->query($sql);
                      $UID = '';
                      $fname = '';
                      if ($result->num_rows > 0)
                        {
                        // output data of each row
                        while($row = $result->fetch_assoc())
                          {
                          $UID = $row["User_ID"];
                          $fname = $row["First_Name"];
                          }
                          //echo $UID;
                      } 
                      else 
                      {
                        //echo "0 results";
                      }


                      if($UID == '')
                      {
                          echo "No such Email Found\n";
                      }
                      else
                      {
                        echo "Check your Email\n";

                        
                      
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
                      $mail->AddAddress("$email", "$fname");
                      $mail->SetFrom("engineerhotelmail@gmail.com", "Engineer Hotel");
                      //$mail->AddReplyTo("reply-to-email@domain", "reply-to-name");
                      //$mail->AddCC("cc-recipient-email@domain", "cc-recipient-name");
                      $mail->Subject = "User ID";
                      $content = "<b>Dear ".$fname."</b><br> You user id is  ".$UID."<br>Kindy enter User Id to further Proceed.";
                      
                      $mail->MsgHTML($content); 
                      if(!$mail->Send()) {
                        //echo "Error while sending Email.";
                        var_dump($mail);
                      } else {
                        //echo "Verify your Email.";
                      }


                      }


                      
                      //echo "Verify your Email.";
                      CloseCon($conn); 
?>