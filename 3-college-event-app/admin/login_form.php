<!-- Login Php code -->
<?php
session_start();
include("includes/connect.php");
if(isset($_POST['login']))
{
    // i am not encrypting your passwords becz for your testing (md5($password) use this if needed)
	$email = "admin@gmail.com";
	$password = "admin";
    
    if(($email=="admin@gmail.com") && ($password=="admin"))
	{
        // creating session
		$_SESSION['email'] = $email;
							
		echo "<script>alert('WELCOME TO EVENT MANAGEMENT ADMIN PANEL!')</script>";							
		echo "<script>window.open('index.php','_self')</script>";
		exit();
	}
	else
	{
		echo "<script>alert('Your Email Or Password Is Incorrect!')</script>";
		echo "<script>window.open('login.php','_self')</script>";
		exit();
	}
}
?>
<!-- End Of Login Php Code -->