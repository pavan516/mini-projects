<?php
include('connect.php');

if(isset($_GET['comp_id']))
{
	$comp_id = $_GET['comp_id'];
	$query = mysqli_query($mysqli,"delete from company where comp_id='$comp_id'");
	if($query)
	{
		echo "<script>alert('Successfully Removed!')</script>";
		echo "<script>window.open('index.php','_self')</script>";
		exit();
	}
}
?>
