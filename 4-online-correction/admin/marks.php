<?php
include('includes/header.php');
?>

<div class="content">
    <div class="container">
        <div class="row">
		
	        			
			<div class="col-md-12"><br>
		    
				<div class="box shadow postblock">
				
				
				<table>
					<tr>	
						<td style="color:red;" colspan="11">
							<b><center>Marks List</center></b>
						</td>
					</tr>
					<tr>	
						<td>Roll No</td>
						<td>Name</td>
						<td>Year</td>
						<td>Department</td>
						<td>Section</td>
						<td>Subject</td>
						<td>Facualty Corrected</td>
						<td>Facualty Dept</td>
						<td>Mid Type</td>
						<td>Subjective Marks</td>
						<td>Objective Marks</td>
					</tr>	 
								
				            <?php
							include('connect.php');
							if(isset($_GET['stu_rollno']))
							{
								$stu_rollno = $_GET['stu_rollno'];
								
								$get_post = "select * from marks where stu_rollno='$stu_rollno'";
								$run_post = mysqli_query($mysqli,$get_post);
								$row= mysqli_fetch_array($run_post);
								
								$fac_email = $row['fac_email'];
							    $stu_subject = $row['stu_subject'];
							    $stu_midtype = $row['stu_midtype'];
								$sub_tot_marks = $row['sub_tot_marks'];
								$obj_tot_marks = $row['obj_tot_marks'];
								
								$student = mysqli_query($mysqli,"select * from student where stu_rollno='$stu_rollno'");
								$row= mysqli_fetch_array($student);
								
								$stu_rollno = $row['stu_rollno'];
							    $stu_name = $row['stu_name'];
							    $stu_year = $row['stu_year'];
								$stu_department = $row['stu_department'];
								$stu_section = $row['stu_section'];
								
								
								$facaulty = mysqli_query($mysqli,"select * from register where fac_email='$fac_email'");
								$row= mysqli_fetch_array($facaulty);
								
								$fac_name = $row['fac_name'];
							    $fac_department = $row['fac_department'];
						
										
						echo    "<tr>
									<td>$stu_rollno</td>
									<td>$stu_name</td>
									<td>$stu_year</td>
									<td>$stu_department</td>
									<td>$stu_section</td>
									<td>$stu_subject</td>
									<td>$fac_name</td>
									<td>$fac_department</td>
									<td>$stu_midtype</td>
									<td>$sub_tot_marks</td>
									<td>$obj_tot_marks</td>
									
								</tr>";
						}	?>																
					

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
