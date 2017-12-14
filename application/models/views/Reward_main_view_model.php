<?php

class Reward_main_view_model extends CI_Model {
	
	public $reward;
	
	// constructor
	public function __construct()
	{
		parent::__construct();
		
		$this->reward = new class{};
	}
	
	public function get($reward)
	{
		
	}
}
?>