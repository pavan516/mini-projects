<?php include('includes/header.php'); ?>

<div id="content">
	
	<div id="main">
		<ul class="listing">
		<?php
		include('connect.php');
			
			if(isset($_GET['id']))
			{
				$id = $_GET['id'];
				$user_email =$_SESSION['user_email'];
									 
				$query = mysqli_query($mysqli,"select * from booknow where id='$id' AND user_email='$user_email'");
				$row=mysqli_fetch_array($query);
				
					$comp_id = $row['comp_id'];
					$requirements = $row['requirements'];
					$status = $row['status'];
					
					$query_comp = mysqli_query($mysqli,"select * from company where comp_id='$comp_id'");
					$row=mysqli_fetch_array($query_comp);
						
							$service_id = $row['service_id'];
							$comp_name = $row['comp_name'];
							$comp_email = $row['comp_email'];
							$comp_contact = $row['comp_contact'];
							$comp_state = $row['comp_state'];
							$comp_city = $row['comp_city'];
							$comp_local_name = $row['comp_local_name'];
							$comp_address = $row['comp_address'];
							$comp_image = $row['comp_image'];
							$comp_min_price = $row['comp_min_price'];
							$comp_max_price = $row['comp_max_price'];
							$comp_price_per = $row['comp_price_per'];
						
							$query_com = mysqli_query($mysqli,"select * from services where service_id='$service_id'");
							$row=mysqli_fetch_array($query_com);
								
								$service_title = $row['service_title'];
									
									echo "<h1>$comp_name - Project - '<b style='color:green;'>$status'</b></h1>";
									echo 
									"<li>
										<p style='font-size:150%;color:red;'>You Can Cancel The Project Only If You Are Not Intrested To Continue And You Need To Clear All The Things/Issues With Company.</p>
										<form action='' method='POST'>
											<table>
												<tr>
													<td><center><textarea cols='40' rows='5' name='msg_cancel' id='msg_cancel' placeholder='Please Give Us FeedBack - Y You Are Cancelling The Project'></textarea></center></td>
												</tr>
												<tr>
													<td><center><input type='submit' name='cancel' id='cancel' value='CANCEL PROJECT' class='button'></textarea></center></td>
												</tr>
											</table>
										</form>
										<div class='clear'>&nbsp;</div>
									</li>";	
			}
			?>
		</ul>
    </div>
    
	<?php
    include("connect.php");
	
	if(isset($_POST['cancel']))
    {
	    $msg_cancel = $_POST['msg_cancel'];
	    	   
	    $insert = "UPDATE booknow SET msg_cancel='$msg_cancel', status='CLOSED' where id='$id' AND user_email='$user_email'";
	    $run_insert = mysqli_query($mysqli,$insert);
		if($run_insert)
		{
			echo "<script>alert('You Have Successfully Cancelled Your Project & ThankYou For Your Feedback!')</script>";
			echo "<script>window.open('cancel_my_project.php?id=$id','_self')</script>";
		}
		else
		{
			echo "<script>alert('You Are Unable To Cancel This Project(Place A Call To 'Online Home Service')!')</script>";
			echo "<script>window.open('cancel_my_project.php?id=$id','_self')</script>";
		}
	}						
    ?>

	
<?php include('includes/side_footer.php'); ?>   