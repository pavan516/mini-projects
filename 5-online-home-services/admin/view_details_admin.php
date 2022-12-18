<?php
session_start();

if(!isset($_SESSION['admin_email'])){

header("location: admin_login.php");

}
else
{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Online Home Service</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/layout.css" rel="stylesheet" type="text/css" />
<link href="css/forms.css" rel="stylesheet" type="text/css" />
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/jquery-2.1.4.js"></script>
<script src="js/bootstrap.min.js"></script>
<style>
.button {
    background-color: #e199ed; 
    border: none;
    color: white;
    padding: 10px 18px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 10px 6px;
    cursor: pointer;
	max-width: 100%;
}


.button {border-radius: 12px;}

</style>
<style>
@media screen and (max-width: 640px) {
	table {
		overflow-x: auto;
		display: block;
	}
}
</style>
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
	
}

td, th, tr {
    border: 3px solid #dddddd;
    text-align: left;
    padding: 3px;
	
}
</style>
</head>
<body>
<div id="wrap">

	
	
	<div id="topbar"></div>
	<div id="header">
		<div id="sitename" id="shoutout"><br><br><br>
			<b style="color:blue;font-size:200%;" align="center">Online Home Service</b>
		</div>
		<div id="shoutout">
			<img src="images/joinnow_shoutout.jpg" alt="" width="168" height="126" />
		</div>
			
		<div id="useractions">
			<div id="headings">
				<h2 style="font-size:200%;"><center>
					Welcome To Admin Panel</center><hr><marquee>Online Home Service</marquee>
				</h2>
			</div>
			<div id="login">
				<div id="loginform">
						
				</div>
			</div>
		</div>
	</div>
	
	
	
  <div id="content">
  
    <!-- Category List -->
	
	<div id="topcategorieslink" class="clear">
		<h2>Categories</h2>
		<ul><li><a href="index.php">HOME</a></li>
			<?php 
			include('connect.php');
			$query = mysqli_query($mysqli,"select * from services");
			while($row=mysqli_fetch_array($query))
			{
				$service_id = $row['service_id'];
				$service_title = $row['service_title'];
				
				echo "<li><a href='service.php?service_id=$service_id'>$service_title</a></li>";
			}?>
			<li><a href="admin_projects.php">BIDS</a></li>
			<li><a href="logout.php">LOGOUT</a></li>
		</ul>
    </div>

<div id="content">
	
	<div id="main">
		<ul class="listing">
		<?php
		include('connect.php');
			
			if(isset($_GET['id']))
			{
				$id = $_GET['id'];
													 
				$query = mysqli_query($mysqli,"select * from booknow where id='$id' ");
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
										
					$query_user = mysqli_query($mysqli,"select * from users where user_email='$user_email'");
					$row=mysqli_fetch_array($query_user);
					
					$user_name = $row['user_name'];
					$user_email = $row['user_email'];
					$user_pass = $row['user_pass'];
					$user_contact = $row['user_contact'];
					$user_state = $row['user_state'];
					$user_city = $row['user_city'];
					$user_local_name = $row['user_local_name'];
										
					
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
									
									$query = mysqli_query($mysqli,"SELECT * FROM budget where id='$id'");
									$row = mysqli_fetch_array($query);
									
										$day_no = $row['day_no'];
										$date_day = $row['date_day'];
										$work_desc = $row['work_desc'];
										$workers_no = $row['workers_no'];
										$mrng_amnt = $row['mrng_amnt'];
										$evng_amnt = $row['evng_amnt'];
										$mrng_payment = $row['mrng_payment'];
										$evng_payment = $row['evng_payment'];
										$decision = $row['decision'];
										
										echo "<h1><center>$comp_name - Project - '<b style='color:green;'>$status'</b></center></h1>";
										
										echo "<h1><center><b style='color:red;'>USER DETAILS</b><center></h1>";
										echo 
										"<li>
											<table>
												<tr>
													<td><b style='font-size:150%;'>1</b></td>
													<td><b style='font-size:150%;'>User Name</b></td>
													<td><b style='font-size:150%;color:green;'>$user_name</b></td>
												</tr>
												<tr>
													<td><b style='font-size:150%;'>2</b></td>
													<td><b style='font-size:150%;'>User Email</b></td>
													<td><b style='font-size:150%;color:green;'>$user_email</b></td>
												</tr>
												<tr>
													<td><b style='font-size:150%;'>3</b></td>
													<td><b style='font-size:150%;'>User Contact</b></td>
													<td><b style='font-size:150%;color:green;'>$user_contact</b></td>
												</tr>
												<tr>
													<td><b style='font-size:150%;'>4</b></td>
													<td><b style='font-size:150%;'>User State</b></td>
													<td><b style='font-size:150%;color:green;'>$user_state</b></td>
												</tr>
												<tr>
													<td><b style='font-size:150%;'>5</b></td>
													<td><b style='font-size:150%;'>User City</b></td>
													<td><b style='font-size:150%;color:green;'>$user_city</b></td>
												</tr>
												<tr>
													<td><b style='font-size:150%;'>5</b></td>
													<td><b style='font-size:150%;'>User Local Area</b></td>
													<td><b style='font-size:150%;color:green;'>$user_local_name</b></td>
												</tr>												
											</table>
											<div class='clear'>&nbsp;</div>
										</li>";
										
										echo "<h1>STEP : 2 - <b style='color:red;'>Requirements Sent By $user_name</b></h1>";
										echo "<table>
													<tr>
														<td colspan='2'><p style='font-size:150%;'>$requirements</p></td>
													</tr>
												</table>";
										if($admin_decision=='NULL')
										{
											echo 
											"<li>
												<table>
													<tr>
														<form action='' method='POST'>
															<td><center><a href='accept.php?id=$id' class='button'>ACCEPT</a></center></td>
															<td><center><a href='reject.php?id=$id' class='button'>REJECT</a><center></p></td>
														</form>
													</tr>
												</table>
												<div class='clear'>&nbsp;</div>											
											</li>";
										}
										if($admin_decision=='ACCEPTED')
										{
											echo 
											"<li>
												<table>
													<tr>
														<td><center><b><p style='font-size:150%;color:green;'> Project - Accepted</p></b></center></td>
													</tr>	
												</table>
												<div class='clear'>&nbsp;</div>											
											</li>";
										}
										if($admin_decision=='ACCEPTED')
										{
											if($total_budget=='NULL')
											{
											
												echo "<h1>STEP : 3 - <b style='color:red;'>Project - Budget Planning</b></h1>";
												echo 
												"<li>
													<form method='POST' action='' >
													<table>
													<tr>
														<td><b style='font-size:150%;'>1</b></td>
														<td><b style='font-size:150%;'>Total Budget</b></td>
														<td><b style='font-size:150%;color:green;'><input type='text' name='total_budget' id='total_budget' required='required'></b></td>
													</tr>
													<tr>
														<td colspan='3'><center><b style='font-size:150%;color:green;'><input type='submit' name='budget' id='budget' value='submit' class='button' ></b></center></td>
													</tr>											
													</table>
													</form>
													<div class='clear'>&nbsp;</div>											
												</li>";
																								
											}												
										}
										if($admin_decision=='ACCEPTED')
										{
											if($total_budget!='NULL')
											{
												if($budget_plan=='NULL')
												{
											
													echo "<h1>STEP : 3 - <b style='color:red;'>Project - Budget Planning For - $total_budget</b></h1>";
													echo 
													"<li>
														<table>
															<tr>
																<td><b style='font-size:150%;'>NOTE</b></td>
																<td colspan='2'><b style='font-size:150%;color:blue;'>Divide The Budget Into Different Parts - Plan Your Own Budget (Divide The Work Into Days With Equal Amount)</b></td>
															</tr>												
														</table><br>
														<table>
															<tr>
																<td colspan='2'><b style='font-size:150%;color:green;'><center>Project Plan In Detail - Submit One By One</center></b></td>
															</tr>												
														</table>
														<form method='post' action='' >
															<table>
																<tr>
																	<td><b style='font-size:150%;color:purple'>Day No</b></td>
																	<td>
																		<select name='day_no' id='day_no'>
																			<option value='NULL' selected='1'>Select Day</option>
																			<option value='1'>Day 1</option>
																			<option value='2'>Day 2</option>
																			<option value='3'>Day 3</option>
																			<option value='4'>Day 4</option>
																			<option value='5'>Day 5</option>
																			<option value='6'>Day 6</option>
																			<option value='7'>Day 7</option>
																			<option value='8'>Day 8</option>
																			<option value='9'>Day 9</option>
																			<option value='10'>Day 10</option>
																			<option value='11'>Day 11</option>
																			<option value='12'>Day 12</option>
																			<option value='13'>Day 13</option>
																			<option value='14'>Day 14</option>
																			<option value='15'>Day 15</option>
																			<option value='16'>Day 16</option>
																			<option value='17'>Day 17</option>
																			<option value='18'>Day 18</option>
																			<option value='19'>Day 19</option>
																			<option value='20'>Day 20</option>
																			<option value='21'>Day 21</option>
																			<option value='22'>Day 22</option>
																			<option value='23'>Day 23</option>
																			<option value='24'>Day 24</option>
																			<option value='25'>Day 25</option>
																			<option value='26'>Day 26</option>
																			<option value='27'>Day 27</option>
																			<option value='28'>Day 28</option>
																			<option value='29'>Day 29</option>
																			<option value='30'>Day 30</option>
																		</select>
																	</td>
																</tr>
																<tr>
																	<td><b style='font-size:150%;color:purple'>Date</b></td>
																	<td><input type='date' name='date_day' id='date_day' required='required' ></td>																
																</tr>
																<tr>
																	<td><b style='font-size:150%;color:purple'>Work</b></td>
																	<td><textarea name='work_desc' id='work_desc' rows='3' cols='30' required='required' placeholder='Describe The Work'></textarea></td>
																</tr>
																<tr>
																	<td><b style='font-size:150%;color:purple'>No Of Workers</b></td>	
																	<td>
																		<select name='workers_no' id='workers_no'>
																			<option value='NULL' selected='1'>Select Workers</option>
																			<option value='1'>1</option>
																			<option value='2'>2</option>
																			<option value='3'>3</option>
																			<option value='4'>4</option>
																			<option value='5'>5</option>
																			<option value='6'>6</option>
																			<option value='7'>7</option>
																			<option value='8'>8</option>
																			<option value='9'>9</option>
																			<option value='10'>10</option>
																			<option value='11'>11</option>
																			<option value='12'>12</option>
																			<option value='13'>13</option>
																			<option value='14'>14</option>
																			<option value='15'>15</option>
																			<option value='16'>16</option>
																			<option value='17'>17</option>
																			<option value='18'>18</option>
																			<option value='19'>19</option>
																			<option value='20'>20</option>
																			<option value='21'>21</option>
																			<option value='22'>22</option>
																			<option value='23'>23</option>
																			<option value='24'>24</option>
																			<option value='25'>25</option>
																			<option value='26'>26</option>
																			<option value='27'>27</option>
																			<option value='28'>28</option>
																			<option value='29'>29</option>
																			<option value='30'>30</option>
																		</select>
																	</td>															
																</tr>
																<tr>
																	<td><b style='font-size:150%;color:purple'>Morning Amt</b></td>	
																	<td><input type='text' name='mrng_amnt' id='mrng_amnt' required='required' ></td>
																</tr>
																<tr>
																	<td><b style='font-size:150%;color:purple'>Evening Amt</b></td>
																	<td><input type='text' name='evng_amnt' id='evng_amnt' required='required' ></td>
																</tr>
																<tr>
																	<td colspan='2'><center><input type='submit' name='budget_detail' id='budget_detail' value='Create' class='button' ></center></td>
																</tr>
															</table>
														</form>	
														<div class='clear'>&nbsp;</div>											
													</li>";
													echo 
													"<li>
														<form method='POST' action='' >
															<table>
																<tr>
																	<td colspan='2'><b style='font-size:150%;color:green;'><center>After Plan - Close Planning Budget.</center></b></td>
																</tr>
																<tr>
																	<td><center><b style='font-size:150%;color:green;'><input type='submit' name='budget_complete' id='budget_complete' value='Completed Planning' class='button' ></b></center></td>
																</tr>											
															</table>
														</form>
														<div class='clear'>&nbsp;</div>											
													</li>";
												}
											}												
										}
										
										if($admin_decision=='ACCEPTED')
										{
											if($total_budget!='NULL')
											{
												if($budget_plan!='NULL')
												{													
													echo "<h1>STEP : 3 - <b style='color:red;'>Project Plan Sended By Me</b></h1>";
													if(isset($_GET['id']))
													{
														$id = $_GET['id'];
														
														$query = mysqli_query($mysqli,"SELECT * FROM budget where id='$id'");
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
						
															echo 
															"<li>
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
																		<td><b style='font-size:150%;color:black'>";if($mrng_payment=='PAY'){ echo "NOT-PAID";}else {echo "$mrng_payment";}echo "</b></td>
																	</tr>
																	<tr>
																		<td><b style='font-size:150%;color:purple'>Evening Amt</b></td>
																		<td><b style='font-size:150%;color:black'>$evng_amnt</b></td>
																		<td><b style='font-size:150%;color:black'>";if($evng_payment=='PAY'){ echo "NOT-PAID";}else {echo "$evng_payment";}echo "</b></td>
																	</tr>
																	<tr>
																		<td colspan='4'><center><b style='font-size:150%;color:green;'><a href='amount_accept.php?id=$id&day_no=$day_no' class='button' >";?><?php if($decision=='NOT-ACCEPTED'){ echo "ACCEPT";}else {echo "$decision";} ?></a></b></center></td>
																	</tr>
																</table>		
																<div class='clear'>&nbsp;</div>											
															</li><?php
														}
													}
												}
											}
										}
										
										if($admin_decision=='REJECTED')
										{
											echo 
											"<li>
												<table>
													<tr>
														<td><center><b><p style='font-size:150%;color:green;'> Project - Rejected</p></b></center></td>
													</tr>	
												</table>
												<div class='clear'>&nbsp;</div>											
											</li>";
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
															$query = mysqli_query($mysqli,"UPDATE booknow SET status='CLOSED' where id='$id'");
															
															echo "<h1><center><b style='color:green;'>Project Completed</b></center></h1>";
														}														
														echo "<div class='clear'>&nbsp;</div>";											
													}
												}
											}
										}
										
										if($status=='CLOSED')
										echo "<h1><center><b style='color:green;'>Project Closed</b></center></h1>";		
			}
			?>
		</ul>
    </div>

				<?php
                include("connect.php");
				if(isset($_POST['budget']))
                {
	                $total_budget = $_POST['total_budget'];
	                $user_email = $_SESSION['user_email'];
	   
	                $update_budget = "UPDATE booknow SET total_budget='$total_budget' where id='$id'";
	                $run_insert = mysqli_query($mysqli,$update_budget);
		            if($run_insert)
		            {
			            echo "<script>alert('Successfully Budget Is Fixed!')</script>";
			            echo "<script>window.open('view_details_admin.php?id=$id','_self')</script>";
			        }
					else
					{
			            echo "<script>alert('Something Went Wrong!')</script>";
			            echo "<script>window.open('view_details_admin.php?id=$id','_self')</script>";
			        }
				}						
                ?>
				<?php
                include("connect.php");
				if(isset($_POST['budget_detail']))
                {
	                $day_no = $_POST['day_no'];
					$date_day = $_POST['date_day'];
					$work_desc = $_POST['work_desc'];
					$workers_no = $_POST['workers_no'];
					$mrng_amnt = $_POST['mrng_amnt'];
					$evng_amnt = $_POST['evng_amnt'];
					
					
	   
	                $insert_budget = "insert into budget (id,comp_id,user_email,day_no,date_day,work_desc,workers_no,mrng_amnt,evng_amnt,mrng_payment,evng_payment,decision) 
										values ('$id','$comp_id','$user_email','$day_no','$date_day','$work_desc','$workers_no','$mrng_amnt','$evng_amnt','PAY','PAY','NOT-ACCEPTED')";
	                $run_insert = mysqli_query($mysqli,$insert_budget);
		            if($run_insert)
		            {
			            echo "<script>alert('Successfully Created a $day_no Planning!')</script>";
			            echo "<script>window.open('view_details_admin.php?id=$id','_self')</script>";
			        }
					else
					{
			            echo "<script>alert('Something Went Wrong!')</script>";
			            echo "<script>window.open('view_details_admin.php?id=$id','_self')</script>";
			        }
				}						
                ?>				
				<?php
                include("connect.php");
				if(isset($_POST['budget_complete']))
                {
	                	   
	                $update_budget = "UPDATE booknow SET budget_plan='COMPLETED' where id='$id'";
	                $run_insert = mysqli_query($mysqli,$update_budget);
		            if($run_insert)
		            {
			            echo "<script>alert('Successfully Completed Planning A Budget!')</script>";
			            echo "<script>window.open('view_details_admin.php?id=$id','_self')</script>";
			        }
					else
					{
			            echo "<script>alert('Something Went Wrong!')</script>";
			            echo "<script>window.open('view_details_admin.php?id=$id','_self')</script>";
			        }
				}						
                ?>
				
	
		<div id="sidebar">
			<div class="block advert"><a href="https://www.matrimony.com/"><img src="a (1).jpg" alt="" width="380" height="150"/></a></div>      
			<div class="block"><a href="https://www.matrimony.com/"><img src="a (2).jpg" width="380" height="150"/></a></div>
			<div class="block"><a href="https://www.matrimony.com/"><img src="a (3).jpg" width="380" height="150"/></a></div>
			<div class="block"><a href="https://www.flipkart.com/"><img src="images.jpg" width="380" height="150"/></a></div>
			<div class="block"><a href="https://www.flipkart.com/"><img src="image.jpg" width="380" height="150"/></a></div>
		</div>
    <div class="clear">&nbsp;</div>
  
  
</div>
</body>
</html>
<?php } ?>    