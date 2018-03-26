<?php

class Dashboard_view_model extends CI_Model {
	
	public $categories;
	public $tenant_items;
	public $hot_items;
	public $bidding_item;
	
	// constructor
	public function __construct()
	{
		$this->categories = array();
		$this->tenant_items = array();
		$this->hot_items = array();
		$this->bidding_item = null;
	}
	
	public function get($categories, $hot_items, $tenant_items, $bidding_item, $last_bidding)
	{
		$this->load->library('text_renderer');
		
		foreach ($categories as $category)
		{
			$temp = new class{};
			$temp->id				= $category->id;
			$temp->category_name	= $category->category_name;
			
			$this->categories[] = $temp;
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
		
		foreach ($tenant_items as $tenant_item)
		{
			$temp = new class{};
			$temp->id				= $tenant_item->id;
			$temp->posted_item_name	= $tenant_item->posted_item_name;
			$temp->price			= $this->text_renderer->to_rupiah($tenant_item->price);
			$temp->image_one_name	= $tenant_item->image_one_name;
			
			$this->tenant_items[] = $temp;
		}
		
		// if ($bidding_item != null)
		// {
			// $this->bidding_item = new class{};
			// $this->bidding_item->id = $bidding_item->id;
			// $this->bidding_item->posted_item_name = $bidding_item->posted_item_name;
			// $this->bidding_item->price = $bidding_item->price;
			// $this->bidding_item->bidding_max_range = $bidding_item->bidding_max_range;
			// $this->bidding_item->price_str = $this->text_renderer->to_rupiah($bidding_item->price);
			// $this->bidding_item->image_one_name	= $bidding_item->image_one_name;
			
			// $bid_step = $bidding_item->bidding_max_range / 10;
			// $this->bidding_item->can_bid			= $bidding_item->is_can_bid_this_session($last_bidding->bid_time);
			// $this->bidding_item->start_bid_price	= $this->bidding_item->can_bid ? ($bidding_item->price + $bid_step) : $last_bidding->bid_price;
		// }
		
		// bidding live
		if ($bidding_item != null)
		{
			$this->bidding_item = new class{};
			$this->bidding_item->id = $bidding_item->id;
			$this->bidding_item->posted_item_name = $bidding_item->posted_item_name;
			$this->bidding_item->price = $bidding_item->price;
			$this->bidding_item->bidding_step = $bidding_item->bidding_max_range;
			$this->bidding_item->price_str = $this->text_renderer->to_rupiah($bidding_item->price);
			$this->bidding_item->image_one_name	= $bidding_item->image_one_name;
			
			$this->bidding_item->start_bid_price	= $bidding_item->price + $bidding_item->bidding_max_range;
		}
	}
}
?>