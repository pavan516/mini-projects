<!DOCTYPE html>
<html lang="en">
  <!-- Head -->
  <?php include('includes/head.php'); ?>
  <!-- Head -->

  <!-- user orders css -->
  <?php include('includes/userorders_css.php'); ?>
  <!-- user orders css -->

  <!-- user orders css -->
  <?php include('includes/userordersscript.php'); ?>
  <!-- user orders css -->

<!-- Body -->
<body>
<style>
.pagination__new{
	
    display: inline-block;
    padding-left: 0; 
    margin: 20px 0;
    border-radius: 4px;

}
.pagination__new>li {
    display: inline;
}
.pagination__new>li:first-child>a, .pagination__new>li:first-child>span {
    margin-left: 0;
    border-top-left-radius: 4px;
    border-bottom-left-radius: 4px;
}
.pagination__new>.active>a, .pagination__new>.active>a:focus, .pagination__new>.active>a:hover, .pagination__new>.active>span, .pagination__new>.active>span:focus, .pagination__new>.active>span:hover {
    z-index: 3;
    color: #fff;
    cursor: default;
    background-color: #337ab7;
    border-color: #337ab7;
}
.pagination__new>li>a { 
    background: #fafafa;
    color: #666;
} 
.pagination__new>li>a, .pagination__new>li>span {
    position: relative;
    float: left;
    padding: 6px 12px;
    margin-left: -1px;
    line-height: 1.42857143;
    color: #337ab7;
    text-decoration: none;
    background-color: #fff;
    border: 1px solid #ddd;
}
</style>

  <!-- Pre-loader -->
  <?php include('includes/preloader.php'); ?>
  <!-- Pre-loader -->

  <!-- Main wrapper -->
  <div id="main-wrapper">

    <!-- Header -->
    <?php include('includes/header.php'); ?>
    <!-- Header -->

    <!-- Main Center Body -->
    <div class="content-body">
      <div class="container-fluid" style="padding: 0.5rem 0.5rem;">
        <div class="row">
        
          <!-- Create An Order -->
          <div class="col-md-12">
            <div class="card">
              <div class="card-body" style="padding: 0.5rem 0.5rem;">

                <!-- Error Message -->
                <?php if($this->session->flashdata('error')) {
                  echo '<div class="col-md-12 alert alert-danger">';
                  echo '<strong>'.$this->session->flashdata('error').'</strong>';
                  echo '</div>';
                }?> 
                <!-- Error Message -->
                <!-- Success Message -->
                <?php if($this->session->flashdata('success')) {
                  echo '<div class="col-md-12 alert alert-success">';
                  echo '<strong>'.$this->session->flashdata('success').'</strong>';
                  echo '</div>';
                }?> 
                <!-- Success Message -->

                <!-- Create An Order -->
                <p class="text-muted"><code></code></p>
                <div id="accordion-one" class="accordion">
                  <div class="card">
                    <div class="card-header" style="padding:0.0rem 0.0rem;">
                      <h5 class="mb-0 collapsed" data-toggle="collapse" data-target="#createorder" aria-expanded="false" aria-controls="createorder" style="text-align:center;background-color:blue;color:white;padding:10px;font-size:20px"><b><i class="fa" aria-hidden="true"></i> CREATE NEW ORDER</b></h5>
                    </div>
                    <div id="createorder" class="collapse" data-parent="#accordion-one">
                      <div class="card-body" style="padding: 1rem 0rem;">
                        <!-- Basic Form -->
                        <div class="basic-form">
                          <form id="insertorders" method="post">

                            <!-- Address -->
                            <div class="form-row">
                              <div class="form-group col-md-12">
                                <select id="address_uuid" name="address_uuid" class="form-control">
                                  <?php if(!empty($addresses)) {
                                    foreach($addresses as $address) {?>
                                      <option value="<?php echo $address['uuid']; ?>" selected><?php echo $address['name']; ?></option>
                                    <?php }
                                  } else { ?>
                                    <option value="" selected>Please Create Address & Select Here</option>
                                  <?php } ?>
                                </select>
                              </div>
                            </div>
                            <!-- Address -->

                            <!-- Search -->
                            <div class="input-group" style="margin-bottom: 10px;"> 
                              <input id="searchbar" onkeyup="get_products_search(this.value)" type="text" id="search1" name="search" class="form-control" placeholder="Search" style="font-size:20px;">
                              <div class="input-group-append"> 
                                <button class="btn btn-secondary" type="button">
                                  <i class="fa fa-search"></i>
                                </button>
                              </div>
                            </div>
                            <!-- Search -->

                            <!-- Products List --> 
                            <!-- Products List -->
                            <div class="table" id="myTable1">
                              <!-- Table Headers -->
                              <div class="layout-inline row th th_line">
                                <div class="col col-pro" style="margin-left: 15px;">IMAGE</div>
                                <div class="col col-price">PRODUCT NAME</div>
                                <div class="col">SELLING PRICE</div>
                                <div class="col ">QUANTITY</div>
                              </div> 
                              <!-- Table Headers --> 
							  <ul id='list'></ul> 
                             <ul id="pagination" class="pagination__new"></ul>
                            </div>
                            <!-- Products List --> 
                            <!-- Products List -->
                               
                            <!-- Create Button -->
                            <div style="text-align:center;">
                              <button type="submit" name="submit" id="submit" class="btn btn-primary">Submit</button>
                            </div>
                            <!-- Create Button -->

                            <!-- Insert orders -->
                            <script>  
                            $(document).ready(function()
                            {   
                              $('#insertorders').on('submit', function(event)
                              {
								 
                                event.preventDefault();
                                $.ajax({
                                  url: "<?php echo base_url(); ?>index.php/user/order/insert",
                                  method:"POST",
                                  data:new FormData(this),
                                  contentType:false,
                                  cache:false,
                                  processData:false,
                                  success: function(data) {
                                    top.location.href="<?php echo base_url(); ?>index.php/user/orders"; //redirection
                                  }
                                })
                              });
                            }); 
                            </script>
                            <!-- Insert orders -->
                          
                          </form>
                        </div>
                        <!-- Basic Form -->
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Create An Order -->
                           
              </div>
            </div>
          </div>
          <!-- Create An Order -->

          <!-- List Of Orders -->
          <?php if(!empty($orders)) {?>
            <div class="col-md-12">
              <div class="card">
                <div class="card-body" style="padding: 0.5rem 0.5rem;">

                  <!-- Orders loop -->
                  <?php $collapsed = ""; $expand = true; $show = " show";
                  foreach($orders as $order) {
                    $color = str_pad( dechex( mt_rand( 0, 127 ) ), 2, '0', STR_PAD_LEFT).str_pad( dechex( mt_rand( 0, 127 ) ), 2, '0', STR_PAD_LEFT).str_pad( dechex( mt_rand( 0, 127 ) ), 2, '0', STR_PAD_LEFT);?>

                    <!-- Each Order -->
                    <p class="text-muted"><code></code></p>
                    <div id="accordion-two" class="accordion">
                      <div class="card">

                        <!-- Heading -->
                        <div class="card-header" style="padding:0.0rem 0.0rem;">
                          <h5 class="mb-0<?php echo $collapsed; ?>" data-toggle="collapse" data-target="#accordianTwo_<?php echo $order['uuid']; ?>" aria-expanded="<?php echo $expand; ?>" aria-controls="<?php echo $order['uuid']; ?>" style="background-color:#<?php echo $color; ?>;color:white;padding:10px;font-size:18px"><b><i class="fa" aria-hidden="true"></i> Order Id: <?php echo $order['order_no']." ( ".(new DateTime($order['created_dt']))->format('Y-m-d')." )"; ?> </b></h5>
                        </div>
                        <!-- Heading -->

                        <!-- List of orders -->
                        <div id="accordianTwo_<?php echo $order['uuid']; ?>" class="collapse<?php echo $show; ?>" data-parent="#accordion-two">
                          <div class="card-body" style="padding: 1rem 0rem;">
                            <div class="card">

                              <!-- Heading -->
                              <div class="card mb-4 wow fadeIn" style="margin-bottom: 0rem !important;">
                                <h2 class="input-default" style="text-align:center;background-color:blue;color:white;padding:10px;font-size:20px"><b>ORDER DETAILS</b></h2>
                              </div>
                              <!-- Heading -->

                              <!-- order details-->
                              <table class="table table-striped table-bordered table-hover" width="100%" cellspacing="0">
                                <thead>
                                  <tr style='text-align:center'>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Discount</th>
                                    <th>Total Price</th>
                                  </tr>
                                </thead>  
                                <tbody>  
                                  <?php if(!empty($order['_products'])) {
                                    foreach($order['_products'] as $product) {
                                      echo "<tr style='text-align:center'>";
                                        echo "<td><img src='".base_url().$product['_product']['image']."' style='width:50px;height:50px;'><p>".$product['_product']['name']."</p></td>";
                                        echo "<td>".$product['quantity']." X ".$product['_product']['original_price']." = ".$product['quantity']*$product['_product']['original_price']." ".$order['_products'][0]['_product']['currency']."</td>";
                                        echo "<td>".$product['_product']['discount_pct']." %</td>";
                                        echo "<td>";
                                          echo $product['_product']['currency']." ".$product['quantity']*$product['_product']['selling_price'];
                                        echo "</td>";
                                      echo "</tr>";
                                    }
                                  }?>
                                  <tr>
                                    <td style='text-align:center' colspan="3">Total Original Price</td>
                                    <td><?php echo $order['_products'][0]['_product']['currency']." ".$order['total_original_price']; ?></td>
                                  </tr>
                                  <tr>
                                    <td style='text-align:center' colspan="3">Total Discount</td>
                                    <td><?php echo $order['_products'][0]['_product']['currency']." ".$order['total_discount_price']; ?></td>
                                  </tr>
                                  <tr>
                                    <td style='text-align:center' colspan="3">Total Amount To Pay</td>
                                    <td><?php echo $order['_products'][0]['_product']['currency']." ".$order['total_selling_price']; ?></td>
                                  </tr>
                                  <tr style='text-align:center'>
                                    <td colspan=4>
                                      <form action="<?php echo base_url(); ?>index.php/order/download/bill/<?php echo $order['uuid']; ?>?url=<?php echo $_SERVER['REQUEST_URI']; ?>" method='post'>
                                        <input type='submit' name='submit' class='btn btn-primary' value='Download Bill'>
                                      </form>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                              <!-- order details-->

                              <!-- DOWNLOAD BILL -->
                              <script>  
                              $(document).ready(function()
                              {   
                                $('#downloadbill').on('submit', function(event)
                                {
                                  event.preventDefault();
                                  $.ajax({
                                    url: "<?php echo base_url(); ?>index.php/order/download/bill/<?php echo $order['uuid']; ?>",
                                    method:"POST",
                                    contentType:false,
                                    cache:false,
                                    processData:false,
                                    success: function(data){}
                                  })
                                });
                              }); 
                              </script>
                              <!-- DOWNLOAD BILL -->
      
                            </div>
                          </div>
                        </div>
                        <!-- List of orders -->
                        
                      </div>
                    </div>
                  <?php $collapsed = " collapsed"; $expand = false; $show = ""; } ?>
                  <!-- Orders loop -->
                            
                </div>
              </div>
            </div>
    
          <?php } ?>
          <!-- List Of Orders -->          
                    
        </div>
      </div>
    </div>
    <!-- Main Center Body -->
      
    <!-- Footer -->
    <?php include('includes/footer.php'); ?>
    <!-- Footer -->
<script>
</script>
  </div>
  <!-- Main wrapper -->

  <!-- Footer Scripts -->
  <?php include('includes/footerscripts.php'); ?>
  <!-- Footer Scripts -->
<script>
$(document).ready(function(){
	cpage = 1;
	
	get_products(search = '',cpage);
	
});  
function get_products_search(search){
	get_products(search,1);  
} 
function get_products(search,page)
{
	
	var skey = $.trim(search);   
	//alert(skey);  
	$.ajax({
		url:"", 
		method : "POST",      
		data:{'get':'get_products','page':page,'skey':skey},
		success:function(data){
			data = $.parseJSON(data);
			var base_url = "<?php echo base_url();?>";
			var html='';
			if(data.get_products!='')
			{ 
		
				$.each(data.get_products, function(i){
					var row = data.get_products[i];
					// alert(row.selling_price);
			        var selling_price;
					var currency; 
					var original_price; 
					var check_selling_price;
						selling_price = row.selling_price; 
						currency      = row.currency; 
						original_price = row.original_price; 
				    if(row.selling_price != row.original_price){
					
						check_selling_price = '<p>'+selling_price+' '+currency+' (<strike>'+original_price+' '+currency+'</strike>)</p> ';
					}else{
						
						check_selling_price = '<p>'+selling_price+' '+currency+' </p> '; 
					}
 
				   
					html+=' <li class="products"><div class="layout-inline row" id="myTable"> <div class="col col-pro img_div" style="margin-left: 20px;"><img src='+base_url+''+row.image+' alt="Image Missing" style="width: 80px; height: 50px;"></div> <div class="col col-name"><p>'+row.name+'<br></p> </div><div class="col col-price">'+check_selling_price+'</div><div class="quantity buttons_added col col-qty layout-inline"><input type="button" value="-" class="minus"><input type="number" step="1" min="0" max="1000" name="products['+row.uuid+']" id="product['+row.uuid+' ?>]" value="0" title="Qty" class="input-text qty text" size="4" pattern="" inputmode=""><input type="button" value="+" class="plus"></div></div> </li>';
					//alert(html); 
				});  
			}    
			else
				html+="<td></td><td></td><td>No Results Found..</td><td></td><td></td>";
			$('#list').html(html); 
		
			$('#pagination').html(data.pagination);  
			$('#pagination').find('li').click(function(){ 
            var target = $('#myTable1');	 		
			$('html,body').animate({
            scrollTop: target.offset().top
        }, 1000);
				get_products('',$(this).attr('page'));  
			});
		} 
	});
}

</script>
</body>
</html>