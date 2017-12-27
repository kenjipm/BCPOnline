<?php

class Post_Item_Detail_View_Model extends CI_Model{
	
	public $posted_item;
	public $nego_price;
	// constructor
	public function __construct()
	{	
	}
	
	public function get($item, $posted_item_variances, $negotiated_prices)
	{
		$this->posted_item = new class{};
		$this->load->library('Text_renderer');
			
		$this->posted_item->id 						= $item->id;
		$this->posted_item->posted_item_name 		= $item->posted_item_name;
		$this->posted_item->price					= $this->text_renderer->to_rupiah($item->price);
		$this->posted_item->item_type 				= $item->item_type;
		$this->posted_item->unit_weight				= $item->unit_weight;
		$this->posted_item->posted_item_description	= $item->posted_item_description;
		
		$this->posted_item->category				= new class{};
		$this->posted_item->category->category_name	= $item->category->category_name;
		$this->posted_item->brand					= new class{};
		$this->posted_item->brand->brand_name		= $item->brand->brand_name;
		
		$i = 0;
		foreach($posted_item_variances as $posted_item_variance)
		{
			$this->posted_item->var_type[$i] 			= $posted_item_variance->var_type;
			$this->posted_item->var_desc[$i] 			= $posted_item_variance->var_description;
			$this->posted_item->quantity_available[$i] 	= $posted_item_variance->quantity_available;
			$this->posted_item->image_two_name[$i] 		= $posted_item_variance->image_two_name;
			$this->posted_item->image_three_name[$i] 	= $posted_item_variance->image_three_name;
			$this->posted_item->image_four_name[$i] 	= $posted_item_variance->image_four_name;
			
			$i++;
		}
		
		$i = 0;
		foreach($negotiated_prices as $negotiated_price)
		{
			$this->nego_price->customer[$i] 			= $negotiated_price->account->email;
			$this->nego_price->discounted_price[$i]		= $negotiated_price->discounted_price;
			
			$i++;
		}
	}
	
	public function get_category_name($id)
	{
		
	}
	
	public function get_brand_name($id)
	{
		
	}
	
	public function get_all_tag($id)
	{
		
	}
	
}

?>