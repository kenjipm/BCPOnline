<?php

class Item_gallery_view_model extends CI_Model {
	
	public $items;
	public $pagination;
	public $base_url;
	public $url_parameter;
	public $item_per_page;
	
	// constructor
	public function __construct()
	{
		parent::__construct();
		
		$this->items = array();
		$this->pagination = new class{};
		$this->base_url = "";
		$this->url_parameter = "";
		$this->item_per_page = 0;
	}
	
	public function get($items, $page_url)
	{
		$this->load->library('text_renderer');
		$this->base_url = site_url($page_url);
		$this->item_per_page = PAGINATION['type']['LIMIT_ITEM'];
		
		foreach($items as $item)
		{
			$item_temp 			= new class{};
			$item_temp->id					= $item->id;
			$item_temp->image_one_name		= site_url(($item->image_one_name !== "") ? $item->image_one_name : DEFAULT_ITEM_PICTURE[$item->item_type]);
			$item_temp->posted_item_name	= ($item->posted_item_name != "") ? $item->posted_item_name : $item->posted_item_description;
			$item_temp->price				= $this->text_renderer->to_rupiah($item->price);
			$item_temp->rating				= $item->calculate_rating();
			$item_temp->favorite			= $item->calculate_favorite();
			
			if (strlen($item_temp->posted_item_name) > ITEM_NAME_THUMBNAIL_MAX_CHAR)
			$item_temp->posted_item_name = substr($item_temp->posted_item_name, 0, ITEM_NAME_THUMBNAIL_MAX_CHAR - 3) . "...";
			
			$item->init_tenant();
			$item_temp->tenant = new class{};
			$item_temp->tenant->tenant_name	= $item->tenant->tenant_name;
			
			$item->get_hot_item();
			$item_temp->is_hot_item = ($item->hot_item != null);
			if ($item->hot_item != null)
			{
				$item_temp->hot_item = new class{};
				$item_temp->hot_item->promo_price = $this->text_renderer->to_rupiah($item->hot_item->promo_price);
			}
			
			$this->items[] = $item_temp;
		}
	}
	
	public function get_hot_items($items)
	{
		$this->load->library('text_renderer');
		$this->base_url = site_url('item/hot_items/');
		$this->item_per_page = PAGINATION['type']['LIMIT_ITEM'];
		
		foreach ($items as $item)
		{
			$temp = new class{};
			$temp->id = $item->id;
			$temp->posted_item_name = $item->posted_item_name ? $item->posted_item_name : $item->posted_item_description;
			$temp->price = $this->text_renderer->to_rupiah($item->price);
			$temp->image_one_name = site_url(($item->image_one_name !== "") ? $item->image_one_name : DEFAULT_ITEM_PICTURE[$item->item_type]);
			$temp->rating = $item->calculate_rating();
			$temp->favorite = $item->calculate_favorite();
			
			if (strlen($temp->posted_item_name) > ITEM_NAME_THUMBNAIL_MAX_CHAR)
			$temp->posted_item_name = substr($temp->posted_item_name, 0, ITEM_NAME_THUMBNAIL_MAX_CHAR - 3) . "...";
			
			$item->init_tenant();
			$temp->tenant = new class{};
			$temp->tenant->tenant_name	= $item->tenant->tenant_name;
			
			$item->get_hot_item();
			$temp->is_hot_item = ($item->hot_item != null);
			if ($item->hot_item != null)
			{
				$temp->hot_item = new class{};
				$temp->hot_item->promo_price = $this->text_renderer->to_rupiah($item->hot_item->promo_price);
			}
			
			$this->items[] = $temp;
		}
	}
	
	// [<<] [<] 1 ... 4 5 6 ... 20 [>] [>>]
	function calculate_pagination($item_count, $current_page)
	{
		$last_page_number = ceil($item_count / $this->item_per_page);
		
		$this->pagination->pages = array();
		$this->pagination->is_prev_dots = false;
		$this->pagination->is_next_dots = false;
		$this->pagination->prev_page = false;
		$this->pagination->next_page = false;
		$this->pagination->first_page = false;
		$this->pagination->last_page = false;
		$this->pagination->first_page_number = false;
		$this->pagination->last_page_number = false;
		$this->pagination->current_page = $current_page;
		
		if ($current_page > 1)
		{
			$this->pagination->first_page = 1;
			$this->pagination->prev_page = $current_page - 1;
		}
		if ($current_page < $last_page_number)
		{
			$this->pagination->last_page = $last_page_number;
			$this->pagination->next_page = $current_page + 1;
		}
		if ($last_page_number > 1)
		{
			$this->pagination->first_page_number = 1;
			$this->pagination->last_page_number = $last_page_number;
			
			for ($i=2; $i<$last_page_number; $i++)
			{
				if ($i < ($current_page-2))
				{
					$this->pagination->is_prev_dots = true;
					$i = $current_page-2;
				}
				if ($i > ($current_page+2))
				{
					$this->pagination->is_next_dots = true;
					break;
				}
				$this->pagination->pages[] = $i;
			}
		}
		
	}
}
?>