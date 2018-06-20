<?php

class Search_view_model extends CI_Model {
	
	public $promoted_items;
	public $search_items;
	public $categories;
	public $category;
	public $pagination;
	public $base_url;
	public $url_parameter;
	public $item_per_page;
	
	// constructor
	public function __construct()
	{
		$this->promoted_items = array();
		$this->search_items = array();
		$this->categories = array();
		$this->pagination = new class{};
		$this->base_url = "";
		$this->url_parameter = "";
		$this->item_per_page = 0;
	}
	
	public function get($categories, $promoted_items, $items, $category_id)
	{
		$this->load->library('text_renderer');
		$this->base_url = site_url('item/category/' . $category_id . '/');
		$this->item_per_page = PAGINATION['type']['LIMIT_CATEGORY'];
		
		foreach ($categories as $category)
		{
			$temp = new class{};
			$temp->id				= $category->id;
			$temp->category_name	= strtoupper($category->category_name);
			
			$this->categories[] = $temp;
		}
		
		foreach ($promoted_items as $promoted_item)
		{
			$temp = new class{};
			
			$temp->id = $promoted_item->id;
			$temp->posted_item_name = $promoted_item->posted_item_name ? $promoted_item->posted_item_name : $promoted_item->posted_item_description;
			$temp->price = $this->text_renderer->to_rupiah($promoted_item->price);
			$temp->image_one_name = site_url(($promoted_item->image_one_name !== "") ? $promoted_item->image_one_name : DEFAULT_ITEM_PICTURE[$promoted_item->item_type]);
			$temp->rating = $promoted_item->calculate_rating();
			
			$promoted_item->get_hot_item();
			$temp->is_hot_item = ($promoted_item->hot_item != null);
			if ($promoted_item->hot_item != null)
			{
				$temp->hot_item = new class{};
				$temp->hot_item->promo_price = $this->text_renderer->to_rupiah($promoted_item->hot_item->promo_price);
			}
			
			$this->promoted_items[] = $temp;
		}
		
		foreach ($items as $item)
		{
			$temp = new class{};
			$temp->id = $item->id;
			$temp->posted_item_name = $item->posted_item_name ? $item->posted_item_name : $item->posted_item_description;
			$temp->price = $this->text_renderer->to_rupiah($item->price);
			$temp->image_one_name = site_url(($item->image_one_name !== "") ? $item->image_one_name : DEFAULT_ITEM_PICTURE[$item->item_type]);
			$temp->rating = $item->calculate_rating();
			
			$item->get_hot_item();
			$temp->is_hot_item = ($item->hot_item != null);
			if ($item->hot_item != null)
			{
				$temp->hot_item = new class{};
				$temp->hot_item->promo_price = $this->text_renderer->to_rupiah($item->hot_item->promo_price);
			}
			
			$this->search_items[] = $temp;
		}
		
		$this->category = new class{};
		$this->category->id = $category_id;
	}
	
	public function get_search($categories, $promoted_items, $items, $keywords)
	{
		$this->load->library('text_renderer');
		$this->base_url = site_url('item/search/');
		$this->url_parameter = '?keywords=' . $keywords;
		$this->item_per_page = PAGINATION['type']['LIMIT_ITEM'];
		
		foreach ($categories as $category)
		{
			$temp = new class{};
			$temp->id				= $category->id;
			$temp->category_name	= strtoupper($category->category_name);
			
			$this->categories[] = $temp;
		}
		
		foreach ($promoted_items as $promoted_item)
		{
			$temp = new class{};
			$temp->id = $promoted_item->id;
			$temp->posted_item_name = $promoted_item->posted_item_name ? $promoted_item->posted_item_name : $promoted_item->posted_item_description;
			$temp->price = $this->text_renderer->to_rupiah($promoted_item->price);
			$temp->image_one_name = site_url(($promoted_item->image_one_name !== "") ? $promoted_item->image_one_name : DEFAULT_ITEM_PICTURE[$promoted_item->item_type]);
			$temp->rating = $promoted_item->calculate_rating();
			
			$promoted_item->get_hot_item();
			$temp->is_hot_item = ($promoted_item->hot_item != null);
			if ($promoted_item->hot_item != null)
			{
				$temp->hot_item = new class{};
				$temp->hot_item->promo_price = $this->text_renderer->to_rupiah($promoted_item->hot_item->promo_price);
			}
			
			$this->promoted_items[] = $temp;
		}
		
		foreach ($items as $item)
		{
			$temp = new class{};
			$temp->id = $item->id;
			$temp->posted_item_name = $item->posted_item_name ? $item->posted_item_name : $item->posted_item_description;
			$temp->price = $this->text_renderer->to_rupiah($item->price);
			$temp->image_one_name = site_url(($item->image_one_name !== "") ? $item->image_one_name : DEFAULT_ITEM_PICTURE[$item->item_type]);
			$temp->rating = $item->calculate_rating();
			
			$item->get_hot_item();
			$temp->is_hot_item = ($item->hot_item != null);
			if ($item->hot_item != null)
			{
				$temp->hot_item = new class{};
				$temp->hot_item->promo_price = $this->text_renderer->to_rupiah($item->hot_item->promo_price);
			}
			
			$this->search_items[] = $temp;
		}
		
		$this->category = new class{};
		$this->category->id = 0;
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