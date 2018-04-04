<?php

class Billing_Detail_View_Model extends CI_Model{
	
	public $billing_detail;
	public $order_list;
	// constructor
	public function __construct()
	{	
		$this->load->library('Text_renderer');
	}
	
	public function get_order($orders)
	{
		$i = 0;
		foreach($orders as $order)
		{
			$this->order_list[$i] = new class{};
			$this->order_list[$i]->id 				= $order->id;
			$this->order_list[$i]->posted_item		= $order->posted_item_variance->posted_item->posted_item_name;
			$this->order_list[$i]->quantity			= $order->quantity;
			$this->order_list[$i]->sold_price		= $order->text_renderer->to_rupiah($order->sold_price);
			$this->order_list[$i]->total_price		= $order->text_renderer->to_rupiah($order->quantity * $order->sold_price);
			
			$i++;
		}
		
	}
	
	public function get_billing($billing)
	{	
		$this->billing_detail = new class{};
		$this->billing_detail->id 				= $billing->id;
		$this->billing_detail->date_created		= $billing->date_created;
		$this->billing_detail->date_closed		= $billing->date_closed;
		$this->billing_detail->total_payable	= $billing->text_renderer->to_rupiah($billing->total_payable);
		
	}
	
}

?>