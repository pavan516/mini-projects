<?php
include("includes/connect.php");
if(isset($_GET['id']))
{ 
	$id = $_GET['id'];
	
	$delete_post = mysqli_query($mysqli,"delete from posts where id='$id'");
	if($delete_post)
	{
        echo "<script>alert('Your Post Has Been Deleted Successfully!')</script>";
        echo "<script>window.open('myevents.php','_self')</script>";
        exit();
	}
}
?>	