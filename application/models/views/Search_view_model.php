<?php

class Search_view_model extends CI_Model {
	
	public $promoted_items;
	public $search_items;
	public $categories;
	
	// constructor
	public function __construct()
	{
		$this->promoted_items = array();
		$this->search_items = array();
		$this->categories = array();
	}
	
	public function get($categories, $promoted_items, $items)
	{
		$this->load->library('text_renderer');
		
		foreach ($categories as $category)
		{
			$temp = new class{};
			$temp->id				= $category->id;
			$temp->category_name	= $category->category_name;
			
			$this->categories[] = $temp;
		}
		
		foreach ($promoted_items as $promoted_item)
		{
			$temp = new class{};
			$temp->id = $promoted_item->id;
			$temp->posted_item_name = $promoted_item->posted_item_name ? $promoted_item->posted_item_name : $promoted_item->posted_item_description;
			$temp->price = $this->text_renderer->to_rupiah($promoted_item->price);
			$temp->image_one_name = site_url($promoted_item->image_one_name);
			
			$this->promoted_items[] = $temp;
		}
		
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