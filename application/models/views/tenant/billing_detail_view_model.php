<?php

class Billing_Detail_View_Model extends CI_Model{
	
	public $billing;
	// constructor
	public function __construct()
	{	
	}
	
	public function get($billing, $orders)
	{
		$this->billing = new class{};
		$this->load->library('Text_renderer');

		$this->billing->id 				= $billing->id;
		$this->billing->date_created 	= $billing->date_created;
		$this->billing->date_closed		= $billing->date_closed;
		$this->billing->customer		= $billing->customer->account->name;
		$this->billing->address			= $billing->shipping_address->address_detail;
		$this->billing->shipping_charge	= $billing->text_renderer->to_rupiah($billing->shipping_charge->fee_amount);
		$this->billing->total_payable	= $billing->text_renderer->to_rupiah($billing->total_payable);
		
		$i = 0;
		foreach($orders as $order)
		{
			$this->orders[$i] = new class{};
			
			$this->orders[$i]->id 					= $order->id;
			$this->orders[$i]->quantity 			= $order->quantity;
			$this->orders[$i]->posted_item_variance	= $order->posted_item_variance->posted_item->posted_item->name;
			$this->orders[$i]->sold_price			= $order->sold_price;
			$this->orders[$i]->type 				= $order->posted_item_variance->posted_item->item_type;
			
			$i++;
		}
		
	}
	
	public function get_category_name($id)
	{
		
	}
	
	public function get_brand_name($id)
	{
		
	}
	
	public function get_all_tag($id)
	{
		
	}
	
}

?>