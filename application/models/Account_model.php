<?php

class Account_model extends CI_Model {
	
	private $table_account = 'account';
	// private $table_customer = 'customer';
	// private $table_tenant = 'tenant';
	// private $table_deliverer = 'deliverer';
	// private $table_admin = 'admin';

	const STATUS = array(
		'ACTIVE' => 'ACTIVE',
		'BLOCKED' => 'BLOCKED'
	);

	const TYPE = array(
		'CUSTOMER' => 'CUSTOMER',
		'TENANT' => 'TENANT',
		'DELIVERER' => 'DELIVERER',
		'ADMIN' => 'ADMIN'
	);

	const TYPE_MODEL = array(
		'CUSTOMER' => 'Customer_model',
		'TENANT' => 'Tenant_model',
		'DELIVERER' => 'Deliverer_model',
		'ADMIN' => 'Admin_model'
	);
	
	public $id;
	public $account_id;
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
	
	// constructor
	public function Get_stub_from_db($db_item)
	{
		$this->id					= $db_item->id;
		$this->account_id			= $db_item->account_id;
		$this->address				= $db_item->address;
		$this->date_of_birth		= $db_item->date_of_birth;
		$this->phone_number			= $db_item->phone_number;
		$this->password				= $db_item->password;
		$this->identification_no	= $db_item->identification_no;
		$this->identification_pic	= $db_item->identification_pic;
		$this->status				= $db_item->status;
		$this->date_joined			= $db_item->date_joined;
		$this->profile_pic			= $db_item->profile_pic;
		
		return $this;
	}
	
	public function get_from_login($email, $password)
	{
		$where['email'] = $email;
		$where['password'] = $password;
		
		$this->db->where($where);
		$query = $this->db->get($this->table_account, 1);
		$item = $query->row();
		
		return ($item !== null) ? $this->Get_stub_from_db($item) : null;
	}
	
	// insert new account from form post
	public function insert_from_post($type)
	{
		$this->name					= $this->input->post('name');
		$this->address				= $this->input->post('address');
		$this->date_of_birth		= $this->input->post('date_of_birth');
		$this->phone_number			= $this->input->post('phone_number');
		$this->identification_no	= $this->input->post('identification_no');
		$this->identification_pic	= $this->input->post('identification_pic');
		$this->profile_pic			= $this->input->post('profile_pic');
		$this->email				= $this->input->post('email');
		$this->password				= $this->input->post('password');
		$this->account_id			= "";
		
		$this->status				= $this::STATUS['ACTIVE'];
		$this->date_joined			= time();
		
		// insert data, then generate [account_id] based on [id]
		$this->db->trans_start();
		
		if ($this->db->insert($this->table_account, $this))
		{
			$this->load->library('Id_Generator');
			
			$this->id			= $this->db->insert_id();
			$this->account_id	= $this->id_generator->generate($type, $this->id);
			
			$this->db->where('id', $this->id);
			if ($this->db->update($this->table_account, $this))
			{
				// insert data ke tabel customer / tenant / deliverer / admin
				$this->load->model($this::TYPE_MODEL[$type], 'child_model');
				$this->child_model->insert($this->id, $this->account_id);
			}
		}
		
		$this->db->trans_complete();
	}
	
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
}

?>