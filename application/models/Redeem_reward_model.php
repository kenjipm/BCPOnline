<?php

class Redeem_reward_model extends CI_Model {
	
	private $table_redeem_reward = 'redeem_reward';
	
	// table attribute
	public $id;
	public $redeem_id;
	public $redeem_reward_id;
	public $customer_id;
	public $date_redeemed;
	public $status;
	
	// relation table
	public $reward;
	
	// constructor
	public function __construct()
	{
		parent::__construct();
		
		$this->id					= NULL;
		$this->redeem_id			= "";
		$this->reward_id			= "";
		$this->customer_id			= "";
		$this->date_redeemed		= "";
		$this->status				= "";
		
		$this->load->model('reward_model');
		$this->reward = new reward_model();
	}
	
	// constructor from database object
	public function get_stub_from_db($db_item)
	{
		$this->id					= $db_item->id;
		$this->redeem_id			= $db_item->redeem_id;
		$this->reward_id			= $db_item->reward_id;
		$this->customer_id			= $db_item->customer_id;
		$this->date_redeemed		= $db_item->date_redeemed;
		$this->status				= $db_item->status;
		
		return $this;
	}
	
	// get db from this model
	public function get_db_from_stub()
	{
		$db_item = new class{};
		
		$db_item->id				= $this->id;
		$db_item->redeem_id			= $this->redeem_id;
		$db_item->reward_id			= $this->reward_id;
		$db_item->customer_id		= $this->customer_id;
		$db_item->date_redeemed		= $this->date_redeemed;
		$db_item->status			= $this->status;
		
		return $db_item;
	}
	
	// new stub object from database object
	public function get_new_stub_from_db($db_item)
	{
		$stub = new Redeem_reward_model();
		
		$stub->id					= $db_item->id;
		$stub->redeem_id			= $db_item->redeem_id;
		$stub->reward_id			= $db_item->reward_id;
		$stub->customer_id			= $db_item->customer_id;
		$stub->date_redeemed		= $db_item->date_redeemed;
		$stub->status				= $db_item->status;
		
		$stub->customer				= new Customer_model();
		$stub->customer->account	= new Account_model();
		$stub->customer->account->name	= $db_item->name ?? "";
		$stub->customer->account->phone_number	= $db_item->phone_number ?? "";
		
		return $stub;
	}
	
	public function map_list($redeem_rewards)
	{
		$result = array();
		foreach ($redeem_rewards as $redeem_reward)
		{
			$result[] = $this->get_new_stub_from_db($redeem_reward);
		}
		return $result;
	}
	
	// get reward detail
	public function get_from_id($id)
	{
		$where['id'] = $id;
		
		$this->db->where($where);
		$query = $this->db->get($this->table_redeem_reward, 1);
		$redeem_reward = $query->row();
		
		return ($redeem_reward !== null) ? $this->get_stub_from_db($redeem_reward) : null;
	}
	
	public function get_redeem_from_reward_id($reward_id)
	{
		$where['reward_id'] = $reward_id;
		
		$this->db->select('*, ' . $this->table_redeem_reward.'.id AS id,' . $this->table_redeem_reward.'.status AS status, ' . 'account.id AS account_id');
		$this->db->where($where);
		$this->db->join('customer', 'customer.id=redeem_reward.customer_id', 'left');
		$this->db->join('account', 'account.id=customer.account_id', 'left');
		$query = $this->db
					->order_by('redeem_reward.date_redeemed', 'DESC')
					->get($this->table_redeem_reward);
		$items = $query->result();
		
		return ($items !== null) ? $this->map_list($items) : array();
	}
	
	public function confirm_redeem_reward($redeem_reward_id)
	{
		$this->db->set('status', 'DONE')
				 ->where('id', $redeem_reward_id)
				 ->update($this->table_redeem_reward);
	}
	
	public function get_all()
	{
		$where['customer_id'] = $this->session->child_id;
		
		$this->db->where($where);
		$query = $this->db->get($this->table_redeem_reward);
		$redeem_rewards = $query->result();
		
		return ($redeem_rewards !== null) ? $this->map_list($redeem_rewards) : array();
	}
	
	public function insert($reward_id, $customer_id)
	{
		$this->load->config('statuses');
		$redeem_reward_status = $this->config->item('REDEEM_REWARD');
		
		$this->reward_id		= $reward_id;
		$this->customer_id		= $customer_id;
		$this->date_redeemed	= date("Y-m-d H:i:s", time());
		$this->status			= $redeem_reward_status['name']['PENDING'];
		
		$this->db->trans_start();
		
			$item = $this->get_db_from_stub();
			if ($this->db->insert($this->table_redeem_reward, $item))
			{
				$this->id	= $this->db->insert_id();
			
				$this->update_natural_id();
			}
		
		$this->db->trans_complete();
	}
	
	public function update_natural_id()
	{
		$this->load->library('id_generator');
		$this->redeem_id = $this->id_generator->generate(TYPE['name']['REDEEM_REWARD'], $this->id);
		
		$this->db->set('redeem_id', $this->redeem_id)
				 ->where('id', $this->id)
				 ->update($this->table_redeem_reward);
	}
	
	public function init_reward()
	{
		$this->reward = $this->reward->get_from_id($this->reward_id);
		return $this->reward;
	}
}

?>