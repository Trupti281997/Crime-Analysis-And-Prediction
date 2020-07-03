<?php
if(isset($_POST['signup-submit'])){
  require 'db.inc.php';

  $pass = $_POST['Password'];
  $rpass = $_POST['Repeat Password'];


  if($pass !== $rpass){                        /*Passwordcheck validation*/
    header("Location:../includes/ignup.html?error=passwordcheck=successfull");
    exit();
  }else{
    sql = 'INSERT INTO admin Where UserId = userid(pass)';
  }
}