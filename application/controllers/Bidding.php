<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bidding extends CI_Controller {

	public function index()
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array('bidding');
		$this->load->view('header', $data_header);
		
		// Load Body
		$this->load->model('item_model');
		$bidding_item = $this->item_model->get_last_bidding_item();
		
		$this->load->model('bidding_model');
		$last_bidding = $this->bidding_model->get_from_customer_id_and_item_id($this->session->child_id, $bidding_item->id);
		if ($last_bidding == null)
		{
			$last_bidding = new class{};
			$last_bidding->bid_time = null;
		}
		
		$this->load->model('views/bidding_main_view_model');
		$this->bidding_main_view_model->get($bidding_item, $last_bidding);
		
		$data['model'] = $this->bidding_main_view_model;
		$this->load->view('bidding_main', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
	
	// Admin View
	public function bidding_list()
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array();
		$this->load->view('header', $data_header);
		
		// Load Body
		$this->load->model('Item_model');
		$this->load->model('Bidding_model');
		$items = $this->Item_model->get_all_bidding_items();
		$biddings = $this->Bidding_model->get_all();
		$this->load->model('views/admin/bidding_list_view_model');
		$this->bidding_list_view_model->get($items, $biddings);
		$data['model'] = $this->bidding_list_view_model;
		$this->load->view('admin/bidding_list', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
	
	public function bidding_detail($posted_item_id)
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array('admin/bidding_detail');
		$this->load->view('header', $data_header);
		
		// Load Body
		$this->load->model('Bidding_model');
		$this->load->model('Item_model');
		$biddings = $this->Bidding_model->get_all_from_posted_item_id($posted_item_id);
		$item = $this->Item_model->get_from_id($posted_item_id);
		if (strtotime(date('Y-m-d H:m:s')) > strtotime($item->date_expired))
			$is_expired = 1;
		else	
			$is_expired = 0;
		$this->load->model('views/admin/bidding_detail_view_model');
		$this->bidding_detail_view_model->get($biddings, $is_expired);
		$data['model'] = $this->bidding_detail_view_model;
		$this->load->view('admin/bidding_detail', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
	
	public function create_bidding()
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array();
		$this->load->view('header', $data_header);
		
		// Load Body
		$this->load->model('Category_model');
		$this->load->model('Brand_model');
		$this->load->model('Item_model');
		$categories = $this->Category_model->get_all();
		$brands = $this->Brand_model->get_all();
		$items = $this->Item_model->get_all_for_admin();
		$this->load->model('views/admin/create_bidding_view_model');
		$this->create_bidding_view_model->get($categories, $brands, $items);
		$data['model'] = $this->create_bidding_view_model;
		
		$this->load->view('admin/create_bidding', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
	
	public function update_price()
	{
		$this->load->model('Item_model');
		$this->Item_model->update_price();
		
		redirect('Bidding/bidding_list');
	}
	
	public function choose_winner()
	{
		$this->load->model('Billing_model');
		
		redirect('Bidding/bidding_list');
	}
	
	public function ajax_create_billing()
	{
		if ($this->session->type == TYPE['name']['ADMIN'])
		{
			$bidding_id 	= $this->input->post('bidding_id');
			
			$this->load->model('bidding_model');
			$bidding = $this->bidding_model->get_from_id($bidding_id);
			
			// validasi, kalau bidding ga ada (error)
			if ($bidding == null) { echo "-1"; return -1; }
			
			$customer_id	= $bidding->customer_id;
			$posted_item_id	= $bidding->posted_item_id;
			
			$this->load->model('item_model');
			$posted_item = $this->item_model->get_from_id($posted_item_id);
			
			// validasi, kalau item ga ada (error)
			if ($posted_item == null) { echo "-2"; return -2; }
			
			$this->load->model('posted_item_variance_model');
			$posted_item_variances = $this->posted_item_variance_model->get_all($posted_item->id);
			
			// validasi, kalau item variance ga ada (error)
			if (count($posted_item_variances) <= 0) { echo "-3"; return -3; }
			
			$posted_item_variance = $posted_item_variances[0];
			
			$this->load->model('setting_reward_model');
			$setting_reward = $this->setting_reward_model->get_latest_setting_reward();
			
			$this->load->model('billing_model');
			$billing = new billing_model();
			$billing->delivery_method		= "";
			$billing->customer_id			= $customer_id;
			$billing->shipping_address_id	= NULL;
			$billing->shipping_charge_id	= NULL;
			$billing->setting_reward_id		= $setting_reward->id;
			$billing->total_payable			= $bidding->bid_price;
			$billing->insert();
			
			$this->load->model('order_details_model');
			$this->order_details_model->insert_from_bid($bidding->bid_price, $billing->id, $posted_item_variance->id);
			
			// kurangi stock dari barang yang dibeli
			$this->posted_item_variance_model->quantity_sub(1);
			
			// kirim message kepada pemenang
			$admin_id 		= $this->session->id;
			
			$this->load->model('customer_model');
			$customer = $this->customer_model->get_from_id($customer_id);
			
			$this->load->model('message_inbox_model');
			$message_inbox = $this->message_inbox_model->get_from_parties_id($admin_id, $customer->account_id);
			
			if ($message_inbox == null) {
				$message_inbox = new message_inbox_model();
				$message_inbox->insert_from_parties_id($admin_id, $customer->account_id);
			}
			
			$this->load->model('message_text_model');
			$message_text = new message_text_model();
			$message_text->text = $this->bidding_model->generate_winner_message($posted_item->posted_item_name, $bidding->bid_price, $billing->id);
			$message_text->sender_id = $admin_id;
			$message_text->message_inbox_id = $message_inbox->id;
			$message_text->insert_from_stub();
			
			echo "1"; return "1";
		}
	}
}
