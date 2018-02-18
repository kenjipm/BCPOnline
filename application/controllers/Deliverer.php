<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Deliverer extends CI_Controller {

	public function index()
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array();
		$this->load->view('header', $data_header);
		
		// Load Body
		$data['model'] = new class{};
		$this->load->view('', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
	
	public function mark_as_received($order_id)
	{
		$this->load->model('order_details_model');
		
		$this->update_order_status($order_id, ORDER_STATUS['name']['DELIVERING_TO_CUSTOMER'], ORDER_STATUS['name']['RECEIVED']);
		
	}
}
