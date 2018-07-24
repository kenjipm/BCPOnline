<?php

class Doku_check_status_view_model extends CI_Model {
	
	public $action_url;
	
	public $MALLID;
	public $CHAINMERCHANT;
	public $TRANSIDMERCHANT;
	public $SESSIONID;
	public $WORDS;
	
	public $CURRENCY;
	public $PURCHASECURRENCY;
	public $PAYMENTTYPE;
	
	// constructor
	public function __construct()
	{
		parent::__construct();
		
		$this->action_url		= "";
		
		$this->MALLID			= "";
		$this->CHAINMERCHANT	= "NA";
		$this->TRANSIDMERCHANT	= "";
		$this->SESSIONID		= "";
		$this->WORDS			= "";
		
		$this->CURRENCY			= "";
		$this->PURCHASECURRENCY	= "";
		$this->PAYMENTTYPE		= "";
	}
	
	public function get($doku_item)
	{
		$this->load->config('payment_method_'.ENVIRONMENT);
		
		// form action url
		$action_url		= $this->config->item('check_status_api_url');
		
		// MALL ID
		$mall_id = $this->config->item('mall_id');
		
		// SESSIONID
		$session_id = $doku_item->session_id;
		
		// WORDS
		$words = sha1($mall_id . $this->config->item('shared_key') . $doku_item->transidmerchant);
		
		$this->action_url		= $action_url;
		$this->MALLID			= $mall_id;
		$this->CHAINMERCHANT	= "NA";
		$this->TRANSIDMERCHANT	= $doku_item->transidmerchant;
		$this->SESSIONID		= $session_id;
		$this->WORDS			= $words;
	}
}
?>