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
    <h2>
        Welcome here.
        </h2>
    <br>
    <br>
    <br>

        <div class="w3-display-middle" style="width:65%">
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
            <div class="w3-bar w3-black">
               <button class="w3-bar-item w3-button tablink" onclick="openLink(event, 'Addroom');"><i class="fa fa-plane w3-margin-right"></i>Add Room</button>
               <button class="w3-bar-item w3-button tablink" onclick="openLink(event, 'delroom');"><i class="fa fa-bed w3-margin-right"></i>Delete Room</button>
               <button class="w3-bar-item w3-button tablink" onclick="openLink(event, 'booroom');"><i class="fa fa-car w3-margin-right"></i>Book Room</button>
            </div>
            <div id="Addroom" class="w3-container w3-white w3-padding-16 myLink">
               <h3>Find Rooms</h3>
               
               <div class="w3-row-padding" style="margin:0 -16px;">
                  <div class="w3-half">
                     <label>Room Number</label>
                     <input class="w3-input w3-border" type="text" name="RNO" id="RNo"  >
                  </div>
                  <div class="w3-half">
                     <label>Area </label>
                     <input class="w3-input w3-border" type="text" name="Area" id="Area" >
                  </div>
                  <div class="w3-col">
                     <label>Price</label>
                     <input class="w3-input w3-border" type="text"  name="price" id="price" placeholder="Bed rooms i-e 1">
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
                     <input class="w3-input w3-border" type="text" id="Rno1" placeholder="123321">
                  </div>
                  
               </div>
               <p><button class="w3-button w3-dark-grey" onclick='Deleteroom();'>Delete room</button></p>
            </div>
            <div id="booroom" class="w3-container w3-white w3-padding-16 myLink">
               <h3> Book Room </h3>
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
      








<script>
function Deleteroom()
{
    var str1 = document.getElementById('RNo1').value;
    if(str1 == '')
    {
        alert('Enter Room Number');
        return;
    }
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