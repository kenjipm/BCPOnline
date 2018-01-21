<?php

class Order_List_View_Model extends CI_Model{
	
	public $order_list;
	public $deliver_order_list;	
	public $repair_list;
	public $deliver_repair_list;
	// constructor
	public function __construct()
	{	
	}
	
	public function get_order_collection_task($orders)
	{
		$i = 0;
		foreach($orders as $order)
		{
			$this->order_list[$i] = new class{};
			$this->order_list[$i]->otp_deliverer_to_tenant 	= $order->otp_deliverer_to_tenant;
			$this->order_list[$i]->tenant					= $order->tenant->tenant_name;
			$this->order_list[$i]->floor					= $order->tenant->floor;
			$this->order_list[$i]->unit_number				= $order->tenant->unit_number;
			$i++;
		}
	}
	
	public function get_order_deliver_task($delivers)
	{
		$i = 0;
		foreach($delivers as $deliver)
		{
			$this->deliver_order_list[$i] = new class{};
			$this->deliver_order_list[$i]->address 		= $deliver->billing->shipping_address->address_detail;
			$this->deliver_order_list[$i]->city 		= $deliver->billing->shipping_address->city;
			$this->deliver_order_list[$i]->kecamatan 	= $deliver->billing->shipping_address->kecamatan;
			$this->deliver_order_list[$i]->kelurahan	= $deliver->billing->shipping_address->kelurahan;
			$this->deliver_order_list[$i]->postal_code	= $deliver->billing->shipping_address->postal_code;
			$this->deliver_order_list[$i]->customer		= $deliver->billing->customer->account->name;
			
			$i++;
		}
	}
	
	public function get_repair_collection_task($repairs)
	{
		$i = 0;
		foreach($repairs as $repair)
		{
			$this->repair_list[$i] = new class{};
			$this->repair_list[$i]->address 		= $repair->billing->shipping_address->address_detail;
			$this->repair_list[$i]->city 			= $repair->billing->shipping_address->city;
			$this->repair_list[$i]->kecamatan 		= $repair->billing->shipping_address->kecamatan;
			$this->repair_list[$i]->kelurahan		= $repair->billing->shipping_address->kelurahan;
			$this->repair_list[$i]->postal_code		= $repair->billing->shipping_address->postal_code;
			$this->repair_list[$i]->customer		= $repair->billing->customer->account->name;
			$this->repair_list[$i]->otp_deliverer_to_customer = $repair->otp_deliverer_to_customer;
			
			$i++;
		}
	}
	
	public function get_repair_deliver_task($delivers)
	{
		$i = 0;
		foreach($delivers as $deliver)
		{
			$this->deliver_repair_list[$i] = new class{};
			$this->deliver_repair_list[$i]->tenant	= $deliver->tenant->tenant_name;
			$this->deliver_repair_list[$i]->floor	= $deliver->tenant->floor;
			$this->deliver_repair_list[$i]->unit_number = $deliver->tenant->unit_number;
			
			$i++;
		}
	}
	
}

?>