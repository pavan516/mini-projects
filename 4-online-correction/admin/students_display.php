<?php include('includes/header.php'); ?>

<div class="content">
    <div class="container">
        <div class="row">
		
	        			
			<div class="col-md-12"><br>
		    
				<div class="box shadow postblock">
				
				<div class="box shadow postblock">
				    <h4 style="color:green;">Search For A Student With His RollNo Or With His Name</h4>
				    <form method="get" action="search.php">
					    <table>
						    <tr>
								<td><input type="search" name="search_query" id="search_query" class="form-control" placeholder="Search For A Student"></td>
							</tr>
						</table>   
					</form>
				</div>
				
				<?php
				include("connect.php");
				if(isset($_POST['submit']))
				{
											
					$stu_year = $_POST['stu_year'];
					$stu_department = $_POST['stu_department']; ?>
					
					<table>
					<tr>	
						<td style="color:red;" colspan="11">
							<b><center><?php echo "$stu_year - $stu_department"; ?></center></b>
						</td>
					</tr>
					<tr>	
						<td>Roll No</td>
						<td>Name</td>
						<td>Email</td>
						<td>Contact</td>
						<td>Year</td>
						<td>Department</td>
						<td>Section</td>
						<td>Image</td>
						<td>Password</td>
						<td>Update/edit</td>
						<td>Marks</td>
					</tr>	
									 
					<?php
					include("connect.php");
														
					$get_posts = "SELECT * from student where stu_year='$stu_year' AND stu_department='$stu_department'";
															
					$run_posts = mysqli_query($mysqli,$get_posts);
					$count = mysqli_num_rows($run_posts);
					if($count==0)
					{
						echo "<tr><td colspan='11'><center><b>No Data</b></center></td></tr>";
					}
					else
					{				
					while ($row_posts = mysqli_fetch_array($run_posts))
					{
						$stu_rollno = $row_posts['stu_rollno'];
						$stu_name = $row_posts['stu_name'];
						$stu_email = $row_posts['stu_email'];
						$stu_contact = $row_posts['stu_contact'];
						$stu_year = $row_posts['stu_year'];
						$stu_department = $row_posts['stu_department'];
						$stu_section = $row_posts['stu_section'];
						$stu_image = $row_posts['stu_image'];
						$stu_pass = $row_posts['stu_pass'];
										
						echo    "<tr>
									<td>$stu_rollno</td>
									<td>$stu_name</td>
									<td>$stu_email</td>
									<td>$stu_contact</td>
									<td>$stu_year</td>
									<td>$stu_department</td>
									<td>$stu_section</td>
									<td><img src='stu_images/$stu_image' width='20' height='20'</td>
									<td>$stu_pass</td>
									<td><button><a href='edit_student.php?stu_rollno=$stu_rollno'>EDIT</a></button></td>
									<td><button><a href='marks.php?stu_rollno=$stu_rollno'>MARKS</a></button></td>
								</tr>";
																							
					}
					}
				}?>	

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
