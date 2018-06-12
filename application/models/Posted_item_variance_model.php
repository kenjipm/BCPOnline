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
		$this->image_two_name		= DEFAULT_ITEM_IMAGE;
		$this->image_three_name		= DEFAULT_ITEM_IMAGE;
		$this->image_four_name		= DEFAULT_ITEM_IMAGE;
		$this->posted_item_id		= 0;

		$this->load->model('item_model');
		$this->posted_item			= new Item_model();
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
		return ($items !== null) ? $this->map_list($items) : array();
	}

	
	// insert new variance from form post
	public function insert_from_post($posted_item_id)
	{
		$this->load->model('Tenant_model');
		$cur_tenant = $this->Tenant_model->get_by_account_id($this->session->userdata('id'));
		$item_type = $this->input->post('item_type');
		
		$this->detail_id			= "";
		$this->posted_item_id		= $posted_item_id;
		$this->init_posted_item();
		
		if ($item_type == "ORDER")
		{
			$this->var_type				= $this->input->post('var_type');
			$files = $_FILES;
			
			$temp_var_descriptions	= $this->input->post('var_desc');
			$i = 0;
			foreach($temp_var_descriptions as $temp_var_description)
			{
				$this->id 				= 0;
				$this->detail_id 		= 0;
				$this->var_description 		= $temp_var_description;
				$this->quantity_available	= $this->input->post('quantity_available')[$i];
				
				$_FILES['image_two_name']['name']		= $files['image_two_name']['name'][$i];
				$_FILES['image_two_name']['type']		= $files['image_two_name']['type'][$i];
				$_FILES['image_two_name']['tmp_name']	= $files['image_two_name']['tmp_name'][$i];
				$_FILES['image_two_name']['error']		= $files['image_two_name']['error'][$i];
				$_FILES['image_two_name']['size']		= $files['image_two_name']['size'][$i];
				
				$_FILES['image_three_name']['name']		= $files['image_three_name']['name'][$i];
				$_FILES['image_three_name']['type']		= $files['image_three_name']['type'][$i];
				$_FILES['image_three_name']['tmp_name']	= $files['image_three_name']['tmp_name'][$i];
				$_FILES['image_three_name']['error']	= $files['image_three_name']['error'][$i];
				$_FILES['image_three_name']['size']		= $files['image_three_name']['size'][$i];
				
				$_FILES['image_four_name']['name']		= $files['image_four_name']['name'][$i];
				$_FILES['image_four_name']['type']		= $files['image_four_name']['type'][$i];
				$_FILES['image_four_name']['tmp_name']	= $files['image_four_name']['tmp_name'][$i];
				$_FILES['image_four_name']['error']		= $files['image_four_name']['error'][$i];
				$_FILES['image_four_name']['size']		= $files['image_four_name']['size'][$i];
				
					// insert data, then generate [account_id] based on [id]
				$this->db->trans_start(); // buat nge lock db transaction (biar kalo fail ke rollback)
				
				$db_item = $this->get_db_from_stub($this); // ambil database object dari model ini
				if ($this->db->insert($this->table_posted_item_variance, $db_item))
				{
					$this->load->library('Id_generator');
					
					$this->id			= $this->db->insert_id();
					$this->detail_id	= $this->id_generator->generate(TYPE['name']['POSTED_ITEM_VARIANCE'], $this->id);
					
					$db_item = $this->get_db_from_stub($this); // ambil database object dari model ini
					$this->db->where('id', $db_item->id);
					$this->db->update($this->table_posted_item_variance, $db_item);
				}
				
				$this->upload_image($db_item->id, $i);
				
				$this->db->trans_complete(); // selesai nge lock db transaction
				$i++;
			}
		}
		else if ($item_type == "REPAIR")
		{
			$this->db->trans_start(); // buat nge lock db transaction (biar kalo fail ke rollback)
			$this->quantity_available	= 100;
			$db_item = $this->get_db_from_stub($this); // ambil database object dari model ini
			if ($this->db->insert($this->table_posted_item_variance, $db_item))
			{
				$this->load->library('Id_generator');
				
				$db_item->id			= $this->db->insert_id();
				$db_item->detail_id		= $this->id_generator->generate(TYPE['name']['POSTED_ITEM_VARIANCE'], $db_item->id);
				
				$this->db->where('id', $db_item->id);
				$this->db->update($this->table_posted_item_variance, $db_item);
			}
			
			$this->db->trans_complete();
		}
		else // BID
		{
			$this->var_type				= $this->input->post('posted_item_variance_name');
			$this->var_description		= $this->input->post('posted_item_variance_description');
			$this->quantity_available	= 1;
			$this->db->trans_start(); // buat nge lock db transaction (biar kalo fail ke rollback)
				
			$db_item = $this->get_db_from_stub($this); // ambil database object dari model ini
			if ($this->db->insert($this->table_posted_item_variance, $db_item))
			{
				$this->load->library('Id_generator');
				
				$db_item->id			= $this->db->insert_id();
				$db_item->detail_id		= $this->id_generator->generate(TYPE['name']['POSTED_ITEM_VARIANCE'], $db_item->id);
				
				$this->db->where('id', $db_item->id);
				$this->db->update($this->table_posted_item_variance, $db_item);
			}
			
			$this->db->trans_complete();
		}
	}
	
	public function update_from_post($posted_item_id)
	{
		$this->load->model('Tenant_model');
		$cur_tenant = $this->Tenant_model->get_by_account_id($this->session->userdata('id'));
		$item_type = $this->input->post('item_type');
		
		$this->detail_id			= "";
		$this->posted_item_id		= $posted_item_id;
		$this->init_posted_item();
		
		if ($item_type == "ORDER")
		{
			$this->var_type				= $this->input->post('var_type');
			$files = $_FILES;
			
			$temp_var_descriptions	= $this->input->post('var_desc');
			$i = 0;
			
			foreach($temp_var_descriptions as $temp_var_description)
			{
				$this->id 					= $this->input->post('var_id')[$i];
				$this->var_description 		= $temp_var_description;
				$this->quantity_available	= $this->input->post('quantity_available')[$i];
				
				$_FILES['image_two_name']['name']		= $files['image_two_name']['name'][$i];
				$_FILES['image_two_name']['type']		= $files['image_two_name']['type'][$i];
				$_FILES['image_two_name']['tmp_name']	= $files['image_two_name']['tmp_name'][$i];
				$_FILES['image_two_name']['error']		= $files['image_two_name']['error'][$i];
				$_FILES['image_two_name']['size']		= $files['image_two_name']['size'][$i];
				
				$_FILES['image_three_name']['name']		= $files['image_three_name']['name'][$i];
				$_FILES['image_three_name']['type']		= $files['image_three_name']['type'][$i];
				$_FILES['image_three_name']['tmp_name']	= $files['image_three_name']['tmp_name'][$i];
				$_FILES['image_three_name']['error']	= $files['image_three_name']['error'][$i];
				$_FILES['image_three_name']['size']		= $files['image_three_name']['size'][$i];
				
				$_FILES['image_four_name']['name']		= $files['image_four_name']['name'][$i];
				$_FILES['image_four_name']['type']		= $files['image_four_name']['type'][$i];
				$_FILES['image_four_name']['tmp_name']	= $files['image_four_name']['tmp_name'][$i];
				$_FILES['image_four_name']['error']		= $files['image_four_name']['error'][$i];
				$_FILES['image_four_name']['size']		= $files['image_four_name']['size'][$i];
				
					// insert data, then generate [account_id] based on [id]
				$this->load->library('Id_generator');
				$this->db->trans_start(); // buat nge lock db transaction (biar kalo fail ke rollback)
				
				$db_item = $this->get_db_from_stub($this); // ambil database object dari model ini
				$db_item->detail_id		= $this->id_generator->generate(TYPE['name']['POSTED_ITEM_VARIANCE'], $db_item->id);
				
				$this->db->where('id', $db_item->id);
				$this->db->update($this->table_posted_item_variance, $db_item);
				
				$this->upload_image($db_item->id, $i);
				
				$this->db->trans_complete(); // selesai nge lock db transaction
				$i++;
			}
		}
	}
	
	public function upload_image($id, $index)
	{
		$data['error'] = array();
		$file_path = array();
		$this->load->config('upload');
		
		$config_upload_image = $this->config->item('upload_image');
		$config_upload_image['upload_path'] .= $this->session->account_id."/".$this->posted_item->posted_item_id."/";
		$this->load->library('upload', $config_upload_image);
		
		$config_compress_image = $this->config->item('compress_image_variance');
		$this->load->library('image_lib');
		
		if ($_FILES['image_two_name']['name'])
		{
			$config_upload_image['file_name'] = $index."-1.jpg";
			$this->upload->initialize($config_upload_image);
			if (!is_dir($config_upload_image['upload_path'])) {
				mkdir($config_upload_image['upload_path'], 0777, true);
			}
			if (!$this->upload->do_upload('image_two_name'))
			{
				print_r($id . $index . "2");
				$data['error'] = $this->upload->display_errors('', '');
			}
			else 
			{
				$file_path['image_two_name'] = $config_upload_image['upload_path'].$this->upload->data('file_name');
				
				$config_compress_image['source_image'] = $file_path['image_two_name'];
				$this->image_lib->initialize($config_compress_image);
				if (!$this->image_lib->resize())
				{
					$data['error'] = $this->image_lib->display_errors();
				}
			}
		}
		
		if ($_FILES['image_three_name']['name'])
		{
			$config_upload_image['file_name'] = $index."-2.jpg";
			$this->upload->initialize($config_upload_image);
			if (!is_dir($config_upload_image['upload_path'])) {
				mkdir($config_upload_image['upload_path'], 0777, true);
			}
			if (!$this->upload->do_upload('image_three_name'))
			{
				print_r($id . $index . "3");
				$data['error'] = $this->upload->display_errors('', '');
			}
			else
			{
				$file_path['image_three_name'] = $config_upload_image['upload_path'].$this->upload->data('file_name');
				
				$config_compress_image['source_image'] = $file_path['image_three_name'];
				$this->image_lib->initialize($config_compress_image);
				if (!$this->image_lib->resize())
				{
					$data['error'] = $this->image_lib->display_errors();
				}
			}
		}
		
		if ($_FILES['image_four_name']['name'])
		{
			$config_upload_image['file_name'] = $index."-3.jpg";
			$this->upload->initialize($config_upload_image);
			if (!is_dir($config_upload_image['upload_path'])) {
				mkdir($config_upload_image['upload_path'], 0777, true);
			}
			if (!$this->upload->do_upload('image_four_name'))
			{
				print_r($id . $index . "4");
				$data['error'] = $this->upload->display_errors('', '');
			}
			else
			{
				$file_path['image_four_name'] = $config_upload_image['upload_path'].$this->upload->data('file_name');
				
				$config_compress_image['source_image'] = $file_path['image_four_name'];
				$this->image_lib->initialize($config_compress_image);
				if (!$this->image_lib->resize())
				{
					$data['error'] = $this->image_lib->display_errors();
				}
			}
		}
		
		if (count($data['error']) == 0)
		{
			if (isset($file_path['image_two_name'])) $this->db->set('image_two_name', $file_path['image_two_name']);
			if (isset($file_path['image_three_name'])) $this->db->set('image_three_name', $file_path['image_three_name']);
			if (isset($file_path['image_four_name'])) $this->db->set('image_four_name', $file_path['image_four_name']);
			
			if (isset($file_path['image_two_name']) || isset($file_path['image_three_name']) || isset($file_path['image_four_name']))
			{
				$this->db->where('id', $id);
				$this->db->update($this->table_posted_item_variance);
			}
		}
	}
	
	public function get_all_from_posted_item_id($posted_item_id)
	{
		$where['posted_item_id'] = $posted_item_id;

		$this->db->where($where);
		$query = $this->db->get($this->table_posted_item_variance);
		$items = $query->result();

		return ($items !== null) ? $this->map_list($items) : array();
	}
	
	public function quantity_sub_from_cart($cart)
	{
		foreach ($cart as $id => $cart_item)
		{
			$this->db->where('id', $id);
			$this->db->set('quantity_available', 'quantity_available - ' . $cart_item['quantity'], false);
			$this->db->update($this->table_posted_item_variance);
		}
		
		return $this;
	}
	
	public function quantity_sub($count)
	{
		$this->db->where('id', $this->id);
		$this->db->set('quantity_available', 'quantity_available - ' . $count, false);
		$this->db->update($this->table_posted_item_variance);
		
		return $this;
	}
	
	public function init_posted_item()
	{
		$this->posted_item = $this->posted_item->get_from_id($this->posted_item_id);
		return $this->posted_item;
	}
}

?>