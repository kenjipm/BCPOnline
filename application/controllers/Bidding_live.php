<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bidding_live extends CI_Controller {

	public function index()
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array('bidding_live');
		$this->load->view('header', $data_header);
		
		// Load Body
		$this->load->model('item_model');
		$bidding_item = $this->item_model->get_last_bidding_item();
		
		$this->load->model('bidding_live_model');
		$last_bidding_live = $this->bidding_live_model->get_from_customer_id_and_item_id($this->session->child_id, $bidding_item->id);
		if ($last_bidding_live == null)
		{
			$last_bidding_live = new class{};
			$last_bidding_live->bid_time = null;
		}
		
		$this->load->model('customer_model');
		$customer = $this->customer_model->get_from_id($this->session->child_id);
		
		$this->load->model('views/bidding_live_main_view_model');
		$this->bidding_live_main_view_model->get($bidding_item, $last_bidding_live, $customer->deposit_status);
		
		$data['model'] = $this->bidding_live_main_view_model;
		$this->load->view('bidding_live_main', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
	
	// Admin View
	public function bidding_live_list()
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array();
		$this->load->view('header', $data_header);
		
		// Load Body
		$this->load->model('Item_model');
		$this->load->model('Bidding_live_model');
		$items = $this->Item_model->get_all_bidding_items();
		$bidding_lives = $this->Bidding_live_model->get_all();
		$this->load->model('views/admin/bidding_live_list_view_model');
		$this->bidding_live_list_view_model->get($items, $bidding_lives);
		$data['model'] = $this->bidding_live_list_view_model;
		$this->load->view('admin/bidding_live_list', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
	
	public function bidding_live_detail($posted_item_id)
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array('admin/bidding_live_detail');
		$this->load->view('header', $data_header);
		
		// Load Body
		$this->load->model('Bidding_live_model');
		$this->load->model('Item_model');
		$this->load->model('Order_details_model');
		$bidding_lives = $this->Bidding_live_model->get_all_from_posted_item_id($posted_item_id);
		$item = $this->Item_model->get_from_id($posted_item_id);
		$order = $this->Order_details_model->is_choosen($posted_item_id);
		// if (strtotime(date('Y-m-d H:m:s')) > strtotime($item->date_expired))
			// $is_expired = 1;
		// else	
			// $is_expired = 0;
		$this->load->model('views/admin/bidding_live_detail_view_model');
		$this->bidding_live_detail_view_model->get($bidding_lives, $item->is_expired(), $order);
		$data['model'] = $this->bidding_live_detail_view_model;
		$this->load->view('admin/bidding_live_detail', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
	
	public function create_bidding_live()
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array('admin/create_bidding');
		$this->load->view('header', $data_header);
		
		// Load Body
		// $this->load->model('Category_model');
		$this->load->model('Brand_model');
		$this->load->model('Item_model');
		$categories = $this->category_model->get_all();
		$brands = $this->Brand_model->get_all();
		// $items = $this->Item_model->get_all_for_admin();
		
		$unconfirmed_item = $this->Item_model->get_unconfirmed_bidding_item();
		
		$this->load->model('views/admin/create_bidding_view_model');
		$this->create_bidding_view_model->get($categories, $brands, $unconfirmed_item);
		$data['model'] = $this->create_bidding_view_model;
		
		$this->load->view('admin/create_bidding', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
	
	public function ajax_get_cur_price()
	{
		$result = array();
		$posted_item_id = $this->input->post('bidding_item_id');
			
		$this->load->model('item_model');
		$bidding_item = $this->item_model->get_from_id($posted_item_id);
		$bid_time_left = $bidding_item->get_bid_time_left();
		$result["bid_time_left"] = $bid_time_left;
		
		$this->load->model('bidding_live_model');
		$last_bidding_live = $this->bidding_live_model->get_from_posted_item_id($posted_item_id);
		
		if ($last_bidding_live != null)
		{
			$this->load->library('text_renderer');
			
			$result["success"] = "1";
			$result["cur_price"] = $last_bidding_live->bid_price;
			$result["cur_price_str"] = $this->text_renderer->to_rupiah($last_bidding_live->bid_price);
		}
		else 
		{
			$result["success"] = "0";
		}
		
		header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
		header("Cache-Control: post-check=0, pre-check=0", false);
		header("Pragma: no-cache");
		header("Content-Type: application/json; charset=utf-8");
		echo json_encode($result);
	}
	
	public function update_price()
	{
		$this->load->model('Item_model');
		$this->Item_model->update_price();
		
		redirect('Bidding_live/bidding_live_list');
	}
	
	public function ajax_create_billing()
	{
		if ($this->session->type == TYPE['name']['ADMIN'])
		{
			$bidding_live_id 	= $this->input->post('bidding_live_id');
			
			$this->load->model('bidding_live_model');
			$bidding_live = $this->bidding_live_model->get_from_id($bidding_live_id);
			
			// validasi, kalau bidding_live ga ada (error)
			if ($bidding_live == null) { echo "-1"; return -1; }
			
			$customer_id	= $bidding_live->customer_id;
			$posted_item_id	= $bidding_live->posted_item_id;
			
			$this->load->model('item_model');
			$posted_item = $this->item_model->get_from_id($posted_item_id);
			
			$date_now = time();
			if (strtotime($posted_item->date_expired) > $date_now)
			{
				$posted_item->date_expired = date('Y-m-d H:i:s');
				$posted_item->update_date_expired();
			}
			
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
			$billing->total_payable			= $bidding_live->bid_price;
			$billing->insert();
			
			$this->load->model('order_details_model');
			$this->order_details_model->insert_from_bid($bidding_live->bid_price, $billing->id, $posted_item_variance->id);
			
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
			$message_text->text = $this->bidding_live_model->generate_winner_message($posted_item->posted_item_name, $bidding_live->bid_price, $billing->id);
			$message_text->sender_id = $admin_id;
			$message_text->message_inbox_id = $message_inbox->id;
			$message_text->insert_from_stub();
			
			echo "1"; return "1";
		}
	}
	
	public function bidding_approve_do()
	{
		$password = $this->input->post('password');
		$json_result = new class{};
		$json_result->code = "-1";
		
		$this->load->model('account_model');
		if ($this->account_model->is_superadmin($password)) // if true
		{
			$posted_item_id = $this->input->post('posted_item_id');
			
			$this->load->model('item_model');
			$item = $this->item_model->get_from_id($posted_item_id);
			$item->set_is_confirmed();
			$json_result->code = "1";
		}
		
		header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
		header("Cache-Control: post-check=0, pre-check=0", false);
		header("Pragma: no-cache");
		header("Content-Type: application/json; charset=utf-8");
		echo json_encode($json_result);
	}
	
	public function bidding_decline_do()
	{
		$password = $this->input->post('password');
		$json_result = new class{};
		$json_result->code = "-1";
		
		$this->load->model('account_model');
		if ($this->account_model->is_superadmin($password)) // if true
		{
			$posted_item_id = $this->input->post('posted_item_id');
			
			$this->load->model('item_model');
			$this->item_model->delete_from_id($posted_item_id);
			
			$json_result->code = "1";
		}
		
		header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
		header("Cache-Control: post-check=0, pre-check=0", false);
		header("Pragma: no-cache");
		header("Content-Type: application/json; charset=utf-8");
		echo json_encode($json_result);
	}
}
