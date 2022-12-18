<?php
                include("connect.php");
				if(isset($_GET['id']))
                {
					$id=$_GET['id'];
					$day_no=$_GET['day_no'];
	                	   
	                $update_budget = "UPDATE budget SET decision='ACCEPTED' where id='$id' AND day_no='$day_no'";
	                $run_insert = mysqli_query($mysqli,$update_budget);
		            if($run_insert)
		            {
			            echo "<script>alert('Successfully Accepted $day_no Day Work!')</script>";
			            echo "<script>window.open('view_details_admin.php?id=$id','_self')</script>";
			        }
					else
					{
			            echo "<script>alert('Something Went Wrong!')</script>";
			            echo "<script>window.open('view_details_admin.php?id=$id','_self')</script>";
			        }
				}						
                ?>