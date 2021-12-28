<?php   
session_start();  
if(!isset($_SESSION["sess_user"])){  
    header("location:Signin.php");  
} else {  
?> 
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="./image/hms.ico">
      <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Engineer Hotel</title>
    <style>
        form { 
         margin: 0 auto; 
         width:400px;
         }
    </style>
</head>
<body>
    <h2>
        Welcome here.
        <a href="logout.php">Logout</a>
        </h2>
    <br>
    <br>
    <br>
    
        <div class="w3-display-middle" style="width:75%; border:2px solid black;" >
        <br>
        <br>
        <br>
        <br>
        
            <div class="w3-bar w3-black">
            <button class="w3-bar-item w3-button tablink" onclick="openLink(event, 'check');"><i class="fas fa-bed w3-margin-right"></i>Check all reservation</button>

               <button class="w3-bar-item w3-button tablink" onclick="openLink(event, 'Addroom');"><i class="fas fa-door-open w3-margin-right"></i>Add Room</button>
               <button class="w3-bar-item w3-button tablink" onclick="openLink(event, 'delroom');"><i class="fas fa-door-closed w3-margin-right"></i>Delete Room</button>
               <button class="w3-bar-item w3-button tablink" onclick="openLink(event, 'booroom');"><i class="fas fa-plane-arrival w3-margin-right"></i>Book Room</button>
               <button class="w3-bar-item w3-button tablink" onclick="openLink(event, 'delete');"><i class="fas fa-plane-departure w3-margin-right"></i>Delete Booking</button>
               <button class="w3-bar-item w3-button tablink" onclick="openLink(event, 'find');"><i class="fas fa-luggage-cart w3-margin-right"></i>Find empty room</button>
               <button class="w3-bar-item w3-button tablink" onclick="openLink(event, 'user');"><i class="fas fa-male w3-margin-right"></i>User info</button>
            </div>


            <div id="Addroom" class="w3-container w3-white w3-padding-16 myLink">
               <h3>Find Rooms</h3>
               
               <div class="w3-row-padding" style="margin:0 -16px;">
                  <div class="w3-half">
                     <label>Room Number</label>
                     <input class="w3-input w3-border" type="text" name="RNO" id="RNo" placeholder="i-e 104" >
                  </div>
                  <div class="w3-half">
                     <label>Area </label>
                     <input class="w3-input w3-border" type="text" name="Area" id="Area" placeholder="i-e 25 sq ft">
                  </div>
                  <div class="w3-col">
                     <label>Price</label>
                     <input class="w3-input w3-border" type="text"  name="price" id="price" placeholder=" i-e $100">
                  </div>
                  <div class="w3-half">
                     <label>Internet</label>
                     <select class='form-control' name='INTERNET' id='INTERNET' >
                    <option value='#'>-Select-</option>
                    <option value='T'>Yes</option>
                    <option value='F'>No</option>
                    </select>

                  </div>
                  <div class="w3-half">
                     <label>Newspaper</label>
                     <select class='form-control' name='Newspaper' id='Newspaper' >
                    <option value='#'>-Select-</option>
                    <option value='T'>Yes</option>
                    <option value='F'>No</option>
                    </select>
                  </div>
                  <div class="w3-half">
                     <label>BathTub</label>
                     <select class='form-control' name='BathTub' id='BathTub' >
                    <option value='#'>-Select-</option>
                    <option value='T'>Yes</option>
                    <option value='F'>No</option>
                    </select>
                  </div>
                  <div class="w3-half">
                     <label>Shower</label>
                     <select class='form-control' name='Shower' id='Shower' >
                    <option value='#'>-Select-</option>
                    <option value='T'>Yes</option>
                    <option value='F'>No</option>
                    </select>
                  </div>
                  <div class="w3-half">
                     <label>Iron</label>
                     <select class='form-control' name='Iron' id='Iron' >
                    <option value='#'>-Select-</option>
                    <option value='T'>Yes</option>
                    <option value='F'>No</option>
                    </select>
                  </div>
                  <div class="w3-half">
                     <label>Ironing Table</label>
                     <select class='form-control' name='Ironing' id='Ironing' >
                    <option value='#'>-Select-</option>
                    <option value='T'>Yes</option>
                    <option value='F'>No</option>
                    </select>
                  </div>


               </div>
               <br>
                <br>
               <p><button  class="w3-button w3-dark-grey"  onclick='addRoom();'>Add Room</button></p>

            </div>


            <div id="delroom" class="w3-container w3-white w3-padding-16 myLink">
               <h3>Delete Room</h3>
               <div class="w3-row-padding" style="margin:0 -16px;">
                  <div class="w3-half">
                     <label>Room Number.</label>
                     <input class="w3-input w3-border" type="text" id="Rno1" placeholder="i-e 123321">
                  </div>
                  
               </div>
               <br>
                <br>
               <p><button class="w3-button w3-dark-grey" onclick='Deleteroom();'>Delete room</button></p>
            </div>


            <div id="booroom" class="w3-container w3-white w3-padding-16 myLink">
               <h3> Book Room </h3>
               <div class="w3-row-padding" style="margin:0 -16px;">
                  <div class="w3-half">
                     <label>From:</label>
                     <input class="w3-input w3-border" onchange="mintodate()" type="date" name="RDate" id="RDate" min="<?php echo date("Y-m-d"); ?>" >
                  </div>
                  <div class="w3-half">
                     <label>To: </label>
                     <input class="w3-input w3-border" type="date" name="RDate" id="RDate1" min="<?php echo date("Y-m-d"); ?>" >
                  </div>
                  
               </div>
               <br>
                <br>
               <p><button  class="w3-button w3-dark-grey"  onclick='showRoom();'>Search rooms</button></p>
               <div id="txtHint">
                </div>
        </div>

            <div id="delete" class="w3-container w3-white w3-padding-16 myLink">
               <h3> Delete Booking </h3>
               <div class="w3-row-padding" style="margin:0 -16px;">
                  <div class="w3-half">
                     <label>Please Enter Booking ID number.</label>
                     <input class="w3-input w3-border" type="text" id="RNo3" placeholder=" i-e 123321">
                  </div>
               </div>
               <br>
                <br>
               <p><button class="w3-button w3-dark-grey" onclick='deletebook();'>Cancel Now</button></p>
            </div>


            <div id="check" class="w3-container w3-white w3-padding-16 myLink">
               
               <div class="w3-row-padding" style="margin:0 -16px;">

               <?php
               include './Ajax/Connection.php';
               $conn = OpenCon();


                $sql = "SELECT * FROM booking";

                            $result = $conn->query($sql);
                            
                            if ($result->num_rows > 0)
                              {
                                echo "<h2><t>Bookings </h2>";
                                echo "<table border='2' width='100%'>";
                                echo
                                                "<tr>
                                                    <td width='20%'>Booking ID</td>
                                                    <td width='20%'>Room Number.</td>
                                                    <td width='20%'>User_Id</td>
                                                    <td width='20%'>From_Date</td>
                                                    <td width='20%'>To_Date</td>
                                                </tr>";
  
                              while($row = $result->fetch_assoc())
                                {
                                    echo        "<tr>
                                        <td >".$row['Booking_ID']."</td>
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
                              echo "No Booking Right now, Refresh now to check again.";
                            }

                ?>

               </div>
               
            </div>

            <div id="user" class="w3-container w3-white w3-padding-16 myLink">
               <h3> Find User info </h3>
               <div class="w3-row-padding" style="margin:0 -16px;">
                  
                  <div class="w3-half">
                     <label>User ID number.</label>
                     <input class="w3-input w3-border" type="text" id="RNo4" placeholder="123321">
                  </div>
               </div>
               <br>
                <br>
               <p><button class="w3-button w3-dark-grey" onclick='finduser();'>Find User</button></p>
               <div id='txtHint1'>
                </div>
            </div>


            <div id="find" class="w3-container w3-white w3-padding-16 myLink">
                <h3>Find Rooms</h3>
               <div class="w3-row-padding" style="margin:0 -16px;">
                  <div class="w3-half">
                     <label>From:</label>
                     <input class="w3-input w3-border" onchange="mintodate()" type="date" name="RDate" id="RDate" min="<?php echo date("Y-m-d"); ?>" >
                  </div>
                  <div class="w3-half">
                     <label>To: </label>
                     <input class="w3-input w3-border" type="date" name="RDate" id="RDate1" min="<?php echo date("Y-m-d"); ?>" >
                  </div>
                  
               </div>
               <br>
                <br>
               <p><button  class="w3-button w3-dark-grey"  onclick='showRoom();'>Search rooms</button></p>
               <div id="txtHint">
                </div>
               
            </div>

         </div>
    </div>








<script>
    function finduser()
    {
        var str1 = document.getElementById('RNo4').value;
        if(str1 == '')
        {
            alert('Enter User Id');
            return;
        }
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
            document.getElementById("txtHint1").innerHTML = this.responseText;
        }
        xhttp.open("GET", "./Ajax/updateform.php?opt=5&a="+str1);
        xhttp.send();
    }

    function Deleteroom()
    {
        var str1 = document.getElementById('Rno1').value;
        if(str1 == '')
        {
            alert('Enter Room Number');
            return;
        }
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
            alert(this.responseText);
        }
        xhttp.open("GET", "./Ajax/updateform.php?opt=3&a="+str1);
        xhttp.send();

    }

    function showRoom()
    {
                 var str = document.getElementById('RDate').value;
                 var str1 = document.getElementById('RDate1').value;
         
                 if (str == "") {
                     document.getElementById("txtHint").innerHTML = "Please Enter From Date";
                     return;
                 }
                 if (str1 == "") {
                     document.getElementById("txtHint").innerHTML = "Please Enter To Date";
                     return;
                 }
                 const xhttp = new XMLHttpRequest();
                 xhttp.onload = function() {
                     document.getElementById("txtHint").innerHTML = this.responseText;
                     //document.getElementById("txtHint").innerHTML = "You are good";
                 }
                 xhttp.open("GET", "./Ajax/getroom.php?q="+str+"&p="+str1);
                 xhttp.send();
    }

    function mintodate()
                  {
                     var str = document.getElementById('RDate').value;

                     if(str != "")
                     {
                        document.getElementById('RDate1').setAttribute("min", str);
                     }

                  }
function deletebook()
{
    var str1 = document.getElementById('RNo3').value;
    if(str1 == '')
    {
        alert('Enter Booking Number');
        return;
    }
    const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
            alert(this.responseText);
        }
        xhttp.open("GET", "./Ajax/updateform.php?opt=4&a="+str1);
        xhttp.send();

}



function addRoom()
{
    var str1 = document.getElementById('RNo').value;
    var str2 = document.getElementById('Area').value;
    var str3 = document.getElementById('price').value;
    var str4 = document.getElementById('INTERNET').value;
    var str5 = document.getElementById('Newspaper').value;
    var str6 = document.getElementById('BathTub').value;
    var str7 = document.getElementById('Shower').value;
    var str8 = document.getElementById('Iron').value;
    var str9 = document.getElementById('Ironing').value;

    if(str1 == '')
    {
        alert('Enter Room Number');
        return;
    }
    else if(str2 == '')
    {
        alert('Enter Area of Room');
        return;
    }
    else if(str3 == '')
    {
        alert('Enter price of Room');
        return;
    }
    else if(str4 == '#')
    {
        alert('Enter Internet availability');
        return;
    }
    else if(str5 == '#')
    {
        alert('Enter Newspaper availability');
        return;
    }
    else if(str6 == '#')
    {
        alert('Enter BathTub availability');
        return;
    }
    else if(str7 == '#')
    {
        alert('Enter shower availability');
        return;
    }
    else if(str8 == '#')
    {
        alert('Enter Iron availability');
        return;
    }
    else if(str9 == '#')
    {
        alert('Enter Ironing table availability');
        return;
    }

    const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
            alert(this.responseText);
        }
        xhttp.open("GET", "./Ajax/updateform.php?opt=2&a="+str1+"&b="+str2+"&c="+str3+"&d="+str4+"&e="+str5+"&f="+str6+"&g="+str7+"&h="+str8+"&i="+str9);
        xhttp.send();

}  

function openLink(evt, linkName) {
                    var i, x, tablinks;
                    x = document.getElementsByClassName("myLink");
                    for (i = 0; i < x.length; i++) {
                      x[i].style.display = "none";
                    }
                    tablinks = document.getElementsByClassName("tablink");
                    for (i = 0; i < x.length; i++) {
                      tablinks[i].className = tablinks[i].className.replace(" w3-red", "");
                    }
                    document.getElementById(linkName).style.display = "block";
                    evt.currentTarget.className += " w3-red";
                  }
                  
                  // Click on the first tablink on load
                  document.getElementsByClassName("tablink")[0].click();

</script>
</body>
</html>

<?php  
}  
?>  