<?php

class Order_list_view_model extends CI_Model {
	
	public $order_otps_lists;
	
	// constructor
	public function __construct()
	{
		parent::__construct();
		
		$this->order_otps_lists = array();
	}
	
	public function get($order_details)
	{
		$this->load->library('text_renderer');
		
		foreach ($order_details as $order_detail)
		{
			$order_detail->init_posted_item_variance();
			$order_detail->posted_item_variance->init_posted_item();
			$order_detail->billing->init_shipping_address();
			
			$order_temp						= new class{};
			$order_temp->quantity			= $order_detail->quantity;
			$order_temp->sold_price_str		= $this->text_renderer->to_rupiah($order_detail->sold_price);
			
			$order_temp->billing									= new class{};
			$order_temp->billing->date_created_str					= date("d M y H:i:s", strtotime($order_detail->billing->date_created));
			$order_temp->billing->shipping_address					= new class{};
			$order_temp->billing->shipping_address->full_address	= $order_detail->billing->shipping_address->get_full_address();
			
			$order_temp->posted_item_variance						= new class{};
			$order_temp->posted_item_variance->var_description		= $order_detail->posted_item_variance->var_description;
			
			$order_temp->posted_item_variance->posted_item						= new class{};
			$order_temp->posted_item_variance->posted_item->posted_item_name	= $order_detail->posted_item_variance->posted_item->posted_item_name;
			
			$key_order_status = ORDER_STATUS['sequence_index'][$order_detail->order_status];
			$key_otp = $order_detail->otp_customer_to_deliverer;
			
			if (!isset($this->order_otps_lists[$key_order_status]))
			{
				$this->order_otps_lists[$key_order_status] = new class{};
				$this->order_otps_lists[$key_order_status]->order_otps = array();
				$this->order_otps_lists[$key_order_status]->order_status_str = ORDER_STATUS['description'][$order_detail->order_status];
			}
			if (!isset($this->order_otps_lists[$key_order_status]->order_otps[$key_otp]))
			{
				$this->order_otps_lists[$key_order_status]->order_otps[$key_otp] = new class{};
				$this->order_otps_lists[$key_order_status]->order_otps[$key_otp]->orders = array();
				$this->order_otps_lists[$key_order_status]->order_otps[$key_otp]->otp = $order_detail->otp_customer_to_deliverer ? $order_detail->otp_customer_to_deliverer : '-';
			}
			$this->order_otps_lists[$key_order_status]->order_otps[$key_otp]->orders[] = $order_temp;
		}
		
		ksort($this->order_otps_lists);
	}
}
?>