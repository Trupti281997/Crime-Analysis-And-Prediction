<?php
if(isset($_POST['login-submit'])){
  require 'db.inc.php';

   $userid = $_POST['username'];
   $pass =$_POST['pass'];
  
   if(empty($userid)||empty($pass)){
      header("Location:../includes/log_in.php?error=emptyfields");
      exit();  
   }
   else{
      $SELECT="SELECT * From admin WHERE userid=? OR email=?;";
      $stmt = mysqli_stmt_init($conn);
   if(!mysqli_stmt_prepare($stmt,$SELECT)){ 
      header("Location:../includes/log_in.php?error=sqlerror");
      exit();
   }else{
      mysqli_stmt_bind_param($stmt,"ss",$userid,$userid);
      mysqli_stmt_execute($stmt);
      $result=mysqli_stmt_get_result($stmt);

       if($row=mysqli_fetch_assoc($result)){
         
         $pwdcheck=password_verify($pass,$row['pass']);
         if( $pwdcheck == false){
            header("Location:../includes/log_in.php?error=password is inavlid");
            exit();  
         }
         elseif( $pwdcheck == true){
           session_start();
            $_SESSION['userId'] = $row['idusers'];
            $_SESSION['userUid'] = $row['userid'];
            header("Location:../maps/authenticate_user.php?login=success");
            exit();         
         }
         else{
            header("Location:../includes/log_in.php?error=password is inavlid");
            exit();
         }
       } 
       else{
         header("Location:../includes/log_in.php?error=nousers");
         exit();
       }
   }

   }
}else{
   header("Location:../includes/log_in.php");
   exit();
}













