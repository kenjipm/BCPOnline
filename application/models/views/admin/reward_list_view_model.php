<?php

class Reward_List_View_Model {
	
	public $rewards;
	public $setting_reward;
	// constructor
	public function __construct()
	{	
		$this->rewards = array();
	}
	
	public function get($rewards, $redeems)
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
	
		$i = 0;
		foreach($redeems as $redeem)
		{
			$j = 0;
			foreach($redeem as $redeem_reward)
			{
				$this->rewards[$i]->redeem_reward[$j] = new class{};
				$this->rewards[$i]->redeem_reward[$j]->id			 = $redeem_reward->id;
				$this->rewards[$i]->redeem_reward[$j]->account_id	 = $redeem_reward->customer->account_id;
				$this->rewards[$i]->redeem_reward[$j]->customer_name = $redeem_reward->customer->account->name;
				$this->rewards[$i]->redeem_reward[$j]->phone_number	 = $redeem_reward->customer->account->phone_number;
				$this->rewards[$i]->redeem_reward[$j]->date_redeemed = $redeem_reward->date_redeemed;
				$this->rewards[$i]->redeem_reward[$j]->status		 = $redeem_reward->status;
				$j++;
			}
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