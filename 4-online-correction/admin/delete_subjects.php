<?php
include('connect.php');
if(isset($_GET['stu_subjects']))
{
	$stu_subjects = $_GET['stu_subjects'];
	
	$delete_post = "delete from subjects where stu_subjects='$stu_subjects'";
	$run_delete = mysqli_query($mysqli,$delete_post);
	
	if($run_delete)
	{
		echo "<script>alert('Subject Has Been Deleted Successfully!')</script>";
        echo "<script>window.open('subjects.php','_self')</script>";
	}
}
?>	