<!DOCTYPE html>
<html lang="en">
   <head>
      <link rel="icon" href="./hms.ico">
      <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Chaudary Hotel </title>
      <style>
         .myLink
         {
         display: none
         }
         table 
         {
         width: 75%;
         margin-left: auto;
         margin-right: auto;
         }
         td 
         {
         text-align: center;
         }
         .rooom h2 
         {
         padding-left: 170px;
         }
         form { 
         margin: 0 auto; 
         width:400px;
         }
         #LABEL { visibility: hidden;}
      </style>
   </head>
   <body>
      <div class="w3-display-container w3-content w3-hide-small" style="max-width:1500px">
         <img class="w3-image" src="./scenary.jfif" alt="London" width="1500" height="700">
         <div class="w3-display-middle" style="width:65%">
            <div class="w3-bar w3-black">
               <button class="w3-bar-item w3-button tablink" onclick="openLink(event, 'Flight');"><i class="fa fa-plane w3-margin-right"></i>Find Rooms</button>
               <button class="w3-bar-item w3-button tablink" onclick="openLink(event, 'Hotel');"><i class="fa fa-bed w3-margin-right"></i>Check Reservation</button>
               <button class="w3-bar-item w3-button tablink" onclick="openLink(event, 'Car');"><i class="fa fa-car w3-margin-right"></i>Cancel Reservation</button>
            </div>
            <div id="Flight" class="w3-container w3-white w3-padding-16 myLink">
               <h3>Find Rooms</h3>
               <div class="w3-row-padding" style="margin:0 -16px;">
                  <div class="w3-third">
                     <label>Date</label>
                     <input class="w3-input w3-border" type="date" id="birthday" >
                  </div>
                  <div class="w3-third">
                     <label>No of Bed rooms</label>
                     <input class="w3-input w3-border" type="text" placeholder="Bed rooms i-e 1">
                  </div>
                  <div class="w3-third">
                     <label>Category</label>
                     <input class="w3-input w3-border" type="text" placeholder="Arriving at">
                  </div>
               </div>
               <p><button class="w3-button w3-dark-grey"  onclick='myfunction();'>Search rooms</button></p>
            </div>
            <div id="Hotel" class="w3-container w3-white w3-padding-16 myLink">
               <h3>Reservation</h3>
               <label>Please Enter your ID number.</label>
               <input class="w3-input w3-border" type="text" placeholder="123321">
               <p><button class="w3-button w3-dark-grey">Check Now</button></p>
            </div>
            <div id="Car" class="w3-container w3-white w3-padding-16 myLink">
               <h3> Cancel Now </h3>
               <label>Please Enter your Reservation number.</label>
               <input class="w3-input w3-border" type="text" placeholder="123321">
               <p><button class="w3-button w3-dark-grey">Cancel Now</button></p>
            </div>
         </div>
      </div>
      <h2 > 
         Room - 
         <?php
            $var_value = $_GET['varname'];
            echo $var_value;
            ?>
      </h2>
      <p>
         Following are the facilities are available in this rooms.
      </p>
      <?php
         include './Ajax/Connection.php';
         $conn = OpenCon();
         
             $records = mysqli_query($conn,"select * from room where Room_Number='$var_value'"); // fetch data from database
         
             while($data = mysqli_fetch_array($records))
             {
         ?>
      <ul>
         <?php
            if ($data['Internet']  == 'T') 
            {
                    ?>
         <li>
            <i class="fa fa-wifi"></i>
            <p>Wifi Facility</p>
         </li>
         <?php
            }
            
            if ($data['BathTub']  == 'T') 
            {
                    ?>
         <li>
            <i class="fa fa-bath"></i>
            <p>Bath Tub Available</p>
         </li>
         <?php
            }
            
            if ($data['NewsPaper']  == 'T') 
            {
                    ?>
         <li>
            <i class="fa fa-newspaper-o"></i>
            <p>Daily Newspaper</p>
         </li>
         <?php
            }
            
            if ($data['Iron']  == 'T') 
            {
                    ?>
         <li>
            <i class="fa fa-steam"></i>
            <p>Iron press</p>
         </li>
         <?php
            }
            ?>
      </ul>
      <?php
         }
         ?>
      <h2>
         Book Now
         </h2>
      <div class="formm" >
         <form action="modified.php?varname=<?php echo $var_value ?>" method = "post" >
            <div class="form-row">
               <div class="form-group col-md-12">
                  <select class="form-control" name="country" id="country" onchange="dynamicchange()" >
                     <option value="#">-Select-</option>
                     <option value="Existing">Existing</option>
                     <option value="New">New</option>
                  </select>
               </div>
            </div>
            <div class="form-row">
               <div class="form-group col-md-6">
                  <label>First Name</label>
                  <input type="text" class="form-control" id="FName" name="FName" placeholder="Abdullah">
               </div>
               <div class="form-group col-md-6">
                  <label for="LName">Last Name</label>
                  <input type="text" class="form-control" name="LName" id="LName"  placeholder="Malik">
               </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-9" >
                    <label for="Email">Email</label>
                    <input type="email" class="form-control" name="Email" id="Email"  onchange="myFunction()" placeholder="Abdullah@gmail.com">
                </div>
                <div class="form-group col-md-3"id="Button1">
                    <label id="LABEL">Button</label>
                    <button class="btn btn-primary" onclick='verifymail();'>Verify Now</button>
                </div>
            </div>
            <div class="form-row">
               <div class="form-group col-md-6">
                  <label for="Fromdate">From Date:</label>
                  <input class="w3-input w3-border" required class="form-control" name="Fromdate" type="date" id="Fromdate" min="<?php echo date("Y-m-d"); ?>">
               </div>
               <div class="form-group col-md-6">
                  <label for="todate">To Date:</label>
                  <input class="w3-input w3-border"  required class="form-control" name="todate" type="date" id="todate" min="<?php echo date("Y-m-d"); ?>" >
               </div>
            </div>
            <div class="form-row">
               <div class="form-group col-md-6">
                  <label for="Adult">Number of Adult</label>
                  <input type="text" class="form-control" id="Adult" name="Adult" placeholder="2">
               </div>
               <div class="form-group col-md-6">
                  <label for="Child">User ID</label>
                  <input type="text" class="form-control" id="UID" name="UID" placeholder="" required>
               </div>
            </div>
            <div class="form-group">
               <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="gridCheck">
                  <label class="form-check-label" for="gridCheck" required>
                  Accept all term and conditions
                  </label>
               </div>
            </div>
            <button type="submit" class="btn btn-primary">Book Now</button>
         </form>
      </div>
      <?php   
         CloseCon($conn);    
             
             ?>
      <script>
         // Tabs

         function verifymail(){
        
        var str = document.getElementById('Email').value;
        var str1 = document.getElementById('FName').value;
        var str2 = document.getElementById('LName').value;

        if (str == "") {
            alert("Enter correct e-mail")
            return;
        }
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
            alert("Verify your email");
            document.getElementById("UID").disabled = false;
        }
        xhttp.open("GET", "./Ajax/verifymail.php?q="+str+"&l="+str1+"&j="+str2);
        xhttp.send();
        }


         function dynamicchange() {
            $name = document.getElementById("country").value;
            if($name == "Existing")
            {    
               document.getElementById("FName").disabled = true;
               document.getElementById("LName").disabled = true;
               document.getElementById("Email").disabled = false;
               document.getElementById("UID").disabled = false;
               

               document.getElementById("FName").required = false;
               document.getElementById("Email").required = true;
               document.getElementById("UID").required = true;

               document.getElementById("Button1").style.display="none";
               console.log($name);
            }
            if($name == "New")
            {    
               document.getElementById("FName").disabled = false;
               document.getElementById("LName").disabled = false;
               document.getElementById("Email").disabled = false;
               document.getElementById("UID").disabled = true;

               document.getElementById("FName").required = true;
               document.getElementById("Email").required = true;
               document.getElementById("UID").required = false;
               
               document.getElementById("Button1").style.display="block";
               console.log($name);
            }
         }
         function myfunction(){    
           document.getElementById("rooom").style.display = "block";   
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