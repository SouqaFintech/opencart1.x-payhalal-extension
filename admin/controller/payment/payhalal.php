<?php
/**
 * Payhalal OpenCart Plugin
 * 
 * @package Payment Gateway
 * @author Payhalal Technical Team tech_dept@payhalal.my
 * @version 1.0.1
 */
 
class ControllerPaymentPayhalal extends Controller {
    
    private $error = array(); 

    public function index() {
        $this->load->language('payment/payhalal');

        $this->document->setTitle($this->language->get('heading_title'));

        $this->load->model('setting/setting');

        if ($this->request->server['REQUEST_METHOD'] == 'POST') {
            $this->model_setting_setting->editSetting('payhalal', $this->request->post);				
            $this->session->data['success'] = $this->language->get('text_success');
            $this->redirect($this->url->link('extension/payment', 'token=' . $this->session->data['token'], 'SSL'));
        }
        
        $this->data['heading_title'] = $this->language->get('heading_title');

        $this->data['text_enabled'] = $this->language->get('text_enabled');
        $this->data['text_disabled'] = $this->language->get('text_disabled');
        $this->data['text_all_zones'] = $this->language->get('text_all_zones');
        $this->data['text_yes'] = $this->language->get('text_yes');
        $this->data['text_no'] = $this->language->get('text_no');

        // $this->data['entry_merchantid'] = $this->language->get('entry_merchantid');
        // $this->data['entry_verifykey'] = $this->language->get('entry_verifykey');

        $this->data['mode_text'] = $this->language->get('mode_text');
        $this->data['mode'] = $this->language->get('mode');

        $this->data['app_live_key_text'] = $this->language->get('app_live_key_text');
        $this->data['app_live_secret_text'] = $this->language->get('app_live_secret_text');

        $this->data['app_live_key'] = $this->language->get('app_live_key');
        $this->data['app_live_secret'] = $this->language->get('app_live_secret');

        $this->data['app_live_key_testing'] = $this->language->get('app_live_key_testing');
        $this->data['app_live_secret_testing'] = $this->language->get('app_live_secret_testing');

        $this->data['app_live_key_testing_text'] = $this->language->get('app_live_key_testing_text');
        $this->data['app_live_secret_testing_text'] = $this->language->get('app_live_secret_testing_text');

        $this->data['entry_order_status'] = $this->language->get('entry_order_status');
        $this->data['entry_pending_status'] = $this->language->get('entry_pending_status');
        $this->data['entry_success_status'] = $this->language->get('entry_success_status');
        $this->data['entry_failed_status'] = $this->language->get('entry_failed_status');	
        $this->data['entry_status'] = $this->language->get('entry_status');

        $this->data['button_save'] = $this->language->get('button_save');
        $this->data['button_cancel'] = $this->language->get('button_cancel');

        $this->data['tab_general'] = $this->language->get('tab_general');

        if (isset($this->error['warning'])) {
            $this->data['error_warning'] = $this->error['warning'];
        } else {
            $this->data['error_warning'] = '';
        }

        if (isset($this->error['account'])) {
            $this->data['error_live_app_key'] = $this->error['account'];
        } else {
            $this->data['error_live_app_key'] = '';
        }	

        if (isset($this->error['secret'])) {
            $this->data['error_live_secret_key'] = $this->error['secret'];
        } else {
            $this->data['error_live_secret_key'] = '';
        }

        $this->data['breadcrumbs'] = array();

        $this->data['breadcrumbs'][] = array(
            'text'      => $this->language->get('text_home'),
            'href'      => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),       		
            'separator' => false
        );

        $this->data['breadcrumbs'][] = array(
            'text'      => $this->language->get('text_payment'),
            'href'      => $this->url->link('extension/payment', 'token=' . $this->session->data['token'], 'SSL'),
            'separator' => ' :: '
        );

        $this->data['breadcrumbs'][] = array(
            'text'      => $this->language->get('heading_title'),
            'href'      => $this->url->link('payment/payhalal', 'token=' . $this->session->data['token'], 'SSL'),
            'separator' => ' :: '
        );

        $this->data['action'] = $this->url->link('payment/payhalal', 'token=' . $this->session->data['token'], 'SSL');

        $this->data['cancel'] = $this->url->link('extension/payment', 'token=' . $this->session->data['token'], 'SSL');

        if (isset($this->request->post['mode_payment'])) {
            $this->data['mode_payment'] = $this->request->post['mode_payment'];
        } else {
            $this->data['mode_payment'] = $this->config->get('mode_payment');
        }

        if (isset($this->request->post['app_live_key'])) {
            $this->data['app_live_key'] = $this->request->post['app_live_key'];
        } else {
            $this->data['app_live_key'] = $this->config->get('app_live_key');
        }

        if (isset($this->request->post['app_live_secret'])) {
            $this->data['app_live_secret'] = $this->request->post['app_live_secret'];
        } else {
            $this->data['app_live_secret'] = $this->config->get('app_live_secret');
        }

        if (isset($this->request->post['app_live_key_testing'])) {
            $this->data['app_live_key_testing'] = $this->request->post['app_live_key_testing'];
        } else {
            $this->data['app_live_key_testing'] = $this->config->get('app_live_key_testing');
        }

        if (isset($this->request->post['app_live_secret_testing'])) {
            $this->data['app_live_secret_testing'] = $this->request->post['app_live_secret_testing'];
        } else {
            $this->data['app_live_secret_testing'] = $this->config->get('app_live_secret_testing');
        }


        if (isset($this->request->post['payhalal_order_status_id'])) {
            $this->data['payhalal_order_status_id'] = $this->request->post['payhalal_order_status_id'];
        } else {
            $this->data['payhalal_order_status_id'] = $this->config->get('payhalal_order_status_id'); 
        }

        if (isset($this->request->post['payhalal_pending_status_id'])) {
            $this->data['payhalal_pending_status_id'] = $this->request->post['payhalal_pending_status_id'];
        } else {
            $this->data['payhalal_pending_status_id'] = $this->config->get('payhalal_pending_status_id');
        }

        if (isset($this->request->post['payhalal_success_status_id'])) {
            $this->data['payhalal_success_status_id'] = $this->request->post['payhalal_success_status_id'];
        } else {
            $this->data['payhalal_success_status_id'] = $this->config->get('payhalal_success_status_id');
        }

        if (isset($this->request->post['payhalal_failed_status_id'])) {
            $this->data['payhalal_failed_status_id'] = $this->request->post['payhalal_failed_status_id'];
        } else {
            $this->data['payhalal_failed_status_id'] = $this->config->get('payhalal_failed_status_id');
        }

        $this->load->model('localisation/order_status');

        $this->data['order_statuses'] = $this->model_localisation_order_status->getOrderStatuses();

        if (isset($this->request->post['payhalal_status'])) {
            $this->data['payhalal_status'] = $this->request->post['payhalal_status'];
        } else {
            $this->data['payhalal_status'] = $this->config->get('payhalal_status');
        }

        if (isset($this->request->post['payhalal_sort_order'])) {
            $this->data['payhalal_sort_order'] = $this->request->post['payhalal_sort_order'];
        } else {
            $this->data['payhalal_sort_order'] = $this->config->get('payhalal_sort_order');
        }

        $this->layout = 'common/layout';
        $this->template = 'payment/payhalal.tpl';
        $this->children = array(
            'common/header',
            'common/footer',
        );

        $this->response->setOutput($this->render());
    }

    private function validate() {
        	
    }
}
?>
