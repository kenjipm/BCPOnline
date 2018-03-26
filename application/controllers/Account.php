<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

	public function index()
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array();
		$this->load->view('header', $data_header);
		
		// Load Body
		$data['model'] = new class{};
		$this->load->view('', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
	
	public function signup()
	{
		// kalau signup account baru
		if ($this->input->method() == "post") $this->signup_do();
		
		// Load Header
        $data_header['css_list'] = array('jquery-ui-1.12.1.custom/jquery-ui.min');
        $data_header['js_list'] = array('signup_main', 'jquery-ui-1.12.1.custom/jquery-ui.min');
		$this->load->view('header', $data_header);
		
		// Load Body
		$data['model'] = new class{};
		$this->load->view('signup_main', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
	
	public function signup_success()
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array();
		$this->load->view('header', $data_header);
		
		// Load Body
		$data['model'] = new class{};
		$this->load->view('signup_success', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
	
	// Admin View
	public function account_list()
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array();
		$this->load->view('header', $data_header);
		
		// Load Body
		$this->load->model('Account_model');
		$this->load->model('Tenant_model');
		$this->load->model('Customer_model');
		$this->load->model('Deliverer_model');
		$tenants = $this->Tenant_model->get_all();
		$customers = $this->Customer_model->get_all();
		$deliverers = $this->Deliverer_model->get_all();
		$this->load->model('views/admin/account_list_view_model');
		$this->account_list_view_model->get($tenants, $customers, $deliverers);
		$data['model'] = $this->account_list_view_model;
		
		$this->load->view('admin/account_list', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
	
	public function account_detail($id)
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array();
		$this->load->view('header', $data_header);
		
		// Load Body
		$this->load->model('Account_model');
		$account = $this->Account_model->get_from_id($id);
		$this->load->model('views/admin/account_detail_view_model');
		$this->account_detail_view_model->get($account);
		$data['model'] = $this->account_detail_view_model;
		
		$this->load->view('admin/account_detail', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
	
	public function create_tenant()
	{
		// kalau signup account baru
		if ($this->input->method() == "post") $this->create_tenant_do();
		
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array();
		$this->load->view('header', $data_header);
		
		// Load Body
		$data['model'] = new class{};
		$this->load->view('admin/create_tenant', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
	
	public function create_deliverer()
	{
		// kalau signup account baru
		if ($this->input->method() == "post") $this->create_deliverer_do();
		
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array();
		$this->load->view('header', $data_header);
		
		// Load Body
		$data['model'] = new class{};
		$this->load->view('admin/create_deliverer', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
	
	public function signup_do()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Nama', 'required');
		$this->form_validation->set_rules('address', 'Alamat', 'required');
		$this->form_validation->set_rules('date_of_birth', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('phone_number', 'No HP', 'required|is_unique[account.phone_number]');
		
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[account.email]');
		$this->form_validation->set_rules('password', 'Password',
			array(
				'required',
				'regex_match[/^.*((?=.*\d)(?=.*[a-zA-Z])|(?=.*[a-zA-Z])(?=.*[-!$%^&*()_+|~=`{}\[\]:";\'<>?,.\/])|(?=.*[-!$%^&*()_+|~=`{}\[\]:";\'<>?,.\/])(?=.*\d)).*$/]'
			),
			array(
				'regex_match'      => '%s harus mengandung dua variasi (huruf, angka, simbol)',
			));
		$this->form_validation->set_rules('passconf', 'Pengulangan Password', 'trim|required|matches[password]');
		
		if ($this->form_validation->run() == TRUE)
		{
			$this->load->model('Account_model');
			
			$this->Account_model->insert_from_post(TYPE['name']['CUSTOMER']);
			
			redirect('account/signup_success');
		}
	}
	
	public function create_tenant_do()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('tenant_name', 'Nama Tenant', 'required');
		$this->form_validation->set_rules('unit_number', 'Nomor Unit', 'required');
		$this->form_validation->set_rules('floor', 'Nomor Lantai', 'required');
		$this->form_validation->set_rules('bank_account', 'Nomor Rekening', 'required');
		$this->form_validation->set_rules('selling_category', 'Kategori', 'required');
		
		$this->form_validation->set_rules('name', 'Nama', 'required');
		$this->form_validation->set_rules('address', 'Alamat', 'required');
		$this->form_validation->set_rules('date_of_birth', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('phone_number', 'No HP', 'required');
		$this->form_validation->set_rules('identification_no', 'No KTP', 'required');
		
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('passconf', 'Pengulangan Password', 'trim|required|matches[password]');

		if ($this->form_validation->run() == TRUE)
		{
			$this->load->model('Account_model');
			$this->Account_model->insert_from_post(TYPE['name']['TENANT']);
			
			redirect('account/signup_success');
		}
	}
	
	public function create_deliverer_do()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('license_plate', 'Nomor Plat', 'required');
		$this->form_validation->set_rules('vehicle_desc', 'Deskripsi Kendaraan', 'required');
		
		$this->form_validation->set_rules('name', 'Nama', 'required');
		$this->form_validation->set_rules('address', 'Alamat', 'required');
		$this->form_validation->set_rules('date_of_birth', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('phone_number', 'No HP', 'required');
		$this->form_validation->set_rules('identification_no', 'No KTP', 'required');
		
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('passconf', 'Pengulangan Password', 'trim|required|matches[password]');

		if ($this->form_validation->run() == TRUE)
		{
			$this->load->model('Account_model');
			$this->Account_model->insert_from_post(TYPE['name']['DELIVERER']);
			
			redirect('account/signup_success');
		}
	}
	
}
