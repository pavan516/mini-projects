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
	        
			
					
		    <div class="col-md-12">
		        <div class="box shadow postblock">
				
					<center><h2 style="color:purple;">SIGN IN</h2></center><hr>
					
					    <form action="" method="post" enctype="multipart/form-data">
						
                            <div class="form-group">
                                <label class="control-label" for="input-email">E-Mail</label>
								<input type="email" name="admin_email" id="admin_email" placeholder="E-Mail" required="required" class="form-control">
						    </div>
														
                            <center><input type="submit" name="forgotten" value="Submit" class="btn btn-default"></center>
                        
						</form>
						
												
						<?php
                        include('connect.php');
						
                        if(isset($_POST['forgotten']))
						{

                            $admin_email= $_POST['admin_email'];
							

                            $query = mysqli_query($mysqli,"SELECT * FROM admin WHERE admin_email='$admin_email'");

                            while($row = mysqli_fetch_assoc($query))
                            {
                                $admin_email = $row['admin_email'];
                                $admin_pass = $row['admin_pass'];
                            }

                            $check_user = "select * from admin where admin_email='$admin_email'";

                            $run = mysqli_query($mysqli,$check_user);
	                        if(mysqli_num_rows($run)>0)
							{
	
	                            
                                if($admin_email==$admin_email)
                                {
									echo "<script>alert('Your Password Is Sended To ".$admin_email."')</script>";									
									$from = "From: en.pavankumar@gmail.com";
		                            $to = $admin_email;
		                            $subject = "Login Information";
         
		                            $body = "Your Email is ".$admin_email." and your Password is ".$admin_pass."";
                                             
                                    mail($to, $subject, $body, $from);
		                            echo "<script>window.open('adminlogin.php','_self')</script>";
                                }
                            }
                            else
                            {
                                echo "<script>alert('Incorrect Email ')</script>";
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