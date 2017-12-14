<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->default_redirect($this->session->type);
	}

	public function index()
	{
		// Load Header
        $data_header['css_list'] = array();
        $data_header['js_list'] = array();
		$this->load->view('header', $data_header);
		
		// Load Body
		$data['message'] = "";
		if ($this->input->get('err') !== null)
		{
			$data['message'] = $this->get_error_message($this->input->get('err'));
		}
		$data['model'] = new class{};
		$this->load->view('login_main', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
	
	public function validate()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		
		$this->load->model('Account_model');
		$user = $this->Account_model->get_from_login($email, $password);
		$id = "";
		$child_id = "";
		$account_id = "";
		$type = $email; //""; dummy buat bypass kalo mau login type lain
		
		if ($user !== null)
		{
			$id = $user->id;
			$child_id = $user->child_id;
			$account_id = $user->account_id;
			$type = $user->type;
		}
		
		// if ($user !== null)
		{
			$userdata = array(
				'id' => $id,
				'child_id' => $child_id,
				'account_id' => $account_id,
				'type' => $type,
				'cart' => array()
			);
			
			$this->session->set_userdata($userdata);
			
			$this->default_redirect($type);
		}
		
		$this->session->sess_destroy();
		redirect('login?err=1');
	}
	
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('');
	}
	
	private function get_error_message($error_code)
	{
		if ($error_code == 1)
		{
			return "Username / Password salah";
		}
		else
		{
			return "Unknown Error";
		}
	}
	
	public function default_redirect($type)
	{
		if ($type == TYPE['name']['CUSTOMER'])
		{
			redirect('dashboard');
		}
		else if ($type == TYPE['name']['TENANT'])
		{
			redirect('tenant');
		}
		else if ($type == TYPE['name']['ADMIN'])
		{
			redirect('admin');
		}
		else if ($type == TYPE['name']['DELIVERER'])
		{
			redirect('delivery');
		}
	}
}
