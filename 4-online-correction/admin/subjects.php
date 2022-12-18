<?php include('includes/header.php'); ?>

<div class="content">
    <div class="container">
        <div class="row">
		
	        			
			<div class="col-md-12"><br>
		    
				<div class="box shadow postblock">
				
				    <div class="box shadow postblock">
						<center><b style="color:green;font-size:150%">Subjects Entry Form</b></center>
					</div>
								
					<form action="" method="post" enctype="multipart/form-data">
						
						<table>
							<tr>
								<td>1</td>							
								<td>Semister / Year</td>
								<td><span><select aria-label="stu_year" name="stu_year" id="stu_year" class="form-control">
							
							    <option value="NULL" selected="1">Semister</option>
								<option value="1-1" >1-1</option>
								<option value="1-2">1-2</option>
								<option value="2-1">2-1</option>
								<option value="2-2">2-2</option>
								<option value="3-1">3-1</option>
								<option value="3-2">3-2</option>
								<option value="4-1">4-1</option>
								<option value="4-2">4-2</option>
						
							    </select></td>								
						    </tr>
						    <tr>
							    <td>2</td>
								<td>Department</td>
							    <td><span><select aria-label="stu_department" name="stu_department" id="stu_department" class="form-control">
							
							    <option value="NULL" selected="1">Department</option>
								<option value="CSE">C.S.E</option>
								<option value="ECE">E.C.E</option>
								<option value="EEE">E.E.E</option>
								<option value="IT">I.T</option>
								<option value="CIVIL">CIVIL</option>
								<option value="MECH">MECH</option>
						
							    </select></td>							
							</tr>
							
							<tr>
							    <td>3</td>
								<td>Enter Subjects</td>
								<td><input type="tel" id="stu_subjects" name="stu_subjects" placeholder="Enter Subject Name" required="required" class="form-control"/></td>
							</tr>
							
						</table>
						
						<br><center><input style="background-color:lightblue;" type="submit" name="subject" id="subject" value="SUBMIT" ></center>
						
					</form>
					
					
					<?php
                            include("connect.php");
							
                            if(isset($_POST['subject']))
                            {
	                            $stu_year = $_POST['stu_year'];
								$stu_department = $_POST['stu_department'];
								$stu_subjects = $_POST['stu_subjects'];
								
	                            
	
	                            if($stu_department=='NULL' OR $stu_year=='NULL')
	                            {
		                            echo "<script>alert('Please Fill All The Details!')</script>";
		                            exit();
	                            }
	                            else
	                            {
		                            $insert_posts = "insert into subjects (stu_year,stu_department,stu_subjects)
                                    values ('$stu_year','$stu_department','$stu_subjects')";
		  
	                                if(mysqli_query($mysqli,$insert_posts))
	                                {
	                                    echo "<script>alert('Subject Names Are Created Successfully')</script>";
										echo "<script>window.open('subjects.php','_self')</script>";
   	                                }
	                            }
                            }
                            ?>				
						
					
                </div>
				
				
				<div class="box shadow postblock">
				
				    <div class="box shadow postblock">
				        <center><b style="color:green;font-size:150%">Total Subjects</b></center>
					</div>
					
					<table>
						<tr>
							<th>SEMISTER/YEAR</th>							
							<th>DEPAERTMENT</th>
							<th>SUBJECTS</th>
						    <th>DELETE</th>
						</tr>
					
					<?php
					include('connect.php');
					
					$query = mysqli_query($mysqli,"SELECT * FROM subjects");
					while($row = mysqli_fetch_array($query))
					{
						$stu_year = $row['stu_year'];
						$stu_department = $row['stu_department'];	
					    $stu_subjects = $row['stu_subjects'];
					
					    echo    "<tr>
						            <td>$stu_year</td>
									<td>$stu_department</td>
									<td>$stu_subjects</td>
									<td><button><a href='delete_subjects.php?stu_subjects=$stu_subjects' >Delete</a></button></td>
							    </tr>";
					
					}
					?><?php include('delete_subjects.php'); ?>
					
				    							
						    
							
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
