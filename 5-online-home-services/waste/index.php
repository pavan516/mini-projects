<?php include('includes/header.php'); ?>
	
	<div id="content">
	
		<!-- User Registration Form -->
	
		<div id="home_main">
			<div id="search">
				<div class="tab">
					<h2><center>Seach Near By Services/Company</center></h2>
				</div>
				<div class="container"><br><br>
					<form action="" method="GET">
						<table>
							<tr>
								<td><b style="font-size:200%;">Type Of Service : </b></td>
								<td><select name="service_id" id="service_id">
									<option value="NULL" selected="1">Type Of Service</option>
									<?php 
									include('connect.php');
									$query = mysqli_query($mysqli,"select * from services");
									while($row=mysqli_fetch_array($query))
									{
										$service_id = $row['service_id'];
										$service_title = $row['service_title'];
										
										echo "<option value='$service_id'>$service_title</option>";
									}?>
									</select>
								</td>
							</tr>
							<tr>
								<td><b style="font-size:200%;">State : </b></td>
								<td><label><input type="text" name="state" id="state" required="required"/>
								</label></td>
							</tr>
							<tr>
								<td><b style="font-size:200%;">City : </b></td>
								<td><label><input type="text" name="city" id="city" required="required"/>
								</label></td>
							</tr>
							<tr>
								<td><b style="font-size:200%;">Local Area : </b></td>
								<td><label><input type="text" name="local_name" id="local_name" required="required"/>
								</label></td>
							</tr>
							<tr >
								<td align="center" colspan="2"><center><input class="button" style="background-color:black;color:white;" type="submit" name="search" id="register" value="SEARCH"/></center></td>
							</tr>
						</table>
					</form>
					
					<?php
                    include("connect.php");

                    if(isset($_POST['register']))
                    {
	                    $user_name = $mysqli->real_escape_string($_POST['user_name']);
	                    $user_email = $mysqli->real_escape_string($_POST['user_email']);
						$user_pass = $mysqli->real_escape_string($_POST['user_pass']);
	                    $user_contact = $mysqli->real_escape_string($_POST['user_contact']);
	                    $user_state = $mysqli->real_escape_string($_POST['user_state']);
	                    $user_city = $mysqli->real_escape_string($_POST['user_city']);
						$user_local_name = $mysqli->real_escape_string($_POST['user_local_name']);
	                    
	   
	                        $get_email = "select * from users where user_email='$user_email'";
	                        $run_email = mysqli_query($mysqli,$get_email);
	                        if(mysqli_num_rows($run_email)>0)
			                {
			                    echo "<script>alert('EMAIL $email IS ALREADY EXIST, PLEASE TRY ANOTHER ONE!')</script>";
			                }   
	                        else
	                        {
              		   	        $insert = "insert into users (user_name,user_pass,user_email,user_contact,user_state,user_city,user_local_name)
											values('$user_name','$user_pass','$user_email','$user_contact','$user_state','$user_city','$user_local_name')";
	   
	                            $run_insert = mysqli_query($mysqli,$insert);
		   
		                        if($run_insert)
		                        {
			                        echo "<script>alert('Successfully Registered Your Account')</script>";
			                        echo "<script>window.open('index.php','_self')</script>";
			                    }
								else
								{
			                        echo "<script>alert('Something Went Wrong!')</script>";
			                        echo "<script>window.open('index.php','_self')</script>";
			                    }	
		                    }
                        }

					?> 
					
					
					
				</div>
			</div>
		</div>
	
		<!-- End Of User Registration Form -->
		
<?php include('includes/side_footer.php'); ?>