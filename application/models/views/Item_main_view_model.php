<?php

class Item_main_view_model extends CI_Model {
	
	public $item;
	public $item_variances;
	public $other_items;
	public $feedbacks;
	
	// constructor
	public function __construct()
	{
		parent::__construct();
		
		$this->item = new class{};
		$this->item_variances = array();
		$this->other_items = array();
		$this->feedbacks = array();
	}
	
	public function get($item, $item_variances, $other_items, $feedbacks)
	{
		$this->load->library('text_renderer');
		
		$this->item->id = $item->id;
		$this->item->posted_item_name = $item->posted_item_name ? $item->posted_item_name : $item->posted_item_description;
		$this->item->price = $this->text_renderer->to_rupiah($item->price);
		$this->item->item_type = $item->item_type;
		$this->item->category_id = $item->category_id;
		$this->item->posted_item_description = nl2br($item->posted_item_description);
		$this->item->image_one_name	= site_url(($item->image_one_name !== "") ? $item->image_one_name : DEFAULT_ITEM_PICTURE[$item->item_type]);
		$this->item->image_two_name = $item->image_two_name != "" ? site_url($item->image_two_name) : "";
		$this->item->image_three_name = $item->image_three_name != "" ? site_url($item->image_three_name) : "";
		$this->item->image_four_name = $item->image_four_name != "" ? site_url($item->image_four_name) : "";
		$this->item->is_favorite	= ($item->is_favorite($this->session->child_id) != null);
		$this->item->btn_class	= ($this->item->is_favorite ? "cb-heart-red" : "cb-heart-white");
		$this->item->btn_text	= ($this->item->is_favorite ? "" : "");
		$this->item->rating = $item->calculate_rating();
		$this->item->favorite = $item->calculate_favorite();
		
		$item->init_tenant();
		$this->item->tenant = new class{};
		$this->item->tenant->id				= $item->tenant->id;
		$this->item->tenant->account_id				= $item->tenant->account_id;
		$this->item->tenant->tenant_name	= $item->tenant->tenant_name;
		$this->item->tenant->is_followed	= ($item->tenant->is_followed($this->session->child_id) != null);
		$this->item->tenant->btn_class	= ($this->item->tenant->is_followed ? "cb-button-secondary-selected" : "cb-button-form");
		$this->item->tenant->btn_text	= ($this->item->tenant->is_followed ? "SUDAH DIIKUTI" : "IKUTI");
		$this->item->tenant->rating = $item->tenant->calculate_rating();
		
		$item->get_hot_item();
		$this->item->is_hot_item = ($item->hot_item != null);
		if ($item->hot_item != null)
		{
			$this->item->hot_item = new class{};
			$this->item->hot_item->promo_price = $this->text_renderer->to_rupiah($item->hot_item->promo_price);
			$this->item->discount_percentage = "-" . ceil(($item->price - $item->hot_item->promo_price) / $item->price * 100) . "%";
		}
		
		$item->tenant->init_account();
		$this->item->tenant->account = new class{};
		$this->item->tenant->account->is_tenant_admin = in_array($item->tenant->account->email, TENANT_ADMIN_EMAILS);
		$this->item->tenant->account->profile_pic	= site_url(($item->tenant->account->profile_pic != "") ? $item->tenant->account->profile_pic : DEFAULT_PROFILE_PIC);
		$this->item->tenant->account->is_blocked = $item->tenant->account->is_blocked();
		
		$this->item->total_quantity_available = 0;
		foreach ($item_variances as $item_variance)
		{
			if ($item_variance->quantity_available > 0)
			{
				$item_variance_temp = new class{};
				
				$item_variance_temp->id						= $item_variance->id;
				$item_variance_temp->var_type				= $item_variance->var_type;
				$item_variance_temp->var_description		= $item_variance->var_description;
				$item_variance_temp->quantity_available		= $item_variance->quantity_available;
				$item_variance_temp->image_two_name			= !in_array($item_variance->image_two_name, DEFAULT_ITEM_PICTURE) ? site_url($item_variance->image_two_name) : "";
				$item_variance_temp->image_three_name		= !in_array($item_variance->image_three_name, DEFAULT_ITEM_PICTURE) ? site_url($item_variance->image_three_name) : "";
				$item_variance_temp->image_four_name		= !in_array($item_variance->image_four_name, DEFAULT_ITEM_PICTURE) ? site_url($item_variance->image_four_name) : "";
				
				$this->item_variances[] = $item_variance_temp;
				$this->item->total_quantity_available += $item_variance_temp->quantity_available;
			}
		}
		$this->item->is_empty_stock = (($this->item->item_type == "ORDER") || ($this->item->item_type == "FLASH")) && ($this->item->total_quantity_available <= 0);
		
		foreach ($other_items as $other_item)
		{
			$other_item_temp = new class{};
			
			$other_item_temp->id = $other_item->id;
			$other_item_temp->posted_item_name = $other_item->posted_item_name ? $other_item->posted_item_name : $other_item->posted_item_description;
			$other_item_temp->price = $this->text_renderer->to_rupiah($other_item->price);
			$other_item_temp->posted_item_description = $other_item->posted_item_description;
			$other_item_temp->image_one_name = site_url(($other_item->image_one_name !== "") ? $other_item->image_one_name : DEFAULT_ITEM_PICTURE[$other_item->item_type]);
			$other_item_temp->rating = $other_item->calculate_rating();
			$other_item_temp->favorite = $other_item->calculate_favorite();
			
			if (strlen($other_item_temp->posted_item_name) > ITEM_NAME_THUMBNAIL_MAX_CHAR)
			$other_item_temp->posted_item_name = substr($other_item_temp->posted_item_name, 0, ITEM_NAME_THUMBNAIL_MAX_CHAR - 3) . "...";
			
			$other_item->init_tenant();
			$other_item_temp->tenant = new class{};
			$other_item_temp->tenant->tenant_name	= $other_item->tenant->tenant_name;
			
			$other_item->get_hot_item();
			$other_item_temp->is_hot_item = ($other_item->hot_item != null);
			if ($other_item->hot_item != null)
			{
				$other_item_temp->hot_item = new class{};
				$other_item_temp->hot_item->promo_price = $this->text_renderer->to_rupiah($other_item->hot_item->promo_price);
			}
			
			$this->other_items[] = $other_item_temp;
		}
		
		foreach ($feedbacks as $feedback)
		{
			$feedback_temp = new class{};
			
			$feedback_temp->feedback_text = $feedback->feedback_text;
			$feedback_temp->feedback_reply = $feedback->feedback_reply;
			$feedback_temp->rating_class = number_format(round($feedback->rating * 2) / 2, 1, "-", "");
			$feedback_temp->account_name = $feedback->name;
			
			$this->feedbacks[] = $feedback_temp;
		}
	}
}
?>