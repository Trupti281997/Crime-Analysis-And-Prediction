<?php session_start();?>
<?php 

// Include the database configuration file 
require_once 'db.php'; 
 
// Fetch the marker info from the database 
$result = $db->query("SELECT * FROM crime_record"); 
 
// Fetch the info-window data from the database 
$result2 = $db->query("SELECT * FROM crime_record"); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Explore-maps</title>
  <link rel="stylesheet" href="exp.css">
  

<!-----------------------MAP API KEY------------------------------------------->

<script type="text/javascript"src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA7rw-ynDsZGLGwA1RleUfE3o8NWC2zwaI"></script>
  
<!-----------------------JAVASCRIPT CODE FOR MAP------------------------------------------->
<script>
function initMap() {
    var map;
     
    var bounds = new google.maps.LatLngBounds();
    var mapOptions = {
        mapTypeId: 'roadmap'
    };
                    
    // Display a map on the web page
    map = new google.maps.Map(document.getElementById("mapCanvas"), mapOptions);
    map.setTilt(100);

    
        
    // Multiple markers location, latitude, and longitude
    var markers = [
        <?php if($result->num_rows > 0){ 
            while($row = $result->fetch_assoc()){ 
                echo '[ ,'.$row['lat'].', '.$row['lon'].',],'; 
            } 
        } 
        ?>
    ];

         
                        
    // Info window content
    var infoWindowContent = [
        <?php if($result2->num_rows > 0){ 
            while($row = $result2->fetch_assoc()){ ?>
                ['<div class="info_content">' +
                '<b><h2><?php echo $row['crime']; ?></h2></b>' +'<b><p><?php echo $row['day']; ?><br> ' + '<?php echo $row['area']; ?><br>' + 
                '<?php echo $row['date']; ?><br>' + '<?php echo $row['discription']; ?></p></b>' + '</div>'],
        <?php } 
        } 
        ?>
    ];
        
    // Add multiple markers to map
    var infoWindow = new google.maps.InfoWindow(), marker, i;
    
    // Place each marker on the map  
    for( i = 0; i < markers.length; i++ ) {
        var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
        bounds.extend(position);
        marker = new google.maps.Marker({
            position: position,
            map: map,
			icon: markers[i][3],
            title: markers[i][0]
        });
        
        // Add info window to marker    
        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
                infoWindow.setContent(infoWindowContent[i][0]);
                infoWindow.open(map, marker);
            }
        })(marker, i));

        // Center the map to fit all markers on the screen
        map.fitBounds(bounds);
    }

    // Set zoom level
    var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
        this.setZoom(7);
        google.maps.event.removeListener(boundsListener);
    });
}

// Load initialize function
google.maps.event.addDomListener(window, 'load', initMap);




// Secound map code
var map2
map2 = new google.maps.Map(document.getElementById("mapCanvas2"), mapOptions);
    map2.setTilt(100);
</script>
<style>
body{ background-image: url(image/unnamed\ \(1\).jpg);
}
header{
  background: transparent;
  height: 90px;
  text-align:justify; 
  font-size: 30px;
 font-family: 'Times New Roman', Times, serif;
 padding:0px;
 margin:0px;
}
h2{
  font-size:30px;
  font-family: 'Times New Roman', Times, serif;
  }
  a {
  text-align: right;
  text-decoration: none;
  display: inline-block;
  color: rgb(247, 235, 235);
  font-family: 'Times New Roman', Times, serif;
  font-weight: 300px;
  font-size: 25px;
  outline: none;
  margin-top: 1px;
  padding-right: 30px;
  border-style: double;
  border-radius: 10px;

}
 a:hover{
  
 
  background-color: rgba(13, 111, 223, 0.438);
}

 a:hover {
  color:white ;
}
input[type=text]{
  font-size: 15px;
  background: rgba(190, 232, 248, 0.589);
  color:white;
}
</style>
</head>
<body>
<center><h2 style=color:white>CRIME ANALYSIS AND PREDICTION</h2></center>
<header id="header">
      
      <?php
   if(isset($_SESSION['userUid'])){
   
    echo '<p style = color:white>Welcome '.$_SESSION['userUid'].'</p>
    
    <a class="btn btn-full" href="http://localhost/test/project/maps/adds.php#"style=color:white>Add New Crime Record</a>
    <a href="http://localhost/test/project/maps/cluster.php#" >Clustere View</a>
    <a class="btn btn-full" href="http://localhost/test/project/includes/logout.inc.php#"style= margin-left:53%;font-size:25px>LOG OUT</a>'
    ;
   }else{   
    echo'<p style = padding:0px;margin:0px;color:white>You are currently log out</p>
    <a href="http://localhost/test/project/includes/log_in.php#" style= margin-left:0px;> Log In</a>';
  }
   ?>
      
  </header>
<!-----------------------TABLE VIEW------------------------------------------>

<div class="record">
<center>
     <form action="" method="POST">
      
      <table style=color:white;>
     
               <tr>
                 <th>Inc num</th>
                 <th>Crime type</th>
                 <th>Details</th>
                 <th>Area</th>
                 <th>Day</th>
                 <th>Date</th>
                 <th>Time</th>
                 
               </tr>
               <h3  style= color:white; >Search For Registered Crime</h3>
               <input type="submit" name="search-record" class ="btn" value="All crimes" style=color:white>
               <input type="text" name="crime" class ="btn" placeholder="Enter Crime type here..">
               <input type="submit" name="search" class ="btn" value="SEARCH" style= color:white><br><br>

             
              
     </form>
</center>
     <?php
    $conn = mysqli_connect("localhost","root","");
    $db = mysqli_select_db($conn,'login_system');
     
    if(isset($_POST['search-record']))
    {
    $query = " SELECT * FROM crime_record";
    $query_run = mysqli_query($conn,$query);
     
    while($row = mysqli_fetch_assoc($query_run)){
  
      ?> 
             <tr>
               <td><center>
<?php echo $row['Inc_num'];?></center></td>
               <td><center><?php echo $row['crime'];?></center></td>
               <td><?php echo $row['discription'];?></td>
               <td><?php  echo $row['area']; ?></td>
               <td><?php echo $row['day'];?></td>
               <td><?php echo $row['date'];?></td>
               <td><?php echo $row['time']; ?></td>
                </tr>
       <?php
    }

    } else if(isset($_POST['search']))
    {

                $crime =$_POST['crime'];
                $sql = "SELECT * FROM crime_record where crime='$crime'";
                $sql_run = mysqli_query($conn,$sql);
                while($row = mysqli_fetch_assoc($sql_run)){
                  ?> 
                  <tr>
                    <td><center> <?php echo $row['Inc_num'];?></center></td>
                    <td><center><?php echo $row['crime'];?></center></td>
                    <td><?php echo $row['discription'];?></td>
                    <td><?php  echo $row['area']; ?></td>
                    <td><?php echo $row['day'];?></td>
                    <td><?php echo $row['date'];?></td>
                    <td><?php echo $row['time']; ?></td>
                     </tr>
            <?php
                }
    }
 
     
    ?></table> 
     </div>
    

<!-----------------------SETTING UP GOOGLE MAP------------------------------------------->
<div class="map-container"> 
  <h3 style=color:white >RECORDED CRIME AREAS</h3>
  <div id ="mapCanvas"style= height:80%;>
     
</div><br><br>
 
  </div>
  
</body>
</html>