<?php

class Dashboard_view_model extends CI_Model {
	
	public $ad_boxes;
	
	public $categories;
	public $tenant_items;
	public $hot_items;
	public $flash_items;
	public $bidding_item;
	
	// constructor
	public function __construct()
	{
		$this->ad_boxes = array();
		$this->categories = array();
		$this->tenant_items = array();
		$this->hot_items = array();
		$this->flash_items = array();
		$this->bidding_item = null;
	}
	
	public function get($categories, $hot_items, $flash_items, $tenant_items, $bidding_item, $last_bidding)
	{
		$this->load->library('text_renderer');
		
		$this->load->config('ad_setting');
		$ad_boxes = $this->config->item('DASHBOARD_BOX');
		$this->ad_boxes = $ad_boxes;
		
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
			$temp->id				= $hot_item->posted_item_id;
			$temp->posted_item_name	= $hot_item->posted_item->posted_item_name;
			$temp->initial_price	= $this->text_renderer->to_rupiah($hot_item->posted_item->price);
			$temp->promo_price		= $this->text_renderer->to_rupiah($hot_item->promo_price);
			$temp->image_one_name	= $hot_item->posted_item->image_one_name;
			
			$hot_item->init_posted_item();
			$temp->rating			= $hot_item->posted_item->calculate_rating();
			$temp->favorite			= $hot_item->posted_item->calculate_favorite();
			
			$hot_item->posted_item->init_tenant();
			$temp->tenant = new class{};
			$temp->tenant->tenant_name	= $hot_item->posted_item->tenant->tenant_name;
			
			$this->hot_items[] = $temp;
		}
		
		
		foreach ($flash_items as $flash_item)
		{
			$temp = new class{};
			$temp->id				= $flash_item->posted_item_id;
			$temp->posted_item_name	= $flash_item->posted_item->posted_item_name;
			$temp->initial_price	= $this->text_renderer->to_rupiah($flash_item->posted_item->price);
			$temp->promo_price		= $this->text_renderer->to_rupiah($flash_item->promo_price);
			$temp->image_one_name	= $flash_item->posted_item->image_one_name;
			// $temp->payment_expiration	= $flash_item->payment_expiration;
			
			$flash_item->init_posted_item();
			$temp->rating			= $flash_item->posted_item->calculate_rating();
			$temp->favorite			= $flash_item->posted_item->calculate_favorite();
			
			$this->flash_items[] = $temp;
		}
		
		foreach ($tenant_items as $tenant_item)
		{
			$temp = new class{};
			$temp->id				= $tenant_item->id;
			$temp->posted_item_name	= $tenant_item->posted_item_name;
			$temp->price			= $this->text_renderer->to_rupiah($tenant_item->price);
			$temp->image_one_name	= $tenant_item->image_one_name;
			$temp->rating			= $tenant_item->calculate_rating();
			$temp->favorite			= $tenant_item->calculate_favorite();
			
			$tenant_item->init_tenant();
			$temp->tenant = new class{};
			$temp->tenant->tenant_name	= $tenant_item->tenant->tenant_name;
			
			$tenant_item->get_hot_item();
			$temp->is_hot_item = ($tenant_item->hot_item != null);
			if ($tenant_item->hot_item != null)
			{
				$temp->hot_item = new class{};
				$temp->hot_item->promo_price = $this->text_renderer->to_rupiah($tenant_item->hot_item->promo_price);
			}
			
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