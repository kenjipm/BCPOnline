<?php

class Voucher_List_View_Model {
	
	public $vouchers;
	// constructor
	public function __construct()
	{	
	}
	
	public function get($vouchers)
	{
		$i = 0;
		foreach($vouchers as $voucher)
		{
			$this->vouchers[$i] = new class{};
			
			$this->vouchers[$i]->voucher_id				= $voucher->voucher_id;
			$this->vouchers[$i]->voucher_stock 			= $voucher->voucher_stock;
			$this->vouchers[$i]->voucher_description	= $voucher->voucher_description;
			$this->vouchers[$i]->voucher_code			= $voucher->voucher_code;
			$this->vouchers[$i]->voucher_worth			= $voucher->voucher_worth;
			$this->vouchers[$i]->date_added				= $voucher->date_added;
			
			$this->vouchers[$i]->brand					= new class{};
			$this->vouchers[$i]->brand->brand_name		= $voucher->brand->brand_name;
			$i++;
		}
		
	}
	
	
}

?>