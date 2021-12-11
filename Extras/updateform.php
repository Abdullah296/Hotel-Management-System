<?php

$option = $_REQUEST["opt"];
// echo $option;
if($option == '2')
{
    echo "ROOOOOM";
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
    }

else if($option == '3')
{
    $str1 = $_REQUEST["a"];
    include './Connection.php';
                $conn = OpenCon();

    $sql = "delete from `room`  where Room_Number='$str1';";
                            
                            
                            if ($conn->query($sql) === TRUE) 
                            {
                                //room book with existing user
                                // header('Location: index.php?var=3');
                                echo " Room deleted Successful";
                                } 
                                else 
                                {
                                    echo "Some Error Occured, can't add room";
                                //echo "Error: " . $sql . "<br>" . $conn->error;
                                }

                                CloseCon($conn); 
}

else if($option == 'addroom')
{
    //echo "addroom";
    echo"<div class='form-row'>";
    echo"<div class='form-group col-md-12'>";
    echo"<label>Room Number</label>";
    echo"<input type='text' class='form-control' id='RNo' name='RNo' placeholder='e.g 104'>";
    echo"</div>";
    echo"</div>";
    echo"<div class='form-row'>";
    echo"<div class='form-group col-md-12'>";
    echo"<label>Area</label>";
    echo"<input type='text' class='form-control' id='Area' name='Area' placeholder='e.g 25'>";
    echo"</div>";
    echo"</div>";
    echo"<div class='form-row'>";
    echo"<div class='form-group col-md-12'>";
    echo"<label>Price</label>";
    echo"<input type='text' class='form-control' id='price' name='price' placeholder='Rs 3000'>";
    echo"</div>";
    echo"</div>";
    echo"<div class='form-row'>";
    echo"<div class='form-group col-md-12'>";
    echo"<label>Internet</label>";
    echo"<select class='form-control' name='INTERNET' id='INTERNET' >";
    echo"<option value='#'>-Select-</option>";
    echo"<option value='T'>Yes</option>";
    echo"<option value='F'>No</option>";
    echo"</select>";
    echo"</div>";
    echo"</div>";
    echo"<div class='form-row'>";
    echo"<div class='form-group col-md-12'>";
    echo"<label>BathTub</label>";
    echo"<select class='form-control' name='BathTub' id='BathTub' >";
    echo"<option value='#'>-Select-</option>";
    echo"<option value='T'>Yes</option>";
    echo"<option value='F'>No</option>";
    echo"</select>";
    echo"</div>";
    echo"</div>";
    
    echo"<div class='form-row'>";
    echo"<div class='form-group col-md-12'>";
    echo"<label>NewsPaper</label>";
    echo"<select class='form-control' name='NewsPaper' id='NewsPaper' >";
    echo"<option value='#'>-Select-</option>";
    echo"<option value='T'>Yes</option>";
    echo"<option value='F'>No</option>";
    echo"</select>";
    echo"</div>";
    echo"</div>";
    
    echo"<div class='form-row'>";
    echo"<div class='form-group col-md-12'>";
    echo"<label>Shower</label>";
    echo"<select class='form-control' name='Shower' id='Shower' >";
    echo"<option value='#'>-Select-</option>";
    echo"<option value='T'>Yes</option>";
    echo"<option value='F'>No</option>";
    echo"</select>";
    echo"</div>";
    echo"</div>";
    
    echo"<div class='form-row'>";
    echo"<div class='form-group col-md-12'>";
    echo"<label>Iron</label>";
    echo"<select class='form-control' name='Iron' id='Iron' >";
    echo"<option value='#'>-Select-</option>";
    echo"<option value='T'>Yes</option>";
    echo"<option value='F'>No</option>";
    echo"</select>";
    echo"</div>";
    echo"</div>";
    
    echo"<div class='form-row'>";
    echo"<div class='form-group col-md-12'>";
    echo"<label>Ironing Table</label>";
    echo"<select class='form-control' name='Ironing' id='Ironing' >";
    echo"<option value='#'>-Select-</option>";
    echo"<option value='T'>Yes</option>";
    echo"<option value='F'>No</option>";
    echo"</select>";
    echo"</div>";
    echo"</div>";
    echo"<div class='form-row'>";
    echo"<div class='form-group col-md-3'>";
    echo"<button class='btn btn-primary' onclick='addroom();' id='BUTTON3'>Add Room</button>";
    echo"</div>";
    echo"</div>";





}
else if($option == 'deleteroom')
{
    //echo "deleteroom";
    echo"<div class='form-row'>";
    echo"<div class='form-group col-md-12'>";
    echo"<label>Room Number</label>";
    echo"<input type='text' class='form-control' id='RNo1' name='RNo1' placeholder='e.g 104'>";
    echo"</div>";
    echo"</div>";

    echo"<div class='form-row'>";
    echo"<div class='form-group col-md-3'>";
    echo"<button class='btn btn-primary' onclick='deleteroom();' id='BUTTON4'>Delete Room</button>";
    echo"</div>";
    echo"</div>";
}
else if($option == 'bookroom')
{
    echo "bookroom";
    header('Location: index.php');
}
else if($option == 'deletebook')
{
    // echo "deletebook";
    echo"<div class='form-row'>";
    echo"<div class='form-group col-md-12'>";
    echo"<label>Booking Number</label>";
    echo"<input type='text' class='form-control' id='Bookno' name='Bookno' placeholder='e.g 104'>";
    echo"</div>";
    echo"</div>";

    echo"<div class='form-row'>";
    echo"<div class='form-group col-md-3'>";
    echo"<button class='btn btn-primary' onclick='deletebook();' id='BUTTON3'>Delete Booking</button>";
    echo"</div>";
    echo"</div>";
    
}
else if($option == 'checkall')
{
    include 'Connection.php';
    $conn = OpenCon();


    $sql = "SELECT * FROM booking";

                            $result = $conn->query($sql);
                            
                            if ($result->num_rows > 0)
                              {
                                echo "<h2><t>Rooms</h2>";
                                echo "<table border='2' width='100%'>";
                                echo
                                                "<tr>
                                                    <td width='25%'>Room Number.</td>
                                                    <td width='25%'>User_Id</td>
                                                    <td width='25%'>From_Date</td>
                                                    <td width='25%'>To_Date</td>
                                                </tr>";
  
                              while($row = $result->fetch_assoc())
                                {
                                    echo        "<tr>
                                        <td >".$row['Room_Number']."</td>
                                        <td >".$row['User_ID']."</td>
                                        <td >". $row['From_Date']."</td>
                                        <td >". $row['To_Date']."</td>";
                                }
                                echo"</td>
                                            </tr>";
                            
                                echo "</table>";
                                //echo $bid;
                            } 
                            else 
                            {
                              echo "0 results";
                            }
}

else if($option == 'Empty')
{
    include 'Connection.php';
    $conn = OpenCon();


    $sql = "SELECT * FROM booking";
    $result = $conn->query($sql);
                            
                            if ($result->num_rows > 0)
                              {
                                echo "<h2><t>Rooms</h2>";
                                echo "<table border='2' width='100%'>";
                                echo
                                                "<tr>
                                                    <td width='25%'>Room Number.</td>
                                                    <td width='25%'>User_Id</td>
                                                    <td width='25%'>From_Date</td>
                                                    <td width='25%'>To_Date</td>
                                                </tr>";
  
                              while($row = $result->fetch_assoc())
                                {
                                    echo        "<tr>
                                        <td >".$row['Room_Number']."</td>
                                        <td >".$row['User_ID']."</td>
                                        <td >". $row['From_Date']."</td>
                                        <td >". $row['To_Date']."</td>";
                                }
                                echo"</td>
                                            </tr>";
                            
                                echo "</table>";
                                //echo $bid;
                            } 
                            else 
                            {
                              echo "0 results";
                            }
}
else if($option == 'User1')
{
    echo "User1";
}
?>