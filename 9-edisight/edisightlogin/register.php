<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Edisight Registration</title>
  
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
  <h1>Edisight Registration Form</h1><span>If u are registered.Login here <button><a href="login.php">Login Here</a></button></span>
</div>
<!-- Form Module-->
<div class="module form-module">
  <div class="toggle"><i class="fa fa-times fa-pencil"></i>
    </div>
  
  <div class="form">
    <h2>Create Your Edisight Account</h2>
    <form method='post' action='register.php'>
      <input type="text" name="username"placeholder="Username"/>
      <input type="password" name="pass" placeholder="Password"/>
      <input type="email" name="email" placeholder="Email Address"/>
      <input type="tel" name="contact" placeholder="Phone Number"/>
      <input type='submit' name='register' value='Register Here' />
    </form>
  </div>
 </div>
</body>
</html>
<?php
include('connect.php');
   
       if(isset($_POST['register'])){

	         $username = $_POST['username'];
			 $pass = $_POST['pass'];
             $email = $_POST['email'];
             $contact = $_POST['contact'];
             		 
			 
			if($username ==''){
			echo "<script>alert('Please Enter Your Name!')</script>";
			exit();
			}
			
			if($pass ==''){
			echo "<script>alert('Please Enter Your Password!')</script>";
			exit();
			}
			
			if($email ==''){
			echo "<script>alert('Please Enter Your Email!')</script>";
			exit();
			}
			
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid format and please re-enter valid email"; 
			echo "<script>alert('Please Enter A Valid Email!')</script>";
			exit();
			}
			
			$check_email = "select * from register where email='$email'";
			
			$run = mysql_query($check_email);
			
			if(mysql_num_rows($run)>0)
			{
			echo "<script>alert('EMAIL $email IS ALREADY EXIST, PLEASE TRY ANOTHER ONE!')</script>";
			}
			
			if($contact ==''){
			echo "<script>alert('Please Enter Your Contact!')</script>";
			exit();
			}
			$check_contact = "select * from register where contact='$contact'";
			
			$run = mysql_query($check_contact);
			
			if(mysql_num_rows($run)>0)
			{
			echo "<script>alert('CONTACT $contact IS ALREADY EXIST, PLEASE TRY ANOTHER ONE!')</script>";
			}
			 
			
	       $query = "insert into login (username,pass,email,contact) 
	          values ('$username','$pass','$email','$contact')";		
			
			
			if(mysql_query($query)){
			echo "<script>alert('THANK YOU FOR REGISTRATING YOUR VALUABLE DETAILS')</script>";
			
			}
			$from = "From: edisight@gmail.com";
		    $to = $email;
		    $subject = "Login Information";
         
		   $body = "ThankYou ".$username." For Registering Your Valuable Details and Your Login Information Is: Email-id : ".$email." and Your Password Is : ".$pass." Now You Can Login Here www.edisight.com/login.php";
       
        mail($to, $subject, $body, $from);
        
			

}



       

?>
