<?php 
include('includes/header1.php');
?>

    
    <section id="registration" class="container">
        <form action="" class="center" role="form" method="post" enctype="multipart/form-data">
            <fieldset class="registration-form"><h3 style="color:green;">Post A Image</h3>
                                
								<div class="form-group">
                                    <input type="text" class="form-control" name="post_name" size="60" placeholder="Say Something About Your Post" required="required"/>							
								</div>
								
								<div class="form-group">
								
								    <table>
								    <tr>
								    <td align="right"><strong>Post Category:</strong></td>
									<td><select name="cat">
									    <option value="null" required="required">select a Category</option>
										<?php
										 include("connect.php");
										 
										 $get_cats = "select * from postscatg";
										 
										 $run_cats = mysql_query($get_cats);
										 
										 while ($cats_row=mysql_fetch_array($run_cats)){
											 
											 $cat_id=$cats_row['cat_id'];
											 $cat_title=$cats_row['cat_title'];
											 
											 echo "<option value='$cat_id'>$cat_title</option>";
											 
										 } ?>
									</td>								
								    </tr>
								    </table>
								</div>
								
								<div class="form-group">
								    <strong>Select A Image To Upload(short Image)<br></strong>
								    <input type="file" name="post_image" size="60" required="required"/>
								</div>

                                <div class="form-group">
								    <strong>Select A Image To Upload (Long And Original Image)<br></strong>
								    <input type="file" name="post_long_image" size="60" required="required"/>
								</div>								
								
								<div class="form-group" class="floatright">
                                    <center><button type="submit" class="btn btn-primary btn-lg" name="submit" value="Publish">Publish</button></center>
                                </div>
            </fieldset>
        </form>
    </section><!--/#registration-->
	
	
	
	                            <?php
                            
							include("connect.php");
                            if(isset($_POST['submit']))
                            {
	                           
	                           $post_cat = $_POST['cat'];
	                           $post_name = $_POST['post_name'];
	                           $post_image = $_FILES['post_image']['name'];
							   $post_image_tmp = $_FILES['post_image']['tmp_name'];
							   $post_long_image = $_FILES['post_long_image']['name'];
							   $post_long_image_tmp = $_FILES['post_long_image']['tmp_name'];
	
	
	                           if($post_name=='' OR $post_cat=='null' OR $post_image=='' OR $post_long_image=='')
	                           {
		                            echo "<script>alert('Please Fill In all the fields')</script>";
		                            exit();
	                           }
	                           else
	                           {
		                            move_uploaded_file($post_image_tmp, "post_images/$post_image");
									move_uploaded_file($post_long_image_tmp, "post_long_images/$post_long_image");
	
	                                $insert_posts = "insert into posts (category_id,post_name,post_image,post_long_image,post_date)
                	                values ('$post_cat','$post_name','$post_image','$post_long_image',NOW())";
	
	                                $run = mysql_query($insert_posts);
	 
	                                if($run)
	                                {
	                                    echo "<script>alert('Your Post Has Been Published Arjun!')</script>";
		                                echo"<script>window.open('adminposts.php','_self')</script>";
   	                                }
	
	
	                            } 
}

                            ?>
	
<?php 
include('includes/footer.php');
?>
