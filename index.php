<!DOCTYPE html>
<html lang="en">
   <head>
      <link rel="icon" href="./image/hms.ico">
      <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Engineer Hotel </title>
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
         .centered 
         {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            }
      </style>
   </head>
   <body>
   <div class="container">
         <img src="./image/download.jpg" alt="Snow" style="width:100%; height: 400px;">
         <div class="centered"><h2 style="color: #ff00a5"><b>Welcome to Engineer Hotel</b></h2></div>
   </div>

      <div class="w3-display-container w3-content w3-hide-small" style="max-width:1500px">
         <img class="w3-image" src="./image/download (2).jpg" alt="London" style="width:100%; height: 350px;">
         <div class="w3-display-middle" style="width:65%">
            <div class="w3-bar w3-black">
               <button class="w3-bar-item w3-button tablink" onclick="openLink(event, 'Flight');"><i class="fas fa-hotel w3-margin-right"></i>Find Rooms</button>
               <button class="w3-bar-item w3-button tablink" onclick="openLink(event, 'Hotel');"><i class="fa fa-bed w3-margin-right"></i>Check Reservation</button>
               <button class="w3-bar-item w3-button tablink" onclick="openLink(event, 'Car');"><i class="fas fa-luggage-cart w3-margin-right"></i>Cancel Reservation</button>
            </div>
            <div id="Flight" class="w3-container w3-white w3-padding-16 myLink">
               <h3>Find Rooms</h3>
               <div class="w3-row-padding" style="margin:0 -16px;">
                  <div class="w3-third">
                     <label>From:</label>
                     <input class="w3-input w3-border" onchange="mintodate()" type="date" name="RDate" id="RDate" min="<?php echo date("Y-m-d"); ?>" >
                  </div>
                  <div class="w3-third">
                     <label>To: </label>
                     <input class="w3-input w3-border" type="date" name="RDate" id="RDate1" min="<?php echo date("Y-m-d"); ?>" >
                  </div>
                  <div class="w3-third">
                     <label>No of Bed rooms</label>
                     <input class="w3-input w3-border" type="text" placeholder="Bed rooms i-e 1">
                  </div>
               </div>
               <p><button  class="w3-button w3-dark-grey"  onclick='showRoom();'>Search rooms</button></p>
            </div>
            <div id="Hotel" class="w3-container w3-white w3-padding-16 myLink">
               <h3>Reservation</h3>
               <div class="w3-row-padding" style="margin:0 -16px;">
                  <div class="w3-half">
                     <label>Please Enter your Booking ID number.</label>
                     <input class="w3-input w3-border" type="text" id="B_ID" placeholder="123321">
                  </div>
                  <div class="w3-half">
                     <label>Please Enter your User ID number.</label>
                     <input class="w3-input w3-border" type="text" id="U_ID" placeholder="123321">
                  </div>
               </div>
               <p><button class="w3-button w3-dark-grey" onclick='CheckRoom();'>Check Now</button></p>
            </div>
            <div id="Car" class="w3-container w3-white w3-padding-16 myLink">
               <h3> Cancel Now </h3>
               <div class="w3-row-padding" style="margin:0 -16px;">
                  <div class="w3-half">
                     <label>Please Enter your Booking ID number.</label>
                     <input class="w3-input w3-border" type="text" id="C1_ID" placeholder="123321">
                  </div>
                  <div class="w3-half">
                     <label>Please Enter your User ID number.</label>
                     <input class="w3-input w3-border" type="text" id="C2_ID" placeholder="123321">
                  </div>
               </div>
               <p><button class="w3-button w3-dark-grey" onclick='CancelRoom();'>Cancel Now</button></p>
            </div>
         </div>
      </div>
      <div id="txtHint">
         <h5>     &emsp;&emsp; Please Enter Date and then click on Check Now to find the Available room.</h5>
      </div>
      <div class="hi">
         <br><br><br><br><br><br><br>
      </div>
      <?php
         $var = isset($_GET['var']) ? $_GET['var'] : '';
         if($var == 1)
         {
            echo '<script language="javascript">';
            echo 'alert("Congurations, Your Booking successful  and Your User Data is also Saved.")';
            echo '</script>';
            header('Location: index.php');
         }
         elseif($var == 2)
         {
            echo '<script language="javascript">';
            echo 'alert("Unsuccessful, You have provided wrong authentication i-e Email and user id. Kindly recheck.")';
            echo '</script>';
            
         }
         elseif($var == 3)
         {
            echo '<script language="javascript">';
            echo 'alert("Congurations, Your booking is successful. Thanks for booking again with us.")';
            echo '</script>';
            
         }
         elseif($var == 4)
         {
            echo '<script language="javascript">';
            echo 'alert("No room Found.")';
            echo '</script>';
            
         }
         elseif($var == 5)
         {
            echo '<script language="javascript">';
            echo 'alert("Room not avaiable for the given dates.")';
            echo '</script>';
            
         }
         
         ?>
      <script>
         // Get the modal
         
                  function mintodate()
                  {
                     var str = document.getElementById('RDate').value;

                     if(str != "")
                     {
                        document.getElementById('RDate1').setAttribute("min", str);
                     }

                  }
         

                 function showRoom(){
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
                 }
                 xhttp.open("GET", "./Ajax/getroom.php?q="+str+"&p="+str1);
                 xhttp.send();
                 }
         
                 function CheckRoom(){
                 var str = document.getElementById('B_ID').value;
                 var str1 = document.getElementById('U_ID').value;
         
                 if (str == "") {
                     document.getElementById("txtHint").innerHTML = "Please Enter Booking ID";
                     return;
                 }
                 if (str1 == "") {
                     document.getElementById("txtHint").innerHTML = "Please Enter User ID";
                     return;
                 }
                 const xhttp = new XMLHttpRequest();
                 xhttp.onload = function() {
                     document.getElementById("txtHint").innerHTML = this.responseText;
                 }
                 xhttp.open("GET", "./Ajax/checkroom.php?q="+str+"&p="+str1);
                 xhttp.send();
                 }
         
         
         
                 function CancelRoom(){
                 var str = document.getElementById('C1_ID').value;
                 var str1 = document.getElementById('C2_ID').value;
         
                 if (str == "") {
                     document.getElementById("txtHint").innerHTML = "Please Enter Booking ID";
                     return;
                 }
                 if (str1 == "") {
                     document.getElementById("txtHint").innerHTML = "Please Enter User ID";
                     return;
                 }
                 const xhttp = new XMLHttpRequest();
                 xhttp.onload = function() {
                     //const myArray = this.responseText.split("GOOD");
                     //document.getElementById("txtHint").innerHTML = this.responseText.slice(0, this.responseText.indexOf('GOOD'));
                     document.getElementById("txtHint").innerHTML = this.responseText.split('\n')[0];
                 }
                 xhttp.open("GET", "./Ajax/Cancelreservation.php?q="+str+"&p="+str1);
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