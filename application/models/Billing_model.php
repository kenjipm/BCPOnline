<?php

class Billing_model extends CI_Model {
	
	// Nama tabel di DB
	private $table_billing = 'billing';
	
	// table attribute
	public $id;
	public $bill_id;
	public $date_created;
	public $date_closed;
	public $total_payable;
	public $customer_id;
	public $shipping_address_id;
	public $add_fee_id;
	
	// relation table
	public $customer;
	public $shipping_address;
	public $add_fee;
	
	// constructor
	public function __construct()
	{
		parent::__construct();
		
		$this->id					= 0;
		$this->bill_id				= "";
		$this->date_created			= date("d-m-Y");
		$this->date_closed			= date("d-m-Y", strtotime("+".INVOICE_DUE." days"));
		$this->total_payable		= 0;
		$this->customer_id			= 0;
		$this->shipping_address_id	= 0;
		$this->add_fee_id			= 0;
		
		$this->customer				= $this->load->model('customer_model');
		$this->shipping_address		= $this->load->model('shipping_address_model');
		$this->add_fee				= $this->load->model('add_fee_model');
	}
	
	// constructor from database object
	public function get_stub_from_db($db_item)
	{
		$this->id					= $db_item->id;
		$this->bill_id				= $db_item->bill_id;
		$this->date_created			= $db_item->date_created;
		$this->date_closed			= $db_item->date_closed;
		$this->total_payable		= $db_item->total_payable;
		$this->customer_id			= $db_item->customer_id;
		$this->shipping_address_id	= $db_item->shipping_address_id;
		$this->add_fee_id			= $db_item->add_fee_id;
		
		return $this;
	}
	
	// get db from this model
	public function get_db_from_stub()
	{
		$db_item = new class{};
		
		$db_item->id					= $this->id;
		$db_item->bill_id				= $this->bill_id;
		$db_item->date_created			= $this->date_created;
		$db_item->date_closed			= $this->date_closed;
		$db_item->total_payable			= $this->total_payable;
		$db_item->customer_id			= $this->customer_id;
		$db_item->shipping_address_id	= $this->shipping_address_id;
		$db_item->add_fee_id			= $this->add_fee_id;
		
		return $db_item;
	}
	
	// new stub object from database object
	public function get_new_stub_from_db($db_item)
	{
		$stub = new Billing_model();
		
		$stub->id					= $db_item->id;
		$stub->bill_id				= $db_item->bill_id;
		$stub->date_created			= $db_item->date_created;
		$stub->date_closed			= $db_item->date_closed;
		$stub->total_payable		= $db_item->total_payable;
		$stub->customer_id			= $db_item->customer_id;
		$stub->shipping_address_id	= $db_item->shipping_address_id;
		$stub->add_fee_id			= $db_item->add_fee_id;
		
		return $stub;
	}
	
	public function init_customer()
	{
		$this->customer = $this->customer->get_from_id($this->customer_id);
		return $this->customer;
	}
	
	public function init_shipping_address()
	{
		$this->shipping_address = $this->shipping_address->get_from_id($this->shipping_address_id);
		return $this->shipping_address;
	}
	
	public function init_add_fee()
	{
		$this->add_fee = $this->add_fee->get_from_id($this->add_fee_id);
		return $this->add_fee;
	}
	
	// get item detail
	public function get_from_id($id)
	{
		$where['id'] = $id;
		
		$this->db->where($where);
		$query = $this->db->get($this->table_billing, 1);
		$item = $query->row();
		
		return ($item !== null) ? $this->get_stub_from_db($item) : null;
	}
}

?>