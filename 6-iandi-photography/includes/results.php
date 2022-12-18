<section id="portfolio" class="container">
        <ul class="portfolio-filter">
            
				<form method="get" action="results.php" enctype="multipart/form-data">
                        <li><div class="input-group">
                            <input type="text" class="form-control" name="search_query" autocomplete="off" placeholder="Search For A Required Image">
                            <span class="input-group-btn">
                                <input class="btn btn-danger" type="submit" name="search" value="Search">
                            </span>
                        </div></li>
                    </form>
			
        </ul><!--/#portfolio-filter-->

        <ul class="portfolio-items col-3">
		
		                    <?php
						    include("connect.php");
                            if(isset($_GET['search']))
					        {
												
						        $get_query = $_GET['search_query'];
												
						        $get_posts = "select * from posts where post_name like '%$get_query%'";
						
						        $run_posts = mysql_query($get_posts);
						
						        while ($row_posts = mysql_fetch_array($run_posts))
						        {
							        $post_id = $row_posts['post_id'];
							        $post_name = $row_posts['post_name'];
                                    $post_image = $row_posts['post_image'];
									$post_date = $row_posts['post_date'];
							        			
						    ?>
							
                            <li class="portfolio-item apps">
                                <div class="item-inner">
								    <?php echo "<img src='post_images/$post_image'/>"; ?>
                                    <h5><?php echo $post_name ?></h5>
                                    <div class="overlay">
                                        <a class="preview btn btn-danger" <?php echo "href='post_images/$post_image'"; ?> rel="prettyPhoto"><i class="icon-eye-open"></i></a>             
                                    </div>           
                                </div>           
                            </li><!--/.portfolio-item-->
			
			                <?php } ?>
							<?php } ?>
        </ul>
    </section><!--/#portfolio-->