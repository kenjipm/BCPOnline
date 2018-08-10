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
		
		$this->items = array();
		$this->biddings = array();
		$this->active_flash = false;
		$this->active_bid = false;
	}
	
	public function get($items, $biddings, $active_flash)
	{
		$i = 0;
		$this->load->library('text_renderer');
		
		foreach ($items as $item)
		{
			$this->items[$i] = new class{};
			// print_r($item);
			$this->items[$i]->id 				= $item->id;
			$this->items[$i]->image_one_name	= site_url($item->image_one_name);
			$this->items[$i]->posted_item_name 	= $item->posted_item_name;
			$this->items[$i]->posted_item_description 	= $item->posted_item_description;
			$this->items[$i]->is_confirmed 		= $item->is_confirmed;
			$this->items[$i]->is_expired 		= $item->is_expired();
			if ($i == 0) $this->items[$i]->is_winner = $item->is_winner;
			
			$i++;
		}
		// print_r($this->items);
		$i = 0;
		foreach ($biddings as $bidding)
		{	
			$this->biddings[$i] = new class{};
			
			$this->biddings[$i]->id				= $bidding->id;
			$this->biddings[$i]->customer_name	= $bidding->customer->account->name;
			$this->biddings[$i]->bid_time		= $bidding->bid_time;
			$this->biddings[$i]->bid_price		= $bidding->bid_price;
			$this->biddings[$i]->posted_item_id	= $bidding->posted_item_id;
			
			$i++;
		}
		
		if ($active_flash) 
		{
			$this->active_flash = true;
			$this->active_bid = false;
		}
		if (($this->items) &&  ($this->items[0]->is_confirmed))
		{
			$this->active_flash = false;
			$this->active_bid = true;
			if ($this->items[0]->is_winner)
			{
				$this->active_bid = false;
			}
		}
	}
}
?>