<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{

		// Load Body
		if ($this->session->type == TYPE['name']['TENANT'])
		{
			redirect('tenant');
		}
		else if ($this->session->type == TYPE['name']['ADMIN'])
		{
			$data_header['css_list'] = array();
			$data_header['js_list'] = array();
			$this->load->view('header', $data_header);
			
			$data['model'] = new class{};
			$this->load->view('admin/dashboard_main', $data);
		}
		else if ($this->session->type == TYPE['name']['DELIVERER'])
		{
			redirect('order/order_list');
		}
		else // CUSTOMER
		{
			$this->check_referral();
			
			// $this->load->model('category_model');
			$categories = $this->category_model->get_all();
			
			$this->load->model('hot_item_model');
			$hot_items = $this->hot_item_model->get_all(6);
			
			$this->load->model('following_tenant_model');
			$following_tenants = $this->following_tenant_model->get_all_from_customer_id($this->session->child_id, null);
			
			$this->load->model('item_model');
			$tenant_items = $this->item_model->get_all_from_following_tenants($following_tenants);
			
			$bidding_item = $this->item_model->get_last_bidding_item();
			$this->load->model('bidding_live_model');
			
			// Load Header
			$data_header['css_list'] = array('ad_boxes', 'slider');
			$data_header['js_list'] = array('slider');
			
			$last_bidding = null;
			if ($bidding_item != null)
			{
				$last_bidding = $this->bidding_live_model->get_from_customer_id_and_item_id($this->session->child_id, $bidding_item->id);
				$data_header['js_list'][] = 'bidding_live';
			}
			if ($last_bidding == null)
			{
				$last_bidding = new class{};
				$last_bidding->bid_time = null;
			}
			
			$data_header['no_loading_overlay'] = true;
			$this->load->view('header', $data_header);
			
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
