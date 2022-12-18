<?php
include('includes/header.php');
?>

<div class="content">
    <div class="container">
        <div class="row">
		
	        			
			<div class="col-md-12"><br>
		    
				<div class="box shadow postblock">
				
				<div class="box shadow postblock">
				    <h4 style="color:green;">Search For A Student With His RollNo Or With His Name</h4>
				    <form method="get" action="search.php">
					    <table>
						    <tr>
								<td><input type="text" name="search_query" id="search_query" class="form-control" placeholder="Search For A Student"></td>
							</tr>
						</table>   
					</form>
				</div>
				
				<div class="box shadow postblock">
				     <center><b style="font-size:150%;color:purple;">Students Information</b></center>
				</div>
				
					<form action="students_display.php" method="post" enctype="multipart/form-data">
						
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
							
							
						</table><br>
						
						<center><input style="background-color:lightblue;" type="submit" name="submit" value="submit" class="btn btn-default"></center>
                        
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
