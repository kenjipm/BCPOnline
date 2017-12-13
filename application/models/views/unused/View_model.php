<?php

class View_model extends CI_Model {
	
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