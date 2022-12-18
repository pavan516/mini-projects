<?php
session_start();
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>

<title>Online Correction</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="css/style.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.4.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script type="text/javascript" src="js/script.js" /></script>

</head>
<body>
<header>
	
	<div class="max-device">
		<div class="container">
			<div class="row">
	  
				<div class="col-md-7">
					<div style="display: inline-block; width: 100%; margin: 2px 0px 5px 0;">			
						<div class="col-xs-4">
							<div class="row"> 
								<a href="#" ><b><strong><span style="color:white;font-size:150%;">Online Correction</span></strong></b></a> 
							</div>
						</div>                
					</div>
				</div>
		
				<div class="col-md-5" style="text-align:right;">
					<div class="noti-icon">
						
					</div>
                </div>
            </div>
        </div>
	</div>
</div>
</header>

<div class="content">
    <div class="container">
        <div class="row">
	        
			
					
		    <div class="col-md-12"><br>
		        <div class="box shadow postblock">
				
					<center><h2 style="color:purple;">SIGN IN</h2></center><hr>
					
					    <form action="" method="post" enctype="multipart/form-data">
						
                            <div class="form-group">
                                <label class="control-label" for="input-email">E-Mail</label>
								<input type="email" name="admin_email" id="admin_email" placeholder="E-Mail" required="required" class="form-control">
						    </div>
							
                            <div class="form-group">
                                <label class="control-label" for="input-password">Password</label>
                                <input type="password" name="admin_pass" id="admin_pass" data-type="password" placeholder="********" required="required" class="form-control">
							</div>
							
														
                            <center><input type="submit" name="sign_in" value="Login" class="btn btn-default"></center>
                        
						</form>
						
						<?php
                        include("connect.php");

                        if(isset($_POST['sign_in']))
                        {
	   
	                        $admin_email = $mysqli->real_escape_string($_POST['admin_email']);
	                        $admin_pass = $mysqli->real_escape_string($_POST['admin_pass']);
                            							
	                        $get_user = "select * from admin where admin_email='$admin_email' AND admin_pass='$admin_pass'";
	                        $run_user = mysqli_query($mysqli,$get_user);
	                        $check = mysqli_num_rows($run_user);
	   
	                        if($check==1)
	                        {
		                        $_SESSION['admin_email']=$admin_email;
								
								echo "<script>alert('Welcome To Admin Panal')</script>";								
		                        echo "<script>window.open('index.php','_self')</script>";
		                        exit();
								
	                        }
	                        else
	                        {
		                        echo "<script>alert('Your Email Or Password Is Incorrect!')</script>";
			                    echo "<script>window.open('adminlogin.php','_self')</script>";
	                            exit();
	                        }
		             
					    }   

						?>
                        
						<div class="foot" align="right">
						    
							<a style="color:green;" href="adminforgotten.php">Forgotten Password ?</a>
							
						</div>
						
				</div>
            </div>
           
	  
        </div>
    </div>
</div>

<!-- footer section -->

<footer>

    <div class="container">
       
		<div class="col-md-12"><marquee>Latest Part Will Be Displayed Here</marquee></div>

	</div>
	
</footer>

</body>
</html>