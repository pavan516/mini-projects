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
				
					<?php
					include("connect.php");
					
					$stu_rollno = $_SESSION['stu_rollno'];
					
					$get_posts = "SELECT * from student where stu_rollno='$stu_rollno'";
					$run_posts = mysqli_query($mysqli,$get_posts);
					$row_posts = mysqli_fetch_array($run_posts);
					
						$stu_rollno = $row_posts['stu_rollno'];
						$stu_name = $row_posts['stu_name'];
						$stu_email = $row_posts['stu_email'];
						$stu_contact = $row_posts['stu_contact'];
						$stu_image = $row_posts['stu_image'];
						$stu_pass = $row_posts['stu_pass'];
						$stu_year = $row_posts['stu_year'];
						$stu_department = $row_posts['stu_department'];
						$stu_section = $row_posts['stu_section'];
						
																						
						echo    "<table>
									<tr>	
										<td style='color:red;' colspan='11'>
											<b><center>My Profile</center></b>
										</td>
									</tr>
									<tr>	
										<th>Roll No</th>
										<td colspan='2'>$stu_rollno</td>
									</tr>
									<tr>
										<th>Name</th>
										<td colspan='2'>$stu_name</td>
									</tr>
									<tr>
										<th>Email</th>
										<td colspan='2'>$stu_email</td>
									</tr>
									<tr>
										<th>Contact</th>
										<td colspan='2'>$stu_contact</td>
									</tr>
									<tr>
										<th>Year</th>
										<td colspan='2'>$stu_year</td>
									</tr>
									<tr>
										<th>Department</th>
										<td colspan='2'>$stu_department</td>
									</tr>
									<tr>
										<th>Section</th>
										<td colspan='2'>$stu_section</td>
									</tr>
									<tr>
										<th>Image</th>
										<td colspan='2'><img src='admin/stu_images/$stu_image' width='100' height='100'</td>
									</tr>
									<tr>
										<th>Password</th>
										<td>$stu_pass</td>
										<td><button><a href='edit_password.php'>EDIT PASSWORD</a></button></td>
									</tr>
																		
								</table>";
								
					?>
					
					<table>
						<tr>	
							<td style='color:red;' colspan='11'>
								<b><center>My Academic Marks</center></b>
							</td>
						</tr>
						<tr>	
							<td><b>Semister</b></td>
							<td><b>Type Of Internal</b></td>
							<td><b>Subject</b></td>
							<td><b>Facualty</b></td>
							<td><b>Facualty From</b></td>
							<td><b>Subjective Marks</b></td>
							<td><b>Objective Marks</b></td>
							<td><b>Total Marks</b></td>
						</tr>					
				
				    <?php
					include("connect.php");
					
					$stu_rollno = $_SESSION['stu_rollno'];
					
					$get_posts = "SELECT * from student where stu_rollno='$stu_rollno'";
					$run_posts = mysqli_query($mysqli,$get_posts);
					while($row_posts = mysqli_fetch_array($run_posts))
					{
						$stu_rollno = $row_posts['stu_rollno'];
						$stu_name = $row_posts['stu_name'];
						$stu_email = $row_posts['stu_email'];
						$stu_contact = $row_posts['stu_contact'];
						$stu_image = $row_posts['stu_image'];
						$stu_pass = $row_posts['stu_pass'];
						
						$marks = "SELECT * from marks where stu_rollno='$stu_rollno'";
						$marks_posts = mysqli_query($mysqli,$marks);
						while($row = mysqli_fetch_array($marks_posts))
						{
						$fac_email = $row['fac_email'];
						$stu_rollno = $row['stu_rollno'];
						$stu_subject = $row['stu_subject'];
						$stu_midtype = $row['stu_midtype'];
						$sub_tot_marks = $row['sub_tot_marks'];
						$obj_tot_marks = $row['obj_tot_marks'];
						$stu_year = $row['stu_year'];
						$stu_department = $row['stu_department'];
						$stu_section = $row['stu_section'];
						$total = $sub_tot_marks + $obj_tot_marks;
						
						$facualty = "SELECT * from register where fac_email='$fac_email'";
						$facualty_posts = mysqli_query($mysqli,$facualty);
						while($row = mysqli_fetch_array($facualty_posts))
						{
						$fac_name = $row['fac_name'];
						$fac_department = $row['fac_department'];
																
						echo    "<tr>	
									<td>$stu_year</td>
									<td>$stu_midtype</td>
									<td>$stu_subject</td>
									<td>$fac_name</td>
									<td>$fac_department Department</td>
									<td>$sub_tot_marks</td>
									<td>$obj_tot_marks</td>
									<td>$total</td>
								</tr>
								";	?>
					<?php } ?>		
                    <?php } ?>					
					<?php } ?>
				</table>
				
					
                        						
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