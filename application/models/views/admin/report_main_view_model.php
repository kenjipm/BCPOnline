<?php

class report_main_view_model extends CI_Model {
	
	public $tenants;
	public $categories;
	public $brands;
	
	// constructor
	public function __construct()
	{
		parent::__construct();
		
		$this->tenants = array();
		$this->categories = array();
		$this->brands = array();
	}
	
	public function get($tenants, $categories, $brands)
	{
		$i = 0;
		foreach ($tenants as $tenant)
		{	
			$this->tenants[$i] = new class{};
			
			$this->tenants[$i]->id 				= $tenant->tenant_id;
			$this->tenants[$i]->tenant_name 	= $tenant->tenant_name;
			
			$i++;
		}
		
		$i = 0;
		foreach ($categories as $category)
		{	
			$this->categories[$i] = new class{};
			
			$this->categories[$i]->id 			= $category->id;
			$this->categories[$i]->category_name 	= $category->category_name;
			
			$i++;
		}
		
		$i = 0;
		foreach ($brands as $brand)
		{	
			$this->brands[$i] = new class{};
			
			$this->brands[$i]->id 			= $brand->id;
			$this->brands[$i]->brand_name 	= $brand->brand_name;
			
			$i++;
		}
	}
}
?>