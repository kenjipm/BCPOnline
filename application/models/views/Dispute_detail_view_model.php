<?php

class Dispute_detail_view_model extends CI_Model {
	
	public $dispute;
	public $dispute_texts;
	
	// constructor
	public function __construct()
	{
		$this->dispute = new class{};
		$this->dispute_texts = array();
	}
	
	public function get($dispute, $dispute_texts)
	{
		$dispute->init_account_party_one();
		$dispute->init_account_party_two();
		$dispute->init_order_detail();
		
		$dispute->order_detail->init_posted_item_variance();
		$dispute->order_detail->posted_item_variance->init_posted_item();
		
		$this->dispute->id = $dispute->id;
		$this->dispute->other_party_name = ($dispute->party_one_id != $this->session->id) ? $dispute->account_party_one->name : $dispute->account_party_two->name;
		
		$this->dispute->order_detail = new class{};
		$this->dispute->order_detail->id = $dispute->order_detail->id;
		
		$this->dispute->order_detail->posted_item_variance = new class{};
		$this->dispute->order_detail->posted_item_variance->var_type = $dispute->order_detail->posted_item_variance->var_type;
		$this->dispute->order_detail->posted_item_variance->var_description = $dispute->order_detail->posted_item_variance->var_description;
		
		$this->dispute->order_detail->posted_item_variance->posted_item = new class{};
		$this->dispute->order_detail->posted_item_variance->posted_item->posted_item_name = $dispute->order_detail->posted_item_variance->posted_item->posted_item_name;
		
		foreach ($dispute_texts as $dispute_text)
		{
			$temp = new class{};
			$temp->id				= $dispute_text->id;
			$temp->date_sent		= date("d M y H:i:s", strtotime($dispute_text->date_sent));
			$temp->text				= $dispute_text->text;
			
			$dispute_text->init_account_sender();
			$temp->sender			= new class{};
			$temp->sender->id		= $dispute_text->account_sender->id;
			$temp->sender->name		= $dispute_text->account_sender->name . ": ";
			$temp->sender->is_you	= ($dispute_text->account_sender->id == $this->session->id);
			
			$this->dispute_texts[] = $temp;
		}
	}
}
?>