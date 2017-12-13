<?php

class Post_Item_List_View_Model {
	
	public $posted_items;
	// constructor
	public function __construct()
	{	
	}
	
	public function get($items)
	{
		$i = 0;
		foreach($items as $item)
		{
			$this->posted_items[$i] = new class{};
			
			$this->posted_items[$i]->id 				= $item->id;
			$this->posted_items[$i]->posted_item_name 	= $item->posted_item_name;
			$this->posted_items[$i]->item_type 			= $item->item_type;
			
			$i++;
		}
		
	}
	
	
}

?>