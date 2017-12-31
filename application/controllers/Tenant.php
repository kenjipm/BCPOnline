<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tenant extends CI_Controller {

	public function index()
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array("tenant/dashboard");
		$this->load->view('header', $data_header);
		
		// Load Body
		$this->load->model('Item_model');
		$this->load->model('Tenant_model');
		$this->load->model('Order_details_model');
		$tenant = $this->Tenant_model->get_by_account_id($this->session->userdata('id'));
		$items = $this->Item_model->get_all();
		$orders = $this->Order_details_model->get_all_from_tenant_id();
		$this->load->model('views/tenant/dashboard_view_model');
		$this->dashboard_view_model->get_posted_item($items);
		$this->dashboard_view_model->get_tenant($tenant);
		$this->dashboard_view_model->get_transaction($orders);
		$data['model'] = $this->dashboard_view_model;
		$this->load->view('tenant/dashboard_main', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
	
	public function profile($id)
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array();
		$this->load->view('header', $data_header);
		
		// Load Body
		$data['echo'] = "Profile";
		$this->load->view('tenant/profile_main', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
}
