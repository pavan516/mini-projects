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
    
    <div id="content">    
    
    <div id="main">
		<h1><center>Create A Company Profile</center></h1>
			<ul class="listing">
				<li>
					<form action="" method="post" enctype="multipart/form-data">
						<table class="search_form" style="height:150%; border:none;">
							<tr>
								<td><b style="font-size:150%;">Type Of Service : </b></td>
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
								<td><b style="font-size:150%;">Company Name : </b></td>
								<td><label><input type="text" name="comp_name" id="comp_name" required="required" size="30%"/>
								</label></td>
							</tr>
							<tr>
								<td><b style="font-size:150%;">Company Email : </b></td>
								<td><label><input type="text" name="comp_email" id="comp_email" required="required" size="30%"/>
								</label></td>
							</tr>
							<tr>
								<td><b style="font-size:150%;">Company Contact : </b></td>
								<td><label><input type="text" name="comp_contact" id="comp_contact" required="required" size="30%"/>
								</label></td>
							</tr>
							<tr>
								<td><b style="font-size:150%;">Company State : </b></td>
								<td><select name="comp_state" id="comp_state" >
									<option value="NULL" selected="1">Select State</option>
									<option value="TELANGANA" >Telangana</option>
								</td>
							</tr>
							<tr>
								<td><b style="font-size:150%;">Company City : </b></td>
								<td><select name="comp_city" id="comp_city" required="required">
									<option value="NULL" selected="1">Select City</option>
									<option value="HYDERABAD" >Hyderabad</option>
								</td>
							</tr>
							<tr>
								<td><b style="font-size:150%;">Company Local Area : </b></td>
								<td><select name="comp_local_name" id="comp_local_name" required="required">
									<option value="NULL" selected="1">Select City</option>
									<option value="L.B.NAGAR" >L.B.Nagar</option>
									<option value="BADANGPET" >Badangpet</option>
									<option value="R.N.REDDY" >R.N.Reddy</option>
									<option value="MEERPET" >Meerpet</option>
									<option value="ALMASGUDA" >Almasguda</option>
									<option value="BALAPUR" >Balapur</option>
								</td>
							</tr>
							<tr>
								<td><b style="font-size:150%;">Company Address : </b></td>
								<td><label><textarea cols="32" rows="3" name="comp_address" id="comp_address" required="required"/></textarea>
								</label></td>
							</tr>
							<tr>
								<td><b style="font-size:150%;">Company Photo : </b></td>
								<td><input type="file" name="comp_image" id="comp_image" required="required"></td>
							</tr>
							<tr>
								<td><b style="font-size:150%;">Minimum Price</b></td>
								<td><label><input type="text" name="comp_min_price" id="comp_max_price" required="required" size="30%"/>
								</label></td>
							</tr>
							<tr>
								<td><b style="font-size:150%;">Maximum Price</b></td>
								<td><label><input type="text" name="comp_max_price" id="comp_max_price" required="required" size="30%"/>
								</label></td>
							</tr>
							<tr>
								<td><b style="font-size:150%;">Price Per (For What ?)</b></td>
								<td><label><input type="text" name="comp_price_per" id="comp_price_per" required="required" size="30%"/>
								</label></td>
							</tr>
							<tr >
								<td align="center" colspan="2"><center><input class="button" style="background-color:black;color:white;" type="submit" name="create" id="create" value="Create"/></center></td>
							</tr>
						</table>
					</form>
					
					<?php
                    include("connect.php");

                    if(isset($_POST['create']))
                    {
	                    $service_id = $mysqli->real_escape_string($_POST['service_id']);
	                    $comp_name = $mysqli->real_escape_string($_POST['comp_name']);
						$comp_email = $mysqli->real_escape_string($_POST['comp_email']);
	                    $comp_contact = $mysqli->real_escape_string($_POST['comp_contact']);
	                    $comp_state = $mysqli->real_escape_string($_POST['comp_state']);
	                    $comp_city = $mysqli->real_escape_string($_POST['comp_city']);
						$comp_local_name = $mysqli->real_escape_string($_POST['comp_local_name']);
						$comp_address = $mysqli->real_escape_string($_POST['comp_address']);
						$comp_image = $_FILES['comp_image']['name'];
	                    $image_tmp = $_FILES['comp_image']['tmp_name'];
						$comp_min_price = $mysqli->real_escape_string($_POST['comp_min_price']);
						$comp_max_price = $mysqli->real_escape_string($_POST['comp_max_price']);
	                    $comp_price_per = $mysqli->real_escape_string($_POST['comp_price_per']);
	   
	                    move_uploaded_file($image_tmp,"company_images/$comp_image"); 
						
						$insert = "insert into company (service_id,comp_name,comp_email,comp_contact,comp_state,comp_city,comp_local_name,comp_address,comp_image,comp_min_price,comp_max_price,comp_price_per)
									values('$service_id','$comp_name','$comp_email','$comp_contact','$comp_state','$comp_city','$comp_local_name','$comp_address','$comp_image','$comp_min_price','$comp_max_price','$comp_price_per')";
	                    $run_insert = mysqli_query($mysqli,$insert);
		   
		                if($run_insert)
		                {
			                echo "<script>alert('Successfully Created Company Account')</script>";
			                echo "<script>window.open('index.php','_self')</script>";
			            }
						else
						{
			                echo "<script>alert('Something Went Wrong!')</script>";
			                echo "<script>window.open('index.php','_self')</script>";
			            }
					}						
                    ?>					
			    </li>
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