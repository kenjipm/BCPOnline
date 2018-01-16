<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array();
		$this->load->view('header', $data_header);
		
		// Load Body
		$data['model'] = new class{};
		$this->load->view('admin/dashboard_main', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
	
	public function tenant_to_pay_list()
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array();
		$this->load->view('header', $data_header);
		
		// Load Body
		$this->load->model('order_details_model');
		$order_details = $this->order_details_model->get_all_unpaid_by_tenants();
		
		$this->load->model('tenant_to_pay_list_view_model');
		$this->tenant_to_pay_list_view_model->get($order_details);
		
		$data['model'] = $this->tenant_to_pay_list_view_model;
		$this->load->view('admin/dashboard_main', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
}
