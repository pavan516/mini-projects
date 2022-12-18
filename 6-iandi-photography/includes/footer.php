    <section id="bottom" class="wet-asphalt">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <h4>ABOUT US</h4>
                    <p>I feel that wildlife photography has an important purpose: powerful images help connect people with our natural heritage and stimulate a commitment to conservation.</p>
                </div><!--/.col-md-3-->

                <div class="col-md-3 col-sm-6">
                    <h4>IMAGES</h4>
                    <div>
					<ul class="arrow">
					<?php
						    include("connect.php");
												
						    $get_cats = "select * from postscatg";
						    $run_cats = mysql_query($get_cats);
						
						    while ($cats_row=mysql_fetch_array($run_cats))
						    {
							    $cat_id = $cats_row['cat_id'];
							    $cat_title = $cats_row['cat_title'];
							
							    echo "<li><a href='postscatg.php?cat=$cat_id'>$cat_title</a></li>";	
						    }
							
					        ?>
					 </ul>
                    </div>
                </div><!--/.col-md-3-->

                <div class="col-md-3 col-sm-6">
                    <h4>Latest Images</h4>
                    <div>
					
					<?php
						    include("connect.php");
                            		
											
						        $get_posts = "select * from posts ORDER by 1 DESC LIMIT 0,3";
						
						        $run_posts = mysql_query($get_posts);
						
						        while ($row_posts = mysql_fetch_array($run_posts))
						        {
							        $post_id = $row_posts['post_id'];
							        $post_name = $row_posts['post_name'];
                                    $post_image = $row_posts['post_image'];
									$post_long_image = $row_posts['post_long_image'];
									$post_date = $row_posts['post_date'];
							        			
						    ?>
							<div class="media">
                                <div class="pull-left">
                                    <?php echo "<img src='post_images/$post_image' width='70' height='70'/>"; ?>
                                </div>
                                <div class="media-body">
                                <span class="media-heading"><?php echo $post_name ?></span>
                                <small class="muted"><?php echo $post_date ?></small>
                            </div>
                        </div>
                            
			
			                <?php } ?>
					
                    </div>  
                </div><!--/.col-md-3-->

                <div class="col-md-3 col-sm-6">
                    <h4>ADDRESS : </h4>
                    <address>
                        <strong>Plot No : 7-131</strong><br>
                        Sai Prabhu Homes<br>
                        Badangpet<br>
						Hyderabad<br>
                        <abbr title="Phone">Contact : </abbr>9885963158
                    </address>
                    <h4>Subscription </h4>
                    <form role="form">
                        <div class="input-group">
                            <input type="text" class="form-control" autocomplete="off" placeholder="Enter your email">
                            <span class="input-group-btn">
                                <button class="btn btn-danger" type="button">Subscribe</button>
                            </span>
                        </div>
                    </form>
                </div> <!--/.col-md-3-->
            </div>
        </div>
    </section><!--/#bottom-->

    <footer id="footer" class="midnight-blue">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    &copy; 2017 <a target="_blank" href="http://shapebootstrap.net/" title="Free Twitter Bootstrap WordPress Themes and HTML templates">I AND I PHOTOGRAPHY</a>. All Rights Reserved.
                </div>
                
            </div>
        </div>
    </footer><!--/#footer-->

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>