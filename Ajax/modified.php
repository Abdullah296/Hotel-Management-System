<html>
   <body>
      <?php
      require('config.php');

      
      $token=$_POST['stripeToken'];
      use PHPMailer\PHPMailer\PHPMailer;
      use PHPMailer\PHPMailer\Exception;
      require 'PHPMailer-master/src/Exception.php';
      require 'PHPMailer-master/src/PHPMailer.php';
      require 'PHPMailer-master/src/SMTP.php';

         $fname = isset($_POST['FName']) ? $_POST['FName'] : '';
         $lname = isset($_POST['LName']) ? $_POST['LName'] : '';
         $email = isset($_POST['Email']) ? $_POST['Email'] : '';
         $todate = isset($_POST['todate']) ? $_POST['todate'] : '';
         $fromdate = isset($_POST['Fromdate']) ? $_POST['Fromdate'] : '';
         $city = isset($_POST['City']) ? $_POST['City'] : '';
         $UID = isset($_POST['UID']) ? $_POST['UID'] : '';
         
         $roomno = $_GET['varname'];
         $currentData =  date("Y-m-d"); 
         ?>

          Welcome FNAME <?php echo $fname; ?><br>
          Welcome lname <?php echo $lname; ?><br>
          Welcome email <?php echo $email; ?><br>
          Welcome todate <?php echo $todate; ?><br>
          Welcome fromdate <?php echo $fromdate; ?><br>
          Welcome city <?php echo $city; ?><br>
          Welcome roomno <?php echo $roomno; ?><br>
          Welcome UID <?php echo $UID; ?><br>

          <?php
            include './Connection.php';
            $conn = OpenCon();


            $sql = "SELECT Price FROM room where Room_Number='$roomno'";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) 
            {
              // output data of each row
              while($row = $result->fetch_assoc()) 
              {
                echo "Room Found";
                $price = (int)$row["Price"] * 100;

                echo "Price of room is";
                echo $price;

              }
            } 
            else
            {
              echo "No such room find";
            }

            if($price != '')
            {


              $sql = "SELECT room.* FROM room LEFT JOIN Booking ON ( Booking.Room_Number = room.Room_Number AND NOT ( (booking.From_Date < '$fromdate' and booking.To_Date < '$todate') OR (booking.From_Date > '$fromdate' and booking.To_Date > '$todate') ) ) WHERE booking.Room_Number = '$roomno'";
              $result = $conn->query($sql);
                      
                      $id = '';
                      if ($result->num_rows > 0)
                        {
                        // output data of each row

                        while($row = $result->fetch_assoc())
                          {
                          $id = $row["Room_Number"];
                          }
                          echo "Enter Right Dates";
                      } 
                      else 
                      {
                        echo "Enter Correct Dates";
                      }
                  //echo $id."You are good";
                  if($id != '')
                  {
                   //echo "Room not found for such dates";
                    //header('Location: index.php?var=2');
                    ?>
                    <script>
                    if(!alert('Room not found for such dates')){window.location.href = "../index.php";}
                    </script>

                    <?php
                  }
                  else
                  {
                    echo "Room  found for such dates";


                    if($UID == '')
                    {
                      //echo "Your does not enter User ID";
                      //header('Location: index.php?var=3');
                        //echo "User Id empty";
                        //if(!alert('User ID empty')){window.location.reload('index.php');}

                        ?>
                    <script>
                        if(!alert('User ID empty')){
                          //window.location.reload('index.php');
                          window.location.href = "../index.php";
                          
                          
                          }
                    </script>

                    <?php
                    }
  
                    elseif($UID != '')
                    {
                      echo "User Id not empty";
        
                        $sql = "SELECT First_Name FROM user where User_ID='$UID' And E_mail_ID='$email'";
                        $result = $conn->query($sql);
                        
                        $id = '';
                        if ($result->num_rows > 0)
                          {
                          // output data of each row
  
                          while($row = $result->fetch_assoc())
                            {
                              $id = $row["First_Name"];
                              echo $id;
                            }
                        } 
                        else 
                        {
                          echo "Your User id and Email is not correct kindly check";
                        }
  
  
  
                        
  
                        if($id == '')
                        {
                          //echo "No Record Found";
                          // entered wrong authentication cant book room.  
                          //header('Location: index.php?var=4');
                          //if(!alert('entered wrong authentication cant book room')){window.location.reload('index.php');}
                          ?>
                          <script>
                          if(!alert('entered wrong authentication cant book room')){window.location.href = "../index.php";}
                          </script>
      
                          <?php
  
  
  
                          
  
  
                        }
                        else
                        {
  
  
                          $sql = "INSERT INTO booking (From_Date, To_Date, Price_of_Booking, Room_Number, User_ID, Booking_Date)
                          VALUES ('$fromdate',  '$todate', '$price', '$roomno', '$UID', '$currentData')";
                          
                          
                          if ($conn->query($sql) === TRUE) 
                          {
                            //if(!alert('Congurations!!')){window.location.reload('index.php');}
                            ?>
                            <script>
                            if(!alert('Congurations!!')){window.location.href = "../index.php";}
                            </script>
        
                            <?php
                           

                            \Stripe\Stripe::setVerifySslCerts(false);

                            $data=\Stripe\Charge::create(
                              array(
                                  "amount"=>$price,
                                  "currency"=>"usd",
                                  "description"=>"Very good",
                                  "source"=>$token,
                              )
                              );
                              //echo"<pre>";
                              //print_r($data);





                            //room book with existing user
                              
                              echo "Successful";
                            } 
                            else 
                            {
                              echo "Error: " . $sql . "<br>" . $conn->error;
                            }
                        
  
  
  
  
  
                            $sql = "SELECT Booking_ID FROM booking where User_ID='$UID' And To_Date='$todate'";
                            $result = $conn->query($sql);
                            
                            $bid = '';
                            if ($result->num_rows > 0)
                              {
                              // output data of each row
  
                              while($row = $result->fetch_assoc())
                                {
                                  $bid = $row["Booking_ID"];
                                }
  
                                echo $bid;
                            } 
                            else 
                            {
                              echo "0 results";
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
                            $mail->AddAddress("$email", "$fname");
                            $mail->SetFrom("engineerhotelmail@gmail.com", "Engineer Hotel");
                            //$mail->AddReplyTo("reply-to-email@domain", "reply-to-name");
                            //$mail->AddCC("cc-recipient-email@domain", "cc-recipient-name");
                            $mail->Subject = "Room Booked";
                            $content = "<b>Dear".$fname." ".$lname."<br>Thanks for booking room with us. <br>You user id is  ".$UID."<br> You Booking id is  ".$bid."</b> <br>Hope you spent a good time with us.";
  
                            $mail->MsgHTML($content); 
                            if(!$mail->Send()) {
                              //echo "Error while sending Email.";
                              var_dump($mail);
                            } else {
                              //echo "Verify your Email.";
                            }
                            //echo "Verify your Email.";                          
  
                            
  
  
  
  
  
                        }
  
  
  
  
                        }






                  }







                  
      
             }
             else
             {
              //echo "No such room find";
              //header('Location: index.php?var=1');
              //if(!alert('No such room find!')){window.location.reload('index.php');}
              ?>
                          <script>
              if(!alert('No such room find!')){window.location.href = "../index.php";}
                          </script>
      
                          <?php

             }
            



           
            CloseCon($conn); 
            ?>
   </body>
</html>