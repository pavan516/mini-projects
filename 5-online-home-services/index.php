<?php include('includes/header.php'); ?>

	<div id="content">
	
		<!-- search -->
	
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
								<td><select name="state" id="state" >
									<option value="NULL" selected="1">Select State</option>
									<option value="TELANGANA" >Telangana</option>
								</td>
							</tr>
							<tr>
								<td><b style="font-size:200%;">City : </b></td>
								<td><select name="city" id="city" required="required">
									<option value="NULL" selected="1">Select City</option>
									<option value="HYDERABAD" >Hyderabad</option>
								</td>
							</tr>
							<tr>
								<td><b style="font-size:200%;">Local Area : </b></td>
								<td><select name="local_name" id="local_name" required="required">
									<option value="NULL" selected="1">Select Local Area</option>
									<option value="L.B.NAGAR" >L.B.Nagar</option>
									<option value="BADANGPET" >Badangpet</option>
									<option value="R.N.REDDY" >R.N.Reddy</option>
									<option value="MEERPET" >Meerpet</option>
									<option value="ALMASGUDA" >Almasguda</option>
									<option value="BALAPUR" >Balapur</option>
								</td>
							</tr>
							<tr >
								<td align="center" colspan="2"><center><input class="button" style="background-color:black;color:white;" type="submit" name="search" id="register" value="SEARCH"/></center></td>
							</tr>
						</table>
					</form>
				</div>
			</div>
		</div>
		
		<!-- End Of Search -->
				
		<div id="home_sidebar">
		
			<!-- Top Sidebar -->
		
			<div class="hot">
				<h2 class="sidebar_head"><span class="h2link"><a href="favourite_more.php">View More</a></span>Favourite Lists</h2>
				<ul>
				
					<?php
					include('connect.php');
					
					$user_email = $_SESSION['user_email']; 
					$query = mysqli_query($mysqli,"select * from favourite where user_email='$user_email' ORDER by 1 DESC LIMIT 0,3");
					while($row=mysqli_fetch_array($query))
					{
						$comp_id = $row['comp_id'];
						$query_fav = mysqli_query($mysqli,"select * from company where comp_id='$comp_id'");
						while($row=mysqli_fetch_array($query_fav))
						{
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
							
							echo 
								"<li>
									<span class='imageholder'>
										<img src='admin/company_images/$comp_image' width='66' height='66' /> 
									</span>
									<h3><a href='single.php?comp_id=$comp_id'>$comp_name</a></h3>
									<p class='description' style='font-size:130%;'>Minimum Price : <b style='color:#0fa9c5'>$comp_min_price</b></p>
									<p class='description' style='font-size:130%;'>Maximum Price : <b style='color:#0fa9c5'>$comp_max_price</b></p>
								</li>"; 
						}
					}
					?>
				</ul>
			</div>
			
			<!-- End Of Side Bar -->
		</div>	
    
		<!-- Search Result -->
	
		<?php
		include('connect.php');
		
		if(isset($_GET['search']))
		{
			$service_id = $_GET['service_id'];
			$state = $_GET['state'];
			$city = $_GET['city'];
			$local_name = $_GET['local_name'];
		
		echo 
			"<div id='main'>
				<h1>Search Result</h1>
				<ul class='listing'>";?>
				
				<!-- php code -->
					
					<?php
					include('connect.php');
					 
						$query = mysqli_query($mysqli,"select * from company where service_id='$service_id' AND comp_state='$state' AND comp_city='$city' AND comp_local_name='$local_name'");
						while($row=mysqli_fetch_array($query))
						{
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
							
							echo 
								"<li>
									<div class='listinfo'><a href='admin/company_images/$comp_image'><img src='admin/company_images/$comp_image' width='130' height='130' class='listingimage' /></a>
										<h3 style='font-size:170%;'>$comp_name</h3>
										<p style='font-size:130%;'>Minimum Price : <b style='color:#0fa9c5'>$comp_min_price</b></p>
										<p style='font-size:130%;'>Maximum Price : <b style='color:#0fa9c5'>$comp_max_price</b></p>
										<p style='font-size:130%;'>Per  : <b style='color:#0fa9c5'>$comp_price_per</b></p>
										<p style='font-size:130%;'>Contact Us : <b style='color:#0fa9c5'>$comp_contact</b></p>
										<p style='font-size:130%;'>City : <b style='color:#0fa9c5'>$comp_city</b></p>
										<p style='font-size:130%;'>Local Area : <b style='color:#0fa9c5'>$comp_local_name</b></p>
									</div>
									<div class='listingbtns'> 
										<span class='listbuttons'><a href='single.php?comp_id=$comp_id'>View Details / Book</a></span> 
										<span class='listbuttons'><a href='favourite.php?comp_id=$comp_id&user_email=$user_email&service_id=$service_id'>Add To Favorites</a></span> 
									</div>
									<div class='clear'>&nbsp;</div>
								</li>"; 
						}
					}
					?><?php include('favourite.php'); ?>
				<!-- End Of php Code -->
				
					
			</ul>      
		</div>
	
		<!-- End Of Search Result -->
	
		<!-- down SideBar -->
		
		<div id="sidebar">
			<div class="block advert"><a href="https://www.matrimony.com/"><img src="admin/a (1).jpg" alt="" width="380" height="150"/></a></div>      
			<div class="block"><a href="https://www.matrimony.com/"><img src="admin/a (2).jpg" width="380" height="150"/></a></div>
			<div class="block"><a href="https://www.matrimony.com/"><img src="admin/a (3).jpg" width="380" height="150"/></a></div>
			<div class="block"><a href="https://www.flipkart.com/"><img src="admin/images.jpg" width="380" height="150"/></a></div>
			<div class="block"><a href="https://www.flipkart.com/"><img src="admin/image.jpg" width="380" height="150"/></a></div>
		</div>
		
		<!-- End Of Down Side Bar -->  
</div>
</body>
</html>