<?php
session_start();

if(!isset($_SESSION['fac_email']))
{
	header("location: login.php");
}
else
{	

	include('connect.php');

	if(isset($_POST['ori_fac_email']))
	{
		$scrutiniser_fac_email = $_SESSION['fac_email'];
		$ori_fac_email = $_POST['ori_fac_email'];
		$scr_stu_rollno = $_POST['scr_stu_rollno'];
		$scr_stu_subject = $_POST['scr_stu_subject'];
		$scr_stu_midtype = $_POST['scr_stu_midtype'];
		$message = $_POST['message'];
		
		$insert = mysqli_query($mysqli,"insert into notifications (scrutiniser_fac_email,marks_fac_email,stu_rollno,stu_subject,stu_midtype,message,date) 
		          values ('$scrutiniser_fac_email','$ori_fac_email','$scr_stu_rollno','$scr_stu_subject','$scr_stu_midtype','$message',NOW())");
		if($insert)
		{
			echo "<script>alert('Successfully Sended Your Message!')</script>";
			echo "Successfully Sended The Student Details With Marks, Very Soon Facualty Will Edit The Marks!";
		}
		else
		{
			echo "<script>alert('Something Went Wrong')</script>";
		}
	}
}
?>