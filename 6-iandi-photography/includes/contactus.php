<section id="title" class="emerald">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h2>Contact Us : </h2>
                    <p>We Provide All The Services Regarding Photography. If U Need Anything Please Contact Us / Or Mail Us Below...</p>
                </div>
                <div class="col-sm-6">
                    
                </div>
            </div>
        </div>
    </section><!--/#title-->     

    <section class="center" id="registration" class="container">
        <fieldset class="registration-form"><h3>Send A Message / Contactus</h3>
		
		    <form action="" method="post" enctype="multipart/form-data">
							
				<input type="text" name="username" size="40" placeholder="username" required="required" class="form-control"/><br>		
                                    
				<input type="text" name="email" size="40" placeholder="email" required="required" class="form-control"/><br>										
								
				<input type="text" name="contact" size="40" placeholder="contact" required="required" class="form-control"/><br>							
								
				<textarea name="message" rows="5" cols="15" placeholder="Message Us (Whats On Your Mind!)" required="required" class="form-control"/></textarea><br>							
								
				
			    <input type="submit" name="submit" value="submit" class="btn btn-default" />
				
									
			<form>
							
					       
            </fieldset>
        
    </section><!--/#registration-->
	
	<?php
    include('connect.php');
   
        if(isset($_POST['submit']))
		{

	         $username = $_POST['username'];
			 $email = $_POST['email'];
             $contact = $_POST['contact'];
             $message = $_POST['message'];
            
			
	       $query = "insert into message (username,email,contact,message) values ('$username','$email','$contact','$message')";		
			
			
			if(mysql_query($query))
			
			{
				
			echo "<script>alert('THANK YOU FOR MESSAGING US WE WILL BE APPROACHING U WITHIN A DAY!')</script>";
			echo "<script>window.open('http://iandiphotography.in/contactus.php','_self')</script>";
			}
			$from = "From: $email";
		    $to = "arjun42u@gmail.com";
		    $subject = "I AND I PHOTOGRAPHY - Message";
         
		   $body = ".$message.";
       
        mail($to, $subject, $body, $from);
        
			

}
?>
	
	
	