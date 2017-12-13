<?php

class Shipping_address_model extends CI_Model {
	
	private $table_shipping_address = 'shipping_address';
	
	public $id;
	public $address_id;
	public $city;
	public $kecamatan;
	public $kelurahan;
	public $postal_code;
	public $address_detail;
	public $latitude;
	public $customer_id;
	
	public function __construct()
	{
		parent::__construct();
		
		$this->id				= 0;
		$this->address_id		= "";
		$this->city				= "";
		$this->kecamatan		= "";
		$this->kelurahan		= "";
		$this->postal_code		= "";
		$this->address_detail	= "";
		$this->latitude			= "";
		$this->customer_id		= "";
	}
	
	public function get_by_customer_id($customer_id)
	{
		$this->db->where('customer_id', $customer_id);
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get($this->table_shipping_address, 1);
		
		return $this->get_stub_from_db($query->row());
	}
	
	public function get_stub_from_db($db_item)
	{
		if ($db_item != null)
		{
			$this->id				= $db_item->id;
			$this->address_id		= $db_item->address_id;
			$this->city				= $db_item->city;
			$this->kecamatan		= $db_item->kecamatan;
			$this->kelurahan		= $db_item->kelurahan;
			$this->postal_code		= $db_item->postal_code;
			$this->address_detail	= $db_item->address_detail;
			$this->latitude			= $db_item->latitude;
			$this->customer_id		= $db_item->customer_id;
		}
		return $this;
	}
}

?>