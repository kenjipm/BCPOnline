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
		foreach($favorite_items as $favorite_item)
		{
			$favorite_item->init_posted_item();
			
			$favorite_item_temp 		= new class{};
			$favorite_item_temp->id		= $favorite_item->id;
			
			$favorite_item_temp->posted_item 					= new class{};
			$favorite_item_temp->posted_item->id				= $favorite_item->posted_item->id;
			$favorite_item_temp->posted_item->image_one_name	= site_url($favorite_item->posted_item->image_one_name);
			$favorite_item_temp->posted_item->posted_item_name	= $favorite_item->posted_item->posted_item_name;
			$favorite_item_temp->posted_item->price				= $favorite_item->posted_item->price;
			
			$this->favorite_items[] = $favorite_item_temp;
		}
	}
}
?>