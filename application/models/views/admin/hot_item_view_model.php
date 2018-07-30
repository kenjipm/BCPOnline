<?php

class Hot_Item_View_Model extends CI_Model{
	
	public $hot_item_list;
	public $tenant_bill_list;
	// constructor
	public function __construct()
	{
		$this->load->library('Text_renderer');
		$this->hot_item_list = array();
		$this->tenant_bill_list = array();
	}
	
	public function get($hot_items, $tenant_bills)
	{
		$i = 0;
		foreach($hot_items as $hot_item)
		{
			$this->hot_item_list[$i] = new class{};
			$this->hot_item_list[$i]->id				= $hot_item->id;
			$this->hot_item_list[$i]->tenant_name		= $hot_item->tenant->tenant_name;
			$this->hot_item_list[$i]->posted_item_id	= $hot_item->posted_item_id;
			$this->hot_item_list[$i]->posted_item_name	= $hot_item->posted_item->posted_item_name;
			$this->hot_item_list[$i]->price				= $this->text_renderer->to_rupiah($hot_item->posted_item->price);
			$this->hot_item_list[$i]->promo_description	= $hot_item->promo_description;
			$this->hot_item_list[$i]->promo_price		= $this->text_renderer->to_rupiah($hot_item->promo_price);
			
			$i++;
		}
		
		$i = 0;
		foreach($tenant_bills as $tenant_bill)
		{
			$this->tenant_bill_list[$i] = new class{};
			$this->tenant_bill_list[$i]->id				 	= $tenant_bill->id;
			$this->tenant_bill_list[$i]->tenant_name 		= $tenant_bill->tenant->tenant_name;
			$this->tenant_bill_list[$i]->posted_item_name 	= $tenant_bill->posted_item->posted_item_name;
			$this->tenant_bill_list[$i]->payment_value 		= $this->text_renderer->to_rupiah($tenant_bill->payment_value);
			
			$i++;
		}
	}
	
	
}

?>