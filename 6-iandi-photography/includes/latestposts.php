<section id="recent-works">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h3>Our Latest Images</h3>
                    <p>I feel that wildlife photography has an important purpose: powerful images help connect people with our natural heritage and stimulate a commitment to conservation.</p>
                    <div class="btn-group">
                        <a class="btn btn-danger" href="#scroller" data-slide="prev"><i class="icon-angle-left"></i></a>
                        <a class="btn btn-danger" href="#scroller" data-slide="next"><i class="icon-angle-right"></i></a>
                    </div>
                    <p class="gap"></p>
                </div>
                <div class="col-md-9">
                    <div id="scroller" class="carousel slide">
                        <div class="carousel-inner">
                            <div class="item active">
                                <div class="row">
                                    <div class="col-xs-4">
                                        <div class="portfolio-item">
                                            <div class="item-inner">
                                                <?php
						    include("connect.php");
                            		
											
						        $get_posts = "select * from posts ORDER by 1 DESC LIMIT 0,1";
						
						        $run_posts = mysql_query($get_posts);
						
						        while ($row_posts = mysql_fetch_array($run_posts))
						        {
							        $post_id = $row_posts['post_id'];
							        $post_name = $row_posts['post_name'];
                                    $post_image = $row_posts['post_image'];
									$post_long_image = $row_posts['post_long_image'];
									$post_date = $row_posts['post_date'];
							        			
						    ?>
							
                            <li class="portfolio-item apps">
                                <div class="item-inner">
								    <?php echo "<img src='post_images/$post_image'/>"; ?>
                                    <h5><?php echo $post_name ?></h5>
                                    <div class="overlay">
                                        <a class="preview btn btn-danger" <?php echo "href='post_long_images/$post_long_image'"; ?> rel="<?php echo $post_name ?>"><i class="icon-eye-open"></i></a>             
                                    </div>           
                                </div>           
                            </li><!--/.portfolio-item-->
			
			                <?php } ?>
							
                                            </div>
                                        </div>
                                    </div>                            
                                    <div class="col-xs-4">
                                        <div class="portfolio-item">
                                            <div class="item-inner">
                                                
                                               <?php
						    include("connect.php");
                            		
											
						        $get_posts = "select * from posts ORDER by 1 DESC LIMIT 1,1";
						
						        $run_posts = mysql_query($get_posts);
						
						        while ($row_posts = mysql_fetch_array($run_posts))
						        {
							        $post_id = $row_posts['post_id'];
							        $post_name = $row_posts['post_name'];
                                    $post_image = $row_posts['post_image'];
									$post_long_image = $row_posts['post_long_image'];
									$post_date = $row_posts['post_date'];
							        			
						    ?>
							
                            <li class="portfolio-item apps">
                                <div class="item-inner">
								    <?php echo "<img src='post_images/$post_image'/>"; ?>
                                    <h5><?php echo $post_name ?></h5>
                                    <div class="overlay">
                                        <a class="preview btn btn-danger" <?php echo "href='post_long_images/$post_long_image'"; ?> rel="<?php echo $post_name ?>"><i class="icon-eye-open"></i></a>             
                                    </div>           
                                </div>           
                            </li><!--/.portfolio-item-->
			
			                <?php } ?>
                                            </div>
                                        </div>
                                    </div>                            
                                    <div class="col-xs-4">
                                        <div class="portfolio-item">
                                            <div class="item-inner">
                                                <?php
						    include("connect.php");
                            		
											
						        $get_posts = "select * from posts ORDER by 1 DESC LIMIT 2,1";
						
						        $run_posts = mysql_query($get_posts);
						
						        while ($row_posts = mysql_fetch_array($run_posts))
						        {
							        $post_id = $row_posts['post_id'];
							        $post_name = $row_posts['post_name'];
                                    $post_image = $row_posts['post_image'];
									$post_long_image = $row_posts['post_long_image'];
									$post_date = $row_posts['post_date'];
							        			
						    ?>
							
                            <li class="portfolio-item apps">
                                <div class="item-inner">
								    <?php echo "<img src='post_images/$post_image'/>"; ?>
                                    <h5><?php echo $post_name ?></h5>
                                    <div class="overlay">
                                        <a class="preview btn btn-danger" <?php echo "href='post_long_images/$post_long_image'"; ?> rel="<?php echo $post_name ?>"><i class="icon-eye-open"></i></a>             
                                    </div>           
                                </div>           
                            </li><!--/.portfolio-item-->
			
			                <?php } ?>   
                                            </div>
                                        </div>
                                    </div>
                                </div><!--/.row-->
                            </div><!--/.item-->
                            <div class="item">
                                <div class="row">
                                    <div class="col-xs-4">
                                        <div class="portfolio-item">
                                            <div class="item-inner">
                                                <?php
						    include("connect.php");
                            		
											
						        $get_posts = "select * from posts ORDER by 1 DESC LIMIT 3,1";
						
						        $run_posts = mysql_query($get_posts);
						
						        while ($row_posts = mysql_fetch_array($run_posts))
						        {
							        $post_id = $row_posts['post_id'];
							        $post_name = $row_posts['post_name'];
                                    $post_image = $row_posts['post_image'];
									$post_long_image = $row_posts['post_long_image'];
									$post_date = $row_posts['post_date'];
							        			
						    ?>
							
                            <li class="portfolio-item apps">
                                <div class="item-inner">
								    <?php echo "<img src='post_images/$post_image'/>"; ?>
                                    <h5><?php echo $post_name ?></h5>
                                    <div class="overlay">
                                        <a class="preview btn btn-danger" <?php echo "href='post_long_images/$post_long_image'"; ?> rel="<?php echo $post_name ?>"><i class="icon-eye-open"></i></a>             
                                    </div>           
                                </div>           
                            </li><!--/.portfolio-item-->
			
			                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-4">
                                        <div class="portfolio-item">
                                            <div class="item-inner">
                                                <?php
						    include("connect.php");
                            		
											
						        $get_posts = "select * from posts ORDER by 1 DESC LIMIT 4,1";
						
						        $run_posts = mysql_query($get_posts);
						
						        while ($row_posts = mysql_fetch_array($run_posts))
						        {
							        $post_id = $row_posts['post_id'];
							        $post_name = $row_posts['post_name'];
                                    $post_image = $row_posts['post_image'];
									$post_long_image = $row_posts['post_long_image'];
									$post_date = $row_posts['post_date'];
							        			
						    ?>
							
                            <li class="portfolio-item apps">
                                <div class="item-inner">
								    <?php echo "<img src='post_images/$post_image'/>"; ?>
                                    <h5><?php echo $post_name ?></h5>
                                    <div class="overlay">
                                        <a class="preview btn btn-danger" <?php echo "href='post_long_images/$post_long_image'"; ?> rel="<?php echo $post_name ?>"><i class="icon-eye-open"></i></a>             
                                    </div>           
                                </div>           
                            </li><!--/.portfolio-item-->
			
			                <?php } ?>
                                            </div>
                                        </div>
                                    </div>                            
                                    <div class="col-xs-4">
                                        <div class="portfolio-item">
                                            <div class="item-inner">
                                                <?php
						    include("connect.php");
                            		
											
						        $get_posts = "select * from posts ORDER by 1 DESC LIMIT 5,1";
						
						        $run_posts = mysql_query($get_posts);
						
						        while ($row_posts = mysql_fetch_array($run_posts))
						        {
							        $post_id = $row_posts['post_id'];
							        $post_name = $row_posts['post_name'];
                                    $post_image = $row_posts['post_image'];
									$post_long_image = $row_posts['post_long_image'];
									$post_date = $row_posts['post_date'];
							        			
						    ?>
							
                            <li class="portfolio-item apps">
                                <div class="item-inner">
								    <?php echo "<img src='post_images/$post_image'/>"; ?>
                                    <h5><?php echo $post_name ?></h5>
                                    <div class="overlay">
                                        <a class="preview btn btn-danger" <?php echo "href='post_long_images/$post_long_image'"; ?> rel="<?php echo $post_name ?>"><i class="icon-eye-open"></i></a>             
                                    </div>           
                                </div>           
                            </li><!--/.portfolio-item-->
			
			                <?php } ?>
							<div class="overlay">
                                        <a class="preview btn btn-danger" <?php echo "href='post_long_images/$post_long_image'"; ?> rel="<?php echo $post_name ?>"><i class="icon-eye-open"></i></a>             
                                    </div> 
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!--/.item-->
                        </div>
                    </div>
                </div>
            </div><!--/.row-->
        </div>
    </section><!--/#recent-works-->