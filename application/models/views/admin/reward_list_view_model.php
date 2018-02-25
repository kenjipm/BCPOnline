<?php

class Reward_List_View_Model {
	
	public $rewards;
	public $setting_reward;
	// constructor
	public function __construct()
	{	
		$this->rewards = array();
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
	
	public function get_setting($setting_reward)
	{

		$this->setting_reward = new class{};
		
		$this->setting_reward->base_percent			= $setting_reward->base_percent;	
		$this->setting_reward->ratio_percent		= $setting_reward->ratio_percent;	
		$this->setting_reward->price_per_point		= $setting_reward->price_per_point;	
		$this->setting_reward->point_get			= $setting_reward->point_get;	
		$this->setting_reward->event_name			= $setting_reward->event_name;	
		$this->setting_reward->date_created			= $setting_reward->date_created;	
		$this->setting_reward->date_expired			= $setting_reward->date_expired;	
		
		if($this->setting_reward->date_expired == NULL) $this->setting_reward->date_expired = "selamanya";
	}
	
}

?>