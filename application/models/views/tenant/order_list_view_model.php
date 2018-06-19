<?php

class Order_List_View_Model extends CI_Model{
	
	public $orders;
	public $items;
	// constructor
	public function __construct()
	{	
		$this->orders = array();
	}
	
	public function get($orders)
	{
		$this->load->library('text_renderer');
		$i = 0;
		foreach($orders as $order)
		{
			$this->orders[$i] = new class{};
			$this->orders[$i]->id 			= $order->id;
			$this->orders[$i]->order_status	= ORDER_STATUS['description'][$order->order_status];
			$this->orders[$i]->date_created	= date("d-M-Y H:i:s", strtotime($order->billing->date_created));
			$this->orders[$i]->date_closed	= date("d-M-Y H:i:s", strtotime($order->billing->date_closed));
			$this->orders[$i]->sold_price	= $this->text_renderer->to_rupiah($order->sold_price * $order->quantity);
			
			$this->orders[$i]->count_unread_order_status	= $order->count_unread_order_status_tenant();
			
			$i++;
		}
		
	}
	
	
}

?>