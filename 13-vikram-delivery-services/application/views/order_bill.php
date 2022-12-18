<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Order Bill</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/pdf/css/style.css" media="all" />
  </head>
  <body>
    <main>
      <p style="text-align:left;"><?php echo "DATE: ".$order['delivered_at']; ?></p>
      <h1 class="clearfix">
        INVOICE FOR ORDER NO <?php echo $order['order_no']; ?>
      </h1>
      <table>
        <thead>
          <tr>
            <th class="service">ID</th>
            <th class="desc">PRODUCT</th>
            <th class="unit">QUANTITY</th>
            <th class="qty">UNITS</th>
            <th class="total">PRICE</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          if(!empty($order['_products'])) {
            $count = 1;
            foreach($order['_products'] as $product) {?>
              <tr>
                <td class="service"><?php echo $count; ?></td>
                <td class="desc"><?php echo $product['product']; ?></td>
                <td class="unit"><?php echo $product['quantity']; ?></td>
                <td class="qty"><?php echo $product['units']; ?></td>
                <td class="total"><?php echo $product['customer_price']." RS"; ?></td>
              </tr>
            <?php }
          }?>
          <tr>
            <td colspan="4" class="sub">SUBTOTAL</td>
            <td class="sub total"><?php echo $order['total_customer_price']." RS"; ?></td>
          </tr>
          <tr>
            <td colspan="4">Delivery Charges</td>
            <td class="total"><?php echo $order['delivery_charges']." RS"; ?></td>
          </tr>
          <tr>
            <td colspan="4" class="grand total">GRAND TOTAL</td>
            <td class="grand total"><?php echo $order['total_customer_price']+$order['delivery_charges']." RS"; ?></td>
          </tr>
        </tbody>
      </table>
      <div id="details" class="clearfix">
        <div id="company">
          <div class="arrow back"><div class="inner-arrow">Company Name <span>VIKRAM DELIVERY SERVICES</span></div></div>
          <div class="arrow back"><div class="inner-arrow">MOBILE <span>8187848405</span></div></div>
        </div>
      </div>
    </main>
    <footer style="text-align:center">
      Invoice was created on a computer and is valid without the signature and seal.
    </footer>
  </body>
</html>