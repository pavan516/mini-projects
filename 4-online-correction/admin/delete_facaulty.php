<?php
include('connect.php');
if(isset($_GET['fac_email']))
{
	$fac_email = $_GET['fac_email'];
	
	$delete_post = "delete from register where fac_email='$fac_email'";
	$run_delete = mysqli_query($mysqli,$delete_post);
	
	if($run_delete)
	{
		echo "<script>alert('Facualty Has Been Removed Successfully!')</script>";
        echo "<script>window.open('facaulty.php','_self')</script>";
	}
}
?>	