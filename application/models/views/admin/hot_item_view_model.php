<?php

class Hot_Item_View_Model extends CI_Model{
	
	public $hot_item_list;
	public $tenant_bill_list;
	// constructor
	public function __construct()
	{
		$this->hot_item_list = array();
		$this->tenant_bill_list = array();
	}
	
	public function get($hot_items, $tenant_bills)
	{
		// $i = 0;
		// foreach($hot_items as $hot_item)
		// {
			// $this->hot_item_list[$i] = new class{};
			// $this->hot_item_list[$i]->id	= $hot_item->id;
			
			// $i++;
		// }
		
		// $i = 0;
		// foreach($tenant_bills as $tenant_bill)
		// {
			// $this->tenant_bill_list[$i] = new class{};
			// $this->tenant_bill_list[$i]->id = $tenant_bill->id;
			
			// $i++;
		// }
	}
	
	
}

?>