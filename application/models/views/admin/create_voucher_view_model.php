<?php

class Create_Voucher_View_Model extends CI_Model{
	
	public $brand_list = array();
	// constructor
	public function __construct()
	{	
	}
	
	public function get($brands)
	{
		$i = 0;
		foreach($brands as $brand)
		{
			$this->brand_list[$i] = new class{};
			
			$this->brand_list[$i]->id 			= $brand->id;
			$this->brand_list[$i]->brand_name	= $brand->brand_name;
			
			$i++;
		}
		
	}
	
	
}

?>