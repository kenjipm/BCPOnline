<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array('bidding');
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
		else // CUSTOMER
		{
			$this->check_referral();
			
			$this->load->model('category_model');
			$categories = $this->category_model->get_all();
			
			$this->load->model('hot_item_model');
			$hot_items = $this->hot_item_model->get_all(6);
			
			$this->load->model('following_tenant_model');
			$following_tenants = $this->following_tenant_model->get_all_from_customer_id($this->session->child_id, null);
			
			$this->load->model('item_model');
			$tenant_items = $this->item_model->get_all_from_following_tenants($following_tenants);
			
			$bidding_item = $this->item_model->get_last_bidding_item();
			$this->load->model('bidding_model');
			$last_bidding = null;
			if ($bidding_item != null)
			{
				$last_bidding = $this->bidding_model->get_from_customer_id_and_item_id($this->session->child_id, $bidding_item->id);
			}
			if ($last_bidding == null)
			{
				$last_bidding = new class{};
				$last_bidding->bid_time = null;
			}
			
			$this->load->model('views/dashboard_view_model');
			$this->dashboard_view_model->get($categories, $hot_items, $tenant_items, $bidding_item, $last_bidding);
			$data['model'] = $this->dashboard_view_model;
			$this->load->view('dashboard_main', $data);
		}
		
		// Load Footer
		$this->load->view('footer');
	}
	
	public function check_referral()
	{
		$upline_id = $this->input->post_get('ref');
		if ($upline_id) // kalo ada referral nya
		{
			if (!isset($this->session->id)) // kalo blm login
			{
				$userdata = array(
					'upline_id' => $upline_id,
				);
				$this->session->set_userdata($userdata);
			}
		}
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
