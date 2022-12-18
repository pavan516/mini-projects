<?php
include('connect.php');

if(isset($_GET['id']))
{
	
	$id = $_GET['id'];
	$user_email = $_GET['user_email'];
	$query_good = mysqli_query($mysqli,"delete from booknow where id='$id' AND user_email='$user_email' AND status='CLOSED'");
	if($query_good)
	{
		echo "<script>alert('Successfully Deleted!')</script>";
		echo "<script>window.open('my_projects.php','_self')</script>";
		exit();
	}
	else
	{
		echo "<script>alert('You Cannot Delete While Project Is Working!')</script>";
		echo "<script>window.open('my_projects.php','_self')</script>";
		exit();
	}
}
?>
