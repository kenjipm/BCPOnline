<?php

class Bidding_detail_view_model extends CI_Model {
	
	public $biddings;
	public $is_expired;
	public $max_price;
	public $update_price;
	
	// constructor
	public function __construct()
	{
		parent::__construct();
		
		$this->biddings = array();
		$this->max_price = 0;
	}
	
	public function get($biddings, $is_expired)
	{
		$i = 0;
		$this->load->library('text_renderer');
		
		foreach ($biddings as $bidding)
		{	
			$this->biddings[$i] = new class{};
			
			$this->biddings[$i]->id				= $bidding->id;
			$this->biddings[$i]->customer_id	= $bidding->customer_id;
			$this->biddings[$i]->customer_name	= $bidding->customer->account->name;
			$this->biddings[$i]->bid_time		= $bidding->bid_time;
			$this->biddings[$i]->bid_price		= $bidding->bid_price;
			$this->biddings[$i]->posted_item_id	= $bidding->posted_item_id;
			
			if ($bidding->bid_price > $this->max_price)
				$this->max_price = $bidding->bid_price;
			
			$i++;
		}
		
		$this->is_expired = $is_expired;
		$this->update_price = $this->biddings[0]->bid_price;
	}
}
?>