<?php
include('connect.php');

if(isset($_GET['comp_id']))
{
	$comp_id = $_GET['comp_id'];
	$user_email = $_GET['user_email'];
	$query = mysqli_query($mysqli,"delete from favourite where comp_id='$comp_id' AND user_email='$user_email'");
	if($query)
	{
		echo "<script>alert('Successfully Removed!')</script>";
		echo "<script>window.open('favourite_more.php','_self')</script>";
		exit();
	}
}
?>
