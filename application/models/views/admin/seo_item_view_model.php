<?php

class Seo_Item_View_Model extends CI_Model{
	
	public $tenant_bill_list;
	// constructor
	public function __construct()
	{
		$this->load->library('Text_renderer');
		$this->tenant_bill_list = array();
	}
	
	public function get($tenant_bills)
	{
		$i = 0;
		foreach($tenant_bills as $tenant_bill)
		{
			$this->tenant_bill_list[$i] = new class{};
			$this->tenant_bill_list[$i]->id				 	= $tenant_bill->id;
			$this->tenant_bill_list[$i]->tenant_name 		= $tenant_bill->tenant->tenant_name;
			$this->tenant_bill_list[$i]->posted_item_id 	= $tenant_bill->posted_item_id;
			$this->tenant_bill_list[$i]->posted_item_name 	= $tenant_bill->posted_item->posted_item_name;
			$this->tenant_bill_list[$i]->payment_value 		= $this->text_renderer->to_rupiah($tenant_bill->payment_value);
			
			$i++;
		}
	}
	
	
}

?>