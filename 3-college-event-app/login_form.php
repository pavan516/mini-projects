<!-- Login Php code -->
<?php
session_start();
include("includes/connect.php");
if(isset($_POST['login']))
{
    // i am not encrypting your passwords becz for your testing (md5($password) use this if needed)
	$email = $_POST['email'];
	$password = $_POST['password'];
    
    // getting data with the help of email & password
	$rawQuery = mysqli_query($mysqli,"SELECT * FROM users WHERE email = '$email' AND password = '$password'");
	$count = mysqli_num_rows($rawQuery);
	if($count=='1')
	{
        // creating session
		$_SESSION['email'] = $email;
							
		echo "<script>alert('WELCOME TO EVENT MANAGEMENT!')</script>";							
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