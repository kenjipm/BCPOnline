<?php

class Shipping_address_view_model extends CI_Model {
	
	public $shipping_addresses;
	
	// constructor
	public function __construct()
	{
		parent::__construct();
		
		$this->shipping_addresses = array();
	}
	
	public function get($shipping_addresses)
	{
		foreach ($shipping_addresses as $shipping_address)
		{
			$temp_shipping_address = new class{};
			$temp_shipping_address->id				= $shipping_address->id;
			$temp_shipping_address->is_primary_attr	= $shipping_address->is_primary ? "checked" : "";
			$temp_shipping_address->full_address	= $shipping_address->get_full_address();
			
			$this->shipping_addresses[] = $temp_shipping_address;
		}
	}
}
?>