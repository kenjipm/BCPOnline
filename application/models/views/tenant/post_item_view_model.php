<?php

class Post_Item_View_Model extends CI_Model{
	
	public $item_category;
	public $item_brand;
	// constructor
	public function __construct()
	{	
	}
	
	public function get($categories, $brands)
	{
		$i = 0;
		foreach($categories as $category)
		{
			$this->item_category[$i] = new class{};
			
			$this->item_category[$i]->id 			= $category->id;
			$this->item_category[$i]->category_name	= $category->category_name;
			
			$i++;
		}
		
		$i = 0;
		foreach($brands as $brand)
		{
			$this->item_brand[$i] = new class{};
			
			$this->item_brand[$i]->id 			= $brand->id;
			$this->item_brand[$i]->brand_name	= $brand->brand_name;
			
			$i++;
		}
		
	}
	
	
}

?>