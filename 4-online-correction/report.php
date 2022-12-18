<?php
include('connect.php');

if(isset($_POST['ori_fac_email']))
{
	$ori_fac_email = $_POST['ori_fac_email'];
	$scr_stu_rollno = $_POST['scr_stu_rollno'];
	$scr_stu_subject = $_POST['scr_stu_subject'];
	$scr_stu_midtype = $_POST['scr_stu_midtype'];?>
	
	<table>
		<tr>
			<td><center><b style="color:red;">Message To Facualty</b></center></td>
		</tr>
		<tr>
			<td><center><textarea id="message" name="message" rows="5" cols="50" placeholder="Say What You Want To Say To The Facualty"></textarea></center></td>
		</tr>
		<tr>
			<td><input type="submit" name="send" id="send" value="Submit" ></td>
		</tr>
	</table>
	
<?php } ?>
<script type="text/javascript">
		$(document).ready(function(){
					
			$("#send").click(function(){
			
				var ori_fac_email = "<?php echo $ori_fac_email ?>";
				var scr_stu_rollno = "<?php echo $scr_stu_rollno ?>";
				var scr_stu_subject = "<?php echo $scr_stu_subject ?>";
				var scr_stu_midtype = "<?php echo $scr_stu_midtype ?>";
				var message = $("#message").val();				
								
				$.ajax({
					
					url: 'report_message.php',
					data: {ori_fac_email:ori_fac_email,scr_stu_rollno:scr_stu_rollno,scr_stu_subject:scr_stu_subject,scr_stu_midtype:scr_stu_midtype,message:message},
					type: 'POST',
					success: function(data){
					$("#fun").html(data);
                    		
					}
				    
				});
			
			});
	
    	});
		
	</script>	
	<div id="fun"></div>