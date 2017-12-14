<?php

class Dashboard_view_model extends CI_Model {
	
	public $kategoris;
	public $tenant_items;
	public $hot_items;
	
	// constructor
	public function __construct()
	{
		$this->search_items = array();
	}
	
	public function get($categories)
	{
		$this->load->library('text_renderer');
		foreach ($items as $item)
		{
			$temp = new class{};
			$temp->id = $item->id;
			$temp->posted_item_name = $item->posted_item_name;
			$temp->price = $this->text_renderer->to_rupiah($item->price);
			$temp->image_one_name = $item->image_one_name;
			
			$this->search_items[] = $temp;
		}
	}
}
?>