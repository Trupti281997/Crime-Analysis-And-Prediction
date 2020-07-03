<?php
if(isset($_POST['signup-submit'])){
  require 'db.inc.php';
 $userid = $_POST['userid'];
 $name = $_POST['name'];
 $connum =$_POST['connum'];
 $email=$_POST['email'];
 $off = $_POST['off'];
 $pass = $_POST['pass'];
 $rpass = $_POST['rpass'];
 
if(empty($userid)||empty( $name )||empty($connum)||empty($email)||empty($off)||empty($pass)||empty($rpass)){
  header("Location:../includes/sign_up.php?error=emptyfields&name=". $name."&mail=".$email."&username=".$userid."&connum=".$connum."&off=".$off);
  exit();
  }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA_Z0-9]*$/",$userid)){ /*Email & Username validation*/
    header("Location:../includes/sign_up.php?error=INVALID EMAIL and UserId");
    exit();
  }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){               /*Email validation*/
    header("Location:../includes/sign_up.php?error=INVALID EMAIL=". $userid);
    exit();
  }else if($pass !== $rpass){                        /*Passwordcheck validation*/
    header("Location:../includes/ignup.html?error=passwordcheck=". $email."&username".$userid);
    exit();
  }
  else{ 

    $sql = "SELECT userid FROM admin WHERE userid=?"; /*User alredy exists check*/
    $stmt= mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){           /*Check connection*/ 
      header("Location:../includes/sign_up.php?error=sql_error");
      exit();    
    }else{
           mysqli_stmt_bind_param($stmt,"s",$username);
           mysqli_stmt_execute($stmt);
           mysqli_stmt_store_result($stmt); 
           $resultCheck =mysqli_stmt_num_rows($stmt); 
           if($resultCheck > 0){
                 headers("Location../includes/sign_up.php?error=usertaken&mail=".$email);
                 exit();
           }else{
            $INSERT = "INSERT INTO admin(userid,name,connum,email,off,pass) VALUES (?,?,?,?,?,?)";
            $stmt= mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt,$INSERT)){           /*Check connection*/ 
              header("Location:../includes/sign_up.php?error=sql_error");
              exit();  
           }else{
            $hashedpwd = password_hash($pass,PASSWORD_DEFAULT);

            mysqli_stmt_bind_param($stmt,"ssssss",$userid,$name,$connum,$email,$off, $hashedpwd );
            mysqli_stmt_execute($stmt);
           
            header("Location:../includes/log_in.php?signup=success");
            echo "You can login now";
            exit();
              
           }
          }
      }
  }
  mysqli_stmt_close($stmt); 
  mysqli_close($conn);

}else{
  header("Location:../includes/sign_up.php");
  exit();
}
?>
   

  