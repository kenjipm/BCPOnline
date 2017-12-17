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
	// public function get_from_id($id)
	// {
		// $where['posted_item.id'] = $id;
		
		// $this->db->select('*, ' . $this->table_item.'.id AS id');
		// $this->db->join('category', 'category.id=' . $this->table_item . '.category_id', 'left');
		// $this->db->join('brand', 'brand.id=' . $this->table_item . '.brand_id', 'left');
		// $this->db->where($where);
		// $query = $this->db->get($this->table_item, 1);
		// $item = $query->row();
		
		// return ($item !== null) ? $this->get_stub_from_db($item) : null;
	// }
	
	public function get_all()
	{
		$this->load->model('Customer_model');
		
		$query = $this->db->get($this->table_customer);
		$items = $query->result();
		
		return ($items !== null) ? $this->map_list($items) : null;
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
}

?>