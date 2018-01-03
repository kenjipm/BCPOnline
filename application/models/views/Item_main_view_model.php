<?php

class Item_main_view_model extends CI_Model {
	
	public $item;
	public $item_variances;
	
	// constructor
	public function __construct()
	{
		parent::__construct();
		
		$this->item = new class{};
		$this->item_variances = array();
	}
	
	public function get($item, $item_variances)
	{
		$this->load->library('text_renderer');
		
		
		$this->item->id = $item->id;
		$this->item->posted_item_name = $item->posted_item_name;
		$this->item->price = $this->text_renderer->to_rupiah($item->price);
		$this->item->posted_item_description = $item->posted_item_description;
		$this->item->image_one_name = $item->image_one_name;
		$this->item->is_favorite	= ($item->is_favorite($this->session->child_id) != null);
		$this->item->btn_class	= ($this->item->is_favorite ? "btn-favorited" : "");
		$this->item->btn_text	= ($this->item->is_favorite ? "Sudah Difavoritkan" : "Tambah ke Favorit");
		
		$item->init_tenant();
		$this->item->tenant = new class{};
		$this->item->tenant->id				= $item->tenant->id;
		$this->item->tenant->tenant_name	= $item->tenant->tenant_name;
		$this->item->tenant->is_followed	= ($item->tenant->is_followed($this->session->child_id) != null);
		$this->item->tenant->btn_class	= ($this->item->tenant->is_followed ? "btn-favorited" : "");
		$this->item->tenant->btn_text	= ($this->item->tenant->is_followed ? "Sudah Diikuti" : "Ikuti");
		
		foreach ($item_variances as $item_variance)
		{
			$item_variance_temp = new class{};
			
			$item_variance_temp->id						= $item_variance->id;
			$item_variance_temp->var_type				= $item_variance->var_type;
			$item_variance_temp->var_description		= $item_variance->var_description;
			$item_variance_temp->quantity_available		= $item_variance->quantity_available;
			$item_variance_temp->image_two_name			= $item_variance->image_two_name;
			$item_variance_temp->image_three_name		= $item_variance->image_three_name;
			$item_variance_temp->image_four_name		= $item_variance->image_four_name;
			
			$this->item_variances[] = $item_variance_temp;
		}
	}
}
?>