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
	        
					
		    <div class="col-md-6"><br><br>
		        <div class="box shadow postblock">
				
					<center><h2 style="color:purple;">Facaulty Sign-In Form</h2></center><hr>
					
					    <form action="" method="post" enctype="multipart/form-data">
						
                            <div class="form-group">
                                <label class="control-label" for="input-email">E-Mail</label>
								<input type="email" name="fac_email" id="fac_email" placeholder="E-Mail" required="required" class="form-control">
						    </div>
							
                            <div class="form-group">
                                <label class="control-label" for="input-password">Password</label>
                                <input type="password" name="fac_pass" id="fac_pass" data-type="password" placeholder="********" required="required" class="form-control">
							</div>
							
														
                            <center><input type="submit" name="sign_in" value="Login" class="btn btn-default"></center>
                        
						</form>
						
						<?php
                        include("connect.php");

                        if(isset($_POST['sign_in']))
                        {
	   
	                        $fac_email = $mysqli->real_escape_string($_POST['fac_email']);
	                        $fac_pass = $mysqli->real_escape_string($_POST['fac_pass']);
                            							
	                        $get_user = "select * from register where fac_email='$fac_email' AND fac_pass='$fac_pass'";
	                        $run_user = mysqli_query($mysqli,$get_user);
	                        $check = mysqli_num_rows($run_user);
	   
	                        if($check==1)
	                        {
		                        $_SESSION['fac_email']=$fac_email;
								
								echo "<script>alert('Welcome To Online Correction')</script>";								
		                        echo "<script>window.open('index.php','_self')</script>";
		                        exit();
								
	                        }
	                        else
	                        {
		                        echo "<script>alert('Your Email Or Password Is Incorrect!')</script>";
			                    echo "<script>window.open('login.php','_self')</script>";
	                            exit();
	                        }
		             
					    }   

						?>
                        
						<div class="foot" align="right">
						    <a style="color:green;font-size:100%" href="fac_check_register.php"><b style="color:red;">Sign Up Here</b></a><b style="color:black;"> | </b>
							<a style="color:green;" href="fac_forgotten.php">Forgotten Password ?</a>							
						</div>
						
				</div>
			</div>
			
			<div class="col-md-6"><br><br>
				<div class="box shadow postblock">
				
					<center><h2 style="color:purple;">Student Sign-In Form</h2></center><hr>
					
					    <form action="" method="post" enctype="multipart/form-data">
						
                            <div class="form-group">
                                <label class="control-label" for="input-email">RollNo</label>
								<input type="text" name="stu_rollno" id="stu_rollno" placeholder="RollNo" required="required" class="form-control">
						    </div>
							
                            <div class="form-group">
                                <label class="control-label" for="input-password">Password</label>
                                <input type="password" name="stu_pass" id="stu_pass" data-type="password" placeholder="********" required="required" class="form-control">
							</div>
							
														
                            <center><input type="submit" name="student" value="Login" class="btn btn-default"></center>
                        
						</form>
						
						<?php
                        include("connect.php");

                        if(isset($_POST['student']))
                        {
	   
	                        $stu_rollno = $mysqli->real_escape_string($_POST['stu_rollno']);
	                        $stu_pass = $mysqli->real_escape_string($_POST['stu_pass']);
                            							
	                        $get_user = "select * from student where stu_rollno='$stu_rollno' AND stu_pass='$stu_pass'";
	                        $run_user = mysqli_query($mysqli,$get_user);
	                        $check = mysqli_num_rows($run_user);
	   
	                        if($check==1)
	                        {
		                        $_SESSION['stu_rollno']=$stu_rollno;
								
								echo "<script>alert('Welcome To Online Internal Results Portal')</script>";								
		                        echo "<script>window.open('student.php','_self')</script>";
		                        exit();
								
	                        }
	                        else
	                        {
		                        echo "<script>alert('Your Email Or Password Is Incorrect!')</script>";
			                    echo "<script>window.open('login.php','_self')</script>";
	                            exit();
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