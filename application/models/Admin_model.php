<?php

class Admin_model extends CI_Model {
	
	private $table_default = 'admin';
	private $table_admin = 'admin';
	
	public $id;
	public $admin_id;
	public $account_id;
	public $hour_available;
	
	public function get_by_account_id($account_id)
	{
		$this->db->where('account_id', $account_id);
		$query = $this->db->get($this->table_admin, 1);
		
		return $query->row();
	}
	
	public function insert_from_account($account_id)
	{
		$this->account_id			= $account_id;
		$this->admin_id				= "";
		$this->hour_available		= "";
		
		$this->db->trans_start();
		
		if ($this->db->insert($this->table_admin, $this))
		{
			$this->id	= $this->db->insert_id();
		}
		
		$this->db->trans_complete();
	}
	
	public function update_natural_id($natural_id)
	{
		$this->admin_id = $natural_id;
		
		$this->db->trans_start();
		
		$this->db->set('admin_id', $natural_id)
				 ->where('id', $this->id)
				 ->update($this->table_admin);
		
		$this->db->trans_complete();
	}
}

?>