<html>
   <body>
      <?php
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
          Good morning roomno <?php echo $roomno; ?><br>
          Good morning1 UID <?php echo $UID; ?><br>

          <?php
            include 'Connection.php';
            $conn = OpenCon();


            $sql = "SELECT Price FROM room where Room_Number='$roomno'";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) 
            {
              // output data of each row
              while($row = $result->fetch_assoc()) 
              {
                $price = $row["Price"];
              }
            } 
            else
            {
              echo "0 results";
            }

            if($price != '')
            {


                  if($UID == '')
                  {
                    echo "User Id empty";
                      
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
                          }
                      } 
                      else 
                      {
                        echo "0 results";
                      }



                      

                      if($id == '')
                      {
                        echo "No Record Found";
                        // entered wrong authentication cant book room.  
                        header('Location: test.php?var=2');

                      }
                      else
                      {


                        $sql = "INSERT INTO booking (From_Date, To_Date, Price_of_Booking, Room_Number, User_ID, Booking_Date)
                        VALUES ('$fromdate',  '$todate', '$price', '$roomno', '$UID', '$currentData')";
                        
                        
                        if ($conn->query($sql) === TRUE) 
                        {
                          //room book with existing user
                            header('Location: test.php?var=3');
                            echo "Successful";
                          } 
                          else 
                          {
                            echo "Error: " . $sql . "<br>" . $conn->error;
                          }
                      
                      }




                      }
      
             }
             else
             {
               // var = 0  mean no room
              header('Location: test.php?var=4');
             }
            



           
            CloseCon($conn); 
            ?>
   </body>
</html>