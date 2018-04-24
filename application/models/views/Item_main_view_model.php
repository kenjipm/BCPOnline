<?php

class Item_main_view_model extends CI_Model {
	
	public $item;
	public $item_variances;
	public $other_items;
	
	// constructor
	public function __construct()
	{
		parent::__construct();
		
		$this->item = new class{};
		$this->item_variances = array();
		$this->other_items = array();
	}
	
	public function get($item, $item_variances, $other_items)
	{
		$this->load->library('text_renderer');
		
		$this->item->id = $item->id;
		$this->item->posted_item_name = $item->posted_item_name ? $item->posted_item_name : $item->posted_item_description;
		$this->item->price = $this->text_renderer->to_rupiah($item->price);
		$this->item->posted_item_description = $item->posted_item_description;
		$this->item->image_one_name	= site_url(($item->image_one_name !== "") ? $item->image_one_name : DEFAULT_ITEM_PICTURE[$item->item_type]);
		$this->item->image_two_name = $item->image_two_name != "" ? site_url($item->image_two_name) : "";
		$this->item->image_three_name = $item->image_three_name != "" ? site_url($item->image_three_name) : "";
		$this->item->image_four_name = $item->image_four_name != "" ? site_url($item->image_four_name) : "";
		$this->item->is_favorite	= ($item->is_favorite($this->session->child_id) != null);
		$this->item->btn_class	= ($this->item->is_favorite ? "cb-heart-red" : "cb-heart-white");
		$this->item->btn_text	= ($this->item->is_favorite ? "" : "");
		$this->item->rating = $item->calculate_rating();
		
		$item->init_tenant();
		$this->item->tenant = new class{};
		$this->item->tenant->id				= $item->tenant->id;
		$this->item->tenant->tenant_name	= $item->tenant->tenant_name;
		$this->item->tenant->is_followed	= ($item->tenant->is_followed($this->session->child_id) != null);
		$this->item->tenant->btn_class	= ($this->item->tenant->is_followed ? "cb-button-secondary-selected" : "cb-button-form");
		$this->item->tenant->btn_text	= ($this->item->tenant->is_followed ? "SUDAH DIIKUTI" : "IKUTI");
		
		foreach ($item_variances as $item_variance)
		{
			$item_variance_temp = new class{};
			
			$item_variance_temp->id						= $item_variance->id;
			$item_variance_temp->var_type				= $item_variance->var_type;
			$item_variance_temp->var_description		= $item_variance->var_description;
			$item_variance_temp->quantity_available		= $item_variance->quantity_available;
			$item_variance_temp->image_two_name			= site_url($item_variance->image_two_name);
			$item_variance_temp->image_three_name		= site_url($item_variance->image_three_name);
			$item_variance_temp->image_four_name		= site_url($item_variance->image_four_name);
			
			$this->item_variances[] = $item_variance_temp;
		}
		
		foreach ($other_items as $other_item)
		{
			$other_item_temp = new class{};
			
			$other_item_temp->id = $other_item->id;
			$other_item_temp->posted_item_name = $other_item->posted_item_name ? $other_item->posted_item_name : $other_item->posted_item_description;
			$other_item_temp->price = $this->text_renderer->to_rupiah($other_item->price);
			$other_item_temp->posted_item_description = $other_item->posted_item_description;
			$other_item_temp->image_one_name = site_url($other_item->image_one_name);
			$other_item_temp->rating = $other_item->calculate_rating();
			
			$this->other_items[] = $other_item_temp;
		}
	}
}
?>