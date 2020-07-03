<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en"  xmlns="ht tp://www.w3.org/1999/xhtml">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Add new crime Record</title>
  <link rel="stylesheet" href="add.css">
  <script type="text/javascript"
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA7rw-ynDsZGLGwA1RleUfE3o8NWC2zwaI&sensor=false">
</script>
<style>
  div#gmap {
         width: 100%;
         height: 300px;
         border:double blue;
  }
  .echo{
    color: blue;      
  }
     </style>

<script type="text/javascript"> 

var map;
        function initialize() {
            var myLatlng = new google.maps.LatLng(21.146633,79.088860);
            var myOptions = {
                zoom:8,
                center: myLatlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            }
            map = new google.maps.Map(document.getElementById("gmap"), myOptions);
            // marker refers to a global variable
            marker = new google.maps.Marker({
            map: map,
            });

            google.maps.event.addListener(map, "click", function(event) {
                // get lat/lon of click
                var clickLat = event.latLng.lat();
                var clickLon = event.latLng.lng();

                // show in input box
                document.getElementById("lat").value = clickLat.toFixed(5);
                document.getElementById("lon").value = clickLon.toFixed(5);

                  var marker = new google.maps.Marker({
                        position: new google.maps.LatLng(clickLat,clickLon),
                        map: map,
                       
                     });
                     
            });
    }   

    window.onload = function () { initialize() };
</script>


  
</head>
<style> 
body{background-image: url(image/th\ \(1\).jfif);
color:white;}
header{background: transparent;}
h2{
  font-size:30px;
  font-family: 'Times New Roman', Times, serif;
  }
  footer{
  height: 60px;
  width:0px auto;
  background: transparent;
  
}
</style>
<body>
<center><h2>CRIME ANALYSIS AND PREDICTION</h2></center>
  <header id="header" >
      <nav id="nav-menu-container">
        
      </nav>
      <ul class="nav-menu">
      <?php
   if(isset($_SESSION['userUid'])){
   
    echo '<h6 style = padding:0px; margin:0px>CRIME RECORD ADD BY'.$_SESSION['userUid'].'</h6>
    <a class="btn btn-full" href="http://localhost/test/project/includes/resetpass/reset.html" style = padding:0px;margin-left:10px;>Reset password</a>
    <a class="btn btn-full" href="http://localhost/test/project/includes/logout.inc.php#">LOG OUT</a> ';
   }else{
    header("Location:../includes/log_in.php?error=You are not allowed to see this page login first");
    exit();
  }
 
  $s1=time(); 
  
  $s2 =date("dFY,  D",$s1);
  echo"<label style = margin-left:800px > $s2</label>";
   ?>
      </ul>
  </header> 
  <?php
         if(isset($_GET['status'])){
            if($_GET['status'] == "success"){
                      echo"New Record Inserted Successfully";
                 }
                 
                 if(isset($_GET['error'])){
                   if($_GET['error'] == "error"){
                         echo"Something went wrong ";
                 } 
                }
                }
?>
  <div class="container">
 <form action="addcrime.php" method="POST">
  <br><br><label>INCIDENT_NUM :</label>
  <input type="text" class="INPUT" name="incident_num" placeholder="record number..." require><br><br>
    <label >DATE :</label>
    <input type="date"  class="INPUT" name="date" require>
    <label > TIME :</label>
    <input type="time"  class="INPUT" name="time" require><br>
    <label>DAY :</label>
    <input type="text"  class="INPUT" name="days" placeholder="day of crime.." require><br><br>
    <label>CRIME TYPE :</label>
    <input type="text" name="Crime" placeholder="crime name.." require><br><br>
    <label >DISCRIPTION :</label><br><br>
    <textarea name="discription"  cols="90" rows="5"></textarea><br><br>
    <!-----=========================ADDING MAP LOCATION==============================-->
    <label>LOCATION :</label><br><br>
 
    <div id="gmap" >
         </div>

    
    <!-----=========================/ADDING MAP LOCATION==============================-->
    <label >Area :</label>
    <input type="text" name="area" require><br><br>
    <label> Lat:</label> 
    <input type="text" id="lat" name="lat" require>
    <label>Lon: </label>
    <input type="text" id="lon" name="lon" require>
   
    <center><input  type="submit" name="submit-record" placeholder="Submit" ></center>
     
  </form>
</div>
<footer >
<a class="btn btn-full" href="http://localhost/test/project/maps/authenticate_user.php# "style = margin-left:20px; >Previous page</a>
</footer>
</body>

</html>