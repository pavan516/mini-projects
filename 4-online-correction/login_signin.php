<?php

include("connect.php");

$fac_email = $_POST['fac_email'];
$fac_pass = $_POST['fac_pass'];

$sel = mysqli_query($mysqli,"select * from register where fac_email='$fac_email' AND fac_pass='$fac_pass'");

$check = mysqli_num_rows($sel);
	   
if($check==1)
{
    $_SESSION['fac_email']=$fac_email;
								
	echo "<script>alert('Successfully logged in')</script>";								
	echo "<script>window.open('home.php','_self')</script>";
	exit();
								
}
else
{
	echo "<script>alert('Your Email Or Password Is Incorrect!')</script>";
	echo "<script>window.open('login.php','_self')</script>";
	exit();
}

?>