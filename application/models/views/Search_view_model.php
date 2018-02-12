<?php

class Search_view_model extends CI_Model {
	
	public $search_items;
	
	// constructor
	public function __construct()
	{
		$this->search_items = array();
	}
	
	public function get($items)
	{
		$this->load->library('text_renderer');
		foreach ($items as $item)
		{
			$temp = new class{};
			$temp->id = $item->id;
			$temp->posted_item_name = $item->posted_item_name ? $item->posted_item_name : $item->posted_item_description;
			$temp->price = $this->text_renderer->to_rupiah($item->price);
			$temp->image_one_name = site_url($item->image_one_name);
			
			$this->search_items[] = $temp;
		}
	}
}
?>