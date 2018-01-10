<?php

class Order_Detail_View_Model extends CI_Model{
	
	public $order_list;
	// constructor
	public function __construct()
	{
		$this->order_list = array();
	}
	
	public function get($orders)
	{
		$i = 0;
		foreach($orders as $order)
		{
			$this->order_list[$i] = new class{};

			$this->order_list[$i]->id 				= $order->id;
			$this->order_list[$i]->quantity 		= $order->quantity;
			$this->order_list[$i]->posted_item_name	= $order->posted_item_variance->posted_item->posted_item_name;
			$this->order_list[$i]->var_type			= $order->posted_item_variance->var_type;
			$this->order_list[$i]->var_description	= $order->posted_item_variance->var_description;
			$this->order_list[$i]->otp	 			= $order->otp_customer_to_deliverer;
			$this->order_list[$i]->customer_name	= $order->billing->customer->account->name;
			
			$i++;
		}
		
	}
	
}

?>