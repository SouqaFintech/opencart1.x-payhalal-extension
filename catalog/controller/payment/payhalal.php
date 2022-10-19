<?php
/**
 * Payhalal OpenCart Plugin
 * 
 * @package Payment Gateway
 * @author Payhalal Technical Team tech_dept@payhalal.my
 * @version 1.0.1
 */

class ControllerPaymentPayhalal extends Controller {
    
    protected function index() {

        header('Set-Cookie: ' . $this->config->get('session_name') . '=' . $this->session->getId() . '; SameSite=None; Secure' . '; HttpOnly');

        $this->data['button_confirm'] = $this->language->get('button_confirm');
        
        $this->load->model('checkout/order');

        $order_info = $this->model_checkout_order->getOrder($this->session->data['order_id']);

        if ($this->config->get('mode_payment') == 1) {
            $this->data['action'] = 'https://api.payhalal.my/pay';
            $this->data["app_id"] = $this->config->get('app_live_key');
            $this->data["secret_key"] = $this->config->get('app_live_secret');
        }
        else {
            $this->data['action'] = 'https://api-testing.payhalal.my/pay';
            $this->data["app_id"] = $this->config->get('app_live_key_testing');
            $this->data["secret_key"] = $this->config->get('app_live_secret_testing');
        }

        $this->data["amount"] = $this->currency->format($order_info['total'], $order_info['currency_code'], $order_info['currency_value'], false);
        $this->data["currency"] = $order_info['currency_code'];
        $this->data["order_id"] = $order_info['order_id'];
        $this->data["product_description"]  = "Opencart Order ID ".$order_info['order_id'];
        $this->data["customer_name"]      = $order_info['payment_firstname']." ".$order_info['payment_lastname'];
        $this->data["customer_email"]         = $order_info['email'];
        $this->data["customer_phone"]         = $order_info['telephone'];
        $this->data["hash"] =  hash('sha256',$this->data["secret_key"].$this->data["amount"].$this->data["currency"].$this->data["product_description"].$this->data["order_id"].$this->data["customer_name"].$this->data["customer_email"].$this->data["customer_phone"]);

        if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/payment/payhalal.tpl')) {
                $this->template = $this->config->get('config_template') . '/template/payment/payhalal.tpl';
        } else {
                $this->template = 'default/template/payment/payhalal.tpl';
        }   
    
        $this->render();
    }
	
	public function status() 
    {

        header('Set-Cookie: ' . $this->config->get('session_name') . '=' . $this->session->getId() . '; SameSite=None; Secure' . '; HttpOnly');

        $post_array = $_POST;
        $data = '';

        $this->load->model('checkout/order');
        $order_info = $this->model_checkout_order->getOrder($post_array['order_id']);

        if ($this->config->get('mode_payment') == 1) {
            $this->data['action'] = 'https://api.payhalal.my/pay';
            $this->data["app_id"] = $this->config->get('app_live_key');
            $this->data["secret_key"] = $this->config->get('app_live_secret');
        }
        else {
            $this->data['action'] = 'https://api-testing.payhalal.my/pay';
            $this->data["app_id"] = $this->config->get('app_live_key_testing');
            $this->data["secret_key"] = $this->config->get('app_live_secret_testing');
        }

        $secret = $this->data["secret_key"];
        $amount = number_format($order_info['total'],2);
        $currency = $order_info['currency_code'];
        $product_description = "Opencart Order ID ".$order_info['order_id'];
        $order_id = $order_info['order_id'];
        $customer_name = $order_info['firstname']." ".$order_info['lastname'];
        $customer_email = $order_info['email'];
        $customer_phone = $order_info['telephone'];
        $status = $post_array['status'];
        $hash = hash('sha256', $secret.$amount.$currency.$product_description.$order_id. $customer_name . $customer_email . $customer_phone . $post_array['status']);

        foreach( $post_array As $r => $o )
        {
            $data .= $r . "=" . $o . "<br>";
        }

        if ($hash == $post_array['hash'] && $post_array['amount'] == $amount) 
        {
            $this->model_checkout_order->confirm($post_array['order_id'], $this->config->get('payhalal_order_status_id'));
            if ( $status == "SUCCESS" )  {

                $this->model_checkout_order->update($order_id , $this->config->get('payhalal_success_status_id'), $data, false);
                $this->redirect(HTTP_SERVER . 'index.php?route=checkout/success');
            } 
            else
            {
                $this->model_checkout_order->update($order_id , $this->config->get('payhalal_failed_status_id'), $data, false);
            
                $this->data['continue'] = $this->url->link('checkout/cart');

                if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/payment/payhalal_fail.tpl')) {
                    $this->template = $this->config->get('config_template') . '/template/payment/payhalal_fail.tpl';
                } else {
                    $this->template = 'default/template/payment/payhalal_fail.tpl';
                }
                $this->response->setOutput($this->render());  
            }
        }
        else
        {
            $this->model_checkout_order->update($order_id , $this->config->get('payhalal_failed_status_id'), $data, false);
            
            $this->data['continue'] = $this->url->link('checkout/cart');

            if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/payment/payhalal_fail.tpl')) {
                $this->template = $this->config->get('config_template') . '/template/payment/payhalal_fail.tpl';
            } else {
                $this->template = 'default/template/payment/payhalal_fail.tpl';
            }
            $this->response->setOutput($this->render());
        }
    }
}
?>