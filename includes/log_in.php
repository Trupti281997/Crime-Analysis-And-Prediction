<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>login</title>
  <link rel="stylesheet" href="login.css">
</head>
<body>
  <!-----================================SIGN IN=================================================------->
  <div class="siginin">
    <form action="login.php" method="POST">
      <div class="logo">
        <img src="images/logo.png" alt="">

      </div>
        <h2 style="color: white;">Log In</h2>
       
        <input type="text" name="username" placeholder="Username....">
        <input type="password" name="pass" placeholder="password...."><br><br>
        <button type="submit" name="login-submit" style="width: 100px; border-radius: 10px;border-style: double;color: rgb(5, 5, 77);padding: 10px;">Login</button><br><br>
        <div class="container">
          <a href="http://localhost/test/project/includes/forgotpass/forget.html" style="margin-right: 40px;font-size: 15px; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">Forgot 
            Password?</a><br><br>
          
          <label>NEW USER?</label><a href="http://localhost/test/project/includes/sign_up.php#" style="margin-right: 40px;font-size: 15px; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">Sign Up</a>
        </div>
        
    </form>

  </div>
 
</body>
</html>