<?php

class Order_List_View_Model extends CI_Model{
	
	public $orders;
	public $items;
	// constructor
	public function __construct()
	{	
		$this->orders = array();
	}
	
	public function get($billings)
	{
		$this->load->library('text_renderer');
		$i = 0;
		foreach($billings as $billing)
		{
			$this->orders[$i] = new class{};
			$this->orders[$i]->id 			= $billing->id;
			$this->orders[$i]->order_status	= ORDER_STATUS['description'][$billing->order_status];
			$this->orders[$i]->date_created	= date("d-M-Y H:i:s", strtotime($billing->billing->date_created));
			$this->orders[$i]->date_closed	= date("d-M-Y H:i:s", strtotime($billing->billing->date_closed));
			$this->orders[$i]->sold_price	= $this->text_renderer->to_rupiah($billing->sold_price * $billing->quantity);
			
			$i++;
		}
		
	}
	
	
}

?>