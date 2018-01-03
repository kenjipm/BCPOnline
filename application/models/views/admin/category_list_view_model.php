<?php

class Category_List_View_Model {
	
	public $categories;
	// constructor
	public function __construct()
	{	
		$this->categories = array();
	}
	
	public function get($categories)
	{
		$i = 0;
		foreach($categories as $category)
		{
			$this->categories[$i] = new class{};
			
			$this->categories[$i]->id 					= $category->id;
			$this->categories[$i]->category_name 		= $category->category_name;
			$this->categories[$i]->category_description = $category->category_description;
			
			$i++;
		}
		
	}
	
	
}

?>