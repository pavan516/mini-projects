<?php include('includes/header.php'); ?>

<div id="content">
	
	<div id="main">
		<ul class="listing">
		<?php
		include('connect.php');
			
			$user_email =$_SESSION['user_email'];
									 
			$query = mysqli_query($mysqli,"select * from booknow where user_email='$user_email'");
			while($row=mysqli_fetch_array($query))
			{
				$id = $row['id'];
				$comp_id = $row['comp_id'];
				$requirements = $row['requirements'];
				$status = $row['status'];
				
					$query_comp = mysqli_query($mysqli,"select * from company where comp_id='$comp_id'");
					while($row=mysqli_fetch_array($query_comp))
					{
					
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
							while($row=mysqli_fetch_array($query_com))
							{
								$service_title = $row['service_title'];
								
								echo "<h1>$comp_name - Project - '<b style='color:green;'>$status'</b></h1>";
								echo 
								"<li>
									<div class='listinfo'><a href='admin/company_images/$comp_image'><img src='admin/company_images/$comp_image' width='160' height='160' class='listingimage' /></a>";
										if($status=='OPENED')
										{
											echo 	"<p style='font-size:130%;'><a href='view_details_my_project.php?id=$id' class='button'>VIEW DETAILS</a></p>
													<p style='font-size:130%;'><a href='delete_project.php?id=$id&user_email=$user_email' class='button'>DELETE PROJECT</a></p>";
										}
										if($status=='WORKING')
										{
											echo 	"<p style='font-size:130%;'><a href='view_details_my_project.php?id=$id' class='button'>VIEW DETAILS</a></p>
													 <p style='font-size:130%;'><a href='cancel_my_project.php?id=$id' class='button'>CANCEL PROJECT</a></p>";
										}
										if($status=='CLOSED')
										{
											echo 	"<p style='font-size:130%;'><a href='view_details_my_project.php?id=$id' class='button'>VIEW DETAILS</a></p>
													 <p style='font-size:130%;'><a href='delete_project.php?id=$id&user_email=$user_email' class='button'>DELETE PROJECT</a></p>";
										}echo "
									</div>
									<div class='clear'>&nbsp;</div>
								</li>";								
				
							}
					}
			}
		?>
		</ul>
    </div>
    

	
<?php include('includes/side_footer.php'); ?>   