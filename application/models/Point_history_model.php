<?php

class Point_history_model extends CI_Model {
	
	private $table_point_history = 'point_history';
	
	// table attribute
	public $id;
	public $history_id;
	public $point_received;
	public $point_description;
	public $date_received;
	public $billing_id;
	public $customer_id;
	
	// relation table
	public $billing;
	public $customer;
	
	// constructor
	public function __construct()
	{
		parent::__construct();
		
		$this->id					= NULL;
		$this->history_id			= "";
		$this->point_received		= "";
		$this->point_description	= "";
		$this->date_received		= "";
		$this->billing_id			= "";
		$this->customer_id			= "";
	}
	
	// constructor from database object
	public function get_stub_from_db($db_item)
	{
		$this->id					= $db_item->id;
		$this->history_id			= $db_item->history_id;
		$this->point_received		= $db_item->point_received;
		$this->point_description	= $db_item->point_description;
		$this->date_received		= $db_item->date_received;
		$this->billing_id			= $db_item->billing_id;
		$this->customer_id			= $db_item->customer_id;
		
		return $this;
	}
	
	// get db from this model
	public function get_db_from_stub()
	{
		$db_item = new class{};
		
		$db_item->id				= $this->id;
		$db_item->history_id		= $this->history_id;
		$db_item->point_received	= $this->point_received;
		$db_item->point_description	= $this->point_description;
		$db_item->date_received		= $this->date_received;
		$db_item->billing_id		= $this->billing_id;
		$db_item->customer_id		= $this->customer_id;
		
		return $db_item;
	}
	
	// new stub object from database object
	public function get_new_stub_from_db($db_item)
	{
		$stub = new Point_history_model();
		
		$stub->id					= $db_item->id;
		$stub->history_id			= $db_item->history_id;
		$stub->point_received		= $db_item->point_received;
		$stub->point_description	= $db_item->point_description;
		$stub->date_received		= $db_item->date_received;
		$stub->billing_id			= $db_item->billing_id;
		$stub->customer_id			= $db_item->customer_id;
		
		return $stub;
	}
	
	public function map_list($point_histories)
	{
		$result = array();
		foreach ($point_histories as $point_history)
		{
			$result[] = $this->get_new_stub_from_db($point_history);
		}
		return $result;
	}
	
	public function get_from_id($id)
	{
		$where['id'] = $id;
		
		$this->db->where($where);
		$query = $this->db->get($this->table_point_history, 1);
		$point_history = $query->row();
		
		return ($point_history !== null) ? $this->get_stub_from_db($point_history) : null;
	}
	
	public function get_all()
	{
		$query = $this->db->get($this->table_point_history);
		$point_histories = $query->result();
		
		return ($point_histories !== null) ? $this->map_list($point_histories) : array();
	}
	
	public function insert($point_received, $point_description, $billing_id, $customer_id)
	{
		$this->point_received		= $point_received;
		$this->point_description	= $point_description;
		$this->date_received		= date("Y-m-d H:i:s", time());
		$this->billing_id			= $billing_id;
		$this->customer_id			= $customer_id;
		
		$this->db->trans_start();
		
			$item = $this->get_db_from_stub();
			if ($this->db->insert($this->table_point_history, $item))
			{
				$this->id	= $this->db->insert_id();
			
				$this->update_natural_id();
			}
		
		$this->db->trans_complete();
	}
	
	public function update_natural_id()
	{
		$this->load->library('id_generator');
		$this->history_id = $this->id_generator->generate(TYPE['name']['POINT_HISTORY'], $this->id);
		
		$this->db->set('history_id', $this->history_id)
				 ->where('id', $this->id)
				 ->update($this->table_point_history);
	}
	
	public function init_billing()
	{
		$this->billing = $this->billing->get_from_id($this->billing_id);
		return $this->billing;
	}
	
	public function init_customer()
	{
		$this->customer = $this->customer->get_from_id($this->customer_id);
		return $this->customer;
	}
}

?>