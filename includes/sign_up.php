
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta htt p-equiv="X-UA-Compatible" content="ie=edge">
  <title>Registration</title>
   <link rel="stylesheet" href="signup.css" type="text/css">
  <style>
    body{background-image: url(images/1.jpg);}
    header{background:transparent;}
    h2{font-family: 'Times New Roman', Times, serif;}

  </style>

</head>
<body>
<CENTER><h2>CRIME ANALYSIS AND PREDICTION</h2></CENTER>
    <header id="header">
      
      <div class="container">
        
        
        <nav id="nav-menu-container">
        
          <ul class="nav-menu">
            <a class="btn btn-full" href="http://localhost/test/project/index.html#">Home</a>
            <a class="btn btn-full" href="http://localhost/test/project/includes/log_in.php#">Back To Log in</a>
            <a class="btn btn-full" href="#">Help</a>
            
          </ul>
        </nav>
      </div>
    </header>
  
  <div class="signup">
    <div class ="user-img"></div>
    
    <form action="signup.php" method="POST">
      
       <h2 style="color: rgba(240, 245, 250, 0.767); font-family: 'Times New Roman', Times, serif; font-size: 40px;">Sign Up</h2><br>
    <!-----------------------------------Creating Error Messages-------------------------------------------------------->
       <?php
         if(isset($_GET['error'])){
            if($_GET['error'] == "emptyfields"){
                    echo '<p class="signuperror"> Fill all fields</p>';
                 } elseif(($_GET['error']== "INVALID EMAIL and UserId")){
                       echo '<p class="signuperror">Invalid Uid or email </p>';
                        }
                  elseif(($_GET['error']== "INVALID EMAIL")){
                          echo '<p class="signuperror"> Invalid Email</p>';
                           } 
                  elseif(($_GET['error']== "passwordcheck")){
                            echo '<p class="signuperror"> Password does not match</p>';
                             } 
                  elseif(($_GET['error']== "usertaken&mail")){
                              echo '<p class="signuperror"> UserId or email already exits</p>';
                               } 
   }
?>
         <input type="text" name="userid" placeholder="username" required ><br><br>
         <input type="text" name="name" placeholder="your name" required ><br><br>
         <input type="text" name="connum" placeholder="contact number" required  pattern="^[0-9]{10}"><br><br>
         <input type="email" name="email" placeholder="Enter email" required ><br><br>
         <input type="text" name="off" placeholder="Officer-Post" required><br><br>
         <input type="password" name="pass" placeholder="password" ><br><br>
         <input type="password" name="rpass" placeholder="retype password" ><br><br><br>
         <button type="submit" name="signup-submit">SUBMIT</button> 
    </form>    
  </div>

</body>

</html>