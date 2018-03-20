<?php

class Voucher_List_View_Model {
	
	public $vouchers;
	// constructor
	public function __construct()
	{
		$this->vouchers = array();
	}
	
	public function get($vouchers)
	{
		$i = 0;
		foreach($vouchers as $voucher)
		{
			$this->vouchers[$i] = new class{};
			
			$this->vouchers[$i]->id						= $voucher->id;
			$this->vouchers[$i]->voucher_id				= $voucher->voucher_id;
			$this->vouchers[$i]->voucher_stock 			= $voucher->voucher_stock;
			$this->vouchers[$i]->voucher_description	= $voucher->voucher_description;
			$this->vouchers[$i]->voucher_code			= $voucher->voucher_code;
			$this->vouchers[$i]->use_per_day			= $voucher->use_per_day;
			$this->vouchers[$i]->min_order_price		= $voucher->min_order_price;
			$this->vouchers[$i]->voucher_worth			= $voucher->voucher_worth;
			$this->vouchers[$i]->date_added				= $voucher->date_added;
			
			$i++;
		}
		
	}
	
	
}

?>