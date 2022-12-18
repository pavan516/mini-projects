<?php
include('includes/header.php');
?>

<div class="content">
    <div class="container">
        <div class="row">
		
	        			
			<div class="col-md-12"><br>
		    
				<div class="box shadow postblock">
				
				    <div class="box shadow postblock">
						<center><b style="color:green;font-size:150%">Student Entry Form</b></center>
					</div>
					
					        <?php
							include('connect.php');
							if(isset($_GET['stu_rollno']))
							{
								$stu_rollno = $_GET['stu_rollno'];
								
								$get_post = "select * from student where stu_rollno='$stu_rollno'";
								$run_post = mysqli_query($mysqli,$get_post);
								$row= mysqli_fetch_array($run_post);
								
								$stu_rollno = $row['stu_rollno'];
							    $stu_name = $row['stu_name'];
							    $stu_email = $row['stu_email'];
								$stu_contact = $row['stu_contact'];
								$stu_year = $row['stu_year'];
								$stu_department = $row['stu_department'];
								$stu_section = $row['stu_section'];
								$stu_image = $row['stu_image'];
								$stu_pass = $row['stu_pass'];
							}
						    ?>
								
					<form action="" method="post" enctype="multipart/form-data">
						
						<table>
							<tr>
							    <td>1</td>
								<td>STUDENT ROLLNO (In Capital Letters (ex : 14R91A0516))</td>
								<td><input type="text" id="stu_rollno" name="stu_rollno" value="<?php echo "$stu_rollno"; ?>" class="form-control"/></td>
							</tr>	
							<tr>
							    <td>2</td>
								<td>STUDENT NAME</td>
								<td><input type="text" id="stu_name" name="stu_name" value="<?php echo "$stu_name"; ?>" class="form-control"/></td>
							</tr>
							<tr>
							    <td>3</td>
								<td>STUDENT E-MAIL</td>
								<td><input type="email" id="stu_email" name="stu_email" value="<?php echo "$stu_email"; ?>" class="form-control"/></td>
							</tr>
							<tr>
							    <td>4</td>
								<td>STUDENT CONTACT</td>
								<td><input type="tel" id="stu_contact" name="stu_contact" value="<?php echo "$stu_contact"; ?>" class="form-control"/></td>
							</tr>
							<tr>
								<td>5</td>							
								<td>Semister</td>
								<td><span><select aria-label="stu_year" name="stu_year" id="stu_year" class="form-control">
							
							    <option value="<?php echo "$stu_year"; ?>" selected="1"><?php echo "$stu_year"; ?></option>
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
							    <td>6</td>
								<td>Department</td>
							    <td><span><select aria-label="stu_department" name="stu_department" id="stu_department" class="form-control">
							
							    <option value="<?php echo "$stu_department"; ?>" selected="1"><?php echo "$stu_department"; ?></option>
								<option value="CSE">C.S.E</option>
								<option value="ECE">E.C.E</option>
								<option value="EEE">E.E.E</option>
								<option value="IT">I.T</option>
								<option value="CIVIL">CIVIL</option>
								<option value="MECH">MECH</option>
						
							    </select></td>							
							</tr>
							<tr>
							    <td>7</td>
								<td>Section</td>
								<td><span><select aria-label="stu_section" name="stu_section" id="stu_section" class="form-control">
							
								<option value="<?php echo "$stu_section"; ?>" selected="1"><?php echo "$stu_section"; ?></option>
								<option value="A" >A</option>
								<option value="B">B</option>
								<option value="C">C</option>
								<option value="D">D</option>
								
							    </select></td>
							</tr>
							<tr>
							    <td>8</td>
								<td>Select Student Image</td>
                                <td><input type="file" name="stu_image" id="stu_image" class="form-control" /></td>
                                    </div>
							<tr>
							    <td>9</td>
								<td>Create A Password</td>
								<td><input type="text" id="stu_pass" name="stu_pass" value="<?php echo "$stu_pass"; ?>" class="form-control"/></td>
							</tr>
						</table>
						
						<br><center><input style="background-color:lightblue;" type="submit" name="student" id="student" value="Edit/Update" ></center>
						
					</form>
					
					
					<?php
                            include("connect.php");
							
                            if(isset($_POST['student']))
                            {
	                            								
								$stu_rollno = $_POST['stu_rollno'];
								$stu_name = $_POST['stu_name'];
	                            $stu_email = $_POST['stu_email'];
	                            $stu_contact = $_POST['stu_contact'];
								$stu_year = $_POST['stu_year'];
								$stu_department = $_POST['stu_department'];
								$stu_section = $_POST['stu_section'];
								$stu_image = $_FILES['stu_image']['name'];
	                            $stu_image_tmp = $_FILES['stu_image']['tmp_name'];
								$stu_pass = $_POST['stu_pass'];
	                            
	
	                            if($stu_image=='')
								{
									$run_update = mysqli_query($mysqli,"UPDATE student SET stu_rollno='$stu_rollno', stu_name='$stu_name', stu_email='$stu_email', stu_contact='$stu_contact', stu_year='$stu_year', stu_department='$stu_department', stu_section='$stu_section', stu_pass='$stu_pass' WHERE stu_rollno='$stu_rollno'");
									
									if($run_update)
	                                {
	                                echo "<script>alert('Student Data Has Been Updated Successfully!')</script>";
                                    echo "<script>window.open('index.php','_self')</script>";
	                                }
									else
									{
	                                echo "<script>alert('unsuccessfull!')</script>";
                                    echo "<script>window.open('edit_student.php','_self')</script>";
	                                }
								}
								else
								{
								 
								    move_uploaded_file($stu_image_tmp, "stu_images/$stu_image"); 
	
	                                $run_update = mysqli_query($mysqli,"UPDATE student SET stu_rollno='$stu_rollno', stu_name='$stu_name', stu_email='$stu_email', stu_contact='$stu_contact', stu_year='$stu_year', stu_department='$stu_department', stu_section='$stu_section', stu_image='$stu_image', stu_pass='$stu_pass' WHERE stu_rollno='$stu_rollno'");
									
	                                if($run_update)
	                                {
	                                    echo "<script>alert('Student Data Has Been Updated Successfully!')</script>";
                                        echo "<script>window.open('index.php','_self')</script>";
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
