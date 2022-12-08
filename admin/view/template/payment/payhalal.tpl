<?php echo $header; ?>
<div id="content">
    <div class="breadcrumb">
        <?php foreach ($breadcrumbs as $breadcrumb) { ?>
        <?php echo $breadcrumb['separator']; ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
        <?php } ?>
    </div>
    <?php if ($error_warning) { ?>
    <div class="warning"><?php echo $error_warning; ?></div>
    <?php } ?>
    <div class="box">
        <div class="heading">
          <h1><img src="view/image/payment.png" alt="" /> <?php echo $heading_title; ?></h1>
          <div class="buttons"><a onclick="$('#form').submit();" class="button"><span><?php echo $button_save; ?></span></a><a onclick="location = '<?php echo $cancel; ?>';" class="button"><span><?php echo $button_cancel; ?></span></a></div>
        </div>
        <div class="content">
            <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">
                <table class="form">
                    <tr>
                        <td><?php echo $app_live_key_text; ?></td>
                        <td><input type="text" name="app_live_key" value="<?php echo $app_live_key; ?>" size="50"/>
                        <?php if ($error_live_app_key) { ?>
                        <span class="error"><?php echo $error_live_app_key; ?></span>
                        <?php } ?>
                        </td>
                    </tr>
                    <tr>
                      <td><?php echo $app_live_secret_text ?></td>
                      <td><input type="text" name="app_live_secret" value="<?php echo $app_live_secret; ?>" size="50"/>
                        <?php if ($error_live_secret_key) { ?>
                        <span class="error"><?php echo $error_live_secret_key; ?></span>
                        <?php } ?>
                      </td>
                    </tr>
                    <tr>
                    <tr>
                        <td><?php echo $app_live_key_testing_text; ?></td>
                        <td><input type="text" name="app_live_key_testing" value="<?php echo $app_live_key_testing; ?>" size="50" />
                        <?php if ($error_live_app_key) { ?>
                        <span class="error"><?php echo $error_live_app_key_testing; ?></span>
                        <?php } ?>
                        </td>
                    </tr>
                    <tr>
                      <td><?php echo $app_live_secret_testing_text ?></td>
                      <td><input type="text" name="app_live_secret_testing" value="<?php echo $app_live_secret_testing; ?>" size="50" />
                        <?php if ($error_live_secret_key) { ?>
                        <span class="error"><?php echo $error_live_secret_key_testing; ?></span>
                        <?php } ?>
                      </td>
                    </tr>
                    <tr>
                      <td><?php echo $mode_text; ?></td>
                      <td><select name="mode_payment">
                        <?php if ($mode_payment == 1) { ?>
                          <option value="1" selected="selected">LIVE</option>
                          <option value="2">TESTING</option>
                        <?php } else { ?>  
                          <option value="1">LIVE</option>
                          <option value="2" selected="selected">TESTING</option>
                        <?php } ?>  
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td><?php echo $entry_order_status; ?></td>
                      <td><select name="payhalal_order_status_id">
                          <?php foreach ($order_statuses as $order_status) { ?>
                          <?php if ($order_status['order_status_id'] == $payhalal_order_status_id) { ?>
                          <option value="<?php echo $order_status['order_status_id']; ?>" selected="selected"><?php echo $order_status['name']; ?></option>
                          <?php } else { ?>
                          <option value="<?php echo $order_status['order_status_id']; ?>"><?php echo $order_status['name']; ?></option>
                          <?php } ?>
                          <?php } ?>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td><?php echo $entry_pending_status; ?></td>
                      <td><select name="payhalal_pending_status_id">
                          <?php foreach ($order_statuses as $order_status) { ?>
                          <?php if ($order_status['order_status_id'] == $payhalal_pending_status_id) { ?>
                          <option value="<?php echo $order_status['order_status_id']; ?>" selected="selected"><?php echo $order_status['name']; ?></option>
                          <?php } else { ?>
                          <option value="<?php echo $order_status['order_status_id']; ?>"><?php echo $order_status['name']; ?></option>
                          <?php } ?>
                          <?php } ?>
                        </select>
                      </td>
                    </tr>
                    <tr>
                        <td><?php echo $entry_success_status; ?></td>
                        <td><select name="payhalal_success_status_id">
                            <?php foreach ($order_statuses as $order_status) { ?>
                            <?php if ($order_status['order_status_id'] == $payhalal_success_status_id) { ?>
                            <option value="<?php echo $order_status['order_status_id']; ?>" selected="selected"><?php echo $order_status['name']; ?></option>
                            <?php } else { ?>
                            <option value="<?php echo $order_status['order_status_id']; ?>"><?php echo $order_status['name']; ?></option>
                            <?php } ?>
                            <?php } ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><?php echo $entry_failed_status; ?></td>
                        <td><select name="payhalal_failed_status_id">
                            <?php foreach ($order_statuses as $order_status) { ?>
                            <?php if ($order_status['order_status_id'] == $payhalal_failed_status_id) { ?>
                            <option value="<?php echo $order_status['order_status_id']; ?>" selected="selected"><?php echo $order_status['name']; ?></option>
                            <?php } else { ?>
                            <option value="<?php echo $order_status['order_status_id']; ?>"><?php echo $order_status['name']; ?></option>
                            <?php } ?>
                            <?php } ?>
                          </select>
                        </td>
                    </tr>
                    <tr>
                        <td><?php echo $entry_status; ?></td>
                        <td><select name="payhalal_status">
                            <?php if ($payhalal_status) { ?>
                            <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                            <option value="0"><?php echo $text_disabled; ?></option>
                            <?php } else { ?>
                            <option value="1"><?php echo $text_enabled; ?></option>
                            <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                            <?php } ?>
                          </select>
                        </td>
                    </tr>
                    <tr>
                        <td><?php echo $entry_sort_order; ?></td>
                        <td><input type="text" name="payhalal_sort_order" value="<?php echo $payhalal_sort_order; ?>" size="1" /></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<?php echo $footer; ?>
