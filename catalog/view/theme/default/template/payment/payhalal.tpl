<form action="<?php echo $action; ?>" method="post">
  <input type="hidden" name="app_id" value="<?php echo $app_id; ?>" />
  <input type="hidden" name="amount" value="<?php echo $amount; ?>" />
  <input type="hidden" name="currency" value="<?php echo $currency; ?>" />
  <input type="hidden" name="product_description" value="<?php echo $product_description; ?>" />
  <input type="hidden" name="order_id" value="<?php echo $order_id; ?>" />
  <input type="hidden" name="customer_name" value="<?php echo $customer_name; ?>" />
  <input type="hidden" name="customer_email" value="<?php echo $customer_email; ?>" />
  <input type="hidden" name="customer_phone" value="<?php echo $customer_phone; ?>" />
  <input type="hidden" name="hash" value="<?php echo $hash; ?>" />

  <div class="buttons">
  <center>
  <img src="https://payhalal.my/images/pay-with-payhalal-wc.png" width="700"/><br/><br/>
        <input type="submit" value="Proceed to Payment" id="button-confirm" class="button" />
    </center>
  </div>
</form>