<?php

class Message_detail_view_model extends CI_Model {
	
	public $message_inbox;
	public $message_texts;
	
	// constructor
	public function __construct()
	{
		$this->message_inbox = new class{};
		$this->message_texts = array();
	}
	
	public function get($message_inbox, $message_texts)
	{
		$message_inbox->init_account_party_one();
		$message_inbox->init_account_party_two();
		$this->message_inbox->id = $message_inbox->id;
		$this->message_inbox->other_party_name = ($message_inbox->party_one_id != $this->session->id) ? $message_inbox->account_party_one->name : $message_inbox->account_party_two->name;
		
		foreach ($message_texts as $message_text)
		{
			$temp = new class{};
			$temp->id				= $message_text->id;
			$temp->date_sent		= date("d M y H:i:s", strtotime($message_text->date_sent));
			$temp->text				= $message_text->text;
			
			$message_text->init_account_sender();
			$temp->sender			= new class{};
			$temp->sender->id		= $message_text->account_sender->id;
			$temp->sender->name		= $message_text->account_sender->name . ": ";
			$temp->sender->is_you	= ($message_text->account_sender->id == $this->session->id);
			
			$this->message_texts[] = $temp;
		}
	}
}
?>