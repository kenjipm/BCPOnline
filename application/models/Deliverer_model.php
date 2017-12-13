<?php

class Deliverer_model extends CI_Model {
	
	private $table_default = 'deliverer';
	private $table_deliverer = 'deliverer';
	
	public $id;
	public $deliverer_id;
	public $account_id;
	public $license_plate;
	public $vehicle_desc;
	
	public function get_by_account_id($account_id)
	{
		$this->db->where('account_id', $account_id);
		$query = $this->db->get($this->table_deliverer, 1);
		
		return $query->row();
	}
	
	public function insert_from_account($account_id)
	{
		$this->account_id			= $account_id;
		$this->deliverer_id			= "";
		$this->license_plate		= "";
		$this->vehicle_desc			= "";
		
		$this->db->trans_start();
		
		if ($this->db->insert($this->table_deliverer, $this))
		{
			$this->id	= $this->db->insert_id();
		}
		
		$this->db->trans_complete();
	}
	
	public function update_natural_id($natural_id)
	{
		$this->deliverer_id = $natural_id;
		
		$this->db->trans_start();
		
		$this->db->set('deliverer_id', $natural_id);
		$this->db->where('id', $this->id);
		$this->db->update($this->table_deliverer);
		
		$this->db->trans_complete();
	}
}

?>