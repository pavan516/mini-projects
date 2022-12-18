<?php include('includes/header.php'); ?>


<div class="content">
    <div class="container">
        <div class="row">
		
	        			
			<div class="col-md-12"><br>
		    
				<div class="box shadow postblock">
					<table>
						<tr>
							<td colspan="6"><center><b style="color:green;font-size:150%;">Facualty Members</b></center></td>
						</tr>
						<tr>
							<td>Facualty Name</td>
							<td>Facualty Email</td>
							<td>Facualty Department</td>
							<td>Facualty Contact</td>
							<td>Facualty Image</td>
							<td>Delete</td>
						</tr>
						
						<?php
					    include('connect.php');
					
					    $query = mysqli_query($mysqli,"SELECT * FROM register");
					    while($row = mysqli_fetch_array($query))
					    {
						    $fac_name = $row['fac_name'];
						    $fac_email = $row['fac_email'];	
					        $fac_department = $row['fac_department'];
							$fac_contact = $row['fac_contact'];
						    $fac_image = $row['fac_image'];	
					        
							echo    
							"<tr>
						        <td>$fac_name</td>
								<td>$fac_email</td>
								<td>$fac_department</td>
								<td>$fac_contact</td>
								<td><img src='fac_images/$fac_image' width='100' height='100'></td>
								<td><button><a href='delete_facaulty.php?fac_email=$fac_email' >Delete</a></button></td>
							</tr>";
						}
						?><?php include('delete_facaulty.php'); ?>
					
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
