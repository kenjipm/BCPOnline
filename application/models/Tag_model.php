<?php

class Tag_model extends CI_Model {
	
	private $table_tag = 'tag';
	
	// table attribute
	public $id;
	public $tag_name;
	public $date_of_initial_used;
	
	// constructor
	public function __construct()
	{
		parent::__construct();
		
		$this->id					= NULL;
		$this->tag_name				= "";
		$this->date_of_initial_used	= "";
		
	}
	
	// constructor from database object
	public function get_stub_from_db($db_item)
	{
		$this->id					= $db_item->id;
		$this->tag_name				= $db_item->tag_name;
		$this->date_of_initial_used	= $db_item->date_of_initial_used;
		
		return $this;
	}
	
	// get db from this model
	public function get_db_from_stub()
	{
		$db_item = new class{};
		
		$db_item->id					= $this->id;
		$db_item->tag_name				= $this->tag_name;
		$db_item->date_of_initial_used	= $this->date_of_initial_used;
		
		return $db_item;
	}
	
	// new stub object from database object
	public function get_new_stub_from_db($db_item)
	{
		$stub = new Tag_model();
		
		$stub->id					= $db_item->id;
		$stub->tag_name				= $db_item->tag_name;
		$stub->date_of_initial_used	= $db_item->date_of_initial_used;
		
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
	
	// get tag detail
	public function get_from_id($id)
	{
		$where['id'] = $id;
		
		$this->db->where($where);
		$query = $this->db->get($this->table_tag, 1);
		$tag = $query->row();
		
		return ($tag !== null) ? $this->get_stub_from_db($tag) : null;
	}
	
	public function get_all()
	{
		$query = $this->db->get($this->table_tag);
		$items = $query->result();
		
		return ($items !== null) ? $this->map_list($items) : array();
	}
	
	// insert new account from form post
	public function insert_from_post($posted_item_id)
	{
		$this->load->model('Tag_model');
		$this->load->model('Item_tag_model');
		
		$this->date_of_initial_used	= date("Y-m-d H:i:s");
		$tag_lists = $this->Tag_model->get_all();
		$tags = explode("#", $this->input->post('posted_item_description'));
		$i = 0;
		if (count($tags) > 0){
			unset($tags[0]);
			foreach ($tags as $tag)
			{
				$tag_name[$i] = explode(" ", $tag);
				$is_same = false;
				foreach($tag_lists as $tag_list)
				{
					if ($tag_name[$i][0] == $tag_list->tag_name)
					{
						$is_same = true;
						$this->Item_tag_model->insert_from_post($posted_item_id, $tag_list->id);
						break;
					}
				}
				if ($is_same == false)
				{
					$this->tag_name	= $tag_name[$i][0];
					$this->db->trans_start(); // buat nge lock db transaction (biar kalo fail ke rollback)
					
					$db_item = $this->get_db_from_stub($this); // ambil database object dari model ini
					if ($this->db->insert($this->table_tag, $db_item))
					{	
						$db_item->id = $this->db->insert_id();
						
						$this->db->where('id', $db_item->id);
						$this->db->update($this->table_tag, $db_item);
					}
					
					$this->tag_id = $db_item->id;
					$this->Item_tag_model->insert_from_post($posted_item_id, $this->tag_id);
					$this->db->trans_complete(); // selesai nge lock db transaction
				}
				$i++;
				
			}
		}
		
		
	}
	/*
	public function get_type()
	{
		$this->db->where('account_id', $this->id);
		foreach($this::TYPE_MODEL as $type => $model)
		{
			$this->load->model($model);
			$item = $this->{$model}->get_by_account_id($this->id);
			
			if ($item !== null)
			{
				return $type;
			}
		}
	}
	*/
}

?>