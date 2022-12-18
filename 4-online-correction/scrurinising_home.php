<?php include('includes/header.php'); ?>
	<?php
										include("connect.php");
										if(isset($_POST['submit']))
					                    {
											
											$stu_year = $_POST['stu_year'];
									        $stu_department = $_POST['stu_department'];
									        $stu_section = $_POST['stu_section'];
											
											$set = mysqli_query($mysqli,"select * from student where stu_year='$stu_year' AND stu_department='$stu_department' AND stu_section='$stu_section'");
						                    $row_posts=mysqli_fetch_array($set);
				                            
											 
											    $stu_rollno = $row_posts['stu_rollno'];
												$stu_year = $row_posts['stu_year'];
									            $stu_department = $row_posts['stu_department'];
									            $stu_section = $row_posts['stu_section'];
											 
											 ?>
											 
										   
	<script type="text/javascript">
		$(document).ready(function(){
					
			$("#insert").click(function(){
			
				var stu_rollno = $("#stu_rollno").val();
				var stu_subject = $("#stu_subject").val();
				var stu_midtype = $("#stu_midtype").val();
				var q1_a = $("#q1_a").val();
				var q1_b = $("#q1_b").val();
				var q1_c = $("#q1_c").val();
				var q1_d = $("#q1_d").val();
				var q2_a = $("#q2_a").val();
				var q2_b = $("#q2_b").val();
				var q2_c = $("#q2_c").val();
				var q2_d = $("#q2_d").val();
				var q3_a = $("#q3_a").val();
				var q3_b = $("#q3_b").val();
				var q3_c = $("#q3_c").val();
				var q3_d = $("#q3_d").val();
				var q4_a = $("#q4_a").val();
				var q4_b = $("#q4_b").val();
				var q4_c = $("#q4_c").val();
				var q4_d = $("#q4_d").val();
				var sub_tot_marks = $("#sub_tot_marks").val();
				var obj_tot_marks = $("#obj_tot_marks").val();
				var stu_year = "<?php echo $stu_year ?>";
				var stu_department = "<?php echo $stu_department ?>";
				var stu_section = "<?php echo $stu_section ?>";
				
								
				$.ajax({
					
					url: 'scrurinising_result.php',
					data: {stu_rollno:stu_rollno,stu_subject:stu_subject,stu_midtype:stu_midtype,q1_a:q1_a,q1_b:q1_b,q1_c:q1_c,q1_d:q1_d,q2_a:q2_a,q2_b:q2_b,q2_c:q2_c,q2_d:q2_d,q3_a:q3_a,q3_b:q3_b,q3_c:q3_c,q3_d:q3_d,q4_a:q4_a,q4_b:q4_b,q4_c:q4_c,q4_d:q4_d,sub_tot_marks:sub_tot_marks,obj_tot_marks:obj_tot_marks,stu_year:stu_year,stu_department:stu_department,stu_section:stu_section},
					type: 'POST',
					success: function(data){
					$("#result").html(data);
                    		
					}
				    
				});
			
			});
	
    	});
		
	</script>
	 <?php 
										}?>
<div class="content">
    <div class="container">
        <div class="row">
	        
			
			<div class="col-md-24">
		        <div class="box shadow postblock">
				
				<div class="box shadow postblock">
				<center><b style="color:green">Enter Student Marks - Online Correction</b></center>
				</div>
				
				    <table>
					    <tr>
						    <td colspan="3">Roll No </td>                            	
							<td colspan="4"><select aria-label="stu_rollno" name="stu_rollno" id="stu_rollno" class="_5dba">
								<option value='NULL'>RollNo</option>
								
										<?php
										include("connect.php");
										if(isset($_POST['submit']))
					                    {
											
											$stu_year = $_POST['stu_year'];
									        $stu_department = $_POST['stu_department'];
									        $stu_section = $_POST['stu_section'];
											
											$set = mysqli_query($mysqli,"select stu_rollno from student where stu_year='$stu_year' AND stu_department='$stu_department' AND stu_section='$stu_section'");
						                    while ($row_posts=mysqli_fetch_array($set))
				                            {
											 
											    $stu_rollno = $row_posts['stu_rollno'];
											 
											 echo "<option value='$stu_rollno'>$stu_rollno</option>";
											 
										    }
										}?>
								</select>
							</td>
						</tr>
                        <tr>
						    <td colspan="3">Subjects</td>                            	
							<td colspan="4"><select aria-label="stu_subject" name="stu_subject" id="stu_subject" class="_5dba">
								<option value='NULL'>Subjects</option>
								
										<?php
										include("connect.php");
										if(isset($_POST['submit']))
					                    {
											
											$stu_year = $_POST['stu_year'];
									        $stu_department = $_POST['stu_department'];
									        											
											$set = mysqli_query($mysqli,"select * from subjects where stu_year='$stu_year' AND stu_department='$stu_department'");
						                    while ($row_posts=mysqli_fetch_array($set))
				                            {
											 
											    $stu_subjects = $row_posts['stu_subjects'];
											 
											 echo "<option value='$stu_subjects'>$stu_subjects</option>";
											 
										    }
										}?>
								</select>
							</td>
						</tr>
						<tr>
						    <td colspan="3">Type Of Exam</td>                            	
							<td colspan="4"><select aria-label="stu_midtype" name="stu_midtype" id="stu_midtype" class="_5dba">
								<option value='NULL'>Exam Type</option>
								<option value='mid_1'>MID-1</option>
								<option value='mid_2'>MID-2</option>								    
								</select>
							</th>
						</tr>
						
						<tr>
							
							<td colspan="7" style="color:black;"><b>Enter The Subjective Marks</b></td>
                            
						</tr>	
										
						<tr>
						    <td>Q.NO</td>
                            <td>a</td>
							<td>b</td>
							<td>c</td>
                            <td>d</td>
							<td>Total</td>
							<td>Value</td>
                        </tr>
                        <tr>
                            <td>1</td>
							<script language="javascript">
                            function addNumb()
                            {
								val1 = parseFloat(document.getElementById("q1_a").value);
                                val2 = parseFloat(document.getElementById("q1_b").value);
								val3 = parseFloat(document.getElementById("q1_c").value);
                                val4 = parseFloat(document.getElementById("q1_d").value);
                                var ans1 = document.getElementById("answer");
                                ans1.value = val1 + val2 + val3 + val4;
                            }
                            </script>
  
                            <td><input type="text" id="q1_a" name="q1_a" value="0" size="1%"/></td>
                            <td><input type="text" id="q1_b" name="q1_b" value="0" size="1%"/></td>
							<td><input type="text" id="q1_c" name="q1_c" value="0" size="1%"/></td>
                            <td><input type="text" id="q1_d" name="q1_d" value="0" size="1%"/></td>
                          	<td><input type="button" name="Sumbit" value="ADD" onclick="javascript:addNumb()"/></td>
                            <td><input type="text" id="answer" name="answer" value="0" size="1%"/></td>
							
                        </tr>
						<tr>
                            <td>2</td>
							<script language="javascript">
                            function addNumbers()
                            {
								val5 = parseFloat(document.getElementById("q2_a").value);
                                val6 = parseFloat(document.getElementById("q2_b").value);
								val7 = parseFloat(document.getElementById("q2_c").value);
                                val8 = parseFloat(document.getElementById("q2_d").value);
                                var ans2 = document.getElementById("answer1");
                                ans2.value = val5 + val6 + val7 + val8;
                            }
                            </script>
  
                            <td><input type="text" id="q2_a" name="q2_a" value="0" size="1%"/></td>
                            <td><input type="text" id="q2_b" name="q2_b" value="0" size="1%"/></td>
							<td><input type="text" id="q2_c" name="q2_c" value="0" size="1%"/></td>
                            <td><input type="text" id="q2_d" name="q2_d" value="0" size="1%"/></td>
                          	<td><input type="button" name="Sumbit" value="ADD" onclick="javascript:addNumbers()"/></td>
                            <td><input type="text" id="answer1" name="answer1" value="0" size="1%"/></td>
							
                        </tr>
						<tr>
                            <td>3</td>
							<script language="javascript">
                            function addNum()
                            {
								val9 = parseFloat(document.getElementById("q3_a").value);
                                val10 = parseFloat(document.getElementById("q3_b").value);
								val11 = parseFloat(document.getElementById("q3_c").value);
                                val12 = parseFloat(document.getElementById("q3_d").value);
                                var ans3 = document.getElementById("answer2");
                                ans3.value = val9 + val10 + val11 + val12;
                            }
                            </script>
  
                            <td><input type="text" id="q3_a" name="q3_a" value="0" size="1%"/></td>
                            <td><input type="text" id="q3_b" name="q3_b" value="0" size="1%"/></td>
							<td><input type="text" id="q3_c" name="q3_c" value="0" size="1%"/></td>
                            <td><input type="text" id="q3_d" name="q3_d" value="0" size="1%"/></td>
                          	<td><input type="button" name="Sumbit" value="ADD" onclick="javascript:addNum()"/></td>
                            <td><input type="text" id="answer2" name="answer2" value="0" size="1%"/></td>
							
                        </tr>
						<tr>
                            <td>4</td>
							<script language="javascript">
                            function addNumber()
                            {
								val13 = parseFloat(document.getElementById("q4_a").value);
                                val14 = parseFloat(document.getElementById("q4_b").value);
								val15 = parseFloat(document.getElementById("q4_c").value);
                                val16 = parseFloat(document.getElementById("q4_d").value);
                                var ans4 = document.getElementById("answer3");
                                ans4.value = val13 + val14 + val15 + val16;
                            }
                            </script>
  
                            <td><input type="text" id="q4_a" name="q4_a" value="0" size="1%"/></td>
                            <td><input type="text" id="q4_b" name="q4_b" value="0" size="1%"/></td>
							<td><input type="text" id="q4_c" name="q4_c" value="0" size="1%"/></td>
                            <td><input type="text" id="q4_d" name="q4_d" value="0" size="1%"/></td>
                          	<td><input type="button" name="Sumbit" value="ADD" onclick="javascript:addNumber()"/></td>
                            <td><input type="text" id="answer3" name="answer3" value="0" size="1%"/></td>
							
                        </tr>
						<tr>
                            <script language="javascript">
                            function addNumbertotal()
                            {
								val17 = parseFloat(document.getElementById("answer").value);
                                val18 = parseFloat(document.getElementById("answer1").value);
								val19 = parseFloat(document.getElementById("answer2").value);
                                val20 = parseFloat(document.getElementById("answer3").value);
                                var total = document.getElementById("sub_tot_marks");
                                total.value = val17 + val18 + val19 + val20;
                            }
                            </script>
  
                            <td colspan="6" ><input type="button" name="Sumbit" value="TOTAL" onclick="javascript:addNumbertotal()"/></td>
                            <td><input type="text" id="sub_tot_marks" name="sub_tot_marks" value="0" size="1%"/></td>
							
                        </tr>
						
						<tr>
							
							<td colspan="7" style="color:black;"><b>Enter The Objective Marks</b></td>
                            
						</tr>
						
						<tr>
						    <td colspan="3">Total Objective Marks</td>                            	
							<td colspan="4"><select aria-label="obj_tot_marks" name="obj_tot_marks" id="obj_tot_marks" class="_5dba">
								<option value='NULL'>Marks</option>
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
					
					
					<center><br><input style="background-color:lightblue;"type="submit" name="insert" id="insert" value="Submit" ></br></center>
								                				
                </div>
	        </div>
			
			<div class="col-md-12">
				<div class="box shadow postblock" id="result">
					
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