<?php

class Billing_Detail_View_Model extends CI_Model{
	
	public $billing_detail;
	public $order_list;
	// constructor
	public function __construct()
	{	
		$this->order_list = array();
		$this->billing_detail = new class{};
		$this->load->library('Text_renderer');
	}
	
	public function get_order($orders)
	{
		$this->billing_detail->voucher_cut_price = 0;
		
		$i = 0;
		foreach($orders as $order)
		{
			$this->order_list[$i] = new class{};
			$this->order_list[$i]->id 				= $order->order_id;
			$this->order_list[$i]->posted_item		= ($order->posted_item_variance->posted_item->posted_item_name != "") ? $order->posted_item_variance->posted_item->posted_item_name : $order->posted_item_variance->posted_item->posted_item_description;
			$this->order_list[$i]->order_status		= ORDER_STATUS['description'][$order->order_status];
			$this->order_list[$i]->quantity			= $order->quantity;
			$this->order_list[$i]->sold_price		= $order->text_renderer->to_rupiah($order->sold_price);
			$this->order_list[$i]->total_price		= $order->text_renderer->to_rupiah($order->quantity * $order->sold_price);
			$this->order_list[$i]->is_cancelled		= ($order->order_status == ORDER_STATUS['name']['CANCELLED']);
			$this->order_list[$i]->is_done			= ($order->order_status == ORDER_STATUS['name']['DONE']);
			
			$this->billing_detail->voucher_cut_price += $order->voucher_worth;
			
			$i++;
		}
	}
	
	public function get_billing($billing)
	{	
		$this->billing_detail->id 				= $billing->id;
		$this->billing_detail->bill_id			= $billing->bill_id;
		$this->billing_detail->customer_name	= $billing->customer->account->name;
		$this->billing_detail->date_created		= $billing->date_created;
		$this->billing_detail->date_closed		= $billing->date_closed;
		$this->billing_detail->total_payable	= $billing->text_renderer->to_rupiah($billing->total_payable);
		$this->billing_detail->fee_amount		= $billing->text_renderer->to_rupiah($billing->shipping_charge->fee_amount);
		
		$this->billing_detail->voucher_cut_price = $billing->text_renderer->to_rupiah($this->billing_detail->voucher_cut_price);
		
	}
	
}

?>