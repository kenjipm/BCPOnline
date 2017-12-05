<?php

class Deliverer_model extends CI_Model {
	
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
	
	public function insert($account_id, $deliverer_id)
	{
		$this->account_id			= $account_id;
		$this->deliverer_id			= $deliverer_id;
		$this->license_plate		= "";
		$this->vehicle_desc			= "";
		
		$this->db->trans_start();
		
		if ($this->db->insert($this->table_deliverer, $this))
		{
			$this->id	= $this->db->insert_id();
		}
		
		$this->db->trans_complete();
	}
}

?>