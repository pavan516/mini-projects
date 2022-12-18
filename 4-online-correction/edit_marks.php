<?php include('includes/header.php'); ?>
	
<div class="content">
    <div class="container">
        <div class="row">
	        
			
			<div class="col-md-12"><br>
		        <div class="box shadow postblock">
				
				<div class="box shadow postblock">
				<center><b style="color:green">Edit Student Marks</b></center>
				</div>
				
				<?php
				include('connect.php');
				
					if(isset($_GET['stu_rollno']))
				    {
											
						$stu_rollno = $_GET['stu_rollno'];
						$fac_email = $_SESSION['fac_email'];
						$stu_midtype = $_GET['stu_midtype'];
						$stu_subject = $_GET['stu_subject'];
						
						
						$query = mysqli_query($mysqli,"SELECT * From marks where fac_email='$fac_email' AND stu_midtype='$stu_midtype' AND stu_subject='$stu_subject'");
						$row = mysqli_fetch_array($query);
						
							$sub_tot_marks = $row['sub_tot_marks'];
							$obj_tot_marks = $row['obj_tot_marks'];
												
				    }
					?>
				
				<form action="" method="POST" >				
				
				    <table>
				        <tr>
						    <td colspan="3">Roll No </td>                            	
							<td colspan="4"><select name="stu_rollno" id="stu_rollno" class="_5dba">
								<option value="<?Php echo "$stu_rollno"; ?>"><?Php echo "$stu_rollno"; ?></option>
								</select>
							</td>
						</tr>
                        
						<tr>
						    <td colspan="3">Subjects</td>                            	
							<td colspan="4"><select aria-label="stu_subject" name="stu_subject" id="stu_subject" class="_5dba">
								<option value="<?Php echo "$stu_subject"; ?>"><?Php echo "$stu_subject"; ?></option>									
								</select>
							</td>
						</tr>
						<tr>
						    <td colspan="3">Type Of Exam</td>                            	
							<td colspan="4"><select aria-label="stu_midtype" name="stu_midtype" id="stu_midtype" class="_5dba">
								<option value="<?Php echo "$stu_midtype"; ?>" selected="1"><?Php echo "$stu_midtype"; ?></option>
								<option value='mid_1'>MID-1</option>
								<option value='mid_2'>MID-2</option>								    
								</select>
							</td>
						</tr>
						
						<tr>
							<td colspan="3"><b>Edit Subjective Marks</b></td>
							<td colspan="4"><input type="text" id="sub_tot_marks" name="sub_tot_marks" value="<?Php echo "$sub_tot_marks"; ?>" size="5%"/></td>
                        </tr>	
						
						<tr>
						    <td colspan="3">Edit Objective Marks</td>                            	
							<td colspan="4"><select aria-label="obj_tot_marks" name="obj_tot_marks" id="obj_tot_marks" class="_5dba">
								<option value="<?Php echo "$obj_tot_marks"; ?>"><?Php echo "$obj_tot_marks"; ?></option>
								<option value='0'>0</option>
								<option value='1'>1</option>
								<option value='2'>2</option>
								<option value='3'>3</option>
								<option value='4'>4</option>
								<option value='5'>5</option>
								<option value='6'>6</option>
								<option value='7'>7</option>
								<option value='8'>8</option>
								<option value='9'>9</option>
								<option value='10'>10</option>
							</select>
							</td>
						</tr>
  
					</table>
					
					<center><br><input style="background-color:lightblue;"type="submit" name="edit_marks" id="edit_marks" value="EDIT" ></br></center>
				
				</form>
				
				    <?php
                            include("connect.php");
							
                            if(isset($_POST['edit_marks']))
                            {
	                            								
								$sub_tot_marks = $_POST['sub_tot_marks'];
	                            $obj_tot_marks = $_POST['obj_tot_marks'];
									                            
	
	                            $run_update = mysqli_query($mysqli,"UPDATE marks SET sub_tot_marks='$sub_tot_marks', obj_tot_marks='$obj_tot_marks' WHERE fac_email='$fac_email' AND stu_midtype='$stu_midtype' AND stu_subject='$stu_subject'");
									
	                                if($run_update)
	                                {
	                                    echo "<script>alert('$stu_rollno Marks Has Been Updated Successfully!')</script>";
                                        echo "<script>window.open('edit_marks.php?stu_rollno=$stu_rollno&stu_midtype=$stu_midtype&stu_subject=$stu_subject','_self')</script>";
	                                }
									else
									{
										echo "<script>alert('Your Details Have Been Updated Successfully!')</script>";
                                        echo "<script>window.open('edit_marks.php?stu_rollno=$stu_rollno&stu_midtype=$stu_midtype&stu_subject=$stu_subject','_self')</script>";
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
