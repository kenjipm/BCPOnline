<?php

class Setting_reward_model extends CI_Model {
	
	private $table_setting_reward = 'setting_reward';
	
	// table attribute
	public $id;
	public $setting_reward_id;
	public $base_percent;
	public $ratio_percent;
	public $event_name;
	public $date_created;
	public $date_expired;
	
	// constructor
	public function __construct()
	{
		parent::__construct();
		
		$this->id					= NULL;
		$this->setting_reward_id	= "";
		$this->base_percent			= "";
		$this->ratio_percent		= "";
		$this->event_name			= "";
		$this->date_created			= "";
		$this->date_expired			= "";
		
	}
	
	// constructor from database object
	public function get_stub_from_db($db_item)
	{
		$this->id					= $db_item->id;
		$this->setting_reward_id	= $db_item->setting_reward_id;
		$this->base_percent			= $db_item->base_percent;
		$this->ratio_percent		= $db_item->ratio_percent;
		$this->event_name			= $db_item->event_name;
		$this->date_created			= $db_item->date_created;
		$this->date_expired			= $db_item->date_expired;
		
		return $this;
	}
	
	// get db from this model
	public function get_db_from_stub()
	{
		$db_item = new class{};
		
		$db_item->id					= $this->id;
		$db_item->setting_reward_id		= $this->setting_reward_id;
		$db_item->base_percent			= $this->base_percent;
		$db_item->ratio_percent			= $this->ratio_percent;
		$db_item->event_name			= $this->event_name;
		$db_item->date_created			= $this->date_created;
		$db_item->date_expired			= $this->date_expired;
		
		return $db_item;
	}
	
	// new stub object from database object
	public function get_new_stub_from_db($db_item)
	{
		$stub = new Setting_reward_model();
		
		$stub->id					= $db_item->id;
		$stub->setting_reward_id	= $db_item->setting_reward_id;
		$stub->base_percent			= $db_item->base_percent;
		$stub->ratio_percent		= $db_item->ratio_percent;
		$stub->event_name			= $db_item->event_name;
		$stub->date_created			= $db_item->date_created;
		$stub->date_expired			= $db_item->date_expired;
		
		return $stub;
	}
	
	public function map_list($setting_rewards)
	{
		$result = array();
		foreach ($setting_rewards as $setting_reward)
		{
			$result[] = $this->get_new_stub_from_db($setting_reward);
		}
		return $result;
	}
	
	// get setting_reward detail
	public function get_from_id($id)
	{
		$where['id'] = $id;
		
		$this->db->where($where);
		$query = $this->db->get($this->table_setting_reward, 1);
		$setting_reward = $query->row();
		
		return ($setting_reward !== null) ? $this->get_stub_from_db($setting_reward) : null;
	}
	
	public function get_all()
	{
		$query = $this->db->get($this->table_setting_reward);
		$setting_rewards = $query->result();
		
		return ($setting_rewards !== null) ? $this->map_list($setting_rewards) : array();
	}
	
	//insert new reward from form post
	public function insert_from_post()
	{	
		$this->setting_reward_id	= "";
		$this->event_name			= $this->input->post('event_name');
		$this->base_percent			= $this->input->post('base_percent');
		$this->ratio_percent		= $this->input->post('ratio_percent');
		$this->price_per_point		= $this->input->post('price_per_point');
		$this->point_get			= $this->input->post('point_get');
		$this->date_created			= $this->input->post('date_created');
		$this->date_expired			= $this->input->post('date_expired');
	
		
		// insert data, then generate [reward_id] based on [id]
		$this->db->trans_start(); // buat nge lock db transaction (biar kalo fail ke rollback)
		
		$db_item = $this->get_db_from_stub($this); // ambil database object dari model ini
		if ($this->db->insert($this->table_setting_reward, $db_item))
		{
			$this->load->library('Id_Generator');
			
			$db_item->id				= $this->db->insert_id();
			$db_item->setting_reward_id	= $this->id_generator->generate(TYPE['name']['SETTING_REWARD'], $db_item->id);
			
			$this->db->where('id', $db_item->id);
			$this->db->update($this->table_setting_reward, $db_item);
		}
		
		$this->db->trans_complete(); // selesai nge lock db transaction
	}
	
	public function get_latest_setting_reward_id()
	{	
		$where['date_expired'] = NULL;
		
		$this->db->order_by('id', 'desc');
		$this->db->where($where);
		
		$query = $this->db->get($this->table_setting_reward, 1);
		$item = $query->row();
		
		return ($item !== null) ? $item->id : null;
	}

}

?>