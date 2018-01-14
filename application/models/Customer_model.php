<?php

class Customer_model extends CI_Model {
	
	private $table_default = 'customer';
	private $table_customer = 'customer';
	
	public $id;
	public $customer_id;
	public $account_id;
	public $verified_mark;
	public $credit_amount;
	public $reward_points;
	
	public $account;
	
	// constructor
	public function __construct()
	{
		parent::__construct();
		
		$this->id				= NULL;
		$this->customer_id		= "";
		$this->account_id		= "";
		$this->verified_mark	= "";
		$this->credit_amount	= "";
		$this->reward_points	= "";
		
		$this->load->model('Account_model');
		$this->account = new Account_model();
		
	}
	
	// constructor from database object
	public function get_stub_from_db($db_item)
	{
		$this->id				= $db_item->id;
		$this->customer_id		= $db_item->customer_id;
		$this->account_id		= $db_item->account_id;
		$this->verified_mark	= $db_item->verified_mark;
		$this->credit_amount	= $db_item->credit_amount;
		$this->reward_points	= $db_item->reward_points;
		
		$this->account->name		= $db_item->name ?? "";
		$this->account->email		= $db_item->email ?? "";
		$this->account->status		= $db_item->status ?? "";
		$this->account->date_joined = $db_item->date_joined ?? "";
		
		return $this;
	}
	
	// get db from this model
	public function get_db_from_stub()
	{
		$db_item = new class{};
		
		$db_item->id			= $this->id;
		$db_item->customer_id	= $this->customer_id;
		$db_item->account_id	= $this->account_id;
		$db_item->verified_mark	= $this->verified_mark;
		$db_item->credit_amount	= $this->credit_amount;
		$db_item->reward_points	= $this->reward_points;
		
		return $db_item;
	}
	
	// new stub object from database object
	public function get_new_stub_from_db($db_item)
	{
		$stub = new Customer_model();
		
		$stub->id				= $db_item->id;
		$stub->customer_id		= $db_item->customer_id;
		$stub->account_id		= $db_item->account_id;
		$stub->verified_mark	= $db_item->verified_mark;
		$stub->credit_amount	= $db_item->credit_amount;
		$stub->reward_points	= $db_item->reward_points;
		
		$stub->account->id			= $db_item->id;
		$stub->account->name		= $db_item->name;
		$stub->account->email		= $db_item->email;
		$stub->account->status		= $db_item->status;
		$stub->account->date_joined = $db_item->date_joined;
		return $stub;
	}
	
	public function map_list($customers)
	{
		$result = array();
		foreach ($customers as $customer)
		{
			$result[] = $this->get_new_stub_from_db($customer);
		}
		return $result;
	}
	
	// get customer detail
	public function get_from_id($id)
	{
		$where['id'] = $id;
		$this->db->where($where);
		$query = $this->db->get($this->table_customer, 1);
		$item = $query->row();
		
		return ($item !== null) ? $this->get_stub_from_db($item) : null;
	}
	
	public function get_all()
	{
		$this->load->model('Customer_model');
		
		$this->db->join('account', 'account.id=' . $this->table_customer . '.account_id', 'left');
		
		$query = $this->db->get($this->table_customer);
		$items = $query->result();
		
		return ($items !== null) ? $this->map_list($items) : array();
	}
	
	public function get_by_account_id($account_id)
	{
		$this->db->where('account_id', $account_id);
		$query = $this->db->get($this->table_customer, 1);
		
		return $query->row();
	}
	
	public function insert_from_account($account_id)
	{
		$this->account_id			= $account_id;
		$this->customer_id			= "";
		$this->verified_mark		= "";
		$this->credit_amount		= 0;
		$this->reward_points		= 0;
		
		$this->db->trans_start();
		
		if ($this->db->insert($this->table_customer, $this))
		{
			$this->id	= $this->db->insert_id();
		}
		
		$this->db->trans_complete();
	}
	
	public function update_natural_id($natural_id)
	{
		$this->customer_id = $natural_id;
		
		$this->db->trans_start();
		
		$this->db->set('customer_id', $natural_id)
				 ->where('id', $this->id)
				 ->update($this->table_customer);
		
		$this->db->trans_complete();
	}
	
	public function init_account()
	{
		$this->account = $this->account->get_from_id($this->account_id);
		return $this->account;
	}
}

?>