<?php

class Message_main_view_model extends CI_Model {
	
	public $message_inboxes;
	
	// constructor
	public function __construct()
	{
		$this->message_inboxes = array();
	}
	
	public function get($message_inboxes)
	{
		foreach ($message_inboxes as $message_inbox)
		{
			$temp = new class{};
			$temp->id				= $message_inbox->id;
			$temp->date_created		= date("d M y H:i:s", strtotime($message_inbox->date_created));
			
			$message_inbox->init_account_party_one();
			$message_inbox->init_account_party_two();
			$is_party_one = ($this->session->id == $message_inbox->account_party_one->id);
			$temp->other_party_name = !$is_party_one ? $message_inbox->account_party_one->name : $message_inbox->account_party_two->name;
			
			$last_message_text = $message_inbox->get_last_message_text();
			$is_last_message_text_exist = ($last_message_text != null);
			
			$temp->msg_preview_date = $is_last_message_text_exist ? " (" . date("d M y H:i:s", strtotime($last_message_text->date_sent)) . ")" : "";
			$temp->msg_preview_text = $is_last_message_text_exist ? $last_message_text->text : "";
			
			if ($is_last_message_text_exist) $last_message_text->init_account_sender();
			$temp->msg_preview_name = $is_last_message_text_exist ? $last_message_text->account_sender->name . ": " : "";
			
			$this->message_inboxes[] = $temp;
		}
	}
}
?>