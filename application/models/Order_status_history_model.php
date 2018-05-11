<?php

class Order_status_history_model extends CI_Model {
	
	private $table_order_status_history = 'order_status_history';
	
	// table attribute
	public $id;
	
	// relation attribute
	public $order_details;
	
	// constructor
	public function __construct()
	{
		parent::__construct();
		
		$this->id							= NULL;
		$this->order_status_history_id		= "";
		$this->order_details_id				= "";
		$this->status						= "";
		$this->date_added					= date("Y-m-d H:i:s");
		
		$this->load->model('Order_details_model');
		$this->order_details = new Order_details_model();
	}
	
	// constructor from database object
	public function get_stub_from_db($db_item)
	{
		$this->id							= $db_item->id;
		$this->order_status_history_id		= $db_item->order_status_history_id;
		$this->order_details_id				= $db_item->order_details_id;
		$this->status						= $db_item->status;
		$this->date_added					= $db_item->date_added;
		
		return $this;
	}
	
	// get db from this model
	public function get_db_from_stub()
	{
		$db_item = new class{};
		
		$db_item->id							= $this->id;
		$db_item->order_status_history_id		= $this->order_status_history_id;
		$db_item->order_details_id				= $this->order_details_id;
		$db_item->status						= $this->status;
		$db_item->date_added					= $this->date_added;
		
		return $db_item;
	}
	
	// new stub object from database object
	public function get_new_stub_from_db($db_item)
	{
		$stub = new Order_status_history_model();
		
		$stub->id							= $db_item->id;
		$stub->order_status_history_id		= $db_item->order_status_history_id;
		$stub->order_details_id				= $db_item->order_details_id;
		$stub->status						= $db_item->status;
		$stub->date_added					= $db_item->date_added;
		
		return $stub;
	}
	
	public function map_list($order_status_histories)
	{
		$result = array();
		foreach ($order_status_histories as $order_status_history)
		{
			$result[] = $this->get_new_stub_from_db($order_status_history);
		}
		return $result;
	}
	
	// get order_status_history detail
	public function get_from_id($id)
	{
		$where['id'] = $id;
		
		$this->db->where($where);
		$query = $this->db->get($this->table_order_status_history, 1);
		$order_status_history = $query->row();
		
		return ($order_status_history !== null) ? $this->get_stub_from_db($order_status_history) : new Order_status_history_model();
	}
	
	public function get_from_order_details_id($order_details_id)
	{
		$where['order_details_id'] = $order_details_id;
		
		$this->db->where($where);
		$query = $this->db->get($this->table_order_status_history);
		$order_status_histories = $query->result();
		
		return ($order_status_histories !== null) ? $this->map_list($order_status_histories) : array();
	}
	
	public function insert($order_details_id, $status)
	{
		$this->order_details_id		= $order_details_id;
		$this->status				= $status;
	
		// insert data, then generate [account_id] based on [id]
		$this->db->trans_start(); // buat nge lock db transaction (biar kalo fail ke rollback)
		
		$db_item = $this->get_db_from_stub($this); // ambil database object dari model ini
		if ($this->db->insert($this->table_order_status_history, $db_item))
		{
			$this->load->library('Id_generator');
			
			$db_item->id						= $this->db->insert_id();
			$db_item->order_status_history_id	= $this->id_generator->generate(TYPE['name']['ORDER_STATUS_HISTORY'], $db_item->id);
			
			$this->db->where('id', $db_item->id);
			$this->db->update($this->table_order_status_history, $db_item);
		}
		
		$this->db->trans_complete(); // selesai nge lock db transaction
		
		return $db_item->id ?? 0;
	}
}

?>