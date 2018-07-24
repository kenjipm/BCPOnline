<?php

class Create_tenant_bill_view_model extends CI_Model{
	
	public $tenant_bill;
	// constructor
	public function __construct()
	{	
	}
	
	public function get($item, $id, $hot_item)
	{
		$this->tenant_bill = new class{};
			
		$this->tenant_bill->hot_item_id				= $id;
		$this->tenant_bill->posted_item_id			= $item->id;
		$this->tenant_bill->posted_item_name		= $item->posted_item_name;
		$this->tenant_bill->tenant_id				= $item->tenant_id;
		$this->tenant_bill->tenant_name				= $item->tenant->tenant_name;
		$this->tenant_bill->date_expired			= $hot_item->date_expired_req;
	}
	
	
}

?>