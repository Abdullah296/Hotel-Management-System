<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="./image/hms.ico">
      <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      
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
        <form>
            <div class="form-row">
               <div class="form-group col-md-12">
                  <select class="form-control" name="SelectOption" id="SelectOption" onchange="dynamicchange()" required >
                     <option value="#">-Select-</option>
                     <option value="addroom">Add Room</option>
                     <option value="deleteroom">Delete Room</option>
                     <option value="bookroom">Book Room</option>
                     <option value="deletebook">Delete booking</option>
                     <option value="checkall">Check all reservation</option>
                     <option value="Empty">Find Empty rooms</option>
                     <option value="User1">User info</option>
                  </select>
               </div>
                <div id='txtHint'>
                <div id='txtHint1'>
                </div>

            </div>
        </form>



<script>
function deleteroom()
{

var str1 = (document.getElementById('RNo1').value);

        if (str1 == "") {
            alert("Enter Room Number")
            return;
        }
        
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
            //alert(this.responseText)
            alert(this.responseText)
            document.getElementById("txtHint1").innerHTML = this.responseText;

        }
        xhttp.open("GET", "updateform.php?opt=3&a="+str1);
        xhttp.send();
        }




function addroom()
{

var str1 = (document.getElementById('RNo').value);
var str2 = (document.getElementById('Area').value);
var str3 = (document.getElementById('price').value);
var str4 = (document.getElementById('INTERNET').value);
var str5 = (document.getElementById('BathTub').value);
var str6 = (document.getElementById('NewsPaper').value);
var str7 = (document.getElementById('Shower').value);
var str8 = (document.getElementById('Iron').value);
var str9 = (document.getElementById('Ironing').value);
        if (str1 == "") {
            alert("Enter Room Number")
            return;
        }
        if (str2 == "") {
            alert("Enter Area of Room")
            return;
        }
        if (str3 == "") {
            alert("Enter Price")
            return;
        }
        if (str4 == "") {
            alert("Enter Internet information")
            return;
        }
        if (str5 == "") {
            alert("Enter Bath-Tub information")
            return;
        }
        if (str6 == "") {
            alert("Enter Newspaper information")
            return;
        }
        if (str7 == "") {
            alert("Enter Shower information")
            return;
        }
        if (str8 == "") {
            alert("Enter Iron information")
            return;
        }
        if (str9 == "") {
            alert("Enter Ironing Table information")
            return;
        }
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
            //alert(this.responseText)
            alert(this.responseText)
            document.getElementById("txtHint1").innerHTML = this.responseText;

        }
        xhttp.open("GET", "updateform.php?opt=2&a="+str1+"&b="+str2+"&c="+str3+"&d="+str4+"&e="+str5+"&f="+str6+"&g="+str7+"&h="+str8+"&i="+str9);
        xhttp.send();
        }



function dynamicchange(){
        
        var str = document.getElementById('SelectOption').value;

        if (str == "") {
            alert("Enter correct e-mail")
            return;
        }
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
            document.getElementById("txtHint").innerHTML = this.responseText;
        }
        xhttp.open("GET", "updateform.php?opt="+str);
        xhttp.send();
        }

</script>
</body>
</html>