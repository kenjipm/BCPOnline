<?php

class Billing_List_View_Model extends CI_Model{
	
	public $orders;
	// constructor
	public function __construct()
	{	
	}
	
	public function get($billings)
	{
		$i = 0;
		foreach($billings as $billing)
		{
			$this->orders[$i] = new class{};
			$this->orders[$i]->id 			= $billing->id;
			$this->orders[$i]->order_status	= $billing->order_status;
			$this->orders[$i]->date_created	= $billing->billing->date_created;
			$this->orders[$i]->date_closed	= $billing->billing->date_closed;
			$this->orders[$i]->sold_price	= $billing->sold_price;
			
			$i++;
		}
		
	}
	
	
}

?>