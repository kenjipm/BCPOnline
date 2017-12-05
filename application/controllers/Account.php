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
		$data['model'] = new class{};
		$this->load->view('admin/account_list', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
	
	public function create_tenant()
	{
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
		
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('passconf', 'Pengulangan Password', 'trim|required|matches[password]');

		if ($this->form_validation->run() == TRUE)
		{
			$this->load->model('Account_model');
			$this->Account_model->insert_from_post("CUSTOMER");
			
			redirect('account/signup_success');
		}
	}
}
