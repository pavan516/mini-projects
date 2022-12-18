<?php include('includes/header.php'); ?>

<div id="content">
	
	<?php
	include('connect.php');
	if(isset($_GET['comp_id']))
	{
		$comp_id = $_GET['comp_id'];
						 
		$query = mysqli_query($mysqli,"select * from company where comp_id='$comp_id'");
		$row=mysqli_fetch_array($query);
		
			$comp_id = $row['comp_id'];
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
	}?>			
			
	
	<div id="main">
		<h1><?php echo "$comp_name"; ?></h1>
		<div id="single_item_details">
			<div id="leftcolumn">
				<img src="<?php echo "admin/company_images/$comp_image"; ?>" width="520" height="400" class="previewimg" />
			</div>
			<div class="clear">&nbsp;</div>
		</div>
      
		<h1 style="color:green;"><center>Complete Details</center></h1>
		<ul class="listing">
			<li style="background-color:#d2dbda;">
				<table>
					<tr>
						<td><b style="font-size:150%;">1</b></td>
						<td><b style="font-size:150%;">Company Name</b></td>
						<td><b style="font-size:150%;color:green;"><?php echo "$comp_name"; ?></b></td>
					</tr>
					<tr>
						<td><b style="font-size:150%;">2</b></td>
						<td><b style="font-size:150%;">Type Of Service</b></td>
						<td><b style="font-size:150%;color:green;"><?php echo "$service_title"; ?></b></td>
					</tr>
					<tr>
						<td><b style="font-size:150%;">3</b></td>
						<td><b style="font-size:150%;">Company E-Mail</b></td>
						<td><b style="font-size:150%;color:green;"><?php echo "$comp_email"; ?></b></td>
					</tr>
					<tr>
						<td><b style="font-size:150%;">4</b></td>
						<td><b style="font-size:150%;">Company Contact</b></td>
						<td><b style="font-size:150%;color:green;"><?php echo "$comp_contact"; ?></b></td>
					</tr>
					<tr>
						<td><b style="font-size:150%;">5</b></td>
						<td><b style="font-size:150%;">Company State</b></td>
						<td><b style="font-size:150%;color:green;"><?php echo "$comp_state"; ?></b></td>
					</tr><tr>
						<td><b style="font-size:150%;">6</b></td>
						<td><b style="font-size:150%;">Company City</b></td>
						<td><b style="font-size:150%;color:green;"><?php echo "$comp_city"; ?></b></td>
					</tr>
					<tr>
						<td><b style="font-size:150%;">7</b></td>
						<td><b style="font-size:150%;">Company Local Name</b></td>
						<td><b style="font-size:150%;color:green;"><?php echo "$comp_local_name"; ?></b></td>
					</tr>
					<tr>
						<td><b style="font-size:150%;">8</b></td>
						<td><b style="font-size:150%;">Company Address</b></td>
						<td><b style="font-size:150%;color:green;"><textarea cols="30" rows="2"><?php echo "$comp_address"; ?></textarea></b></td>
					</tr>
					<tr>
						<td><b style="font-size:150%;">9</b></td>
						<td><b style="font-size:150%;">Minimum Price(Per House)</b></td>
						<td><b style="font-size:150%;color:green;"><?php echo "$comp_min_price"; ?></b></td>
					</tr>
					<tr>
						<td><b style="font-size:150%;">10</b></td>
						<td><b style="font-size:150%;">Maximum Price(Per House)</b></td>
						<td><b style="font-size:150%;color:green;"><?php echo "$comp_max_price"; ?></b></td>
					</tr>					
				</table>
			</li>        
		</ul>
    
		<h1 style="color:green;"><center>Submit A Review</center></h1>
		<ul class="listing">
			<li style="background-color:#d2dbda;">
				<form action="" method="post">
					<table>
						<tr>
							<td><center><textarea name="review" id="review" cols="70" rows="5"></textarea></center></td>
						</tr>
						<tr>
							<td align="center" colspan="2"><center><input class="button" style="background-color:black;color:white;" type="submit" name="submit" id="submit" value="REVIEW"/></center></td>
						</tr>					
					</table>
				</form>
				<?php
                include("connect.php");
				if(isset($_POST['review']))
                {
	                $review = $_POST['review'];
	                $user_email = $_SESSION['user_email'];
	   
	                $insert = "insert into reviews (comp_id,review,user_email) values('$comp_id','$review','$user_email')";
	                $run_insert = mysqli_query($mysqli,$insert);
		            if($run_insert)
		            {
			            echo "<script>alert('Your Review Is Successfully Published!')</script>";
			            echo "<script>window.open('single.php?comp_id=$comp_id','_self')</script>";
			        }
					else
					{
			            echo "<script>alert('Something Went Wrong!')</script>";
			            echo "<script>window.open('single.php?comp_id=$comp_id','_self')</script>";
			        }
				}						
                ?>
			</li>        
		</ul>
		
		<h1 style="color:green;"><center>Reviews On A Company</center></h1>
		<ul class="listing">
			<li style="background-color:#d2dbda;">
				<table>
					<?php
					include('connect.php');
					$query = mysqli_query($mysqli,"select * from reviews where comp_id='$comp_id'");
					$count = mysqli_num_rows($query);
					if($count==0)
					{
						echo 	
							"<tr>
								<td colspan='2'><center><b style='font-size:150%;color:red;'>No Reviews</b></center></td>
							</tr>";
					}
					echo"<tr>
									<td><center><b style='font-size:150%;color:red;'>User Name</b></center></td>
									<td><center><b style='font-size:150%;color:red;'>Review</b></center></td>
								</tr>";
					while($row=mysqli_fetch_array($query))
					{
						$user_email = $row['user_email'];
						$review = $row['review'];
														
						$query_user = mysqli_query($mysqli,"select * from users where user_email='$user_email'");
						while($row=mysqli_fetch_array($query_user))
						{
							$user_name = $row['user_name'];
							
							echo 
								"<tr>
									<td><b style='font-size:130%;'>$user_name</b></td>
									<td><center><b style='font-size:130%;'>$review</b></center></td>
								</tr>";
						}
					}
					?>					
				</table>
			</li>        
		</ul>
		
		
		<h1 style="color:green;"><center>Book This Company</center></h1>
		<ul class="listing">
			<li style="background-color:#d2dbda;">
				<form action="" method="post">
					<table>
						<tr>
							<td><center><textarea name="requirements" id="requirements" cols="70" rows="5">Tell Your Complete Requirements</textarea></center></td>
						</tr>
						<tr>
							<td align="center" colspan="2"><center><input class="button" style="background-color:black;color:white;" type="submit" name="book" id="book" value="BOOK NOW"/></center></td>
						</tr>					
					</table>
				</form>
				<?php
                include("connect.php");
				if(isset($_POST['book']))
                {
	                $requirements = $_POST['requirements'];
	                $user_email = $_SESSION['user_email'];
	   
	                $insert = "insert into booknow (comp_id,user_email,requirements,status,msg_cancel,admin_decision,user_decision,total_budget,budget_plan) values('$comp_id','$user_email','$requirements','OPENED','NULL','NULL','NULL','NULL','NULL')";
	                $run_insert = mysqli_query($mysqli,$insert);
		            if($run_insert)
		            {
			            echo "<script>alert('Thank You For Booking Us We Will Get Back Soon!')</script>";
			            echo "<script>window.open('single.php?comp_id=$comp_id','_self')</script>";
			        }
					else
					{
			            echo "<script>alert('Something Went Wrong!')</script>";
			            echo "<script>window.open('single.php?comp_id=$comp_id','_self')</script>";
			        }
				}						
                ?>
			</li>        
		</ul>
		
		
    </div>
    

	
<?php include('includes/side_footer.php'); ?>   