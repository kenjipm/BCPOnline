<?php

class View_model {
	
	public $title;
	
	// constructor
	public function __construct()
	{
		parent::__construct();
	}
	
	public function set_title($title)
	{
		$this->title = $title;
	}
}

?>