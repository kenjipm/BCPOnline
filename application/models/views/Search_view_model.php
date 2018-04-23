<?php

class Search_view_model extends CI_Model {
	
	public $promoted_items;
	public $search_items;
	public $categories;
	public $category;
	
	// constructor
	public function __construct()
	{
		$this->promoted_items = array();
		$this->search_items = array();
		$this->categories = array();
	}
	
	public function get($categories, $promoted_items, $items, $category_id)
	{
		$this->load->library('text_renderer');
		
		foreach ($categories as $category)
		{
			$temp = new class{};
			$temp->id				= $category->id;
			$temp->category_name	= strtoupper($category->category_name);
			
			$this->categories[] = $temp;
		}
		
		foreach ($promoted_items as $promoted_item)
		{
			$temp = new class{};
			$temp->id = $promoted_item->id;
			$temp->posted_item_name = $promoted_item->posted_item_name ? $promoted_item->posted_item_name : $promoted_item->posted_item_description;
			$temp->price = $this->text_renderer->to_rupiah($promoted_item->price);
			$temp->image_one_name = site_url($promoted_item->image_one_name);
			$temp->rating = $promoted_item->calculate_rating();
			
			$this->promoted_items[] = $temp;
		}
		
		foreach ($items as $item)
		{
			$temp = new class{};
			$temp->id = $item->id;
			$temp->posted_item_name = $item->posted_item_name ? $item->posted_item_name : $item->posted_item_description;
			$temp->price = $this->text_renderer->to_rupiah($item->price);
			$temp->image_one_name = site_url($item->image_one_name);
			$temp->rating = $item->calculate_rating();
			
			$this->search_items[] = $temp;
		}
		
		$this->category = new class{};
		$this->category->id = $category_id;
	}
	
	public function get_search($categories, $promoted_items, $items)
	{
		$this->load->library('text_renderer');
		
		foreach ($categories as $category)
		{
			$temp = new class{};
			$temp->id				= $category->id;
			$temp->category_name	= strtoupper($category->category_name);
			
			$this->categories[] = $temp;
		}
		
		foreach ($promoted_items as $promoted_item)
		{
			$temp = new class{};
			$temp->id = $promoted_item->id;
			$temp->posted_item_name = $promoted_item->posted_item_name ? $promoted_item->posted_item_name : $promoted_item->posted_item_description;
			$temp->price = $this->text_renderer->to_rupiah($promoted_item->price);
			$temp->image_one_name = site_url($promoted_item->image_one_name);
			$temp->rating = $promoted_item->calculate_rating();
			
			$this->promoted_items[] = $temp;
		}
		
		foreach ($items as $item)
		{
			$temp = new class{};
			$temp->id = $item->id;
			$temp->posted_item_name = $item->posted_item_name ? $item->posted_item_name : $item->posted_item_description;
			$temp->price = $this->text_renderer->to_rupiah($item->price);
			$temp->image_one_name = site_url($item->image_one_name);
			$temp->rating = $item->calculate_rating();
			
			$this->search_items[] = $temp;
		}
		
		$this->category = new class{};
		$this->category->id = 0;
	}
}
?>