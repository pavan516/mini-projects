<?php
include("connect.php");
if(isset($_GET['id']))
{
	$id=$_GET['id'];
	$day_no=$_GET['day_no'];
	$user_email=$_GET['user_email'];
	                	   
	$update = "UPDATE budget SET mrng_payment='PAID' where id='$id' AND day_no='$day_no' AND user_email='$user_email'";
	$run_insert = mysqli_query($mysqli,$update);
	if($run_insert)
	{
		echo "<script>alert('Successfully Paid $day_no Day Morning Work!')</script>";
		echo "<script>window.open('view_details_my_project.php?id=$id','_self')</script>";
	}
	else
	{
		echo "<script>alert('Something Went Wrong!')</script>";
		echo "<script>window.open('view_details_my_project.php?id=$id','_self')</script>";
	}
}						
?>