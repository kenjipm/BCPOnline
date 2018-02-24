<?php

class Reward_redeem_view_model extends CI_Model {
	
	public $redeem_rewards;
	public $reward_points;
	
	// constructor
	public function __construct()
	{
		parent::__construct();
		
		$this->redeem_rewards = array();
		$this->reward_points = 0;
	}
	
	public function get($redeem_rewards, $reward_points)
	{
		$this->load->config('statuses');
		$redeem_reward_status = $this->config->item('REDEEM_REWARD');
		
		foreach ($redeem_rewards as $redeem_reward)
		{
			$redeem_reward_temp = new class{};
			$redeem_reward_temp->id 					= $redeem_reward->id;
			$redeem_reward_temp->redeem_id 				= $redeem_reward->redeem_id;
			$redeem_reward_temp->date_redeemed 			= date("d M y H:i:s", strtotime($redeem_reward->date_redeemed));
			$redeem_reward_temp->status 				= $redeem_reward_status['description'][$redeem_reward->status];
			
			$redeem_reward->init_reward();
			$redeem_reward_temp->reward = new class{};
			$redeem_reward_temp->reward->name				= "";
			$redeem_reward_temp->reward->date_added			= date("d M y H:i:s", strtotime($redeem_reward->reward->date_added));
			$redeem_reward_temp->reward->date_expired		= date("d M y H:i:s", strtotime($redeem_reward->reward->date_expired));
			$redeem_reward_temp->reward->points_needed		= number_format($redeem_reward->reward->points_needed, 0, ',', '.');
			$redeem_reward_temp->reward->reward_description	= $redeem_reward->reward->reward_description;
			
			$this->redeem_rewards[] = $redeem_reward_temp;
		}
		
		$this->reward_points = number_format($reward_points, 0, ',', '.');
	}
}
?>