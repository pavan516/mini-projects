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
<script type="text/javascript">
$(document).ready(function () {
    $('#searchdiv').hide();
    $('a').click(function () {
        $('#searchdiv').fadeIn('slow');
    });
    $('a#close').click(function () {
        $('#searchdiv').fadeOut('slow');
    })
});
</script>
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
	
	<!-- End Of Category List -->
	
	<!-- Company Profiles -->
	
	<div id="content">    
		<div id="main">
			<?php
			include('connect.php');
			if(isset($_GET['service_id']))
			{
				$service_id = $_GET['service_id'];
				$query = mysqli_query($mysqli,"select * from services where service_id='$service_id'");
				$row=mysqli_fetch_array($query);
				$service_title = $row['service_title'];
			}
			?>
			<h1><?php echo "$service_title"; ?> - Related Companies</h1>
			<ul class="listing">
				
				<!-- php code -->
					
					<?php
					include('connect.php');
					if(isset($_GET['service_id']))
					{
						$service_id = $_GET['service_id'];
						$query = mysqli_query($mysqli,"select * from company where service_id='$service_id'");
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
									<div class='listinfo'><a href='company_images/$comp_image'><img src='company_images/$comp_image' width='130' height='130' class='listingimage' /></a>
										<h3 style='font-size:170%;'>$comp_name</h3>
										<p style='font-size:130%;'>Minimum Price : <b style='color:#0fa9c5'>$comp_min_price</b></p>
										<p style='font-size:130%;'>Maximum Price : <b style='color:#0fa9c5'>$comp_max_price</b></p>
										<p style='font-size:130%;'>Per  : <b style='color:#0fa9c5'>$comp_price_per</b></p>
										<p style='font-size:130%;'>Contact Us : <b style='color:#0fa9c5'>$comp_contact</b></p>
										<p style='font-size:130%;'>City : <b style='color:#0fa9c5'>$comp_city</b></p>
										<p style='font-size:130%;'>Local Area : <b style='color:#0fa9c5'>$comp_local_name</b></p>
									</div>
									<div class='listingbtns'> 
										<span class='listbuttons'><a href='delete_comp.php?comp_id=$comp_id'>Delete</a></span> 
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
</html>
<?php } ?>