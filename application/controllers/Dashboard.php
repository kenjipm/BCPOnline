<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array();
		$this->load->view('header', $data_header);
		
		// Load Body
		// $this->load->model('category_model');
		// $categories = $this->category_model->get_all();
		
		// $this->load->model('item_model');
		// $hot_items = $this->item_model->get_hot_items();
		
		// $this->load->model('following_tenant_model');
		// $following_tenants = $this->following_tenant_model->get_all();
		// $tenant_items = $this->item_model->get_tenant_items($following_tenants);
		
		// $this->load->model('dashboard_view_model');
		// $this->dashboard_view_model->get($categories, $hot_items, $tenant_items);
		// $data['model'] = $this->dashboard_view_model;
		$data['model'] = new class{};
		$this->load->view('dashboard_main', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
	
	public function show_404()
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array();
		$this->load->view('header', $data_header);
		
		// Load Body
		$data['model'] = new class{};
		$this->load->view('error_404', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
}
