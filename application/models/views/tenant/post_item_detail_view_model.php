<?php

class Post_Item_Detail_View_Model extends CI_Model{
	
	public $posted_item;
	// constructor
	public function __construct()
	{	
	}
	
	public function get($item)
	{
		$this->posted_item = new class{};
		$this->load->library('Text_renderer');
			
		$this->posted_item->id 						= $item->id;
		$this->posted_item->posted_item_name 		= $item->posted_item_name;
		$this->posted_item->price					= $this->text_renderer->to_rupiah($item->price);
		$this->posted_item->item_type 				= $item->item_type;
		$this->posted_item->quantity_avalaible		= $item->quantity_avalaible;
		$this->posted_item->unit_weight				= $item->unit_weight;
		$this->posted_item->posted_item_description	= $item->posted_item_description;
		
		$this->posted_item->category				= new class{};
		$this->posted_item->category->category_name	= $item->category->category_name;
		$this->posted_item->brand					= new class{};
		$this->posted_item->brand->brand_name		= $item->brand->brand_name;
		
	}
	
	public function get_category_name($id)
	{
		
	}
	
	public function get_brand_name($id)
	{
		
	}
	
	public function get_all_tag($id)
	{
		
	}
	
}

?>