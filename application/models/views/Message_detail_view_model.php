<?php

class Message_detail_view_model extends CI_Model {
	
	public $message_inboxes;
	public $message_inbox;
	public $message_texts;
	public $default_message;
	public $back_button_url;
	
	// constructor
	public function __construct()
	{
		$this->message_inboxes = array();
		$this->message_inbox = new class{};
		$this->message_texts = array();
		$this->default_message = "";
		$this->back_button_url = "";
	}
	
	public function get($message_inboxes, $selected_message_inbox, $message_texts, $default_message=null, $back_button_url=null)
	{
		$this->load->model('tenant_model');
		foreach ($message_inboxes as $message_inbox)
		{
			$temp = new class{};
			$temp->id				= $message_inbox->id;
			$temp->date_created		= date("d M y | H:i", strtotime($message_inbox->date_created));
			
			$message_inbox->init_account_party_one();
			$message_inbox->init_account_party_two();
			$is_party_one = ($this->session->id == $message_inbox->account_party_one->id);
			$temp->other_party_name = !$is_party_one ? $message_inbox->account_party_one->name : $message_inbox->account_party_two->name;
			
			$other_account = !$is_party_one ? $message_inbox->account_party_one : $message_inbox->account_party_two;
			if ($other_account->get_type($other_account->id) == "TENANT") {
				$tenant = $this->tenant_model->get_by_account_id($other_account->id);
				$temp->other_party_name = $tenant->tenant_name;
			}
			
			$last_message_text = $message_inbox->get_last_message_text();
			$is_last_message_text_exist = ($last_message_text != null);
			
			$temp->msg_preview_date = $is_last_message_text_exist ? date("d M y H:i:s", strtotime($last_message_text->date_sent)) : "";
			$temp->msg_preview_text = $is_last_message_text_exist ? $last_message_text->text : "";
			
			if ($is_last_message_text_exist) $last_message_text->init_account_sender();
			$temp->msg_preview_name = $is_last_message_text_exist ? $last_message_text->account_sender->name . ": " : "";
			
			$temp->unread_message_count = $message_inbox->count_unread_message_text();
			
			$this->message_inboxes[] = $temp;
		}
		
		$this->message_inbox->id = $selected_message_inbox->id;
		if ($selected_message_inbox->id != 0)
		{
			$selected_message_inbox->init_account_party_one();
			$selected_message_inbox->init_account_party_two();
			$is_party_one = ($selected_message_inbox->party_one_id == $this->session->id);
			$this->message_inbox->other_party_name = !$is_party_one ? $selected_message_inbox->account_party_one->name : $selected_message_inbox->account_party_two->name;
			
			$other_account = !$is_party_one ? $selected_message_inbox->account_party_one : $selected_message_inbox->account_party_two;
			if ($other_account->get_type($other_account->id) == "TENANT") {
				$tenant = $this->tenant_model->get_by_account_id($other_account->id);
				$this->message_inbox->other_party_name = $tenant->tenant_name;
			}
		}
		
		foreach ($message_texts as $message_text)
		{
			$temp = new class{};
			$temp->id				= $message_text->id;
			$temp->date_sent		= date("d M y | H:i", strtotime($message_text->date_sent));
			$temp->text				= $message_text->text;
			$temp->image_name		= ($message_text->image_name != "") ? site_url($message_text->image_name) : "";
			
			$message_text->init_account_sender();
			$temp->sender			= new class{};
			$temp->sender->id		= $message_text->account_sender->id;
			$temp->sender->name		= $message_text->account_sender->name;
			$temp->sender->is_you	= ($message_text->account_sender->id == $this->session->id);
			
			if ($message_text->account_sender->get_type($message_text->account_sender->id) == "TENANT") {
				$tenant = $this->tenant_model->get_by_account_id($message_text->account_sender->id);
				$temp->sender->name = $tenant->tenant_name;
			}
			
			$this->message_texts[] = $temp;
		}
		
		if ($default_message != null) $this->default_message = $default_message;
		if ($back_button_url != null) $this->back_button_url = $back_button_url;
	}
	
	public function get_detail($selected_message_inbox, $message_texts)
	{
		$this->load->model('tenant_model');
		$this->message_inbox->id = $selected_message_inbox->id;
		if ($selected_message_inbox->id != 0)
		{
			$selected_message_inbox->init_account_party_one();
			$selected_message_inbox->init_account_party_two();
			$is_party_one = ($selected_message_inbox->party_one_id == $this->session->id);
			$this->message_inbox->other_party_name = !$is_party_one ? $selected_message_inbox->account_party_one->name : $selected_message_inbox->account_party_two->name;
			
			$other_account = !$is_party_one ? $selected_message_inbox->account_party_one : $selected_message_inbox->account_party_two;
			if ($other_account->get_type($other_account->id) == "TENANT") {
				$tenant = $this->tenant_model->get_by_account_id($other_account->id);
				$this->message_inbox->other_party_name = $tenant->tenant_name;
			}
		}
		
		foreach ($message_texts as $message_text)
		{
			$temp = new class{};
			$temp->id				= $message_text->id;
			$temp->date_sent		= date("d M y | H:i", strtotime($message_text->date_sent));
			$temp->text				= $message_text->text;
			$temp->image_name		= ($message_text->image_name != "") ? site_url($message_text->image_name) : "";
			
			$message_text->init_account_sender();
			$temp->sender			= new class{};
			$temp->sender->id		= $message_text->account_sender->id;
			$temp->sender->name		= $message_text->account_sender->name;
			$temp->sender->is_you	= ($message_text->account_sender->id == $this->session->id);
			
			if ($message_text->account_sender->get_type($message_text->account_sender->id) == "TENANT") {
				$tenant = $this->tenant_model->get_by_account_id($message_text->account_sender->id);
				$temp->sender->name = $tenant->tenant_name;
			}
			
			$this->message_texts[] = $temp;
		}
	}
}
?>