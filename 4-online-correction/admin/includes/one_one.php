<?php
include("connect.php");

$stu_year = $_POST['stu_year'];

$update = mysqli_query($mysqli,"UPDATE student set stu_year='$stu_year' where stu_year='1-1'");
	
if($update)
{
	echo "1-1 Students Are Successfully Updated To The Year $stu_year";
	exit();
}

?>