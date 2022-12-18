<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Order Bill</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/pdf/css/style.css" media="all" />
  </head>
  <body>
    <main>
      <p style="text-align:left;">DATE: <?php $date = empty($order['delivered_at']) ? date('Y-m-d') : $order['delivered_at']; echo $date; ?></p>
      <h1 class="clearfix">
        INVOICE FOR ORDER NO <?php echo $order['order_no']; ?>
      </h1>
      <table>
        <thead>
          <tr>
            <th class="service">ID</th>
            <th class="desc">PRODUCT</th>
            <th class="name">NAME</th>
            <th class="price">PRICE</th>
            <th class="qty">QUANTITY</th>
            <th class="discount">DISCOUNT</th>
            <th class="total">FINAL PRICE</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          if(!empty($order['_products'])) {
            $count = 1;
            foreach($order['_products'] as $product) {?>
              <tr>
                <td class="service"><?php echo $count; ?></td>
                <td class="desc"><?php echo "<img src='".base_url().$product['_product']['image']."' style='width:50px;height:50px;'>"; ?></td>
                <td class="name"><?php echo $product['_product']['name']; ?></td>
                <td class="price"><?php echo $product['_product']['original_price']." ".$order['_products'][0]['_product']['currency']; ?></td>
                <td class="qty"><?php echo $product['quantity']; ?></td>
                <td class="discount"><?php echo $product['quantity']*($product['_product']['original_price']-$product['_product']['selling_price'])." ".$order['_products'][0]['_product']['currency']." (".$product['_product']['discount_pct']."%)"; ?></td>
                <td class="total"><?php echo $product['quantity']*$product['_product']['selling_price']." ".$order['_products'][0]['_product']['currency']; ?></td>
              </tr>
              <?php $count++;
            }
          }?>
          <tr>
            <td colspan="3" class="sub">ORIGINAL PRICE</td>
            <td class="sub total"><?php echo $order['total_original_price']." ".$order['_products'][0]['_product']['currency']; ?></td>
            <td colspan="2">DISCOUNT PRICE</td>
            <td class="total"><?php echo $order['total_discount_price']." ".$order['_products'][0]['_product']['currency']; ?></td>
          </tr>
          <tr>
            <td colspan="6" class="grand total">GRAND TOTAL</td>
            <td class="grand total"><?php echo $order['total_selling_price']." ".$order['_products'][0]['_product']['currency']; ?></td>
          </tr>
        </tbody>
      </table>
      <div id="details" class="clearfix">
        <div id="company">
          <div class="arrow back"><div class="inner-arrow">Company Name <span>MRSOFT SOLUTIONS</span></div></div>
          <div class="arrow back"><div class="inner-arrow">MOBILE <span>8008344615</span></div></div>
        </div>
      </div>
    </main>
    <footer style="text-align:center">
      Invoice was created on a computer and is valid without the signature and seal.
    </footer>
  </body>
</html>