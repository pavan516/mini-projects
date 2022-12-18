<?php
session_start();
?>
<html>
     <head>
	    <title>
		   Login Form
		</title>
    
<form method='post' action='facaulty.php'>
       <table width='350' border='10' align='center'>
	   <center><h3 style="color:black;">LOGIN HERE</h3></center><br>
	   
	   
	   <tr style="color:black;">
	     <b><strong><td colspan='5' align='center'>ROLLNO :</strong></b></td>
		  <td colspan='5' align='center'><input type='text' name='id' /></td>
	   </tr>  
	   
	   
	   <tr style="color:black;">
	       <b><strong><td colspan='5' align='center'>Password:</strong></b></td>
		  <td colspan='5' align='center'><input type='password' name='pass' /></td>
	   </tr>  
	   	   
	   </table><br>
	  
	  <table width='30' border='4' align='center'>
	    <tr>
		<td>
		  <input type='submit' name='login' value='Login' />
		</td>
		</tr>
		</table><br>
		


</form>
</body>
</html>	

<?php

include('connect.php');

if(isset($_POST['login'])){

    
	$id = $_POST['id'];
	$pass = $_POST['pass'];
	
	$check_user = "select * from facaulty where id='$id' AND pass='$pass'";

    $run = mysql_query($check_user);
	if(mysql_num_rows($run)>0){
	
	$_SESSION['id']=$id;
	
	
	echo
	"<script>window.open('welcome.php','_self')</script>";
}

else {
 
    echo
    "<script>alert('UserName or Password is incorrect!')</script>";	
	
}
}

?>