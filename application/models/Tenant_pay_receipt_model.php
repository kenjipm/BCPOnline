<?php

class Tenant_pay_receipt_model extends CI_Model {
	
	private $table_tenant_pay_receipt = 'tenant_pay_receipt';
	
	// table attribute
	public $id;
	public $tenant_receipt_id;
	public $payment_period_start;
	public $payment_period_end;
	public $payment_purpose;
	public $admin_id;
	public $paid_amount;
	
	// constructor
	public function __construct()
	{
		parent::__construct();
		
		$this->id					= NULL;
		$this->tenant_receipt_id	= "";
		$this->payment_period_start	= "";
		$this->payment_period_end	= "";
		$this->payment_purpose		= "";
		$this->admin_id				= "";
		$this->paid_amount			= "";
		
	}
	
	// constructor from database object
	public function get_stub_from_db($db_item)
	{
		$this->id					= $db_item->id;			
		$this->tenant_receipt_id	= $db_item->tenant_receipt_id;
		$this->payment_period_start	= $db_item->payment_period_start;	
		$this->payment_period_end	= $db_item->payment_period_end;	
		$this->payment_purpose		= $db_item->payment_purpose;		
		$this->admin_id				= $db_item->admin_id;				
		$this->paid_amount			= $db_item->paid_amount;			
		
		return $this;
	}
	
	// get db from this model
	public function get_db_from_stub()
	{
		$db_item = new class{};
		
		$db_item->id					= $this->id;			
		$db_item->tenant_receipt_id		= $this->tenant_receipt_id;
		$db_item->payment_period_start	= $this->payment_period_start;	
		$db_item->payment_period_end	= $this->payment_period_end;	
		$db_item->payment_purpose		= $this->payment_purpose;		
		$db_item->admin_id				= $this->admin_id;				
		$db_item->paid_amount			= $this->paid_amount;			
		
		return $db_item;
	}
	
	// new stub object from database object
	public function get_new_stub_from_db($db_item)
	{
		$stub = new tenant_pay_receipt_model();
		
		$stub->id					= $db_item->id;			
		$stub->tenant_receipt_id	= $db_item->tenant_receipt_id;
		$stub->payment_period_start	= $db_item->payment_period_start;	
		$stub->payment_period_end	= $db_item->payment_period_end;	
		$stub->payment_purpose		= $db_item->payment_purpose;		
		$stub->admin_id				= $db_item->admin_id;				
		$stub->paid_amount			= $db_item->paid_amount;			
		
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
	
	// get tenant_pay_receipt detail
	public function get_from_id($id)
	{
		$where['id'] = $id;
		
		$this->db->where($where);
		$query = $this->db->get($this->table_tenant_pay_receipt, 1);
		$items = $query->row();
		
		return ($items !== null) ? $this->get_stub_from_db($items) : null;
	}
	
	public function get_all()
	{
		$query = $this->db->get($this->table_tenant_pay_receipt);
		$items = $query->result();
		
		return ($items !== null) ? $this->map_list($items) : array();
	}
	
	// insert new account from form post
	public function insert_from_stub()
	{
		$this->db->trans_start(); // buat nge lock db transaction (biar kalo fail ke rollback)
		
		$db_item = $this->get_db_from_stub(); // ambil database object dari model ini
		if ($this->db->insert($this->table_tenant_pay_receipt, $db_item))
		{	
			$db_item->id = $this->db->insert_id();
			$this->id = $db_item->id;
			
			$this->update_natural_id();
		}
		
		$this->db->trans_complete(); // selesai nge lock db transaction
		
		return $this->id;
	}
	
	public function update_natural_id()
	{
		$this->load->library('id_generator');
		$natural_id = $this->id_generator->generate(TYPE['name']['TENANT_PAY_RECEIPT'], $this->id);
		
		$this->tenant_receipt_id = $natural_id;
		$this->db->set('tenant_receipt_id', $natural_id)
				 ->where('id', $this->id)
				 ->update($this->table_tenant_pay_receipt);
	}
}

?>