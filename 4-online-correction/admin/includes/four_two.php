<?php
include("connect.php");

$stu_year = $_POST['stu_year'];
if($stu_year=='')
{
	echo "<script>alert('Provide The End Of The Year')</script>";
	exit();
}
else
{
	$update = mysqli_query($mysqli,"UPDATE student set stu_year='$stu_year' where stu_year='4-2'");
	
	if($update)
	{
		echo "4-2 Students Are Successfully Updated To The Year $stu_year";
		exit();
	}
}

?>