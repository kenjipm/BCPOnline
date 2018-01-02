<?php

class Dashboard_View_Model extends CI_Model{
	
	public $tenant;
	public $posted_items = array();
	public $orders = array();
	public $sold_items = array();
	// constructor
	public function __construct()
	{	
	}
	
	public function get_tenant($item)
	{
		$this->tenant = new class{};
		
		$this->tenant->id 			= $item->id;
		$this->tenant->tenant_name	= $item->tenant_name;
		$this->tenant->unit_number 	= $item->unit_number;
		$this->tenant->floor 		= $item->floor;
		
	}
	
	public function get_posted_item($items)
	{
		$this->load->library('Text_renderer');
		$i = 0;
		foreach($items as $item)
		{
			$this->posted_items[$i] = new class{};
			
			$this->posted_items[$i]->id 				= $item->id;
			$this->posted_items[$i]->image_one_name		= $item->image_one_name;
			$this->posted_items[$i]->image_two_name		= $item->image_two_name;
			$this->posted_items[$i]->image_three_name	= $item->image_three_name;
			$this->posted_items[$i]->image_four_name	= $item->image_four_name;
			$this->posted_items[$i]->posted_item_name 	= $item->posted_item_name;
			$this->posted_items[$i]->item_type 			= $item->item_type;
			$this->posted_items[$i]->price				= $this->text_renderer->to_rupiah($item->price);
			
			$i++;
		}
		
	}
	
	public function get_transaction($items)
	{
		$this->load->library('Text_renderer');
		$i = 0;
		foreach($items as $item)
		{
			$this->orders[$i] = new class{};
			
			$this->orders[$i]->id 			= $item->id;
			$this->orders[$i]->order_status	= ORDER_STATUS['description'][$item->order_status];
			$this->orders[$i]->date_created	= date("d-M-Y H:i:s", strtotime($item->billing->date_created));
			$this->orders[$i]->date_closed	= date("d-M-Y H:i:s", strtotime($item->billing->date_closed));
			$this->orders[$i]->sold_price	= $this->text_renderer->to_rupiah($item->sold_price);
			
			$i++;
		}
		
	}
	
	public function get_sold_item($items)
	{
		$this->load->library('Text_renderer');
		$i = 0;
		foreach($items as $item)
		{
			$this->sold_items[$i] = new class{};
			
			$this->sold_items[$i]->id				= $item->id;
			$this->sold_items[$i]->sold_price		= $this->text_renderer->to_rupiah($item->sold_price);
			$this->sold_items[$i]->date_closed		= date("d-M-Y H:i:s", strtotime($item->billing->date_closed));
			$this->sold_items[$i]->name				= $item->posted_item_variance->posted_item->posted_item_name;
			$this->sold_items[$i]->var_type			= $item->posted_item_variance->var_type;
			$this->sold_items[$i]->var_description	= $item->posted_item_variance->var_description;
			
			$i++;
		}
	}
}

?>