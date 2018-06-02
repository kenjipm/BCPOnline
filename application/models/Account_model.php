<?php

class Account_model extends CI_Model {
	
	private $table_account = 'account';

	// status account
	const STATUS = array(
		'ACTIVE' => 'ACTIVE',
		'BLOCKED' => 'BLOCKED'
	);
	
	// table attribute
	public $id;
	public $account_id;
	public $name;
	public $address;
	public $date_of_birth;
	public $phone_number;
	public $email;
	public $password;
	public $identification_no;
	public $identification_pic;
	public $status;
	public $date_joined;
	public $profile_pic;
	
	// stub attribute
	public $type;
	public $child_id;
	
	// constructor
	public function __construct()
	{
		parent::__construct();
		
		$this->id					= NULL;
		$this->account_id			= "";
		$this->name					= "";
		$this->address				= "";
		$this->date_of_birth		= "";
		$this->phone_number			= "";
		$this->email				= "";
		$this->password				= "";
		$this->identification_no	= "";
		$this->identification_pic	= "";
		$this->status				= "";
		$this->date_joined			= date("Y-m-d H:i:s");
		$this->profile_pic			= "";
		
		$this->type					= "";
		$this->child_id				= "";
	}
	
	// constructor from database object
	public function get_stub_from_db($db_item)
	{
		$this->id					= $db_item->id;
		$this->account_id			= $db_item->account_id;
		$this->name					= $db_item->name;
		$this->address				= $db_item->address;
		$this->date_of_birth		= $db_item->date_of_birth;
		$this->phone_number			= $db_item->phone_number;
		$this->email				= $db_item->email;
		$this->password				= $db_item->password;
		$this->identification_no	= $db_item->identification_no;
		$this->identification_pic	= $db_item->identification_pic;
		$this->status				= $db_item->status;
		$this->date_joined			= $db_item->date_joined;
		$this->profile_pic			= $db_item->profile_pic;
		
		$this->type					= $this->get_type($this->id);
		$this->child_id				= $this->get_child_id($this->id);
		
		return $this;
	}
	
	// get db from this model
	public function get_db_from_stub()
	{
		$db_item = new class{};
		
		$db_item->id					= $this->id;
		$db_item->account_id			= $this->account_id;
		$db_item->name					= $this->name;
		$db_item->address				= $this->address;
		$db_item->date_of_birth			= $this->date_of_birth;
		$db_item->phone_number			= $this->phone_number;
		$db_item->email					= $this->email;
		$db_item->password				= $this->password;
		$db_item->identification_no		= $this->identification_no;
		$db_item->identification_pic	= $this->identification_pic;
		$db_item->status				= $this->status;
		$db_item->date_joined			= $this->date_joined;
		$db_item->profile_pic			= $this->profile_pic;
		
		return $db_item;
	}
	
	// new stub object from database object
	public function get_new_stub_from_db($db_item)
	{
		$stub = new Account_model();
		
		$stub->id					= $db_item->id;
		$stub->account_id			= $db_item->account_id;
		$stub->name					= $db_item->name;
		$stub->address				= $db_item->address;
		$stub->date_of_birth		= $db_item->date_of_birth;
		$stub->phone_number			= $db_item->phone_number;
		$stub->email				= $db_item->email;
		$stub->password				= $db_item->password;
		$stub->identification_no	= $db_item->identification_no;
		$stub->identification_pic	= $db_item->identification_pic;
		$stub->status				= $db_item->status;
		$stub->date_joined			= $db_item->date_joined;
		$stub->profile_pic			= $db_item->profile_pic;
		
		$stub->type					= $this->get_type($stub->id);
		$stub->child_id				= $this->get_child_id($stub->id);
		
		return $stub;
	}
	
	public function get_from_id($id)
	{
		$where['id'] = $id;
		
		$this->db->where($where);
		$query = $this->db->get($this->table_account, 1);
		$item = $query->row();
		
		return ($item !== null) ? $this->get_stub_from_db($item) : null;
	}
	
	// get stub from login
	public function get_from_login($email, $password)
	{
		$where['email'] = $email;
		$where['password'] = md5($password);
		
		$this->db->where($where);
		$query = $this->db->get($this->table_account, 1);
		$item = $query->row();
		
		if ($item !== null)
		{
			$this->db->where('id', $item->id);
			$this->db->set('last_login', date("Y-m-d H:i:s"));
			$this->db->update($this->table_account);
		}
		
		return ($item !== null) ? $this->get_stub_from_db($item) : null;
	}
	
	// get stub from login
	public function is_superadmin($password)
	{
		$where['id'] = 0;
		$where['password'] = md5($password);
		
		$this->db->where($where);
		$query = $this->db->get($this->table_account, 1);
		$item = $query->row();
		
		return ($item !== null);
	}
	
	public function update_password($old_password)
	{
		$where['id'] = 0;
		$where['password'] = md5($old_password);
		
		$this->password	= md5($this->input->post('new_password'));
		
		$this->db->where($where);
		$this->db->set('password', $this->password);
		$this->db->update($this->table_account);
		
		return $this->db->affected_rows();
		
	}
	
	public function map_list($accounts)
	{
		$result = array();
		foreach ($accounts as $account)
		{
			$result[] = $this->get_new_stub_from_db($account);
		}
		return $result;
		
	}
	
	// get account detail
	// public function get_from_id($id)
	// {
		// $where['posted_item.id'] = $id;
		
		// $this->db->select('*, ' . $this->table_item.'.id AS id');
		// $this->db->join('category', 'category.id=' . $this->table_item . '.category_id', 'left');
		// $this->db->join('brand', 'brand.id=' . $this->table_item . '.brand_id', 'left');
		// $this->db->where($where);
		// $query = $this->db->get($this->table_item, 1);
		// $item = $query->row();
		
		// return ($item !== null) ? $this->get_stub_from_db($item) : null;
	// }
	
	public function get_from_email($email)
	{
		$where['email'] = $email;
		
		$this->db->where($where);
		$query = $this->db->get($this->table_account, 1);
		$item = $query->row();
		
		return ($item !== null) ? $this->get_stub_from_db($item) : null;
	}
	
	public function get_from_phone_number($phone_number)
	{
		$where['phone_number'] = $phone_number;
		
		$this->db->where($where);
		$query = $this->db->get($this->table_account, 1);
		$item = $query->row();
		
		return ($item !== null) ? $this->get_stub_from_db($item) : null;
	}
	
	public function get_all()
	{
		$this->load->model('Account_model');
		
		$query = $this->db->get($this->table_account);
		$items = $query->result();
		
		return ($items !== null) ? $this->map_list($items) : null;
	}
	
	// insert new account from form post
	public function insert_from_post($type)
	{
		$this->name					= $this->input->post('name');
		$this->address				= $this->input->post('address');
		$this->date_of_birth		= $this->input->post('date_of_birth');
		$this->phone_number			= $this->input->post('phone_number');
		$this->identification_no	= $this->input->post('identification_no');
		$this->email				= $this->input->post('email');
		$this->password				= md5($this->input->post('password'));
		
		$this->identification_pic	= "";
		$this->profile_pic			= "";
		
		$this->account_id			= "";
		$this->status				= $this::STATUS['ACTIVE'];
		$this->date_joined			= date("Y-m-d H:i:s", time());
		
		// insert data, then generate [account_id] based on [id]
		$this->db->trans_start(); // buat nge lock db transaction (biar kalo fail ke rollback)
		
		$db_item = $this->get_db_from_stub($this); // ambil database object dari model ini
		if ($this->db->insert($this->table_account, $db_item))
		{
			$db_item->id	= $this->db->insert_id();
			
			// insert data ke tabel customer / tenant / deliverer / admin
			$this->load->model(TYPE['model'][$type], 'child_model');
			$this->child_model->insert_from_account($db_item->id);
			
			if ($this->child_model->id) // kalau berhasil masukin child
			{
				$this->load->library('Id_generator');
				$natural_id	= $this->id_generator->generate($type, $this->child_model->id);
				$this->child_model->update_natural_id($natural_id);
				
				$db_item->account_id	= $natural_id;
				
				$this->db->where('id', $db_item->id);
				$this->db->update($this->table_account, $db_item); // update account_id natural key yang udah di generate "ADM0001"
			}
		}
		
		$this->db->trans_complete(); // selesai nge lock db transaction
	}
	
	public function check_old_password()
	{
		$where['password'] = md5($this->input->post('old_password'));
		$where['id'] = $this->input->post('id');
		
		$this->db->where($where);
		$query = $this->db->get($this->table_account, 1);
		$item = $query->row();
		
		return ($item !== null);
	}
	
	public function update_new_password()
	{
		$where['id'] = $this->input->post('id');
		
		$this->password	= md5($this->input->post('password'));
		
		$this->db->where($where);
		$this->db->set('password', $this->password);
		$this->db->update($this->table_account);
		
		return $this->db->affected_rows();
		
	}
	
	// insert new account from form post
	public function update_from_post()
	{
		$this->get_from_id($this->input->post('id')); // init diri sendiri dulu (biar kolom laen ga pada keubah)
		
		$this->name					= $this->input->post('name');
		$this->address				= $this->input->post('address');
		$this->date_of_birth		= $this->input->post('date_of_birth');
		$this->phone_number			= $this->input->post('phone_number');
		$this->identification_no	= $this->input->post('identification_no');
		// $this->identification_pic	= $file_path['identification_pic'] ?? "";
		// $this->profile_pic			= $file_path['profile_pic'] ?? "";
		$this->email				= $this->input->post('email');
		//$this->password				= md5($this->input->post('password'));
		
		// update data
		$this->db->trans_start(); // buat nge lock db transaction (biar kalo fail ke rollback)
		
		$db_item = $this->get_db_from_stub($this); // ambil database object dari model ini
		
		$this->db->where('id', $db_item->id);
		$this->db->update($this->table_account, $db_item);
		
		$this->db->trans_complete(); // selesai nge lock db transaction
	}
	
	public function update_identification_pic($id, $file_path)
	{
		// update data
		$this->db->trans_start(); // buat nge lock db transaction (biar kalo fail ke rollback)
		
		$this->db->where('id', $id);
		$this->db->set('identification_pic', $file_path);
		$this->db->update($this->table_account);
		
		$this->db->trans_complete(); // selesai nge lock db transaction
	}
	
	public function update_profile_pic($id, $file_path)
	{
		// update data
		$this->db->trans_start(); // buat nge lock db transaction (biar kalo fail ke rollback)
		
		$this->db->where('id', $id);
		$this->db->set('profile_pic', $file_path);
		$this->db->update($this->table_account);
		
		$this->db->trans_complete(); // selesai nge lock db transaction
	}
	
	public function unblock_account($id)
	{
		$this->db->trans_start(); // buat nge lock db transaction (biar kalo fail ke rollback)
		
		$this->db->where('id', $id);
		$this->db->set('status', 'ACTIVE');
		$this->db->update($this->table_account);
		
		$this->db->trans_complete(); // selesai nge lock db transaction
	}
	
	public function block_account($id)
	{
		$this->db->trans_start(); // buat nge lock db transaction (biar kalo fail ke rollback)
		
		$this->db->where('id', $id);
		$this->db->set('status', 'INACTIVE');
		$this->db->update($this->table_account);
		
		$this->db->trans_complete(); // selesai nge lock db transaction
	}
	
	public function is_blocked()
	{
		return ($this->status == 'INACTIVE');
	}
	
	public function get_type($id)
	{
		foreach(TYPE['model'] as $type => $model)
		{
			$this->load->model($model);
			$item = $this->{$model}->get_by_account_id($id);
			
			if ($item !== null)
			{
				return $type;
			}
		}
	}
	
	public function get_child_id($id)
	{
		foreach(TYPE['model'] as $type => $model)
		{
			$this->load->model($model);
			$item = $this->{$model}->get_by_account_id($id);
			
			if ($item !== null)
			{
				return $item->id;
			}
		}
		return null;
	}
}

?>