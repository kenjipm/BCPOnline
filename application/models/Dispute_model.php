<?php

class Dispute_model extends CI_Model {
	
	private $table_dispute = 'dispute';
	
	// table attribute
	public $id;
	public $dispute_id;
	public $reason;
	public $date_created;
	public $party_one_id;
	public $party_two_id;
	public $dispute_status;
	public $order_detail_id;
	
	// relation table
	public $account_party_one;
	public $account_party_two;
	public $order_detail;
	
	// constructor
	public function __construct()
	{
		parent::__construct();
		
		$this->id				= 0;
		$this->dispute_id		= "";
		$this->reason			= "";
		$this->date_created		= date("Y-m-d H:i:s");
		$this->party_one_id		= "";
		$this->party_two_id		= "";
		$this->dispute_status	= "";
		$this->order_detail_id	= "";
		
		$this->load->model('Account_model');
		$this->load->model('Order_details_model');
		
		$this->account_party_one	= new Account_model();
		$this->account_party_two	= new Account_model();
		$this->order_detail			= new Order_details_model();
	}
	
	// constructor from database object
	public function get_stub_from_db($db_item)
	{
		$this->id				= $db_item->id;
		$this->dispute_id		= $db_item->dispute_id;
		$this->reason			= $db_item->reason;
		$this->date_created		= $db_item->date_created;
		$this->party_one_id		= $db_item->party_one_id;
		$this->party_two_id		= $db_item->party_two_id;
		$this->dispute_status	= $db_item->dispute_status;
		$this->order_detail_id	= $db_item->order_detail_id;
		
		return $this;
	}
	
	// get db from this model
	public function get_db_from_stub()
	{
		$db_item = new class{};
		
		$db_item->id				= $this->id;
		$db_item->dispute_id		= $this->dispute_id;
		$db_item->reason			= $this->reason;
		$db_item->date_created		= $this->date_created;
		$db_item->party_one_id		= $this->party_one_id;
		$db_item->party_two_id		= $this->party_two_id;
		$db_item->dispute_status	= $this->dispute_status;
		$db_item->order_detail_id	= $this->order_detail_id;
		
		return $db_item;
	}
	
	// new stub object from database object
	public function get_new_stub_from_db($db_item)
	{
		$stub = new dispute_model();
		
		$stub->id				= $db_item->id;
		$stub->dispute_id		= $db_item->dispute_id;
		$stub->reason			= $db_item->reason;
		$stub->date_created		= $db_item->date_created;
		$stub->party_one_id		= $db_item->party_one_id;
		$stub->party_two_id		= $db_item->party_two_id;
		$stub->dispute_status	= $db_item->dispute_status;
		$stub->order_detail_id	= $db_item->order_detail_id;
		
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
	
	public function get_from_id($id)
	{
		$where['id'] = $id;
		
		$this->db->where($where);
		$query = $this->db->get($this->table_dispute, 1);
		$result = $query->row();
		
		return ($result !== null) ? $this->get_stub_from_db($result) : null;
	}
	
	public function get_from_parties_id($party_one_id, $party_two_id, $order_detail_id)
	{
		$where['party_one_id']		= $party_one_id;
		$where['party_two_id']		= $party_two_id;
		$where['order_detail_id']	= $order_detail_id;
		
		$this->db->where($where);
		$query = $this->db->get($this->table_dispute, 1); 
		$result = $query->row();
		
		return ($result !== null) ? $this->get_stub_from_db($result) : null;
	}
	
	public function get_all_from_account_id($account_id)
	{
		$where['party_one_id'] = $account_id;
		$or_where['party_two_id'] = $account_id;
		
		$this->db->where($where);
		$this->db->or_where($or_where);
		$query = $this->db->get($this->table_dispute);
		$results = $query->result();
		
		return ($results !== null) ? $this->map_list($results) : array();
	}
	
	public function get_last_dispute_text()
	{
		$this->load->model('dispute_text_model');
		return $this->dispute_text_model->get_last_from_dispute_id($this->id);
	}
	
	public function insert_from_parties_id($party_one_id, $party_two_id, $order_detail_id)
	{
		$this->party_one_id		= $party_one_id;
		$this->party_two_id		= $party_two_id;
		$this->order_detail_id	= $order_detail_id;
		$db_item = $this->get_db_from_stub();
		
		$this->db->trans_start(); // buat nge lock db transaction (biar kalo fail ke rollback)
		
		$this->db->insert($this->table_dispute, $db_item);
		
		$this->id	= $this->db->insert_id();
		$this->update_natural_id();
		
		$this->db->trans_complete(); // selesai nge lock db transaction
	}
	
	public function update_natural_id()
	{
		$this->load->library('id_generator');
		$this->dispute_id = $this->id_generator->generate(TYPE['name']['dispute'], $this->id);
		
		$this->db->set('dispute_id', $this->dispute_id)
				 ->where('id', $this->id)
				 ->update($this->table_dispute);
	}
	
	public function init_account_party_one()
	{
		$this->account_party_one = $this->account_party_one->get_from_id($this->party_one_id);
		return $this->account_party_one;
	}
	
	public function init_account_party_two()
	{
		$this->account_party_two = $this->account_party_two->get_from_id($this->party_two_id);
		return $this->account_party_two;
	}
	
	public function init_order_detail()
	{
		$this->order_detail = $this->order_detail->get_from_id($this->order_detail_id);
		return $this->order_detail;
	}
}

?>