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
				
					$id = $row['id'];
					$comp_id = $row['comp_id'];
					$user_email = $row['user_email'];
					$requirements = $row['requirements'];
					$status = $row['status'];
					$msg_cancel = $row['msg_cancel'];
					$admin_decision = $row['admin_decision'];
					$user_decision = $row['user_decision'];
					$total_budget = $row['total_budget'];
					$budget_plan = $row['budget_plan'];
					
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
									
									echo "<h1><center>$comp_name - Project - '<b style='color:green;'>$status'</b></center></h1>";
									
									echo "<h1>STEP : 1 - <b style='color:red;'>Requirements Sent By You</b></h1>";
									echo 
									"<li>
										<table>
											<tr>
												<td><p style='font-size:150%;'><textarea rows='3' cols='70'>$requirements</textarea></p></td>
											</tr>
										</table>
										<div class='clear'>&nbsp;</div>
									</li>";
									
									echo "<h1>STEP : 2 - <b style='color:red;'>Acknowledgement Sent By Company</b></h1>";
									if(isset($_GET['id']))
									{
										$id = $_GET['id'];
										
										$query = mysqli_query($mysqli,"SELECT * FROM budget where user_email='$user_email' AND id='$id'");
										while($row = mysqli_fetch_array($query))
										{
											$day_no = $row['day_no'];
											$date_day = $row['date_day'];
											$work_desc = $row['work_desc'];
											$workers_no = $row['workers_no'];
											$mrng_amnt = $row['mrng_amnt'];
											$evng_amnt = $row['evng_amnt'];
											$mrng_payment = $row['mrng_payment'];
											$evng_payment = $row['evng_payment'];
											$decision = $row['decision'];
									
									
											echo"<li>
													<table>
														<tr>
															<td colspan='4'><center><b style='font-size:150%;color:green'>Day - $day_no</b></center></td>
														</tr>
														<tr>
															<td colspan='2'><b style='font-size:150%;color:purple'>Date</b></td>
															<td colspan='2'><b style='font-size:150%;color:black'>$date_day</b></td>
														</tr>
														<tr>
															<td colspan='2'><b style='font-size:150%;color:purple'>Work</b></td>
															<td colspan='2'><b style='font-size:150%;color:black'>$work_desc</b></td>
														</tr>
														<tr>
															<td colspan='2'><b style='font-size:150%;color:purple'>No Of Workers</b></td>
															<td colspan='2'><b style='font-size:150%;color:black'>$workers_no</b></td>
														</tr>
														<tr>
															<td><b style='font-size:150%;color:purple'>Morning Amt</b></td>
															<td><b style='font-size:150%;color:black'>$mrng_amnt</b></td>
															<td><a href='mrng_pay.php?id=$id&user_email=$user_email&day_no=$day_no' class='button1' >$mrng_payment</a></td>
														</tr>
														<tr>
															<td><b style='font-size:150%;color:purple'>Evening Amt</b></td>
															<td><b style='font-size:150%;color:black'>$evng_amnt</b></td>
															<td><a href='evng_pay.php?id=$id&user_email=$user_email&day_no=$day_no' class='button1' >$evng_payment</a></td>
														</tr>
													</table>		
													<div class='clear'>&nbsp;</div>											
												</li>";
										}
									}
									
									if($admin_decision=='ACCEPTED')
										{
											if($total_budget!='NULL')
											{
												if($budget_plan!='NULL')
												{													
													
													if(isset($_GET['id']))
													{
														$id = $_GET['id'];
														
														$query = mysqli_query($mysqli,"SELECT * FROM budget where id='$id' AND decision='NOT-ACCEPTED'");
														$check = mysqli_num_rows($query);
														if($check==0)
														{
															echo "<h1><center><b style='color:green;'>Project Completed</b></center></h1>";
														}														
														echo "<div class='clear'>&nbsp;</div>";											
													}
												}
											}
										}			
											
									
									if($status=='CLOSED')
									echo "<h1><center><b style='color:red;'>Project Closed</b></center></h1>";		
			}
			?>
		</ul>
    </div>
    

	
<?php include('includes/side_footer.php'); ?>   