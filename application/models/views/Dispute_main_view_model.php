<?php

class Dispute_main_view_model extends CI_Model {
	
	public $disputes;
	
	// constructor
	public function __construct()
	{
		$this->disputes = array();
	}
	
	public function get($disputes)
	{
		foreach ($disputes as $dispute)
		{
			$temp = new class{};
			$temp->id				= $dispute->id;
			$temp->date_created		= date("d M y H:i:s", strtotime($dispute->date_created));
			
			$dispute->init_account_party_one();
			$dispute->init_account_party_two();
			$is_party_one = ($this->session->id == $dispute->account_party_one->id);
			$temp->other_party_name = !$is_party_one ? $dispute->account_party_one->name : $dispute->account_party_two->name;
			
			$last_dispute_text = $dispute->get_last_dispute_text();
			$is_last_dispute_text_exist = ($last_dispute_text != null);
			
			$temp->msg_preview_date = $is_last_dispute_text_exist ? " (" . date("d M y H:i:s", strtotime($last_dispute_text->date_sent)) . ")" : "";
			$temp->msg_preview_text = $is_last_dispute_text_exist ? $last_dispute_text->text : "";
			
			if ($is_last_dispute_text_exist) $last_dispute_text->init_account_sender();
			$temp->msg_preview_name = $is_last_dispute_text_exist ? $last_dispute_text->account_sender->name . ": " : "";
			
			$this->disputes[] = $temp;
		}
	}
}
?>