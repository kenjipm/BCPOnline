<?php

class Search_view_model {
	
	public $search_items;
	
	// constructor
	public function __construct()
	{
		$this->search_items = array();
	}
	
	public function get($items)
	{
		foreach ($items as $item)
		{
			$temp = new class{};
			$temp->id = $item->id;
			$temp->posted_item_name = $item->posted_item_name;
			$temp->price = $item->price;
			$temp->image_one_name = $item->image_one_name;
			
			$this->search_items[] = $temp;
		}
	}
}
?>