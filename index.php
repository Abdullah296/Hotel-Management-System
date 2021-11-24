<?php get_header();
 ?>



  

<div class="w3-display-container w3-content w3-hide-small" style="max-width:1500px">
  <img class="w3-image" src="<?php echo get_template_directory_uri()?>/scenary.jfif" alt="London" width="1500" height="700">
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
          <input class="w3-input w3-border" type="text" placeholder="Luxury">
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





<?php

$db = mysqli_connect("localhost","root","","hms");

if(!$db)
{
    die("Connection failed: " . mysqli_connect_error());
}

?>

<div class="rooom" style="display: none" id="rooom">

    <h2><t>Rooms</h2>

    <table border="2">
    <tr>
        <td>Sr.No.</td>
        <td>Portion</td>
        <td>Price</td>
        <td>Available</td>
    </tr>

    <?php


    $records = mysqli_query($db,"select * from rooms"); // fetch data from database

    while($data = mysqli_fetch_array($records))
    {
    ?>
    <tr>
        <td><?php echo $data['SerialNo']; ?></td>
        <td><?php echo $data['floor']; ?></td>
        <td><?php echo $data['Price']; ?></td>
        <td><?php 
        
        if ($data['Available']  == 1) {
          
        ?>
          <button type="button">Book Now</button>
        <?php
        }
        else
        {
          echo "Sorry unavailaible";
        }
        
        ?></td>
    </tr>	
    <?php
    }
    ?>
    </table>

    <?php mysqli_close($db); // Close connection ?>


</div>






<script>
// Tabs
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



<?php get_footer(); ?>
