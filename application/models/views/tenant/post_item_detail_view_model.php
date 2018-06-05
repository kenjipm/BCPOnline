<?php

class Post_Item_Detail_View_Model extends CI_Model{
	
	public $posted_item;
	public $nego_price;
	
	public $item_category;
	public $item_brand;
	public $item_variance;
	
	// constructor
	public function __construct()
	{
		$this->posted_item = new class{};
		$this->posted_item->is_hot_item = false;
		$this->posted_item->is_hot_item_confirmed = false;
		$this->posted_item->is_hot_item_paid = false;
		$this->posted_item->hot_item_id = 0;
		$this->posted_item->is_seo_item = false;
		$this->posted_item->is_seo_item_confirmed = false;
		$this->posted_item->is_seo_item_paid = false;
		
		$this->item_category = array();
		$this->item_brand = array();
		$this->item_variance = array();
	}
	
	public function get($item, $posted_item_variances, $hot_item, $seo_item, $categories, $brands)
	{
		$this->load->library('Text_renderer');
			
		$this->posted_item->id 						= $item->id;
		$this->posted_item->posted_item_name 		= $item->posted_item_name;
		$this->posted_item->price					= $this->text_renderer->to_rupiah($item->price);
		$this->posted_item->item_type 				= $item->item_type;
		$this->posted_item->unit_weight				= $item->unit_weight;
		$this->posted_item->posted_item_description	= $item->posted_item_description;
		$this->posted_item->image_one_name			= site_url($item->image_one_name);
		
		$this->posted_item->category				= new class{};
		$this->posted_item->category_id				= $item->category_id;
		$this->posted_item->category->category_name	= $item->category->category_name;
		$this->posted_item->brand					= new class{};
		$this->posted_item->brand_id				= $item->brand_id;
		$this->posted_item->brand->brand_name		= $item->brand->brand_name;
		
		$i = 0;
		foreach($categories as $category)
		{
			$this->item_category[$i] = new class{};
			
			$this->item_category[$i]->id 			= $category->id;
			$this->item_category[$i]->category_name	= $category->category_name;
			
			$i++;
		}
		
		$i = 0;
		foreach($brands as $brand)
		{
			$this->item_brand[$i] = new class{};
			
			$this->item_brand[$i]->id 			= $brand->id;
			$this->item_brand[$i]->brand_name	= $brand->brand_name;
			
			$i++;
		}
		
		$i = 0;
		foreach(POSTED_ITEM_VARIANCE_TYPE['type'] as $type)
		{
			$this->item_variance[$i] = $type;
			
			$i++;
		}
		
		$i = 0;
		foreach($posted_item_variances as $posted_item_variance)
		{
			$this->posted_item->var_id[$i] 				= $posted_item_variance->id;
			$this->posted_item->var_type[$i] 			= $posted_item_variance->var_type;
			$this->posted_item->var_desc[$i] 			= $posted_item_variance->var_description;
			$this->posted_item->quantity_available[$i] 	= $posted_item_variance->quantity_available;
			$this->posted_item->image_two_name[$i] 		= site_url($posted_item_variance->image_two_name);
			$this->posted_item->image_three_name[$i] 	= site_url($posted_item_variance->image_three_name);
			$this->posted_item->image_four_name[$i] 	= site_url($posted_item_variance->image_four_name);
			
			$i++;
		}
		
		if ($hot_item != null)
		{
			$this->load->model('tenant_bill_model');
			$tenant_bill = $this->tenant_bill_model->get_from_hot_item_id($hot_item->id);
			$this->posted_item->is_hot_item = true;
			$this->posted_item->hot_item_id = $hot_item->id;
			if ($tenant_bill != null)
			{
				$this->posted_item->is_hot_item_confirmed = true;
				$this->posted_item->payment_value = $tenant_bill->payment_value;
				if ($tenant_bill->is_paid_hot_item())
				{
					$this->posted_item->is_hot_item_paid = true;
					if ($tenant_bill->is_expired())
					{
						$this->posted_item->is_hot_item = false;
					}
				}
			}
		}
		
		if ($seo_item != null)
		{
			$this->load->model('tenant_bill_model');
			$tenant_bill = $this->tenant_bill_model->get_from_seo_item_id($seo_item->posted_item_id);
			$this->posted_item->is_seo_item = true;
			$this->posted_item->seo_item_id = $seo_item->id;
			if ($tenant_bill != null)
			{
				$this->posted_item->is_seo_item_confirmed = true;
				$this->posted_item->payment_value = $tenant_bill->payment_value;
				if ($tenant_bill->is_paid_seo_item())
				{
					$this->posted_item->is_seo_item_paid = true;
					if ($tenant_bill->is_expired())
					{
						$this->posted_item->is_seo_item = false;
					}
				}
			}
		}
	}
}

?>