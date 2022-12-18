<?php
include('connect.php');

if(isset($_GET['comp_id']))
{
	$comp_id = $_GET['comp_id'];
	$user_email = $_GET['user_email'];
	$service_id = $_GET['service_id'];
	$query = mysqli_query($mysqli,"insert into favourite (comp_id,user_email) values ('$comp_id','$user_email')");
	if($query)
	{
		echo "<script>alert('Successfully Saved As Favourite!')</script>";
		echo "<script>window.open('service.php?service_id=$service_id','_self')</script>";
		exit();
	}
}
?>
