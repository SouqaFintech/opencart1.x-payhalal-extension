<?php 
/**
 * Payhalal OpenCart Plugin
 * 
 * @package Payment Gateway
 * @author Payhalal Technical Team tech_dept@payhalal.my
 * @version 1.0.1
 */

class ModelPaymentPayhalal extends Model {
    
    public function getMethod($address) {
        $this->load->language('payment/payhalal');

        if ($this->config->get('payhalal_status')) {
            $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "zone_to_geo_zone WHERE geo_zone_id = '" . (int)$this->config->get('payhalal_geo_zone_id') . "' AND country_id = '" . (int)$address['country_id'] . "' AND (zone_id = '" . (int)$address['zone_id'] . "' OR zone_id = '0')");

            if (!$this->config->get('payhalal_geo_zone_id')) {
                $status = TRUE;
            } elseif ($query->num_rows) {
                $status = TRUE;
            } else {
                $status = FALSE;
            }	
      	} else {
            $status = FALSE;
        }
		
        $method_data = array();
	
        if ($status) {  
            $method_data = array( 
                'code'       => 'payhalal',
                'title'      => $this->language->get('text_title'),
                'sort_order' => $this->config->get('payhalal_sort_order')
                );
    	}
   
    	return $method_data;
    }
}
?>