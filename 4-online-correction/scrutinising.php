<?php include('includes/header.php'); ?>

<div class="content">
    <div class="container">
        <div class="row">
		
	        <div class="col-md-12"><br>		    
				<div class="box shadow postblock">
				
				    <div class="box shadow postblock">
				        <center><b style="color:green;font-size:100%;">Select "Year-Department-Section" To Re-Upload/Scrutinise</b></center>
                    </div>					
					
					<form action="scrurinising_home.php" method="post" enctype="multipart/form-data">
						
						<table>
						
							<tr>
							
						    <td style="color:black;"><b>Semister</b></td>
							<td><span><select aria-label="stu_year" name="stu_year" id="stu_year" class="_5dba">
							
								<option value="1-1" selected="1">1-1</option>
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
							
							<td style="color:black;"><b>Department</b></td>
							<td><span><select aria-label="stu_department" name="stu_department" id="stu_department" class="_5dba">
							
								<option value="CSE" selected="1">C.S.E</option>
								<option value="ECE">E.C.E</option>
								<option value="EEE">E.E.E</option>
								<option value="IT">I.T</option>
								<option value="CIVIL">CIVIL</option>
								<option value="MECH">MECH</option>
						
							</select></td>
							
							</tr>
							<tr>
							
							<td style="color:black;"><b>Section</b></td>
                            <td align='center' style="color:black;">
                                <input type = "radio" name = "stu_section" value = "A"  checked = "Yes"><b>A</b>
                                <input type = "radio" name = "stu_section" value = "B" ><b>B</b>
								<input type = "radio" name = "stu_section" value = "C" ><b>C</b>
								<input type = "radio" name = "stu_section" value = "D" ><b>D</b>
                            </td>
							
							</tr>
							
						</table><br>
						
						<center><input type="submit" name="submit" value="submit" class="btn btn-default"></center>
                        
					</form>				
						
                </div>							
	        </div>
			
			<!-- next -->
			
			<div class="col-md-12"><br>		    
				<div class="box shadow postblock">
				
					<div class="box shadow postblock">
						<center><h3 style="color:red;">Data Scrutinised By Me</h3></center>
					</div>
					
					<div class="box shadow postblock">
						<h4 style="color:green;">Search For A Student With His RollNo / Search With A Subject U Corrected('uploaded')</h4>
						<form method="get" action="">
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
			
				<?php
				include('connect.php');
					    
				if(isset($_GET['search_query']))
				{
					
					echo 	"<div class='box shadow postblock'>
							
							<table>
								<tr>
									<td colspan='10'><center><b style='color:green;font-size:150%;'>Marks Uploaded By : Me</b></center></td>
								</tr>
					
								<tr>
									<td><b style='color:red;'>Student RollNo</b></td>
									<td><b style='color:red;'>Student Name</b></td>
									<td><b style='color:red;'>Semister</b></td>
									<td><b style='color:red;'>Department</b></td>
									<td><b style='color:red;'>Section</b></td>
									<td><b style='color:red;'>Subject</b></td>
									<td><b style='color:red;'>Type Of Internal</b></td>
									<td><b style='color:red;'>Subjective Marks</b></td>
									<td><b style='color:red;'>Objective Marks</b></td>
									<td><b style='color:red;'>Edit/Update</b></td>
								</tr>";
								
								
												
									$search_query = $_GET['search_query'];
									$fac_email = $_SESSION['fac_email'];
									
									$get_posts = "SELECT * from scrutiniser where fac_email='$fac_email' AND (stu_rollno LIKE '%$search_query%' OR stu_subject LIKE '%$search_query%')";
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
															<td><button><a href='edit_Scrutining_marks.php?stu_rollno=$stu_rollno&stu_midtype=$stu_midtype&stu_subject=$stu_subject' >EDIT</a></button></td>
														</tr>";
												}
											}
										}
									}
				
							
				echo "</table> 
							
						</div>";
				}
				?>
				
		    
				<div class="box shadow postblock">
					
					<table>
						<tr>
							<td colspan="10"><center><b style="color:green;font-size:150%;">Marks Scrutinised By Me</b></center></td>
						</tr>
			
						<tr>
						    <td><b style="color:red;">Student RollNo</b></td>
							<td><b style="color:red;">Student Name</b></td>
							<td><b style="color:red;">Semister</b></td>
							<td><b style="color:red;">Department</b></td>
							<td><b style="color:red;">Section</b></td>
							<td><b style="color:red;">Subject</b></td>
							<td><b style="color:red;">Type Of Internal</b></td>
							<td><b style="color:red;">Subjective Marks</b></td>
							<td><b style="color:red;">Objective Marks</b></td>
							<td><b style="color:red;">Edit/Update</b></td>
						</tr>
						
						<?php
					    include('connect.php');
					
					    $fac_email = $_SESSION['fac_email'];
						$query = mysqli_query($mysqli,"select * from scrutiniser where fac_email='$fac_email'");
						while($row = mysqli_fetch_array($query))
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
								<td><button><a href='edit_Scrutining_marks.php?stu_rollno=$stu_rollno&stu_midtype=$stu_midtype&stu_subject=$stu_subject' >EDIT</a></button></td>
							</tr>";
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
