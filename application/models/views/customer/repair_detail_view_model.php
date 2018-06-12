<?php

class Repair_Detail_View_Model extends CI_Model{
	
	public $repair_list;
	// constructor
	public function __construct()
	{
		$this->repair_list = array();
	}
	
	public function get($repairs)
	{
		$this->load->library('Text_renderer');
		
		if ($repairs != NULL)
		{
			$i = 0;
			foreach($repairs as $repair)
			{
				$this->repair_list[$i] = new class{};

				$this->repair_list[$i]->id 				= $repair->id;
				$this->repair_list[$i]->posted_item_description	= $repair->posted_item_variance->posted_item->posted_item_description;
				$this->repair_list[$i]->otp	 			= $repair->otp_deliverer_to_customer;
				$this->repair_list[$i]->deliverer_name	= $repair->deliverer->account->name;
				
				$i++;
			}
		}
	}
	
}

?>