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
		$this->tenant->account_id	= $tenant->account_id;
		$this->tenant->tenant_name	= $tenant->tenant_name;
		
		$this->tenant->account->profile_pic	= site_url(($tenant->account->profile_pic != "") ? $tenant->account->profile_pic : DEFAULT_PROFILE_PIC);
			
		$this->tenant->is_followed	= ($tenant->is_followed($this->session->child_id) != null);
		$this->tenant->btn_class	= ($this->tenant->is_followed ? "cb-button-secondary-selected" : "cb-button-form");
		$this->tenant->btn_text		= ($this->tenant->is_followed ? "SUDAH DIIKUTI" : "IKUTI");
		
		$this->tenant->items = array();
		foreach ($items as $item)
		{
			$temp = new class{};
			$temp->id = $item->id;
			$temp->posted_item_name = $item->posted_item_name;
			$temp->price = $this->text_renderer->to_rupiah($item->price);
			$temp->image_one_name = site_url($item->image_one_name);
			$temp->rating = $item->calculate_rating();
			
			$this->tenant->items[] = $temp;
		}
	}
}
?>