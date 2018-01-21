<?php

class Tenant_model extends CI_Model {
	
	private $table_default = 'tenant';
	private $table_tenant = 'tenant';
	
	public $id;
	public $tenant_id;
	public $account_id;
	public $unit_number;
	public $floor;
	public $selling_category;
	public $is_open;
	
	public $account;
	
	// constructor
	public function __construct()
	{
		parent::__construct();
		
		$this->id				= NULL;
		$this->tenant_id		= "";
		$this->tenant_name		= "";
		$this->account_id		= "";
		$this->unit_number		= "";
		$this->floor			= "";
		$this->selling_category	= "";
		$this->is_open			= 1;
		
		$this->load->model('Account_model');
		// $this->load->model('Item_model');
		$this->account = new Account_model();
		// $this->items = new Item_model();
	}
	
	// constructor from database object
	public function get_stub_from_db($db_item)
	{
		$this->id					= $db_item->id;
		$this->tenant_id			= $db_item->tenant_id;
		$this->tenant_name			= $db_item->tenant_name;
		$this->account_id			= $db_item->account_id;
		$this->unit_number			= $db_item->unit_number;
		$this->floor				= $db_item->floor;
		$this->selling_category		= $db_item->selling_category;
		$this->is_open				= $db_item->is_open;
		
		$this->account->name		= $db_item->name?? "";
		$this->account->email		= $db_item->email?? "";
		$this->account->status		= $db_item->status?? "";
		$this->account->date_joined = $db_item->date_joined?? "";
		
		return $this;
	}
	
	// get db from this model
	public function get_db_from_stub()
	{
		$db_item = new class{};
		
		$db_item->id				= $this->id;
		$db_item->tenant_id			= $this->tenant_id;
		$db_item->tenant_name		= $this->tenant_name;
		$db_item->account_id		= $this->account_id;
		$db_item->unit_number		= $this->unit_number;
		$db_item->floor				= $this->floor;
		$db_item->selling_category	= $this->selling_category;
		$db_item->is_open			= $this->is_open;
		
		return $db_item;
	}
	
	// new stub object from database object
	public function get_new_stub_from_db($db_item)
	{
		$stub = new Tenant_model();
		
		$stub->id				= $db_item->id;
		$stub->tenant_id		= $db_item->tenant_id;
		$stub->tenant_name		= $db_item->tenant_name;
		$stub->account_id		= $db_item->account_id;
		$stub->unit_number		= $db_item->unit_number;
		$stub->floor			= $db_item->floor;
		$stub->selling_category	= $db_item->selling_category;
		$stub->is_open			= $db_item->is_open;
		
		$stub->account->id			= $db_item->id;
		$stub->account->name		= $db_item->name ?? "";
		$stub->account->email		= $db_item->email ?? "";
		$stub->account->status		= $db_item->status ?? "";
		$stub->account->date_joined = $db_item->date_joined ?? "";
		
		return $stub;
	}
	
	public function map_list($tenants)
	{
		$result = array();
		foreach ($tenants as $tenant)
		{
			$result[] = $this->get_new_stub_from_db($tenant);
		}
		return $result;
	}
	
	// get tenant detail
	public function get_from_id($id)
	{
		$where['id'] = $id;
		$this->db->where($where);
		$query = $this->db->get($this->table_tenant, 1);
		$item = $query->row();
		
		return ($item !== null) ? $this->get_stub_from_db($item) : null;
	}
	
	public function get_all()
	{
		$this->load->model('Tenant_model');
		
		$this->db->join('account', 'account.id=' . $this->table_tenant . '.account_id', 'left');
		
		$query = $this->db->get($this->table_tenant);
		$items = $query->result();
		
		return ($items !== null) ? $this->map_list($items) : array();
	}
	
	public function get_by_account_id($account_id)
	{
		$this->db->where('account_id', $account_id);
		$query = $this->db->get($this->table_tenant, 1);
		
		return $query->row();
	}
	
	public function insert_from_account($account_id)
	{
		$this->account_id			= $account_id;
		$this->tenant_id			= "";
		$this->tenant_name			= $this->input->post('tenant_name');
		$this->unit_number			= $this->input->post('unit_number');
		$this->floor				= $this->input->post('floor');
		$this->selling_category		= $this->input->post('selling_category');
		$this->is_open				= true;
		
		$this->db->trans_start();
		
		if ($this->db->insert($this->table_tenant, $this))
		{
			$this->id	= $this->db->insert_id();
		}
		
		$this->db->trans_complete();
	}
	
	public function update_natural_id($natural_id)
	{
		$this->tenant_id = $natural_id;
		
		$this->db->trans_start();
		
		$this->db->set('tenant_id', $natural_id)
				 ->where('id', $this->id)
				 ->update($this->table_tenant);
		
		$this->db->trans_complete();
	}
	
	public function is_followed($customer_id)
	{
		if (!$customer_id) return null;
		
		$this->load->model('following_tenant_model');
		$following_id = $this->following_tenant_model->is_following($customer_id, $this->id);
		return $following_id;
	}
	
	public function init_account()
	{
		$this->account = $this->account->get_from_id($this->account_id);
		return $this->account;
	}
}

?>