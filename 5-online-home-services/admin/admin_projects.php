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

<div id="content">
	
	<div id="main">
		<ul class="listing">
		<?php
		include('connect.php');
			
			$query = mysqli_query($mysqli,"select * from booknow");
			while($row=mysqli_fetch_array($query))
			{
				$id = $row['id'];
				$comp_id = $row['comp_id'];
				$user_email = $row['user_email'];
				$requirements = $row['requirements'];
				$status = $row['status'];
				$msg_cancel = $row['msg_cancel'];
				
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
									<div class='listinfo'><a href='company_images/$comp_image'><img src='company_images/$comp_image' width='160' height='160' class='listingimage' /></a>";
										echo 	"<p style='font-size:130%;'><a href='view_details_admin.php?id=$id' class='button'>VIEW DETAILS</a></p>
									</div>
									<div class='clear'>&nbsp;</div>
								</li>";								
				
							}
					}
			}
		?>
		</ul>
    </div>
    

	
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