<?php

if(isset($_POST['submit-record'])){
  require 'connect.php';
$incident_num = $_POST['incident_num'];
$day          = $_POST['days'];
$crime_type   = $_POST['Crime']; 
$discription   = $_POST['discription'];   
$area      = $_POST['area'];
$latitude =$_POST['lat'];
$longitude =$_POST['lon'];
$date    = $_POST['date'];
$time    = $_POST['time'];
//////////////////////To chck empty coundition//////////////////////////////
if(empty($incident_num)||empty($date)||empty($time)||empty($day )||empty($crime_type)||empty($discription)||empty($area)||empty($latitude)||empty($longitude)){

  header("Location:../maps/adds.php?error=emptyfields&incnum=_". $incident_num."_&date=".$date."_&time=".$time."_&day=".$day."_&crime=".$crime_type."_&dis=".$discription."_&con".$country."_&lat".$latitude."_&lon".$longitude);
  exit(); 

}else{
         $INSERT = "INSERT INTO crime_record(Inc_num,day,crime,discription,area,lat,lon,date,time) VALUES ('{$incident_num}','{$day}','{$crime_type}','{$discription}','{$area}','{$latitude}','{$longitude }','{$date}','{$time}')";

         if($conn->query($INSERT)){
          
          header("Location:../maps/adds.php?status=success");
          ?>
          <script>
          alert ,,
          </script>
          <?php
          exit();
         }else{
          header("Location:../maps/adds.php?error=error");
          
         }
         $conn->close();
  }         
} else{
         header("Location:../maps/adds.php");
         exit();
      }  
   







