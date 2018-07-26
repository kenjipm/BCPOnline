<?php

class Flash_Sale_View_Model extends CI_Model{
	
	public $items;
	public $active_flash;
	public $active_bid;
	
	// constructor
	public function __construct()
	{
		parent::__construct();
		
		$this->items = array();
		$this->active_flash = false;
		$this->active_bid = false;
	}
	
	public function get($items, $active_bid)
	{
		$i = 0;
		$this->load->library('text_renderer');
		foreach ($items as $item)
		{	
			$this->items[$i] = new class{};
			
			$this->items[$i]->id 				= $item->id;
			$this->items[$i]->image_one_name	= site_url($item->image_one_name);
			$this->items[$i]->posted_item_name 	= $item->posted_item_name;
			$this->items[$i]->posted_item_description 	= $item->posted_item_description;
			
			$i++;
		}
		
		if ($items) 
		{
			$this->active_flash = true;
			$this->active_bid = false;
		}
		if ($active_bid) 
		{
			$this->active_flash = false;
			$this->active_bid = true;
		}

	}
	
}

?>