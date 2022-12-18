<?php
include('connect.php');

if(isset($_POST['ori_fac_email']))
{
	$ori_fac_email = $_POST['ori_fac_email'];
	$scr_stu_rollno = $_POST['scr_stu_rollno'];
	$scr_stu_subject = $_POST['scr_stu_subject'];
	$scr_stu_midtype = $_POST['scr_stu_midtype'];
	
	$run_update = mysqli_query($mysqli,"update marks set status='verified' where fac_email='$ori_fac_email' AND stu_rollno='$scr_stu_rollno' AND stu_subject='$scr_stu_subject' AND stu_midtype='$scr_stu_midtype'");
	if($run_update)
	{
		echo "<script>alert('$scr_stu_rollno is Verified Successfully')</script>";
	}
	else
	{
		echo "<script>alert('Something Went Wrong')</script>";
	}
}
?>