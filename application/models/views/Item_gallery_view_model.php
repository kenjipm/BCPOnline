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
			$item->init_posted_item();
			
			$item_temp 		= new class{};
			$item_temp->id		= $item->id;
			
			$item_temp->posted_item 					= new class{};
			$item_temp->posted_item->id					= $item->posted_item->id;
			$item_temp->posted_item->image_one_name		= site_url($item->posted_item->image_one_name);
			$item_temp->posted_item->posted_item_name	= $item->posted_item->posted_item_name;
			$item_temp->posted_item->price				= $this->text_renderer->to_rupiah($item->posted_item->price);
			$item_temp->posted_item->rating				= $item->posted_item->calculate_rating();
			
			$this->items[] = $item_temp;
		}
	}
}
?>