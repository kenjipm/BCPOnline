<?php

class Dispute_detail_view_model extends CI_Model {
	
	public $disputes;
	public $dispute;
	public $dispute_texts;
	
	// constructor
	public function __construct()
	{
		$this->disputes = array();
		$this->dispute = new class{};
		$this->dispute_texts = array();
	}
	
	public function get($disputes, $selected_dispute, $dispute_texts)
	{
		foreach ($disputes as $dispute)
		{
			$temp = new class{};
			$temp->id				= $dispute->id;
			$temp->date_created		= date("d M y | H:i", strtotime($dispute->date_created));
			
			$dispute->init_account_party_one();
			$dispute->init_account_party_two();
			$dispute->init_order_detail();
			$is_party_one = ($this->session->id == $dispute->account_party_one->id);
			$temp->other_party_name = !$is_party_one ? $dispute->account_party_one->name : $dispute->account_party_two->name;
			
			$last_dispute_text = $dispute->get_last_dispute_text();
			$is_last_dispute_text_exist = ($last_dispute_text != null);
			
			$temp->msg_preview_date = $is_last_dispute_text_exist ? date("d M y H:i:s", strtotime($last_dispute_text->date_sent)) : "";
			$temp->msg_preview_text = $is_last_dispute_text_exist ? $last_dispute_text->text : "";
			
			if ($is_last_dispute_text_exist) $last_dispute_text->init_account_sender();
			$temp->msg_preview_name = $is_last_dispute_text_exist ? $last_dispute_text->account_sender->name . ": " : "";
			
			$temp->unread_dispute_count = $dispute->count_unread_dispute_text();
			
			$dispute->order_detail->init_billing();
			$temp->natural_billing_id = $dispute->order_detail->billing->bill_id;
			
			$this->disputes[] = $temp;
		}
		
		$this->dispute->id = $selected_dispute->id;
		if ($selected_dispute->id != 0)
		{
			$selected_dispute->init_account_party_one();
			$selected_dispute->init_account_party_two();
			$selected_dispute->init_order_detail();
			
			$selected_dispute->order_detail->init_posted_item_variance();
			$selected_dispute->order_detail->posted_item_variance->init_posted_item();
			
			$this->dispute->other_party_name = ($selected_dispute->party_one_id != $this->session->id) ? $selected_dispute->account_party_one->name : $selected_dispute->account_party_two->name;
			
			$this->dispute->order_detail = new class{};
			$this->dispute->order_detail->id = $selected_dispute->order_detail->id;
			
			$selected_dispute->order_detail->init_billing();
			$this->dispute->billing = new class{};
			$this->dispute->billing->id = $selected_dispute->order_detail->billing->id;
			
			$this->dispute->detail_link = ($this->session->type == TYPE['name']['ADMIN']) ? site_url('billing/detail/'.$selected_dispute->order_detail->billing->id) : site_url('billing/status/'.$selected_dispute->order_detail->billing->id);
			
			$this->dispute->order_detail->posted_item_variance = new class{};
			$this->dispute->order_detail->posted_item_variance->var_type = $selected_dispute->order_detail->posted_item_variance->var_type;
			$this->dispute->order_detail->posted_item_variance->var_description = $selected_dispute->order_detail->posted_item_variance->var_description;
			
			$this->dispute->order_detail->posted_item_variance->posted_item = new class{};
			$this->dispute->order_detail->posted_item_variance->posted_item->posted_item_name = $selected_dispute->order_detail->posted_item_variance->posted_item->posted_item_name;
		}
		
		foreach ($dispute_texts as $dispute_text)
		{
			$temp = new class{};
			$temp->id				= $dispute_text->id;
			$temp->date_sent		= date("d M y | H:i", strtotime($dispute_text->date_sent));
			$temp->text				= $dispute_text->text;
			
			$dispute_text->init_account_sender();
			$temp->sender			= new class{};
			$temp->sender->id		= $dispute_text->account_sender->id;
			$temp->sender->name		= $dispute_text->account_sender->name;
			$temp->sender->is_you	= ($dispute_text->account_sender->id == $this->session->id);
			
			$this->dispute_texts[] = $temp;
		}
	}
	
	public function get_detail($dispute, $dispute_texts)
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
			$temp->date_sent		= date("d M y | H:i", strtotime($dispute_text->date_sent));
			$temp->text				= $dispute_text->text;
			
			$dispute_text->init_account_sender();
			$temp->sender			= new class{};
			$temp->sender->id		= $dispute_text->account_sender->id;
			$temp->sender->name		= $dispute_text->account_sender->name;
			$temp->sender->is_you	= ($dispute_text->account_sender->id == $this->session->id);
			
			$this->dispute_texts[] = $temp;
		}
	}
}
?>