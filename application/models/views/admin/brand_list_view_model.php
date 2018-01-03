<?php

class Brand_List_View_Model {
	
	public $brands;
	// constructor
	public function __construct()
	{	
		$this->brands = array();
	}
	
	public function get($brands)
	{
		$i = 0;
		foreach($brands as $brand)
		{
			$this->brands[$i] = new class{};
			
			$this->brands[$i]->id 					= $brand->id;
			$this->brands[$i]->brand_name 			= $brand->brand_name;
			$this->brands[$i]->brand_description	= $brand->brand_description;
			
			$i++;
		}
		
	}
	
	
}

?>