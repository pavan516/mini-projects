<?php include('includes/header.php'); ?>

<div class="content">
    <div class="container">
        <div class="row"><br>
		
	        <div class="box shadow postblock">
				<?php
				include('connect.php');
				
					$fac_email = $_SESSION['fac_email'];
	                $query = mysqli_query($mysqli,"select * from register where fac_email='$fac_email'");
	                $row = mysqli_fetch_array($query);
								
	                $fac_name = $row['fac_name'];
					$fac_email = $row['fac_email'];
					$fac_contact = $row['fac_contact'];
					$fac_department = $row['fac_department'];
					$fac_pass = $row['fac_pass'];
					$fac_image = $row['fac_image'];
					$fac_gender = $row['fac_gender'];
					
						echo "<marquee>$fac_name - Welcome to Online Correction</marquee>";
				?>
				
            </div>
			
			<div class="col-md-6">
				<div class="box shadow postblock">
				    <table>
						<tr>
							<td colspan="2"><center><b>My Profile</b></center></td>
						</tr>
						<tr>
							<td colspan="2"><center><?php echo "<img src='admin/fac_images/$fac_image'width='100' height='100' >"; ?></center></td>
						<tr>
						<tr>
							<td>Name</td>
							<td><?php echo "$fac_name"; ?></td>
						<tr>
						<tr>
							<td>Email</td>
							<td><?php echo "$fac_email"; ?></td>
						<tr>
						<tr>
							<td>Contact</td>
							<td><?php echo "$fac_contact"; ?></td>
						<tr>
						<tr>
							<td>Department</td>
							<td><?php echo "$fac_department"; ?></td>
						<tr>
						<tr>
							<td>Gender</td>
							<td><?php echo "$fac_gender"; ?></td>
						<tr>
						<tr>
							<td>Edit My Profile</td>
							<td><button><a href="edit_fac_details.php?fac_email=<?php echo "$fac_email"; ?>">EDIT</a></button></td>
						<tr>
						<tr>
							<td>Logout Here</td>
							<td><button><a href="logout.php">LOGOUT</a></button></td>
						<tr>
					</table>
                </div>
			</div>
			
			<div class="col-md-6">
		    
				<div class="box shadow postblock">
				
				    <div class="box shadow postblock">
				        <center><b style="color:green;font-size:100%;">Select "Year-Department-Section" To Upload Marks</b></center>
                    </div>					
					
					<form action="home.php" method="post" enctype="multipart/form-data">
						
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
