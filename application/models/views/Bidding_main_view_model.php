<?php

class Bidding_main_view_model extends CI_Model {
	
	public $bidding_item;
	public $is_deposit;
	
	// constructor
	public function __construct()
	{
		parent::__construct();
		
		$this->bidding_item = null;
		$this->is_deposit = false;
	}
	
	public function get($bidding_item, $last_bidding, $deposit_status)
	{
		$this->is_deposit = $deposit_status;
		
		$this->load->library('text_renderer');
		if ($bidding_item != null)
		{
			$this->bidding_item = new class{};
			$this->bidding_item->id = $bidding_item->id;
			$this->bidding_item->posted_item_name = $bidding_item->posted_item_name;
			$this->bidding_item->price = $bidding_item->price;
			$this->bidding_item->bidding_max_range = $bidding_item->bidding_max_range;
			$this->bidding_item->price_str = $this->text_renderer->to_rupiah($bidding_item->price);
			$this->bidding_item->image_one_name	= $bidding_item->image_one_name;
			
			$bid_step = $bidding_item->bidding_max_range / 10;
			$this->bidding_item->can_bid			= $bidding_item->is_can_bid_this_session($last_bidding->bid_time);
			$this->bidding_item->start_bid_price	= $this->bidding_item->can_bid ? ($bidding_item->price + $bid_step) : $last_bidding->bid_price;
		}
	}
}
?>