<?php

class Bidding_live_detail_view_model extends CI_Model {
	
	public $biddings;
	public $is_expired;
	public $is_choosen;
	public $update_price;
	
	// constructor
	public function __construct()
	{
		parent::__construct();
		
		$this->biddings = array();
	}
	
	public function get($biddings, $is_expired, $is_choosen)
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
			
			$i++;
		}
		
		$this->is_expired = $is_expired;
		$this->is_choosen = $is_choosen;
	}
}
?>