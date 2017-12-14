<?php

class Reward_List_View_Model {
	
	public $rewards;
	// constructor
	public function __construct()
	{	
	}
	
	public function get($rewards)
	{
		$i = 0;
		foreach($rewards as $reward)
		{
			$this->rewards[$i] = new class{};
			
			$this->rewards[$i]->reward_id 			= $reward->reward_id;
			$this->rewards[$i]->reward_description 	= $reward->reward_description;
			$this->rewards[$i]->date_added 			= $reward->date_added;
			$this->rewards[$i]->date_expired 		= $reward->date_expired;
			$this->rewards[$i]->points_needed 		= $reward->points_needed;
			
			$i++;
		}
		
	}
	
	
}

?>