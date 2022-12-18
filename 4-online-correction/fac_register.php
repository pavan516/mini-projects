<?php
session_start();

if(!isset($_SESSION['password']))
{
	header("location: fac_check_register.php");
}
else
{	
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
				
				
				<center><h2 style="color:purple;">Facaulty Registration Form</h2></center><hr>
				
				    <form action="" method="post" enctype="multipart/form-data">
						
						    <div class="form-group">
                                <label class="control-label" >Name</label>
								<input type="text" name="fac_name" id="fac_name" placeholder="Facualty Name" required="required" class="form-control">
						    </div>
						
						
                            <div class="form-group">
                                <label class="control-label" >E-Mail</label>
								<input type="email" name="fac_email" id="fac_email" placeholder="E-Mail" required="required" class="form-control">
						    </div>
							
                            <div class="form-group">
                                <label class="control-label" >Password</label>
                                <input type="password" name="fac_pass" id="fac_pass" data-type="password" placeholder="********" required="required" class="form-control">
							</div>
							
							<div class="form-group">
							    <label class="control-label" >Department</label>
							<select aria-label="fac_department" name="fac_department" id="fac_department" class="form-control">
							
							    <option value="NULL" selected="1">Department</option>
								<option value="CSE">C.S.E</option>
								<option value="ECE">E.C.E</option>
								<option value="EEE">E.E.E</option>
								<option value="IT">I.T</option>
								<option value="CIVIL">CIVIL</option>
								<option value="MECH">MECH</option>
						
							    </select>
							</div>
							
							<div class="form-group">
                                <label class="control-label" >contact</label>
                                <input type="text" name="fac_contact" id="fac_contact" data-type="password" placeholder="Facualty Contact" required="required" class="form-control">
							</div>
														
							<div class="form-group">
								<label class="control-label" class="form-control">Gender</label>
								<div class="form-control" >
								<input type = "radio" name = "fac_gender" value = "male" checked = "male" required="required">Male
								<input type = "radio" name = "fac_gender" value = "female" requred="required">Female
								<input type = "radio" name = "fac_gender" value = "other" requred="required">Other
								</div>
							</div>
							
														
                            <center><input type="submit" name="register" id="register" value="REGISTER" class="btn btn-default"></center>
                        
						</form>

						<?php
                            include("connect.php");
							
                            if(isset($_POST['register']))
                            {
	                            								
								$fac_name = $_POST['fac_name'];
	                            $fac_email = $_POST['fac_email'];
								$fac_pass = $_POST['fac_pass'];
								$fac_department = $_POST['fac_department'];
	                            $fac_contact = $_POST['fac_contact'];
								$fac_gender = $_POST['fac_gender'];
								
	                            if($stu_section=='NULL' OR $stu_department=='NULL' OR $stu_year=='NULL')
	                            {
		                            echo "<script>alert('Please Fill All The Details!')</script>";
		                            exit();
	                            }
	                            else
	                            {
		                            $insert_posts = "insert into register (fac_name,fac_email,fac_pass,fac_department,fac_contact,fac_image,fac_gender)
                                    values ('$fac_name','$fac_email ','$fac_pass','$fac_department','$fac_contact','default.jpg','$fac_gender')";
		  
	                                if(mysqli_query($mysqli,$insert_posts))
	                                {
	                                    echo "<script>alert('Successfully Created Your Account!')</script>";
										echo "<script>window.open('login.php','_self')</script>";
   	                                }
									else
									{
										echo "<script>alert('Student Account Created Successfully!')</script>";
										echo "<script>window.open('fac_register.php','_self')</script>";
									}
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
<?php } ?>