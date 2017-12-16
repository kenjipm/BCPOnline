<?php

class Payment_model extends CI_Model {
	
	private $table_payment = 'payment';
	
	// table attribute
	public $id;
	public $payment_id;
	public $payment_method;
	public $payment_date;
	public $credit_card;
	public $paid_amount;
	public $billing_id;
	
	// constructor
	public function __construct()
	{
		parent::__construct();
		
		$this->id					= NULL;
		$this->payment_id			= "";
		$this->payment_method		= "";
		$this->payment_date			= "";
		$this->credit_card			= "";
		$this->paid_amount			= 0;
		$this->billing_id			= 0;
	}
	
	// constructor from database object
	public function get_stub_from_db($db_item)
	{
		$this->id					= $db_item->id;
		$this->payment_id			= $db_item->payment_id;
		$this->payment_method		= $db_item->payment_method;
		$this->payment_date			= $db_item->payment_date;
		$this->credit_card			= $db_item->credit_card;
		$this->paid_amount			= $db_item->paid_amount;
		$this->billing_id			= $db_item->billing_id;
		
		return $this;
	}
	
	// get db from this model
	public function get_db_from_stub()
	{
		$db_item = new class{};
		
		$db_item->id					= $this->id;
		$db_item->payment_id			= $this->payment_id;
		$db_item->payment_method		= $this->payment_method;
		$db_item->payment_date			= $this->payment_date;
		$db_item->credit_card			= $this->credit_card;
		$db_item->paid_amount			= $this->paid_amount;
		$db_item->billing_id			= $this->billing_id;
		
		return $db_item;
	}
	
	// new stub object from database object
	public function get_new_stub_from_db($db_item)
	{
		$stub = new Payment_model();
		
		$stub->id					= $db_item->id;
		$stub->payment_id			= $db_item->payment_id;
		$stub->payment_method		= $db_item->payment_method;
		$stub->payment_date			= $db_item->payment_date;
		$stub->credit_card			= $db_item->credit_card;
		$stub->paid_amount			= $db_item->paid_amount;
		$stub->billing_id			= $db_item->billing_id;
		
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
	
	public function get_from_id($id)
	{
		$where['id'] = $id;
		
		$this->db->where($where);
		$query = $this->db->get($this->table_payment, 1);
		$item = $query->row();
		
		return ($reward !== null) ? $this->get_stub_from_db($item) : null;
	}
	
	public function get_all()
	{
		$query = $this->db->get($this->table_payment);
		$items = $query->result();
		
		return ($items !== null) ? $this->map_list($items) : null;
	}
	
	public function get_all_from_billing_id($billing_id)
	{
		$where['billing_id'] = $billing_id;
		
		$this->db->where($where);
		$query = $this->db->get($this->table_payment);
		$items = $query->result();
		
		return ($items !== null) ? $this->map_list($items) : null;
	}
}

?>