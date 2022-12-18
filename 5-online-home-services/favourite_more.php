<?php include('includes/header.php'); ?>
	
	<!-- Company Profiles -->
	
	<div id="content">    
		<div id="main">
			<h1>Favourites</h1>
			<ul class="listing">
				
				<!-- php code -->
					
					<?php
					include('connect.php');
					
					$user_email = $_SESSION['user_email']; 
					$query = mysqli_query($mysqli,"select * from favourite where user_email='$user_email'");
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
										<span class='listbuttons'><a href='delete_fav.php?comp_id=$comp_id&user_email=$user_email'>Remove / Delete</a></span> 
									</div>
									<div class='clear'>&nbsp;</div>
								</li>"; 
						}
					}
					?>
				<!-- End Of php Code -->
				
					
			</ul>      
		</div>
		<!-- End Of Company Profiles -->

<?php include('includes/side_footer.php'); ?>