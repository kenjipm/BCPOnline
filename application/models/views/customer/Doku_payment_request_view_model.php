<?php

class Doku_payment_request_view_model extends CI_Model {
	
	public $action_url;
	
	public $BASKET;
	public $MALLID;
	public $CHAINMERCHANT;
	public $AMOUNT;
	public $PURCHASEAMOUNT;
	public $TRANSIDMERCHANT;
	public $WORDS;
	public $REQUESTDATETIME;
	public $CURRENCY;
	public $PURCHASECURRENCY;
	public $SESSIONID;
	public $NAME;
	public $EMAIL;
	
	public $PAYMENTTYPE;
	public $PAYMENTCHANNEL;
	public $ADDRESS;
	public $COUNTRY;
	public $STATE;
	public $CITY;
	public $PROVINCE;
	public $ZIPCODE;
	public $HOMEPHONE;
	public $MOBILEPHONE;
	public $WORKPHONE;
	public $BIRTHDATE;
	
	// constructor
	public function __construct()
	{
		parent::__construct();
		
		$this->action_url		= "";
		
		$this->BASKET			= "";
		$this->MALLID			= "";
		$this->CHAINMERCHANT	= "NA";
		$this->AMOUNT			= "";
		$this->PURCHASEAMOUNT	= "";
		$this->TRANSIDMERCHANT	= "";
		$this->WORDS			= "";
		$this->REQUESTDATETIME	= "";
		$this->CURRENCY			= "";
		$this->PURCHASECURRENCY	= "";
		$this->SESSIONID		= "";
		$this->NAME				= "";
		$this->EMAIL			= "";
		
		$this->PAYMENTTYPE		= "SALE";
		$this->PAYMENTCHANNEL	= "";
		$this->ADDRESS			= "";
		$this->COUNTRY			= "";
		$this->STATE			= "";
		$this->CITY				= "";
		$this->PROVINCE			= "";
		$this->ZIPCODE			= "";
		$this->HOMEPHONE		= "";
		$this->MOBILEPHONE		= "";
		$this->WORKPHONE		= "";
		$this->BIRTHDATE		= "";
	}
	
	public function get_from_cart($billing, $payment)
	{
		// BASKET
		$basket_str = "";
		foreach($this->session->cart as $id => $cart_item)
		{
			$posted_item_variance = $this->posted_item_variance_model->get_from_id($id);
			$posted_item_variance->init_posted_item();
			
			
			
			$basket_str .= (($basket_str == "") ? "" : ";") .
				preg_replace('/[^a-zA-Z0-9]/', '', (($posted_item_variance->posted_item->posted_item_name == "") ? substr($posted_item_variance->posted_item->posted_item_description, 0, 50) : $posted_item_variance->posted_item->posted_item_name)) . "," .
				number_format($cart_item['price'], 2, '.', "") . "," .
				$cart_item['quantity'] . "," .
				number_format($cart_item['quantity'] * $cart_item['price'], 2, '.', "");
		}
		$this->BASKET = $basket_str;
		
		$this->process($billing, $payment);
	}
	
	public function get_from_billing($billing, $payment)
	{
		// BASKET
		$basket_str = "";
		$this->load->model('order_details_model');
		$order_details = $this->order_details_model->get_all_from_billing_id($billing->id);
		foreach($order_details as $order_detail)
		{
			$posted_item_variance = $this->posted_item_variance_model->get_from_id($order_detail->posted_item_variance_id);
			$posted_item_variance->init_posted_item();
			
			$basket_str .= (($basket_str == "") ? "" : ";") .
				preg_replace('/[^a-zA-Z0-9]/', '', (($posted_item_variance->posted_item->posted_item_name == "") ? substr($posted_item_variance->posted_item->posted_item_description, 0, 50) : $posted_item_variance->posted_item->posted_item_name)). "," .
				number_format($order_detail->sold_price, 2, '.', "") . "," .
				$order_detail->quantity . "," .
				number_format($order_detail->quantity * $order_detail->sold_price, 2, '.', "");
		}
		$this->BASKET = $basket_str;
		
		$this->process($billing, $payment);
	}
	
	public function get_from_deposit($billing, $payment)
	{
		// BASKET
		$this->BASKET =
			"Deposit Bidding" . "," .
			number_format(DEPOSIT_BIDDING_PRICE, 2, '.', "") . "," .
			"1" . "," .
			number_format(DEPOSIT_BIDDING_PRICE, 2, '.', "");
		
		$this->process($billing, $payment);
	}
	
	private function process($billing, $payment)
	{
		$this->load->config('payment_method_'.ENVIRONMENT);
		
		// form action url
		$action_url		= $this->config->item('payment_request_api_url');
		
		// MALL ID
		$mall_id = $this->config->item('mall_id');
		
		// AMOUNT
		$amount = number_format($billing->calculate_total_payable(), 2, '.', "");
		
		// WORDS
		$words = sha1($amount . $mall_id . $this->config->item('shared_key') . $payment->payment_id);
		
		// REQUESTDATETIME
		$cur_date = date("YmdHis");
		
		// CURRENCY
		$idr_currency_code = $this->config->item('idr_currency_code');
		
		// SESSIONID
		$session_id = $this->generate_session_id(20);
		$this->load->model('doku_model');
		$this->doku_model->update_session_id($payment->payment_id, $session_id);
		
		// NAME
		$this->load->model('account_model');
		$cur_account = $this->account_model->get_from_id($this->session->id);
		$name = substr($cur_account->name, 0, 50);
		$phone_number = substr($cur_account->phone_number, 0, 12);
		
		// EMAIL
		$email = substr($cur_account->email, 0, 254);
		
		// PAYMENTCHANNEL
		$cur_payment_method = $this->config->item($payment->payment_method);
		$payment_channel_code = $cur_payment_method['doku_channel_code'];
		
		$this->action_url		= $action_url;
		$this->MALLID			= $mall_id;
		$this->CHAINMERCHANT	= "NA";
		$this->AMOUNT			= $amount;
		$this->PURCHASEAMOUNT	= $amount;
		$this->TRANSIDMERCHANT	= $payment->payment_id;
		$this->WORDS			= $words;
		$this->REQUESTDATETIME	= $cur_date;
		$this->CURRENCY			= $idr_currency_code;
		$this->PURCHASECURRENCY	= $idr_currency_code;
		$this->SESSIONID		= $session_id;
		$this->NAME				= $name;
		$this->EMAIL			= $email;
		
		$this->PAYMENTTYPE		= "";
		$this->PAYMENTCHANNEL	= ""; // $payment_channel_code;
		$this->ADDRESS			= "";
		$this->COUNTRY			= "";
		$this->STATE			= "";
		$this->CITY				= "";
		$this->PROVINCE			= "";
		$this->ZIPCODE			= "";
		$this->HOMEPHONE		= "";
		$this->MOBILEPHONE		= $phone_number;
		$this->WORKPHONE		= "";
		$this->BIRTHDATE		= "";
	}
	
	private function generate_session_id($length)
	{
		$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
		$characters_length = strlen($characters);
		
		$result = '';
		for ($i = 0; $i < $length; $i++) {
			$result .= $characters[rand(0, $characters_length - 1)];
		}
		
		return $result;
	}
}
?>