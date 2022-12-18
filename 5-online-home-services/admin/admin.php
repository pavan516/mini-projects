<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Online Home Service</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/layout.css" rel="stylesheet" type="text/css" />
<link href="css/forms.css" rel="stylesheet" type="text/css" />
<script src="js/jquery-1.1.3.1.pack.js" type="text/javascript"></script>
<link rel="stylesheet" href="js/jquery.tabs.css" type="text/css" media="print, projection, screen">
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

<body><br><br><br><br>
<div id="wrap">

	<!-- Logo And login -->

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
				<h2>
					<img src="images/create_indi_usr.jpg" alt="" width="25" height="22" />
					<a href="#">User Account Login</a> 
				</h2>
			</div>
			<div id="login">
				<div id="loginform">
				
					<form action="" method="post">
					
						<div class="formblock">
							<label>User Email</label>
							<input name="user_email" id="user_email" type="text" class="textfields" />
						</div>
						
						<div class="formblock">
							<label>User Password</label>
							<input name="user_pass" id="user_pass" type="text" class="textfields"/>
						</div>
						<br>
						<div class="formblock">
							<button><button><input type="submit" name="login" id="login" value="Login" /></button></button>
						</div>
						
                    </form>
					
						<b>Register Below</b>
						<div class="formblock">
							<a href="forgot.php">Forgotten password ?</a> 
						</div>					
						 
					<?php
                        include("connect.php");

                        if(isset($_POST['login']))
                        {
	   
	                        $user_email = $mysqli->real_escape_string($_POST['user_email']);
	                        $user_pass = $mysqli->real_escape_string($_POST['user_pass']);
                            							
	                        $get_user = "select * from users where user_email='$user_email' AND user_pass='$user_pass'";
	                        $run_user = mysqli_query($mysqli,$get_user);
	                        $check = mysqli_num_rows($run_user);
	   
	                        if($check==1)
	                        {
		                        $_SESSION['user_email']=$user_email;
								
								echo "<script>alert('Welcome To Online Home Service')</script>";								
		                        echo "<script>window.open('home.php','_self')</script>";
		                        exit();
								
	                        }
	                        else
	                        {
		                        echo "<script>alert('Your Email Or Password Is Incorrect!')</script>";
			                    echo "<script>window.open('index.php','_self')</script>";
	                            exit();
	                        }
		             
					    }   

						?>
						
				</div>
			</div>
		</div>
	</div>
	
	<!-- End Of Logo And login -->
	
	<!-- marquee -->
	<div >
		<h2><marquee>Need To Register And Login To Access Anything!</marquee></h2>		
    </div>
	<!-- marquee -->
	
	<!-- Category List -->
	
	<div id="topcategorieslink" class="clear">
		<h2>Categories</h2>
		<ul>
			<?php 
			include('connect.php');
			$query = mysqli_query($mysqli,"select * from services");
			while($row=mysqli_fetch_array($query))
			{
				$service_id = $row['service_id'];
				$service_title = $row['service_title'];
				
				echo "<li><a href='service.php?service_id=$service_id'>&nbsp&nbsp $service_title &nbsp&nbsp</a></li>";
			}?>
		</ul>
    </div>
	
	<!-- End Of Category List -->
	
	<div id="content">
	
		<!-- User Registration Form -->
	
		<div id="home_main">
			<div id="search">
				<div class="tab">
					<h2><center>User Registration Form </center></h2>
				</div>
				<div class="container">
					<form action="" method="post">
						<table>
							<tr>
								<td><b style="font-size:150%;">Name : </b></td>
								<td><label><input type="text" name="user_name" id="user_name" required="required"/>
								</label></td>
							</tr>
							<tr>
								<td><b style="font-size:150%;">Email : </b></td>
								<td><label><input type="text" name="user_email" id="user_email" required="required"/>
								</label></td>
							</tr>
							<tr>
								<td><b style="font-size:150%;">Password : </b></td>
								<td><label><input type="password" name="user_pass" id="user_pass" required="required"/>
								</label></td>
							</tr>
							<tr>
								<td><b style="font-size:150%;">Contact : </b></td>
								<td><label><input type="text" name="user_contact" id="user_contact" required="required"/>
								</label></td>
							</tr>
							<tr>
								<td><b style="font-size:150%;">State : </b></td>
								<td><label><input type="text" name="user_state" id="user_state" required="required"/>
								</label></td>
							</tr>
							<tr>
								<td><b style="font-size:150%;">City : </b></td>
								<td><label><input type="text" name="user_city" id="user_city" required="required"/>
								</label></td>
							</tr>
							<tr>
								<td><b style="font-size:150%;">Local Area : </b></td>
								<td><label><input type="text" name="user_local_name" id="user_local_name" required="required"/>
								</label></td>
							</tr>
							<tr >
								<td align="center" colspan="2"><center><input class="button" style="background-color:black;color:white;" type="submit" name="register" id="register" value="Register"/></center></td>
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
	
		<!-- Ads -->
		
	    <div id="sidebar">
			<div class="block advert"><a href="https://www.matrimony.com/"><img src="a (1).jpg" alt="" width="380" height="150"/></a></div>      
			<div class="block"><a href="https://www.matrimony.com/"><img src="a (2).jpg" width="380" height="150"/></a></div>
			<div class="block"><a href="https://www.matrimony.com/"><img src="a (3).jpg" width="380" height="150"/></a></div>
			<div class="block"><a href="https://www.flipkart.com/"><img src="images.jpg" width="380" height="150"/></a></div>
			<div class="block"><a href="https://www.flipkart.com/"><img src="image.jpg" width="380" height="150"/></a></div>
		</div>
		<div class="clear">&nbsp;</div>
		
		<!-- End Of Ads -->
		
	</div>
	
	<!-- Footer -->
	
	
	
	
	<!-- End Of Footer -->
	
</div>
</body>
</html>