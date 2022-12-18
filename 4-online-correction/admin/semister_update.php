<?php include('includes/header.php'); ?>

<script type="text/javascript">
		$(document).ready(function(){
					
			$("#four_two").click(function(){
			
				var stu_year = $("#stu_year").val();
												
				$.ajax({
					
					url: 'includes/four_two.php',
					data: {stu_year:stu_year},
					type: 'POST',
					success: function(data){
					$("#update1").html(data);
                                        
					}
				    
				});
			
			});
	
    	});
		
</script>
<script type="text/javascript">
		$(document).ready(function(){
					
			$("#four_one").click(function(){
			
				var stu_year = '4-2';
												
				$.ajax({
					
					url: 'includes/four_one.php',
					data: {stu_year:stu_year},
					type: 'POST',
					success: function(data){
					$("#update2").html(data);
                                        
					}
				    
				});
			
			});
	
    	});
		
</script>
<script type="text/javascript">
		$(document).ready(function(){
					
			$("#three_two").click(function(){
			
				var stu_year = '4-1';
												
				$.ajax({
					
					url: 'includes/three_two.php',
					data: {stu_year:stu_year},
					type: 'POST',
					success: function(data){
					$("#update3").html(data);
                                        
					}
				    
				});
			
			});
	
    	});
		
</script>
<script type="text/javascript">
		$(document).ready(function(){
					
			$("#three_one").click(function(){
			
				var stu_year = '3-2';
												
				$.ajax({
					
					url: 'includes/three_one.php',
					data: {stu_year:stu_year},
					type: 'POST',
					success: function(data){
					$("#update4").html(data);
                                        
					}
				    
				});
			
			});
	
    	});
		
</script>
<script type="text/javascript">
		$(document).ready(function(){
					
			$("#two_two").click(function(){
			
				var stu_year = '3-1';
												
				$.ajax({
					
					url: 'includes/two_two.php',
					data: {stu_year:stu_year},
					type: 'POST',
					success: function(data){
					$("#update5").html(data);
                                        
					}
				    
				});
			
			});
	
    	});
		
</script>
<script type="text/javascript">
		$(document).ready(function(){
					
			$("#two_one").click(function(){
			
				var stu_year = '2-2';
												
				$.ajax({
					
					url: 'includes/two_one.php',
					data: {stu_year:stu_year},
					type: 'POST',
					success: function(data){
					$("#update6").html(data);
                                        
					}
				    
				});
			
			});
	
    	});
		
</script>
<script type="text/javascript">
		$(document).ready(function(){
					
			$("#one_two").click(function(){
			
				var stu_year = '2-1';
												
				$.ajax({
					
					url: 'includes/one_two.php',
					data: {stu_year:stu_year},
					type: 'POST',
					success: function(data){
					$("#update7").html(data);
                                        
					}
				    
				});
			
			});
	
    	});
		
</script>
<script type="text/javascript">
		$(document).ready(function(){
					
			$("#one_one").click(function(){
			
				var stu_year = '1-2';
												
				$.ajax({
					
					url: 'includes/one_one.php',
					data: {stu_year:stu_year},
					type: 'POST',
					success: function(data){
					$("#update8").html(data);
                                        
					}
				    
				});
			
			});
	
    	});
		
</script>	
	<div class="max-device">
		<div class="container">
			<div class="row">
	  
				<div class="col-md-7">
					<div style="display: inline-block; width: 100%; margin: 2px 0px 5px 0;">			
						<div class="col-xs-4">
							<div class="row"> 
								<a href="#" ><b><strong><span style="color:white;font-size:150%;">Online Correction</span></strong></b></a> 
							</div>
						</div>                
					</div>
				</div>
		
				<div class="col-md-5" style="text-align:right;">
					<div class="noti-icon">
					    <a href="index.php">HOME</a>
						<a href="students.php">STUDENTS</a>
						<a href="facaulty.php">FACAULTY</a>
						<a href="subjects.php">SUBJECTS</a>
						<a href="semister_update.php">UPDATES</a>
						<a href="adminlogout.php">LOGOUT</a>
					</div>
                </div>
            </div>
        </div>
	</div>
</div>
</header>

<div class="content">
    <div class="container">
        <div class="row">
		
	        			
			<div class="col-md-12"><br>
		    
				<div class="box shadow postblock">
				
								
					<div class="box shadow postblock">
						 <center><b style="font-size:150%;color:purple;">Update Semisters</b></center>
					</div>
					
							
					<table>
						<tr>
							<td>Update 1st</td>
						    <td style="color:black;"><b>Update 4-2 To End Of The Year</b></td> 
							<td><input type="text" name="stu_year" id="stu_year" required="required" placeholder="End Of The Year(EX:2017)"></td>
							<td><input style="background-color:lightblue;"type="submit" name="four_two" id="four_two" value="UPDATE" ></td>
						    <td id="update1">Result</td>
						</tr>
						<tr>
							<td>Update 2nd</td>
						    <td colspan="2" style="color:black;"><b>Update 4-1 To 4-2</b></td> 
							<td><input style="background-color:lightblue;"type="submit" name="four_one" id="four_one" value="UPDATE" ></td>
						    <td id="update2">Result</td>
						</tr>
						<tr>
							<td>Update 3rd</td>
						    <td colspan="2" style="color:black;"><b>Update 3-2 To 4-1</b></td> 
							<td><input style="background-color:lightblue;"type="submit" name="three_two" id="three_two" value="UPDATE" ></td>
							<td id="update3">Result</td>
						</tr>
						<tr>
							<td>Update 4th</td>
						    <td colspan="2" style="color:black;"><b>Update 3-1 To 3-2</b></td> 
							<td><input style="background-color:lightblue;"type="submit" name="three_one" id="three_one" value="UPDATE" ></td>
							<td id="update4">Result</td>
						</tr>
						<tr>
							<td>Update 5th</td>
						    <td colspan="2" style="color:black;"><b>Update 2-2 To 3-1</b></td> 
							<td><input style="background-color:lightblue;"type="submit" name="two_two" id="two_two" value="UPDATE" ></td>
							<td id="update5">Result</td>
						</tr>
						<tr>
							<td>Update 6th</td>
						    <td colspan="2" style="color:black;"><b>Update 2-1 To 2-2</b></td> 
							<td><input style="background-color:lightblue;"type="submit" name="two_one" id="two_one" value="UPDATE" ></td>
							<td id="update6">Result</td>
						</tr>
						<tr>
							<td>Update 7th</td>
						    <td colspan="2" style="color:black;"><b>Update 1-2 To 2-1</b></td> 
							<td><input style="background-color:lightblue;"type="submit" name="one_two" id="one_two" value="UPDATE" ></td>
							<td id="update7">Result</td>
						</tr>
						<tr>
							<td>Update 8th</td>
						    <td colspan="2" style="color:black;"><b>Update 1-1 To 1-2</b></td> 
							<td><input style="background-color:lightblue;"type="submit" name="one_one" id="one_one" value="UPDATE" ></td>
							<td id="update8">Result</td>
						</tr>
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
