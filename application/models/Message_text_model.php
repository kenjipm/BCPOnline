<?php

class Message_text_model extends CI_Model {
	
	private $table_message_text = 'message_text';
	private $table_message_inbox = 'message_inbox';
	
	// table attribute
	public $id;
	public $date_sent;
	public $text;
	public $sender_id;
	public $message_inbox_id;
	
	// relation table
	public $message_inbox;
	public $account_sender;
	
	// constructor
	public function __construct()
	{
		parent::__construct();
		
		$this->id					= 0;
		$this->date_sent			= date("Y-m-d H:i:s");
		$this->text					= "";
		$this->sender_id			= "";
		$this->message_inbox_id		= "";
		
		$this->load->model('Message_inbox_model');
		$this->load->model('Account_model');
		
		$this->message_inbox	= new Message_inbox_model();
		$this->account_sender	= new Account_model();
	}
	
	// constructor from database object
	public function get_stub_from_db($db_item)
	{
		$this->id				= $db_item->id;
		$this->date_sent		= $db_item->date_sent;
		$this->text				= $db_item->text;
		$this->sender_id		= $db_item->sender_id;
		$this->message_inbox_id	= $db_item->message_inbox_id;
		
		return $this;
	}
	
	// get db from this model
	public function get_db_from_stub()
	{
		$db_item = new class{};
		
		$db_item->id				= $this->id;
		$db_item->date_sent			= $this->date_sent;
		$db_item->text				= $this->text;
		$db_item->sender_id			= $this->sender_id;
		$db_item->message_inbox_id	= $this->message_inbox_id;
		
		return $db_item;
	}
	
	// new stub object from database object
	public function get_new_stub_from_db($db_item)
	{
		$stub = new Message_text_model();
		
		$stub->id				= $db_item->id;
		$stub->date_sent		= $db_item->date_sent;
		$stub->text				= $db_item->text;
		$stub->sender_id		= $db_item->sender_id;
		$stub->message_inbox_id	= $db_item->message_inbox_id;
		
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
		$query = $this->db->get($this->table_message_text, 1);
		$result = $query->row();
		
		return ($result !== null) ? $this->get_stub_from_db($result) : null;
	}
	
	public function get_all_from_message_inbox_id($message_inbox_id)
	{
		$where['message_inbox_id'] = $message_inbox_id;
		
		$this->db->where($where);
		$query = $this->db->get($this->table_message_text);
		$results = $query->result();
		
		return ($results !== null) ? $this->map_list($results) : array();
	}
	
	public function get_last_from_message_inbox_id($message_inbox_id)
	{
		$where['message_inbox_id'] = $message_inbox_id;
		
		$this->db->where($where);
		$this->db->order_by('date_sent', 'DESC');
		$query = $this->db->get($this->table_message_text, 1);
		$result = $query->row();
		
		return ($result !== null) ? $this->get_stub_from_db($result) : null;
	}
	
	public function insert_from_stub()
	{
		$db_item = $this->get_db_from_stub();
		
		$this->db->trans_start(); // buat nge lock db transaction (biar kalo fail ke rollback)
		
		$this->db->insert($this->table_message_text, $db_item);
		$this->id	= $this->db->insert_id();
		
		$this->db->trans_complete(); // selesai nge lock db transaction
		
		return $this->id;
	}
	
	public function insert_from_post()
	{
		$this->message_inbox_id = $this->input->post('message_inbox_id');
		$this->sender_id = $this->session->id;
		$this->text = $this->input->post('text');
		$this->date_sent = date("Y-m-d H:i:s");
		$db_item = $this->get_db_from_stub();
		
		$this->db->trans_start(); // buat nge lock db transaction (biar kalo fail ke rollback)
		
		$this->db->insert($this->table_message_text, $db_item);
		$this->id	= $this->db->insert_id();
		
		$this->db->trans_complete(); // selesai nge lock db transaction
		
		return $this->id;
	}
	
	public function init_account_sender()
	{
		$this->account_sender = $this->account_sender->get_from_id($this->sender_id);
		return $this->account_sender;
	}
}

?>