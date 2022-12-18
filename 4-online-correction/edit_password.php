<?php
session_start();
if(!isset($_SESSION['stu_rollno']))
{
	header("location: login.php");
}
else
{	
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

<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 3px solid #dddddd;
    text-align: left;
    padding: 8px;
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
								<a href="#" ><b><strong><span style="color:white;font-size:150%;">Online Correction</span></strong></b></a> 
							</div>
						</div>                
					</div>
				</div>
		
				<div class="col-md-5" style="text-align:right;">
					<div class="noti-icon">
						<a href="student_logout.php">LOGOUT</a>
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
				
				    <center><h3 style="color:purple;">Change Your Password</h3></center>
					
					    <div class="box shadow postblock">
						
					    <form action="" method="post" enctype="multipart/form-data">

						    <div class="form-group">
                                <label class="control-label" >RollNo</label>
								<input type="text" name="stu_rollno" placeholder="RollNo" required="required" class="form-control">
						    </div>
							
                            <div class="form-group">
                                <label class="control-label" >Old Password</label>
                                <input type="password" name="stu_pass" placeholder="Old password" required="required" class="form-control">
							</div>
							
							<div class="form-group">
                                <label class="control-label" for="input-password">New Password</label>
                                <input type="text" name="newpass" placeholder="New password" required="required" class="form-control">
							</div>
							
							<div class="form-group">
                                <label class="control-label" >Confirm New Password</label>
                                <input type="text" name="confirmpass" placeholder="confirm password" required="required" class="form-control">
							</div>
							
							<center><input style="background-color:purple;color:white;" type="submit" name="change" value="Change Password" class="btn btn-default"></center>
                        
						</form>
						<?php
								include("connect.php");
								
								$stu_rollno = $_SESSION['stu_rollno'];
								$get_user = "select * from student where stu_rollno='$stu_rollno'";
								$run_user = mysqli_query($mysqli,$get_user);
								$row = mysqli_fetch_array($run_user);
								
								
								$stu_rollno = $row['stu_rollno'];
								
								
						    ?>
						<?php
                        include('connect.php');
                        if(isset($_POST['change']))
                        {
                            $stu_rollno = $_POST['stu_rollno'];
		                    $stu_pass = $_POST['stu_pass'];
                            $newpass = $_POST['newpass'];
							$confirmpass = $_POST['confirmpass'];
        	
                            $result = mysqli_query($mysqli,"SELECT * FROM student WHERE stu_rollno='$stu_rollno'");
							if(mysqli_num_rows($result)>0)
							{
							 	while($row = mysqli_fetch_array($result))
							    {
								    $user_pass = $row['stu_pass'];
								}	
									if($user_pass == $stu_pass)
									{
										if($newpass==$confirmpass)
		                                {
								            $sql=mysqli_query($mysqli,"UPDATE student SET stu_pass='$newpass' where stu_rollno='$stu_rollno'");
                                            if($sql)
                                            {
                                                echo "<script>alert('Congratulations You have successfully changed your password')</script>";
                                            }
											
										}
										else if($newpass!=$confirmpass)
										{
											echo "<script>alert('Password Mismatch!')</script>";
										}
									}
									else if ($user_pass!= $pass)
									{
										echo "<script>alert('Old Password Is Wrong!')</script>";
									}
							}	
	                        else 
							{
								echo "<script>alert('Email Does Not Exist!')</script>";
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

				    
					    
						
				       