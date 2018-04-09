<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->default_redirect($this->session->type);
		
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
		$data['return_url'] = $this->input->get('return_url') ?? "";
		$data['model'] = new class{};
		$this->load->view('login_main', $data);
		
		// Load Footer
		$this->load->view('footer');
	}
	
	public function validate()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$return_url = $this->input->post('return_url');
		
		$this->load->model('Account_model');
		$user = $this->Account_model->get_from_login($email, $password);
		$id = "";
		$child_id = "";
		$account_id = "";
		$profile_pic = "";
		$type = $email; //""; dummy buat bypass kalo mau login type lain
		
		if ($user !== null)
		{
		
			if ($user->is_blocked())
			{
				redirect('login?err=6');
			}
			
			$id = $user->id;
			$child_id = $user->child_id;
			$account_id = $user->account_id;
			$profile_pic = $user->profile_pic;
			$type = $user->type;
		// }
		
		// if ($user !== null)
		// {
			$userdata = array(
				'id' => $id,
				'child_id' => $child_id,
				'account_id' => $account_id,
				'profile_pic' => $profile_pic,
				'type' => $type,
				'cart' => array()
			);
			
			$this->session->set_userdata($userdata);
			
			if ($return_url != "") redirect($return_url);
			
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
		else if ($error_code == 6)
		{
			return "Akun Anda di blokir. Silakan hubungi admin untuk informasi lebih lanjut.";
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
			redirect('dashboard');
		}
		else if ($type == TYPE['name']['DELIVERER'])
		{
			redirect('order/order_list');
		}
	}
}
