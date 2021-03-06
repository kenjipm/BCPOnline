<?php

class Setting_reward_model extends CI_Model {
	
	private $table_setting_reward = 'setting_reward';
	
	// table attribute
	public $id;
	public $setting_reward_id;
	public $base_percent;
	public $ratio_percent;
	public $price_per_point;
	public $point_get;
	public $event_name;
	public $date_created;
	public $date_expired;
	public $is_confirmed;
	
	// constructor
	public function __construct()
	{
		parent::__construct();
		
		$this->id					= NULL;
		$this->setting_reward_id	= "";
		$this->base_percent			= 0;
		$this->ratio_percent		= 0;
		$this->price_per_point		= 0;
		$this->point_get			= 0;
		$this->event_name			= "";
		$this->date_created			= "";
		$this->is_confirmed			= 0;
		
	}
	
	// constructor from database object
	public function get_stub_from_db($db_item)
	{
		$this->id					= $db_item->id;
		$this->setting_reward_id	= $db_item->setting_reward_id;
		$this->base_percent			= $db_item->base_percent;
		$this->ratio_percent		= $db_item->ratio_percent;
		$this->price_per_point		= $db_item->price_per_point;
		$this->point_get			= $db_item->point_get;
		$this->event_name			= $db_item->event_name;
		$this->date_created			= $db_item->date_created;
		$this->date_expired			= $db_item->date_expired;
		$this->is_confirmed			= $db_item->is_confirmed;
		
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
		$db_item->price_per_point		= $this->price_per_point;
		$db_item->point_get				= $this->point_get;
		$db_item->event_name			= $this->event_name;
		$db_item->date_created			= $this->date_created;
		$db_item->date_expired			= $this->date_expired;
		$db_item->is_confirmed			= $this->is_confirmed;
		
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
		$stub->price_per_point		= $db_item->price_per_point;
		$stub->point_get			= $db_item->point_get;
		$stub->event_name			= $db_item->event_name;
		$stub->date_created			= $db_item->date_created;
		$stub->date_expired			= $db_item->date_expired;
		$stub->is_confirmed			= $db_item->is_confirmed;
		
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
		if(!$this->input->post('expire'))
			$this->date_expired			= $this->input->post('date_expired');

		//insert data, then generate [reward_id] based on [id]
		$this->db->trans_start(); // buat nge lock db transaction (biar kalo fail ke rollback)
		
		$db_item = $this->get_db_from_stub($this); // ambil database object dari model ini
		if ($this->db->insert($this->table_setting_reward, $db_item))
		{
			$this->load->library('Id_generator');
			
			$db_item->id				= $this->db->insert_id();
			$db_item->setting_reward_id	= $this->id_generator->generate(TYPE['name']['SETTING_REWARD'], $db_item->id);
			
			$this->db->where('id', $db_item->id);
			$this->db->update($this->table_setting_reward, $db_item);
		}
		
		$this->db->trans_complete(); // selesai nge lock db transaction
	}
	
	public function get_latest_setting_reward($is_confirmed=true) // kalau diabaikan, set null	
	{	
		$cur_date = date("Y-m-d H:i:s", time());
		
		$this->db->order_by("id", "DESC");
		
		$this->db->group_start();
			$this->db->where("date_expired > ", $cur_date);
			$this->db->or_where("date_expired is NULL");
		$this->db->group_end();
		
		if ($is_confirmed === true) {
			$this->db->where("is_confirmed", 1);
		}
		else if ($is_confirmed === false) {
			$this->db->where("is_confirmed", 0);
		}
		
		$query = $this->db->get($this->table_setting_reward, 1);
		$setting_reward = $query->row();
		
		return ($setting_reward !== null) ? $this->get_new_stub_from_db($setting_reward) : new Setting_reward_model();
	}
	
	public function count_registered_setting()
	{
		$this->db->select('
			COUNT(setting_reward.id) AS registered_setting
		');
		
		$where['setting_reward.is_confirmed'] = 0;
		
		$this->db->where($where);
		
		$this->db->group_by('setting_reward.id');
		$this->db->distinct();
		
		$query = $this->db->get($this->table_setting_reward, 1);
		
		$result = $query->row();
		
		return ($result != null) ? $result->registered_setting : 0;
	}
	
	public function set_is_confirmed($value=1)
	{
		$this->db->set('is_confirmed', 1);
		$this->db->where('id', $this->id);
		$this->db->update($this->table_setting_reward);
	}
	
	public function delete_from_id($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->table_setting_reward);
	}
}

?>