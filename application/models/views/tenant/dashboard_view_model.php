<?php

class Dashboard_View_Model extends CI_Model{
	
	public $tenant;
	public $posted_items;
	// constructor
	public function __construct()
	{	
	}
	
	public function get_tenant($item)
	{
		$this->tenant = new class{};
		
		$this->tenant->id 			= $item->id;
		$this->tenant->tenant_name	= $item->tenant_name;
		$this->tenant->unit_number 	= $item->unit_number;
		$this->tenant->floor 		= $item->floor;
		
	}
	
	public function get_posted_item($items)
	{
		$this->load->library('Text_renderer');
		$i = 0;
		foreach($items as $item)
		{
			$this->posted_items[$i] = new class{};
			
			$this->posted_items[$i]->id 				= $item->id;
			$this->posted_items[$i]->image_one_name		= $item->image_one_name;
			$this->posted_items[$i]->image_two_name		= $item->image_two_name;
			$this->posted_items[$i]->image_three_name	= $item->image_three_name;
			$this->posted_items[$i]->image_four_name	= $item->image_four_name;
			$this->posted_items[$i]->posted_item_name 	= $item->posted_item_name;
			$this->posted_items[$i]->item_type 			= $item->item_type;
			$this->posted_items[$i]->price				= $this->text_renderer->to_rupiah($item->price);
			
			$i++;
		}
		
	}
}

?>