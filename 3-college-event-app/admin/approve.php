<?php
include("includes/connect.php");
if(isset($_GET['id']))
{ 
	$id = $_GET['id'];
	
	$delete_post = mysqli_query($mysqli,"update posts set status='1' where id='$id'");
	if($delete_post)
	{
        echo "<script>alert('Post Has Been Approved Successfully!')</script>";
        echo "<script>window.open('index.php','_self')</script>";
        exit();
	}
}
?>	