<?php

class Post_Item_List_View_Model extends CI_Model{
	
	public $posted_items;
	// constructor
	public function __construct()
	{	
		$this->posted_items = array();
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
			$this->posted_items[$i]->posted_item_name 	= $item->posted_item_name;
			$this->posted_items[$i]->posted_item_description = $item->posted_item_description;
			$this->posted_items[$i]->item_type 			= $item->item_type;
			$this->posted_items[$i]->price				= $this->text_renderer->to_rupiah($item->price);
			$this->posted_items[$i]->tenant_name		= $item->tenant->tenant_name;
			
			$i++;
		}
		
	}
	
	
}

?>