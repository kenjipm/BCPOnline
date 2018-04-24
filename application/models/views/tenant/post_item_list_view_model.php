<?php

class Post_Item_List_View_Model extends CI_Model{
	
	public $posted_items;
	// constructor
	public function __construct()
	{	
	}
	
	public function get($items)
	{
		$this->load->library('Text_renderer');
		$i = 0;
		foreach($items as $item)
		{
			$this->posted_items[$i] = new class{};
			
			$this->posted_items[$i]->id 				= $item->id;
			$this->posted_items[$i]->image_one_name		= site_url($item->image_one_name);
			$this->posted_items[$i]->image_two_name		= $item->image_two_name;
			$this->posted_items[$i]->image_three_name	= $item->image_three_name;
			$this->posted_items[$i]->image_four_name	= $item->image_four_name;
			$this->posted_items[$i]->posted_item_name 	= $item->posted_item_name;
			$this->posted_items[$i]->posted_item_description 	= $item->posted_item_description;
			$this->posted_items[$i]->item_type 			= $item->item_type;
			$this->posted_items[$i]->price				= $this->text_renderer->to_rupiah($item->price);
			
			$this->posted_items[$i]->rating = $item->calculate_rating();
			
			$i++;
		}
		
	}
	
	
}

?>