<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        form { 
         margin: 0 auto; 
         width:400px;
         }
         
     </style>
</head>
<body>
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
                <div class="form-group col-md-9">
                    <label for="Email">Email</label>
                    <input type="email" class="form-control" name="Email" id="Email"   placeholder="Abdullah@gmail.com">
                </div>
                <div class="form-group col-md-3" id="BUTTON1">
                    <label id="LABEL">Button</label>
                    <button class="btn btn-primary" onclick='verifymail();' >Verify Now</button>
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
                  <input type="text" class="form-control" id="UID" name="UID" placeholder="">
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
      
      <script>

    function verifymail(){
        
        var str = document.getElementById('Email').value;
        var str1 = document.getElementById('FName').value;
        var str2 = document.getElementById('LName').value;

        var x = document.getElementById("BUTTON1").disabled;
        console.log(document.getElementById("BUTTON1").disabled;);
        if (str == "") {
            alert("Enter correct e-mail")
            return;
        }
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
            alert("Verify your email");
            
        }
        xhttp.open("GET", "verifymail.php?q="+str+"&l="+str1+"&j="+str2);
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
               

               document.getElementById("BUTTON1").style.display="block";
               console.log($name);
            }
         }
         
      </script>
  
</body>
</html>