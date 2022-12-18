
<center><b style="color:purple;font-size:200%">Result</b></center>
<?php

$original = mysqli_query($mysqli,"select * from marks where stu_rollno='$stu_rollno' AND stu_year='$stu_year' AND stu_subject='$stu_subject' AND stu_midtype='$stu_midtype'");
$row = mysqli_fetch_array($original);
	
	$ori_fac_email = $row['fac_email'];
	$ori_stu_rollno = $row['stu_rollno'];
	$ori_stu_subject = $row['stu_subject'];
	$ori_stu_midtype = $row['stu_midtype'];
	$ori_q1_a = $row['q1_a'];
	$ori_q1_b = $row['q1_b'];
	$ori_q1_c = $row['q1_c'];
	$ori_q1_d = $row['q1_d'];
	$total_1 = $ori_q1_a + $ori_q1_b + $ori_q1_c + $ori_q1_d;
	$ori_q2_a = $row['q2_a'];
	$ori_q2_b = $row['q2_b'];
	$ori_q2_c = $row['q2_c'];
	$ori_q2_d = $row['q2_d'];
	$total_2 = $ori_q2_a + $ori_q2_b + $ori_q2_c + $ori_q2_d;
	$ori_q3_a = $row['q3_a'];
	$ori_q3_b = $row['q3_b'];
	$ori_q3_c = $row['q3_c'];
	$ori_q3_d = $row['q3_d'];
	$total_3 = $ori_q3_a + $ori_q3_b + $ori_q3_c + $ori_q3_d; 
	$ori_q4_a = $row['q4_a'];
	$ori_q4_b = $row['q4_b'];
	$ori_q4_c = $row['q4_c'];
	$ori_q4_d = $row['q4_d'];
	$total_4 = $ori_q4_a + $ori_q4_b + $ori_q4_c + $ori_q4_d;
	$ori_sub_tot_marks = $row['sub_tot_marks'];
	$ori_obj_tot_marks = $row['obj_tot_marks'];
	$ori_stu_year = $row['stu_year'];
	$ori_stu_department = $row['stu_department'];
	$ori_stu_section = $row['stu_section'];
	
?>
<?php

$scrutiniser = mysqli_query($mysqli,"select * from scrutiniser where stu_rollno='$stu_rollno' AND stu_year='$stu_year' AND stu_subject='$stu_subject' AND stu_midtype='$stu_midtype'");
$row = mysqli_fetch_array($scrutiniser);
	
	$scr_fac_email = $row['fac_email'];
	$scr_stu_rollno = $row['stu_rollno'];
	$scr_stu_subject = $row['stu_subject'];
	$scr_stu_midtype = $row['stu_midtype'];
	$scr_q1_a = $row['q1_a'];
	$scr_q1_b = $row['q1_b'];
	$scr_q1_c = $row['q1_c'];
	$scr_q1_d = $row['q1_d'];
	$scr_total_1 = $scr_q1_a + $scr_q1_b + $scr_q1_c + $scr_q1_d;
	$scr_q2_a = $row['q2_a'];
	$scr_q2_b = $row['q2_b'];
	$scr_q2_c = $row['q2_c'];
	$scr_q2_d = $row['q2_d'];
	$scr_total_2 = $scr_q2_a + $scr_q2_b + $scr_q2_c + $scr_q2_d;
	$scr_q3_a = $row['q3_a'];
	$scr_q3_b = $row['q3_b'];
	$scr_q3_c = $row['q3_c'];
	$scr_q3_d = $row['q3_d'];
	$scr_total_3 = $scr_q3_a + $scr_q3_b + $scr_q3_c + $scr_q3_d; 
	$scr_q4_a = $row['q4_a'];
	$scr_q4_b = $row['q4_b'];
	$scr_q4_c = $row['q4_c'];
	$scr_q4_d = $row['q4_d'];
	$scr_total_4 = $scr_q4_a + $scr_q4_b + $scr_q4_c + $scr_q4_d;
	$scr_sub_tot_marks = $row['sub_tot_marks'];
	$scr_obj_tot_marks = $row['obj_tot_marks'];
	$scr_stu_year = $row['stu_year'];
	$scr_stu_department = $row['stu_department'];
	$scr_stu_section = $row['stu_section'];
	
?>
<?php

$facualty = mysqli_query($mysqli,"select * from register where fac_email='$ori_fac_email'");
$row = mysqli_fetch_array($facualty);
	
	$ori_fac_name = $row['fac_name'];
	$ori_fac_department = $row['fac_department'];
	
?>
<?php

$facualty = mysqli_query($mysqli,"select * from register where fac_email='$scr_fac_email'");
$row = mysqli_fetch_array($facualty);
	
	$scr_fac_name = $row['fac_name'];
	$scr_fac_department = $row['fac_department'];
	
?>
<?php

$student = mysqli_query($mysqli,"select * from student where stu_rollno='$stu_rollno'");
$row = mysqli_fetch_array($student);
	
	$ori_stu_name = $row['stu_name'];
	
?>

<table>
	<tr>
		<th><b style="blue"><center>Details</center></b></th>
		<th><b style="blue"><center>Original Marks</center></b></th>
		<th><b style="blue"><center>Scrutinising Marks / Re-Uploaded Marks</center></b></th>
		<th><b style="blue"><center>Result</center></b></th>
	</tr>
	<tr>
		<td colspan="4"><b style="color:green;"><center>Student Details</center></b></td>
	</tr>
	<tr>
		<td><b>Student RollNo</b></td>
		<td><?php echo "$ori_stu_rollno"; ?></td>
		<td><?php echo "$scr_stu_rollno"; ?></td>
		<td>
			<?php if($ori_stu_rollno==$scr_stu_rollno){ echo "<div id='green'></div>"; } 
			else{ echo "<div id='red'></div>"; } ?>
		</td>
	</tr>	
	<tr>
		<td><b>Student Name</b></td>
		<td><?php echo "$ori_stu_name"; ?></td>
		<td><?php echo "$ori_stu_name"; ?></td>
		<td>
			<?php if($ori_stu_name==$ori_stu_name){ echo "<div id='green'></div>"; } 
			else{ echo "<div id='red'></div>"; } ?>
		</td>
	</tr>
	<tr>
		<td><b>Semister</b></td>
		<td><?php echo "$ori_stu_year"; ?></td>
		<td><?php echo "$scr_stu_year"; ?></td>
		<td>
			<?php if($ori_stu_year==$scr_stu_year){ echo "<div id='green'></div>"; } 
			else{ echo "<div id='red'></div>"; } ?>
		</td>
	</tr>
	<tr>
		<td><b>Department</b></td>
		<td><?php echo "$ori_stu_department"; ?></td>
		<td><?php echo "$scr_stu_department"; ?></td>
		<td>
			<?php if($ori_stu_department==$scr_stu_department){ echo "<div id='green'></div>"; } 
			else{ echo "<div id='red'></div>"; } ?>
		</td>
	</tr>
	<tr>
		<td><b>Section</b></td>
		<td><?php echo "$ori_stu_section"; ?></td>
		<td><?php echo "$scr_stu_section"; ?></td>
		<td>
			<?php if($ori_stu_section==$scr_stu_section){ echo "<div id='green'></div>"; } 
			else{ echo "<div id='red'></div>"; } ?>
		</td>
	</tr>
	<tr>
		<td><b>Subject</b></td>
		<td><?php echo "$ori_stu_subject"; ?></td>
		<td><?php echo "$scr_stu_subject"; ?></td>
		<td>
			<?php if($ori_stu_subject==$scr_stu_subject){ echo "<div id='green'></div>"; } 
			else{ echo "<div id='red'></div>"; } ?>
		</td>
	</tr>
	<tr>
		<td colspan="4"><b style="color:green;"><center>Facualty Details</center></b></td>
	</tr>
	<tr>
		<td><b>Facualty Name</b></td>
		<td><?php echo "$ori_fac_name"; ?></td>
		<td><?php echo "$scr_fac_name"; ?></td>
		<td>
			<?php if($ori_fac_name==$scr_fac_name){ echo "<div id='green'></div>"; } 
			else{ echo "<div id='red'></div>"; } ?>
		</td>
	</tr>
	<tr>
		<td><b>Department</b></td>
		<td><?php echo "$ori_fac_department"; ?></td>
		<td><?php echo "$scr_fac_department"; ?></td>
		<td>
			<?php if($ori_fac_department==$scr_fac_department){ echo "<div id='green'></div>"; } 
			else{ echo "<div id='red'></div>"; } ?>
		</td>
	</tr>
	<tr>
		<td colspan="4"><b style="color:green;"><center><?php echo "$ori_stu_year"; ?> - <?php echo "$ori_stu_midtype"; ?> Semister Marks</center></b></td>
	</tr>
	<tr>
		<td><b>Type Of Internal</b></td>
		<td><?php echo "$ori_stu_midtype"; ?></td>
		<td><?php echo "$scr_stu_midtype"; ?></td>
		<td>
			<?php if($ori_stu_midtype==$scr_stu_midtype){ echo "<div id='green'></div>"; } 
			else{ echo "<div id='red'></div>"; } ?>
		</td>
	</tr>
	<tr>
		<td colspan="4"><b style="color:green;"><center>Subjective Marks</center></b></td>
	</tr>
	<tr>
		<td><b>1st Question - A</b></td>
		<td><?php echo "$ori_q1_a"; ?></td>
		<td><?php echo "$scr_q1_a"; ?></td>
		<td>
			<?php if($ori_q1_a==$scr_q1_a){ echo "<div id='green'></div>"; } 
			else{ echo "<div id='red'></div>"; } ?>
		</td>
	</tr>
	<tr>
		<td><b>1st Question - B</b></td>
		<td><?php echo "$ori_q1_b"; ?></td>
		<td><?php echo "$scr_q1_b"; ?></td>
		<td>
			<?php if($ori_q1_b==$scr_q1_b){ echo "<div id='green'></div>"; } 
			else{ echo "<div id='red'></div>"; } ?>
		</td>
	</tr>
	<tr>
		<td><b>1st Question - C</b></td>
		<td><?php echo "$ori_q1_c"; ?></td>
		<td><?php echo "$scr_q1_c"; ?></td>
		<td>
			<?php if($ori_q1_c==$scr_q1_c){ echo "<div id='green'></div>"; } 
			else{ echo "<div id='red'></div>"; } ?>
		</td>
	</tr>
	<tr>
		<td><b>1st Question - D</b></td>
		<td><?php echo "$ori_q1_d"; ?></td>
		<td><?php echo "$scr_q1_d"; ?></td>
		<td>
			<?php if($ori_q1_d==$scr_q1_d){ echo "<div id='green'></div>"; } 
			else{ echo "<div id='red'></div>"; } ?>
		</td>
	</tr>
	<tr>
		<td><b>1st Question - Total</b></td>
		<td style="color:purple;"><b style="font-size:120%;"><center><?php echo "$total_1"; ?></center></b></td>
		<td style="color:purple;"><b style="font-size:120%;"><center><?php echo "$scr_total_1"; ?></center></b></td>
		<td>
			<?php if($total_1==$scr_total_1){ echo "<div id='green'></div>"; } 
			else{ echo "<div id='red'></div>"; } ?>
		</td>
	</tr>
	<tr>
		<td><b>2nd Question - A</b></td>
		<td><?php echo "$ori_q2_a"; ?></td>
		<td><?php echo "$scr_q2_a"; ?></td>
		<td>
			<?php if($ori_q2_a==$scr_q2_a){ echo "<div id='green'></div>"; } 
			else{ echo "<div id='red'></div>"; } ?>
		</td>
	</tr>
	<tr>
		<td><b>2nd Question - B</b></td>
		<td><?php echo "$ori_q2_b"; ?></td>
		<td><?php echo "$scr_q2_b"; ?></td>
		<td>
			<?php if($ori_q2_b==$scr_q2_b){ echo "<div id='green'></div>"; } 
			else{ echo "<div id='red'></div>"; } ?>
		</td>
	</tr>
	<tr>
		<td><b>2nd Question - C</b></td>
		<td><?php echo "$ori_q2_c"; ?></td>
		<td><?php echo "$scr_q2_c"; ?></td>
		<td>
			<?php if($ori_q2_c==$scr_q2_c){ echo "<div id='green'></div>"; } 
			else{ echo "<div id='red'></div>"; } ?>
		</td>
	</tr>
	<tr>
		<td><b>2nd Question - D</b></td>
		<td><?php echo "$ori_q2_d"; ?></td>
		<td><?php echo "$scr_q2_d"; ?></td>
		<td>
			<?php if($ori_q2_d==$scr_q2_d){ echo "<div id='green'></div>"; } 
			else{ echo "<div id='red'></div>"; } ?>
		</td>
	</tr>
	<tr>
		<td><b>2nd Question - Total</b></td>
		<td style="color:purple;"><b style="font-size:120%;"><center><?php echo "$total_2"; ?></center></b></td>
		<td style="color:purple;"><b style="font-size:120%;"><center><?php echo "$scr_total_2"; ?></center></b></td>
		<td>
			<?php if($total_2==$scr_total_2){ echo "<div id='green'></div>"; } 
			else{ echo "<div id='red'></div>"; } ?>
		</td>
	</tr>
	<tr>
		<td><b>3rd Question - A</b></td>
		<td><?php echo "$ori_q3_a"; ?></td>
		<td><?php echo "$scr_q3_a"; ?></td>
		<td>
			<?php if($ori_q3_a==$scr_q3_a){ echo "<div id='green'></div>"; } 
			else{ echo "<div id='red'></div>"; } ?>
		</td>
	</tr>
	<tr>
		<td><b>3rd Question - B</b></td>
		<td><?php echo "$ori_q3_b"; ?></td>
		<td><?php echo "$scr_q3_b"; ?></td>
		<td>
			<?php if($ori_q3_b==$scr_q3_b){ echo "<div id='green'></div>"; } 
			else{ echo "<div id='red'></div>"; } ?>
		</td>
	</tr>
	<tr>
		<td><b>3rd Question - C</b></td>
		<td><?php echo "$ori_q3_c"; ?></td>
		<td><?php echo "$scr_q3_c"; ?></td>
		<td>
			<?php if($ori_q3_c==$scr_q3_c){ echo "<div id='green'></div>"; } 
			else{ echo "<div id='red'></div>"; } ?>
		</td>
	</tr>
	<tr>
		<td><b>3rd Question - D</b></td>
		<td><?php echo "$ori_q3_d"; ?></td>
		<td><?php echo "$scr_q3_d"; ?></td>
		<td>
			<?php if($ori_q3_d==$scr_q3_d){ echo "<div id='green'></div>"; } 
			else{ echo "<div id='red'></div>"; } ?>
		</td>
	</tr>
	<tr>
		<td><b>3rd Question - Total</b></td>
		<td style="color:purple;"><b style="font-size:120%;"><center><?php echo "$total_3"; ?></center></b></td>
		<td style="color:purple;"><b style="font-size:120%;"><center><?php echo "$scr_total_3"; ?></center></b></td>
		<td>
			<?php if($total_3==$scr_total_3){ echo "<div id='green'></div>"; } 
			else{ echo "<div id='red'></div>"; } ?>
		</td>
	</tr>
	<tr>
		<td><b>4th Question - A</b></td>
		<td><?php echo "$ori_q4_a"; ?></td>
		<td><?php echo "$scr_q4_a"; ?></td>
		<td>
			<?php if($ori_q4_a==$scr_q4_a){ echo "<div id='green'></div>"; } 
			else{ echo "<div id='red'></div>"; } ?>
		</td>
	</tr>
	<tr>
		<td><b>4th Question - B</b></td>
		<td><?php echo "$ori_q4_b"; ?></td>
		<td><?php echo "$scr_q4_b"; ?></td>
		<td>
			<?php if($ori_q4_b==$scr_q4_b){ echo "<div id='green'></div>"; } 
			else{ echo "<div id='red'></div>"; } ?>
		</td>
	</tr>
	<tr>
		<td><b>4th Question - C</b></td>
		<td><?php echo "$ori_q4_c"; ?></td>
		<td><?php echo "$scr_q4_c"; ?></td>
		<td>
			<?php if($ori_q4_c==$scr_q4_c){ echo "<div id='green'></div>"; } 
			else{ echo "<div id='red'></div>"; } ?>
		</td>
	</tr>
	<tr>
		<td><b>4th Question - D</b></td>
		<td><?php echo "$ori_q4_d"; ?></td>
		<td><?php echo "$scr_q4_d"; ?></td>
		<td>
			<?php if($ori_q4_d==$scr_q4_d){ echo "<div id='green'></div>"; } 
			else{ echo "<div id='red'></div>"; } ?>
		</td>
	</tr>
	<tr>
		<td><b>4th Question - Total</b></td>
		<td style="color:purple;"><b style="font-size:120%;"><center><?php echo "$total_4"; ?></center></b></td>
		<td style="color:purple;"><b style="font-size:120%;"><center><?php echo "$scr_total_4"; ?></center></b></td>
		<td>
			<?php if($total_4==$scr_total_4){ echo "<div id='green'></div>"; } 
			else{ echo "<div id='red'></div>"; } ?>
		</td>
	</tr>
	<tr>
		<td><b>TOTAL MARKS</b></td>
		<td style="color:red;"><b style="font-size:150%;"><center><?php echo "$ori_sub_tot_marks"; ?></center></b></td>
		<td style="color:red;"><b style="font-size:150%;"><center><?php echo "$scr_sub_tot_marks"; ?></center></b></td>
		<td>
			<?php if($ori_sub_tot_marks==$scr_sub_tot_marks){ echo "<div id='green'></div>"; } 
			else{ echo "<div id='red'></div>"; } ?>
		</td>
	</tr>
	<tr>
		<td colspan="4"><b><center>Objective Marks</center></b></td>
	</tr>	
	<tr>
		<td><b>Objective Marks</b></td>
		<td><center><?php echo "$ori_obj_tot_marks"; ?></td>
		<td><center><?php echo "$scr_obj_tot_marks"; ?></td>
		<td>
			<?php if($ori_obj_tot_marks==$scr_obj_tot_marks){ echo "<div id='green'></div>"; } 
			else{ echo "<div id='red'></div>"; } ?>
		</td>
	</tr>
	
</table><br>
<center>
<script type="text/javascript">
		$(document).ready(function(){
					
			$("#verify").click(function(){
			
				var ori_fac_email = "<?php echo $ori_fac_email ?>";
				var scr_stu_rollno = "<?php echo $scr_stu_rollno ?>";
				var scr_stu_subject = "<?php echo $scr_stu_subject ?>";
				var scr_stu_midtype = "<?php echo $scr_stu_midtype ?>";
				
								
				$.ajax({
					
					url: 'verified.php',
					data: {ori_fac_email:ori_fac_email,scr_stu_rollno:scr_stu_rollno,scr_stu_subject:scr_stu_subject,scr_stu_midtype:scr_stu_midtype},
					type: 'POST',
					success: function(data){
					$("#result").html(data);
                    		
					}
				    
				});
			
			});
	
    	});
		
	</script>
	<script type="text/javascript">
		$(document).ready(function(){
					
			$("#report").click(function(){
			
				var ori_fac_email = "<?php echo $ori_fac_email ?>";
				var scr_stu_rollno = "<?php echo $scr_stu_rollno ?>";
				var scr_stu_subject = "<?php echo $scr_stu_subject ?>";
				var scr_stu_midtype = "<?php echo $scr_stu_midtype ?>";
								
								
				$.ajax({
					
					url: 'report.php',
					data: {ori_fac_email:ori_fac_email,scr_stu_rollno:scr_stu_rollno,scr_stu_subject:scr_stu_subject,scr_stu_midtype:scr_stu_midtype},
					type: 'POST',
					success: function(data){
					$("#result").html(data);
                    		
					}
				    
				});
			
			});
	
    	});
		
	</script>
<input type="submit" name="verify" id="verify" value="verify" >
<input type="submit" name="report" id="report" value="Report To Facualty" >
</center>	

	<div id="result"></div> 
	<div id="report"></div>