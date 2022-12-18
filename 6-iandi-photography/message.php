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
			echo "<script>window.open('contactus.php','_self')</script>";
			}
			$from = "From: $email";
		    $to = "arjun42u@gmail.com";
		    $subject = "I AND I PHOTOGRAPHY - Message";
         
		   $body = ".$message.";
       
        mail($to, $subject, $body, $from);
        
			

}
?>