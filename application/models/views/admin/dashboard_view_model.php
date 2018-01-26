<?php

class Dashboard_view_model extends CI_Model {
	
	public $categories;
	public $brands;
	public $hot_items;
	
	// constructor
	public function __construct()
	{
		$this->categories = array();
		$this->brands = array();
		$this->hot_items = array();
	}
	
	public function get($categories, $brands, $hot_items)
	{
		$this->load->library('text_renderer');
		
		foreach ($categories as $category)
		{
			$temp = new class{};
			$temp->id				= $category->id;
			$temp->category_name	= $category->category_name;
			
			$this->categories[] = $temp;
		}
		
		foreach ($brands as $brand)
		{
			$temp = new class{};
			$temp->id			= $brand->id;
			$temp->brand_name	= $brand->brand_name;
			
			$this->brands[] = $temp;
		}
		
		foreach ($hot_items as $hot_item)
		{
			$temp = new class{};
			$temp->id				= $hot_item->id;
			$temp->posted_item_name	= $hot_item->posted_item->posted_item_name;
			$temp->initial_price	= $this->text_renderer->to_rupiah($hot_item->posted_item->price);
			$temp->promo_price		= $this->text_renderer->to_rupiah($hot_item->promo_price);
			$temp->image_one_name	= $hot_item->posted_item->image_one_name;
			
			$this->hot_items[] = $temp;
		}

	}
}
?>