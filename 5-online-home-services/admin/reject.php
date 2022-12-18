<?php
                include("connect.php");
				if(isset($_GET['id']))
                {
	                $id = $_GET['id'];
	                	   
	                $update_b = "UPDATE booknow SET admin_decision='REJECTED', status='CLOSED' where id='$id'";
	                $run_update_b = mysqli_query($mysqli,$update_b);
		            if($run_update_b)
		            {
			            echo "<script>alert('You Successfully Rejected The Project!')</script>";
			            echo "<script>window.open('view_details_admin.php?id=$id','_self')</script>";
			        }
					else
					{
			            echo "<script>alert('Something Went Wrong!')</script>";
			            echo "<script>window.open('view_details_admin.php?id=$id','_self')</script>";
			        }
				}						
                ?>