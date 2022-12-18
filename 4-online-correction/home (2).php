<?php include('includes/header.php'); ?>
	
	
<div class="content">
    <div class="container">
        <div class="row">
	        
			
			<div class="col-md-12">
		        <div class="box shadow postblock">
				
				<div class="box shadow postblock">
				<center><b style="color:green">Enter Student Marks - Online Correction</b></center>
				</div>
				
								
				
				    <table>
				        <tr>
						    <th colspan="3">Roll No </th>                            	
							<th colspan="4"><select aria-label="stu_rollno" name="stu_rollno" id="stu_rollno" class="_5dba">
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
							</th>
						</tr>
                        
						<tr>
						    <th colspan="3">Subjects</th>                            	
							<th colspan="4"><select aria-label="stu_subject" name="stu_subject" id="stu_subject" class="_5dba">
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
							</th>
						</tr>
						<tr>
						    <th colspan="3">Type Of Exam</th>                            	
							<th colspan="4"><select aria-label="stu_midtype" name="stu_midtype" id="stu_midtype" class="_5dba">
								<option value='NULL'>Exam Type</option>
								<option value='mid_1'>MID-1</option>
								<option value='mid_2'>MID-2</option>								    
								</select>
							</th>
						</tr>
						
						<tr>
							
							<th colspan="7" style="color:black;"><b>Enter The Subjective Marks</b></td>
                            
						</tr>	
										
						<tr>
						    <th>Q.NO</th>
                            <th>a</th>
							<th>b</th>
							<th>c</th>
                            <th>d</th>
							<th>Total</th>
							<th>Value</th>
                        </tr>
                        <tr>
                            <td>1</td>
							<script language="javascript">
                            function addNumb()
                            {
								val1 = parseFloat(document.getElementById("value1").value);
                                val2 = parseFloat(document.getElementById("value2").value);
								val3 = parseFloat(document.getElementById("value3").value);
                                val4 = parseFloat(document.getElementById("value4").value);
                                var ans1 = document.getElementById("answer");
                                ans1.value = val1 + val2 + val3 + val4;
                            }
                            </script>
  
                            <td><input type="text" id="value1" name="value1" value="0"/></td>
                            <td><input type="text" id="value2" name="value2" value="0"/></td>
							<td><input type="text" id="value3" name="value3" value="0"/></td>
                            <td><input type="text" id="value4" name="value4" value="0"/></td>
                          	<td><input type="button" name="Sumbit" value="ADD" onclick="javascript:addNumb()"/></td>
                            <td><input type="text" id="answer" name="answer" value="0"/></td>
							
                        </tr>
						<tr>
                            <td>2</td>
							<script language="javascript">
                            function addNumbers()
                            {
								val5 = parseFloat(document.getElementById("value5").value);
                                val6 = parseFloat(document.getElementById("value6").value);
								val7 = parseFloat(document.getElementById("value7").value);
                                val8 = parseFloat(document.getElementById("value8").value);
                                var ans2 = document.getElementById("answer1");
                                ans2.value = val5 + val6 + val7 + val8;
                            }
                            </script>
  
                            <td><input type="text" id="value5" name="value5" value="0"/></td>
                            <td><input type="text" id="value6" name="value6" value="0"/></td>
							<td><input type="text" id="value7" name="value7" value="0"/></td>
                            <td><input type="text" id="value8" name="value8" value="0"/></td>
                          	<td><input type="button" name="Sumbit" value="ADD" onclick="javascript:addNumbers()"/></td>
                            <td><input type="text" id="answer1" name="answer1" value="0"/></td>
							
                        </tr>
						<tr>
                            <td>3</td>
							<script language="javascript">
                            function addNum()
                            {
								val9 = parseFloat(document.getElementById("value9").value);
                                val10 = parseFloat(document.getElementById("value10").value);
								val11 = parseFloat(document.getElementById("value11").value);
                                val12 = parseFloat(document.getElementById("value12").value);
                                var ans3 = document.getElementById("answer2");
                                ans3.value = val9 + val10 + val11 + val12;
                            }
                            </script>
  
                            <td><input type="text" id="value9" name="value9" value="0"/></td>
                            <td><input type="text" id="value10" name="value10" value="0"/></td>
							<td><input type="text" id="value11" name="value11" value="0"/></td>
                            <td><input type="text" id="value12" name="value12" value="0"/></td>
                          	<td><input type="button" name="Sumbit" value="ADD" onclick="javascript:addNum()"/></td>
                            <td><input type="text" id="answer2" name="answer2" value="0"/></td>
							
                        </tr>
						<tr>
                            <td>4</td>
							<script language="javascript">
                            function addNumber()
                            {
								val13 = parseFloat(document.getElementById("value13").value);
                                val14 = parseFloat(document.getElementById("value14").value);
								val15 = parseFloat(document.getElementById("value15").value);
                                val16 = parseFloat(document.getElementById("value16").value);
                                var ans4 = document.getElementById("answer3");
                                ans4.value = val13 + val14 + val15 + val16;
                            }
                            </script>
  
                            <td><input type="text" id="value13" name="value13" value="0"/></td>
                            <td><input type="text" id="value14" name="value14" value="0"/></td>
							<td><input type="text" id="value15" name="value15" value="0"/></td>
                            <td><input type="text" id="value16" name="value16" value="0"/></td>
                          	<td><input type="button" name="Sumbit" value="ADD" onclick="javascript:addNumber()"/></td>
                            <td><input type="text" id="answer3" name="answer3" value="0"/></td>
							
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
                            <td><input type="text" id="sub_tot_marks" name="sub_tot_marks" value="0"/></td>
							
                        </tr>
						
						<tr>
							
							<th colspan="7" style="color:black;"><b>Enter The Objective Marks</b></td>
                            
						</tr>
						
						<tr>
						    <th colspan="3">Total Objective Marks</th>                            	
							<th colspan="4"><select aria-label="obj_tot_marks" name="obj_tot_marks" id="obj_tot_marks" class="_5dba">
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
							</th>
						</tr>
  
					</table>
					
					<center><br><input style="background-color:lightblue;"type="submit" name="insert" id="insert" value="Submit" ></br></center>
					
				    <div id="result"></div>
							            				
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
