<?php

class Message_inbox_model extends CI_Model {
	
	private $table_message_inbox = 'message_inbox';
	private $table_message_text = 'message_text';
	
	// table attribute
	public $id;
	public $inbox_id;
	public $date_created;
	public $party_one_id;
	public $party_two_id;
	
	// relation table
	public $account_party_one;
	public $account_party_two;
	
	// constructor
	public function __construct()
	{
		parent::__construct();
		
		$this->id				= 0;
		$this->inbox_id			= "";
		$this->date_created		= date("Y-m-d H:i:s");
		$this->party_one_id		= "";
		$this->party_two_id		= "";
		
		$this->load->model('Account_model');
		
		$this->account_party_one	= new Account_model();
		$this->account_party_two	= new Account_model();
	}
	
	// constructor from database object
	public function get_stub_from_db($db_item)
	{
		$this->id				= $db_item->id;
		$this->inbox_id			= $db_item->inbox_id;
		$this->date_created		= $db_item->date_created;
		$this->party_one_id		= $db_item->party_one_id;
		$this->party_two_id		= $db_item->party_two_id;
		
		return $this;
	}
	
	// get db from this model
	public function get_db_from_stub()
	{
		$db_item = new class{};
		
		$db_item->id				= $this->id;
		$db_item->inbox_id			= $this->inbox_id;
		$db_item->date_created		= $this->date_created;
		$db_item->party_one_id		= $this->party_one_id;
		$db_item->party_two_id		= $this->party_two_id;
		
		return $db_item;
	}
	
	// new stub object from database object
	public function get_new_stub_from_db($db_item)
	{
		$stub = new Message_inbox_model();
		
		$stub->id				= $db_item->id;
		$stub->inbox_id			= $db_item->inbox_id;
		$stub->date_created		= $db_item->date_created;
		$stub->party_one_id		= $db_item->party_one_id;
		$stub->party_two_id		= $db_item->party_two_id;
		
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
		$query = $this->db->get($this->table_message_inbox, 1);
		$result = $query->row();
		
		return ($result !== null) ? $this->get_stub_from_db($result) : null;
	}
	
	public function get_from_parties_id($party_one_id, $party_two_id)
	{
		$where['party_one_id'] = $party_one_id;
		$where['party_two_id'] = $party_two_id;
		
		$this->db->where($where);
		$query = $this->db->get($this->table_message_inbox, 1);
		$result = $query->row();
		
		return ($result !== null) ? $this->get_stub_from_db($result) : null;
	}
	
	public function get_all_from_account_id($account_id)
	{
		$where['party_one_id'] = $account_id;
		$or_where['party_two_id'] = $account_id;
		
		$this->db->select('*, ' . $this->table_message_inbox . '.id AS id');
		$this->db->join($this->table_message_text, $this->table_message_inbox.'.id' . ' = ' . $this->table_message_text.'.message_inbox_id', 'left');
		
		$this->db->where($where);
		$this->db->or_where($or_where);
		
		$this->db->group_by($this->table_message_inbox.'.id');
		$this->db->distinct();
		$this->db->order_by($this->table_message_text.'.message_inbox_id', 'DESC');
		
		$query = $this->db->get($this->table_message_inbox);
		$results = $query->result();
		
		return ($results !== null) ? $this->map_list($results) : array();
	}
	
	public function get_last_message_text()
	{
		$this->load->model('message_text_model');
		return $this->message_text_model->get_last_from_message_inbox_id($this->id);
	}
	
	public function insert_from_parties_id($party_one_id, $party_two_id)
	{
		$this->party_one_id = $party_one_id;
		$this->party_two_id = $party_two_id;
		$db_item = $this->get_db_from_stub();
		
		$this->db->trans_start(); // buat nge lock db transaction (biar kalo fail ke rollback)
		
		$this->db->insert($this->table_message_inbox, $db_item);
		
		$this->id	= $this->db->insert_id();
		$this->update_natural_id();
		
		$this->db->trans_complete(); // selesai nge lock db transaction
	}
	
	public function update_natural_id()
	{
		$this->load->library('id_generator');
		$this->inbox_id = $this->id_generator->generate(TYPE['name']['MESSAGE_INBOX'], $this->id);
		
		$this->db->set('inbox_id', $this->inbox_id)
				 ->where('id', $this->id)
				 ->update($this->table_message_inbox);
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
}

?>