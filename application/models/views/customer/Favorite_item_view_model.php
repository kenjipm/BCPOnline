<?php

class Favorite_item_view_model extends CI_Model {
	
	public $favorite_items;
	
	// constructor
	public function __construct()
	{
		parent::__construct();
		
		$this->favorite_items = array();
	}
	
	public function get($favorite_items)
	{
		$this->load->library('text_renderer');
		foreach($favorite_items as $favorite_item)
		{
			$favorite_item->init_posted_item();
			
			$favorite_item_temp 		= new class{};
			$favorite_item_temp->id		= $favorite_item->id;
			
			$favorite_item_temp->posted_item 					= new class{};
			$favorite_item_temp->posted_item->id				= $favorite_item->posted_item->id;
			$favorite_item_temp->posted_item->image_one_name	= site_url(($favorite_item->posted_item->image_one_name != "") ? $favorite_item->posted_item->image_one_name : DEFAULT_ITEM_PICTURE[$favorite_item->posted_item->item_type]);
			$favorite_item_temp->posted_item->posted_item_name	= $favorite_item->posted_item->posted_item_name;
			$favorite_item_temp->posted_item->price				= $this->text_renderer->to_rupiah($favorite_item->posted_item->price);
			$favorite_item_temp->rating				= $favorite_item->posted_item->calculate_rating();
			$favorite_item_temp->favorite			= $favorite_item->posted_item->calculate_favorite();
			
			$favorite_item->posted_item->init_tenant();
			$favorite_item_temp->tenant = new class{};
			$favorite_item_temp->tenant->tenant_name	= $favorite_item->posted_item->tenant->tenant_name;
			
			$favorite_item->posted_item->get_hot_item();
			$favorite_item_temp->is_hot_item = ($favorite_item->posted_item->hot_item != null);
			if ($favorite_item->posted_item->hot_item != null)
			{
				$favorite_item_temp->hot_item = new class{};
				$favorite_item_temp->hot_item->promo_price = $this->text_renderer->to_rupiah($favorite_item->posted_item->hot_item->promo_price);
			}
			
			$this->favorite_items[] = $favorite_item_temp;
		}
	}
}
?>