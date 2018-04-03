<?php

class Create_Bidding_View_Model extends CI_Model{
	
	public $bidding_category;
	public $bidding_brand;
	public $bidding_item;
	public $bidding_variance;
	
	public $is_existed;
	
	// constructor
	public function __construct()
	{	
		$this->bidding_category = array();
		$this->bidding_brand = array();
		$this->bidding_variance = array();
		
		$this->bidding_item = new class{};
		
		$this->bidding_item->id 						= 0;
		$this->bidding_item->posted_item_id 			= "";
		$this->bidding_item->posted_item_name 			= "";
		$this->bidding_item->price 						= "";
		$this->bidding_item->date_posted 				= "";
		$this->bidding_item->date_updated 				= "";
		$this->bidding_item->date_expired 				= "";
		$this->bidding_item->bidding_max_range 			= "";
		$this->bidding_item->item_type 					= "";
		$this->bidding_item->unit_weight 				= "";
		$this->bidding_item->posted_item_description 	= "";
		$this->bidding_item->image_one_name 			= "";
		$this->bidding_item->image_two_name 			= "";
		$this->bidding_item->image_three_name 			= "";
		$this->bidding_item->image_four_name 			= "";
		$this->bidding_item->category_id 				= "";
		$this->bidding_item->tenant_id 					= "";
		$this->bidding_item->brand_id 					= "";
		
		$this->bidding_item->var_type 					= "";
		$this->bidding_item->var_description 			= "";
		
		$this->is_existed = false;
	}
	
	public function get($categories, $brands, $unconfirmed_item)
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
		
		if ($unconfirmed_item != null)
		{
			$this->bidding_item->id = $unconfirmed_item->id;
			$this->bidding_item->posted_item_id = $unconfirmed_item->posted_item_id;
			$this->bidding_item->posted_item_name = $unconfirmed_item->posted_item_name;
			$this->bidding_item->price = $unconfirmed_item->price;
			$this->bidding_item->date_posted = $unconfirmed_item->date_posted;
			$this->bidding_item->date_updated = $unconfirmed_item->date_updated;
			$this->bidding_item->date_expired = $unconfirmed_item->date_expired;
			$this->bidding_item->bidding_max_range = $unconfirmed_item->bidding_max_range;
			$this->bidding_item->item_type = $unconfirmed_item->item_type;
			$this->bidding_item->unit_weight = $unconfirmed_item->unit_weight;
			$this->bidding_item->posted_item_description = $unconfirmed_item->posted_item_description;
			$this->bidding_item->image_one_name = site_url($unconfirmed_item->image_one_name);
			$this->bidding_item->image_two_name = $unconfirmed_item->image_two_name;
			$this->bidding_item->image_three_name = $unconfirmed_item->image_three_name;
			$this->bidding_item->image_four_name = $unconfirmed_item->image_four_name;
			$this->bidding_item->category_id = $unconfirmed_item->category_id;
			$this->bidding_item->tenant_id = $unconfirmed_item->tenant_id;
			$this->bidding_item->brand_id = $unconfirmed_item->brand_id;
			
			$this->bidding_item->var_type = $unconfirmed_item->var_type;
			$this->bidding_item->var_description = $unconfirmed_item->var_description;
			
			$this->is_existed = true;
		}
		
		// $i = 0;
		// foreach($items as $item)
		// {
			// $this->bidding_item[$i] = new class{};
			
			// $this->bidding_item[$i]->id 				= $item->id;
			// $this->bidding_item[$i]->posted_item_name	= $item->posted_item_name;
			// $this->bidding_item[$i]->tenant_name		= $item->tenant->tenant_name;
			
			// $i++;
		// }
		
		$i = 0;
		foreach(POSTED_ITEM_VARIANCE_TYPE['type'] as $type)
		{
			$this->bidding_variance[$i] = $type;
			
			$i++;
		}
	}
	
	
}

?>