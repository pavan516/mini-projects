<?php include('includes/header.php'); ?>

<div class="content">
    <div class="container">
        <div class="row">
		
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
					
						
				?>
				
			<div class="col-md-12">
		    
				<div class="box shadow postblock">
				
				
				<center><h2 style="color:purple;"><?php echo "$fac_name"; ?> Edit Your Details</h2></center><hr>
				
				    <form action="" method="post" enctype="multipart/form-data">
						
						    <div class="form-group">
                                <label class="control-label" >Name</label>
								<input type="text" name="fac_name" id="fac_name" value="<?php echo "$fac_name"; ?>" class="form-control">
						    </div>
						
						
                            <div class="form-group">
                                <label class="control-label" >E-Mail</label>
								<input type="email" name="fac_email" id="fac_email" value="<?php echo "$fac_email"; ?>" class="form-control">
						    </div>
							
                            <div class="form-group">
                                <label class="control-label" >Password</label>
                                <input type="text" name="fac_pass" id="fac_pass" value="<?php echo "$fac_pass"; ?>" class="form-control">
							</div>
							
							<div class="form-group">
							    <label class="control-label" >Department</label>
							<select aria-label="fac_department" name="fac_department" id="fac_department" class="form-control">
							
							    <option value="<?php echo "$fac_department"; ?>" selected="1"><?php echo "$fac_department"; ?></option>
								<option value="CSE">C.S.E</option>
								<option value="ECE">E.C.E</option>
								<option value="EEE">E.E.E</option>
								<option value="IT">I.T</option>
								<option value="CIVIL">CIVIL</option>
								<option value="MECH">MECH</option>
						
							    </select>
							</div>
							
							<div class="form-group">
                                <label class="control-label" >contact</label>
                                <input type="text" name="fac_contact" id="fac_contact" value="<?php echo "$fac_contact"; ?>" class="form-control">
							</div>
							
							<div class="form-group">
                                <label class="control-label" for="input-password">Image</label>
                                <input type="file" name="fac_image" id="fac_image" class="form-control">
							</div>
							
							<div class="form-group">
								<label class="control-label" class="form-control">Gender</label>
								<div class="form-control" >
								<input type = "radio" name = "fac_gender" value="<?php echo "$fac_gender"; ?>" checked="1"><?php echo "$fac_gender"; ?>
								<input type = "radio" name = "fac_gender" value = "male" >Male
								<input type = "radio" name = "fac_gender" value = "female" requred="required" >Female
								<input type = "radio" name = "fac_gender" value = "other" requred="required">Other
								</div>
							</div>
							
														
                            <center><input type="submit" name="edit" id="edit" value="EDIT" class="btn btn-default"></center>
                        
						</form>

						
								
	                    <?php
                            include("connect.php");
							
                            if(isset($_POST['edit']))
                            {
	                            								
								$fac_name = $_POST['fac_name'];
	                            $fac_email = $_POST['fac_email'];
								$fac_pass = $_POST['fac_pass'];
								$fac_department = $_POST['fac_department'];
	                            $fac_contact = $_POST['fac_contact'];
								$fac_image = $_FILES['fac_image']['name'];
	                            $fac_image_tmp = $_FILES['fac_image']['tmp_name'];
								$fac_gender = $_POST['fac_gender'];
	                            
	
	                            if($fac_image=='')
								{
									$run_update = mysqli_query($mysqli,"UPDATE register SET fac_name='$fac_name', fac_email='$fac_email', fac_pass='$fac_pass', fac_department='$fac_department', fac_contact='$fac_contact', fac_gender='$fac_gender' WHERE fac_email='$fac_email'");
									
									if($run_update)
	                                {
	                                echo "<script>alert('Your Details Have Been Updated Successfully!')</script>";
                                    echo "<script>window.open('index.php','_self')</script>";
	                                }
									else
									{
	                                echo "<script>alert('unsuccessfull!')</script>";
                                    echo "<script>window.open('edit_fac_details.php?fac_email?$fac_email','_self')</script>";
	                                }
								}
								else
								{
								 
								    move_uploaded_file($fac_image_tmp, "admin/fac_images/$fac_image"); 
	
	                                $run_update = mysqli_query($mysqli,"UPDATE register SET fac_name='$fac_name', fac_email='$fac_email', fac_pass='$fac_pass', fac_department='$fac_department', fac_contact='$fac_contact', fac_image='$fac_image' fac_gender='$fac_gender' WHERE fac_email='$fac_email'");
									
	                                if($run_update)
	                                {
	                                    echo "<script>alert('Your Details Have Been Updated Successfully!')</script>";
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
