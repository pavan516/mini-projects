<?php include('includes/header.php'); ?>

<div class="content">
    <div class="container">
        <div class="row">
		
					
			<div class="col-md-12">
		    
				<div class="box shadow postblock">
				
				<div class="box shadow postblock">
				    <h4 style="color:green;">Search For A Student With His RollNo Or With His Name</h4>
				    <form method="get" action="search_student.php">
					    <table>
						    <tr>
								<td><input type="text" name="search_query" id="search_query" class="form-control" placeholder="Search For A Student"></td>
							</tr>
						</table>   
					</form>
				</div>
				
				</div>
				
			</div>
			
	        <div class="col-md-12">
		    
				<div class="box shadow postblock">
					
					<table>
						<tr>
							<td colspan="10"><center><b style="color:green;font-size:150%;">Marks Uploaded By : Me</b></center></td>
						</tr>
			
						<tr>
						    <td><b>Student RollNo</b></td>
							<td><b>Student Name</b></td>
							<td><b>Semister</b></td>
							<td><b>Department</b></td>
							<td><b>Section</b></td>
							<td><b>Subject</b></td>
							<td><b>Type Of Internal</b></td>
							<td><b>Subjective Marks</b></td>
							<td><b>Objective Marks</b></td>
							<td><b>Edit/Update</b></td>
						</tr>
						
						<?php
					    include('connect.php');
					    
						if(isset($_GET['search_query']))
						{
										
							$search_query = $_GET['search_query'];
					        $fac_email = $_SESSION['fac_email'];
							
							$get_posts = "SELECT * from marks where fac_email='$fac_email' AND (stu_rollno LIKE '%$search_query%' OR stu_subject LIKE '%$search_query%')";
							$run_posts = mysqli_query($mysqli,$get_posts);
							
							$count = mysqli_num_rows($run_posts);
					
							if($count==0)
							{
								echo "<tr><td colspan='11'><center><b>No Data</b></center></td></tr>";
							}
							else
							{								
								while($row = mysqli_fetch_array($run_posts))
								{					
									$fac_email = $row['fac_email'];								
									$stu_rollno = $row['stu_rollno'];
									$stu_subject = $row['stu_subject'];
									$stu_midtype = $row['stu_midtype'];
									$sub_tot_marks = $row['sub_tot_marks'];
									$obj_tot_marks = $row['obj_tot_marks'];
			
									$facualty = mysqli_query($mysqli,"SELECT * FROM register where fac_email='$fac_email'");
									while($row = mysqli_fetch_array($facualty))
									{
			
										$fac_name = $row['fac_name'];
									
										$student = mysqli_query($mysqli,"SELECT * FROM student where stu_rollno='$stu_rollno'");
										while($row = mysqli_fetch_array($student))
										{
											$stu_name = $row['stu_name'];
											$stu_year = $row['stu_year'];
											$stu_department = $row['stu_department'];
											$stu_section = $row['stu_section'];
					        
											echo    
												"<tr>
													<td>$stu_rollno</td>
													<td>$stu_name</td>
													<td>$stu_year</td>
													<td>$stu_department</td>
													<td>$stu_section</td>
													<td>$stu_subject</td>
													<td>$stu_midtype</td>
													<td>$sub_tot_marks</td>
													<td>$obj_tot_marks</td>
													<td><button><a href='edit_marks.php?stu_rollno=$stu_rollno&stu_midtype=$stu_midtype&stu_subject=$stu_subject' >EDIT</a></button></td>
												</tr>";
										}
									}
								}
							}
						}
						?>
					
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
