<?php

class Item_gallery_view_model extends CI_Model {
	
	public $items;
	
	// constructor
	public function __construct()
	{
		parent::__construct();
		
		$this->items = array();
	}
	
	public function get($items)
	{
		$this->load->library('text_renderer');
		foreach($items as $item)
		{
			$item_temp 			= new class{};
			$item_temp->id					= $item->id;
			$item_temp->image_one_name		= site_url(($item->image_one_name !== "") ? $item->image_one_name : DEFAULT_ITEM_PICTURE[$item->item_type]);
			$item_temp->posted_item_name	= ($item->posted_item_name != "") ? $item->posted_item_name : $item->posted_item_description;
			$item_temp->price				= $this->text_renderer->to_rupiah($item->price);
			$item_temp->rating				= $item->calculate_rating();
			$item_temp->favorite			= $item->calculate_favorite();
			
			$item->init_tenant();
			$item_temp->tenant = new class{};
			$item_temp->tenant->tenant_name	= $item->tenant->tenant_name;
			
			$this->items[] = $item_temp;
		}
	}
}
?>