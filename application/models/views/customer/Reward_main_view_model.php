<?php

class Reward_main_view_model extends CI_Model {
	
	public $rewards;
	public $reward_points;
	
	// constructor
	public function __construct()
	{
		parent::__construct();
		
		$this->rewards = array();
		$this->reward_points = 0;
	}
	
	public function get($rewards, $reward_points)
	{
		foreach ($rewards as $reward)
		{
			$reward_temp = new class{};
			$reward_temp->id 					= $reward->id;
			$reward_temp->date_added 			= date("d M y", strtotime($reward->date_added));
			$reward_temp->date_expired 			= date("d M y", strtotime($reward->date_expired));
			$reward_temp->points_needed 		= number_format($reward->points_needed, 0, ',', '.');
			$reward_temp->reward_description 	= $reward->reward_description;
			
			$reward_temp->name 	= "";
			$reward_temp->is_claimable 	= ($reward_points > $reward->points_needed);
			
			$this->rewards[] = $reward_temp;
		}
		
		$this->reward_points = number_format($reward_points, 0, ',', '.');
	}
}
?>