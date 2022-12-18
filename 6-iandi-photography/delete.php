<?php
include('connect.php');
if(isset($_GET['post_id']))
{
	$post_id = $_GET['post_id'];
	
	$delete_post = "delete from posts where post_id='$post_id'";
	$run_delete = mysql_query($delete_post);
	
	if($run_delete)
	{
		echo "<script>alert('Your Post Has Been Deleted Successfully!')</script>";
        echo "<script>window.open('uploaded_images.php','_self')</script>";
	}
}
?>		