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
			$this->order_list[$i]->otp_deliverer_to_tenant 	= $order->otp_deliverer_to_tenant;
			$this->order_list[$i]->tenant					= $order->tenant->name;
			
			$i++;
		}
	}
	
	public function get_deliver_task($delivers)
	{
		$i = 0;
		foreach($delivers as $deliver)
		{
			$this->deliver_list[$i] = new class{};
			$this->deliver_list[$i]->address 		= $deliver->billing->shipping_address->address_detail;
			$this->deliver_list[$i]->city 			= $deliver->billing->shipping_address->city;
			$this->deliver_list[$i]->kecamatan 		= $deliver->billing->shipping_address->kecamatan;
			$this->deliver_list[$i]->kelurahan		= $deliver->billing->shipping_address->kelurahan;
			$this->deliver_list[$i]->postal_code	= $deliver->billing->shipping_address->postal_code;
			$this->deliver_list[$i]->customer		= $deliver->billing->customer->account->name;
			
			$i++;
		}
	}
	
	
}

?>