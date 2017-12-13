<?php

class Item_main_view_model extends CI_Model {
	
	public $item;
	
	// constructor
	public function __construct()
	{
		parent::__construct();
		
		$this->item = new class{};
	}
	
	public function get($item)
	{
		$this->load->library('text_renderer');
		
		$this->item->id = $item->id;
		$this->item->posted_item_name = $item->posted_item_name;
		$this->item->price = $this->text_renderer->to_rupiah($item->price);
		$this->item->posted_item_description = $item->posted_item_description;
		$this->item->image_one_name = $item->image_one_name;
	}
}
?>