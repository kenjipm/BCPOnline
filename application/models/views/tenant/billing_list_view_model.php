<?php

class Billing_List_View_Model extends CI_Model{
	
	public $billings;
	// constructor
	public function __construct()
	{	
	}
	
	public function get($billings)
	{
		$i = 0;
		foreach($billings as $billing)
		{
			$this->billings[$i] = new class{};
			$this->billings[$i]->id 				= $billing->id;
			$this->billings[$i]->date_created		= $billing->image_one_name;
			$this->billings[$i]->date_closed		= $billing->image_two_name;
			$this->billings[$i]->sold_price			= $billing->sold_price;
			
			$i++;
		}
		
	}
	
	
}

?>