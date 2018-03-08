<?php

class Bidding_list_view_model extends CI_Model {
	
	public $items;
	public $biddings;
	
	// constructor
	public function __construct()
	{
		parent::__construct();
		
		$items = array();
		$biddings = array();
	}
	
	public function get($items, $biddings)
	{
		$i = 0;
		$this->load->library('text_renderer');
		foreach ($items as $item)
		{	
			$this->items[$i] = new class{};
			
			$this->items[$i]->id 				= $item->id;
			$this->items[$i]->image_one_name	= site_url($item->image_one_name);
			$this->items[$i]->posted_item_name 	= $item->posted_item_name;
			$this->items[$i]->posted_item_description 	= $item->posted_item_description;
		}
		
		foreach ($biddings as $bidding)
		{	
		
		}
	}
}
?>