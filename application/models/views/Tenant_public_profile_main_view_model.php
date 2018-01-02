<?php

class Tenant_public_profile_main_view_model extends CI_Model {
	
	public $tenant;
	
	// constructor
	public function __construct()
	{
		parent::__construct();
		
		$this->tenant = new class{};
		$this->tenant->account = new class{};
	}
	
	public function get($tenant, $items)
	{
		$this->load->library('text_renderer');
		
		$tenant->init_account();
		
		$this->tenant->id			= $tenant->id;
		$this->tenant->tenant_name	= $tenant->tenant_name;
		
		$this->tenant->account->profile_pic	= $tenant->account->profile_pic;
		
		$this->tenant->items = array();
		foreach ($items as $item)
		{
			$temp = new class{};
			$temp->id = $item->id;
			$temp->posted_item_name = $item->posted_item_name;
			$temp->price = $this->text_renderer->to_rupiah($item->price);
			$temp->image_one_name = $item->image_one_name;
			
			$this->tenant->items[] = $temp;
		}
	}
}
?>