<?php
session_start();

if(!isset($_SESSION['fac_email']))
{
	header("location: login.php");
}
else
{	
?>
<?php

include("connect.php");

$stu_rollno = $_POST['stu_rollno'];
$stu_subject = $_POST['stu_subject'];
$stu_midtype = $_POST['stu_midtype'];
$q1_a = $_POST['q1_a'];
$q1_b = $_POST['q1_b'];
$q1_c = $_POST['q1_c'];
$q1_d = $_POST['q1_d'];
$q2_a = $_POST['q2_a'];
$q2_b = $_POST['q2_b'];
$q2_c = $_POST['q2_c'];
$q2_d = $_POST['q2_d'];
$q3_a = $_POST['q3_a'];
$q3_b = $_POST['q3_b'];
$q3_c = $_POST['q3_c'];
$q3_d = $_POST['q3_d'];
$q4_a = $_POST['q4_a'];
$q4_b = $_POST['q4_b'];
$q4_c = $_POST['q4_c'];
$q4_d = $_POST['q4_d'];
$sub_tot_marks = $_POST['sub_tot_marks'];
$obj_tot_marks = $_POST['obj_tot_marks'];
$stu_year = $_POST['stu_year'];
$stu_department = $_POST['stu_department'];
$stu_section = $_POST['stu_section'];


$fac_email = $_SESSION['fac_email'];
$query = mysqli_query($mysqli,"select * from register where fac_email='$fac_email'");
$row = mysqli_fetch_array($query);

$fac_email = $row['fac_email'];

if($stu_rollno == 'NULL' || $stu_subject == 'NULL' || $stu_midtype == 'NULL' || $sub_tot_marks == '0' || $obj_tot_marks == 'NULL')
{	
    echo "<script>alert('Please Fill All The Details')</script>";
	exit();
}    
else
{
	if($sub_tot_marks<=10)
	{
	    $set = mysqli_query($mysqli,"select * from marks where stu_rollno='$stu_rollno' AND stu_subject='$stu_subject' AND stu_midtype='$stu_midtype'");
		$check = mysqli_num_rows($set);

		if($check > 0)
		{
			echo "<script>alert('The Marks Are Already Updated')</script>";
			exit();
		} 
		else
		{
			$insert = mysqli_query($mysqli,"insert into marks (fac_email,stu_rollno,stu_subject,stu_midtype,q1_a,q1_b,q1_c,q1_d,q2_a,q2_b,q2_c,q2_d,q3_a,q3_b,q3_c,q3_d,q4_a,q4_b,q4_c,q4_d,sub_tot_marks,obj_tot_marks,stu_year,stu_department,stu_section,status) 
			values ('$fac_email','$stu_rollno','$stu_subject','$stu_midtype','$q1_a','$q1_b','$q1_c','$q1_d','$q2_a','$q2_b','$q2_c','$q2_d','$q3_a','$q3_b','$q3_c','$q3_d','$q4_a','$q4_b','$q4_c','$q4_d','$sub_tot_marks','$obj_tot_marks','$stu_year','$stu_department','$stu_section','unverified')");
	
			if($insert),
			{
				echo "<script>alert('Successfully Inserted!')</script>";
				exit();
			}
		}
	}
	else
	{
		echo "<script>alert('The Subjective Marks Should Not Be Exceed 10')</script>";
		exit();
	}
}

?>
<?php } ?>