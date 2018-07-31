<?php

class Bidding_live_list_view_model extends CI_Model {
	
	public $items;
	public $biddings;
	public $active_flash;
	public $active_bid;
	
	// constructor
	public function __construct()
	{
		parent::__construct();
		
		$this->item = new class{};
		$this->biddings = array();
		$this->active_flash = false;
		$this->active_bid = false;
	}
	
	public function get($item, $biddings, $active_flash)
	{
		$i = 0;
		$this->load->library('text_renderer');

		$this->item->id 				= $item->id;
		$this->item->image_one_name		= site_url($item->image_one_name);
		$this->item->posted_item_name 	= $item->posted_item_name;
		$this->item->posted_item_description 	= $item->posted_item_description;
		$this->item->is_confirmed 		= $item->is_confirmed;
		$this->item->is_winner	 		= $item->is_winner;
		
		foreach ($biddings as $bidding)
		{	
			$this->biddings[$i] = new class{};
			
			$this->biddings[$i]->id				= $bidding->id;
			$this->biddings[$i]->customer_name	= $bidding->customer->account->name;
			$this->biddings[$i]->bid_time		= $bidding->bid_time;
			$this->biddings[$i]->bid_price		= $bidding->bid_price;
			$this->biddings[$i]->posted_item_id	= $bidding->posted_item_id;
		}
		
		if ($active_flash) 
		{
			$this->active_flash = true;
			$this->active_bid = false;
		}
		if (($item) &&  ($this->item->is_confirmed))
		{
			$this->active_flash = false;
			$this->active_bid = true;
			if ($this->item->is_winner)
			{
				$this->active_bid = false;
			}
		}
	}
}
?>