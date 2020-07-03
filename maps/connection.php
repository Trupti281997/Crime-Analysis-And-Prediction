<?php
    $host ="localhost";
    $dbusername ="root";
    $dbpassword ="";
    $dbname ="login_system";
    ////////////////ESTABLISHING CONNECTION////////////////////////
    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
    
    if(!$conn){
      die("Connection failed:".mysqli_connect_errno());
    }