<?php

class Order_list_view_model extends CI_Model {
	
	public $order_lists;
	
	// constructor
	public function __construct()
	{
		parent::__construct();
		
		$this->order_lists = array();
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
			$order_temp->billing->shipping_address->full_address	= $order_detail->billing->shipping_address->get_full_address();
			
			$order_temp->posted_item_variance						= new class{};
			$order_temp->posted_item_variance->var_description		= $order_detail->posted_item_variance->var_description;
			
			$order_temp->posted_item_variance->posted_item						= new class{};
			$order_temp->posted_item_variance->posted_item->posted_item_name	= $order_detail->posted_item_variance->posted_item->posted_item_name;
			
			$key_order_status = $order_detail->order_status . "-" . $order_detail->otp_customer_to_deliverer;
			
			if (!isset($this->order_lists[$key_order_status]))
			{
				$this->order_lists[$key_order_status] = new class{};
				$this->order_lists[$key_order_status]->order_list = array();
				$this->order_lists[$key_order_status]->otp = $order_detail->otp_customer_to_deliverer;
				$this->order_lists[$key_order_status]->order_status_str = ORDER_STATUS['description'][$key_order_status];
			}
			$this->order_lists[$key_order_status]->order_list[] = $order_temp;
		}
	}
}
?>