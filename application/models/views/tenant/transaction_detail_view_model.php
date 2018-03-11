<?php

class Transaction_Detail_View_Model extends CI_Model{
	
	public $transaction_detail;
	
	// constructor
	public function __construct()
	{	
		$this->transaction_detail = array();
	}
	
	public function get($item)
	{
		$this->transaction_detail = new class{};
		$this->load->library('Text_renderer');
			
		$this->transaction_detail->id 					= $item->id;
		$this->transaction_detail->posted_item_id	 	= $item->posted_item_variance->posted_item->posted_item_id;
		$this->transaction_detail->posted_item_name 	= $item->posted_item_variance->posted_item->posted_item_name;
		$this->transaction_detail->posted_item_description 	= $item->posted_item_variance->posted_item->posted_item_description;
		$this->transaction_detail->item_type		 	= $item->posted_item_variance->posted_item->item_type;
		$this->transaction_detail->var_type	 			= $item->posted_item_variance->var_type;
		$this->transaction_detail->var_description 		= $item->posted_item_variance->var_description;
		$this->transaction_detail->quantity				= $item->quantity;
		$this->transaction_detail->order_status_desc	= ORDER_STATUS['description'][$item->order_status];
		$this->transaction_detail->order_status			= ORDER_STATUS['name'][$item->order_status];
		$this->transaction_detail->date_created			= $item->billing->date_created;
		$this->transaction_detail->deliverer			= $item->deliverer->account->name;
		$this->transaction_detail->collection_method	= $item->collection_method;
		$this->transaction_detail->sold_price 			= $this->text_renderer->to_rupiah($item->sold_price);
		$this->transaction_detail->feedback 			= $item->feedback->feedback_text;
		$this->transaction_detail->feedback_reply		= $item->feedback->feedback_reply;
		$this->transaction_detail->rating	 			= $item->feedback->rating;
		
	}

	
}

?>