<?php

class Reward_model extends CI_Model {
	
	private $table_reward = 'reward';
	
	// table attribute
	public $id;
	public $reward_id;
	public $date_added;
	public $date_expired;
	public $points_needed;
	public $reward_description;
	
	// constructor
	public function __construct()
	{
		parent::__construct();
		
		$this->id					= NULL;
		$this->reward_id			= "";
		$this->date_added			= "";
		$this->date_expired			= "";
		$this->points_needed		= "";
		$this->reward_description	= "";
		
	}
	
	// constructor from database object
	public function get_stub_from_db($db_item)
	{
		$this->id					= $db_item->id;
		$this->reward_id			= $db_item->reward_id;
		$this->date_added			= $db_item->date_added;
		$this->date_expired			= $db_item->date_expired;
		$this->points_needed		= $db_item->points_needed;
		$this->reward_description	= $db_item->reward_description;
		
		return $this;
	}
	
	// get db from this model
	public function get_db_from_stub()
	{
		$db_item = new class{};
		
		$db_item->id					= $this->id;
		$db_item->reward_id				= $this->reward_id;
		$db_item->date_added			= $this->date_added;
		$db_item->date_expired			= $this->date_expired;
		$db_item->points_needed			= $this->points_needed;
		$db_item->reward_description	= $this->reward_description;
		
		return $db_item;
	}
	
	// new stub object from database object
	public function get_new_stub_from_db($db_item)
	{
		$stub = new Reward_model();
		
		$stub->id					= $db_item->id;
		$stub->reward_id			= $db_item->reward_id;
		$stub->date_added			= $db_item->date_added;
		$stub->date_expired			= $db_item->date_expired;
		$stub->points_needed		= $db_item->points_needed;
		$stub->reward_description	= $db_item->reward_description;
		
		return $stub;
	}
	
	public function map_list($rewards)
	{
		$result = array();
		foreach ($rewards as $reward)
		{
			$result[] = $this->get_new_stub_from_db($reward);
		}
		return $result;
	}
	
	// get reward detail
	public function get_from_id($id)
	{
		$where['id'] = $id;
		
		$this->db->where($where);
		$query = $this->db->get($this->table_reward, 1);
		$reward = $query->row();
		
		return ($reward !== null) ? $this->get_stub_from_db($reward) : null;
	}
	
	public function get_all()
	{
		
		$query = $this->db->get($this->table_reward);
		$rewards = $query->result();
		
		return ($rewards !== null) ? $this->map_list($rewards) : array();
	}
	
	public function get_all_not_expired()
	{
		$cur_date = date("Y-m-d H:i:s", time());
		
		$this->db->where("date_expired > ", $cur_date);
		
		$query = $this->db->get($this->table_reward);
		$rewards = $query->result();
		
		return ($rewards !== null) ? $this->map_list($rewards) : array();
	}
	
	// insert new reward from form post
	public function insert_from_post()
	{	
		$this->reward_id			= "";
		$this->date_added			= date("Y-m-d H:i:s");
		$this->date_expired			= $this->input->post('date_expired');
		$this->points_needed		= $this->input->post('points_needed');
		$this->reward_description	= $this->input->post('reward_description');
	
		
		// insert data, then generate [reward_id] based on [id]
		$this->db->trans_start(); // buat nge lock db transaction (biar kalo fail ke rollback)
		
		$db_item = $this->get_db_from_stub($this); // ambil database object dari model ini
		if ($this->db->insert($this->table_reward, $db_item))
		{
			$this->load->library('Id_generator');
			
			$db_item->id		= $this->db->insert_id();
			$db_item->reward_id	= $this->id_generator->generate(TYPE['name']['REWARD'], $db_item->id);
			
			$this->db->where('id', $db_item->id);
			$this->db->update($this->table_reward, $db_item);
		}
		
		$this->db->trans_complete(); // selesai nge lock db transaction
	}
	
	public function is_expired()
	{
		return (time() > strtotime($this->date_expired));
	}

}

?>