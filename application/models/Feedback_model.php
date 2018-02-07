<?php

class Feedback_model extends CI_Model {
	
	private $table_feedback = 'feedback';
	
	// table attribute
	public $id;
	public $feedback_id;
	public $rating;
	public $feedback_text;
	public $feedback_reply;
	public $submitted_by;
	public $feedback_for;
	public $order_detail_id;
	
	// constructor
	public function __construct()
	{
		parent::__construct();
		
		$this->id				= NULL;
		$this->feedback_id		= "";
		$this->rating			= "";
		$this->feedback_text	= "";
		$this->feedback_reply	= "";
		$this->submitted_by		= "";
		$this->feedback_for		= "";
		$this->order_detail_id		= "";
		
	}
	
	// constructor from database object
	public function get_stub_from_db($db_item)
	{
		$this->id				= $db_item->id;
		$this->feedback_id		= $db_item->feedback_id;
		$this->rating			= $db_item->rating;
		$this->feedback_text	= $db_item->feedback_text;
		$this->feedback_reply	= $db_item->feedback_reply;
		$this->submitted_by		= $db_item->submitted_by;
		$this->feedback_for		= $db_item->feedback_for;
		$this->order_detail_id	= $db_item->order_detail_id;
		
		return $this;
	}
	
	// get db from this model
	public function get_db_from_stub()
	{
		$db_item = new class{};
		
		$db_item->id				= $this->id;
		$db_item->feedback_id		= $this->feedback_id;
		$db_item->rating			= $this->rating;
		$db_item->feedback_text		= $this->feedback_text;
		$db_item->feedback_reply	= $this->feedback_reply;
		$db_item->submitted_by		= $this->submitted_by;
		$db_item->feedback_for		= $this->feedback_for;
		$db_item->order_detail_id	= $this->order_detail_id;
		
		return $db_item;
	}
	
	// new stub object from database object
	public function get_new_stub_from_db($db_item)
	{
		$stub = new Feedback_model();
		
		$stub->id				= $db_item->id;
		$stub->feedback_id		= $db_item->feedback_id;
		$stub->rating			= $db_item->rating;
		$stub->feedback_text	= $db_item->feedback_text;
		$stub->feedback_reply	= $db_item->feedback_reply;
		$stub->submitted_by		= $db_item->submitted_by;
		$stub->feedback_for		= $db_item->feedback_for;
		$stub->order_detail_id	= $db_item->order_detail_id;
		
		
		return $stub;
	}
	
	public function map_list($feedbacks)
	{
		$result = array();
		foreach ($feedbacks as $feedback)
		{
			$result[] = $this->get_new_stub_from_db($feedback);
		}
		return $result;
	}
	
	// get voucher detail
	// public function get_from_id($id)
	// {
		// $where['id'] = $id;
		
		// $this->db->where($where);
		// $query = $this->db->get($this->table_voucher, 1);
		// $voucher = $query->row();
		
		// return ($voucher !== null) ? $this->get_stub_from_db($voucher) : null;
	// }
	
	public function get_from_order_detail_id($order_detail_id)
	{
		$where['order_detail_id'] = $order_detail_id;
		
		$this->db->where($where);
		$query = $this->db->get($this->table_feedback, 1);
		$feedback = $query->row();
		
		return ($feedback !== null) ? $this->get_stub_from_db($feedback) : new feedback_model();
	}
	
	public function insert_from_stub()
	{
		$db_item = $this->get_db_from_stub();
		
		$this->db->trans_start(); // buat nge lock db transaction (biar kalo fail ke rollback)
		
		$this->db->insert($this->table_feedback, $db_item);
		
		$this->id	= $this->db->insert_id();
		$this->update_natural_id();
		
		$this->db->trans_complete(); // selesai nge lock db transaction
	}
	
	public function update_from_stub()
	{
		$db_item = $this->get_db_from_stub();
		
		$this->db->trans_start(); // buat nge lock db transaction (biar kalo fail ke rollback)
		
		$this->db->where('id', $db_item->id);
		$this->db->update($this->table_feedback, $db_item);
		
		$this->db->trans_complete(); // selesai nge lock db transaction
	}
	
	public function update_natural_id()
	{
		$this->load->library('id_generator');
		$this->feedback_id = $this->id_generator->generate(TYPE['name']['FEEDBACK'], $this->id);
		
		$this->db->set('feedback_id', $this->feedback_id)
				 ->where('id', $this->id)
				 ->update($this->table_feedback);
	}
	
	
	// public function get_all()
	// {	
		// $this->db->join('brand', 'brand.id=' . $this->table_voucher . '.brand_id', 'left');
		// $query = $this->db->get($this->table_voucher, 1);
		// $vouchers = $query->result();
		
		// return ($vouchers !== null) ? $this->map_list($vouchers) : null;
	// }
	
	// insert new authorized voucher from form post
	// public function insert_from_post()
	// {	
		// $this->voucher_id			= "";
		// $this->voucher_worth		= $this->input->post('voucher_worth');
		// $this->voucher_description	= $this->input->post('voucher_description');
		// $this->date_added			= date("d-m-Y");
		// $this->voucher_stock		= $this->input->post('voucher_stock');
		// $this->brand_id				= $this->input->post('brand_id');
		// $this->voucher_code			= $this->input->post('voucher_code');
	
		
		// // insert data, then generate [voucher_id] based on [id]
		// $this->db->trans_start(); // buat nge lock db transaction (biar kalo fail ke rollback)
		
		// $db_item = $this->get_db_from_stub($this); // ambil database object dari model ini
		// if ($this->db->insert($this->table_voucher, $db_item))
		// {
			// $this->load->library('Id_Generator');
			
			// $db_item->id			= $this->db->insert_id();
			// $db_item->voucher_id	= $this->id_generator->generate(TYPE['name']['VOUCHER'], $db_item->id);
			
			// $this->db->where('id', $db_item->id);
			// $this->db->update($this->table_voucher, $db_item);
		// }
		
		// $this->db->trans_complete(); // selesai nge lock db transaction
	// }

}

?>