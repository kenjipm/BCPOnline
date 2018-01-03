<?php

class Order_List_View_Model extends CI_Model{
	
	public $order_list;
	public $idle_deliverer;
	// constructor
	public function __construct()
	{
		$this->order_list = array();
		$this->idle_deliverer = array();
	}
	
	public function get($orders, $deliverers)
	{
		$i = 0;
		foreach($orders as $order)
		{
			$this->order_list[$i] = new class{};
			$this->order_list[$i]->id 					= $order->id;
			$this->order_list[$i]->posted_item			= $order->posted_item_variance->posted_item->posted_item_name;
			$this->order_list[$i]->address				= $order->billing->shipping_address->address_detail;
			$this->order_list[$i]->collection_method	= $order->collection_method;
			$this->order_list[$i]->deliverer			= $order->deliverer->account->name;
			
			$i++;
		}
		
		$i = 0;
		foreach($deliverers as $deliverer)
		{
			$this->idle_deliverer[$i] = new class{};
			$this->idle_deliverer[$i]->id 		= $deliverer->id;
			$this->idle_deliverer[$i]->name		= $deliverer->account->name;
			
			$i++;
		}
	}
	
	
}

?>