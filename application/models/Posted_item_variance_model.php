<?php

class Posted_item_variance_model extends CI_Model {

	private $table_posted_item_variance = 'posted_item_variance';

	// table attribute
	public $id;
	public $detail_id;
	public $var_type;
	public $var_description;
	public $quantity_available;
	public $image_two_name;
	public $image_three_name;
	public $image_four_name;
	public $posted_item_id;

	// relation table
	public $posted_item;

	// constructor
	public function __construct()
	{
		parent::__construct();

		$this->id					= 0;
		$this->detail_id			= 0;
		$this->var_type				= "";
		$this->var_description		= "";
		$this->quantity_available	= 0;
		$this->image_two_name		= "";
		$this->image_three_name		= "";
		$this->image_four_name		= "";
		$this->posted_item_id		= 0;

		$this->posted_item			= $this->load->model('item_model');
	}

	// constructor from database object
	public function get_stub_from_db($db_item)
	{
		$this->id					= $db_item->id;
		$this->detail_id			= $db_item->detail_id;
		$this->var_type				= $db_item->var_type;
		$this->var_description		= $db_item->var_description;
		$this->quantity_available	= $db_item->quantity_available;
		$this->image_two_name		= $db_item->image_two_name;
		$this->image_three_name		= $db_item->image_three_name;
		$this->image_four_name		= $db_item->image_four_name;
		$this->posted_item_id		= $db_item->posted_item_id;

		return $this;
	}

	// get db from this model
	public function get_db_from_stub()
	{
		$db_item = new class{};

		$db_item->id					= $this->id;
		$db_item->detail_id				= $this->detail_id;
		$db_item->var_type				= $this->var_type;
		$db_item->var_description		= $this->var_description;
		$db_item->quantity_available	= $this->quantity_available;
		$db_item->image_two_name		= $this->image_two_name;
		$db_item->image_three_name		= $this->image_three_name;
		$db_item->image_four_name		= $this->image_four_name;
		$db_item->posted_item_id		= $this->posted_item_id;

		return $db_item;
	}

	// new stub object from database object
	public function get_new_stub_from_db($db_item)
	{
		$stub = new Posted_item_variance_model();
		
		$stub->id					= $db_item->id;
		$stub->detail_id			= $db_item->detail_id;
		$stub->var_type				= $db_item->var_type;
		$stub->var_description		= $db_item->var_description;
		$stub->quantity_available	= $db_item->quantity_available;
		$stub->image_two_name		= $db_item->image_two_name;
		$stub->image_three_name		= $db_item->image_three_name;
		$stub->image_four_name		= $db_item->image_four_name;
		$stub->posted_item_id		= $db_item->posted_item_id;

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
		$query = $this->db->get($this->table_posted_item_variance, 1);
		$item = $query->row();

		return ($item !== null) ? $this->get_stub_from_db($item) : null;
	}

	public function get_all($posted_item_id)
	{
		$this->db->where('posted_item_id', $posted_item_id);
		$query = $this->db->get($this->table_posted_item_variance);
		$items = $query->result();
		return ($items !== null) ? $this->map_list($items) : null;
	}

	
	// insert new variance from form post
	public function insert_from_post($posted_item_id)
	{
		$this->load->model('Tenant_model');
		$cur_tenant = $this->Tenant_model->get_by_account_id($this->session->userdata('id'));
		
		$this->detail_id			= "";
		$this->var_type				= $this->input->post('var_type');
		$this->posted_item_id		= $posted_item_id;
	
		$temp_var_descriptions	= $this->input->post('var_desc');
		$i = 0;
		foreach($temp_var_descriptions as $temp_var_description)
		{
			$this->var_description 		= $temp_var_description;
			$this->quantity_available	= $this->input->post('quantity_available')[$i];
			$this->image_two_name		= $this->input->post('image_two_name')[$i];
			$this->image_three_name		= $this->input->post('image_three_name')[$i];
			$this->image_four_name		= $this->input->post('image_four_name')[$i];
			
				// insert data, then generate [account_id] based on [id]
			$this->db->trans_start(); // buat nge lock db transaction (biar kalo fail ke rollback)
			
			$db_item = $this->get_db_from_stub($this); // ambil database object dari model ini
			if ($this->db->insert($this->table_posted_item_variance, $db_item))
			{
				$this->load->library('Id_Generator');
				
				$db_item->id		= $this->db->insert_id();
				$db_item->detail_id	= $this->id_generator->generate(TYPE['name']['POSTED_ITEM_VARIANCE'], $db_item->id);
				
				$this->db->where('id', $db_item->id);
				$this->db->update($this->table_posted_item_variance, $db_item);
			}
			
			$this->db->trans_complete(); // selesai nge lock db transaction
			$i++;
		}
		
	}
	
	public function get_all_from_posted_item_id($posted_item_id)
	{
		$where['posted_item_id'] = $posted_item_id;

		$this->db->where($where);
		$query = $this->db->get($this->table_posted_item_variance);
		$items = $query->result();

		return ($items !== null) ? $this->map_list($items) : null;
	}
	
	public function init_posted_item()
	{
		$this->posted_item = $this->posted_item->get_from_id($this->posted_item_id);
		return $this->posted_item;
	}
}

?>