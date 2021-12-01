<html>
   <body>
      <?php
         $fname = isset($_POST['FName']) ? $_POST['FName'] : '';
         $lname = isset($_POST['LName']) ? $_POST['LName'] : '';
         $email = isset($_POST['Email']) ? $_POST['Email'] : '';
         $todate = isset($_POST['todate']) ? $_POST['todate'] : '';
         $fromdate = isset($_POST['Fromdate']) ? $_POST['Fromdate'] : '';
         $city = isset($_POST['City']) ? $_POST['City'] : '';
         
         $roomno = $_GET['varname'];
         $currentData =  date("Y-m-d"); 
         ?>
      Welcome <?php echo $fname; ?><br>
      Welcome <?php echo $lname; ?><br>
      Welcome <?php echo $email; ?><br>
      Welcome <?php echo $todate; ?><br>
      Welcome <?php echo $fromdate; ?><br>
      Welcome <?php echo $city; ?><br>
      Good morning <?php echo $roomno; ?><br>
      <?php
         include 'Connection.php';
         $conn = OpenCon();
         
         
         
         
         $sql = "INSERT INTO user (First_Name, Last_Name, E_mail_ID)
         VALUES ('$fname',  '$lname', '$email')";
         
         
         if ($conn->query($sql) === TRUE) {
           echo "New record created successfully";
         } else {
           echo "Error: " . $sql . "<br>" . $conn->error;
         }
         
         
         ?>
      <?php
         $sql = "SELECT User_ID FROM user where First_Name='$fname'";
         $result = $conn->query($sql);
         
         if ($result->num_rows > 0) {
           // output data of each row
           while($row = $result->fetch_assoc()) {
             $id = $row["User_ID"];
           }
         } else {
           echo "0 results";
         }
         
         
         
         $sql = "SELECT Price FROM room where Room_Number='$roomno'";
         $result = $conn->query($sql);
         
         if ($result->num_rows > 0) {
           // output data of each row
           while($row = $result->fetch_assoc()) {
             $price = $row["Price"];
           }
         } else {
           echo "0 results";
         }
         
         
         echo $id;
         
         
         
         $sql = "INSERT INTO booking (From_Date, To_Date, Price_of_Booking, Room_Number, User_ID, Booking_Date)
         VALUES ('$fromdate',  '$todate', '$price', '$roomno', '$id', '$currentData')";
         
         
         if ($conn->query($sql) === TRUE) {
             echo "New record created successfully";
           } else {
             echo "Error: " . $sql . "<br>" . $conn->error;
           }
         
           CloseCon($conn);    
           
         ?>
   </body>
</html>