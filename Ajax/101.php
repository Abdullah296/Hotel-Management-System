<!DOCTYPE html>
<html lang="en">
   <head>
      <link rel="icon" href="../image/hms.ico">
      <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
         form { 
         margin: 0 auto; 
         width:400px;
         }
         #LABEL { visibility: hidden;}
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
   <div class="container" style="max-width:1500px">
         <img src="../image/download.jpg" alt="Snow" style="width:100%; height: 400px;">
         <div class="centered"><h2 style="color:green"><b> Welcome to Engineer Hotel </b></h2></div>
   </div>
      
      <h2 > 
         Room - 
         <?php
            require('config.php');
            $var_value = $_GET['varname'];
            echo $var_value;
            ?>
      </h2>
      <p>
         Following are the facilities are available in this rooms.
      </p>
      <?php
         include '../Ajax/Connection.php';
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
         $sql = "SELECT Price FROM room where Room_Number='$var_value'";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) 
            {
              $price ='0';
              while($row = $result->fetch_assoc()) 
              {
                $price = $row["Price"];
                $price = $price * 100;
              }
            } 
            else
            {
               ?>
              <script>
                  alert("NO such room find in our database") ;
                  
              </script>
              <?php
              header('Location: ../index.php');
            }
         ?>
      <h2>
         Book Now
         </h2>
      <div class="formm" id="formm">
         <form action="modified.php?varname=<?php echo $var_value ?>" method = "post" >
            <div class="form-row">
               <div class="form-group col-md-12">
                  <select class="form-control" name="country" id="country" onchange="dynamicchange()" required >
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
                  <input class="w3-input w3-border" required class="form-control" onchange="mintodate()" name="Fromdate" type="date" id="Fromdate" min="<?php echo date("Y-m-d"); ?>">
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
            <div class="form-row">
               <div class="form-group col-md-6">
               
               <script 
                     
                     src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                     data-key="<?php echo $publishableKey ?>"; 
                     data-amount="<?php  echo $price; ?>"
                     data-name="Engineer Hotel"
                     data-description="Room - <?php  echo $var_value; ?>"
                     data-image=""
                     data-currency="usd"
                  >
                  </script>

               </div>
               <div class="form-group col-md-3">
                  <button class="btn btn-primary" onclick='forgetUID();' id="BUTTON3">Forget UID</button>
               </div>
            </div>
            
            
         </form>
      </div>
      <?php   
         CloseCon($conn);    
             
             ?>
      <script>
         // Tabs

         document.getElementsByClassName("stripe-button-el")[0].disabled=true;

         document.getElementById("FName").disabled = true;
         document.getElementById("LName").disabled = true;
         document.getElementById("Email").disabled = true;
         document.getElementById("UID").disabled = true;
         document.getElementById("Fromdate").disabled = true;
         document.getElementById("todate").disabled = true;
         document.getElementById("Adult").disabled = true;
         
         document.getElementById("Button1").style.display="none";
         document.getElementById("BUTTON2").style.display="none";
         document.getElementById("BUTTON3").style.display="none";

         function mintodate()
                  {
                     var str = document.getElementById('Fromdate').value;

                     if(str != "")
                     {
                        document.getElementById('todate').setAttribute("min", str);
                     }

                  }

         function forgetUID()
         {
            var str = document.getElementById('Email').value;
            if (str == "") 
            {
               alert("Enter correct e-mail")
               return;
            }

            const xhttp = new XMLHttpRequest();
            xhttp.onload = function() 
            {
               alert(this.responseText.split('\n')[0]);

            }
            xhttp.open("GET", "../Ajax/forgetUID.php?q="+str);
            xhttp.send();

         }

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
            alert(this.responseText.split('\n')[0]);
            
            document.getElementById("UID").disabled = false;
        }
        xhttp.open("GET", "../Ajax/verifymail.php?q="+str+"&l="+str1+"&j="+str2);
        xhttp.send();
        }


         function dynamicchange() {
            $name = document.getElementById("country").value;
            if($name == "Existing")
            {    
               document.getElementsByClassName("stripe-button-el")[0].disabled=false;
               document.getElementById("FName").disabled = true;
               document.getElementById("LName").disabled = true;
               document.getElementById("Email").disabled = false;
               document.getElementById("UID").disabled = false;
               document.getElementById("Fromdate").disabled = false;
               document.getElementById("todate").disabled = false;
               document.getElementById("Adult").disabled = false;
               

               document.getElementById("FName").required = false;
               document.getElementById("Email").required = true;
               document.getElementById("UID").required = true;

               document.getElementById("Button1").style.display="none";
               document.getElementById("BUTTON2").style.display="block";
               document.getElementById("BUTTON3").style.display="block";
               console.log($name);
               

            }
            if($name == "New")
            {    
               document.getElementsByClassName("stripe-button-el")[0].disabled=false;
               document.getElementById("FName").disabled = false;
               document.getElementById("LName").disabled = false;
               document.getElementById("Email").disabled = false;
               document.getElementById("UID").disabled = true;
               document.getElementById("Fromdate").disabled = false;
               document.getElementById("todate").disabled = false;
               document.getElementById("Adult").disabled = false;

               document.getElementById("FName").required = true;
               document.getElementById("Email").required = true;
               document.getElementById("UID").required = false;
               
               document.getElementById("Button1").style.display="block";
               document.getElementById("BUTTON2").style.display="block";
               document.getElementById("BUTTON3").style.display="none";
               

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