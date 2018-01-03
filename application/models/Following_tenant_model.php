<?php

class Following_tenant_model extends CI_Model {
	
	private $table_following_tenant = 'following_tenant';

	// table attribute
	public $id;
	public $following_id;
	public $tenant_id;
	public $customer_id;
	public $date_followed;
	public $date_unfollowed;
	
	// relation table
	public $tenant;
	public $customer;
	
	// constructor
	public function __construct()
	{
		parent::__construct();
		
		$this->id					= 0;
		$this->following_id			= "";
		$this->tenant_id			= 0;
		$this->customer_id			= 0;
		$this->date_followed		= "";
		$this->date_unfollowed		= "";
		
		$this->load->model('Tenant_model');
		$this->load->model('Customer_model');
		
		$this->tenant				= new Tenant_model();
		$this->customer				= new Customer_model();
	}
	
	// constructor from database object
	public function get_stub_from_db($db_item)
	{
		$this->id					= $db_item->id;
		$this->following_id			= $db_item->following_id;
		$this->tenant_id			= $db_item->tenant_id;
		$this->customer_id			= $db_item->customer_id;
		$this->date_followed		= $db_item->date_followed;
		$this->date_unfollowed		= $db_item->date_unfollowed;
		
		return $this;
	}
	
	// get db from this model
	public function get_db_from_stub()
	{
		$db_item = new class{};
		
		$db_item->id					= $this->id;
		$db_item->following_id			= $this->following_id;
		$db_item->tenant_id				= $this->tenant_id;
		$db_item->customer_id			= $this->customer_id;
		$db_item->date_followed			= $this->date_followed;
		$db_item->date_unfollowed		= $this->date_unfollowed;
		
		return $db_item;
	}
	
	// new stub object from database object
	public function get_new_stub_from_db($db_item)
	{
		$stub = new Following_tenant_model();
		
		$stub->id					= $db_item->id;
		$stub->following_id			= $db_item->following_id;
		$stub->tenant_id			= $db_item->tenant_id;
		$stub->customer_id			= $db_item->customer_id;
		$stub->date_followed		= $db_item->date_followed;
		$stub->date_unfollowed		= $db_item->date_unfollowed;
		
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
	
	// get item detail
	public function get_from_id($id)
	{
		$where['id'] = $id;
		
		$this->db->where($where);
		$query = $this->db->get($this->table_item, 1);
		$item = $query->row();
		
		return ($item !== null) ? $this->get_stub_from_db($item) : null;
	}
	
	// get item detail
	public function get_all_from_customer_id($customer_id, $limit=10, $offset=0)
	{
		$where['customer_id'] = $customer_id;
		
		$query = $this->db
					  ->where($where)
					  ->order_by($this->table_following_tenant.'.id', 'DESC')
					  ->get($this->table_following_tenant, $limit??"", $limit?$offset:""); // kalau ga ada limit, jgn taro offset nya
		$items = $query->result();
		
		return ($items !== null) ? $this->map_list($items) : null;
	}
	
	public function get_all()
	{
		$query = $this->db->get($this->table_item);
		$items = $query->result();
		
		return ($items !== null) ? $this->map_list($items) : null;
	}
	
	public function insert($customer_id, $tenant_id)
	{
		$this->customer_id		= $customer_id;
		$this->tenant_id		= $tenant_id;
		$this->date_followed	= date("Y-m-d");
		
		$item = $this->get_db_from_stub();
		if ($this->db->insert($this->table_following_tenant, $item))
		{
			$this->id	= $this->db->insert_id();
		
			$this->update_natural_id();
		}
	}
	
	public function update_natural_id()
	{
		$this->load->library('id_generator');
		$this->following_id = $this->id_generator->generate(TYPE['name']['FOLLOWING_TENANT'], $this->id);
		
		$this->db->trans_start();
		
		$this->db->set('following_id', $this->following_id)
				 ->where('id', $this->id)
				 ->update($this->table_following_tenant);
		
		$this->db->trans_complete();
	}
	
	public function is_following($customer_id, $tenant_id)
	{
		$where['customer_id'] = $customer_id;
		$where['tenant_id'] = $tenant_id;
		
		$query = $this->db
					  ->where($where)
					  ->get($this->table_following_tenant, 1);
					  
		$item = $query->row();
		return ($item != null) ? $item->id : false;
	}
	
	public function toggle_tenant_favorite($customer_id, $tenant_id)
	{
		$id = $this->is_following($customer_id, $tenant_id);
		
		if ($id == null) // kalau ga ada, insert new
		{
			$this->insert($customer_id, $tenant_id);
			return $this->id;
		}
		else // kalau ada, hapus
		{
			$this->db->where('id', $id);
			$this->db->delete($this->table_following_tenant);
			
			return false;
		}
	}
	
	public function init_tenant()
	{
		$this->tenant = $this->tenant->get_from_id($this->tenant_id);
		return $this->tenant;
	}
	
	public function init_customer()
	{
		$this->customer = $this->customer->get_from_id($this->customer_id);
		return $this->customer;
	}
}

?>