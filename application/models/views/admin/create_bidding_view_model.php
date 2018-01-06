<?php

class Create_Bidding_View_Model extends CI_Model{
	
	public $bidding_category = array();
	public $bidding_brand = array();
	public $bidding_item = array();
	// constructor
	public function __construct()
	{	
	}
	
	public function get($categories, $brands, $items)
	{
		$i = 0;
		foreach($categories as $category)
		{
			$this->bidding_category[$i] = new class{};
			
			$this->bidding_category[$i]->id 			= $category->id;
			$this->bidding_category[$i]->category_name	= $category->category_name;
			
			$i++;
		}
		
		$i = 0;
		foreach($brands as $brand)
		{
			$this->bidding_brand[$i] = new class{};
			
			$this->bidding_brand[$i]->id 			= $brand->id;
			$this->bidding_brand[$i]->brand_name	= $brand->brand_name;
			
			$i++;
		}
		
		$i = 0;
		foreach($items as $item)
		{
			$this->bidding_item[$i] = new class{};
			
			$this->bidding_item[$i]->id 				= $item->id;
			$this->bidding_item[$i]->posted_item_name	= $item->posted_item_name;
			$this->bidding_item[$i]->tenant_name		= $item->tenant->tenant_name;
			
			$i++;
		}
		
	}
	
	
}

?>