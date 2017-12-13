<?php

class Search_view_model extends View_model {
	
	public $search_items;
	
	// constructor
	public function __construct()
	{
		parent::__construct();
		
		$this->search_items = array();
	}
	
	public function get($items)
	{
		
	}

?>