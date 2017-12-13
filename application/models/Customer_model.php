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
		
		$this->db->set('customer_id', $natural_id);
		$this->db->where('id', $this->id);
		$this->db->update($this->table_customer);
		
		$this->db->trans_complete();
	}
}

?>