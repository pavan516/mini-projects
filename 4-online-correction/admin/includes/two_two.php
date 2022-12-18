<?php
include("connect.php");

$stu_year = $_POST['stu_year'];

$update = mysqli_query($mysqli,"UPDATE student set stu_year='$stu_year' where stu_year='2-2'");
	
if($update)
{
	echo "2-2 Students Are Successfully Updated To The Year $stu_year";
	exit();
}

?>