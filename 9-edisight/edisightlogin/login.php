<?php
session_start();
?>
<html >
<head>
  <meta charset="UTF-8">
  <title>EDISIGHT LOGIN</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
<link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

      <link rel="stylesheet" href="css/style.css">
  
</head>

<body>
  
<!-- Form Mixin-->
<!-- Input Mixin-->
<!-- Button Mixin-->
<!-- Pen Title-->
<div class="pen-title">
  <h1>EDISIGHT LOGIN FORM</h1><span>If u are not registered. Register here <button><a href="register.php">Register Here</a></button></span>
  </div>
<!-- Form Module-->
<div class="module form-module">
  <div class="toggle"><i class="fa fa-times fa-pencil"></i>
    </div>
  <div class="form">
    <h2>Login to your edisight account</h2>
   <form method='post' action='login.php'>
      <input type="text" name='email' placeholder="E-Mail"/> 
      <input type="password" name='pass' placeholder="Password"/>
      <input type='submit' name='login' value='login' />
    </form>
  
  <div class="cta"><a href="forgotpass.php">Forgot your password?</a></div>
</div>
<center></center>
</div>

</body>
</html>

<?php

include('connect.php');

if(isset($_POST['login'])){

    
	$email = $_POST['email'];
	$pass = $_POST['pass'];
	
	$check_user = "select * from login where email='$email' AND pass='$pass'";

    $run = mysql_query($check_user);
	if(mysql_num_rows($run)>0){
	
	$_SESSION['email']=$email;
	
	
	echo
	"<script>window.open('http://localhost/edisight/index.php','_self')</script>";
}

else {
 
    echo
    "<script>alert('UserName or Password is incorrect!')</script>";	
	
}
}

?>
