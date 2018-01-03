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
		if ($this->session->type == TYPE['name']['TENANT'])
		{
			redirect('tenant');
		}
		else if ($this->session->type == TYPE['name']['ADMIN'])
		{
			$this->load->model('category_model');
			$categories = $this->category_model->get_all();
			
			$this->load->model('brand_model');
			$brands = $this->brand_model->get_all();
			
			$this->load->model('hot_item_model');
			$hot_items = $this->hot_item_model->get_all(6);
			
			$this->load->model('views/admin/dashboard_view_model');
			$this->dashboard_view_model->get($categories, $brands, $hot_items);
			$data['model'] = $this->dashboard_view_model;
			$this->load->view('admin/dashboard_main', $data);
		}
		else
		{
			$this->load->model('category_model');
			$categories = $this->category_model->get_all();
			
			$this->load->model('hot_item_model');
			$hot_items = $this->hot_item_model->get_all(6);
			
			// $this->load->model('following_tenant_model');
			// $following_tenants = $this->following_tenant_model->get_all_from_customer_id($this->session->child_id, null);
			// $tenant_items = $this->item_model->get_all_from_following_tenants($following_tenants);
			
			$this->load->model('views/dashboard_view_model');
			$this->dashboard_view_model->get($categories, $hot_items, $tenant_items);
			$data['model'] = $this->dashboard_view_model;
			$this->load->view('dashboard_main', $data);
		}
		
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
