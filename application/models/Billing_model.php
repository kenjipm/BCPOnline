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
	public $shipping_charge_id;
	
	// relation table
	public $customer;
	public $shipping_address;
	public $shipping_charge;
	
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
		$this->shipping_charge_id	= 0;
		
		$this->customer				= $this->load->model('customer_model');
		$this->shipping_address		= $this->load->model('shipping_address_model');
		$this->shipping_charge		= $this->load->model('shipping_charge_model');
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
		$this->shipping_charge_id	= $db_item->shipping_charge_id;
		
		$this->customer->account				= new Account_model();
		$this->customer->account->name			= $db_item->name ?? "";
		$this->shipping_address->address_detail	= $db_item->address_detail ?? "";
		$this->shipping_charge->fee_amount		= $db_item->fee_amount ?? "";
		
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
		$db_item->shipping_charge_id	= $this->shipping_charge_id;
		
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
		$stub->shipping_charge_id	= $db_item->shipping_charge_id;
		
		$stub->customer->account				= new Account_model();
		$stub->customer->account->name			= $db_item->name ?? "";
		$stub->shipping_address->address_detail	= $db_item->address_detail ?? "";
		$stub->shipping_charge->fee_amount		= $db_item->fee_amount ?? "";
		
		return $stub;
	}
	
	public function map_list($items)
	{
		$result = array();
		foreach ($items as $item)
		{
			$result[] = $this->get_new_stub_from_db($item);
		}
		return $result;
	}
	
	//get all billing
	public function get_all()
	{
		$this->load->model('Billing_model');
		
		$this->db->join('customer', 'customer.id=' . $this->table_billing . '.customer_id', 'left');
		$this->db->join('account', 'account.id=customer.account_id', 'left');
		$this->db->join('shipping_address', 'shipping_address.id=' . $this->table_billing . '.shipping_address_id', 'left');
		$this->db->join('shipping_charge', 'shipping_charge.id=' . $this->table_billing . '.shipping_charge_id', 'left');
		
		$query = $this->db->get($this->table_billing);
		$items = $query->result();
		
		return ($items !== null) ? $this->map_list($items) : null;
	}
	
	// get item detail
	public function get_from_id($id)
	{
		$this->load->model('Billing_model');
		$where['billing.id'] = $id;
		
		$this->db->join('customer', 'customer.id=' . $this->table_billing . '.customer_id', 'left');
		$this->db->join('account', 'account.id=customer.account_id', 'left');
		$this->db->join('shipping_address', 'shipping_address.id=' . $this->table_billing . '.shipping_address_id', 'left');
		$this->db->join('shipping_charge', 'shipping_charge.id=' . $this->table_billing . '.shipping_charge_id', 'left');
		
		$this->db->where($where);
		$query = $this->db->get($this->table_billing, 1);
		$item = $query->row();
		
		return ($item !== null) ? $this->get_stub_from_db($item) : null;
	}
	
	public function get_from_create_new($cart, $shipping_address, $shipping_charge)
	{
		$this->load->model('item_model');
		foreach ($cart as $id => $cart_item)
		{
			$item = $this->item_model->get_from_id($id);
			
			$this->total_payable += $cart_item->quantity * $item->price;
		}
		
		$this->total_payable		+= $shipping_charge->fee_amount;
		$this->customer_id			= $this->session->child_id;
		$this->shipping_address_id	= $shipping_address->id;
		$this->shipping_charge_id	= $shipping_charge->id;
		
		return $this;
	}
	
	public function insert()
	{
		$this->load->library('id_generator');
		
		$this->db->trans_start();
		
		if ($this->db->insert($this->table_billing, $this))
		{
			$this->id	= $this->db->insert_id();
		}
		
		$natural_id = $this->id_generator->generate(TYPE['name']['BILLING'], $this->id);
		$this->update_natural_id($natural_id);
		
		$this->db->trans_complete();
	}
	
	public function update_natural_id($natural_id)
	{
		$this->bill_id = $natural_id;
		
		$this->db->set('bill_id', $natural_id)
				 ->where('id', $this->id)
				 ->update($this->table_billing);
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
	
	public function init_shipping_charge()
	{
		$this->shipping_charge = $this->shipping_charge->get_from_id($this->shipping_charge_id);
		return $this->shipping_charge;
	}
	
	public function calculate_total_payable_from_cart($cart)
	{
		foreach ($cart as $id => $cart_item)
		{
			$this->total_payable += $cart_item->quantity * $cart_item->price;
		}
		return $this->total_payable;
	}
}

?>