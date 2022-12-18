<?php
                include("connect.php");
				if(isset($_GET['id']))
                {
	                $id = $_GET['id'];
	                	   
	                $update_a = "UPDATE booknow SET admin_decision='ACCEPTED', status='WORKING' where id='$id'";
	                $run_update_a = mysqli_query($mysqli,$update_a);
		            if($run_update_a)
		            {
			            echo "<script>alert('You Successfully Accepted The Project!')</script>";
			            echo "<script>window.open('view_details_admin.php?id=$id','_self')</script>";
			        }
					else
					{
			            echo "<script>alert('Something Went Wrong!')</script>";
			            echo "<script>window.open('view_details_admin.php?id=$id','_self')</script>";
			        }
				}						
                ?> 