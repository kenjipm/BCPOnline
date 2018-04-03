<?php

class Setting_Reward_View_Model {
	
	public $is_existed;
	public $setting_reward;
	// constructor
	public function __construct()
	{	
		$this->is_existed = false;
		$this->setting_reward = new class{};
		
		$this->setting_reward->id 					= 0;
		$this->setting_reward->base_percent	 		= 0;
		$this->setting_reward->ratio_percent 		= 0;
		$this->setting_reward->price_per_point 		= 0;
		$this->setting_reward->point_get	 		= 0;
		$this->setting_reward->event_name	 		= "";
		$this->setting_reward->date_created	 		= date('Y-m-d H:i:s');
		$this->setting_reward->date_expired	 		= date('Y-m-d H:i:s');
		$this->setting_reward->is_forever	 		= false;
	}
	
	public function get($setting_reward=null)
	{
		if ($setting_reward != null)
		{
			$this->setting_reward->id 					= $setting_reward->id;
			$this->setting_reward->base_percent	 		= $setting_reward->base_percent;
			$this->setting_reward->ratio_percent 		= $setting_reward->ratio_percent;
			$this->setting_reward->price_per_point 		= $setting_reward->price_per_point;
			$this->setting_reward->point_get	 		= $setting_reward->point_get;
			$this->setting_reward->event_name	 		= $setting_reward->event_name;
			$this->setting_reward->date_created	 		= $setting_reward->date_created ?? date('Y-m-d H:i:s');
			$this->setting_reward->date_expired	 		= $setting_reward->date_expired ?? "0000-00-00 00:00:00";
			$this->setting_reward->is_forever	 		= $setting_reward->date_expired == null;
			
			$this->is_existed = true;
		}
	}
	
}

?>