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
			$this->billings[$i]->customer			= $billing->customer->account->name;
			$this->billings[$i]->address			= $billing->shipping_address->address_detail;
			$this->billings[$i]->shipping_charge 	= $billing->shipping_charge->fee_amount;
			$this->billings[$i]->total_payable 		= $billing->total_payable;
			
			$i++;
		}
		
	}
	
	
}

?>