<?php

class Transaction_Detail_Print_Preview_View_Model extends CI_Model{
	
	public $delivery_information;
	
	// constructor
	public function __construct()
	{	
		$this->delivery_information = new class{};
	}
	
	public function get($delivery_information)
	{
		$this->delivery_information->delivery_method 	= $delivery_information->delivery_method  ;
		$this->delivery_information->bill_id 			= $delivery_information->bill_id          ;
		$this->delivery_information->tenant_name 		= $delivery_information->tenant_name      ;
		$this->delivery_information->customer_name 		= $delivery_information->customer_name    ;
		$this->delivery_information->phone_number 		= $delivery_information->phone_number     ;
		$this->delivery_information->posted_item_name	= $delivery_information->posted_item_name ;
		$this->delivery_information->quantity 			= $delivery_information->quantity         ;
		
		$this->load->model('shipping_address_model');
		$shipping_address = new shipping_address_model();
		$shipping_address->city 			= $delivery_information->city           ;
		$shipping_address->kecamatan 		= $delivery_information->kecamatan      ;
		$shipping_address->kelurahan 		= $delivery_information->kelurahan      ;
		$shipping_address->postal_code 		= $delivery_information->postal_code    ;
		$shipping_address->address_detail 	= $delivery_information->address_detail ;
		
		$this->delivery_information->full_address = $shipping_address->get_full_address();
	}
}

?>