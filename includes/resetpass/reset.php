<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Reset Password</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Different Multiple Form Widget template Responsive, Login form web template,Flat Pricing tables,Flat Drop downs  Sign up Web Templates, Flat Web Templates, Login sign up Responsive web template, SmartPhone Compatible web template, free web designs for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- //Custom Theme files -->
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<!-- web font -->
<link href="//fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
<!-- //web font -->
</head>
<body>
	<!-- main -->
	<div class="main-agile">
		<h1>CRIME ANALYSIS AND PREDICTION</h1>
		<div class="content">
			<div class="top-grids">
				<div class="top-grids-left">
					<div class="signin-form-grid">	
				<div class="signin-form reset-password">
						<h3>Reset Password</h3>
						<form action="resetpass.php" method="post">
							<input type="password" placeholder="Password" name="Password" required="">
							<input type="password" placeholder="Repeat Password" name="Repeat Password" required=""><br><br>
							<input type="submit" class="send" value="Update Password">
						</form>
					</div>
				</div>
			</div>
			</div>
		</div>
	
	</div>
	<?php
   if(isset($_SESSION['userUid'])){
   
    echo '<p>Welcome '.$_SESSION['userUid'].'
    ';
   }else{
		header("Location:../login.php?");	
		echo'<p>Invalid Accesss </p>';
		exit();		
  }
   ?>	
	
	<!-- //main --> 
</body>
</html>