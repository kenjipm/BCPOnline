<?php

class Tenant_model extends CI_Model {
	
	private $table_tenant = 'tenant';
	
	public $id;
	public $tenant_id;
	public $account_id;
	public $unit_number;
	public $floor;
	public $selling_category;
	public $is_open;
	
	public function get_by_account_id($account_id)
	{
		$this->db->where('account_id', $account_id);
		$query = $this->db->get($this->table_tenant, 1);
		
		return $query->row();
	}
	
	public function insert($account_id, $tenant_id)
	{
		$this->account_id			= $account_id;
		$this->tenant_id			= $tenant_id;
		$this->unit_number			= "";
		$this->floor				= "";
		$this->selling_category		= "";
		$this->is_open				= false;
		
		$this->db->trans_start();
		
		if ($this->db->insert($this->table_tenant, $this))
		{
			$this->id	= $this->db->insert_id();
		}
		
		$this->db->trans_complete();
	}
}

?>