<?php
session_start();
?>
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

<body><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
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
				
				<!-- forgot code -->
				
					<form action="" method="post">
					
						<div class="formblock">
							<label>User Email</label>
							<input name="user_email" id="user_email" type="text" class="textfields" />
						</div>
						
						<div class="formblock">
							<label>User Contact</label>
							<input name="user_contact" id="user_contact" type="text" class="textfields"/>
						</div>
						<br>
						<div class="formblock">
							<button><button><input type="submit" name="forgot" id="forgot" value="Submit" /></button></button>
						</div>
						
                    </form>
					
											
						 
					<?php
                        include('connect.php');
						
                        if(isset($_POST['forgot']))
						{

                            $email= $_POST['user_email'];
							$contact = $_POST['user_contact'];

                            $query = mysqli_query($mysqli,"SELECT * FROM users WHERE user_email='$email' AND user_contact='$contact'");

                            while($row = mysqli_fetch_assoc($query))
                            {
                                $name = $row['user_name'];
                                $email = $row['user_email'];
                                $pass = $row['user_pass'];
                            }

                            $check_user = "select * from users where user_email='$email' AND user_contact='$contact'";

                            $run = mysqli_query($mysqli,$check_user);
	                        if(mysqli_num_rows($run)>0)
							{
	
	                            if($email==$email)
                                {
									echo "<script>alert('Your Password Is Sended To ".$email."')</script>";									
									$from = "From: en.pavankumar@gmail.com";
		                            $to = $email;
		                            $subject = "Login Information";
         
		                            $body = "Your Email is ".$email." and your Password is ".$pass."";
                                             
                                    mail($to, $subject, $body, $from);
		                            echo "<script>window.open('login.php','_self')</script>";
                                }
                            }
                            else
                            {
                                echo "<script>alert('Incorrect Email / Contact No')</script>";
                            }
                        }
                        

                        ?>
				
				<!-- End forgot pass -->
				
				</div>
			</div>
		</div>
	</div>
	
	<!-- End Of Logo And login -->
		
	
	
</div>
</body>
</html>