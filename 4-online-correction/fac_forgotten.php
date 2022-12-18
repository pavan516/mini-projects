<?php
session_start();
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Online Correction</title>
<link rel="icon" type="image/png" href="css/logoup.png"/>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="css/style.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.4.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script type="text/javascript" src="js/script.js" /></script>

<style>
img {
    border-radius: 8px;
	max-width:100%;
}
</style>

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
							<a href="#" ><b><strong><span style="color:white;">ONLINE CORRECTION</span></a> 
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




<div class="min-device">

    <h3 style="margin: 7px 0px 4px 0px;">
	    <a href="#" ><span style="color:white;">&nbsp&nbspOUR MEDIA</span></a>
		<span class="pull-right"><i class="fa fa-bars" onClick="$('.catebar').slideToggle();"></i></span>
	</h3>
	
    
    <div class="catebar">
        <div class="container">
            <div class="row">
                <ul>
				    
                </ul>
            </div>
        </div>
    </div>
</div>

</header>

<div class="content">
    <div class="container">
        <div class="row">
	        
					
		    <div class="col-md-12"><br><br>
		        <div class="box shadow postblock">
				
					<center><h2 style="color:purple;">Facualty Password Forgotten Form</h2></center><hr>
					
					    <form action="" method="post" enctype="multipart/form-data">
						
                            <div class="form-group">
                                <label class="control-label" for="input-email">E-Mail</label>
								<input type="email" name="fac_email" id="fac_email" placeholder="E-Mail" required="required" class="form-control">
						    </div>
							
                            <div class="form-group">
                                <label class="control-label" for="input-password">Contact</label>
                                <input type="text" name="fac_contact" id="fac_contact" placeholder="Facualty Contact" required="required" class="form-control">
							</div>
							
														
                            <center><input type="submit" name="forgotten" value="Submit" class="btn btn-default"></center>
                        
						</form>
						
						<?php
                        include('connect.php');
						
                        if(isset($_POST['forgotten']))
						{

                            $fac_email= $_POST['fac_email'];
							$fac_contact = $_POST['fac_contact'];

                            $query = mysqli_query($mysqli,"SELECT * FROM register WHERE fac_email='$fac_email' AND fac_contact='$fac_contact'");

                            while($row = mysqli_fetch_assoc($query))
                            {
                                $fac_name = $row['fac_name'];
                                $fac_email = $row['fac_email'];
                                $fac_pass = $row['fac_pass'];
                            }

                            $check_user = "select * from register where fac_email='$fac_email' AND fac_contact='$fac_contact'";

                            $run = mysqli_query($mysqli,$check_user);
	                        if(mysqli_num_rows($run)>0)
							{
	
                                if($fac_email==$fac_email)
                                {
									echo "<script>alert('Your Password Is Sended To ".$fac_email."')</script>";									
									$from = "From: en.pavankumar@gmail.com";
		                            $to = $fac_email;
		                            $subject = "Login Information";
         
		                            $body = "Your Email is ".$fac_email." and your Password is ".$fac_pass."";
                                             
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