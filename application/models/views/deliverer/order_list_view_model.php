<?php

class Order_List_View_Model extends CI_Model{
	
	public $order_list;
	public $deliver_list;
	// constructor
	public function __construct()
	{	
	}
	
	public function get_collection_task($orders)
	{
		$i = 0;
		foreach($orders as $order)
		{
			$this->order_list[$i] = new class{};
			$this->order_list[$i]->collection_code 	= $order->collection_code;
			$this->order_list[$i]->tenant			= $order->tenant->name;
			
			$i++;
		}
	}
	
	public function get_deliver_task($delivers)
	{
		$i = 0;
		foreach($delivers as $deliver)
		{
			$this->deliver_list[$i] = new class{};
			$this->deliver_list[$i]->address = $deliver->billing->shipping_address->address_detail;
			
			$i++;
		}
	}
	
	
}

?>