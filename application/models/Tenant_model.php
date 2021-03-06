<?php

class Tenant_model extends CI_Model {
	
	private $table_default = 'tenant';
	private $table_tenant = 'tenant';
	private $table_feedback = 'feedback';
	private $table_order_details = 'order_details';
	private $table_item = 'posted_item';
	private $table_item_variance = 'posted_item_variance';
	
	public $id;
	public $tenant_id;
	public $tenant_name;
	public $account_id;
	public $unit_number;
	public $floor;
	public $bank_account;
	public $bank_account_owner;
	public $bank_name;
	public $bank_branch;
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
		$this->bank_account		= "";
		$this->bank_account_owner	= "";
		$this->bank_name 		= "";
		$this->bank_branch		= "";
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
		$this->bank_account			= $db_item->bank_account;
		$this->bank_account_owner	= $db_item->bank_account_owner;
		$this->bank_name			= $db_item->bank_name;
		$this->bank_branch			= $db_item->bank_branch;
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
		$db_item->bank_account		= $this->bank_account;
		$db_item->bank_account_owner = $this->bank_account_owner;
		$db_item->bank_name			= $this->bank_name;
		$db_item->bank_branch		= $this->bank_branch;
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
		$stub->bank_account		= $db_item->bank_account;
		$stub->bank_account_owner = $db_item->bank_account_owner;
		$stub->bank_name		= $db_item->bank_name;
		$stub->bank_branch		= $db_item->bank_branch;
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
	
	public function get_all($include_admin=false, $order_by="ASC")
	{
		$this->load->model('Tenant_model');
		
		$this->db->select('*, tenant.id AS tenant_id');
		if (!$include_admin) $this->db->where('tenant.id != 0');
		$this->db->join('account', 'account.id=' . $this->table_tenant . '.account_id', 'left');
		
		$this->db->order_by('tenant.tenant_name', $order_by);
		$query = $this->db->get($this->table_tenant);
		$items = $query->result();
		
		return ($items !== null) ? $this->map_list($items) : array();
	}
	
	public function get_by_account_id($account_id)
	{
		$this->db->where('account_id', $account_id);
		$query = $this->db->get($this->table_tenant, 1);
		
		$result = $query->row();
		
		return ($result !== null) ? $this->get_stub_from_db($result) : null;
	}
	
	public function insert_from_account($account_id)
	{
		$this->account_id			= $account_id;
		$this->tenant_id			= "";
		$this->tenant_name			= $this->input->post('tenant_name');
		$this->unit_number			= $this->input->post('unit_number');
		$this->floor				= $this->input->post('floor');
		$this->bank_account			= $this->input->post('bank_account');
		$this->bank_account_owner	= $this->input->post('bank_account_owner');
		$this->bank_name			= $this->input->post('bank_name');
		$this->bank_branch			= $this->input->post('bank_branch');
		$this->selling_category		= $this->input->post('selling_category');
		$this->is_open				= true;
		
		$this->db->trans_start();
		
		if ($this->db->insert($this->table_tenant, $this))
		{
			$this->id	= $this->db->insert_id();
		}
		
		$this->db->trans_complete();
	}
	
	public function update_bank_info($account_id)
	{
		$this->bank_account			= $this->input->post('bank_account');
		$this->bank_account_owner	= $this->input->post('bank_account_owner');
		$this->bank_name			= $this->input->post('bank_name');
		$this->bank_branch			= $this->input->post('bank_branch');
		
		$this->db->trans_start();
		
		$this->db->where('account_id', $account_id);
		
		$this->db->set('bank_account', $this->bank_account);
		$this->db->set('bank_account_owner', $this->bank_account_owner);
		$this->db->set('bank_name', $this->bank_name);
		$this->db->set('bank_branch', $this->bank_branch);
		
		$this->db->update('tenant');
		
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

	public function calculate_rating()
	{
		$query = $this->db
					  ->select('AVG('.$this->table_feedback.'.rating) AS rating_average, COUNT('.$this->table_feedback.'.id) AS rating_count')
					  ->join($this->table_order_details, $this->table_feedback.'.order_detail_id' . ' = ' . $this->table_order_details.'.id', 'left')
					  ->join($this->table_item_variance, $this->table_order_details.'.posted_item_variance_id' . ' = ' . $this->table_item_variance.'.id', 'left')
					  ->join($this->table_item, $this->table_item_variance.'.posted_item_id' . ' = ' . $this->table_item.'.id', 'left')
					  ->where($this->table_item.'.tenant_id', $this->id)
					  ->where($this->table_order_details.'.order_status', ORDER_STATUS['name']['DONE'])
					  // ->group_by($this->table_feedback.'.id')
					  ->get($this->table_feedback);
		$item = $query->row();
		
		if ($item == null)
		{
			$item = new class{};
			$item->rating_average = 0;
			$item->rating_average_round = "0-0";
			$item->rating_count = 0;
		}
		else
		{
			$item->rating_average_round = number_format(round($item->rating_average * 2) / 2, 1, "-", "");
		}
		
		return $item;
		
	}
	
}

?>